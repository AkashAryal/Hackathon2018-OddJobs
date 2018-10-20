<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();

$rate = filter_input(INPUT_POST, 'rate');
$comment = filter_input(INPUT_POST, 'hostcomment'); //echo "$rate $comment";
$opentime = filter_input(INPUT_POST, 'opentime');
$closetime =filter_input(INPUT_POST, 'closetime');

//echo "ct: ".$closetime;
//echo "ot: ".$opentime;

$ct= str_replace("T"," ","$closetime").":00";
$ot= str_replace("T"," ","$opentime").":00";
echo strtotime($ct);
//$dateCT = date('Y-m-d H:i:s',strtotime($ct));
//$dateCT = date('Y-m-d H:i:s',strtotime($ct));
//$dateCT = $dateCTtemp->format('Y-m-d H:i:s');
//$dateOT = date('Y-m-d H:i:s',strtotime( $ot));
//$dateOT = $dateOTTemp->format('Y-m-d H:i:s');

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
  $id= random_int(0,1000000);
  $username=$_SESSION['user_id'];
  $address=$_SESSION['address'];
  $sql="INSERT INTO myHosts (host_id, username, address, open_time, close_time, rate, comment) values($id, '$username', '$address', '$ot', '$ct', $rate, '$comment')";

  if($conn->query($sql)){
    echo "<script>alert('success');window.location.href='user.php';</script>";
    //header("Location: user.php");
  }
  else{
    echo"Error: ". $sql ."<br>". $conn->error;
    sleep(5);
  }
//DateTime::createFromFormat("Y-m-d H:i", "2000-01-01 01:30"); // 2000-01-01 01:30:00.000000
}
$conn->close();
?>
