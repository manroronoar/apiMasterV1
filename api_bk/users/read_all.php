<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  //header('Content-Type: application/json');
  header('Content-Type: text/html; charset=utf-8');
  header('Content-Type: application/json;charset=utf-8');

  include_once '../../config/Database.php';
  include_once '../../models/User.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog users object
  $users = new User($db);

  // Blog users query
  $result = $users->read_user_all();
  // Get row count
  $num = $result->rowCount();

  // Check if any users
  if($num > 0) {
    // Users array
    $users_arr = array();
    // $users_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $users_item = array(
        'id' => $id,
        'eng_name' => $eng_name,
        'position' => $position,   
        'section' => $section,
        'prov' => $prov,
        'sub' => $sub,
        //'uname' => $uname,
        //'upass' => $upass,
        'lvl' => $lvl,
        'tel' => $tel,
        'stat' => $stat,
        'img' => $img   
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
      array('message' => 'No Posts Found')
    );

    
    
  }
