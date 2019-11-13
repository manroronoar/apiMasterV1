<?php 
  // Headers
  //http://localhost/api/api/kpidowncode/downcode_getdowncode.php?downcode=s1
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');


  include_once '../../config/Database.php';
  include_once '../../models/fundowntime.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $fundown = new fundowntime($db);

  // Get ID
  $fundown->downcode = isset($_GET['downcode']) ? $_GET['downcode'] : die();
 
  $result = $fundown->get_downcode();
  $num = $result->rowCount(); 
   //echo $num;
   if($num > 0) {
    // fundown array
    $fundown_arr = array();
    // fundowns_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $fundown_item = array( 
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
      array_push($fundown_arr, $fundown_item);
    }

    // Turn to JSON & output
    echo json_encode($fundown_arr, JSON_UNESCAPED_UNICODE)."\n";

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Recode')
    );
  }