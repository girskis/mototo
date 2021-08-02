<?php
require("connect.php");



	$vid=$_GET['id'];

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
	
	 if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Password must have atleast 8 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    $tid = time();


    $Query="INSERT INTO users(id,name,email,password) VALUES('$tid','$name','$email','$password')";
  	   mysqli_query($conn, $Query);


	$response = "<span style='color:green;'>Registered successfully! You may now login.</span>";
  }

            
            
            
            
               	$Que="SELECT * FROM vehicles WHERE id='$vid'";
	   $run_que=mysqli_query($conn, $Que) or die('Error!'.mysql_error());
			
					while($profil=mysqli_fetch_array($run_que))
								 {
								 $make=$profil['make'];
								 $model=$profil['model'];
								 $fuel=$profil['fuel'];
								 $size=$profil['size'];
								 $transmission=$profil['transmission'];
								 $color=$profil['color'];
								 $year=$profil['year'];
								 $price=$profil['price'];
								 $description=$profil['description'];
								 $location=$profil['location'];
								 $phone=$profil['phone'];
                                 $mileage=$profil['mileage'];
                                 $guser=$profil['user'];
                                 
								 $android=$profil['android'];
								 $apple=$profil['apple'];
								 $sensors=$profil['sensors'];
								 $bluetooth=$profil['bluetooth'];
								 $camera=$profil['camera'];
                                 

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
  <title>Car Details • Mototo</title>
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

  <!-- Listing-detail-header -->
  <section class="listing_detail_header">
    <div class="container">
      <div class="listing_detail_head white-text div_zindex row">
        <div class="col-md-9">
          <h2><?php echo "$make $model"; ?></h2>
          <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i>
              <?php echo $location; ?></span></div>
        </div>
        <div class="col-md-3">
          <div class="price_info">
            <p>€<?php echo $price; ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="dark-overlay"></div>
  </section>
  <!-- /Listing-detail-header -->


  <!--Listing-detail-->
  <section class="listing-detail">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="listing_images">
            <div class="listing_images_slider">
              <?php

               	$Queg="SELECT * FROM vehicle_images WHERE vehicle_id='$vid'";
	   $run_queg=mysqli_query($conn, $Queg) or die('Error!'.mysql_error());
			
					while($profilg=mysqli_fetch_array($run_queg))
								 {
								 $im=$profilg['image'];
                                 
            echo "<div><img src='assets/images/cars/$im.jpg'></div>";
                                 }





?>
            </div>
            <div class="listing_images_slider_nav">
              <?php

               	$Quegzz="SELECT * FROM vehicle_images WHERE vehicle_id='$vid'";
	   $run_quegzz=mysqli_query($conn, $Quegzz) or die('Error!'.mysql_error());
			
					while($profilgzz=mysqli_fetch_array($run_quegzz))
								 {
								 $im=$profilgzz['image'];
                                 
            echo "<div><img src='assets/images/cars/$im.jpg'></div>";
                                 }





?>
            </div>
          </div>
          <div class="main_features">
            <ul>
              <li> <i class="fa fa-tachometer" aria-hidden="true"></i>
                <h5><?php echo $mileage; ?></h5>
                <p>Total Miles</p>
              </li>
              <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                <h5><?php echo $year; ?></h5>
                <p>Year</p>
              </li>
              <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                <h5><?php echo $fuel; ?></h5>
                <p>Fuel Type</p>
              </li>
              <li> <i class="fa fa-power-off" aria-hidden="true"></i>
                <h5><?php echo $transmission; ?></h5>
                <p>Transmission</p>
              </li>
              <li> <i class="fa fa-superpowers" aria-hidden="true"></i>
                <h5><?php echo $size; ?>L</h5>
                <p>Engine Size</p>
              </li>
              <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                <h5><?php echo $color; ?></h5>
                <p>Color</p>
              </li>

            </ul>
          </div>
          <div class="listing_more_info">
            <div class="listing_detail_wrap">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs gray-bg" role="tablist">
                <li role="presentation"><a class="active" href="#vehicle-overview " aria-controls="vehicle-overview"
                    role="tab" data-toggle="tab">Vehicle
                    Description </a></li>
                <li role="presentation"><a href="#accessories " aria-controls="vehicle-overview" role="tab"
                    data-toggle="tab">Features </a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <!-- vehicle-overview -->
                <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                  <p><?php echo $description; ?></p>
                </div>


                <!-- Accessories -->
                <div role="tabpanel" class="tab-pane" id="accessories">
                  <!--Accessories-->
                  <table>
                    <thead>
                      <tr>
                        <th colspan="2">Features</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Android Auto</td>
                        <td>
                          <?php if ($android == 'on')
                      {echo "<i class='fa fa-check'' aria-hidden='true'></i>";}
                      ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Apple CarPlay</td>
                        <td>
                          <?php if ($apple == 'on')
                      {echo "<i class='fa fa-check'' aria-hidden='true'></i>";}
                      ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Parking Sensors</td>
                        <td>
                          <?php if ($sensors == 'on')
                      {echo "<i class='fa fa-check'' aria-hidden='true'></i>";}
                      ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Bluetooth</td>
                        <td>
                          <?php if ($bluetooth == 'on')
                      {echo "<i class='fa fa-check'' aria-hidden='true'></i>";}
                      ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Parking Camera</td>
                        <td>
                          <?php if ($camera == 'on')
                      {echo "<i class='fa fa-check'' aria-hidden='true'></i>";}
                      ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>


          </div>
        </div>

        <!--Side-Bar-->
        <aside class="col-md-3">

          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-address-card-o" aria-hidden="true"></i> Contact Details </h5>
            </div>
            <div class="dealer_detail">
              <?php

               	$Quegzzc="SELECT * FROM users WHERE email='$guser'";
	   $run_quegzzc=mysqli_query($conn, $Quegzzc) or die('Error!'.mysql_error());
			
					while($profilgzzc=mysqli_fetch_array($run_quegzzc))
								 {
								 $nm=$profilgzzc['name'];
                                 }
            echo "
            <p><span>Name:</span> $nm</p>
            <p><span>Phone:</span> $phone</p>
            <p><span>Location:</span> $location</p>
            ";
                                 





?>

            </div>

        </aside>
        <!--/Side-Bar-->

      </div>
      <div class="space-20"></div>
      <div class="divider"></div>


    </div>
  </section>
  <!--/Listing-detail-->

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