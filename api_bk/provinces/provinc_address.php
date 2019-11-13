<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  //header('Content-Type: application/json');
  header('Content-Type: text/html; charset=utf-8');
  header('Content-Type: application/json;charset=utf-8');

  include_once '../../config/Database.php';
  include_once '../../models/Address.php';


  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Address object
  $address = new Address($db);

  // Blog Address query
  $result = $address->provinces_all();
  // Get row count
  $num = $result->rowCount();

  // Check if any users
  if($num > 0) {
    // address array
    $address_arr = array();
    // $address_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

         //'PROVINCE_ID', 'PROVINCE_CODE', 'PROVINCE_NAME', 'GEO_ID', 'VRS_CODE

      $address_item = array(
        'PROVINCE_ID' => $PROVINCE_ID,
        'PROVINCE_CODE' => $PROVINCE_CODE,
        'PROVINCE_NAME' => $PROVINCE_NAME,   
        'GEO_ID' => $GEO_ID,
        'VRS_CODE' => $VRS_CODE
      );

      // Push to "data"
      array_push($address_arr, $address_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    //echo json_encode(master($posts_arr), JSON_UNESCAPED_UNICODE);
    echo json_encode($address_arr, JSON_UNESCAPED_UNICODE)."\n";

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );

    
    
  }
