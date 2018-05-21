<?php
    session_start();
    //include a database connection
    include('db.php');
    $email = data($_POST['email']);
    $password = md5(data($_POST['password']));

    //this query will check if $email is a registered user in the database.
    $check = mysqli_query($db,"select * from user where email = '$email'") or die(mysqli_error($db));
    if(mysqli_num_rows($check) > 0){
        //this account exists, let's check for the password validity
        $pass = mysqli_query($db,"select * from user where email = '$email' and password = '$password'") or die(mysqli_error($db));
        if(mysqli_num_rows($pass) < 1){
            //the email exists but the password is wrong
            echo 'Your password is incorrect!';
        }
        else{
            //the password and email have been matched
            $_SESSION['sessVar'] = $pass->fetch_assoc();
            echo 'success';
        }
    }
    else {
        //there's not any records for $email
        echo 'Please check your email!';
    }
?>
