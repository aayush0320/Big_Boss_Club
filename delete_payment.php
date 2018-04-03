<?php

$sid=$_GET["sid"];

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

include 'connection.php';
$c=new connection1();
$c->connect();

            $c->sql="delete from payment where payment_id='".$sid."'";
            $c->savedata($c->sql);
            echo "<div class=\"alert alert-info alert-dismissible fade in\" role=\"alert\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span>
                    </button>
                    <strong>Delete Successfully!</strong> Please Reload Page (Press F5) to Apply Changes.
                  </div>";
						


?>
