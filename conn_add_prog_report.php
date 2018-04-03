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

include 'connection.php';

$c1=new connection1();
$c1->connect();

$c1->sql="INSERT INTO student_progress(
stud_prog_stud_id,
stud_prog_rank_id,
stud_prog_rank_date)
    VALUES (
    '".$_REQUEST["stud_id"]."',  
    '".$_REQUEST["stud_rank_id"]."',  
    '".$_REQUEST["stud_rank_given_date"]."' )";

$c1->savedata($c1->sql);

$c=new connection1();
$c->connect();
$c->sql="update student set
    stud_rank_id='".$_POST["stud_rank_id"]."' 
    where stud_id='".$_REQUEST["stud_id"]."'";
$c->savedata($c->sql);


echo "<script>alert('Progress Addedd Sucessfully..')</script>";
echo '<script language="Javascript">window.location = "manage_ranks.php";</script>';

?>