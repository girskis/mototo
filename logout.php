<?php
ob_start();
require("connect.php");

  session_destroy();
  unset($_SESSION['user']);  

    header("location:index.php");
?>