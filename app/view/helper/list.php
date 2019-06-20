<?php

  foreach($conn->query("SELECT title FROM ".$cms." WHERE id ='".$id_item."' ") as $row) {
    $title_table = $row['title'];
  }

  $actual_link = "http://$_SERVER[HTTP_HOST]";


  foreach($conn->query("SELECT * FROM ".$title_table. " ORDER BY title ASC") as $row) {

    $id       = $row['id'];

    if(isset($row['title'])){
      $title = $row['title'];
    }
    elseif(isset($row['nome'])){
      $title = $row['nome'];
    }
    elseif(isset($row['id_pedidos'])){
      $title = $row['id']." | ". $row['cliente'];
    }

    if(isset($row['img'])){ $img = $row['img'];  $img_size= ""; } else{ $img = ''; $img_size="width:0;"; }

    echo '
    <div class="row col-12 border-full align-items-center p-1 mt-1 mb-1">
      <div class="content-item-thumb inline" style="background-image:url('.IMG_DIR.$title_table.DS.$img.'); '.$img_size.'">
      </div>
      <div class="col-8">
        '.$title.'
      </div>
      <div class="col-2" align="right">
        <a href="'.ROOT.ADMIN.'edit'.DS.$id_item.DS.$id.'"><div class="bt_edit inline transition"><i class="fas fa-pen"></i></div></a>
        <a href="'.DS.ADMIN.'model'.DS.'delete'.DS.$id_item.DS.$id.'"><div class="bt_delete inline transition"><i class="fa fa-times" aria-hidden="true"></i></div></a>
      </div>
    </div>
    ';
  }


?>
