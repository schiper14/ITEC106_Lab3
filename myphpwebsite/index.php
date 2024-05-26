<!DOCTYPE html>
<html>
	<head>
	<title> Lab 3 </title>
	<style>
		body {
			background-color: lightblue;
			color: black;
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		table, th, td {
			border:1px solid black;
			text-align:center;
		}
		table { 
			width:100%; 
			background-color: pink;
		}
		a {
			display: inline-block;
			background-color: #4CAF50;
			color: black;
			padding: 10px 20px;
			text-align: center;
			border-radius: 5px;
			text-decoration: none;
			font-size: 16px;
			margin: 10px 0px;
			transition: background-color 0.3s ease;
		}
		a:hover {
			background-color: #3e8e41;
		}
	</style>
	</head>
	<body>
		<?php
			echo "<h1> My PHP Website </h1>";
		?>
		<br>
		<a href="login.php"> Click here to login </a>
		<br>
		<a href="register.php"> Click here to register </a>
		<br>
		<br>
		<br>
		<h2 align="center">My list</h2>
		<table>
			<tr>
				<th>Id</th>
				<th>Details</th>
				<th>Post Time</th>
				<th>Edit Time</th>
			</tr>
			 <?php
			 	$servername = "localhost";
			 	$username_db = "root";
			 	$password_db = "";
			 	$db_name = "first_db";
			 	// Create connection
			 	$conn = mysqli_connect($servername, $username_db, $password_db, $db_name);
			 	//check connection
			 	if (!$conn) {
			 		die("Connection failed: " . mysqli_connect_error());
			 	}
			 	$query = mysqli_query($conn, "Select * from list_tbl"); //SQL Query
			 	while($row = mysqli_fetch_array($query)) //Display all the rows from query
			 	{
			 		Print "<tr>";
			 			Print "<td>".$row['id']."</td>";
			 			Print "<td>".$row['details']."</td>";
			 			Print "<td>".$row['date_posted']."-".$row['time_posted']."</td>";
			 			Print "<td>".$row['date_edited']."-".$row['time_edited']."</td>";
			 			Print "</tr>";
			 	}
			 ?>
		</table>
	</body>
</html>
