<?php 
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: PUT');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Calreport.php';


  $database = new Database();
  $db = $database->connect();
  $cal = new Calreport($db);
  $result = $cal->create();
  //$num = $result->rowCount();

  //if($num > 0) { 
 //   $cal_arr = array(
  //    'count' => $num,
 //       'status' => '200'      
  //  ); 
  //  echo json_encode($cal_arr, JSON_UNESCAPED_UNICODE)."\n";
 // } else {
   
 //   echo json_encode(
 //     array('message' => 'No Posts Found')
 //   );   
  //}
