<?php
class Kamu{
    public $conn="ical";
    public function __construct(){
        $this->conn = 1;
    }

}
class Aku extends Kamu{
    public function setConn(){
        return $this->conn;
    } 
}
$obj = new Aku();
$obj->setConn();

echo $obj->setConn();
