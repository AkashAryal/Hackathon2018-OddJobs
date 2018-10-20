<?php
session_start();
session_destroy();
setcookie("PHPSESSID","",time()-3600,"/");
echo "<script>alert('Logged Off');window.location.href='LogIn.html';</script>";
?>
