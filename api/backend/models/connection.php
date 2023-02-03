<?php

class connection {

    protected static $servername = "localhost";
    protected static $username = "root";
    protected static $password = "123456";
    protected static $db = "cinehall";

    function connection(){
        $conn = mysqli_connect(self::$servername,self::$username,self::$password,self::$db);
        if (!$conn) {
            die("conn failed" .mysqli_connect_error());
          }
        return $conn;
    }
}