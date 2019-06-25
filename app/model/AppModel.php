<?php

/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*                                   ----------- CORE FUNCTIONS -----------
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/

function load($url,$options=array()) {
//This code is from Paul Brighton, with some changes on it. https://github.com/berighton

    $default_options = array(
        'method'        => 'get',
        'post_data'        => true,
        'return_info'    => false,
        'return_body'    => true,
        'cache'            => false,
        'referer'        => '',
        'headers'        => array(),
        'session'        => false,
        'session_close'    => false,
    );

    // Sets the default options.
    $options = (array) $default_options;
    foreach($default_options as $opt=>$value) {
        if(!isset($options[$opt])) $options[$opt] = $value;
    }

    $url_parts = parse_url($url);
    $ch = false;
    $info = array(//Currently only supported by curl.
        'http_code'    => 200
    );
    $response = '';

    $send_header = array(
        'Accept' => 'text/*',
        'User-Agent' => 'BinGet/1.00.A (http://www.bin-co.com/php/scripts/load/)'
    ) + $options['headers']; // Add custom headers provided by the user.

    if($options['cache']) {
        $cache_folder = joinPath(sys_get_temp_dir(), 'php-load-function');
        if(isset($options['cache_folder'])) $cache_folder = $options['cache_folder'];
        if(!file_exists($cache_folder)) {
            $old_umask = umask(0); // Or the folder will not get write permission for everybody.
            mkdir($cache_folder, 0777);
            umask($old_umask);
        }

        $cache_file_name = md5($url) . '.cache';
        $cache_file = joinPath($cache_folder, $cache_file_name); //Don't change the variable name - used at the end of the function.

        if(file_exists($cache_file)) { // Cached file exists - return that.
            $response = file_get_contents($cache_file);

            //Seperate header and content
            $separator_position = strpos($response,"\r\n\r\n");
            $header_text = substr($response,0,$separator_position);
            $body = substr($response,$separator_position+4);

            foreach(explode("\n",$header_text) as $line) {
                $parts = explode(": ",$line);
                if(count($parts) == 2) $headers[$parts[0]] = chop($parts[1]);
            }
            $headers['cached'] = true;

            if(!$options['return_info']) return $body;
            else return array('headers' => $headers, 'body' => $body, 'info' => array('cached'=>true));
        }
    }

    if(isset($options['post_data'])) { //There is an option to specify some data to be posted.
        $options['method'] = 'post';

        if(is_array($options['post_data'])) { //The data is in array format.
            $post_data = array();
            foreach($options['post_data'] as $key=>$value) {
                $post_data[] = "$key=" . urlencode($value);
            }
            $url_parts['query'] = implode('&', $post_data);
        } else { //Its a string
            $url_parts['query'] = $options['post_data'];
        }
    } elseif(isset($options['multipart_data'])) { //There is an option to specify some data to be posted.
        $options['method'] = 'post';
        $url_parts['query'] = $options['multipart_data'];
        /*
            This array consists of a name-indexed set of options.
            For example,
            'name' => array('option' => value)
            Available options are:
            filename: the name to report when uploading a file.
            type: the mime type of the file being uploaded (not used with curl).
            binary: a flag to tell the other end that the file is being uploaded in binary mode (not used with curl).
            contents: the file contents. More efficient for fsockopen if you already have the file contents.
            fromfile: the file to upload. More efficient for curl if you don't have the file contents.

            Note the name of the file specified with fromfile overrides filename when using curl.
         */
    }

    ///////////////////////////// Curl /////////////////////////////////////
    //If curl is available, use curl to get the data.
   //Don't use curl if it is specifically stated to use fsocketopen in the options

        if(isset($options['post_data'])) { //There is an option to specify some data to be posted.
            $page = $url;
            $options['method'] = 'post';

            if(is_array($options['post_data'])) { //The data is in array format.
                $post_data = array();
                foreach($options['post_data'] as $key=>$value) {
                    $post_data[] = "$key=" . urlencode($value);
                }
                $url_parts['query'] = implode('&', $post_data);

            } else { //Its a string
                $url_parts['query'] = '';
            }
        } else {
            if(isset($options['method']) and $options['method'] == 'post') {
                $page = $url_parts['scheme'] . '://' . 'localhost' . $url_parts['path'];
            } else {
                $page = $url;
            }
        }

        if($options['session'] and isset($GLOBALS['_binget_curl_session'])) $ch = $GLOBALS['_binget_curl_session']; //Session is stored in a global variable
        else $ch = curl_init('localhost');

        curl_setopt($ch, CURLOPT_URL, $page) or die("Invalid cURL Handle Resouce");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Just return the data - not print the whole thing.

        curl_setopt($ch, CURLOPT_NOBODY, !($options['return_body'])); //The content - if true, will not download the contents. There is a ! operation - don't remove it.
        $tmpdir = NULL; //This acts as a flag for us to clean up temp files
        if(isset($options['method']) and $options['method'] == 'post' and isset($url_parts['query'])) {
            curl_setopt($ch, CURLOPT_POST, true);
            if(is_array($url_parts['query'])) {
                //multipart form data (eg. file upload)
                $postdata = array();
                foreach ($url_parts['query'] as $name => $data) {
                    if (isset($data['contents']) && isset($data['filename'])) {
                        if (!isset($tmpdir)) { //If the temporary folder is not specifed - and we want to upload a file, create a temp folder.
                            //  :TODO:
                            $dir = sys_get_temp_dir();
                            $prefix = 'load';

                            if (substr($dir, -1) != '/') $dir .= '/';
                            do {
                                $path = $dir . $prefix . mt_rand(0, 9999999);
                            } while (!mkdir($path, $mode));

                            $tmpdir = $path;
                        }
                        $tmpfile = $tmpdir.'/'.$data['filename'];
                        file_put_contents($tmpfile, $data['contents']);
                        $data['fromfile'] = $tmpfile;
                    }
                    if (isset($data['fromfile'])) {
                        // Not sure how to pass mime type and/or the 'use binary' flag
                        $postdata[$name] = '@'.$data['fromfile'];
                    } elseif (isset($data['contents'])) {
                        $postdata[$name] = $data['contents'];
                    } else {
                        $postdata[$name] = '';
                    }
                }
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $url_parts['query']);
            }
        }

        curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/binget-cookie.txt");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        global $response;
        $response = curl_exec($ch);

        if(isset($tmpdir)) {
            //rmdirr($tmpdir); //Cleanup any temporary files :TODO:
        }

        $info = curl_getinfo($ch); //Some information on the fetch

        if($options['session'] and !$options['session_close']) $GLOBALS['_binget_curl_session'] = $ch; //Dont close the curl session. We may need it later - save it to a global variable
        else curl_close($ch);  //If the session option is not set, close the session.

} //endfunction


