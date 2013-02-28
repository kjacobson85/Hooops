<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="Hooops"; // Database name
$tbl_name="Login"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($username);
$mypassword = stripslashes($password);
$myusername = mysql_real_escape_string($username);
$mypassword = mysql_real_escape_string($password);

$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){



header("location:../loggedindex.html");
}
else {
echo "Wrong Username or Password";
}
?>