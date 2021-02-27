<?php
  require_once './../functions/accessgroup/accessgroup.php';

  $accessgroup_obj = new AccessGroup();

  $accessgroup_obj -> update_accessgroup($accessgroupid, $name);

  $responses_obj -> success_response();
