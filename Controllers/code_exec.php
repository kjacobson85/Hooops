<?php
session_start();
include('Connection.php');
$username=$_POST['txtUser'];
$password=$_POST['txtPassword'];
$first=$_POST['txtName'];
$last=$_POST['txtLast'];
$email=$_POST['txtEmail'];
$dob=$_POST['txtDob'];
$bio=$_POST['txtBio'];
$zone=$_POST['txtZone'];

mysql_query("INSERT INTO Login(username, password, first, last, email, dob, bio)VALUES('$username', '$password', '$first', '$last', '$email', '$dob', '$bio')");
header("location: ../success.html?remarks=success");
mysql_close($con);
?>