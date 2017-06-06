<?php
include('includes/header3.html');
 $e_id= $_COOKIE["userid"];
 $username= $_COOKIE["username"];


echo'<div class="container">';
if ($e_id != '') {
echo '<h2 align="center"> Welcome: '. $username; echo "<br>";
echo '<h2 align="center"> Your ID#: '. $e_id; echo "<br>";


	include 'connect.php';
			$myquery= mysqli_query($dbc ,"SELECT * from admin_u WHERE ID = '$e_id' and username= '$username'");

			if(mysqli_num_rows($myquery) == 0){
				echo '<br><h2 align="center">You have no permits</h2><br>';
				
			}

			if(mysqli_num_rows($myquery) > 0){
				echo '<br><h2 align="center"> Issued Permit Details</h2><br>';
				echo '</div>';
				echo '<table align="center" width ="1000" cellpadding="1" cellspacing="1">';
				echo '<tr>';
				echo'<th>ID Entry No.</th>';
				echo'<th>Permit Id</th>';
				echo'<th>Userid</th>';
				echo'<th>Permit Issue date</th>';
				echo'<th>Payment Status</th>';
				echo'<th>Permit Status</th>';
				echo'<th>License No.</th>';
				echo'<th>Permit Expiration Date</th>';
				echo '<tr>';
				
				$myquery2= mysqli_query($dbc ,"SELECT * from permits_main");
				while ($Display = mysqli_fetch_array($myquery2)) {
				  echo "<tr>";
				  echo "<td>" . $Display['id'] . "</td>";
				  echo "<td>" . $Display['permit_id'] . "</td>";
				  echo "<td>" . $Display['user_id'] . "</td>";
				  echo "<td>" . $Display['permit_issue_date'] . "</td>";
				   echo "<td>" . $Display['payment_status'] . "</td>";
				   echo "<td>" . $Display['permit_status'] . "</td>";
				   echo "<td>" . $Display['LIC_num'] . "</td>";
				   echo "<td>" . $Display['permit_expiration_date'] . "</td>";
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
	
