<?php 
  class Database {
    // DB Params
    //private $host = 'http://122.155.131.38/dbmgr';
    private $host = '127.0.0.1';
    private $db_name = 'db_kpi_report_isapp';
    private $username = 'root';
    //private $password = '1234';
    private $password = '';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name .';utf8_unicode_ci', $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
        
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }