<?php
 session_start()
?>

<!DOCTYPE html>
<header>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
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
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
    </div>
</nav>