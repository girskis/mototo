<?php
session_start();
$_SESSION['token'] = bin2hex(random_bytes(32));
$conn=mysqli_connect('localhost','root','')or die(mysql_error());
mysqli_select_db($conn,'mototo');
?>