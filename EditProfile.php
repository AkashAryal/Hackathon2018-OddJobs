<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();

$username=$_SESSION['user_id'];
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');

//change the db:
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
//  $sql="SELECT password FROM user WHERE username='$username'";
  $sql="UPDATE user SET `first_name`='$firstname',
 `last_name`='$lastname',
   `email`='$email',
   `address`='$address'
  where `username`='$username'";

  if($conn->query($sql)){
  echo "<script>alert('Success! Login Created');window.location.href='MyProfile.php'</script>";
  }else{
    echo"Error: ". $sql ."<br>". $conn->error;
    sleep(5);
  }
  $conn->close();

}
?>
