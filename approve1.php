
<?php
session_start();
include'db.php';
if(isset($_GET['count'])){
    $count=$_GET['count'];    
        $q1="UPDATE donors SET status='APPROVED' WHERE count='$count'";
    $exe1=mysqli_real_query($conn,$q1);
    if($exe1){
        header("location:admin.php");
        } else{
	echo "<div class='text-warning alert alert-warning'><b>Error Has occurred.</b></div> ";
    }
}
?>