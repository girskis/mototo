<?php
require("connect.php");




  $id = $_GET['id'];

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



  if (isset($_POST["submit"]))
  {

    $old=$_POST['old'];
    $new=$_POST['new'];
    $renew=$_POST['renew'];


	if ($old == $passs)
  {

	if ($new == $renew)
  {

	$Query="UPDATE users SET password='$new' WHERE email='$user'";
	   mysqli_query($conn, $Query);

       	      $response="<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              Your password has been changed successfully!</div>";

  }
  else
     {
            	      $response="<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              Error! Please retype your new password.</div>";


  }
  }
  else
     {
            	      $response="<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              Error! Password is incorrect!</div>";


  }

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
  <title>Sell a Car • Mototo</title>
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
            <div class="logo"> <a href="index.html"><img src="assets/images/logo.png" alt="image" /></a> </div>

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

            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navigation end -->

  </header>
  <!-- /Header -->


  <!--Page Header-->
  <section class="page-header profile_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Sell a Car</h1>
        </div>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Post-vehicle-->
  <section class="user_profile inner_pages">
    <div class="container">

      <div class="row">
        <div class="col-md-3 col-sm-3">
          <div class="profile_nav">
            <ul>
              <li><a href="profile-settings.html">Profile Settings</a></li>
              <li><a href="my-vehicles.html">My Cars</a></li>
              <li class="active"><a href="post-vehicle.html">Sell a Car</a></li>
              <li><a href="#">Sign Out</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-sm-8">
          <div class="profile_wrap">
            <h5 class="uppercase underline">Sell a Car</h5>


            <form id="form" action="image-action.php" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <label class="control-label">Upload Images</label>
                <div class="vehicle_images">

                  <?php
       $Queryqsl="SELECT * FROM vehicle_images WHERE vehicle_id='$id'";
	   $run_queryqsl=mysqli_query($conn, $Queryqsl) or die('Error!'.mysql_error());
			
					while($profilbl=mysqli_fetch_array($run_queryqsl))
								 {
								 $imm=$profilbl['image'];

                echo "<div><img src='assets/images/cars/$imm.jpg'></div>";

                                 }
         ?>



                  <div class="upload_more_img">
                    <input type="hidden" id="upload" name="pid" value="<?php echo $id; ?>">
                    <input type="file" id="upload" name="image" onchange="form.submit()">
                  </div>
                </div>
              </div>

            </form>

            <div class="form-group">
              <a href="my-vehicles.php"><button name="submit" class="btn">Complete <span class="angle_arrow"><i
                      class="fa fa-angle-right" aria-hidden="true"></i></span></button></a>
            </div>





          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/Post-vehicle-->

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