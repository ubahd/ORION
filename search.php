<?php
	include ('includes/header2.html');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		if(isset($_POST['ISBN'], $_POST['Title'], $_POST['Author'], $_POST['Year'])){

			$ISBN= $_POST['ISBN'];
			$title= $_POST['Title'];
			$author= $_POST['Author'];
			$year= $_POST['Year'];
		
			$isb = '/^(978[\--– ])[0-9]{10}$/';

			if(preg_match($isb, $ISBN)){
			include('\xampp\db\mysqli_connect.php');
			$myquery= mysqli_query($dbc ,"SELECT * from books1 WHERE ISBN = '$ISBN' or Author = '$author' or Title= '$title' and Status = 'Available'");

			if(mysqli_num_rows($myquery) == 0){
				
				echo '<h1>Search for available books</h1><br>';
				echo '<h2 align="center"> The book you are looking for is not available. </h2> <br>';
					echo'<form id="form" action= "search.php" method= "post">';
					echo'<br> ISBN: <input type="text" name="ISBN" required="required">';
					echo'<br> Title: <input type="text" name="Title">';
					echo'<br> Author: <input type="text" name="Author">';
					echo'<br> Year: <input type="text" name="Year">';
					echo'<br><input type="submit" value= "Submit">';
					echo'</form>';
					
			}


			if(mysqli_num_rows($myquery) > 0){

			   while ($Display = mysqli_fetch_array($myquery)) {
				 
				 echo'<h1>Book list</h1><br>';
					echo'<table align="center" width ="700" cellpadding="1" cellspacing="1">';
					echo '<tr>';
					echo '<th>Book Id</th>';
					echo '<th>ISBN</th>';
					echo '<th>Title</th>';
					echo '<th>Author</th>';
				echo'<tr>';
		
				  echo "<tr>";
				  echo "<td>" . $Display['Book_ID'] . "</td>";
				  echo "<td>" . $Display['ISBN'] . "</td>";
				  echo "<td>" . $Display['Title'] . "</td>";
				  echo "<td>" . $Display['Author'] . "</td>";

				  echo "<td><a href='card2.php ? id=".$Display['Book_ID']."' target=\"_blank\" >Rent</a></td>";
				  echo "</form>";
				  echo "</tr>";
			   }
			}
			echo "</table>";
			mysqli_close($dbc);
			include('includes/footer1.html');
			}

			if(!preg_match($isb, $ISBN)){
				
				echo '<h1>Search for available books</h1><br>';
				echo '<h2 align="center"> Please enter the correct 13 digit ISBN Format eg. 978-0002122212 </h2> <br>';
					echo'<form id="form" action= "search.php" method= "post">';
					echo'<br> ISBN: <input type="text" name="ISBN" required="required">';
					echo'<br> Title: <input type="text" name="Title">';
					echo'<br> Author: <input type="text" name="Author">';
					echo'<br> Year: <input type="text" name="Year">';
					echo'<br><input type="submit" value= "Submit">';
					echo'</form>';

				include('includes/footer1.html');
			}
		}

		else {
			echo '<h1>Search for available books</h1><br>';
				echo '<h2 align="center"> Please type the information correctly </h2> <br>';
					echo'<form id="form" action= "search.php" method= "post">';
					echo'<br> ISBN: <input type="text" name="ISBN" required="required">';
					echo'<br> Title: <input type="text" name="Title">';
					echo'<br> Author: <input type="text" name="Author">';
					echo'<br> Year: <input type="text" name="Year">';
					echo'<br><input type="submit" value= "Submit">';
					echo'</form>';
			include('includes/footer1.html');
		}

	}

	else {
			echo '<h1>Search for available books</h1><br>';
				echo '<h2 align="center"> Please type the information correctly </h2> <br>';
					echo'<form id="form" action= "search.php" method= "post">';
					echo'<br> ISBN: <input type="text" name="ISBN" required="required">';
					echo'<br> Title: <input type="text" name="Title">';
					echo'<br> Author: <input type="text" name="Author">';
					echo'<br> Year: <input type="text" name="Year">';
					echo'<br><input type="submit" value= "Submit">';
					echo'</form>';
			include('includes/footer1.html');
	}


?>

