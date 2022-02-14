<?php

 include_once 'Header.php';

?>
<section>
    <div>
    <h2>Login</h2>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="userUid" placeholder="Username/Email...">
            <input type="password" name="password" placeholder="Password...">
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
    <?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput") {
            echo "Fill all fields";
        } else if($_GET["error"] == "wronglogin") {
            echo "Wrong Login info";
        }
    } 
?>
</section>