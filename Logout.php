<?php
	include('includes/header1.html');
	setcookie('userid', '', time()-3600);
	unset($_COOKIE['userid']);
	unset($_COOKIE["userid"]);
  	unset($_COOKIE["first"]);
 	unset($_COOKIE["last"]);
 	unset($_COOKIE["Role"]);
?>

	<h2 align="center">You have successfully Logged out</h2>
	<p align="center"><a href= 'Login.php'>Click here to Login</a></p>
