<?php
class Database{
    private $dbServername = "localhost";
    private $dbUsername = "root";
    private $dbPasword = "";
    private $dbName = "acs";
    private $conn = null;

function getConnection(){
  try{
    $this->conn = mysqli_connect($this->dbServername, $this->dbUsername, $this->dbPasword, $this->dbName);
    }catch(Exception $e){
      echo "Connection error: " . $e->getMessage();
    }
    return $this->conn;
  }
}
 ?>
