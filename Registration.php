	<?php
		$page_title = "Orion - There future is here";
		include('includes/header1.html');
	?>
		<button type="button" onclick="window.location='Login.php'">Back</button>

		<h2 id="reg">Registration section</h2>

		<p id="reg"> Please enter your information correctly.</p>
		<form id="form" action= "registration_handle.php" method= "post">
			<br> First name: <input type="text" name="Firstname" value="<?php if(isset($_POST['Firstname'])) echo $_POST['Firstname']; ?>"> 
			<br> Last name: <input type="text" name="Lastname"  value="<?php if(isset($_POST['Lastname'])) echo $_POST['Lastname']; ?>">
			<br> Username: <input type="text" name="username"  value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
			<br> Password: <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
			<br> Email Address: <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
			<br> <br> Are you male or female?<br>
    			<input type="radio" name="gender" value="Male"<?php if(isset($_POST['gender'])) echo $_POST['gender']; ?>>Male
    			<input type="radio" name="gender"  value="Female"<?php if(isset($_POST['gender'])) echo $_POST['gender']; ?>>Female
    		<br> <br> Role:
    			<input type="radio" name="role" value="Librarian"<?php if(isset($_POST['role'])) echo $_POST['role']; ?>>Librarian
			<br> Address: <input type="text" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>"> <br> (Please type correctly e.g "34 Erwin Park Rd, Montclair, NJ 07042")
			<br><br><input type="submit" value= "Submit"><br><br>
		</form>
	
<?php
	include('includes/footer1.html');
?>
	