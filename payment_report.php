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
                <h3>Payment Reports</h3>
              </div>
            </div>
              
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Select Option to Generate Dynamic Reports</h2>
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
                    <div id="delete_div"> </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" >
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Select Report Type </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="report_type" name="report_type">
                              <option value="">Select from here...</option>
                              <option value="s1">Payments between Duration</option>
                              <option value="s2">Payments by Category</option>
                              <option value="s3">Payments by Student ID</option>
                              <option value="s3">Payments by Status</option>
                          </select>
                        </div>
                      </div>
                     
<!--                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Full Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="stud_name" class="form-control" placeholder="FirstName LastName">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Date of Birth <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="stud_dob" class="form-control" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="3" name="stud_address" placeholder="Full Address with Postal Code"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Email Id <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="stud_email" class="form-control" placeholder="name@example.com">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Phone <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="stud_mobile" class="form-control" placeholder="5192712945">
                        </div>
                      </div>-->
                      
                      <div class="ln_solid"></div>
                      
<!--                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <button type="reset" class="btn btn-dark"><i class="fa fa-close"></i> Reset</button>
                          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                        </div>
                      </div>-->
                      
                    </form>			
                    <div id="showMe1" style="display: none;">
                    
                        <form class="form-horizontal form-label-left" method="post" action="payment_report_1.php">
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Select Start Date <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="start_date" class="form-control" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Select End Date <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="end_date" class="form-control" >
                        </div>
                      </div>      
                      
                      <div class="ln_solid"></div>
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <button type="reset" class="btn btn-dark"><i class="fa fa-close"></i> Reset</button>
                          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                        </div>
                      </div>
                    </form> 
                      </div>
                      <div id="showMe2" style="display: none;">
                               <form class="form-horizontal form-label-left" method="post" action="payment_report_1.php">
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Select Payment Type <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="payment_type">
                                    <option value="">Select from here...</option>
                                    <?php	

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
                      
                      <div class="ln_solid"></div>
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <button type="reset" class="btn btn-dark"><i class="fa fa-close"></i> Reset</button>
                          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                        </div>
                      </div>
                    </form>
                    
                      </div>
                      <div id="showMe3" style="display: none;">
                          <form class="form-horizontal form-label-left" method="POST" action="student_report_3.php">
                            <div class="form-group">
                              <label class="control-label col-md-4 col-sm-4 col-xs-12">Select Student</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="student_id">
                                    <option value="">Select from here...</option>
                                    <?php	

                                        $c=new connection1();
                                        $c->connect();
                                        $c->sql="select * from student WHERE stud_status='active'";
                                        $c->getdata($c->sql);
                                        while($row=mysql_fetch_array($c->res))
                                        {
                                          echo "<option value=".$row[0].">".$row[2]." (".$row[1].")</option>";
                                        } 
                                      ?>
                                </select>
                              </div>
                            </div>
                              <div class="ln_solid"></div>
                      
                            <div class="form-group">
                              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                                <button type="reset" class="btn btn-dark"><i class="fa fa-close"></i> Reset</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                              </div>
                            </div>
                      
                        </form>
                      </div>
                      <div id="showMe4" style="display: none;">
                          show me 4
                      </div>
                      <div id="showMe5" style="display: none;">
                          show me 5
                      </div>
                      
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
var elem = document.getElementById("report_type");
elem.onchange = function(){
    if(elem.value=='s1'){
        var hiddenDiv = document.getElementById("showMe1");
        hiddenDiv.style.display = (this.value == "") ? "none":"block";
        var hiddenDiv = document.getElementById("showMe2");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe3");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe4");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe5");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
    }
    else if(elem.value=='s2'){
        var hiddenDiv = document.getElementById("showMe2");
        hiddenDiv.style.display = (this.value == "") ? "none":"block";
        var hiddenDiv = document.getElementById("showMe1");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe3");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe4");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe5");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
    }
    else if(elem.value=='s3'){
        var hiddenDiv = document.getElementById("showMe3");
        hiddenDiv.style.display = (this.value == "") ? "none":"block";
        var hiddenDiv = document.getElementById("showMe1");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe2");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe4");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe5");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
    }
    else if(elem.value=='s4'){
        var hiddenDiv = document.getElementById("showMe4");
        hiddenDiv.style.display = (this.value == "") ? "none":"block";
        var hiddenDiv = document.getElementById("showMe2");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe3");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe1");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe5");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
    }
    else if(elem.value=='s5'){
        var hiddenDiv = document.getElementById("showMe5");
        hiddenDiv.style.display = (this.value == "") ? "none":"block";
        var hiddenDiv = document.getElementById("showMe2");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe3");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe4");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe1");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
    }
    else{
        var hiddenDiv = document.getElementById("showMe5");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe2");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe3");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe4");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
        var hiddenDiv = document.getElementById("showMe1");
        hiddenDiv.style.display = (this.value == "") ? "none":"none";
    }
};
</script>
        