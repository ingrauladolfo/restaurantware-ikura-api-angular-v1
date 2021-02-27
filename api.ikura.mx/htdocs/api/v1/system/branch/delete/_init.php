<?php
  require_once './../functions/branch/branch.php';

  $branch_obj = new Branch();
  $branch_obj -> delete_branch($branchid);
  $responses_obj -> success_response();