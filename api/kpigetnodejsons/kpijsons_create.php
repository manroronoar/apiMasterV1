<?php 
  // Headers
  //http://localhost/api/api/kpigetnodejsons/kpijsons_create.php
  //{
  //  "Gn_id" :"44",
  //  "Gn_node" :"-",
  //  "Gn_astid" :"-",
  //  "Gn_iobit" :"11223344",
  //  "Gn_ts" :"157216",
  //  "Gn_dmystr" :"2019-11-05",
  //  "Gn_hmstr" :"23:23:36",
  //  "Gn_sec" :"2",
  //  "Gn_tsupd" :"1572996218",
  //  "created_at" :"2019-11-07 00:45:23",
  //  "updated_at" :"2019-11-07 00:45:23"
  //  }

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
  //$data = json_decode(file_get_contents("php://input"));
  $data = file_get_contents('php://input');
  $obj_array = json_decode($data,true);

    try 
    {
      foreach($obj_array as $row) 
        {
        $getjson->Gn_id = $row['_id'];
        $getjson->Gn_node = $row['node'];
        $getjson->Gn_astid = $row['astid'];
        $getjson->Gn_iobit = $row['iobit'];
        $getjson->Gn_ts = $row['ts'];
        $getjson->Gn_dmystr = $row['dmystr'];
        $getjson->Gn_hmstr = $row['hmstr'];
        $getjson->Gn_sec = $row['sec'];
        $getjson->Gn_tsupd = $row['tsupd'];

        $getjson->Gn_enoper1 = $row['enop1'];
        $getjson->Gn_enoper2 = $row['enop2'];
        $getjson->Gn_enpm1 = $row['enpm1'];
        $getjson->Gn_enpm2 = $row['enpm2'];
        $getjson->Gn_enpm1oth1 = $row['enoth1'];
        $getjson->Gn_enpm1oth2 = $row['enoth2'];
        $getjson->Gn_hsidrawing = $row['drawing'];
        $getjson->Gn_hsimc = $row['mc'];
        $getjson->Gn_hsitargetHour = $row['target'];
        $getjson->Gn_fixqualitie = $row['oeequalitie'];

       // $getjson->created_at = $row['created_at'];
       // $getjson->updated_at = $row['updated_at'];
     
        $getjson->create();
        }
    }   
    catch( Exception $e )
    { 
      echo $e;
    }

  //if($getjson->create()) {
  //  echo json_encode(
  //   array('message' => 'Created')
  // );
  //} else {
  //  echo json_encode(
  //    array('message' => 'Not Created')
  //  );
  //}
  

