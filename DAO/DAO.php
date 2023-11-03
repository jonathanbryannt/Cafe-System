<?php

class DAO {

    private $connection;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "CSIT314";        

        $this->$connection = new mysqli($servername, $username, $password, $dbname);
        if($this->$connection->connect_errorpublic) (die("connection failed"));
    }

    public function get_connection() {
        return $this->$connection;
    }

}

?>