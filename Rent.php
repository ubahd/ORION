<?php
include('includes/header2.html');
?>
				<h1>Search for available books</h1><br>
				<form id="form" action= "search.php" method= "post">
			<br> ISBN: <input type="text" name="ISBN" required="required">
			<br> Title: <input type="text" name="Title">
			<br> Author: <input type="text" name="Author">
			<br> Year: <input type="text" name="Year">
			<br><input type="submit" value= "Submit">
		</form>


<?php
include('includes/footer1.html');