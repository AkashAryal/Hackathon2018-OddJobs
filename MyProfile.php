<!DOCTYPE html>
<html>
	<head>
		<title>TopSpot - My Profile</title>
	</head>
	<body>
		<?php
		session_start();
		/*if(isset($_SESSION['user_id'])){

		}
		else{
			 session_destroy();
			 setcookie("PHPSESSID","",time()-3600,"/");
			 echo "<script>alert('Log back in!');window.location.href='Poll_home.html';</script>";
		 }*/
		?>
		 ?>
		<link rel="stylesheet" type="text/css" href="Main.css">
		<div style = "position: relative; margin-top: 50px" class="form-style">
			<form method="POST">
				<?php
				echo "<h1>Username: ".$_SESSION['user_id']."</h1><br>";
				echo "<input type="text" name="firstname" placeholder="First Name" value = ".$_SESSION['user_id']."><br>";
				echo "<input type="text" name="lastname" placeholder="Last Name" value = ".$_SESSION['user_id']."><br>";
				echo "<input type="text" name="email" placeholder="Email" value = ".$_SESSION['user_id']."><br>";
				echo "<input type="text" name="address" placeholder="Address" value = ".$_SESSION['user_id']."><br>";
				?>
				<a href="EditProfile.php"><input type="button" value="Save Changes"></a>
			</form>
		<div>
	</body>
</html>
