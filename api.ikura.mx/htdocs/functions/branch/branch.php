<?php
class Branch {
    private $dbtools_obj = null;
    private $responses_obj = null;
  
    function __construct() {
      $this->dbtools_obj = new DB_Tools;
      $this->responses_obj = new Responses;
    }
    function get_branch($branchid=""){
        $andwhere = '';
        if($branchid){
            $andwhere .= " and id='$branchid'";
        }
        $branch = $this -> dbtools_obj -> getrows('BRANCHs', 'id, calle, numero, local, cp, ciudad, estado, telefono', "status=7 $andwhere");
        return $branch;

    } 
    function add_branch($calle, $numero, $local, $cp, $ciudad, $estado, $telefono){
        if ($tmp_id = $this-> dbtools_obj -> getValue('BRANCHs', 'id', 'status="7" and local="'.$local.'"')) {
            $this->responses_obj -> error_response('U001', 'branch already exists');
        }
        $fields = array(
            'calle' => $calle,
            'numero' => $numero,
            'local' => $local,
            'cp' => $cp,
            'ciudad' => $ciudad,
            'estado' => $estado,
            'telefono' => $telefono
        );
        $branchid = $this-> dbtools_obj -> insertrow('BRANCHs', 7, $fields);
        return $branchid;  
    }
    function update_branch($branchid, $calle, $numero, $local, $cp, $ciudad, $estado, $telefono){
        if (!$tmp_id = $this-> dbtools_obj -> getValue('BRANCHs', 'id', 'status="7" and id="'.$branchid.'"')) {
            $this->responses_obj -> error_response('U003', 'Branch not found');
          }
          if ($tmp_id2 = $this-> dbtools_obj -> getValue('BRANCHs', 'id', 'status="7" and telefono="'.$telefono.'" and id!="'.$branchid.'"')) {
            $this->responses_obj -> error_response('U003', 'Branch with that telephone already exists');
          }
      
          $fields = array(
            'calle' => $calle,
            'numero' => $numero,
            'local' => $local,
            'cp' => $cp,
            'ciudad' => $ciudad,
            'estado' => $estado,
            'telefono' => $telefono
          );
      
          $this-> dbtools_obj -> updaterow('BRANCHs', 7, $fields, $branchid);
    }
    function delete_branch($branchid) {

        if (!$tmp_id = $this-> dbtools_obj -> getValue('BRANCHs', 'id', 'status="7" and id="'.$branchid.'"')) {
          $this->responses_obj -> error_response('U004', 'Branch not found');
        }
    
        $this -> dbtools_obj -> deleterow('BRANCHs', $branchid);
      }
}
