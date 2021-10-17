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
    <div class="row justify-content-between text-start px-5 py-4 mt-3 list-item">
      <div class="col-10">
        '.$title.'
      </div>
      <div class="col-2 text-end">
        <a href="'.ROOT.ADMIN.'edit'.DS.$id_item.DS.$id.'"><i class="fas fa-pen bt_edit text-warning transition"></i></a>
        <a href="'.DS.ADMIN.'model'.DS.'delete'.DS.$id_item.DS.$id.'"><i class="fa fa-times bt_delete text-danger transition" aria-hidden="true"></i></a>
      </div>
    </div>
    ';
  }


?>
