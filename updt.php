<?php
	include ('includes/header3.html');
	$Bid= $_GET['id'];
    
	   
		include('\xampp\db\mysqli_connect.php');
		$myquery= mysqli_query($dbc ,"SELECT * from books1 WHERE Book_ID = '$Bid'");
		while ($Display = mysqli_fetch_array($myquery)) {
			$Stat = $Display['Status'];
			$isbn = $Display['ISBN'];
		}

		if($Stat != "Available"){
	   	$myquery= mysqli_query($dbc ,"UPDATE books1 set Status ='Available' WHERE Book_ID = '$Bid'");
	   	$myquery2= mysqli_query($dbc ,"DELETE from rent WHERE ISBN = '$isbn'");

	   	echo '<h2 align="center">You have succesfully updated the status of the book</h2>';
	   	}

	   	else {
	   		echo '<h2 align="center">You cannot update Status if the book is available<br>';
	   		echo '<a align="center" href="show2.php"> Click here to try again </a></br>';
	   	}
?>