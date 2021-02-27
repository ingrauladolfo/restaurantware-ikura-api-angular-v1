<?php
  require_once './../functions/useraccess/useraccess.php';

  $useraccess_obj = new USERaccess();

  $useraccess = $useraccess_obj -> get_useraccess($useraccessid);

  $responses_obj -> success_response($useraccess);
