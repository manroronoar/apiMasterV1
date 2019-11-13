<?php 
  class fundowntime {
    // DB stuff /edit
    private $conn;
    private $table_t1 = 'kpi_downcodes';
    private $table_t2 = 'kpi_bittypedowns';

    // User Properties
   // id, Dc_Number, Dc_Type, Dc_Name, Dc_Remark, Dc_Status, Dc_User, created_at, updated_at 
    public $id;
    public $downcode;
    public $bit;
    public $Dc_Number;
    public $Dc_Type;
    public $Dc_Name;
    public $Dc_Remark;
    public $Dc_Status;
    public $Dc_User;
    public $Bi_Bit;
    public $Bi_Type;
    public $created_at;
    public $updated_at;
  
  

  
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get User all
    public function get_downcodes() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table ;    

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
      return $stmt;
    }
    public function get_downcode() {
     // Create query
     //SELECT `id`, `Dc_Number`, `Dc_Type`, `Dc_Name`, `Dc_Remark`, `Dc_Status`,
     //`Dc_User`, `created_at`, `updated_at` FROM `kpi_downcodes` WHERE
     // SELECT  `Bi_Bit`, `Bi_Type`, `Bi_User`, `Dc_Number`, `Dc_Name`, `Dc_Remark`, `Dc_Status`
     // FROM kpi_bittypedowns
     // JOIN kpi_downcodes 
     // ON Bi_Type = Dc_Type

      //$query = 'SELECT  * FROM ' . $this->table . '        
      //   where Dc_Number = ?';

      $query = 'SELECT  Bi_Bit, Bi_Type, Dc_Number, Dc_Name, Dc_Remark
       FROM ' . $this->table_t1 .
       ' JOIN '. $this->table_t2 . 
       ' ON Bi_Type = Dc_Type WHERE Bi_Bit = ?';
       
        // Prepare statement
        $stmt = $this->conn->prepare($query);
    
        // Bind ID
        $stmt->bindParam(1, $this->bit);
       
        // Execute query
        $stmt->execute();
        return $stmt;
    }
  }