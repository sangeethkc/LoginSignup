<?php

if(isset($_POST['submit'])){
    echo "It works";

    $name= $_POST['name'];
    $email= $_POST['email'];
    $username= $_POST['username'];
    $password= $_POST['password'];
    $rptpassword= $_POST['rptpassword'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $password, $rptpassword) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($password, $rptpassword) !== false){
        header("location: ../signup.php?error=passwordsmissmatch");
        exit();
    }
    if (Uidexists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $password);

} else {
    header("location: ../signup.php");
}