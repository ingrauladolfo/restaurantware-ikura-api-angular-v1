<?php
  require_once './../functions/menu/menu.php';

  $menu_obj = new Menu();
  $menu_obj -> update_menu($menuid, $name, $price, $category);
  $responses_obj -> success_response();
