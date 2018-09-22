<?php
session_start();
include("header.php");
    if($_SESSION['akses'] == "user")
        header("haluser.php");
?>
<p>Welcome <?php echo $_SESSION['username'];?></p>



<a href="login.php?logout=exit">Log Out</a>