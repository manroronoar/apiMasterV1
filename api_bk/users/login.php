<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/User.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $users = new User($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set upass,uname to update
  $users->uname = $data->uname;
  $users->upass = $data->upass;

  //$users->login();

  //$users_arr = array(
  //  'id' => $users-> id,
  //  'eng_name' => $users-> eng_name,
  //  'position' => $users-> position,   
  //  'section' => $users-> section,
  //  'prov' => $users-> prov,
  //  'sub' => $users-> sub,
  //  'uname' => $users-> uname,
  //  'upass' => $users-> upass,
  //  'lvl' => $users-> lvl,
  //  'tel' => $users-> tel,
  //  'stat' => $users-> stat,
  //  'img' => $users-> img );

  //  print_r(json_encode($users_arr, JSON_UNESCAPED_UNICODE))."\n";
  
  if($users->login()) {
    echo json_encode(
      array('message' => 'Success',
      'id' => $users-> id,
      'eng_name' => $users-> eng_name,
      'position' => $users-> position,   
      'section' => $users-> section,
      'prov' => $users-> prov,
      'sub' => $users-> sub,
      'uname' => $users-> uname,
      'upass' => $users-> upass,
      'lvl' => $users-> lvl,
      'tel' => $users-> tel,
      'stat' => $users-> stat,
      'img' => $users-> img,
      'when_create' => $users-> when_create,
      'db_dolmaptech' => $users-> db_dolmaptech,
      'q_fast' => $users-> q_fast
      )
    );
  } else {
    echo json_encode(
      array('message' => 'Not Success')
    );
  }

