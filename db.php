<?php
$server = "localhost";
$user="root";
$password ="";
$db ="knh";
$conn = mysqli_connect($server, $user, $password, $db);
if($conn){
    echo"";
}else{
    echo"mysqli_error";
}
?>