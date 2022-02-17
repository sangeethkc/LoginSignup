<?php

 include_once 'Header.php';

?>
<section>
    <div>
    <h2>Login</h2>
        <form action="includes/login.inc.php" method="post">
            <input type="text" class="form-control" name="userUid" placeholder="Username/Email...">
            <input type="password" class="form-control" name="password" placeholder="Password...">
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
        </form>
    </div>
    <?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput") {
            echo "<div class='alert alert-primary' role='alert'>Fill all fields!</div>;";
        } else if($_GET["error"] == "wronglogin") {
            echo "<div class='alert alert-primary' role='alert'>Wrong Login info</div>;";
        }
    }
?>
</section>