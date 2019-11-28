<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');


  include_once '../../config/Database.php';
  include_once '../../models/funheader.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog funheaders object
  $funheaders = new funheader($db);

  $funheaders->Mc_ = isset($_GET['mc']) ? $_GET['mc'] : die();
  // Blog funheaders query
  $result = $funheaders->get_by_mc();
  $num = $result->rowCount();

  // Check if any funheaders
  if($num > 0) {
    // funheaders array
    $funheaders_arr = array();
    // $funheaders_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
     // Hs_Mc, Hs_TargetHour, Hs_Drawing, Hs_Shift, Hs_Employee, Hs_Customer
      $funheaders_item = array(
        'Hs_Mc' => $Hs_Mc,
        'Hs_TargetHour' => $Hs_TargetHour,
        'Hs_Drawing' => $Hs_Drawing,   
        'Hs_Shift' => $Hs_Shift,
        'Hs_Employee' => $Hs_Employee,
        'Hs_Customer' => $Hs_Customer,
        'created_at' => $created_at,
        'updated_at' => $updated_at
      
      );

      // Push to "data"
      array_push($funheaders_arr, $funheaders_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    //echo json_encode(master($posts_arr), JSON_UNESCAPED_UNICODE);
    echo json_encode($funheaders_arr, JSON_UNESCAPED_UNICODE)."\n";

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );

    
    
  }
