<?php
session_start();


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$flag = false;



if($name){
    $flag = true;
}else{
    $_SESSION['name_error'] = "name is missing";
    header("location: registration.php");
}


if($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $flag = true;

    } else {
        $_SESSION['email_error'] = "email is invalid";
        header(": rlocationegistration.php");
    }
}else{
    $_SESSION['email_error'] = "email is missing";
    header("location: registration.php");
}

if ($password) {
   if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){
    $flag = true;

   }else{
        $_SESSION['password_error'] = "password rtequirement can't match";
        header("location: registration.php");
   }
} else {
    $_SESSION['password_error'] = "password is missing";
    header("location: registration.php");
}

if ($confirm_password) {
    if ($confirm_password == $password) {
        $flag = true;
    } else {
        $_SESSION['password_error'] = "password rtequirement can't match";
        header("location: registration.php");
    }
} else {
    $_SESSION['password_error'] = "password is missing";
    header("location: registration.php");
}

if($flag == true){
    if($name && $email && $password){
            $db_connect = mysqli_connect('localhost','root','','kufa');
    }else{
        $_SESSION['db_connect_error'] = "field can't be empty";
        header("location: registration.php");
    }

}else{
    $_SESSION['db_connect_error'] = "something is wrong";
    header("location: registration.php");
}



?>