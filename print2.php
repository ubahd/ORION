<?php
include('includes/header2.html');
 $e_id= $_COOKIE["userid"];
 $f= $_COOKIE["first"];
 $l= $_COOKIE["last"];

	echo'<div class="container">';
	if ($e_id != '') {
	$license= $_POST["license"];
		
		include 'connect.php';
			$myquery= mysqli_query($dbc ,"SELECT * from user_reg WHERE firstname = '$f' and lastname= '$l'");

			if(mysqli_num_rows($myquery) == 0){
				echo '<br><h2 align="center">You have no permit</h2><br>';
				
			}

			if(mysqli_num_rows($myquery) > 0){
				
				
				
				while ($Display = mysqli_fetch_array($myquery)) {
				   
					$free = $Display['FREE_PERMITS']; 				
				
					if($free <=5 && $free !=0){
						$new= $free - 1;
						$permitid = rand(100000,999999);
						echo '<br><h2 align="center">Permit Details</h2><br>';
						echo '<h2 align="center"> Your ID#: '. $e_id; echo "<br>";
						echo '<h2 align="center"> Your Permit#: '. $permitid; echo "<br>";
						echo '<h2 align="center"> Your License#: '. $license; echo "<br>";
						$update= mysqli_query($dbc ,"UPDATE user_reg SET FREE_PERMITS = '$new' WHERE firstname = '$f' and lastname= '$l'");
						$npermit= mysqli_query($dbc ,"INSERT INTO permits_main VALUES ('', '$permitid', '$e_id', CURDATE(), 'Free', 'Active', '$license', CURDATE()+ INTERVAL 30 DAY)");
					}
			
					if($free ==0){
						$update= mysqli_query($dbc ,"UPDATE user_reg SET FREE_PERMITS = '0' WHERE firstname = '$f' and lastname= '$l'");
					
						echo "<br><a href='Purchase.php'>"; echo '<h2 align="center"> You have no free permit. Please Click here to purchase a permit </h2></a><br><br>';
						
					}

				}

			echo'<br></br></div>';
			
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
 	

 header('Location:index.php');
}

?>
	