<?php

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
//print_r($_REQUEST);

include 'connection.php';

$c1=new connection1();
$c1->connect();

$c1->sql="INSERT INTO payment(
payment_type,
payment_amount,
payment_date,
payment_status,
payment_stud_id)
    VALUES (
    '".$_REQUEST["payment_type"]."',  
    '".$_REQUEST["payment_amount"]."',  
    '".$_REQUEST["payment_date"]."',  
    '".$_REQUEST["payment_status"]."',  
    '".$_REQUEST["payment_stud_id"]."' )";

$c1->savedata($c1->sql);

echo "<script>alert('Payment Added Sucessfully..')</script>";
echo '<script language="Javascript">window.location = "add_payment.php";</script>';

?>