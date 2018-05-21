<?php
    session_start();
    //include the database function right here
    include('db.php');

    //here we are receiving the data parsed from the javascript function
    $fname = data($_POST['fname']);
    $lname = data($_POST['lname']);
    $email = data($_POST['email']);
    $phone = data($_POST['phone']);
    $country = data($_POST['country']);
    $pass1 = md5(data($_POST['pass1']));
    $pass2 = md5(data($_POST['pass2']));
    $month = data($_POST['month']);
    $day = data($_POST['day']);
    $year = data($_POST['year']);


    $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
    //now let's perform some security checks
    if($fname == '' || $lname == '' || $email == '' || $phone == '' || $country == '' || $pass1 == '' || $pass2 == ''){
        // this means one of the fields is empty
        echo 'All fields are mandatory!';
    }
    else if(!is_numeric($day) || !is_numeric($year) || !in_array($month,$months)){
        //the DOB is invalid
        //they should provide a correct date of birth
        echo 'Please check your date of birth!';
    }
    else if($day >= 30 && $month == $months[1]){
        //there's nothing like 30th February
        echo 'Invalid date of birth!';
    }
    else if($pass1 != $pass2){
        // :)
        echo 'Your passwords do not match!';
    }
    else if(strlen($fname) < 3 || strlen($lname) < 3){
        echo 'One of your names is too short!';
    }
    else{
        $pos = array_search($month,$months)+1;
        //check if this email is already registered by someone
        $check = mysqli_query($db,"select * from user where email = '$email'") or die(mysqli_error($db));
        if(mysqli_num_rows($check) < 1){
            //register the user
            //the email was not found in the database
            $query = mysqli_query($db,"insert into user (`signupDate`,`fname`,`lname`,`email`,`phone`,`country`,`password`,`mm`,`dd`,`yy`) value(now(),'$fname','$lname','$email','$phone','$country','$pass1','$pos','$day','$year')") or die(mysqli_error($db));
            $select = mysqli_query($db,"select * from user where email='$email' and phone='$phone' and password = '$pass1' and country = '$country' and fname = '$fname' and lname = '$lname' order by id desc limit 1") or die(mysqli_error($db));
            $_SESSION['sessVar'] = $select->fetch_assoc();
            echo 'success';
        }
        else{
            //this email has been registered by someone, so this person shoule use another email address
            echo 'Please use another email!';
        }
    }
?>
