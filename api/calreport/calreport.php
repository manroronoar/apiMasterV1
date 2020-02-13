<?php 
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: PUT');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 // http://localhost/api/api/calreport/calreport.php
  include_once '../../config/Database.php';
  include_once '../../models/Calreport.php';


  $database = new Database();
  $db = $database->connect();
  $cal = new Calreport($db);
  $result = $cal->create();
  //$num = $result->rowCount();

  //if ($result = true)
 // {
 //     $cal_arr = array(
 //           'message' =>'SUCCEED',
 //           'status' => '200'      
 //         ); 
 //    echo json_encode($cal_arr, JSON_UNESCAPED_UNICODE);
 // }
 // else
 // {
 //      echo json_encode(
 //        array('message' => 'ERROR',
 //              'status' => '404' ), JSON_UNESCAPED_UNICODE); 
 // }

