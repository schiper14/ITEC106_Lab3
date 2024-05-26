	<!DOCTYPE html>
	<html>
		<head>
			<title> Lab 3 </title>
		</head>
		<style>
			table, th, td {
				border:1px solid black;
				text-align:center;
			}
			table { width:100%; }
			body {
				background-color: lightblue;
			}
			.container {
				display: flex;
				flex-direction: column;
				align-items: center;
			}
			a {
				display: inline-block;
				padding: 5px 10px;
				background-color: #4CAF50;
				color: black;
				text-decoration: none;
				border-radius: 5px;
			}
			a:hover {
				background-color: black;
				color: white;
			}
		</style>
		
		<?php
    session_start(); // starts the session
    if($_SESSION['user']) { // checks if user is logged in
    }
    else {
        header("location:index.php"); // redirects if user is not logged in
    }

    $user = $_SESSION['user']; // assigns user value
    $id_exists = false;

?>

<body>
<div class="container">
    <h2> EDIT DASHBOARD </h2>
    <p> Hello <span class="user"><?php Print "$user"?>!</span></p> <!-- Displays user's name -->
    <a href="logout.php" class="logout"> Logout </a><br/>

    <h2 style="text-align: center"> Currently Selected </h2>
    <table style="background-color: pink;" width="100%">
        <tr>
            <th> ID </th>
            <th> DETAILS </th>
            <th> POST TIME </th>
            <th> EDIT TIME </th>
            <th> PUBLIC POST </th>
        </tr>

    <?php
    $id = ""; 
        if(!empty($_GET['id']))
        {
            $id = $_GET['id'];
            $_SESSION['id'] = $id;
            $id_exists = true;
        }

        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $db_name = "first_db";

        //create connection
        $conn = mysqli_connect($servername, $username_db, $password_db, $db_name);
    
        //check the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = mysqli_query($conn,"Select * from list_tbl Where id='$id'"); // SQL Query
        $count = mysqli_num_rows($query);
        if($count > 0)
        {
            while($row = mysqli_fetch_array($query))
            {
                Print "<tr>";
                    Print "<td>". $row['id'] . "</td>";
                    Print "<td>". $row['details'] . "</td>";
                    Print "<td>". $row['date_posted']. " - ". $row['time_posted']. "</td>";
                    Print "<td>". $row['date_edited']. " - ". $row['time_edited']. "</td>";
                    Print "<td>". $row['public']. "</td>";
                Print "</tr>";
            }
        }
        else
        {
            $id_exists = false;
        }
    ?>

</table>
<br/>

<!-- Enter new detail: <input type="text" name="details"/><br/>
            public post? <input type="checkbox" name="public[]" value="yes"/><br/>
                <input type="submit" value="Update List"/> -->

<?php
    if($id_exists)
    {
        Print '<form action="edit.php" method="POST">
        <label for="details"> Enter new detail: </label> 
        <input type="text" id="details" name="details" required/> <br/>
        <label for="public">Public post?</label>
        <input type="checkbox" id="public" name="public[]" value="yes" /> <br/>
        <br>
        <input type="submit" value="Update List" class="button"/>
        </form>';
    }
    else 
    {
        Print '<h2 align = "center"> There is no data to be edited. </h2>';
    }
?>

    <br/>
    <a href="home.php" class="return"> Return to Homepage </a><br/>
</div>

</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $db_name = "first_db";

        //create connection
        $conn = mysqli_connect($servername, $username_db, $password_db, $db_name);

        //check conn
        if (!$conn) {
            die ("Connection failed: " . mysqli_connect_error());
        }

        $details = mysqli_real_escape_string($conn,$_POST['details']);
        $public = "no";
        $id = $_SESSION['id'];
        $time = strftime("%X"); // time
        $date = strftime("%B %d, %Y"); // date
        foreach($_POST['public'] as $list)
        {
            if($list != null)
            {
                $public = "yes";
            }
        } 

        mysqli_query($conn,"UPDATE list_tbl SET details='$details', public='$public', date_edited='$date', time_edited='$time' WHERE id='$id'");
        header("location:home.php");
    }
?>