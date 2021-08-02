<?php
require("connect.php");



if(isset($_GET['make']))
{
	$bb=$_GET['make'];
}

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
	
	$hash = password_hash($password, PASSWORD_DEFAULT);
    
    $tid = time();

    $Query="INSERT INTO users(id,name,email,password) VALUES('$tid','$name','$email','$password')";
  	   mysqli_query($conn, $Query);

	$response = "<span style='color:green;'>Registered successfully! You may now login.</span>";
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
  <title>Cars for Sale • Mototo</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <!-- Custom Style -->
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <!-- OWL Carousel slider-->
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <!-- slick-slider -->
  <link href="assets/css/slick.css" rel="stylesheet">
  <!-- bootstrap-slider -->
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <!-- FontAwesome Font Style -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <!-- Favicon -->
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
            <div class="logo"> <a href="index.php"><img src="assets/images/logo.png" alt="image" /></a>
            </div>

            <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse"
              class="navbar-toggler" type="button">
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
                    <li><a href="account-settings.php">Settings</a></li>
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


  <!--Page Header-->
  <section class="page-header listing_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Cars for Sale</h1>
        </div>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Listing-->
  <section class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">

          <?php
            
					if(isset($_GET['model']))
								 {
								    
            $gmake = $_GET['make'];
            $gmodel = $_GET['model'];
            $gandroid = $_GET['android'];
            $gapple = $_GET['apple'];
            $gsensors = $_GET['sensors'];
            $gbluetooth = $_GET['bluetooth'];
            $gcamera = $_GET['camera'];
            
               	$Que="SELECT * FROM vehicles WHERE make='$gmake' AND model='$gmodel' AND (android='$gandroid' OR apple='$gapple' OR sensors='$gsensors' OR bluetooth='$gbluetooth' OR camera='$gcamera') ORDER BY id DESC";
	   $run_que=mysqli_query($conn, $Que) or die('Error!'.mysql_error());
			
					while($profil=mysqli_fetch_array($run_que))
								 {
								 $vid=$profil['id'];
								 $make=$profil['make'];
								 $model=$profil['model'];
								 $fuel=$profil['fuel'];
								 $mileage=$profil['mileage'];
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
        <div class='product-listing-m gray-bg'>
          <div class='product-listing-img'> <a href='vehicle-details.php?id=$vid'><img src='assets/images/cars/$im.jpg' class='img-fluid' /> </a>
          </div>
          <div class='product-listing-content'>
            <h5><a href='vehicle-details.php?id=$vid'>$make $model</a></h5>
            <p class='list-price'>$$price</p>
            <ul>
              <li><i class='fa fa-tachometer' aria-hidden='true'></i>$mileage miles</li>
              <li><i class='fa fa-calendar' aria-hidden='true'></i>$year model</li>
              <li><i class='fa fa-car' aria-hidden='true'></i>$fuel</li>
            </ul>
            <a href='vehicle-details.php?id=$vid' class='btn'>View Details <span class='angle_arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></span></a>
            <div class='car-location'><span><i class='fa fa-map-marker' aria-hidden='true'></i> $location</span></div>
          </div>
        </div>
              ";
              }
              }
              
              
              
              
            
					else
								 {
            
               	$Que="SELECT * FROM vehicles ORDER BY id DESC";
	   $run_que=mysqli_query($conn, $Que) or die('Error!'.mysql_error());
			
					while($profil=mysqli_fetch_array($run_que))
								 {
								 $vid=$profil['id'];
								 $make=$profil['make'];
								 $model=$profil['model'];
								 $fuel=$profil['fuel'];
								 $mileage=$profil['mileage'];
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
        <div class='product-listing-m gray-bg'>
          <div class='product-listing-img'> <a href='vehicle-details.php?id=$vid'><img src='assets/images/cars/$im.jpg' class='img-fluid' /> </a>
          </div>
          <div class='product-listing-content'>
            <h5><a href='vehicle-details.php?id=$vid'>$make $model</a></h5>
            <p class='list-price'>$$price</p>
            <ul>
              <li><i class='fa fa-tachometer' aria-hidden='true'></i>$mileage miles</li>
              <li><i class='fa fa-calendar' aria-hidden='true'></i>$year model</li>
              <li><i class='fa fa-car' aria-hidden='true'></i>$fuel</li>
            </ul>
            <a href='vehicle-details.php?id=$vid' class='btn'>View Details <span class='angle_arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></span></a>
            <div class='car-location'><span><i class='fa fa-map-marker' aria-hidden='true'></i> $location</span></div>
          </div>
        </div>
              ";
              }
              }
              
              
              
              
            ?>

        </div>

        <!--Side-Bar-->
        <aside class="col-md-3 col-md-pull-9">
          <div class="sidebar_widget sidebar_search_wrap">
            <div class="widget_heading">
              <h5><i class="fa fa-filter" aria-hidden="true"></i> Filter </h5>
            </div>
            <div class="sidebar_filter">
              <form action="action-search.php" method="POST">

                <div class="form-group select">
                  <select class="form-control" name="make" onchange='if(this.value != 0) { this.form.submit(); }'>
                    <option value="">Select Make</option>
                  
                  <?php
								  if(isset($_GET['make']))
                  {
                    $bb = $_GET['make'];
                  echo "
                                                      <option value='$bb' selected>$bb</option>
                  ";
                  }
                  
                  
	$Quedy2="SELECT DISTINCT make FROM cars ORDER BY make ASC";
	   $run_quedy2=mysqli_query($conn, $Quedy2) or die('Error!'.mysql_error());

					while($profidy2=mysqli_fetch_array($run_quedy2))
								 {
								 $bran=$profidy2['make'];

								 echo "
                                                    <option value='$bran'>$bran</option>
								 ";
								 }
                  ?>
                  </select>
                </div>
                <div class="form-group select">
                  <select class="form-control" name="model">
                    <option value="">Select Model</option>
                    <?php
								 if(isset($_GET['model']))
								 {
									 $mm = $_GET['model'];
								 echo "
                                                    <option value='$mm' selected>$mm</option>
								 ";
								 }

	$Quedy2d="SELECT DISTINCT model FROM cars WHERE make='$bb' ORDER BY model ASC";
	   $run_quedy2d=mysqli_query($conn, $Quedy2d) or die('Error!'.mysql_error());

					while($profidy2d=mysqli_fetch_array($run_quedy2d))
								 {
								 $mod=$profidy2d['model'];

								 echo "
                                                    <option value='$mod'>$mod</option>
								 ";
								 }
                  ?>
                  </select>
                </div>

                <div class="vehicle_accessories">
              <div class="form-group checkbox">
                <input id="aa" type="checkbox" name="android" <?php if (isset($gandroid)) {if ($gandroid == 'on') {echo 'checked';}}; ?>>
                <label for="aa">Android Auto</label>
                  </div>
                  <div class="form-group checkbox">
                    <input id="acp" value="acp" type="checkbox" name="apple"
                      <?php if (isset($gapple)) {if ($gapple == 'on') {echo 'checked';}}; ?>>
                    <label for="acp">Apple CarPlay</label>
                  </div>
                  <div class="form-group checkbox">
                    <input id="ps" value="ps" type="checkbox" name="sensors"
                      <?php if (isset($gsensors)) {if ($gsensors == 'on') {echo 'checked';}}; ?>>
                    <label for="ps">Parking Sensors</label>
                  </div>
                  <div class="form-group checkbox">
                    <input id="bt" type="checkbox" name="bluetooth"
                      <?php if (isset($gbluetooth)) {if ($gbluetooth == 'on') {echo 'checked';}}; ?>>
                    <label for="bt">Bluetooth</label>
                  </div>
                  <div class="form-group checkbox">
                    <input id="cam" type="checkbox" name="camera"
                      <?php if (isset($gcamera)) {if ($gcamera == 'on') {echo 'checked';}}; ?>>
                    <label for="cam">Parking Camera</label>
                  </div>
                </div>



                <div class="form-group">
                  <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i>
                    Filter</button>
                </div>
              </form>
            </div>
          </div>


        </aside>
        <!--/Side-Bar-->
      </div>
    </div>
  </section>
  <!-- /Listing-->

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