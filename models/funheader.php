<?php 
  class funheader {
    // DB stuff
    private $conn;
    private $table = 'kpi_headersets';

    // User Properties
    public $id;
    public $Hs_Mc;
    public $Hs_TargetHour;
    public $Hs_Drawing;
    public $Hs_Shift;
    public $Hs_Employee;
    public $Hs_Customer;
    public $Mc_Node;
    public $Node;
    public $created_at;
    public $updated_at;

  

  
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get User all
    public function get_all() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table ;    

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
      return $stmt;
    }
 
  public function get_single() {
    // Create query

    $query = 'SELECT  Hs_Mc, Hs_TargetHour, Hs_Drawing, Hs_Shift, Hs_Employee, Hs_Customer, Mc_Node, 
    kpi_mcs.created_at as created_at, kpi_mcs.updated_at as updated_at
     FROM ' . $this->table . ' 
     INNER JOIN kpi_mcs  
     ON Hs_Mc = Mc_Number 
     where Mc_Node = ?';
     //echo $query;
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->Node);

    // Execute query
    $stmt->execute();
    return $stmt;

    //echo $count = $stmt->rowCount();
        //$row = $stmt->fetch(PDO::FETCH_ASSOC);

     // Set properties
     //$this->id = $row['id'];
        //$this->Hs_Mc = $row['Hs_Mc'];
         //$this->Hs_TargetHour = $row['Hs_TargetHour'];
        // $this->Hs_Drawing = $row['Hs_Drawing'];
         //$this->Hs_Shift = $row['Hs_Shift'];
        // $this->Hs_Employee = $row['Hs_Employee'];
        //$this->Hs_Customer = $row['Hs_Customer'];
        //$this->Mc_Node = $row['Mc_Node'];
  }
  }