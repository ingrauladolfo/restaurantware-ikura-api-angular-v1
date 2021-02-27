<?php
  require_once './../functions/useraccess/useraccess.php';

  $useraccess_obj = new USERaccess();

  $useraccess_obj -> update_useraccess($accessgroupid,$userid);

  $responses_obj -> success_response();
