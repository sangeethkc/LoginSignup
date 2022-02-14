<?php

 include_once 'Header.php';

?>

<?php
    if (isset($_SESSION['userUid'])){
        echo "<p>Hello there ".$_SESSION['userUid']."</p>";
    }
?> 