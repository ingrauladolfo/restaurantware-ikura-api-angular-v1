<?php

  class USERaccess {
    private $dbtools_obj = null;
    private $responses_obj = null;

    function __construct() {
      $this->dbtools_obj = new DB_Tools;
      $this->responses_obj = new Responses;
    }
    function get_useraccess($useraccessid="") {
      $andwhere = '';

      if ($useraccessid) {
        $andwhere .= " and id='$useraccessid'";
      }

      $useraccess = $this -> dbtools_obj -> getrows('USERaccess', 'id, accessgroupid, userid', "status=7 $andwhere");

      return $useraccess;
    }
    function add_useraccess($accessgroupid, $userid) {

      if ($tmp_id = $this-> dbtools_obj -> getValue('USERaccess', 'id', 'status="7" and accessgroupid="'.$accessgroupid.'"')) {
        $this->responses_obj -> error_response('U001', 'User Access already exists');
      }

      $fields = array(
        'accessgroupid' => $accessgroupid,
        'userid' => $userid
      );

      $useraccessid = $this-> dbtools_obj -> insertrow('USERaccess', 7, $fields);

      return $useraccessid;

    }

    function update_useraccess($useraccessid, $accessgroupid, $userid) {

      if (!$tmp_id = $this-> dbtools_obj -> getValue('USERaccess', 'id', 'status="7" and id="'.$useraccessid.'"')) {
        $this->responses_obj -> error_response('U003', 'User access not found');
      }
      if ($tmp_id2 = $this-> dbtools_obj -> getValue('USERaccess', 'id', 'status="7" and accessgroupid="'.$accessgroupid.'" and id!="'.$useraccessid.'"')) {
        $this->responses_obj -> error_response('U003', 'User with that role access exists');
      }

      $fields = array(
        'accessgroupid' => $accessgroupid,
        'userid' => $userid
      );

      $this-> dbtools_obj -> updaterow('USERaccess', 7, $fields, $useraccessid);

    }
    function delete_useraccess($useraccessid) {

      if (!$tmp_id = $this-> dbtools_obj -> getValue('USERaccess', 'id', 'status="7" and id="'.$useraccessid.'"')) {
        $this->responses_obj -> error_response('U004', 'This user access not found');
      }

      $this -> dbtools_obj -> deleterow('USERaccesss', $useraccessid);
    }
  }
?>
