<?php
//Get  connection information
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database_db = 'skye8tech';

    function connect() {
        global $host, $username, $password, $database_db;
        $conn = new mysqli($host, $username, $password, $database_db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    
?>