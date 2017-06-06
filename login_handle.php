		<?php  
				include('includes/header1.html');
				$page_title = "Orion - There future is here";
				$checkuser= $_POST["username"];
				$checkpass= $_POST["password"];
				
				//email validation $em ='/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';


				if ($checkuser != "" && $checkpass !=""){
					include('\xampp\db\mysqli_connect.php');
					$myquery= "SELECT * from users1 where username ='$checkuser' and password = '$checkpass'";
					$fetch=mysqli_query($dbc, $myquery) or die ("User could not be selected"); 
					
					if($row = mysqli_fetch_assoc($fetch)){
						setcookie('userid', $row['User_ID'], time() + 86400);
						setcookie('first', $row['first_name'], time() + 86400);
						setcookie('last', $row['last_name'], time() + 86400);
						setcookie('Role', $row['role'], time() + 86400);
					}

					if ($checkuser != $row['username'] && $checkpass != $row['password']){
						echo '<h2 align="center">The username or password is incorrect. <br>';
                        echo '<a align="center" href="Login.php"> Click here to try again </a></h2></br>';
                        include('includes/footer1.html');
                        die;
					}

					if ($checkuser == $row['username'] && $checkpass == $row['password'] && $row['role'] =='Renter' ){
						header('Location:Loginuser.php');
					}

					if ($checkuser == $row['username'] && $checkpass == $row['password'] && $row['role'] =='Librarian' ){
						header('Location:Loginlib.php');
					}
						
				}

		?>
