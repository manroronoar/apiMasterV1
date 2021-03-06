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
    // -4/12/2019
    public $Gn_enoper1;
    public $Gn_enoper2;
    public $Gn_enpm1;
    public $Gn_enpm2;
    public $Gn_enpm1oth1;
    public $Gn_enpm1oth2;
    public $Gn_hsidrawing;
    public $Gn_hsimc;
    public $Gn_hsitargetHour;
    public $Gn_fixqualitie;


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

      $this->Gn_enoper1 = htmlspecialchars(strip_tags($this->Gn_enoper1));
      $this->Gn_enoper2 = htmlspecialchars(strip_tags($this->Gn_enoper2));
      $this->Gn_enpm1 = htmlspecialchars(strip_tags($this->Gn_enpm1));
      $this->Gn_enpm2 = htmlspecialchars(strip_tags($this->Gn_enpm2));
      $this->Gn_enpm1oth1 = htmlspecialchars(strip_tags($this->Gn_enpm1oth1));
      $this->Gn_enpm1oth2 = htmlspecialchars(strip_tags($this->Gn_enpm1oth2));
      $this->Gn_hsidrawing = htmlspecialchars(strip_tags($this->Gn_hsidrawing));
      $this->Gn_hsimc = htmlspecialchars(strip_tags($this->Gn_hsimc));
      $this->Gn_hsitargetHour = htmlspecialchars(strip_tags($this->Gn_hsitargetHour));
      $this->Gn_fixqualitie = htmlspecialchars(strip_tags($this->Gn_fixqualitie));

      //$this->created_at = htmlspecialchars(strip_tags($this->created_at));
      //$this->updated_at = htmlspecialchars(strip_tags($this->updated_at));
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
    // $this->conn =null;
    
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

   private function check_findbit($findbit) {
   
    $findbits = strpos($findbit,"1");
    $findbitss = $findbits + 1;
    return  $findbitss;
    
   }
   
      
    public function create() {
      //define('CONST_SERVER_TIMEZONE', 'Asia/Bangkok');
      date_default_timezone_set("Asia/Bangkok");
    
      $format = '%Y-%m-%d %H:%M:%S';
      $strfc = strftime($format); 
      $strfu = strftime($format); 
      //echo "\n$strf";
      
     // print_r(strptime($strf, $format));


      $result = $this->check_row();
      $num = $result->rowCount();

      $resultfindbit = $this->check_findbit($this->Gn_iobit);
      
  
     
      // Create query
     // $query = 'INSERT INTO ' .$this->table.
     // ' (Gn_id,Gn_node,Gn_astid,Gn_iobit,Gn_ts,Gn_dmystr,Gn_hmstr,Gn_sec,Gn_tsupd,created_at,updated_at) 
    //VALUES (:Gn_id,:Gn_node,:Gn_astid,:Gn_iobit,:Gn_ts,:Gn_dmystr,:Gn_hmstr,:Gn_sec,:Gn_tsupd,:created_at,:updated_at)';
    $query = 'INSERT INTO ' .$this->table.
      ' (Gn_id,Gn_node,Gn_astid,Gn_iobit,Gn_posbit,Gn_ts,Gn_dmystr,Gn_hmstr,Gn_sec,Gn_tsupd,Gn_enoper1,Gn_enoper2,Gn_enpm1,Gn_enpm2,Gn_enpm1oth1,Gn_enpm1oth2,Gn_hsidrawing,Gn_hsimc,Gn_fixqualitie,Gn_hsitargetHour,created_at,updated_at) 
      VALUES (:Gn_id,:Gn_node,:Gn_astid,:Gn_iobit,:Gn_posbit,:Gn_ts,:Gn_dmystr,:Gn_hmstr,:Gn_sec,:Gn_tsupd,:Gn_enoper1,:Gn_enoper2,:Gn_enpm1,:Gn_enpm2,:Gn_enpm1oth1,:Gn_enpm1oth2,:Gn_hsidrawing,:Gn_hsimc,:Gn_fixqualitie,:Gn_hsitargetHour,:created_at,:updated_at)';
      //Gn_posbit
      // Prepare statement
      $stmt = $this->conn->prepare($query);
   
      // Bind data
      $stmt->bindParam(':Gn_id', $this->Gn_id);
      $stmt->bindParam(':Gn_node', $this->Gn_node);
      $stmt->bindParam(':Gn_astid', $this->Gn_astid);
      $stmt->bindParam(':Gn_iobit', $this->Gn_iobit);
      $stmt->bindParam(':Gn_posbit', $resultfindbit);
      $stmt->bindParam(':Gn_ts', $this->Gn_ts);
      $stmt->bindParam(':Gn_dmystr', $this->Gn_dmystr);
      $stmt->bindParam(':Gn_hmstr', $this->Gn_hmstr);
      $stmt->bindParam(':Gn_sec', $this->Gn_sec);
      $stmt->bindParam(':Gn_tsupd', $this->Gn_tsupd);

      $stmt->bindParam(':Gn_enoper1', $this->Gn_enoper1);
      $stmt->bindParam(':Gn_enoper2', $this->Gn_enoper2);
      $stmt->bindParam(':Gn_enpm1', $this->Gn_enpm1);
      $stmt->bindParam(':Gn_enpm2', $this->Gn_enpm2);
      $stmt->bindParam(':Gn_enpm1oth1', $this->Gn_enpm1oth1);
      $stmt->bindParam(':Gn_enpm1oth2', $this->Gn_enpm1oth2);
      $stmt->bindParam(':Gn_hsidrawing', $this->Gn_hsidrawing);
      $stmt->bindParam(':Gn_hsimc', $this->Gn_hsimc);
      $stmt->bindParam(':Gn_hsitargetHour', $this->Gn_hsitargetHour);
      $stmt->bindParam(':Gn_fixqualitie', $this->Gn_fixqualitie);
     // Gn_fixqualitie

      $stmt->bindParam(':created_at', $strfc);
      $stmt->bindParam(':updated_at', $strfu);


      //$stmt->bindParam(':created_at', $this->created_at);
      //$stmt->bindParam(':updated_at', $this->updated_at);
    // $now = new DateTime('now')->format('Y-m-d H:i:s');
    
  
      if ($num < 1 )
      {
        if($this->check_bit($this->Gn_iobit) == true)
        {
          if($stmt->execute()) {
          //  $stmt->close;
          return true;
          }
          else
          {
          //  $stmt->close;
          return false;
          }   
        }   
      }
      else
      {
       // $stmt->close;
        return false;
      }     
    }

}