<?php

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
//print_r($_REQUEST);

include 'connection.php';

if($_REQUEST['iCheck']==1){
$c1=new connection1();
$c1->connect();

$c1->sql="INSERT INTO parents(
parents_email,
parents_mobile)
    VALUES (
    '".$_REQUEST["parents_email"]."',  
    '".$_REQUEST["parents_mobile"]."' )";

$c1->savedata($c1->sql);

$c2=new connection1();
$c2->connect();
$c2->sql="select * from parents ORDER BY parents_id DESC LIMIT 1";
$c2->getdata($c2->sql);
while($row=mysql_fetch_array($c2->res))
{
      $pid=$row['parents_id'];
}
}

if($_REQUEST['iCheck']==2){
    $pid=$_REQUEST['parents_id'];
}

$c=new connection1();
$c->connect();

$c->sql="INSERT INTO student(
stud_enroll_num,
stud_name,
stud_address,
stud_email,
stud_dob,
stud_mobile,
stud_rank_id,
stud_parents_id,
stud_user_id)
    VALUES (
    '".$_REQUEST["stud_enroll_num"]."',
    '".$_REQUEST["stud_name"]."',
    '".$_REQUEST["stud_address"]."',
    '".$_REQUEST["stud_email"]."' ,
    '".$_REQUEST["stud_dob"]."',  
    '".$_REQUEST["stud_mobile"]."',  
    '".$_REQUEST["stud_rank_id"]."' ,
        '".$pid."',
    '".$_SESSION["user_id"]."')";

$c->savedata($c->sql);
$c=new connection1();
$c->connect();
$c1->sql="select * from student where stud_email = '".$_REQUEST["stud_email"]."'";
$c1->getdata($c1->sql);
while($row=mysql_fetch_array($c1->res))
{
  $stuno=$row[0];
} 

$c1=new connection1();
$c1->connect();

$c1->sql="INSERT INTO student_progress(
stud_prog_stud_id,
stud_prog_rank_id,
stud_prog_rank_date)
    VALUES (
    '".$stuno."',  
    '".$_REQUEST["stud_rank_id"]."',  
    '".date("Y-m-d")."' )";

$c1->savedata($c1->sql);

echo "<script>alert('Student Registered Sucessfully..')</script>";
echo '<script language="Javascript">window.location = "manage_students.php";</script>';

?>