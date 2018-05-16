<?php
    $host = 'localhost';
    $usr = 'root';
    $pass = '';
    $database = 'ClientDatabases-33353a30';
    $db = new mysqli($host,$usr,$pass,$database);
    function data($text){
        global $db;
        return mysqli_real_escape_string($db,htmlentities(trim($text)));
    }
?>
