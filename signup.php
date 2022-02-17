<?php

 include_once 'Header.php';

?>
<section>
    <h2>Signup</h2>
    <div>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" class="form-control" name="name" placeholder="Full Name...">
            <input type="text" class="form-control" name="email" placeholder="Email...">
            <input type="text" class="form-control" name="username" placeholder="User Name...">
            <input type="password" class="form-control" name="password" placeholder="Password...">
            <input type="password" class="form-control" name="rptpassword" placeholder="Repeat Password...">
            <button type="submit" class="btn btn-primary" name="submit">Signup</button>
        </form>
    </div>
<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput") {
            echo "<div class='alert alert-primary' role='alert'>Fill all fields</div>;";
        } else if($_GET["error"] == "invaliduid") {
            echo "<div class='alert alert-primary' role='alert'>Choose a better user name</div>;";
        } else if($_GET["error"] == "invalidemail") {
            echo "<div class='alert alert-primary' role='alert'>Incorrect Email</div>;";
        } else if($_GET["error"] == "passwordsmissmatch") {
            echo "<div class='alert alert-primary' role='alert'>Password does not match</div>;";
        } else if($_GET["error"] == "usernametaken") {
            echo "<div class='alert alert-primary' role='alert'>Username already exists</div>;";
        } else if($_GET["error"] == "stmtfailed") {
            echo "<div class='alert alert-primary' role='alert'>Something went wrong</div>;";
        } else if($_GET["error"] == "none") {
            echo "<div class='alert alert-primary' role='alert'>Signup successful</div>;";
        }
    } 
?>
</section>