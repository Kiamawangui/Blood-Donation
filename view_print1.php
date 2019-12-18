<?php
include 'db.php';
session_start();
if (isset($_SESSION['role'])){
	//welcome 
	// echo $_SESSION['idnumber'];
	$role = $_SESSION['role'];
	$lastname = $_SESSION['lname'];
	$lastname1 = $_SESSION['fname'];

	if ($role == 'admin')
	{
				
echo "<div class='alert alert-info' align ='right'> Welcome:<i class='icon-user icon-red'></i><b>  $lastname1  $lastname        | </b> <a href ='logout.php'><i class='fa fa-bars'></i>			Logout</a>   </div>";
	}else{
		// header('Location:logout.php');
	echo "<script>alert('Error one.');</script>";

	}}
?>
<?php
    if(isset($_GET['count'])){
   $kount=$_GET['count'];    
        $q1 ="SELECT * FROM requests WHERE count = '$kount'";
        $r1=mysqli_query($conn, $q1);
    if (mysqli_num_rows($r1) > 0)
    {
        $rs = mysqli_fetch_assoc($r1);
    }else{
        header('Location:admin.php');
    }
        
    }else{
        header('Location:admin.php');
    
}

?>
<!DOCTYPE html>
  <html class="no-js">  
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kenyatta National Hospital </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

 
  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
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
					</div>
				</div>
			</div>
		</div>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Details</title>
    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap/css/custom.css" rel="stylesheet">
    <title>Print details</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.css" >
</head>
    <body>
      
        <div class="container panel panel-default">
            <header class='align align-center'>
                <center>
                <h1 class='text-primary '>KENYATTA NATIONAL HOSPITAL</h1>
                <h2 > CUSTOMER RECEIPT</h2>  
				<h2 class='text-primary '> Contacts: +254 723 743625</h2>
                    </center>
            
            </header>
             
            <!-- <table class='table table-default table-bordered'> -->
						<table ALIGN ="CENTER" class="table table-default table-border table-striped table-responsive table-hover" border="2.1px">
            
             
              <tr>
                <td><strong>Transaction Number</strong></td>
                <td><?php echo $rs['count']; ?></td>
            </tr>   
            <tr>
                <td><p><strong>Full Name:</strong></p></td>
                <td><?php echo $rs['allnames']; ?></td>
            </tr>
            <tr>
                <td><strong>ID Number</strong></td>
                <td><?php echo $rs['nationalid']; ?></td>
            </tr>
            <tr>
                <td><strong>Residence:</strong></td>
                <td><?php echo $rs['residence']; ?></td>
            </tr>
            <tr>
                <td><strong>Phone Number:</strong></td>
                <td><?php echo '+254  ',$rs['phone']; ?></td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td><?php echo $rs['email']; ?></td>
            </tr>
                 <tr>
                <td><strong>Service Requested:</strong></td>
                <td><?php echo $rs['bloodtype']; $savis = $rs['bloodtype']; 
                 $q12="SELECT * FROM services WHERE services = '$savis' ";
                 $r12=mysqli_query($conn,$q12);
                 $ra12=mysqli_fetch_assoc($r12);
                
                ?></td>
            </tr>
                
                <tr>
                    <td><strong>Service Costs:</strong></td>
                    <td><?php echo $ra12['cost']; ?> Kshs</td>
                    </tr>
                <tr>
                <tr>
                    <td><strong class='text-primary '>Approved by</strong></td>
                    <td><strong class='text-primary '>KNH</strong></td>
                </tr>
                 <tr>
                    <td><strong>Date:</strong></td>
                    <td><?php echo date("Y-m-d"); ?></td>
                </tr>
				
				 <tr>
                    <td><strong >CUSTOMERS SIGNATURE:</strong></td>
                    
					  <td></td>
                </tr>
              
                <tr>
                    <td><strong>Date:</strong></td>
                    <td></td>
                </tr>
                
            </table>    <table>
            <tr><hr>
                    <td><strong >This Receipt was generated and Designed For the Purpose of Presentations. It is Subject to Further Reviews. Keep this Receipt For Future Enquiries.</strong></td>
                </tr>
        
        </table>
        </div>
          <center>
          <button class="btn btn-lg btn-success" type="button"  onclick="myFunction()">Print <span class="glyphicon glyphicon-print"></span></button>
              <a href="ADMIN.php" class="btn btn-lg btn-success" type="button">Skip</a> 
              </center>
    </body>
    <script>
function myFunction() {
    window.print();
}
</script>
</html>