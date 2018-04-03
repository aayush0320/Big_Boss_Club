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

$c1->sql="select * from student ORDER BY stud_id DESC LIMIT 1";
$c1->getdata($c1->sql);
while($row=mysql_fetch_array($c1->res))
{
  $erno=$row[1];
  $erno++;
} 
?>
   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Student</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Details</h2>
                  <div class="clearfix"></div>
                  </div>
                     <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" method="post" action="conn_add_student.php">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Enrollment Number <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="stud_enroll_num" class="form-control" value="<?php echo $erno; ?>" readonly="true">
                        </div>
                      </div>
                      <div class="form-group">
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
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Contact <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="stud_mobile" class="form-control" placeholder="6399982886">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Rank</label>
						
							<div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="stud_enroll_num_display" class="form-control" value="White Belt" readonly="true">
                          <input type="hidden" name="stud_rank_id" class="form-control" value="1" >
                        </div>
						
						
                        <!--<div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="stud_rank_id">
                              <?php	
									
                            #    $c=new connection1();
                            #   $c->connect();
                           #    $c->sql="select * from rank";
                           #    $c->getdata($c->sql);
                           #   while($row=mysql_fetch_array($c->res))
                           #    {
                           #     echo "<option value=".$row[0].">".$row[1]."</option>";
                           #    } 
                              ?>
                          </select>
                        </div>-->
                      </div>
                     

                      <div class="ln_solid"></div>
                      
                      <div class="form-group col-xs-12">
                        <div class="form-group col-xs-1"></div>
                        <div class="form-group col-xs-5">
                            <center>
                                <div class="radio">
                                    <label class="">
                                        <div class="iradio_flat-green" style="position: relative;"><input type="radio" class="flat" checked="" value="1" name="iCheck" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 
                                    </label>
                                </div>
                            </center>
                           <br/>
                            <div class="form-group">
                              <label class="control-label col-md-4 col-sm-4 col-xs-12">Parents Email Id <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="parents_email" class="form-control" placeholder="name@example.com">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-4 col-sm-4 col-xs-12">Parents Phone <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="parents_mobile" class="form-control" placeholder="5192712945">
                              </div>
                            </div>
                        </div>
                        <div class="form-group col-xs-1"><div class="radio"><label></label></div><img src="images/icon_OR.png" width="60%" height="60%"/></div>
                        <div class="form-group col-xs-5">
                            <center>
                                <div class="radio">
                                    <label class="">
                                        <div class="iradio_flat-green" style="position: relative;"><input type="radio" class="flat" name="iCheck" value="2" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                    </label>
                                </div>
                            </center>
                            <br/>
                             <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Parents Email</label>
								
							
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control" name="parents_id">
                                      <option>Choose from Existing List</option>
                                      <?php	

                                        $c3=new connection1();
                                        $c3->connect();
                                        $c3->sql="select * from parents";
                                        $c3->getdata($c3->sql);
                                        while($row=mysql_fetch_array($c3->res))
                                        {
										   if($row[1]!=NULL){
											echo "<option value=".$row[0].">".$row[1]."</option>";
										   }
                                        } 
                                      ?>
                                  </select>
                                </div>
                             </div>
                        </div>
                        <div class="form-group col-xs-1"></div>
                    </div>
                         
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                          <!--<button type="reset" class="btn btn-dark"><i class="fa fa-close"></i> Reset</button>-->
                          <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Student</button>
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