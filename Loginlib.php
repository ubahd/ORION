<?php
include('includes/header3.html');
 $e_id= $_COOKIE["userid"];
 $f= $_COOKIE["first"];
 $l= $_COOKIE["last"];
 $r= $_COOKIE["Role"];

if ($r == 'Librarian') {
echo '<h2 align="center"> Welcome: '. $f; echo "&nbsp; $l"; echo "<br>";
echo '<h2 align="center"> Your ID#: '. $e_id; echo "<br>";
echo '<h2 align="center"> Role: '. $r; echo "</h2><br>";
include('\xampp\db\mysqli_connect.php');
			$myquery= mysqli_query($dbc ,"SELECT * from rent");

			if(mysqli_num_rows($myquery) == 0){
				echo '<br><h2 align="center">You have no rentals</h2><br>';
				
			}

			if(mysqli_num_rows($myquery) > 0){
				echo '<br><h2 align="center">Rental Details</h2><br>';
				echo '<table align="center" width ="1000" cellpadding="1" cellspacing="1">';
				echo '<tr>';
				echo'<th>ISBN</th>';
				echo'<th>First Name</th>';
				echo'<th>Last Name</th>';
				echo'<th>Title</th>';
				echo'<th>Rental Date</th>';
				echo'<th>Return Date</th>';
				echo '<tr>';
				while ($Display = mysqli_fetch_array($myquery)) {
				  echo "<tr>";
				  echo "<td>" . $Display['ISBN'] . "</td>";
				  echo "<td>" . $Display['first_name'] . "</td>";
				  echo "<td>" . $Display['last_name'] . "</td>";
				  echo "<td>" . $Display['Title'] . "</td>";
				   echo "<td>" . $Display['Start_Date'] . "</td>";
				   echo "<td>" . $Display['Return_Date'] . "</td>";
				  echo "</tr>";
			

				}
				echo "</table>";
			mysqli_close($dbc);
			}

			 include('includes/footer1.html');
}

else{
	setcookie('userid', '', time()-3600);
	unset($_COOKIE['userid']);
	unset($_COOKIE["userid"]);
  	unset($_COOKIE["first"]);
 	unset($_COOKIE["last"]);
 	unset($_COOKIE["Role"]);

 header('Location:Login.php');
}
?>
	
