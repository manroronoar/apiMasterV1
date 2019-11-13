<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');


  include_once '../../config/Database.php';
  include_once '../../models/User.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $users = new User($db);

  // Get ID
  $users->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get users
  $users->read_user_single();

  // Create array
  $users_arr = array(
    'id' => $users-> id,
    'eng_name' => $users-> eng_name,
    'position' => $users-> position,   
    'section' => $users-> section,
    'prov' => $users-> prov,
    'sub' => $users-> sub,
    'uname' => $users-> uname,
   // 'upass' => $users-> upass,
    'lvl' => $users-> lvl,
    'tel' => $users-> tel,
    'stat' => $users-> stat,
    'img' => $users-> img 
  );

  // Make JSON
  //print_r(json_encode($users_arr));
  print_r(json_encode($users_arr, JSON_UNESCAPED_UNICODE))."\n";
  // echo json_encode($users_arr, JSON_UNESCAPED_UNICODE)."\n";