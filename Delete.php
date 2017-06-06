<?php
	$page_title = "Orion - There future is here";
	include ('includes/header.html');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		if(isset($_POST['ISBN'])){

			$ISBN= $_POST['ISBN'];
			include('\xampp\db\mysqli_connect.php');
			$myquery= mysqli_query($dbc ,"SELECT * from books where ISBN = '$ISBN'");

			if($row = mysqli_fetch_assoc($myquery)){
			}

			if ($ISBN == $row['ISBN']){
				$myquery2= mysqli_query($dbc ,"SELECT * from books");
				$count= mysqli_num_rows($myquery2);
				$myquery3= mysqli_query($dbc ,"DELETE from books where ISBN = '$ISBN'");
				$myquery4= mysqli_query($dbc ,"SELECT * from books");
				$count2= mysqli_num_rows($myquery4);

				if ($count2 < $count){
					echo "<br> <h2> You have succesfully deleted the book.<h2>";
                	die;
            
				}
				
			}


			if ($ISBN != $row['ISBN']){
				echo "<br><h2>The ISBN you entered does not exist.<h2>";
                die;
               
			}

		}
	
		else {
			echo "Please type your amount correctly and select the appropriate status";
		}

	}
?>

<h1>Delete Books</h1>
<form action="Delete.php" method="post">
	<p>ISBN #: <input type="text" name="ISBN" maxlength="14" value="<?php if (isset($_POST['ISBN'])) echo $_POST['ISBN']; ?>" /> (Please enter the ISBN number for deletion)</p>
	<p><input type="submit" name="submit" value="Delete" /></p>
</form>

<?php include ('includes/footer.html'); ?>