<?php

require_once 'conn.php';

class Auth extends Conn{

    public function Register($username, $password) {
        $sql = "INSERT INTO admin VALUES('','$username','$password')";

        $result = $this->conn->query($sql);
    }

}