/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/

$array_counter 	= 0;
$get_to_replace	= array();
$get_result     = array();

function construct_page($page, $archive){
//This gets the contents inside the <loop> tags, parse them and calls for loop_page()

	global $response;
  global $id;
  global $get_to_replace;
  global $get_result;
  global $items2content;

  $site   = explode('/', $_SERVER['PHP_SELF']);
  $path   = 'http://'.$_SERVER['HTTP_HOST'].DS.$site[1].DS.PAGES_DIR.$page.DS;

  if($archive == 'item.php'){
      $id = '&id='.$id;
  }  else {
      $id = '';
  }

	$file 	= $path.$archive.'?page='.$page.$id;
	load($file, '');

  $source = $response;
  $preg   = preg_match_all("'<loop>(.*?)</loop>'si", $source, $match);

	if(!empty($preg)){

		preg_match_all("'<loop>(.*?)</loop>'si", $source, $match);
    $content = $match[0];

		$match_count = preg_match_all("'<loop_sql>(.*?)</loop_sql>'si", $source, $match);
    $sql_options = $match[1];

    $x = 0;
    foreach ($content as $cont) {

      parse_str(strtr($sql_options[$x], "=;", "=&"), $value);

      $table    = $value['table'];
      $where    = $value['where'];
      $extras   = $value['extras'];
      $orderby  = $value['orderby'];
      $order    = $value['order'];
      $limit    = $value['limit'];

      loop_page($table,$cont,$where,$extras,$orderby,$order,$limit);
      $x++;

      $get_to_replace[] = $cont;

    }

		$final = str_replace($get_to_replace, $get_result, $source);

    // Replacing directories
		$show_source = show_source($_SERVER['DOCUMENT_ROOT'].DS.$site[1].DS.'app'.DS.'config'.DS.'directories.php', 'false');
		$show_source = str_replace(array('define</span><span style="color: #007700">(</span><span style="color: #DD0000">', '</span><span style="color: #007700">'), array("<start>", "</start>"), $show_source);
		$show_source = str_replace("'", "", $show_source);
		preg_match_all("'<start>(.*?)</start>'si", $show_source, $match);
    $dirs = $match[1];
		$dirs_value_array = array();
		foreach ($dirs as $dirs_value) {
			if(strpos($final, $dirs_value) == true){
				$final = str_replace($dirs_value, constant($dirs_value), $final);
			}
		}

    //vCleaning <loop> markers
    $final = str_replace(array("<loop>", "</loop>"), array("", ""), $final);
    preg_match_all("'<loop_sql>(.*?)</loop_sql>'si", $final, $match); $loop_sql = $match[0];
    foreach ($loop_sql as $value) {
      $final = str_replace($value, "", $final);
    }
      echo $final;
		} else {
			include (PAGES_DIR . $page . DS . 'index.php');
		}

} //endfunction


