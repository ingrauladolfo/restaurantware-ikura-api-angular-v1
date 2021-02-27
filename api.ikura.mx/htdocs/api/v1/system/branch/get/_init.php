<?php
  require_once './../functions/branch/branch.php';

  $branch_obj = new Branch();
  $branch = $branch_obj -> get_branch($branchid);
  $responses_obj -> success_response($branch);
