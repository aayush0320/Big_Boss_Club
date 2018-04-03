<?php

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

include 'connection.php';

$c=new connection1();
$c->connect();
$c->sql="select * from user where (user_name = '" . $_POST['username'] . "') and (user_password = '" .$_POST['password']. "')";
$c->getdata($c->sql);
$no=mysql_num_rows($c->res);
if($no > 0)
{
   while($row=mysql_fetch_array($c->res))
    {
          $usertype=$row['user_type'];
          $userid=$row['user_id'];
          //echo "User Id: ".$uid;
    }
   $_SESSION["user_name"]=$_REQUEST["username"];
   $_SESSION["user_type"]=$usertype;
   $_SESSION["user_id"]=$userid;
   
      header("location:welcome.php");   
}
else
{
  
  echo "<script>alert('Invalid Username or Password.')</script>";
  echo '<script language="Javascript">window.location = "index.php";</script>';
  
}

?>