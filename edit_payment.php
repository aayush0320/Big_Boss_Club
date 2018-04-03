<?php
session_start();
include './connection.php';
include './header.php';
include './sidemenu.php';
include './navbar_top.php';
error_reporting(E_ALL ^ E_DEPRECATED);
$sid= $_GET['sid']
?>
<?php	

$c1=new connection1();
$c1->connect();

$c1->sql="SELECT payment.*,student.stud_name,payment_type.* from payment INNER JOIN student on payment.payment_stud_id=student.stud_id INNER JOIN payment_type on payment.payment_type=payment_type.payment_type_id where payment.payment_id='".$sid."'";
$c1->getdata($c1->sql);
while($row=mysql_fetch_array($c1->res))
{
  $inv_no=$row['payment_id'];
  $inv_date=$row['payment_date'];
  $inv_type=$row['payment_type_name'];
  $inv_amount=$row['payment_amount'];
  $inv_status=$row['payment_status'];
  $inv_stud_id=$row['payment_stud_id'];
  $inv_stud=$row['stud_name'];
  $inv_type_id=$row['payment_type'];
} 
?>
   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Payment</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2><b>Invoice No : <?php echo $inv_no; ?></b></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                     <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" method="post" action="conn_edit_payment.php">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Invoice Number <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="payment_id" class="form-control" value="<?php echo $inv_no; ?>" readonly="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Payment Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="payment_type">
                              <?php	
                                echo "<option value=".$inv_type_id.">".$inv_type."</option>";
                              
                                $c=new connection1();
                                $c->connect();
                                $c->sql="select * from payment_type";
                                $c->getdata($c->sql);
                                while($row=mysql_fetch_array($c->res))
                                {
                                  echo "<option value=".$row[0].">".$row[1]."</option>";
                                } 
                              ?>
                          </select>
                        </div>
                      </div>
`
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Amount <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="payment_amount" class="form-control" value="<?php echo $inv_amount; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Payment Date <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="payment_date" class="form-control" value="<?php echo $inv_date; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Payment Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="payment_status">
                              <?php	
                                echo "<option value=".$inv_status.">".$inv_status."</option>";
                              ?>
                              <option value="paid">Paid</option>
                              <option value="pending">Pending</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Payment By</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="payment_stud_id">
                              <?php	
                                echo "<option value=".$inv_stud_id.">".$inv_stud."</option>";
                              
                                $c=new connection1();
                                $c->connect();
                                $c->sql="select * from student";
                                $c->getdata($c->sql);
                                while($row=mysql_fetch_array($c->res))
                                {
                                  echo "<option value=".$row[0].">".$row[2]."</option>";
                                } 
                              ?>
                          </select>
                        </div>
                      </div>
                     

                      <div class="ln_solid"></div>
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
                            <a  href="manage_payment.php" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Back</a>
                          <button type="submit" class="btn btn-success" name="save"><i class="fa fa-floppy-o"></i> Save Changes</button>
                        </div>
                      </div>
                      
                    </form>
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