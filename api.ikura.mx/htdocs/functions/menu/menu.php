<?php

class Menu {
  private $dbtools_obj = null;
  private $responses_obj = null;

  function __construct() {
    $this->dbtools_obj = new DB_Tools;
    $this->responses_obj = new Responses;
  }
  function get_menu($menuid=""){
    $andwhere = '';

    if ($menuid) {
      $andwhere .= " and id='$menuid'";
    }

    $menu = $this -> dbtools_obj -> getrows('MENUITEMs', 'id, name, price, category', "status=7 $andwhere");

    return $menu;
  }
  function add_menu($name,$price, $category){
    if ($tmp_id = $this-> dbtools_obj -> getValue('MENUITEMs', 'id, name, price, category', "status=7 $andwhere")) {
      $this->responses_obj -> error_response('U001', 'Item already exists');
    }

    $fields = array(
      'name' => $name,
      'price' => $price,
      'category' => $category,
    );

    $menuid = $this-> dbtools_obj -> insertrow('MENUITEMs', 7, $fields);

    return $menuid;
  }
  function update_menu($menuid, $name="", $price="", $category=""){
    if (!$tmp_id = $this-> dbtools_obj -> getValue('MENUITEMs', 'id', 'status="7" and id="'.$menuid.'"')) {
      $this->responses_obj -> error_response('U003', 'Product not found');
    }
    if ($tmp_id2 = $this-> dbtools_obj -> getValue('MENUITEMs', 'id', 'status="7" and name="'.$name.'" and id!="'.$menuid.'"')) {
      $this->responses_obj -> error_response('U003', 'Product with that name already exists');
    }

    $fields = array(
      'name' => $name,
      'price' => $price,
      'category' => $category
    );

    $this-> dbtools_obj -> updaterow('MENUITEMs', 7, $fields, $menuid);
  }
  function delete_menu($menuid){
    if (!$tmp_id = $this-> dbtools_obj -> getValue('MENUITEMs', 'id', 'status="7" and id="'.$menuid.'"')) {
      $this->responses_obj -> error_response('U004', 'Product not found');
    }

    $this -> dbtools_obj -> deleterow('MENUITEMs', $menuid);
  }
}
