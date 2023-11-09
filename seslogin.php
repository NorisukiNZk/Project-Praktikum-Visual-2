<?php
session_start();
$username= $_SESSION['username']; 
$isLoggedIn= $_SESSION['isLoggedIn'];

if($isLoggedIn != '1'){
    session_destroy();
    header('Location: login.php');
}
?>