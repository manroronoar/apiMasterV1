<?php 
  class Calreport 
  {
     
    private $conn;
    private $table_mcs = 'kpi_mcs';
    private $table_setqu = 'kpi_setqualities';
    private $table_hs = 'kpi_headersets';
      
    public $test_item;
    //'2020-01-28 00:00:00'
    public $dateD = '2020-01-28';
    public $dateGet;
    public $dateT;
    public $dateS ;
    public $dateE ;
    public $node ;
    public $mcnumber ;      
    public $oee_tg = 0;  
    public $oee_ac = 0; 

    public $pr_tg = 0; 
    public $pr_ac = 0; 

    public $ar_tg; 
    public $ar_ac = 0; 

    public $qr_tg ; 
    public $pr_by_hour = 0;
    public $qr_ac = 0; 

    public $shifts = '';  
    public $location = '';
    
    public $sumsecbit1 = 0;    public $countbit1 = 0;   public $bit1 = 0;    public $fq1 = 0;
    public $sumsecbit2 = 0;    public $countbit2 = 0;   public $bit2 = 0;    public $fq2 = 0;
    public $sumsecbit3 = 0;    public $countbit3 = 0;   public $bit3 = 0;    public $fq3 = 0;
    public $sumsecbit4 = 0;    public $countbit4 = 0;   public $bit4 = 0;    public $fq4 = 0;
    public $sumsecbit5 = 0;    public $countbit5 = 0;   public $bit5 = 0;    public $fq5 = 0;
    public $sumsecbit6 = 0;    public $countbit6 = 0;   public $bit6 = 0;    public $fq6 = 0;
  //public $sumsecbit7 = 0;    public $countbit7 = 0;   public $bit7 = 0;    public $fq7 = 0;
  //public $sumsecbit8 = 0;    public $countbit8 = 0;   public $bit8 = 0;    public $fq8 = 0;

    public function __construct($db) {
      $this->conn = $db;

      //$this->created_at = htmlspecialchars(strip_tags($this->created_at));
      //$this->updated_at = htmlspecialchars(strip_tags($this->updated_at));
    }


    public function calshifts($timeshift) {
      
    }
    public function create() {
      //define('CONST_SERVER_TIMEZONE', 'Asia/Bangkok');
      date_default_timezone_set("Asia/Bangkok");
     
      $dateD = '2020-01-28';
      $dateGet = date("Y-m-d");
      $dateT = date("H:m:s");
      $dateS = '';
      $dateE = '';
      $ar_tg = 3600; 
      $qr_tg = 0;
      $qr_ac = 0;
      $oee_ac = 0;

      //shift  A   08:00:00   -   19:59:59
      //shift  B   20:00:00   -   07:59:59
     if ($dateT >= '00:00:00' && $dateT <= '01:59:59')
     {
       $dateS = '23:00:00';
       $dateE = '23:59:59';
       $dateD  = date ("Y-m-d", strtotime("-1 day", strtotime($dateGet)));
       $shifts = 'A';
     }
     else if ($dateT >= '01:00:00' && $dateT <= '02:59:59')
     {
       $dateS = '00:00:00';
       $dateE = '00:59:59';
       $shifts = 'A';
     }
     else if ($dateT >= '02:00:00' && $dateT <= '03:59:59')
     {
       $dateS = '01:00:00';
       $dateE = '01:59:59';
       $shifts = 'A';
     }
     else if ($dateT >= '03:00:00' && $dateT <= '03:59:59')
     {
       $dateS = '02:00:00';
       $dateE = '02:59:59';
       $shifts = 'A';
     }
     else if ($dateT >= '04:00:00' && $dateT <= '04:59:59')
     {
       $dateS = '03:00:00';
       $dateE = '03:59:59';
       $shifts = 'A';
     }
     else if ($dateT >= '05:00:00' && $dateT <= '05:59:59')
     {
       $dateS = '04:00:00';
       $dateE = '04:59:59';
       $shifts = 'A';
     }
     else if ($dateT >= '06:00:00' && $dateT <= '06:59:59')
     {
       $dateS = '05:00:00';
       $dateE = '05:59:59';
       $shifts = 'A';
     }
     else if ($dateT >= '07:00:00' && $dateT <= '07:59:59')
     {
       $dateS = '06:00:00';
       $dateE = '06:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '08:00:00' && $dateT <= '08:59:59')
     {
       $dateS = '07:00:00';
       $dateE = '07:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '09:00:00' && $dateT <= '09:59:59')
     {
       $dateS = '08:00:00';
       $dateE = '08:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '10:00:00' && $dateT <= '10:59:59')
     {
       $dateS = '09:00:00';
       $dateE = '09:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '11:00:00' && $dateT <= '11:59:59')
     {
       $dateS = '10:00:00';
       $dateE = '10:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '12:00:00' && $dateT <= '12:59:59')
     {
       $dateS = '11:00:00';
       $dateE = '11:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '13:00:00' && $dateT <= '13:59:59')
     {
       $dateS = '12:00:00';
       $dateE = '12:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '14:00:00' && $dateT <= '14:59:59')
     {
       $dateS = '13:00:00';
       $dateE = '13:59:59';
       $shifts = 'B';
     }
     else if ($dateT <= '15:00:00' && $dateT <= '15:59:59')
     {
       $dateS = '14:00:00';
       $dateE = '14:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '16:00:00' && $dateT <= '16:59:59')
     {
       $dateS = '15:00:00';
       $dateE = '15:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '17:00:00' && $dateT <= '17:59:59')
     {
       $dateS = '16:00:00';
       $dateE = '16:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '18:00:00' && $dateT <= '18:59:59')
     {
       $dateS = '17:00:00';
       $dateE = '17:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '19:00:00' && $dateT <= '19:59:59')
     {
       $dateS = '18:00:00';
       $dateE = '18:59:59';
       $shifts = 'B';
     }
     else if ($dateT >= '20:00:00' && $dateT <= '20:59:59')
     {
       $dateS = '19:00:00';
       $dateE = '19:59:59';
       $shifts = 'A';
     }
     else if ($dateT >= '21:00:00' && $dateT <= '21:59:59')
     {
       $dateS = '20:00:00';
       $dateE = '20:59:59';
       $shifts = 'A';
     }
     else if ($dateT >= '22:00:00' && $dateT <= '22:59:59')
     {
       $dateS = '21:00:00';
       $dateE = '21:59:59';
       $shifts = 'A';
     }
     else if ($dateT >= '23:00:00' && $dateT <= '23:59:59')
     {
       $dateS = '22:00:00';
       $dateE = '22:59:59';
       $shifts = 'A';
     }

     $querys = 'SELECT DISTINCT(Mc_Number),Mc_Location FROM ' . $this->table_mcs ;
     $stmts = $this->conn->prepare($querys);
     $stmts->execute();
     //$this->conn= null ;
     //if ($stmt->num_rows > 0) {
        // output data of each row
        $dateS = '00:00:00';
        $dateE = '23:59:59';
      
        echo "Time: ". $dateT. "\n";
        echo "DateTime: ".$dateGet .' '.$dateT. "\n";
        echo "TimeStart: ".$dateGet .' '.$dateS. "\n";
        echo "TimeEnd: ".$dateGet .' '.$dateE. "\n";
        
        while( $rows = $stmts->fetch(PDO::FETCH_ASSOC)) {
            $oee_ac = 0;
            $oee_tg = 0;
            $pr_ac = 0;
            $pr_tg = 0;
            $pr_by_hour = 0;
            $qr_ac = 0;
            $qr_tg = 0;



             echo "Mc. ". $rows["Mc_Number"]."\n". "location : ".$rows["Mc_Location"]."\n";
             $mcnumber  = $rows["Mc_Number"];
             $location  = $rows["Mc_Location"];

             $query = 'SELECT Sq_Fixqualitie FROM ' . $this->table_setqu . ' where Sq_Mc = '."'".$mcnumber."'" ;
             $stmt = $this->conn->prepare($query);
             $stmt->execute();
             while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
             echo "TargetOee: ".$row["Sq_Fixqualitie"]. "\n";
             $oee_tg = $row["Sq_Fixqualitie"];
             }

             $query = 'SELECT Hs_TargetHour FROM ' . $this->table_hs . ' where Hs_Mc = '."'".$mcnumber."'" ;
             $stmt = $this->conn->prepare($query);
             $stmt->execute();
             while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
             echo "Target: ".$row["Hs_TargetHour"]. "\n"; 
             $pr_tg = $row["Hs_TargetHour"];
             $pr_by_hour = $row["Hs_TargetHour"]/24;
            }
            
             $query = 'select  t1.mc_number,t1.Gn_posbit,count(t1.Gn_posbit) as countposbit,sum(t1.gn_sec) as sumsec,sum(t1.Gn_fixqualitie) as sumfixqualitie   from (SELECT Mc_Number,Nd_Number,kpi_getnodejsons.* FROM kpi_mcs
             join kpi_nodes on kpi_mcs.Mc_Node = kpi_nodes.Nd_Number 
             join kpi_getnodejsons on kpi_getnodejsons.Gn_node = kpi_nodes.Nd_Number
             where kpi_mcs.Mc_Number = '."'".$mcnumber."'".' and kpi_getnodejsons.Gn_dmystr = '."'".$dateD."'".'
             and kpi_getnodejsons.Gn_hmstr Between '."'".$dateS."'".' and '."'".$dateE."'".') t1
             group by t1.Gn_posbit';
             $stmt = $this->conn->prepare($query);
             $stmt->execute();
             //$num = $stmt->rowCount();
             
             while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               // echo $row["Gn_posbit"]. "\n";
               
                switch ($row["Gn_posbit"]) {
                    case 1:
                        $bit1 = $row["Gn_posbit"];
                        $sumsecbit1 = $row["sumsec"];
                        $countbit1 = $row["countposbit"];
                        $fq1 = ( $row["sumfixqualitie"]/$countbit1);
                        //echo  "Bit: ". $row["Gn_posbit"]." Sumsec: ". $sumsecbit1." CountBit: ". $countbit1." SumFix: ".$fq1."\n";
                        break;
                    case 2:
                        $bit2 = $row["Gn_posbit"];
                        $sumsecbit2 = $row["sumsec"];
                        $countbit2 = $row["countposbit"];
                        $fq2 = ( $row["sumfixqualitie"]/$countbit2);
                       // echo  "Bit: ". $row["Gn_posbit"]." Sumsec: ". $sumsecbit2." CountBit: ". $countbit2." SumFix: ".$fq2."\n";
                        break;
                    case 3:  
                        $bit3 = $row["Gn_posbit"];
                        $sumsecbit3 = $row["sumsec"];
                        $countbit3 = $row["countposbit"];
                        $fq3 = ( $row["sumfixqualitie"]/$countbit3);
                        break;
                    case 4:
                        $bit4 = $row["Gn_posbit"];
                        $sumsecbit4 = $row["sumsec"];
                        $countbit4 = $row["countposbit"];
                        $fq4 = ( $row["sumfixqualitie"]/$countbit4);
                        break;
                    case 5:
                        $bit5 = $row["Gn_posbit"];
                        $sumsecbit5 = $row["sumsec"];
                        $countbit5 = $row["countposbit"];
                        $fq5 = ( $row["sumfixqualitie"]/$countbit5);
                        break;
                    case 6:
                        $bit6 = $row["Gn_posbit"];
                        $sumsecbit6 = $row["sumsec"];
                        $countbit6 = $row["countposbit"];
                        $fq6 = ( $row["sumfixqualitie"]/$countbit6);
                        break;
                    case 7:
                       // $sumsecbit7 = 0;
                       // $countbit7 = 0;
                        break;
                    case 8:
                       // $sumsecbit8 = 0;
                       // $countbit18 = 0;
                        break;   
                    default:
                    
                }

             }

             //echo  "Bit: ". $bit1." Sumsec: ". $sumsecbit1." CountBit: ". $countbit1." SumFix: ".$fq1."\n";
             //echo  "Bit: ". $bit2." Sumsec: ". $sumsecbit2." CountBit: ". $countbit2." SumFix: ".$fq2."\n";
             //echo  "Bit: ". $bit3." Sumsec: ". $sumsecbit3." CountBit: ". $countbit3." SumFix: ".$fq3."\n";
             //echo  "Bit: ". $bit4." Sumsec: ". $sumsecbit4." CountBit: ". $countbit4." SumFix: ".$fq4."\n";
             //echo  "Bit: ". $bit5." Sumsec: ". $sumsecbit5." CountBit: ". $countbit5." SumFix: ".$fq5."\n";
             //echo  "Bit: ". $bit6." Sumsec: ". $sumsecbit6." CountBit: ". $countbit6." SumFix: ".$fq6."\n";
             //echo "****************************\n";

           
            // $ar_ac = $sumsecbit1 + $sumsecbit2 +  $sumsecbit3 + $sumsecbit4 + $sumsecbit5 +$sumsecbit6  + $sumsecbit7 + $sumsecbit8 ;
            // $ar_ac = $sumsecbit1 + $sumsecbit2 +  $sumsecbit3 + $sumsecbit4 + $sumsecbit5 +$sumsecbit6   ;
           
            $ar_ac = 3500;
            $sumsecbit5 = 3400;
            $countbit5 = 200;
            $pr_ac = $countbit5;

            
             $oee_ac = (( $ar_ac / 3600) * ( $countbit5 / $pr_by_hour) * ($oee_tg)) ;
             echo  "Oee: ". $oee_ac."\n";
             echo  "Bit: ". $bit1." Sumsec: ". $sumsecbit1." CountBit: ". $countbit1."\n";
             echo  "Bit: ". $bit2." Sumsec: ". $sumsecbit2." CountBit: ". $countbit2."\n";
             echo  "Bit: ". $bit3." Sumsec: ". $sumsecbit3." CountBit: ". $countbit3."\n";
             echo  "Bit: ". $bit4." Sumsec: ". $sumsecbit4." CountBit: ". $countbit4."\n";
             echo  "Bit: ". $bit5." Sumsec: ". $sumsecbit5." CountBit: ". $countbit5."\n";
             echo  "Bit: ". $bit6." Sumsec: ". $sumsecbit6." CountBit: ". $countbit6."\n";
             echo "****************************\n";
            //echo($countbit5);
             $query = 'INSERT INTO kpi_report_kpis
             ( Re_McNumber, 
             Re_Ar_Target, 
             Re_Ar_Actual, 
             Re_Pr_Target, 
             Re_Pr_Actual, 
             Re_Qr_Target, 
             Re_Qr_Actual, 
             Re_Oee_Target, 
             Re_Oee_Actual, 
             Re_Count_Bit1, 
             Re_Sum_Sec_Bit1, 
             Re_Count_Bit2, 
             Re_Sum_Sec_Bit2, 
             Re_Count_Bit3, 
             Re_Sum_Sec_Bit3, 
             Re_Count_Bit4, 
             Re_Sum_Sec_Bit4, 
             Re_Count_Bit5, 
             Re_Sum_Sec_Bit5, 
             Re_Count_Bit6, 
             Re_Sum_Sec_Bit6, 
            '// Re_Count_Bit7, 
             //Re_Sum_Sec_Bit7, 
            // Re_Count_Bit8, 
            // Re_Sum_Sec_Bit8, 
            .'Re_Shift, 
             Re_Location, 
             Re_Hs_S, 
             Re_Hs_E, 
             Re_Cal_By_Hs) 
             VALUES 
             ('."'".$mcnumber."'".',
             '."'".$ar_tg ."'".',
             '."'".$ar_ac."'".',
             '."'".$pr_by_hour."'".',
             '."'".$pr_ac ."'".',
             '."'".$oee_tg."'".',
             '."'".$oee_ac."'".',
             '."'".$oee_tg."'".',
             '."'".$oee_ac."'".',
             '."'".$countbit1."'".',
             '."'".$sumsecbit1."'".',
             '."'".$countbit2."'".',
             '."'".$sumsecbit2."'".',
             '."'".$countbit3."'".',
             '."'".$sumsecbit3."'".',
             '."'".$countbit4."'".',
             '."'".$sumsecbit4."'".',
             '."'".$countbit5."'".',
             '."'".$sumsecbit5."'".',
             '."'".$countbit6."'".',
             '."'".$sumsecbit6."'".',
             '//'."'".$countbit7."'".',
             //'."'".$sumsecbit7."'".',
             //'."'".$countbit8."'".',
             //'."'".$sumsecbit8."'".',
             ."'". $shifts ."'".',
             '."'".$location."'".',
             '."'".$dateGet .' '.$dateS."'".',
             '."'".$dateGet .' '.$dateE."'".',
             '."'".$dateGet .' '.$dateT."'".' )';
             $stmt = $this->conn->prepare($query);
             $stmt->execute();    
        } 
    }
    
}