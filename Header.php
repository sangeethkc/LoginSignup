<?php
 session_start()
?>

<!DOCTYPE html>
<header>
    
</header>
<nav>
    <div class="wrapper">
        <a href="index.php"></a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php
                if (isset($_SESSION['userUid'])){
                    echo "<li><a href='profile.php'>Profile</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                } else {
                    echo "<li><a href='signup.php'>Signup</a></li>";
                    echo "<li><a href='login.php'>Login</a></li>";
                }
            ?>  
        </ul>
    </div>
</nav>