<?php
  require_once './../functions/accessgroup/accessgroup.php';

  $accessgroup_obj = new AccessGroup();

  $accessgroupid = $accessgroup_obj -> add_accessgroup($name);

  if ($accessgroupid) {
    $data_response = array(
      'accessgroupid' => $accessgroupid
    );

    $responses_obj -> success_response($data_response);
  } else {
    $responses_obj -> error_response('U002', 'Something went wrong, please try again in a few minutes');
  }
