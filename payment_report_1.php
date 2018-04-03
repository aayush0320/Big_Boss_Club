<?php 
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

include 'connection.php';

?>
<?php
include './header.php';
include './sidemenu.php';
include './navbar_top.php';
?>

   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Payment Reports</h3>
              </div>
            </div>
              
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Payments between <?php echo $_POST['start_date']; ?> to <?php echo $_POST['end_date']; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link" href="payment_report.php"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    <div id="delete_div"> </div>
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Invoice No</th>
                          <th>Payment Type</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Received From</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                        <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="select payment.*,payment_type.payment_type_name,student.stud_name from payment inner join payment_type on payment.payment_type=payment_type.payment_type_id inner join student on payment.payment_stud_id=student.stud_id where payment_date between ('".$_POST['start_date']."') and ('".$_POST['end_date']."') order by payment_id";
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
                             echo "<td><b>" .$row['payment_type_name'] . "</b></td>";
                             echo "<td>". $row['payment_amount'] ."</td>";
                             echo "<td>". $row['payment_date']."</td>";
                             echo "<td><b>". $row['stud_name'] ."</b></td>";
                             echo "<td>". $img."</td>";
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