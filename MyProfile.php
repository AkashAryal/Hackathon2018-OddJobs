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
			<?php
			echo "<h3 style='text-align: center; font=Arial, Helvetica, sans-serif'>Username: ".$_SESSION['user_id']."</h3>";
			echo "<h3 style='text-align: center; font=Arial, Helvetica, sans-serif'>First Name: ".$_SESSION['first_name']."</h3>";
			echo "<h3 style='text-align: center; font=Arial, Helvetica, sans-serif'>Last Name: ".$_SESSION['last_name']."</h3>";
			echo "<h3 style='text-align: center; font=Arial, Helvetica, sans-serif'>E-mail: ".$_SESSION['email']."</h3>";
			echo "<h3 style='text-align: center; font=Arial, Helvetica, sans-serif'>Address: ".$_SESSION['address']."</h3>";
			?>
			<a href="EditProfile"><input type="button" value="Edit Profile"></a>
		<div>
	</body>
</html>