/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/

function loop_page($table, $content, $where, $extras, $orderby, $order, $limit){
// This makes the SQL stuff (Selecting from DB) using the parameters inside {} markers

  global $get_to_replace;
	global $get_result;

	$content = str_replace('.DS.', DS, $content);

	preg_match_all('/{+(.*?)}/', $content, $matches);
	$columns = str_replace(array('{', '}'), array('', ''), implode(',',$matches[0]));


	/*------------------ CLEANING FUNCTIONS ------------------*/
	$columns_functions_clean_exploded = explode(",",$columns);
	$items_functions_clean = array();
	foreach ($columns_functions_clean_exploded as $value_functions_clean) {
		if(strpos($value_functions_clean, "function->") === false){
			$items_functions_clean[] = $value_functions_clean;
		} else {
			$functions_clean_exploded 	= explode("->",$value_functions_clean);
			$items_functions_clean[] 	= $functions_clean_exploded[2];
		}
	}
	$items_functions_clean 		= implode(",", $items_functions_clean);
	$items_functions_clean 		= rtrim($items_functions_clean, ",");
	$items_functions_clean 		= str_replace(",,", ",", $items_functions_clean);
	$columns_functions_clean 	= $items_functions_clean;


	/*--------------------------------------------------------*/

	$conn = db();

	if($orderby != ' '){ $orderby = ' ORDER BY '.$orderby; }
	if($order != ' '){ $order = ' '.$order.' '; }

  if($limit != ' '){


        if(strpos($limit, 'sessionpass') !== false){

          $sessionpass = str_replace("sessionpass", "", $limit);
          $sessionpass_exploded = explode("/",$sessionpass);
          $param1 = $sessionpass_exploded[0];
          $param2 = $sessionpass_exploded[1];


          if(!isset($_COOKIE['session'])){
            $param1 = $_SESSION["session"];
          } else {
            $param1 = $_COOKIE['session'];
          }

          if($param2 == '0'){

          } else {
            cart_add($param1, $param2);
          }

          $limit = ' ';

        } else {

          $limit = ' LIMIT '.$limit;

        }

  }


  if($where != ' '){

    if(strpos($where, 'sessionpass') !== false){
      $session = $_COOKIE['session'];
      $where = " WHERE session = '".$session."' ";
    }
    elseif($where == 'category_search'){

      if(!empty($_GET['search'])){

        if(strpos($_GET['search'], 'category') !== false){
          $search = str_replace("category", "", $_GET['search']);
          $search = " categoria = '".$search."' ";
          $where = " WHERE ".$search;
        } else {
          $where = " WHERE title LIKE '%".$_GET['search']."%' ";
        }

      }
    }
    else {
      $where = ' WHERE '.$where;
    }

  }

	if ($result = $conn->query("SELECT $columns_functions_clean FROM $table $where $extras $orderby $order $limit")) {

	   $columns_exploded = explode(",",$columns);
	   $items = array();

	   foreach ($columns_exploded as $value) {
		    $items[] = "{".$value."}";
		}

		$items2content = '';

	    while ($obj = $result->fetch(PDO::FETCH_OBJ)) {

	    	$items2 = array();

	    	foreach ($columns_exploded as $value) {

	    		if(strpos($value, "function->") === false){
					 $items2[] = $obj->$value;
				}
				else {
					$functions_clean_exploded = explode("->",$value);
					$functions_cleaning = $functions_clean_exploded[1]($obj->$functions_clean_exploded[2]);
					$items2[] = $functions_cleaning;
				}

			}

			$items2content .= str_replace($items, $items2, $content);

	    }

	    $get_result[] = $items2content;
	}

	$conn = NULL;
} //endfunction


