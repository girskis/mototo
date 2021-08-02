<?php
ob_start();
require("connect.php");

$pid=$_POST['pid'];

$pixtype=$_FILES['image']['type'];
$pixname=$_FILES['image']['name'];
$pixtmp=$_FILES['image']['tmp_name'];
	
     $tim_new_name=time();
	 $mid=md5($tim_new_name);
 	move_uploaded_file($pixtmp,"assets/images/cars/".$mid.".jpg");
	
	$Query="INSERT INTO vehicle_images(id,vehicle_id,image) VALUES('$tim_new_name','$pid','$mid')";
	   mysqli_query($conn, $Query);		
	header("location:post-vehicle2.php?id=$pid");	
?>