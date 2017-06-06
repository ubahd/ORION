<?php
include('includes/header2.html');
$f= $_COOKIE["first"];
 $l= $_COOKIE["last"];
$e_id= $_COOKIE["userid"];

$deb =$_POST['Debcard'];
$exp = $_POST['Exp'];
$cvv = $_POST['cvv'];
$license= $_POST["license"];


$cc = '/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/';

$expd='/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/';

$cvvv='/^[0-9]{3}$/';

echo'<div class="container">';
if(!preg_match($cc, $deb) || !preg_match($expd, $exp) || !preg_match($cvvv, $cvv)) { 
	echo '<h2 align="center"> The card information is invalid.<br>';
	echo '<a href ="Purchase.php" align="center"> Click here to try again</a><br>';
}

if(preg_match($cc, $deb) && preg_match($expd, $exp) && preg_match($cvvv, $cvv)) { 

 include 'connect.php';
			$myquery= mysqli_query($dbc ,"SELECT * from user_reg WHERE firstname = '$f' and lastname= '$l'");
			while ($Display = mysqli_fetch_array($myquery)) {
				$paid = $Display['PAID_PERMITS'];
				$free = $Display['FREE_PERMITS'];
				
				if($paid >=0 && $free==0){
					$new= $paid + 1;
						$permitid = rand(100000,999999);
						echo '<br><h2 align="center">Permit Details</h2><br>';
						echo '<h2 align="center"> Your ID#: '. $e_id; echo "<br>";
						echo '<h2 align="center"> Your Permit#: '. $permitid; echo "<br>";
						echo '<h2 align="center"> Your License#: '. $license; echo "<br>";
						$update= mysqli_query($dbc ,"UPDATE user_reg SET PAID_PERMITS = '$new' WHERE firstname = '$f' and lastname= '$l'");
						$npermit= mysqli_query($dbc ,"INSERT INTO permits_main VALUES ('', '$permitid', '$e_id', CURDATE(), 'Paid', 'Active', '$license', CURDATE()+ INTERVAL 30 DAY)");
				
				}
				
				if($paid >=0 && $free <=5 && $free != 0){
					echo '<h2 align="center"> You cannot purchase until you use all your free permit </h2><br></br>';
				
				}

			
				echo '<br></br></div>';
			}

			mysqli_close($dbc);
}
?>
	

		
<?php
include('includes/footer1.html');
?>