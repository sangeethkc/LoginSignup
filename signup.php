<?php

 include_once 'Header.php';

?>
<section>
    <h2>Signup</h2>
    <div>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full Name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="text" name="username" placeholder="User Name...">
            <input type="password" name="password" placeholder="Password...">
            <input type="password" name="rptpassword" placeholder="Repeat Password...">
            <button type="submit" name="submit">Signup</button>
        </form>
    </div>
<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput") {
            echo "Fill all fields";
        } else if($_GET["error"] == "invaliduid") {
            echo "Choose a better user name";
        } else if($_GET["error"] == "invalidemail") {
            echo "Incorrect Email";
        } else if($_GET["error"] == "passwordsmissmatch") {
            echo "Password does not match";
        } else if($_GET["error"] == "usernametaken") {
            echo "Username already exists";
        } else if($_GET["error"] == "stmtfailed") {
            echo "Something went wrong";
        } else if($_GET["error"] == "none") {
            echo "Signup successful";
        }
    } 
?>
</section>