<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');


  include_once '../../config/Database.php';
  include_once '../../models/funheader.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $funheaders = new funheader($db);

  // Get ID
  $funheaders->Node = isset($_GET['Node']) ? $_GET['Node'] : die();

  // Get 
  // $funheaders->get_single();
 
  // Create array
 // $funheaders_arr = array(
   // 'id' => $funheaders-> id,
  //  'Hs_Mc' => $funheaders-> Hs_Mc,
  //  'Hs_TargetHour' => $funheaders-> Hs_TargetHour,   
  //  'Hs_Drawing' => $funheaders-> Hs_Drawing,
  //  'Hs_Shift' => $funheaders-> Hs_Shift,
  //  'Hs_Employee' => $funheaders-> Hs_Employee,
  //  'Hs_Customer' => $funheaders-> Hs_Customer,
  //  'Mc_Node' => $funheaders-> Mc_Node,
    //'created_at' => $funheaders-> created_at,
    //'updated_at' => $funheaders-> updated_at,
 // );

  // Make JSON
  //print_r(json_encode($users_arr));
 //' print_r(json_encode($funheaders_arr, JSON_UNESCAPED_UNICODE))."\n";
  // echo json_encode($funheaders_arr, JSON_UNESCAPED_UNICODE)."\n";

  $result = $funheaders->get_single();
  $num = $result->rowCount(); 
   //echo $num;
   if($num > 0) {
    // Users array
    $users_arr = array();
    // $users_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $users_item = array(
       // 'id' => $id,
        'Mc' => $Hs_Mc,
        'TargetHour' => $Hs_TargetHour,   
        'Drawing' => $Hs_Drawing,
        'Shift' => $Hs_Shift,
        'Employee' => $Hs_Employee,
        'Customer' => $Hs_Customer,
        'Node' => $Mc_Node,
        'created' =>  $created_at,
        'updated' =>  $updated_at
      );

      // Push to "data"
      array_push($users_arr, $users_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    //echo json_encode(master($posts_arr), JSON_UNESCAPED_UNICODE);
    echo json_encode($users_arr, JSON_UNESCAPED_UNICODE)."\n";

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Recode')
    );
  }