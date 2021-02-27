<?php
  require_once './../functions/useraccess/useraccess.php';

  $useraccess_obj = new USERaccess();

  $useraccess_obj -> delete_useraccess($useraccessid);

  $responses_obj -> success_response();
