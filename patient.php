<?php
include 'db.php';
include('sess.php');
$user_check = $_SESSION['role']; 
?>

<?php
if (isset($_POST['apply'])) {
	$fname = $_POST['allnames'];
	$idnum = $_POST['id'];
	$bloodtype = $_POST['serve'];
	$email = $_POST['email'];
	$residence = $_POST['residence'];
	$phone = $_POST['phone'];

	$query = "INSERT INTO requests(allnames,nationalid,bloodtype,status, email,residence, phone) 
	VALUES ('$fname','$idnum', '$bloodtype', 'pending','$email','$residence','$phone')";
	$query = mysqli_real_query($conn, $query);
	if (!$query) {
		echo "<div class='text-warning alert alert-warning'><b>Not Sent</b></div> ";
	} else {
		echo "<div class='text-success alert alert-warning'><b>We will call you in a days time.</div>";
	}
}

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
<!DOCTYPE html>

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
							<!-- <a href="#">FAQ</a>
						<a href="#">Forum</a>
						<a href="#">Contact</a> -->
						</div>
						<div class="col-md-6 col-sm-6 text-right fh5co-social">

							<?php
							if (isset($_SESSION['role'])) {
								//welcome 
								// echo $_SESSION['idnumber'];
								$role = $_SESSION['role'];
								$lastname = $_SESSION['lname'];
								$lastname1 = $_SESSION['fname'];

								if ($role == 'patient') {

									echo "<div class='alert alert-info' align ='right'> Welcome:<i class='icon-user icon-red'></i><b>  $lastname1  $lastname        | </b> <a href ='logout.php'><i class='fa fa-bars'></i>			Logout</a>   </div>";
								} else {

									echo "<script>alert('Error one.');</script>";
									header('Location:logout.php');
								}
							} ?>
						</div>
					</div>
				</div>
			</div>
			<header id="fh5co-header-section" class="sticky-banner">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
						<h1 id="fh5co-logo"><a href="#">KNH</a></h1>
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li class="active">

								</li>


							</ul>
						</nav>
					</div>
				</div>
			</header>



			<!-- end:header-top -->

			<section id="about" class="slider">

				<div id="fh5co-feature-product" class="fh5co-section-gray">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center heading-section">
								<h3>APPLY.</h3>



								<form method="post" action="#" autocomplete="on">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control" name="allnames" placeholder="All Names" required>
											</div>
											<div class="form-group">
												<input type="number" class="form-control" name="id" placeholder="ID NUMBER" required>
											</div>
											<div class="form-group">
												<span class="input-group-addon">Blood Type</span>
												<select class="form-control" name="serve">
													<option value="A+">A+</option>
													<option value="A-">A-</option>
													<option value="B+">B+</option>
													<option value="B-">B-</option>
													<option value="AB+">AB+</option>
													<option value="AB-">AB-</option>
													<option value="O+">O+</option>
													<option value="O-">O-</option>

												</select>


											</div>
										</div>

										<!-- <div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="lname" placeholder="Last Name" required>
								</div>
							</div> -->
										<div class="col-md-12">
											<div class="form-group">
												<input type="email" class="form-control" name="email" placeholder="Email Address" required>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" name="residence" placeholder="Residence" required>
												<!--textarea id="message" cols="30" name="feed" class="form-control" rows="10" required></textarea-->
											</div>
											<div class="form-group">
												<input type="text" class="form-control" name="phone" placeholder=" 07** *** ***" required>
												<!--textarea id="message" cols="30" name="feed" class="form-control" rows="10" required></textarea-->
											</div>




											<div align="center" class="form-group">
												<input type="submit" class="btn btn-primary" name="apply" value="Apply!">
											</div>
										</div>
									</div>
								</form>
								<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p> -->
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