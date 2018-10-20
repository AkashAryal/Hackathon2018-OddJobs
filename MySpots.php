<html>
	<head>
		<title>TopSpot - My Spots</title>
	</head>
	<body>
		<link rel="stylesheet" type="text/css" href="Main.css">
		<ul>
  			<li><a href="user.php">Home</a></li>

		</ul>
		<div style = "position: relative; margin-top: 100px" class="form-style">
			<?php
				ini_set('session.gc_maxlifetime', 3600);
				session_set_cookie_params(3600);
				session_start();

				$host="localhost";
				$dbusername = "root";
				$dbpassword = "ILMSIWLTMCD24/7";
				$dbname="hackathon2018";

				//create connection
				$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

				if(mysqli_connect_error()){
				die("Connection Error (" .mysql_connect_errno(). ") " . mysql_connect_error());
				sleep(5);
				header('Location: LogIn.html');
				}
				else{
					$username=$_SESSION['user_id'];
					$query = "select * from myHosts where username='$username'";
					$result = $conn->query($query) or die($conn->error);
					$i=1;
					echo"<h1>My spots </h1>";
					while($row = $result->fetch_assoc()){
						//$row['data']
						echo "<ul1><strong><h7>Spot ID: ".$row['host_id']."</h7></strong><br>";
						echo "<h7>Comment for guest: ".$row['comment']."</h7><br>";
						echo "<h7>Opening Time: ".$row['open_time']."</h7><br>";
						echo "<h7>Closing Time: ".$row['close_time']."</h7><br>";
						echo "<h7>Price per Hour: ".$row['rate']."</h7><br><br>";
						$i++;
					}
				}
			?>
		</div>
	</body>
</html>
