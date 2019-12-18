<?php
include('sessdb.php');
session_start();
$user_check = $_SESSION['idnumber'];
$ses_sql = mysqli_query($db, "select role from staff where idnumber = '$user_check' ");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$login_session = $row['role'];
if (!isset($_SESSION['role'])) {
   header("location: index.php");
   die();
}
