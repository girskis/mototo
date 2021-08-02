<?php
require("connect.php");


  $id = $_GET['id'];

   	$Queryqslogv="DELETE FROM vehicles WHERE id='$id'";
    mysqli_query($conn, $Queryqslogv) or die('Error!'.mysql_error());
			
	header("location:my-vehicles.php");

?>