<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($_REQUEST);
?>
<?php

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
//print_r($_REQUEST);
//$arr=$_POST['stud_id'];
//echo $stud_id=implode(",",$arr);
include 'connection.php';

$c1=new connection1();
$c1->connect();

foreach($_POST["stud_id"] as $stud_id)
{
  $c1->sql="INSERT INTO attendance(
    attendance_class_id,
    attendance_stud_id)
        VALUES (
            '".$_REQUEST["class_id"]."',  
            '".$stud_id."')";

    $c1->savedata($c1->sql);

}


echo "<script>alert('Attendance Added Sucessfully..')</script>";
echo '<script language="Javascript">window.location = "schedule.php";</script>';

?>
