 <?php
include('includes/header2.html');

		

		
			include('\xampp\db\mysqli_connect.php');
			$myquery= mysqli_query($dbc ,"SELECT * from books1 WHERE Status = 'Available'");

			if(mysqli_num_rows($myquery) == 0){
				
				echo '<h2 align="center"> There are no books available. </h2> <br>';
					
			}


			if(mysqli_num_rows($myquery) > 0){
				echo '<h1>Book list</h1><br>';
				echo '<table align="center" width ="700" cellpadding="1" cellspacing="1">';
				echo '<tr>';
				echo'<th>Book Id</th>';
				echo'<th>ISBN</th>';
				echo'<th>Title</th>';
				echo'<th>Author</th>';
				echo '<tr>';
			
			while ($Display = mysqli_fetch_array($myquery)) {
				
				echo "<tr>";
				echo "<td>" . $Display['Book_ID'] . "</td>";
				echo "<td>" . $Display['ISBN'] . "</td>";
				echo "<td>" . $Display['Title'] . "</td>";
				echo "<td>" . $Display['Author'] . "</td>";

	echo "<td><a href='card.php ? id=".$Display['Book_ID']."' target=\"_blank\" >Rent</a></td>";

				echo "</form>";
				echo "</tr>";
			}
		}
			echo "</table>";
			mysqli_close($dbc);

		?>


<?php
include('includes/footer1.html');
