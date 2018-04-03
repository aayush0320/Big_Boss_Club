<?php
session_start();
include './connection.php';
include './header.php';
include './sidemenu.php';
include './navbar_top.php';
error_reporting(E_ALL ^ E_DEPRECATED);
?>
<?php	

$c1=new connection1();
$c1->connect();

$c1->sql="select * from payment ORDER BY payment_id DESC LIMIT 1";
$c1->getdata($c1->sql);
while($row=mysql_fetch_array($c1->res))
{
  $pno=$row[0]+1;
} 
?>
   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Payment</h3>
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
                     <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" method="post" action="conn_add_payment.php">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Invoice No <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="payment_id" class="form-control" value="<?php echo $pno; ?>" readonly="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Payment Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="payment_type">
                              <?php	

                                $c=new connection1();
                                $c->connect();
                                $c->sql="select * from payment_type order by payment_type_id";
                                $c->getdata($c->sql);
                                while($row=mysql_fetch_array($c->res))
                                {
                                  echo "<option value=".$row[0].">".$row[1]."</option>";
                                } 
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Amount (CAD) <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="payment_amount" class="form-control" placeholder="500">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Payment Date <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="payment_date" class="form-control" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Payment Status <span class="required">*</span></label>
                        <div class="radio">
                            <label>
                                <input type="radio" class="flat" checked name="payment_status" value="paid"> Paid
                            </label>
                            <label>
                                <input type="radio" class="flat" name="payment_status" value="pending"> Pending
                            </label>
                        </div>                        
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Payment Received From <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="payment_stud_id">
                              <option>Select Student...</option>
                              <?php	

                                $c=new connection1();
                                $c->connect();
                                $c->sql="select * from student order by stud_name";
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
                        <!--  <button type="reset" class="btn btn-dark"><i class="fa fa-close"></i> Reset</button> -->
                          <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Payment</button>
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