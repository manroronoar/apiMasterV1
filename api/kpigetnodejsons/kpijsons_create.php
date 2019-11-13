<?php 
  // Headers
  //http://localhost/api/api/kpigetnodejsons/headerset_getnode.php
  //{
  //"Gn_id" :"",
  //"Gn_node" :"",
  //"Gn_astid" :"",
  //"Gn_iobit" :"",
  //"Gn_ts" :"",
  //"Gn_dmystr" :"",
  //"Gn_hmstr" :"",
  //"Gn_sec" :"",
  //"Gn_tsupd" :"",
  //"created_at" :"",
  //"updated_at" :"",
  //}
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Getnodejsons.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $getjson = new Getjsons($db);
  
  

  // Get raw users data
  $data = json_decode(file_get_contents("php://input"));
  //$json = file_get_contents('php://input');
  //$obj = json_decode($json,true);
  //print_r(json_encode($users_arr, JSON_UNESCAPED_UNICODE))."\n";
  //SELECT id, Gn_id, Gn_node, Gn_astid, Gn_iobit, Gn_ts, 
  //Gn_dmystr, Gn_hmstr, Gn_sec, Gn_tsupd, created_at, 
  //updated_at FROM kpi_getnodejsons WHERE 
  
  $getjson->Gn_id = $data->Gn_id;
  $getjson->Gn_node = $data->Gn_node;
  $getjson->Gn_astid = $data->Gn_astid;
  $getjson->Gn_iobit = $data->Gn_iobit;
  $getjson->Gn_ts = $data->Gn_ts;
  $getjson->Gn_dmystr = $data->Gn_dmystr;
  $getjson->Gn_hmstr = $data->Gn_hmstr;
  $getjson->Gn_sec = $data->Gn_sec;
  $getjson->Gn_tsupd = $data->Gn_tsupd;
  $getjson->created_at = $data->created_at;
  $getjson->updated_at = $data->updated_at;


  if($getjson->create()) {
    echo json_encode(
      array('message' => 'Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Not Created')
    );
  }
  

