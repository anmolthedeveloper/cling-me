<?php
    session_start();
    include('php/db.php');
    if(!isset($_SESSION['sessVar'])){
        //include the login page
        include('startPage.php');
    }
    else{
        // everything is set, now include the main body of the website :D
        include('main.php');
    }
?>
