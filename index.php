<?php
include 'db.php';
?>

<?php
if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$text = $_POST['feed'];

	$query = "INSERT INTO feedback(fname,lname, email, feedback) VALUES ('$fname','$lname', '$email', '$text')";
	$query = mysqli_real_query($conn, $query);
	if (!$query) {

		echo "<script>alert('Error!.');</script>";
	} else {
		echo "<script>alert('Message is Sent.');</script>";
	}
}

?>
<?php
if (isset($_POST['log'])) {
	$idnum = $_POST['id'];
	$pword = $_POST['password'];
	session_start();
	// require "adminconfig.php";
	$message = "";
	if (count($_POST) > 0) {
		$con = mysqli_connect('127.0.0.1', 'root', '', 'knh') or die('Unable To connect');
		$result = mysqli_query($con, "SELECT * FROM staff WHERE idnumber='" . $_POST["id"] . "' 
	and password = '" . $_POST["password"] . "'");
		$row  = mysqli_fetch_array($result);
		if (is_array($row)) {
			$_SESSION["fname"] = $row['fname'];
			$_SESSION["lname"] = $row['lname'];
			$_SESSION["idnumber"] = $row['idnumber'];
			$_SESSION["role"] = $row['role'];
			// header("Location:home.php");

			if ($_SESSION['role'] == 'admin') { //echo "Welcome administrator"; 
				header('Location:admin.php');
			} else if ($_SESSION['role'] == 'doctor') { //echo "Welcome Customer";
				header('Location: doctor.php');
			} else if ($_SESSION['role'] == 'patient') { //echo "Welcome Staff";
				header('Location:patient.php');
			} else {
				echo 'session setting failed';
			}
		} else {
			$message = "Invalid Username or Password!";
		}
	}
}

if (isset($_POST['apply'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$idnum = $_POST['id'];
	$age = $_POST['age'];
	$gender = $_POST['gen'];
	$pword = $_POST['password'];
	$patientdonor = 'donor';

	$query = "INSERT INTO staff (fname,lname, email,phone,idnumber,age,gender,password,role,login)
	 VALUES ('$fname','$lname', '$email','$phone','$idnum', '$age', '$gender','$pword',
	 '$patientdonor', 'yes')";
	$querya = mysqli_real_query($conn, $query);
	if (!$querya) {
		echo	"<div class='alert alert-info'>Not Sent!</div>";
	} else {
		echo "<div class='text-success alert alert-warning'><b>Proceed To Login!.</div>";
	}
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kenyatta National Hospital </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">

	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<div id="fh5co-wrapper">
		<div id="fh5co-page">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 text-left fh5co-link">

						</div>
						<div class="col-md-6 col-sm-6 text-right fh5co-social">
						</div>
					</div>
				</div>
			</div>
			<header id="fh5co-header-section" class="sticky-banner">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
						<h1 id="fh5co-logo"><a href="index.php">KNH</a></h1>
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li class="active">
									<a href="index.php">Home</a>
								</li>

								<li><a href="#about">About</a></li>
								<!-- <li><a href="blog.html">Blog</a></li> -->
								<li><a href="#slider">Contact Us</a></li>
								<li><a href="#slider1">Login</a></li>

								<li><a href="#slider2">Sign up</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</header>



			<div class="fh5co-hero">
				<div class="fh5co-overlay"></div>
				<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_1.jpg);">
					<div class="desc animate-box">
						<h2><strong>ORGANS TRANSPLANT</strong> </h2>
						<span>KENYATTA NATIONAL HOSPITAL</span>
					</div>
				</div>

			</div>

			<section id="about" class="slider">

				<div id="fh5co-feature-product" class="fh5co-section-gray">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center heading-section">
								<h3>Giving is Virtue.</h3>
								<p>Give to save life.</p>
							</div>
						</div>

						<div class="row row-bottom-padded-md">
							<div class="col-md-12 text-center animate-box">
								<p><img src="images/background.jpg" alt="Free HTML5 Bootstrap Template" class="img-responsive"></p>
							</div>
							<div class="col-md-6 text-center animate-box">
								<p><img src="images/cover_bg_11.jpg" alt="Free HTML5 Bootstrap Template" class="img-responsive"></p>
							</div>
							<div class="col-md-6 text-center animate-box">
								<p><img src="images/cover_bg_0.jpg" alt="Free HTML5 Bootstrap Template" class="img-responsive"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="feature-text">
									<h3>Love</h3>
									<p>Lets all live in love and live like brothers texts.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="feature-text">
									<h3>Compassion</h3>
									<p>Lets be each other brothers keepe texts.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="feature-text">
									<h3>Charity</h3>
									<p>Giving doesnt make u less at all texts.</p>
								</div>
							</div>
						</div>


					</div>
				</div>
			</section>

			<div id="fh5co-portfolio">
				<div class="container">

					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center heading-section animate-box">
							<h3>Our Gallery</h3>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p> -->
						</div>
					</div>


					<div class="row row-bottom-padded-md">
						<div class="col-md-12">
							<ul id="fh5co-portfolio-list">

								<div class="row row-bottom-padded-md">
									<div class="col-md-12 text-center animate-box">
										<p><img src="images/92_illustrations_all_41.png" alt="Free HTML5 Bootstrap Template" class="img-responsive"></p>
									</div>

								</div>

							</ul>
						</div>
					</div>




				</div>
			</div>


			<section id="slider2" class="slider">

				<div id="fh5co-content-section" class="fh5co-section-gray">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
								<h3>Donor Signup</h3>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">

							<form method="post" action="#" autocomplete="on">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="fname" placeholder="First Name" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="lname" placeholder="Last Name" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" class="form-control" name="email" placeholder="Email Address" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="phone" placeholder="Phone Number 07** *** ***" required>
											<!--textarea id="message" cols="30" name="feed" class="form-control" rows="10" required></textarea-->
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="id" placeholder="ID NUMBER" required>
											<!--textarea id="message" cols="30" name="feed" class="form-control" rows="10" required></textarea-->
										</div>

										<div class="form-group">
											<input type="text" class="form-control" name="age" placeholder="Age" required>
											<!--textarea id="message" cols="30" name="feed" class="form-control" rows="10" required></textarea-->
										</div>
										<div class="form-group">
											<span class="input-group-addon">Choose Your Gender</span>
											<select class="form-control" name="gen">
												<option></option>
												<option>Female</option>
												<option>Male</option>
											</select>
										</div>
										<div class="form-group">
											<input type="Password" class="form-control" name="password" placeholder="Password" required>
											<!--textarea id="message" cols="30" name="feed" class="form-control" rows="10" required></textarea-->
										</div>
										<div align="center" class="form-group">
											<input type="submit" class="btn btn-primary" name="apply" value="Apply!">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- fh5co-content-section -->
			<section id="slider1" class="slider">

				<div id="fh5co-services-section">

					<div class="container">
						<div class="row text-center">
							<h2 align="center">Login </h2>

							<div class="col-md-12 col-sm-8">
								<div class="services animate-box">
									<form method="post" action="#" autocomplete="on">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input name="id" type="number" class="form-control" maxlength="12" placeholder="ID NUMBER" required>
													<!--textarea id="message" cols="30" name="feed" class="form-control" rows="10" required></textarea-->
												</div>

												<div class="form-group">
													<input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
												</div>


												<div align="center" class="form-group">
													<input type="submit" class="btn btn-primary" name="log" value="Login">
												</div>

												<table align="center">
													<tr class="info">
														<!-- <th><a href="applicantsignup.php" ><input  class="btn btn-block btn-sm btn-outline"  value="Customer Signup"></a></th> -->
														<!-- <th><a href="Signup.php" ><input  class="btn btn-block btn-sm btn-outline"  value="Staff Signup"></a></th> -->
													</tr>
												</table>

											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- END What we do -->

			<section id="slider" class="slider">

				<div id="fh5co-blog-section" class="fh5co-section-gray">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
								<h3>Contact Us</h3>
								<p>Drop us a message.</p>
							</div>
							<form method="post" action="#" autocomplete="on">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="fname" placeholder="First Name" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="lname" placeholder="Last Name" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" class="form-control" name="email" placeholder="Email Address" required>
										</div>
										<div class="form-group">
											<textarea id="message" cols="30" name="feed" class="form-control" rows="10" required></textarea>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary" name="submit" value="Send Message">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
		</div>
		<!-- fh5co-blog-section -->.
		<section>
			<footer>
				<div id="footer">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 text-center">
								<p class="fh5co-social-icons">
									<a href="#"><i class="icon-twitter2"></i></a>
									<a href="#"><i class="icon-facebook2"></i></a>
									<a href="#"><i class="icon-instagram"></i></a>
									<a href="#"><i class="icon-dribbble2"></i></a>
									<a href="#"><i class="icon-youtube"></i></a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</footer>


	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>

	<!-- Main JS -->
	<script src="js/main.js"></script>

</body>

</html>