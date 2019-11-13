<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/User.php';


  

////$ebits = ini_get('error_reporting');
//error_reporting($ebits ^ E_NOTICE);

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $users = new User($db);

  // Get raw users data
  $data = json_decode(file_get_contents("php://input"));
  //print_r(json_encode($users_arr, JSON_UNESCAPED_UNICODE))."\n";
  
  //$users->id = $data->id;
  $users->eng_name = $data->eng_name;
  $users->position = $data->position;
  $users->section = $data->section;
  $users->prov = $data->prov;
  $users->sub = $data->sub;
  $users->uname = $data->uname;
  $users->upass = $data->upass;
  $users->lvl = $data->lvl;
  $users->tel = $data->tel;
  $users->stat = $data->stat;
  $users->img = $data->img;
  $users->when_create =  $data->when_create;
  $users->db_dolmaptech = $data->db_dolmaptech;
  $users->q_fast = $data->q_fast;

  // Create users
  if($users->create()) {
    echo json_encode(
      array('message' => 'Users Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Users Not Created')
    );
  }

