<?php
  require_once './../functions/menu/menu.php';

  $menu_obj = new Menu();
  $menuid = $menu_obj -> add_menu($name, $price, $category);

  if($menuid){
    $data_response = array(
      'menuid' => $menuid
    );
    $responses_obj -> success_response($data_response);
  }else{
    $responses_obj -> error_response('U002', 'Something went wrong, please try again in a few minutes');
  }
