<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  //header('Content-Type: application/json');
  header('Content-Type: text/html; charset=utf-8');
  header('Content-Type: application/json;charset=utf-8');

  include_once '../../config/Database.php';
  include_once '../../models/fundowntime.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog funheaders object
  $fundowntimes = new fundowntime($db);

  // Blog fundowntimes query
  $result = $fundowntimes->get_downcodes();
  // Get row count
  $num = $result->rowCount();

  // Check if any fundowntimes
  if($num > 0) {
    // fundowntimes array
    $fundowntimes_arr = array();
    // $fundowntimes_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
    
      // id, Dc_Number, Dc_Type, Dc_Name, Dc_Remark, Dc_Status, Dc_User, created_at, updated_at 
      $fundowntimes_item = array(
        'id' => $id,
        'DownCode' => $Dc_Number,
        'DownType' => $Dc_Type,   
        'DownName' => $Dc_Name,
        'DownRemark' => $Dc_Remark,
        'DownStatus' => $Dc_Status,
        'DownUser' => $Dc_User,
        'DownCreated' => $created_at,
        'DownUpdated' => $updated_at  
      );
      // Push to "data"
      array_push($fundowntimes_arr, $fundowntimes_item);
    }
    // Turn to JSON & output
    //echo json_encode(master($posts_arr), JSON_UNESCAPED_UNICODE);
    echo json_encode($fundowntimes_arr, JSON_UNESCAPED_UNICODE)."\n";
  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );   
  }
