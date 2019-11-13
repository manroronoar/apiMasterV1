<?php 
  class Address {
    // DB stuff
    private $conn;
    private $table = 'provinces';

  //'PROVINCE_ID', 'PROVINCE_CODE', 'PROVINCE_NAME', 'GEO_ID', 'VRS_CODE
    public $PROVINCE_ID;
    public $PROVINCE_CODE;
    public $PROVINCE_NAME;
    public $VRS_CODE;
    public $GEO_ID;

    public function __construct($db) {
      $this->conn = $db;
    }

    // Get User all
    public function provinces_all() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table ;    

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
  }