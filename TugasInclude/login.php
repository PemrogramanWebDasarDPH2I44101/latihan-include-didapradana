
<?php
session_start();
include("header.php");
$akun = array(
    array("dida","dida", "user"),
    array("admin","admin","admin")
);  
if (@$_SESSION['sukses_admin']) {
    header("location: haladmin.php");
} 
if (@$_SESSION['sukses_user']) {
    header("location: haluser.php");
}
if (@$_GET['logout']) {
    session_destroy();
    header("location: login.php");
}
?>
<form method="post">
    <input type="text" name="username"> Username<br>
    <input type="password" name="password"> Password<br>
    <br>
    <input type="submit" name="kirim" value="LOGIN"> 
</form>
<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
   
    $cek=0;
    for ($i = 0; $i < count($akun); $i++) { 
        if ( $akun[$i][0] == $username && $akun[$i][1] == $password) {
            if ( $akun[$i][2] == "admin") {
                header("location: haladmin.php");
                $_SESSION['sukses_admin']="Berhasil";
                $_SESSION['akses'] = $akun[$i][2];
            }else {
                header("location: haluser.php");
                $_SESSION['sukses_user']="Berhasil";
                $_SESSION['akses'] = $akun[$i][2];
            }
            $cek=1;
        }
    }
    if ($cek == 0) {
        ?>
        <script type="text/javascript">
        alert("Username/Password salah");
        </script>
        <?php
    }
}
?>