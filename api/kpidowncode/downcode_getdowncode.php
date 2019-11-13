<?php 
  // Headers /edit
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
  $fundown->bit = isset($_GET['bit']) ? $_GET['bit'] : die();
 
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
       // Bi_Bit, Bi_Type, Dc_Number, Dc_Name, Dc_Remark
       // 'id' => $id,
       // 'DownCode' => $Dc_Number,
       // 'DownType' => $Dc_Type,   
       // 'DownName' => $Dc_Name,
       // 'DownRemark' => $Dc_Remark,
       // 'DownStatus' => $Dc_Status,
       // 'DownUser' => $Dc_User,
       // 'DownCreated' => $created_at,
       // 'DownUpdated' => $updated_at
       'bit' => $Bi_Bit,
       'bittype' => $Bi_Type,
       'downnumber' => $Dc_Number,
       'downname' => $Dc_Name,
       'downremark' => $Dc_Remark

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