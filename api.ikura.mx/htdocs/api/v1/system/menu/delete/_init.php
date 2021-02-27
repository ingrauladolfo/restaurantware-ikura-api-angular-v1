<?php
  require_once './../functions/menu/menu.php';

  $menu_obj = new Menu();
  $menu_obj -> delete_menu($menuid);
  $responses_obj -> success_response();
