<!DOCTYPE html>
<html>
	<head>
		<title> Lab 3 </title>
	<style>
		body {
			background-color: lightblue;
			display: flex;
			flex-direction: column;
			align-items: center;
			padding: 20px;
		}
		form {
			background-color: pink;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0,0,0.1);
		}
		input[type="text"], input[type="password"]{
			width: 300px;
			padding: 10px;
			margin-bottom: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
		}
		input[typr="submit"]{
			padding: 10px 20px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			transition: background-color 0.3s ease;
			align-items: center;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
	</head>
	<body>
		<form action = "register.php" method="POST"style="display: flex; flex-direction: column; align-items: center;">
			<h2> Registration Page </h2>
		<a href="index.php" style="text-decoration: none; color: black; display: inline-block; background-color: #4CAF50; color: black; padding: 10px 20px; text-align: center; border-radius: 5px; text-decoration: none; font-size: 16px; margin: 10px 0px; transition: background-color 0.3s ease;"> Click here to go back </a>
		<br>
		<br>
			Enter Username: <input type="text" name="username" required="required" />
			
			Enter password: <input type="password" name="password" required="required" /> 
			<br />
			<input type="submit" value="Register"/>
		</form>
	</body>
	</html>

	<?php
		$servername = "localhost";
		$username_db = "root";
		$password_db = "";
		$db_name = "first_db";
		// Create connection
			$conn = mysqli_connect($servername, $username_db, $password_db, $db_name);

			//Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			echo "<br>";

			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$username=mysqli_real_escape_string($conn, $_POST['username']);
				$password=mysqli_real_escape_string($conn, $_POST['password']);
				$bool=true;

				$query = mysqli_query($conn, "Select * from users_tbl"); //Query the users table

				while ($row=mysqli_fetch_array($query)) //Display all rows from query
				{
					$table_users=$row['username']; //the first username row is passed on to $table_users, and so on until the query is finished
					if ($username==$table_users) //checks if there are any matching fields
					{
						$bool=false; //set bool to false
						Print '<script>alert("Username is not available!");</script>'; //Prompt the user
						Print '<script>window.location.assign("register.php");</script>'; //redirects to register.php
					}
				}
				if ($bool) {
					mysqli_query($conn, "INSERT INTO users_tbl (username, password) VALUES ('$username', '$password')"); //Insert the value to the table users_tbl
					Print '<script>alert("Successfully Registered");</script>'; //Prompt the user
					Print '<script>window.location.assign("register.php");</script>'; //redirects to register.php
				}
			}
			?>