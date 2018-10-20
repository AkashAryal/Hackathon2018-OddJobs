<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if(empty($password) || empty($firstname) || empty($lastname) || empty($email) || empty($address)){
echo "<script>alert('Field is empty!');window.location.href='LogIn.html';</script>";
die();
}
if(!(empty($username)))
{

	$host="localhost";
	$dbusername = "root";
	$dbpassword = "ILMSIWLTMCD24/7";
	$dbname="hackathon2018";

	//create connection
	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

	if(mysqli_connect_error()){
	die("Connection Error (" .mysql_connect_errno(). ") " . mysql_connect_error());
	sleep(5);
	header('Location: SignIn.html');
	}
	else{

		$query = "select username,count(*) as count from user where username='$username'";
		$result =$conn->query($query) or die($conn->error);
		$c=mysqli_fetch_assoc($result);
		//echo $c['count'];
		if ($c['count'] !=0)
		{
			//print_r($result);
			echo "<script>alert('Username Taken!');window.location.href='SignIn.html'</script>";
			$conn->close();
			die();
		}
		$sql="INSERT INTO user (username, password, first_name, last_name, email, address) values('$username','$hashed_password', '$firstname', '$lastname','$email','$address')";

		if($conn->query($sql)){
			echo "<script>alert('Success! Login Created');window.location.href='user.php'</script>";
		}
		else{
			echo"Error: ". $sql ."<br>". $conn->error;
			sleep(5);
		}
		$conn->close();
		$_SESSION["user_id"]=$username;
    $_SESSION['first_name']=$firstname;
    $_SESSION['last_name']=$lastname
    $_SESSION['email']=$email;
    $_SESSION['address']=$address;
		//header('Location: user.php');
	}

}
else{
echo "<script>alert('Username field is empty!');window.location.href='sign-up.html'</script>";
//header('Location: sign-up.html');
die();
}
?>
