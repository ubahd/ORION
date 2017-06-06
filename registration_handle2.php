
	 	<?php 
	 		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
				if(isset($_POST['Firstname'], $_POST['Lastname'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['role'], $_POST['gender'], $_POST['address']) && $_POST['address'] != "" && $_POST['password'] !="" ){

						$firstn= $_POST['Firstname'];
						 $lastn= $_POST['Lastname'];
						  $user= $_POST['username'];
						   $pass= $_POST['password']; 
						   $email=$_POST['email'];
						   $role=$_POST['role'];
						   $gender=$_POST['gender'];
						    $addy=$_POST['address'];


						include('\xampp\db\mysqli_connect.php');
						$myquery= mysqli_query($dbc ,"SELECT * from users1 where username = '$user' or email = '$email' or password = '$pass'");
					
						if(mysqli_num_rows($myquery) > 0){

							include('Registration1.php');
							echo '<br><h2 align="center">Username or password already exists. Please try again</h2><br><br>';

							die;
						}

						else {
							$myquery2= mysqli_query($dbc,"INSERT INTO users1 VALUES ('', '$firstn', '$lastn', '$user', '$pass', '$email', '$gender', '$role', '$addy')");
								

								include('includes/header1.html');
								echo '<h2 align="center"> Registration Complete </h2> <br>';
								echo '<h1 style="background: green; padding: 15px; "> You have successfully added your information to the database.</h1><b>';
								echo "<br><a href='Login.php'>"; echo '<p align="center"> Click here to Login </b></a><br><br>';
								include('includes/footer1.html');
								
						}

			       
			       	        
				}
		
				else {

					include('Registration1.php');
					echo '<br> <h2 align="center">Please type your amount correctly and select the appropriate status </h2><br><br>';
				}

			}	 
		?>