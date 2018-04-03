	<?php
session_start();
include './connection.php';
include './header.php';
include './sidemenu.php';
include './navbar_top.php';
error_reporting(E_ALL ^ E_DEPRECATED);
$sid= $_REQUEST['stud_id']
?>
<?php	

$c1=new connection1();
$c1->connect();

$c1->sql="select * from student where stud_id='".$sid."'";
$c1->getdata($c1->sql);
while($row=mysql_fetch_array($c1->res))
{
    $stud_erno=$row['stud_enroll_num'];
    $stud_name=$row['stud_name'];
//  $stud_address=$row['stud_address'];
//  $stud_email=$row['stud_email'];
//  $stud_dob=$row['stud_dob'];
//  $stud_mobile=$row['stud_mobile'];
//  $stud_status=$row['stud_status'];
//  $stud_joindate=$row['stud_join_date'];
//  $stud_rank=$row['rank_belt_color'];
}
?>
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Student Progress</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2><b>Progress Report Information</b></h2>
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
                    <form class="form-horizontal form-label-left" method="post" action="conn_add_prog_report.php">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Enrollment Number  </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="stud_id" class="form-control" value="<?php echo $sid; ?>" readonly="true">
                            <input type="text" name="stud_enroll_num" class="form-control" value="<?php echo $stud_erno ?>" readonly="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Student Name  </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="stud_name" class="form-control" value="<?php echo $stud_name ?>" readonly="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Rank <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="stud_rank_id">
                              <?php	

                                $c=new connection1();
                                $c->connect();
                                $c->sql="select * from rank";
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
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Rank Given Date <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="stud_rank_given_date" class="form-control" >
                        </div>
                      </div> 
                        
                        <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
                          <!--<button type="reset" class="btn btn-dark"><i class="fa fa-close"></i> Reset</button>-->
                          <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add Rank</button>
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