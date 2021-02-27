<?php

class Users {

  private $dbtools_obj = null;
  private $responses_obj = null;

  function __construct() {
    $this->dbtools_obj = new DB_Tools;
    $this->responses_obj = new Responses;
  }

  function get_users($userid="") {
    $andwhere = '';

    if ($userid) {
      $andwhere .= " and id='$userid'";
    }

    $users = $this -> dbtools_obj -> getrows('USERs', 'id, name, email, gender, password', "status=7 $andwhere");

    return $users;
  }

  function add_user($name, $email, $gender, $password) {

    if ($tmp_id = $this-> dbtools_obj -> getValue('USERs', 'id', 'status="7" and email="'.$email.'"')) {
      $this->responses_obj -> error_response('U001', 'User already exists');
    }

    $enc_password = password_hash($password, PASSWORD_DEFAULT);

    $fields = array(
      'name' => $name,
      'gender' => $gender,
      'email' => $email,
      'password' => $enc_password
    );

    $userid = $this-> dbtools_obj -> insertrow('USERs', 7, $fields);

    return $userid;

  }

  function update_user($userid, $email, $name="", $gender="") {

    if (!$tmp_id = $this-> dbtools_obj -> getValue('USERs', 'id', 'status="7" and id="'.$userid.'"')) {
      $this->responses_obj -> error_response('U003', 'User not found');
    }
    if ($tmp_id2 = $this-> dbtools_obj -> getValue('USERs', 'id', 'status="7" and email="'.$email.'" and id!="'.$userid.'"')) {
      $this->responses_obj -> error_response('U003', 'User with that email already exists');
    }

    $fields = array(
      'name' => $name,
      'gender' => $gender,
      'email' => $email
    );

    $this-> dbtools_obj -> updaterow('USERs', 7, $fields, $userid);

  }

  function delete_user($userid) {

    if (!$tmp_id = $this-> dbtools_obj -> getValue('USERs', 'id', 'status="7" and id="'.$userid.'"')) {
      $this->responses_obj -> error_response('U004', 'User not found');
    }

    $this -> dbtools_obj -> deleterow('USERs', $userid);
  }
}
