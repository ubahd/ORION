		<?php  
				include('includes/header1.html');
				$page_title = "Parking Permit";
				$checkuser= $_POST["username"];
				$checkpass= $_POST["password"];
				
				//email validation $em ='/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';


				if ($checkuser != "" && $checkpass !=""){
					include 'connect.php';
					$myquery= "SELECT * from admin_u where username ='$checkuser' and password = '$checkpass'";
					$fetch=mysqli_query($dbc, $myquery) or die ("User could not be selected"); 
					
					if($row = mysqli_fetch_assoc($fetch)){
						setcookie('userid', $row['ID'], time() + 86400);
						setcookie('username', $row['username'], time() + 86400);
					}

					if ($checkuser != $row['username'] && $checkpass != $row['password']){
						echo'<div class="container">';
						echo '<h2 align="center">The username or password is incorrect. <br>';
                        echo '<a align="center" href="index.php"> Click here to try again </a></h2></br>';
                        include('includes/footer1.html');
                        echo'</div>';
                        die;
					}

					if ($checkuser == $row['username'] && $checkpass == $row['password']){
						header('Location:LoginAdmin.php');
					}
						
				}

		?>
