<?php 
  class Getjsons 
  {
     
    private $conn;
    private $table = 'kpi_getnodejsons';

    public $Gn_id;
    public $Gn_id2;
    public $Gn_node;
    public $Gn_astid;
    public $Gn_iobit;
    public $Gn_ts;
    public $Gn_dmystr;
    public $Gn_hmstr;
    public $Gn_sec;
    public $Gn_tsupd;
    public $created_at;
    public $updated_at;
    public $text;
   
    public function __construct($db) {
      $this->conn = $db;
      $this->Gn_id = htmlspecialchars(strip_tags($this->Gn_id));
      $this->Gn_node = htmlspecialchars(strip_tags($this->Gn_node));
      $this->Gn_astid = htmlspecialchars(strip_tags($this->Gn_astid));
      $this->Gn_iobit = htmlspecialchars(strip_tags($this->Gn_iobit));
      $this->Gn_ts = htmlspecialchars(strip_tags($this->Gn_ts));
      $this->Gn_dmystr = htmlspecialchars(strip_tags($this->Gn_dmystr));
      $this->Gn_hmstr = htmlspecialchars(strip_tags($this->Gn_hmstr));
      $this->Gn_sec = htmlspecialchars(strip_tags($this->Gn_sec));
      $this->Gn_tsupd = htmlspecialchars(strip_tags($this->Gn_tsupd));
      $this->created_at = htmlspecialchars(strip_tags($this->created_at));
      $this->updated_at = htmlspecialchars(strip_tags($this->updated_at));
    }

  
    private function check_row() {
      // Create query
      $query = 'SELECT * FROM ' .$this->table.
      '  WHERE Gn_id = :Gn_id';     
     // Prepare statement
     $stmt = $this->conn->prepare($query);
     
     $stmt->bindParam(':Gn_id', $this->Gn_id);
     // Execute query
     $stmt->execute();

     return $stmt;
   }

   private function check_bit($bit) {

        $countlen = strlen($bit);
        if($countlen == 8)
       // echo $countlen;
        {
          for ($x = 0; $x < $countlen; $x++)
          {
            if(is_numeric($bit[$x]) == false)
            {   
               // echo $bit[$x];
                return false;
                break;
            }      
          } 
          return true;  
        }
   }
      
    public function create() {
    
      $result = $this->check_row();
      $num = $result->rowCount();
     
      // Create query
      $query = 'INSERT INTO ' .$this->table.
      ' (Gn_id,Gn_node,Gn_astid,Gn_iobit,Gn_ts,Gn_dmystr,Gn_hmstr,Gn_sec,Gn_tsupd,created_at,updated_at) 
      VALUES (:Gn_id,:Gn_node,:Gn_astid,:Gn_iobit,:Gn_ts,:Gn_dmystr,:Gn_hmstr,:Gn_sec,:Gn_tsupd,:created_at,:updated_at)';
   
      // Prepare statement
      $stmt = $this->conn->prepare($query);
   
      // Bind data
      $stmt->bindParam(':Gn_id', $this->Gn_id);
      $stmt->bindParam(':Gn_node', $this->Gn_node);
      $stmt->bindParam(':Gn_astid', $this->Gn_astid);
      $stmt->bindParam(':Gn_iobit', $this->Gn_iobit);
      $stmt->bindParam(':Gn_ts', $this->Gn_ts);
      $stmt->bindParam(':Gn_dmystr', $this->Gn_dmystr);
      $stmt->bindParam(':Gn_hmstr', $this->Gn_hmstr);
      $stmt->bindParam(':Gn_sec', $this->Gn_sec);
      $stmt->bindParam(':Gn_tsupd', $this->Gn_tsupd);
      $stmt->bindParam(':created_at', $this->created_at);
      $stmt->bindParam(':updated_at', $this->updated_at);
      

      if ($num < 1 )
      {
        if($this->check_bit($this->Gn_iobit) == true)
        {
          if($stmt->execute()) {
          return true;
          }
          else
          {
          return false;
          }   
        }   
      }
      else
      {
        return false;
      }     
    }

}