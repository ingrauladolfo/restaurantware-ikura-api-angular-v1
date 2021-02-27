<?php
  require_once './../functions/menu/menu.php';

  $menu_obj = new Menu();

  $menu = $menu_obj -> get_menu($menuid);
  $responses_obj -> success_response($menu);
