<!DOCTYPE html>
<html>
	<head>
		<title>TopSpot - Welcome!</title>
	</head>
	<body>
	<link rel="stylesheet" type="text/css" href="Main.css">
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
		<img src="TopspotLogo.jpg" class="image">
		<div style = "position: relative; margin-top: 50px" class="form-style">
      <?php
      echo "<h3 style='text-align: center;'>".$_SESSION['user_id']."</h3>";
      ?>
			<a href="Guest.html"><input type="button" value="Reserve"></a>
			<a href="Host.html"><input type="button" value="Host"></a>
			<a href="MyReservations.html"><input type="button" value="My Reservations"></a>
			<a href="MySpots.html"><input type="button" value="My Spots"></a>
			<a href="logout.php"><input type="button" value="Log Out"></a>
		<div>
		<h6>&copy; 2018 3Faggots + Greg Inc.</h6>
	</body>
</html>
