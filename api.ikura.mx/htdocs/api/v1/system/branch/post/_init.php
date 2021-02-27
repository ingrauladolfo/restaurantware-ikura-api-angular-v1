<?php
  require_once './../functions/branch/branch.php';

  $branch_obj = new Branch();

  $branch_id = $branch_obj -> add_branch($calle, $numero, $local, $cp, $ciudad, $estado, $telefono);
  if($branch_id){
    $data_response = array(
    'branchid' => $branch_id
  );
  $responses_obj -> success_response($data_response);
}else{
  $responses_obj -> error_response('U002', 'Something went wrong, please try again in a few minutes');
}