/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/


function loop($table, $content, $where, $extras, $order, $asc_desc, $limit){

	$content = str_replace('.DS.', DS, $content);

	preg_match_all('/{+(.*?)}/', $content, $matches);
	$columns = str_replace(array('{', '}'), array('', ''), implode(',',$matches[0]));

	/*------------------ CLEANING FUNCTIONS ------------------*/
	$columns_functions_clean_exploded = explode(",",$columns);
	$items_functions_clean = array();
	foreach ($columns_functions_clean_exploded as $value_functions_clean) {
		if(strpos($value_functions_clean, "function->") === false){
			$items_functions_clean[] = $value_functions_clean;
		} else {
			$functions_clean_exploded 	= explode("->",$value_functions_clean);
			$items_functions_clean[] 	= $functions_clean_exploded[2];
		}
	}
	$items_functions_clean 		= implode(",", $items_functions_clean);
	$items_functions_clean 		= rtrim($items_functions_clean, ",");
	$items_functions_clean 		= str_replace(",,", ",", $items_functions_clean);
	$columns_functions_clean 	= $items_functions_clean;
	/*--------------------------------------------------------*/

	$conn = db();

	if(!empty($where)){ $where = ' WHERE '.$where; }
	if(!empty($order)){ $order = ' ORDER BY '.$order; }
	if(!empty($limit)){ $limit = ' LIMIT '.$limit; }

	if ($result = $conn->query("SELECT $columns_functions_clean FROM $table $where $extras $order $asc_desc $limit")) {

	   $columns_exploded = explode(",",$columns);
	   $items = array();

	   foreach ($columns_exploded as $value) {
		    $items[] = "{".$value."}";
		}

        $i_activebanner = 1;

	    while ($obj = $result->fetch(PDO::FETCH_OBJ)) {
	    	$items2 = array();
	    	foreach ($columns_exploded as $value) {
	    		if(strpos($value, "function->") === false){
					 $items2[] = $obj->$value;
				} else {
					$functions_clean_exploded = explode("->",$value);
					$functions_cleaning = $functions_clean_exploded[1]($obj->$functions_clean_exploded[2]);
					$items2[] = $functions_cleaning;
				}

			}
	        echo str_replace($items, $items2, $content);
	    }
	}

	$conn = NULL;
} //endfunction




/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*                                ----------- OTHER FUNCTIONS -----------
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------*/

