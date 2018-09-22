<?php
session_start();
include("header.php");
    if($_SESSION['akses'] == "admin")
        header("haladmin.php");
?>
<p>Welcome <?php echo $_SESSION['username'];?> di Dashboard User</p>


<a href="login.php?logout=exit">Log Out</a>