<?php
include('includes/header2.html');
	echo'<div class="container">';
		echo '<h1> Card information</h1>';
		echo '<form id="form" action= "print3.php" method= "post">';
		echo	'<br> Debit card (16-Digit): <input type="password" name="Debcard" required="required"></br>';
		echo	'<br> Name on Card: <input type="text" name="Name"></br>';
		echo	'<br> Expiration date (MM/YY): <input type="text" name="Exp"></br>';
		echo	'<br> CVV Code: <input type="text" name="cvv"></br>';
		echo	'<br> License Number: <input type="text" name="license"> </br>';
		echo	'<br><input type="submit" value= "Submit"></br>';
		echo '</form>';
	echo'</div>';
?>

<?php
include('includes/footer1.html');
?>