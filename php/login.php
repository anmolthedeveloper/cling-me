<?php
    session_start();
    include('db.php');
    $email = data($_POST['email']);
    $password = md5(data($_POST['password']));
    $check = mysqli_query($db,"select * from user where email = '$email'") or die(mysqli_error($db));
    if(mysqli_num_rows($check) > 0){
        //this account exists, let's check for the password validity
        $pass = mysqli_query($db,"select * from user where email = '$email' and password = '$password'") or die(mysqli_error($db));
        if(mysqli_num_rows($pass) < 1){
            echo 'Your password is incorrect!';
        }
        else{
            $_SESSION['sessVar'] = $pass->fetch_assoc();
            echo 'success';
        }
    }
    else {
        echo 'Please check your email!';
    }
?>
