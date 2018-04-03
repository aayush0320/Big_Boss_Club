<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

include 'connection.php';
$c=new connection1();
$c->connect();



if(isset($_REQUEST["save"]))
{
   $c->sql="update payment set
    payment_type='".$_POST["payment_type"]."' ,
    payment_amount='".$_POST["payment_amount"]."' ,
    payment_date='".$_POST["payment_date"]."' ,
    payment_status='".$_POST["payment_status"]."' ,
    payment_stud_id='".$_POST["payment_stud_id"]."' 
    where payment_id='".$_REQUEST["payment_id"]."'";
   
   $c->savedata($c->sql);
   
   echo "<script>alert('Payment Details Updated');document.location='manage_payment.php'</script>";

}

?>
<?php //print_r($_REQUEST); ?>