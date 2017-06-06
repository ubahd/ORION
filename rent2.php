<?php
include('includes/header2.html');
$bid= $_POST['BookID'];
$deb =$_POST['Debcard'];
$exp = $_POST['Exp'];
$cvv = $_POST['cvv'];


$cc = '/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/';

$expd='/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/';

$cvvv='/^[0-9]{3}$/';

if(!preg_match($cc, $deb) || !preg_match($expd, $exp) || !preg_match($cvvv, $cvv)) { 
	echo '<h2 align="center"> The card information is invalid.<br>';
	echo '<a href ="search.php" align="center"> Click here to try again</a><br>';
}

if(preg_match($cc, $deb) && preg_match($expd, $exp) && preg_match($cvvv, $cvv)) { 

 include('\xampp\db\mysqli_connect.php');
			$myquery= mysqli_query($dbc ,"SELECT * from books1 WHERE Book_ID = '$bid'");
			while ($Display = mysqli_fetch_array($myquery)) {
				$bidd = $Display['Book_ID'];
				$isbn = $Display['ISBN'];
				$title = $Display['Title'];
				$author = $Display['Author'];


				echo '<div style="background: green; padding: 15px;">';
				echo '<h2 align="center"> You have successfully rented:<br>';
				echo '<h2 align="center"> Book Id: '. $bidd;  echo "<br>";
				echo '<h2 align="center"> ISBN: '. $isbn; echo "<br>";
				echo '<h2 align="center"> Title: '. $title; echo "<br>";
				echo '<h2 align="center"> Author: '. $author; echo "<br>";
				echo '<h2 align="center"> The book is available for pick up at library'; echo "<br>";
				echo '<h2 align="center" style=" background: white; padding: 15px; Color: red;"> Note: <br> Failure to return after 21 days will result to a late fee charge of $50.00. Thank you'; echo "</h2><br>";
				echo '</div>';
			}

			mysqli_query($dbc ,"UPDATE books1 set Status = 'Not available' where Book_ID = '$bid'");
			mysqli_query($dbc ,"INSERT INTO rent VALUES ('$isbn', '$f', '$l', '$title', CURDATE(), CURDATE()+ INTERVAL 21 DAY)");

			mysqli_close($dbc);
}
?>
	

		
<?php
include('includes/footer1.html');
?>