<?php 
  class User {
    // DB stuff
    private $conn;
    private $table = 'member';

    // User Properties
    public $id;
    public $eng_name;
    public $position;
    public $section;
    public $prov;
    public $sub;
    public $uname;
    public $upass;
    public $lvl;
    public $tel;
    public $stat;
    public $img;
    public $when_create;
    public $db_dolmaptech;
    public $q_fast;
   
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get User all
    public function read_user_all() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table ;    

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    public function read_user_single() {
      // Create query
      //$query = 'SELECT id,eng_name,position,section,prov,sub,uname,upass,lvl,tel,stat,img  FROM ' . $this->table . '  
      $query = 'SELECT id,eng_name,position,section,prov,sub,uname,lvl,tel,stat,img  FROM ' . $this->table . '    
      WHERE
        id = ?
      LIMIT 0,1';

    // Prepare statement
      $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

       // Set properties
     //  $this->id = $row['id'];
       $this->eng_name = $row['eng_name'];
       $this->position = $row['position'];
       $this->section = $row['section'];
       $this->prov = $row['prov'];
       $this->sub = $row['sub'];
       $this->uname = $row['uname'];
     //  $this->upass = $row['upass'];
       $this->lvl = $row['lvl'];
       $this->tel = $row['tel'];
       $this->stat = $row['stat'];
       $this->img = $row['img'];

    }

    public function login() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . '    
      WHERE
      uname = :uname
      and
      upass = :upass'
      ;

    // Prepare statement
      $stmt = $this->conn->prepare($query);

      $this->uname = htmlspecialchars(strip_tags($this->uname));
      $this->upass = htmlspecialchars(strip_tags($this->upass));
    // Bind ID
      $stmt->bindParam(':uname', $this->uname);
      $stmt->bindParam(':upass', $this->upass);


    // Execute query
    // $stmt->execute();

    if($stmt->execute()) {
      //   printf("Error: %s.\n", $stmt->error, $query);
      $count = $stmt->rowCount();
      if($count >= 1 )
      {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Set properties
        $this->id = $row['id'];
        $this->eng_name = $row['eng_name'];
        $this->position = $row['position'];
        $this->section = $row['section'];
        $this->prov = $row['prov'];
        $this->sub = $row['sub'];
        $this->uname = $row['uname'];
        $this->upass = $row['upass'];
        $this->lvl = $row['lvl'];
        $this->tel = $row['tel'];
        $this->stat = $row['stat'];
        $this->img = $row['img'];
        $this->when_create = $row['when_create'];
        $this->db_dolmaptech = $row['db_dolmaptech'];
        $this->q_fast = $row['q_fast'];
           return true;
      }
      {
        return false;
      }
    
       }
 
       // Print error if something goes wrong
       printf("Error: %s.\n", $stmt->error, $query);
         return false;
       }
    

    public function create() {
      // Create query

      // $query = 'INSERT INTO ' .$this->table. 
      // '(eng_name,position,db_dolmaptech) 
      //VALUES  (:eng_name,:position,:db_dolmaptech)';
      $query = 'INSERT INTO ' .$this->table.
      '(eng_name,position,section,prov,sub,uname,upass,lvl,tel,stat,img,when_create,db_dolmaptech,q_fast) 
      VALUES 
      (:eng_name,:position,:section,:prov,:sub,:uname,:upass,:lvl,:tel,:stat,:img,:when_create,:db_dolmaptech,:q_fast)';
    
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
     // $this->id = htmlspecialchars(strip_tags($this->id));
      $this->eng_name = htmlspecialchars(strip_tags($this->eng_name));
      $this->position = htmlspecialchars(strip_tags($this->position));
      $this->section = htmlspecialchars(strip_tags($this->section));
      $this->prov = htmlspecialchars(strip_tags($this->prov));
      $this->sub = htmlspecialchars(strip_tags($this->sub));
      $this->uname = htmlspecialchars(strip_tags($this->uname));
      $this->upass = htmlspecialchars(strip_tags($this->upass));
      $this->lvl = htmlspecialchars(strip_tags($this->lvl));
      $this->tel = htmlspecialchars(strip_tags($this->tel));
      $this->stat = htmlspecialchars(strip_tags($this->stat));
      $this->img = htmlspecialchars(strip_tags($this->img));
      $this->when_create = htmlspecialchars(strip_tags($this->when_create));
      $this->db_dolmaptech = htmlspecialchars(strip_tags($this->db_dolmaptech));
      $this->q_fast = htmlspecialchars(strip_tags($this->q_fast));

      // Bind data
      //$stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':eng_name', $this->eng_name);
      $stmt->bindParam(':position', $this->position);
      $stmt->bindParam(':section', $this->section);
      $stmt->bindParam(':prov', $this->prov);
      $stmt->bindParam(':sub', $this->sub);
      $stmt->bindParam(':uname', $this->uname);
      $stmt->bindParam(':upass', $this->upass);
      $stmt->bindParam(':lvl', $this->lvl);
      $stmt->bindParam(':tel', $this->tel);
      $stmt->bindParam(':stat', $this->stat);
      $stmt->bindParam(':img', $this->img);
      $stmt->bindParam(':when_create', $this->when_create);
      $stmt->bindParam(':db_dolmaptech', $this->db_dolmaptech);
      $stmt->bindParam(':q_fast', $this->q_fast);
      // Execute query
      if($stmt->execute()) {
     //   printf("Error: %s.\n", $stmt->error, $query);
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error, $query);
        return false;
      }

      public function delete() {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE uname = :uname ';
    
        // Prepare Statement
        $stmt = $this->conn->prepare($query);
    
        // clean data
        $this->id = htmlspecialchars(strip_tags($this->uname));
    
        // Bind Data
        $stmt-> bindParam(':uname', $this->uname);
    
        // Execute query
        if($stmt->execute()) {
          return true;
        }
    
        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);
    
        return false;
        }


        public function update() {
          // Create Query
          $query = 'UPDATE ' .
            $this->table . '
          SET
            upass = :upass
            WHERE
            uname = :uname';
      
        // Prepare Statement
        $stmt = $this->conn->prepare($query);
      
        // Clean data
        $this->uname = htmlspecialchars(strip_tags($this->uname));
        $this->upass = htmlspecialchars(strip_tags($this->upass));
      
        // Bind data
        $stmt-> bindParam(':uname', $this->uname);
        $stmt-> bindParam(':upass', $this->upass);
      
        // Execute query
        if($stmt->execute()) {
          return true;
        }
      
        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);
      
        return false;
        }
    
  }