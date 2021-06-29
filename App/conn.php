<?php
class Conn {
    protected $serverName = "localhost",
              $username = "root",
              $pass = "",
              $dbname = "oopcrud";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->serverName, $this->username, $this->pass, $this->dbname);

        if($this->conn->connect_error){
            die("Connection Failed". $this->conn->connect_error);
        }
    }
}
