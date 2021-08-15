<?php
  class database {
     // DB Params
private $host = 'localhost';
private $db_name = 'Jobs';
private $username = 'Stephan';
private $password = '12345';
private $conn;

// DB Connect
public function connect () {
    $this->conn = null;

try {
 $this->conn = new PDO('mySQL:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
 $this->conn->setattribute(PDO::ATTR_ERRMODE, PDO::);
} catch(PDOException $e) {
    echo 'connection error: ' . $e->getMessage();
}    
} 
Return $this->conn;
  }
}