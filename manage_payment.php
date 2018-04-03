<?php
session_start();
include './connection.php';
include './header.php';
include './sidemenu.php';
include './navbar_top.php';
error_reporting(E_ALL ^ E_DEPRECATED);
?>

   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Payment</h3>
              </div>
            </div>
              
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Payment Details</h2>
                  <div class="clearfix"></div>
                  </div>
                    <div id="delete_div"> </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      You can view the payment details here. You can also edit and delete the information of payment. 
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Invoice No</th>
                          <th>Date</th>
                          <th>Payment Type</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th>Payment By</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="SELECT payment.*,student.stud_name,payment_type.* from payment INNER JOIN student on payment.payment_stud_id=student.stud_id INNER JOIN payment_type on payment.payment_type=payment_type.payment_type_id ORDER by payment.payment_id";
                            $c->getdata($c->sql);

                             echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                               if($row['payment_status']=='paid')
                               {
                                   $img="<span class=\"badge bg-green\">Paid</span>";
                               }
                               else
                               {
                                   $img="<span class=\"badge bg-red\">Pending</span>";
                               }

                             echo "<tr>";
                             echo "<td>". $row['payment_id'] ."</td>";
                             echo "<td><b>" .$row['payment_date'] . "</b></td>";
                             echo "<td>". $row['payment_type_name'] ."</td>";
                             echo "<td>". $row['payment_amount']."</td>";
                             echo "<td>". $img."</td>";
                             echo "<td>". $row['stud_name']."</td>";
                             echo "<td>"."<a class=\"btn btn-dark \" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"Edit\" href=\"edit_payment.php?page=edit_student&sid=".$row['payment_id']." \"><i class=\"fa fa-edit\"></i></a>"
                                     ."<a class=\"btn btn-danger\" href=\"#\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"Delete\" onclick=\"deleteMe('".$row['payment_id']."');\"><i class=\"fa fa-trash-o\"></i> </a>"."</td>";
                             echo "</tr>";
                            }
                            echo "</tbody>"; 
                        ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        
<?php 
include './footer.php';
include './jscript.php';
?>
<script>
function deleteMe(str){
    var c=confirm("Are you Sure want to Delete this item?");
    if(c==true)
    {
        var xmlhttp;
                if(window.XMLHttpRequest)
                {//code for IE7+,Firefox,Chrome,Opera,Safari 
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {//code for IE5,IE6
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function()
                {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            document.getElementById("delete_div").innerHTML=xmlhttp.responseText;
                        }
                }
                xmlhttp.open("GET","delete_payment.php?sid="+str,true);
                xmlhttp.send();
    }
    else{
            
    }
}
</script>