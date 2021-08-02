<?php
require("connect.php");



if(isset($_GET['make']))
{
	$bb=$_GET['make'];
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
              <li><a href="account-settings.php">Settings</a></li>
              <li><a href="my-vehicles.php">My Cars</a></li>
              <li class="active"><a href="post-vehicle.php">Sell a Car</a></li>
              <li><a href="logout.php">Sign Out</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-sm-8">
          <div class="profile_wrap">
            <h5 class="uppercase underline">Sell a Car</h5>
            <form action="action.php" method="POST">

              <div class="form-group">
                <label class="control-label">Select Make</label>
                <div class="select">
                  <select class="form-control white_bg" name="make"
                    onchange='if(this.value != 0) { this.form.submit(); }' required>

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
              </div>
              <div class="form-group">
                <label class="control-label">Select Model</label>
                <div class="select">
                  <select class="form-control white_bg" name="model" required>


                    <?php
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
              </div>
              <div class="form-group">
                <label class="control-label">Engine Size (Litres)</label>
                <input class="form-control white_bg" id="Price" type="text" name="size">
              </div>
              <div class="form-group">
                <label class="control-label">Mileage</label>
                <input class="form-control white_bg" id="Price" type="number" name="mileage" required>
              </div>
              <div class="form-group">
                <label class="control-label">Fuel Type</label>
                <div class="select">
                  <select class="form-control white_bg" name="fuel" required>
                    <option>Petrol</option>
                    <option>Diesel</option>
                    <option>Hybrid</option>
                    <option>Electric</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Transmission</label>
                <div class="select">
                  <select class="form-control white_bg" name="transmission" required>
                    <option>Auto</option>
                    <option>Manual</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Year</label>
                <div class="select">
                  <select class="form-control white_bg" name="year" required>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                    <option value="1990">1990</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1987">1987</option>
                    <option value="1986">1986</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1983">1983</option>
                    <option value="1982">1982</option>
                    <option value="1981">1981</option>
                    <option value="1980">1980</option>
                    <option value="1979">1979</option>
                    <option value="1978">1978</option>
                    <option value="1977">1977</option>
                    <option value="1976">1976</option>
                    <option value="1975">1975</option>
                    <option value="1974">1974</option>
                    <option value="1973">1973</option>
                    <option value="1972">1972</option>
                    <option value="1971">1971</option>
                    <option value="1970">1970</option>
                    <option value="1969">1969</option>
                    <option value="1968">1968</option>
                    <option value="1967">1967</option>
                    <option value="1966">1966</option>
                    <option value="1965">1965</option>
                    <option value="1964">1964</option>
                    <option value="1963">1963</option>
                    <option value="1962">1962</option>
                    <option value="1961">1961</option>
                    <option value="1960">1960</option>
                    <option value="1959">1959</option>
                    <option value="1958">1958</option>
                    <option value="1957">1957</option>
                    <option value="1956">1956</option>
                    <option value="1955">1955</option>
                    <option value="1954">1954</option>
                    <option value="1953">1953</option>
                    <option value="1952">1952</option>
                    <option value="1951">1951</option>
                    <option value="1950">1950</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label">Body Type</label>
                <div class="select">
                  <select class="form-control white_bg" name="body" required>
                    <option>Cabriolet</option>
                    <option>Coupe</option>
                    <option>Saloon</option>
                    <option>Hatchback</option>
                    <option>Estate</option>
                    <option>MPV</option>
                    <option>SUV</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label">Body Type</label>
                <div class="select">
                  <select class="form-control white_bg" id="Price" type="text" name="color" required>
                    <option id='White'>White</option>
                    <option id='Black'>Black</option>
                    <option id='Gray'>Gray</option>
                    <option id='Silver'>Silver</option>
                    <option id='Red'>Red</option>
                    <option id='Blue'>Blue</option>
                    <option id='Brown'>Brown</option>
                    <option id='Green'>Green</option>
                    <option id='Beige'>Beige</option>
                    <option id='Orange'>Orange</option>
                    <option id='Gold'>Gold</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label">Vehicle Overview Description</label>
                <textarea class="form-control white_bg" rows="4" name="description" required></textarea>
              </div>
              <div class="form-group">
                <label class="control-label">Price (€)</label>
                <input class="form-control white_bg" id="Price" type="number" name="price" required>
              </div>
              <div class="form-group">
                <label class="control-label">Contact Phone Number</label>
                <input class="form-control white_bg" id="Price" type="number" name="phone" required>
              </div>

              <div class="form-group">
                <label class="control-label">Vehicle Location</label>
                <div class="select">
                  <select class="form-control white_bg" id="Price" type="text" name="location" required>
                    <option id='Antrim'>Antrim</option>
                    <option id='Armagh'>Armagh</option>
                    <option id='Carlow'>Carlow</option>
                    <option id='Cavan'>Cavan</option>
                    <option id='Clare'>Clare</option>
                    <option id='Cork'>Cork</option>
                    <option id='Derry'>Derry</option>
                    <option id='Donegal'>Donegal</option>
                    <option id='Down'>Down</option>
                    <option id='Dublin'>Dublin</option>
                    <option id='Fermanagh'>Fermanagh</option>
                    <option id='Galway'>Galway</option>
                    <option id='Kerry'>Kerry</option>
                    <option id='Kildare'>Kildare</option>
                    <option id='Kilkenny'>Kilkenny</option>
                    <option id='Laois'>Laois</option>
                    <option id='Leitrim'>Leitrim</option>
                    <option id='Limerick'>Limerick</option>
                    <option id='Longford'>Longford</option>
                    <option id='Louth'>Louth</option>
                    <option id='Mayo'>Mayo</option>
                    <option id='Meath'>Meath</option>
                    <option id='Monaghan'>Monaghan</option>
                    <option id='Offaly'>Offaly</option>
                    <option id='Roscommon'>Roscommon</option>
                    <option id='Sligo'>Sligo</option>
                    <option id='Tipperary'>Tipperary</option>
                    <option id='Tyrone'>Tyrone</option>
                    <option id='Waterford'>Waterford</option>
                    <option id='Westmeath'>Westmeath</option>
                    <option id='Wexford'>Wexford</option>
                  </select>
                </div>
              </div>



              <div class="gray-bg field-title">
                <h6>Features</h6>
              </div>
              <div class="vehicle_accessories">
                <div class="form-group checkbox col-md-6 accessories_list">
                  <input id="aa" type="checkbox" name="android">
                  <label for="aa">Android Auto</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                  <input id="acp" type="checkbox" name="apple">
                  <label for="acp">Apple CarPlay</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                  <input id="ps" type="checkbox" name="sensors">
                  <label for="ps">Parking Sensors</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                  <input id="bt" type="checkbox" name="bluetooth">
                  <label for="bt">Bluetooth</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                  <input id="pc" type="checkbox" name="camera">
                  <label for="pc">Parking Camera</label>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn">Next <span class="angle_arrow"><i class="fa fa-angle-right"
                      aria-hidden="true"></i></span></button>
              </div>
            </form>
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
if ($_POST['token'] == $_SESSION['token']) 
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