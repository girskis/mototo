<?php
ob_start();
require("connect.php");
$mysqli = new mysqli("localhost","root","","mototo");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


if (isset($_SESSION['user']))
{
  $user = $_SESSION['user'];
  
   	$Queryqslogv="SELECT * FROM users WHERE email='$user'";
	   $run_queryqslogv=mysqli_query($conn, $Queryqslogv) or die('Error!'.mysql_error());
			
					while($profilblogv=mysqli_fetch_array($run_queryqslogv))
								 {
								 $name=$profilblogv['name'];
								 $passs=$profilblogv['password'];
                                 }

}
else
{
  header("location:index.php");
}

$make = $_POST['make'];
$size = $_POST['size'];
$mileage = $_POST['mileage'];
$model = $_POST['model'];
$fuel = $_POST['fuel'];
$year = $_POST['year'];
$transmission = $_POST['transmission'];
$body = $_POST['body'];
$color = $_POST['color'];
$price = $_POST['price'];
$phone = $_POST['phone'];
$location = $_POST['location'];

$description = $mysqli -> real_escape_string($_POST['description']);

$android = $_POST['android'];
$apple = $_POST['apple'];
$sensors = $_POST['sensors'];
$bluetooth = $_POST['bluetooth'];
$camera = $_POST['camera'];

$id=time();



if(!empty($description) OR !empty($phone))
{

				  $todaye= date('M d, Y');
				  

	$Querylk="INSERT INTO vehicles(id,make,model,size,mileage,fuel,transmission,year,body,color,description,price,phone,android,apple,sensors,bluetooth,camera,location,user)
     VALUES('$id','$make','$model','$size','$mileage','$fuel','$transmission','$year','$body','$color','$description','$price','$phone','$android','$apple','$sensors','$bluetooth','$camera','$location','$user')";
	   mysqli_query($conn, $Querylk);


	header("location:post-vehicle2.php?id=$id");

}
else
{
	header("location:post-vehicle.php?make=$make");
		}