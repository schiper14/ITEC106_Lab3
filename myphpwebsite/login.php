<!DOCTYPE html>
<html>
	<head>
		<title> Lab 3 </title>
	<style>
		body{
			background-color: lightblue;
		}

		.login-form {
			width: 300px;
			background-color: pink;
			padding: 20px;
			margin: 50px auto;
			border: 1px solid black;
			box-shadow: 0px 0px 10px 1px rgba(0,0,0,0.2);
		}

		.login-form label {
			display: block;
			margin-bottom: 5px;
		}

		.login-form input[type="text"],
		.login-form input[type="password"] {
			width: 100%;
			padding: 5px;
			margin-bottom: 10px;
			border: 1px solid black;
			border-radius: 5px;
			box-sizing: border-box;
		}

		.login-form input[type="submit"] {
			background-color: black;
			color: white;
			padding: 5px 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;

		}

		.login-form input[type="submit"]:hover {
			background-color: #b2d8d8;
		}

		progress{
			width: 100px;
			height: 5px;
			background-color: lightblue;
		}

		progress::-webkit-progress-bar {
			background-color: pink;
		}

		progress::-webkit-progress-value {
			background-color: lightblue;
		}
	</style>
	</head>
	<body>
		<form class="login-form" action="checklogin.php" method="POST" style="display: flex; flex-direction: column; align-items: center;">
			<h1> Login Page</h1>
			<a href="index.php" style="display: inline-block; background-color: #4CAF50; color: black; padding: 10px 20px; text-align: center; border-radius: 5px; text-decoration: none; font-size: 16px; margin: 10px 0px; transition: background-color 0.3s ease;">Click here to go back</a>
			<br />
			<br />
			<label for="username">Enter Username:</label>
			 <input type="text" id="username" name="username" required="required"> 
			<br/>
			<label for="password">Enter password:</label>
			 <input type="password" id="password" name="password" required="required"> 
			<br />
			<input type="submit" value="Login"/>
		</form>
		<progress value="50" max="100"></progress>
	</body>
	</html>
