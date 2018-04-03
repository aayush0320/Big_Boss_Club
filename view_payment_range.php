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
                <h3>Payment</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-graduation-cap"></i> Search Payment By Date</h2>
                   <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                    <form class="form-horizontal form-label-left" method="post" action="searched_payment.php">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">From Date</label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="date" class="form-control" name="from_date"/>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">To Date</label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="date" class="form-control" name="to_date"/>
                        </div>
                      </div>
                       
                        <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
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