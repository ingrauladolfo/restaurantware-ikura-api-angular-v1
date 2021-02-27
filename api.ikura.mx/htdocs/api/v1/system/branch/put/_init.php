<?php
require_once './../functions/branch/branch.php';
  
$branch_obj = new Branch();

$branch_obj -> update_branch($branchid, $calle, $numero, $local, $cp, $ciudad, $estado, $telefono);
$branch_obj -> success_response();