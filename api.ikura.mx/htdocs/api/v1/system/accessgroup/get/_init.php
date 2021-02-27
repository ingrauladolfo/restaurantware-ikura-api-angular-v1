<?php
  require_once './../functions/accessgroup/accessgroup.php';

  $accessgroup_obj = new AccessGroup();

  $accessgroup = $accessgroup_obj -> get_accessgroup($accessgroupid);

  $responses_obj -> success_response($accessgroup);
