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
		table, th, td {
			border:1px solid black;
			text-align:center;
		}
		table { 
			width:100%; 
			background-color: pink;
			border-radius: 10px;
			overflow: hidden;
		}
		th, td {
			padding 10px;
		}
		th {
			background-color: lightblue;
			color: black;
			font-weight: bold;
		}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-bottom: 20px;
		}
		input[type="text"], input[type="submit"] {
			padding: 10px;
			margin-bottom: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
		}
		input[type="submit"]{
			background-color: #4CAF50;
			color: black;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		.user-info {
			text-align: center;
			margin-bottom: 20px;
		}
		.user-info h2 {
			margin: 0;
		}
		.user-info p {
			margin: 10px 0;
			font-size: 1.2em;
		}
		.user-info a {
			display: block;
			margin-bottom: 20px;
			background-color: lightblue;
			color: black;
			padding: 10px;
			text-decoration: none;
			border-radius: 5px;
		}
		.user-info form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		.user-info form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		.user-info label {
			margin-top: 10px;
		}
		.user-info input[type="text"], .user-info input[type="submit"] {
			padding: 10px;
			margin-bottom: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
		}
		.user-info input[type="submit"] {
			background-color: #4CAF50;
			color: black;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}
		.user-info input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
	<?php

	session_start(); //starts the session
	if ($_SESSION['user']){ //checks if the user is not logged in
	}
	else {
		header ("location: index.php"); //redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value
	?>

	 <body>
	 	<div class="user-info">
	 	<h2>Home Page</h2>
	 	<p> Hello <?php Print "$user"?>!</p>		<!--Display's user name-->
	 	 <a href="logout.php" style="text-decoration: none; color: black; display: inline-block; background-color: #4CAF50; color: black; padding: 10px 20px; text-align: center; border-radius: 5px; text-decoration: none; font-size: 16px; margin: 10px 0px; transition: background-color 0.3s ease;">Click here to go logout</a>
	 	 <br>
	 	 <form action="add.php" method="POST">
	 	 	<label for="details">Add more to list:</label> 
	 	 	<input type="text" name="details" id="details" />
	 	 	<label for="public">Public post? </label>
	 	 	<input type="checkbox" name="public[]" id="public" value="yes" />
	 	 	<input type="submit" value="Add to list"/>
	 	 </form>
	 	</div>
	 	 <h2 align="center">My list</h2>
	 	 <table>
	 	 	<tr>
	 	 		<th>Id</th>
	 	 		<th>Details</th>
	 	 		<th>Post Time</th>
	 	 		<th>Edit Time</th>
	 	 		<th>Edit</th>
	 	 		<th>Delete</th>
	 	 		<th>Public Post</th>
	 	 	</tr>
	 	 	 <?php
	 	 	 	$servername = "localhost";
	 	 	 	$username_db = "root";
	 	 	 	$password_db = "";
	 	 	 	$db_name = "first_db";
	 	 	 	// Create connection
	 	 	 	$conn = mysqli_connect($servername, $username_db, $password_db, $db_name);
	 	 	 	// Check connection
	 	 	 	if (!$conn) {
	 	 	 		die("Connection failed: " . mysqli_connect_error());
	 	 	 	}
	 	 	 	$query = mysqli_query($conn, "Select * from list_tbl"); //SQL Query
	 	 	 	while($row = mysqli_fetch_array($query)) //Display all the rows from query
	 	 	 	{
	 	 	 		Print "<tr>";
	 	 	 			Print "<td>".$row['id']."</td>";
	 	 	 			Print "<td>".$row['details']."</td>";
	 	 	 			Print "<td>".$row['date_posted']. "-". $row['time_posted']."</td>";
	 	 	 			Print "<td>".$row['date_edited']. "-". $row['time_edited']."</td>";
	 	 	 			Print "<td><a href='edit.php?id=".$row['id']."'>edit</a></td>";
	 	 	 			Print "<td><a href='#' onclick='myFunction(".$row['id'].")'>delete</a></td>";
	 	 	 			Print "<td>".$row['public']."</td>";
	 	 	 			Print "</tr>";
	 	 	 	}


	 	 	 ?>
	 	 </table>
	 	 <script>
	 	 	function myFunction(id)
	 	 	{
	 	 		var r = confirm("Are you sure you want to delete this record?");
	 	 		if (r == true)
	 	 		{
	 	 			window.location.assign("delete.php?id=" + id);
	 	 		}
	 	 	}
	 	 </script>
	 	</body>
</html>
