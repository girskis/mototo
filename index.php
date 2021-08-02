<?php
require("connect.php");

if (isset($_POST['submitlogin']))
	{
$email=$_POST["email"];
$password=$_POST['password'];


		$verilog="SELECT * FROM users WHERE email='$email' AND password='$password'";
		$run_verilog=mysqli_query($conn,$verilog);
		$count=mysqli_num_rows($run_verilog);

		if($count>0)
		{

			$_SESSION['user'] = $email;

	header("location:index.php");
	}
	else
	{
	$response = "<span style='color:red;'>Invalid login details! Please try again.</span>";
  }
}

if (isset($_POST['submitregister']))
	{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST['password'];

    
    $tid = time();


    $Query="INSERT INTO users(id,name,email,password) VALUES('$tid','$name','$email','$password')";
  	   mysqli_query($conn, $Query);


	$response = "<span style='color:green;'>Success! You may now login.</span>";
  }
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Home • Mototo</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custom Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<!-- Fav and touch icons -->
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>


<!--Header-->
<header class="header_style2 nav-stacked affix-top" data-spy="affix" data-offset-top="1">
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-expand-lg">
    <div class="container">
	<div class="row header-row">
      <div class="navbar-header">
      	<div class="logo"> <a href="index.php"><img src="assets/images/logo.png" alt="image"/></a> </div>
		
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggler" type="button"> 
        	<i class="fa fa-bars"></i>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">

          <li><a href="index.php">Home</a></li>
          <li><a href="cars.php">Cars</a></li>

        </ul>
      </div>
      
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
                            <?php if (isset($_SESSION['user'])) {
                echo "<i class='fa fa-user-circle' aria-hidden='true'></i>";
              } ?>
                    </a>
              <ul class="dropdown-menu">
                <li><a href="account-settings.php">My Settings</a></li>
                <li><a href="my-vehicles.php">My Cars</a></li>
                <li><a href="post-vehicle.php">Sell a Car</a></li>
                <li><a href="logout.php">Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
         <div class="login_btn">
         
         
         
                <?php if (isset($_SESSION['user'])) {
                echo "<a href='logout.php' class='btn btn-xs uppercase'>Logout</a>";
              }
              else {
                echo "<a href='#loginform' class='btn btn-xs uppercase' data-toggle='modal' data-dismiss='modal'>Login / Register</a>";
              } ?>
           
          
                    <?php
					if (isset($response))
					{
					echo "<br> $response";
					}
					?>
          
          </div>
      </div>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>
<!-- /Header --> 


<!-- Banners -->
<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
	  <div class="col-md-7"></div>
        <div class="col-md-5">
          <div class="banner_content">
            <h1>Welcome to Mototo!</h1>
            <p>Looking for a car with the best features? Look no further! </p>
            <a href="cars.php" class="btn">Get Started <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Banners -->

<!--Featured Car-->
<section class="section-padding">
  <div class="container">
    <div class="section-header text-center">
      <h2>Latest  Cars <span>For Sale</span></h2>
    </div>
    <div class="row">
    
    
    
            <?php
               	$Que="SELECT * FROM vehicles ORDER BY id DESC LIMIT 0,2";
	   $run_que=mysqli_query($conn, $Que) or die('Error!'.mysql_error());
			
					while($profil=mysqli_fetch_array($run_que))
								 {
								 $vid=$profil['id'];
								 $make=$profil['make'];
								 $model=$profil['model'];
								 $fuel=$profil['fuel'];
								 $transmission=$profil['transmission'];
								 $color=$profil['color'];
								 $year=$profil['year'];
								 $price=$profil['price'];
								 $location=$profil['location'];
                                 

               	$Queg="SELECT * FROM vehicle_images WHERE vehicle_id='$vid' LIMIT 0,1";
	   $run_queg=mysqli_query($conn, $Queg) or die('Error!'.mysql_error());
			
					while($profilg=mysqli_fetch_array($run_queg))
								 {
								 $im=$profilg['image'];
                                 }


              echo "
      <div class='col-list-3'>
        <div class='featured-car-list'>
          <div class='featured-car-img'> <a href='vehicle-details.php?id=$vid'><img src='assets/images/cars/$im.jpg' class='img-fluid' alt='$make $model'></a>
            <div class='label_icon'>New</div>
          </div>
          <div class='featured-car-content'>
            <h6><a href='vehicle-details.php?id=$vid'>$make $model, $year</a></h6>
            <div class='price_info'>
              <p class='featured-price'>$$price</p>
              <div class='car-location'><span><i class='fa fa-map-marker' aria-hidden='true'></i> $location</span></div>
            </div>
          </div>
        </div>
      </div>
              ";
              }
            ?>
            
            


    </div>
  </div>
</section>
<!-- /Featured Car-->

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top-->


<?php

require("overlay.php");

?>


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>
