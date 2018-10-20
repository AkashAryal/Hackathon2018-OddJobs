<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if(empty($password)){
echo "<script>alert('Password field is empty!');window.location.href='sign-up.html';</script>";
die();
}

if(!(empty($username)))
{
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
		$sql="SELECT password FROM user WHERE username='$username'";
		if($conn->query($sql)){
			$hashed_password=$conn->query("SELECT password FROM user WHERE username='$username'")->fetch_object()->password;
      $firstname=$conn->query("SELECT first_name FROM user WHERE username='$username'")->fetch_object()->first_name;
      $lastname=$conn->query("SELECT last_name FROM user WHERE username='$username'")->fetch_object()->last_name;
      $email=$conn->query("SELECT email FROM user WHERE username='$username'")->fetch_object()->email;
      $address=$conn->query("SELECT address FROM user WHERE username='$username'")->fetch_object()->address;

			//echo $hashed_password;
			//echo $password;
			if(password_verify($password, $hashed_password)){
				$_SESSION["user_id"]=$username;
        $_SESSION['first_name']=$firstname;
        $_SESSION['last_name']=$lastname;
        $_SESSION['email']=$email;
        $_SESSION['address']=$address;
        $conn->close();
				header('Location: user.php');

			}
			else{
				$conn->close();

				echo "<script>alert('password does not match!');window.location.href='LogIn.html';</script>";
			}

		}
		else{
			echo "Error: ". $sql ."<br>". $conn->error;
			$conn->close();
			sleep(5);
		}

	}
}
else{
echo "<script>alert('Username field is empty!');window.location.href='LogIn.html'</script>";
//header('Location: sign-up.html');
die();
}
?>
