<?php
include 'db.php';

include('sess.php');
$user_check = $_SESSION['role'];
?>

<?php
if (isset($_POST['submits'])) {
	$fname = $_POST['allnames'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$idnumber = $_POST['number'];
	$bloodtype = $_POST['bloodtype'];
	$residence = $_POST['residence'];
	$query = "INSERT INTO requests(allnames,nationalid,bloodtype,status, email,residence, phone) 
   VALUES ('$fname','$idnumber', '$bloodtype','pending','$email', '$residence', '$phone')";
	$query = mysqli_real_query($conn, $query);
	if (!$query) {
		echo "<div class='text-warning alert alert-warning'><b>Not Sent</b></div> ";
	} else {
		echo "<div class='text-success alert alert-warning'><b>Patient added.</div>";
		header('Location: doctor.php');
	}
}

if (isset($_POST['submitsz'])) {
	$fname = $_POST['allnames'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$idnumber = $_POST['number'];
	$bloodtype = $_POST['bloodtype'];
	$state = $_POST['state'];
	$residence = $_POST['residence'];
	if (count($_POST) > 0) {
		$con = mysqli_connect('127.0.0.1', 'root', '', 'knh') or die('Unable To connect');
		$result = mysqli_query($con, "SELECT * FROM bloodbank WHERE Availability='yes'  
	and type = '" . $_POST["bloodtype"] . "'");
		$row  = mysqli_fetch_array($result);
		if (is_array($row)) {

			if ($state == 'Critical') {

				//insert in the level of blood is available in blood bank 

				$querya = "INSERT INTO requests(allnames,nationalid,bloodtype,status,email,residence,phone) 
	VALUES ('$fname','$idnumber','$bloodtype', 'matched','$email','$residence', '$phone' )";
				$query = mysqli_real_query($conn, $querya);
				if (!$query) {
					echo "<div class='text-warning alert alert-warning'><b>Not Sent</b></div> ";
				} else {
					echo	"<div class='alert alert-info'>Blood is available in Bloodbank 
			\n Proceed With transfusion!</div>";
					// echo "<div class='text-success alert alert-warning'><b>Sent our team will reply in a days time.</div>";
				}
			} else if ($state != 'Critical') {
				$querya = "INSERT INTO requests(allnames,nationalid,bloodtype,status,email,residence,phone) 
	VALUES ('$fname','$idnumber','$bloodtype', 'pending','$email','$residence', '$phone' )";
				$query = mysqli_real_query($conn, $querya);
				if (!$query) {
					echo "<div class='text-warning alert alert-warning'><b>Not Sent</b></div> ";
				} else {
					echo	"<div class='alert alert-info'>Blood is available in Bloodbank 
				but not critical!  Information Processed</div>";
					// echo "<div class='text-success alert alert-warning'><b>Sent our team will reply in a days time.</div>";
				}
				//insert in the level of blood is available in blood bank 			
			}
		} else {
			$resulta = mysqli_query($con, "SELECT * FROM donor WHERE bloodtype='$bloodtype' order by count desc limit 1");
			$rowa  = mysqli_fetch_array($resulta);
			if (is_array($rowa)) {
				$_SESSION["phone"] = $rowa['phone'];
				$_SESSION["fname"] = $rowa['fname'];
				$_SESSION["lname"] = $rowa['lname'];
				$fn = $_SESSION["fname"];
				$ln = $_SESSION["lname"];
				$pn = $_SESSION["phone"];

				if ($state == 'Critical') {

					//insert in the level of donor available but bloodbank is empty and state is critical
					$querya = "INSERT INTO requests(allnames,nationalid,bloodtype,status,email,residence,phone) 
					VALUES ('$fname','$idnumber','$bloodtype', 'matched','$email','$residence', '$phone' )";
					$query = mysqli_real_query($conn, $querya);
					if (!$query) {
						echo "<div class='text-warning alert alert-warning'><b>Not Sent</b></div> ";
					} else {
						echo	"<div class='alert alert-info'>Patient has been linked with donor 
									  Proceed With transfusion!</div>";
						echo "Patient has been matched with " . $fn . $ln . " Phone>: " . $pn;
					}
				} else if ($state != 'Critical') {
					//insert in the level of donor available but bloodbank is empty and state is not critical
					$querya = "INSERT INTO requests(allnames,nationalid,bloodtype,status,email,residence,phone) 
					VALUES ('$fname','$idnumber','$bloodtype', 'pending','$email','$residence', '$phone' )";
					$query = mysqli_real_query($conn, $querya);
					if (!$query) {
						echo "<div class='text-warning alert alert-warning'><b>Not Sent</b></div> ";
					} else {
						echo	"<div class='alert alert-info'>Patient not critical info processed waiting for action</div>";
					}
				}
			} else {
				echo	"<div class='alert alert-info'>No donors are Available</div>";
			}
		}
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
	<title>Kenyatta National Hospital - Doctor</title>
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
						<div class="col-md-12 col-sm-8 text-right fh5co-social">
							<?php
							if (isset($_SESSION['role'])) {
								$role = $_SESSION['role'];
								$lastname = $_SESSION['lname'];
								$lastname1 = $_SESSION['fname'];
								if ($role == 'doctor') {

									echo "<div class='alert alert-info' align ='right'> Welcome:<i class='icon-user icon-red'></i><b>  $lastname1  $lastname        | </b> <a href ='logout.php'><i class='fa fa-bars'></i>			Logout</a>   </div>";
								} else {

									echo "<script>alert('Session Error.');</script>";
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
						<h1 id="fh5co-logo"><a href="#">KNH - dOCTOR</a></h1>
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li class="active">

								</li>
								<li><a href="#docs">Patients Requests</a></li>
								<li><a href="#doctorstable">Patients Table</a></li>
								<li><a href="logout.php">Logout</a></li>

							</ul>
						</nav>
					</div>
				</div>
			</header>


			<section id="docs" class="slider">

				<div id="fh5co-blog-section" class="fh5co-section-gray">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
								<h3>Patients Requests</h3>
							</div>
							<form method="post" action="#" autocomplete="on">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="allnames" placeholder="Names" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="number" class="form-control" name="number" placeholder="ID NUMBER" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<select name="bloodtype" class="form-control">
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
									<div class="col-md-6">
										<div class="form-group">
											<input type="email" class="form-control" name="email" placeholder="Email Address" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="number" class="form-control" name="phone" placeholder="0700 000 000" required>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="residence" placeholder="Residence" required>
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
											<input type="password" class="form-control" name="password" placeholder="****" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group" align="Center">
											<input type="radio" name="state" value="Critical" checked>Highly Critical <br>
											<input type="radio" name="state" value="Medium"> Medium <br>
											<input type="radio" name="state" value="Less Critical"> Less </div>
									</div>

									<div class="col-md-12" align="center">


										<div class="form-group">
											<input type="submit" class="btn btn-primary" name="submitsz" value="Add Patient">
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

			<section id="doctorstable" class="slider">

				<div id="fh5co-feature-product" class="fh5co-section-gray">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center heading-section">

								<h3>Pending Patients </h3>



								<table class="table table-default table-border table-striped table-responsive table-hover" border="2.1px">
									<tr class="info">
										<th>Count</th>
										<th>Names</th>
										<th>Id</th>
										<th>Blood Type</th>
										<th>status</th>
										<th>Email</th>
										<th>Reisidence</th>
										<th>Phone</th>
										<th>ACTION</th>
									</tr>
									<tbody>
										<?php
										$q1 = "SELECT * FROM requests where status='pending' order by count desc";
										$r1 = mysqli_query($conn, $q1);
										while ($ra1 = mysqli_fetch_assoc($r1)) {
											echo "<tr>";
											echo "<td>" . $ra1['count'] . "</td>";
											$count = $ra1['count'];
											$_SESSION['kount'] = $ra1['count'];
											echo "<td>" . $ra1['allnames'] . "</td>";
											echo "<td>" . $ra1['nationalid'] . "</td>";
											echo "<td>" . $ra1['bloodtype'] . "</td>";
											echo "<td>" . $ra1['status'] . "</td>";
											echo "<td>" . $ra1['email'] . "</td>";
											echo "<td>" . $ra1['residence'] . "</td>";
											echo "<td>" . $ra1['phone'] . "</td>";
											if ($ra1['status'] == 'pending') {
												echo '<td><a  href="state.php?count=' . $count . '" class="btn btn-info">Match</a></td>';
											} else if ($ra1['status'] == 'matched') {
												echo '<td><a  href="state1.php?count=' . $count . ' " class="btn btn-primary">Closed<span class="glyphicon glyphicon-print"></span></a></td>';
											}
											echo "</tr>";
										}
										?>
									</tbody>
							</div>
							</table>
							<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p> -->
						</div>
					</div>

				</div>
	</div>
	</section>
	<section id="doctorstable" class="slider">

		<div id="fh5co-feature-product" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center heading-section">

						<h3>Matched Patients </h3>



						<table class="table table-default table-border table-striped table-responsive table-hover" border="2.1px">
							<tr class="info">
								<th>Count</th>
								<th>Names</th>
								<th>Id</th>
								<th>Blood Type</th>
								<th>status</th>
								<th>Email</th>
								<th>Reisidence</th>
								<th>Phone</th>
								<!-- <th>ACTION</th> -->
							</tr>
							<tbody>
								<?php
								$q1 = "SELECT * FROM requests where status='matched' order by count desc";
								$r1 = mysqli_query($conn, $q1);
								while ($ra1 = mysqli_fetch_assoc($r1)) {
									echo "<tr>";
									echo "<td>" . $ra1['count'] . "</td>";
									$count = $ra1['count'];
									$_SESSION['kount'] = $ra1['count'];
									echo "<td>" . $ra1['allnames'] . "</td>";
									echo "<td>" . $ra1['nationalid'] . "</td>";
									echo "<td>" . $ra1['bloodtype'] . "</td>";
									echo "<td>" . $ra1['status'] . "</td>";
									echo "<td>" . $ra1['email'] . "</td>";
									echo "<td>" . $ra1['residence'] . "</td>";
									echo "<td>" . $ra1['phone'] . "</td>";
									// if($ra1['status']=='pending'){
									// 	echo '<td><a  href="state.php?count='.$count.'" class="btn btn-info">Match</a></td>';
									//  }else if ($ra1['status']=='matched'){
									// 	echo '<td><a  href="state1.php?count='.$count.' " class="btn btn-primary">Closed<span class="glyphicon glyphicon-print"></span></a></td>';
									// }
									echo "</tr>";
								}
								?>
							</tbody>
					</div>
					</table>
					<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p> -->
				</div>
			</div>

		</div>
		</div>
	</section>



	<!-- END What we do -->


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

		</div>


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