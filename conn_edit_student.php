<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

include 'connection.php';
$c=new connection1();
$c->connect();



if(isset($_REQUEST["save"]))
{
   $c->sql="update student set
    stud_name='".$_POST["stud_name"]."' ,
    stud_dob='".$_POST["stud_dob"]."' ,
    stud_address='".$_POST["stud_address"]."' ,
    stud_email='".$_POST["stud_email"]."' ,
    stud_mobile='".$_POST["stud_mobile"]."' 
    where stud_id='".$_REQUEST["stud_id"]."'";
   
   $c->savedata($c->sql);
   
   $c->sql="update parents set
    parents_email='".$_POST["parents_email"]."' ,
    parents_mobile='".$_POST["parents_mobile"]."' 
    where parents_id='".$_REQUEST["parents_id"]."'";
   
   $c->savedata($c->sql);
   
   
   echo "<script>alert('Student Details Updated');document.location='manage_students.php'</script>";

}

?>
<?php //print_r($_REQUEST); ?>