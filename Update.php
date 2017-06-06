<?php
	include ('includes/header3.html');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		if(isset($_POST['ISBN'], $_POST['author'], $_POST['title'], $_POST['year'])){

			$ISBN= $_POST['ISBN'];
			$author= $_POST['author'];
			$title= $_POST['title'];
			$year= $_POST['year'];
		

			include('\xampp\db\mysqli_connect.php');
			$myquery= mysqli_query($dbc ,"SELECT * from books1");

			if($row = mysqli_fetch_assoc($myquery)){
				$row['ISBN'];
			}

			if ($ISBN != $row['ISBN']){
				$myquery2= mysqli_query($dbc ,"SELECT * from books1");
				$count= mysqli_num_rows($myquery2);
				$myquery3= mysqli_query($dbc ,"INSERT INTO books1 VALUES ('','$ISBN','$author','$title','$year','Available')");
				$myquery4= mysqli_query($dbc ,"SELECT * from books1");
				$count2= mysqli_num_rows($myquery4);

				if ($count2 > $count){
					echo '<br> <h2 align="center"> You have succesfully updated the book.</br>';
					echo '<br><a align="center" href="show2.php"> Click here to view added books </a></h2></br>';
					include ('includes/footer1.html');
                	die;
            
				}
				
			}


			if ($ISBN == $row['ISBN']){
				echo '<br><h2 align="center">The ISBN you entered already exist.<h2>';
                die;
               
			}

		}
	
		else {
			echo '<h2 align="center">Please enter the right information</h2>';
		}

	}

?>

<h1>Add Books</h1>
<form id="form" action="Update.php" method="post">
	<p>ISBN #: <input type="text"  name="ISBN" required="required" value="<?php if (isset($_POST['ISBN'])) echo $_POST['ISBN']; ?>" /></p>
	<p>Author: <input type="text"  name="author" value="<?php if (isset($_POST['author'])) echo $_POST['author']; ?>" /></p>
	<p>Title: <input type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" /></p>
	<p>Year: <input type="text"  name="year" value="<?php if (isset($_POST['year'])) echo $_POST['year']; ?>" /></p>
	<p><input type="submit" name="submit" value="Add book" /></p>
</form>

<?php include ('includes/footer1.html'); ?>