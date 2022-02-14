<?php

    function emptyInputSignup($name, $email, $username, $password, $rptpassword) {
        
        if (empty($name) || empty($email) || empty($username) || empty($password) || empty($rptpassword)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    function invalidUid($username){
        
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    function invalidEmail($email) {
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
        }
        else { 
            $result = false;
        }
        return $result;
    }
    function pwdMatch($password, $rptpassword) {
        
        if ($password !== $rptpassword){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    function Uidexists($conn, $username, $email) {
        $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;"; 
        $stmt =  mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            return $row; 
        } else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
    function createUser($conn, $name, $email, $username, $password) {
        $sql = "INSERT INTO users(userName, userEmail, userUid, userPwd) VALUES (?, ?, ?, ?);"; 
        $stmt =  mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedpwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../signup.php?error=none");
        exit();
    }

    function emptyInputLogin($username, $password) {
        
        if (empty($username) || empty($password)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    function loginUser($conn, $username, $password) {
        $uidExists = Uidexists($conn, $username, $username);

        if($uidExists === false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        $pwdHashed = $uidExists['userPwd'];
        $checkPwd = password_verify($password, $pwdHashed);

        if($checkPwd === false){
            header("location: ../login.php?error=wronglogin");
            exit();
        } else if($checkPwd === true) {
            session_start();
            $_SESSION['userId'] = $uidExists['userId'];
            $_SESSION['userUid'] = $uidExists['userUid'];
            header("location: ../index.php");
            exit();
        }
    }
?>