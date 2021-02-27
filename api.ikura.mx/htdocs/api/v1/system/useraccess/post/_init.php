<?php
  require_once './../functions/useraccess/useraccess.php';

  $useraccess_obj = new USERaccess();

  $useraccessid = $useraccess_obj -> add_user($accessgroupid, $userid);

  if ($useraccessid) {
    $data_response = array(
      'useraccessid' => $useraccessid
    );

    $responses_obj -> success_response($data_response);
  } else {
    $responses_obj -> error_response('U002', 'Something went wrong, please try again in a few minutes');
  }
