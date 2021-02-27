<?php

class AccessGroup {
  private $dbtools_obj = null;
  private $responses_obj = null;

  function __construct() {
    $this->dbtools_obj = new DB_Tools;
    $this->responses_obj = new Responses;
  }
  function get_accessgroup($accessgroupid="") {
    $andwhere = '';

    if ($accessgroupid) {
      $andwhere .= " and id='$accessgroupid'";
    }

    $accessgroup = $this -> dbtools_obj -> getrows('ACCESSgroup', 'id, name', "status=7 $andwhere");

    return $accessgroup;
  }
  function add_accessgroup($name) {

    if ($tmp_id = $this-> dbtools_obj -> getValue('ACCESSgroup', 'id', 'status="7" and name="'.$name.'"')) {
      $this->responses_obj -> error_response('U001', 'This role access already exists');
    }

    $fields = array(
      'name' => $name,
    );

    $accessgroupid = $this-> dbtools_obj -> insertrow('ACCESSgroup', 7, $fields);

    return $accessgroupid;

  }
  function update_accessgroup($accessgroupid, $name="") {

    if (!$tmp_id = $this-> dbtools_obj -> getValue('ACCESSgroup', 'id', 'status="7" and id="'.$accessgroupid.'"')) {
      $this->responses_obj -> error_response('U003', 'Role access not found');
    }
    if ($tmp_id2 = $this-> dbtools_obj -> getValue('ACCESSgroup', 'id', 'status="7" and email="'.$name.'" and id!="'.$userid.'"')) {
      $this->responses_obj -> error_response('U003', 'Role access with that name already exists');
    }

    $fields = array(
      'name' => $name,
    );

    $this-> dbtools_obj -> updaterow('ACCESSgroup', 7, $fields, $accessgroupid);

  }

  function delete_accessgroup($accessgroupid) {

    if (!$tmp_id = $this-> dbtools_obj -> getValue('ACCESSgroup', 'id', 'status="7" and id="'.$accessgroupid.'"')) {
      $this->responses_obj -> error_response('U004', 'Role access not found');
    }

    $this -> dbtools_obj -> deleterow('ACCESSgroup', $accessgroupid);
  }

}
