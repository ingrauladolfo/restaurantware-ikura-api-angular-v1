<?php
  require_once './../functions/accessgroup/accessgroup.php';

  $accessgroup_obj = new AccessGroup();

  $accessgroup_obj -> delete_accessgroup($accessgroupid);

  $responses_obj -> success_response();