function slug($str){
	$slug = array( ' '=>'-', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b' );
	$slug = strtolower(strtr( $str, $slug ));
	return $slug;
} //endfunction


function date_formating($str){
	$date_formating = date("d/m/Y", strtotime($str));
	return $date_formating;
} //endfunction

function date_formating_sem_ano($str){
	$date_formating = date("d/m", strtotime($str));
	return $date_formating;
} //endfunction

function remove_underlines($str){
	$remove_underlines = array( '_'=>' ');
	$remove_underlines = strtolower(strtr( $str, $remove_underlines ));
	return $remove_underlines;
} //endfunction

function limit_chars($str){
  $length = 500;
  if(strlen($str)<=$length){
    return $str;
  }
  else{
    $str=substr($str,0,$length) . '...';
    return $str;
  }
} //endfunction

function activebanner($str){
    global $i_activebanner;

    if($i_activebanner == 1){
        $str = ' active';
    } else {
        $str = '';

    }

    $i_activebanner++;
    return $str;

} //endfunction

function activebanner2($str){
    global $i_activebanner2;

    if($i_activebanner2 == 1){
        $str = ' active';
    } else {
        $str = '';

    }

    $i_activebanner2++;
    return $str;

} //endfunction

function banner($str){
  $str = include SERVER_DIR.'app/view/elements/site/banners.php';
  return $str;
} //endfunction

function cart_add($session, $str){

  $conn = db();

  foreach($conn->query("SELECT * FROM produtos WHERE id = '".$str."' ") as $row) {
    $product_id    = $row['id'];
	  $product_title = $row['title'];
    $product_price = $row['price'];
	}

  $query 	= $conn->prepare("SELECT produto FROM carrinho WHERE session= :session AND produto= :produto");
  $query->bindParam(':session', $session);
  $query->bindParam(':produto', $str);
  $query->execute();


  if ($query->rowCount() > 0){

    $product_check = $query->fetchColumn();
    /*
      $query 	= $conn->prepare("SELECT qtd FROM carrinho WHERE session= :session AND produto= :produto");
      $query->bindParam(':session', $session);
      $query->bindParam(':produto', $str);
      $query->execute();
      $product_qtd = $query->fetchColumn();
      $product_qtd = ($product_qtd+1);
      $conn->query("UPDATE carrinho SET qtd = '".$product_qtd."' WHERE session = '".$session."' AND produto = '".$str."' ");
    */

  } else {

    $conn->query("INSERT INTO carrinho (title, session, produto, qtd, price) VALUES ('$product_title', '$session', '$str', '1', '$product_price')");

  }

  $query  = $conn->prepare("DELETE FROM carrinho WHERE title IS NULL OR produto = '' ");
  $query->execute();

} //endfunction


// CART QUANTITIES HANDLING
if(isset($_GET['id_cart_qtd'])){

  $id_cart_qtd = $_GET['id_cart_qtd'];

  include ('../config/database.php');
  $conn = db();

  $query 	= $conn->prepare("SELECT qtd FROM carrinho WHERE id= :id");
  $query->bindParam(':id', $id_cart_qtd);
  $query->execute();
  $qtd = $query->fetchColumn();

  if($_GET['action_cart_qtd'] == 'add'){
    $qtd = ($qtd+1);
  } else {
    $qtd = ($qtd-1);
  }

  $query 	= $conn->prepare("UPDATE carrinho SET qtd= :qtd WHERE id= :id");
  $query->bindParam(':qtd', $qtd);
  $query->bindParam(':id', $id_cart_qtd);
  $query->execute();

  $query    = $conn->prepare("SELECT produto FROM carrinho WHERE id= :id");
  $query->bindParam(':id', $id_cart_qtd);
  $query->execute();
  $product = $query->fetchColumn();

  $query  = $conn->prepare("DELETE FROM carrinho WHERE title IS NULL OR produto = '' ");
  $query->execute();

  header('Location:http://mova.ppg.br/resources/clientes/nolano/carrinho/item/'.$product.'/');

} //endfunction


// CART FINISH HANDLING
if(isset($_GET['cart_finish'])){

  $name     = $_POST['name'];
  $phone    = $_POST['phone'];
  $email    = $_POST['email'];
  $uf       = $_POST['uf'];
  $city     = $_POST['city'];
  $address  = $_POST['address'];
  $date     = date("Y-m-d h:m:s");
  $session  = $_COOKIE['session'];

  include ('../config/database.php');
  $conn = db();

  $query    = $conn->prepare("SELECT sigla FROM estados WHERE cod_estados= :cod_estados");
  $query->bindParam(':cod_estados', $uf);
  $query->execute();
  $uf  = $query->fetchColumn();

  $query    = $conn->prepare("SELECT nome FROM cidades WHERE cod_cidades= :cod_cidades");
  $query->bindParam(':cod_cidades', $city);
  $query->execute();
  $city  = $query->fetchColumn();

  $query 	= $conn->prepare("INSERT INTO clientes (title, email, phone, address, city, uf, date, session) VALUES (:title, :email, :phone, :address, :city, :uf, :date, :session) ");
  $query->bindParam(':title', $name);
  $query->bindParam(':email', $email);
  $query->bindParam(':phone', $phone);
  $query->bindParam(':address', $address);
  $query->bindParam(':city', $city);
  $query->bindParam(':uf', $uf);
  $query->bindParam(':date', $date);
  $query->bindParam(':session', $session);
  $query->execute();

  $query 	= $conn->prepare("SELECT id FROM clientes WHERE session= :session");
  $query->bindParam(':session', $session);
  $query->execute();
  $id_cliente = $query->fetchColumn();

  $query  = $conn->prepare("DELETE FROM carrinho WHERE title IS NULL OR produto = '' ");
  $query->execute();

  $order = '

  <html>
    <head></head>
    <body>

    <div align="center" style="background-color:#ddd; text-align:center; padding:50px;">

      <div align="center" style="background-color:#fff; text-align:left; padding:50px;">

        <h2>// Orçamento</h2>

        <hr>

        <div style="padding:30px 0;">

        <p>
          Olá,<br />
          Segue o orçamento para os itens descritos abaixo na sua solicitação:
        </p>

        <p>
        Att,<br />
        Joao da Silva
        </p>

        </div>

        <hr>

      <p>
      <strong>Cliente:</strong> '.$name.'<br />
      <strong>E-mail:</strong> '.$email.'<br />
      <strong>Telefone:</strong> '.$phone.'<br />
      <strong>Endereco:</strong> '.$address.'<br />
      <strong>Cidade:</strong> '.$city.'<br />
      <strong>UF:</strong> '.$uf.'<br />
      <strong>Data Pedido:</strong> '.$date.'<br />
      </p>

  ';

  $order .= '
  <p>
      <table align="left" cellpadding="10">
        <tbody>
            <tr style="padding:10px; background-color:#999; color:#fff;">
                <th style="padding:10px;">Cod.</th>
                <th style="padding:10px;">Produto</th>
                <th style="padding:10px;">Qtd.</th>
            </tr>
  ';

  foreach($conn->query("SELECT * FROM carrinho WHERE session= '".$session."'") as $row) {
    $order .= '<tr>';
    $order .= '<td style="padding:10px; border-bottom-color:#ddd; border-bottom-style:solid; border-bottom-width:1px;  border-right-color:#ddd; border-right-style:solid; border-right-width:1px;  border-left-color:#ddd; border-left-style:solid; border-left-width:1px;">'.$row['id'].'</td>';
    $order .= '<td style="padding:10px; border-bottom-color:#ddd; border-bottom-style:solid; border-bottom-width:1px;  border-right-color:#ddd; border-right-style:solid; border-right-width:1px;  border-left-color:#ddd; border-left-style:solid; border-left-width:1px;">'.$row['title'].'</td>';
    $order .= '<td style="padding:10px; border-bottom-color:#ddd; border-bottom-style:solid; border-bottom-width:1px;  border-right-color:#ddd; border-right-style:solid; border-right-width:1px;  border-left-color:#ddd; border-left-style:solid; border-left-width:1px;">'.$row['qtd'].'</td>';
    $order .= '</tr>';
	}

  $order .= '

  </tr>
        </tbody>
      </table>
    </p>

<p>
    <table>
      <tr align="center">
        <td valign="center">
          <img src="http://mova.ppg.br/resources/clientes/nolano/app/webroot/img/logo-email.png" />
        </td>
        <td valign="center" style="text-align:left; padding-left:20px;">
          <p>
          (45) 3123-1234<br />
          contato@nolanosenepol.com
          </p>
          <p>
          Rua lorem ipsum, 123<br />
          Cidade/UF
          </p>
        </td>
      </tr>
    </table>
</p>

  </div>

</div>

</body>
</html>

  ';

  $query 	= $conn->prepare("UPDATE carrinho SET cliente= :id_cliente WHERE session= :session");
  $query->bindParam(':id_cliente', $id_cliente);
  $query->bindParam(':session', $session);
  $query->execute();

  $query = $conn->prepare("INSERT INTO pedidos (title, email, description) VALUES (:title, :email, :description)");
  $query->bindParam(':title', $name);
  $query->bindParam(':email', $email);
  $query->bindParam(':description', $order);
  $query->execute();

  $query = $conn->prepare("SELECT email FROM contato");
  $query->execute();
  $contato_site = $query->fetchColumn();

  // SEND EMAIL CONTAINING THE ORDER
  email('order', $order, $contato_site);

}

if(isset($_GET['orderfeedback'])){
  $orderfeedback = $_POST['orderfeedback'];
  $emailfeedback = $_POST['emailfeedback'];
  email('orderfeedback', $orderfeedback, $emailfeedback);
}

if(isset($_GET['contact'])){

  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $message  = $_POST['message'];

  $content = '

  <html>
  <body>

    <div align="center" style="background-color:#ddd; text-align:center; padding:50px;">
      <div align="center" style="background-color:#fff; text-align:left; padding:50px;">

        <h2>Contato Site</h2>

        <p>
        Nome:'.$name.'<br>
        Email:'.$email.'<br>
        </p>

        <p>
        Mensagem:<br>
        '.$message.'<br>
        </>

      </div>
    </div>

  </body>
  </html>

  ';

  include ('../config/database.php');
  $conn = db();
  $query = $conn->prepare("SELECT email FROM contato");
  $query->execute();
  $contato_site = $query->fetchColumn();

  email('contact', $content, $contato_site);
}


function email($type, $content, $email){

  if($type == 'order'){
    $subject = 'Pedido de Orcamento Site';
  }
  elseif($type == 'contact'){
    $subject = 'Contato Site';
  }
  if($type == 'orderfeedback'){
    $subject = 'Nolano Senepol - Orcamento';
  }

  // SENDING EMAIL
 require ($_SERVER['DOCUMENT_ROOT'].'resources/PHPMailer_5.2.0/class.phpmailer.php');
 require ($_SERVER['DOCUMENT_ROOT'].'resources/PHPMailer_5.2.0/class.pop3.php');
 require ($_SERVER['DOCUMENT_ROOT'].'resources/PHPMailer_5.2.0/class.smtp.php');

 //ini_set('max_execution_time', 0);
 $mail = new PHPMailer;

 //$mail->SMTPDebug = 3;                               // Enable verbose debug output

 $mail->isSMTP();                                      // Set mailer to use SMTP
 $mail->Host = 'email-ssl.com.br';  // Specify main and backup SMTP servers
 $mail->SMTPAuth = true;                               // Enable SMTP authentication
 $mail->Username = 'web@mova.ppg.br';                 // SMTP username
 $mail->Password = 'Avantemova2016';                           // SMTP password
 $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
 $mail->Port = 587;                                 // TCP port to connect to
 $mail->CharSet = 'UTF-8';

 $mail->setFrom('web@mova.ppg.br', 'Nolano Senepol');
 if($type = 'orderfeedback'){
   $mail->addAddress($email, 'Nolano Senepol Cliente');     // Add a recipient
 } else {
   $mail->addAddress('web@mova.ppg.br', 'Nolano Senepol');
 }
 $mail->addReplyTo('web@mova.ppg.br');
 $mail->isHTML(true);                                  // Set email format to HTML

 $mail->Subject = $subject;
 $mail->Body    = $content;

 if(!$mail->send()) {
     echo '<div class="text-danger">Oops something went wrong please try again !</div>';
 } else {

     header('Location:http://mova.ppg.br/resources/clientes/nolano/carrinho');
 }

} //endfunction


?>
