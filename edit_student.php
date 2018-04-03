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

$c1->sql="select student.*,parents.*,rank.rank_belt_color from student inner join parents on student.stud_parents_id=parents.parents_id inner join rank on student.stud_rank_id=rank.rank_id where stud_id='".$sid."'";
$c1->getdata($c1->sql);
while($row=mysql_fetch_array($c1->res))
{
  $stud_erno=$row['stud_enroll_num'];
  $stud_name=$row['stud_name'];
  $stud_address=$row['stud_address'];
  $stud_email=$row['stud_email'];
  $stud_dob=$row['stud_dob'];
  $stud_mobile=$row['stud_mobile'];
  $stud_joindate=$row['stud_join_date'];
  $stud_rank=$row['stud_rank_id'];
  $stud_parents_id=$row['stud_parents_id'];
  $parents_email=$row['parents_email'];
  $parents_mobile=$row['parents_mobile'];
  $register_by=$row['stud_user_id'];
  $stud_belt=$row['rank_belt_color'];
} 
?>
   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Student</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2><b><?php echo $stud_name; ?></b></h2>
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
                    <form class="form-horizontal form-label-left" method="post" action="conn_edit_student.php">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Enrollment Number <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="stud_id" class="form-control" value="<?php echo $sid; ?>">
                          <input type="hidden" name="parents_id" class="form-control" value="<?php echo $stud_parents_id; ?>">
                          <input type="text" name="stud_enroll_num" class="form-control" value="<?php echo $stud_erno; ?>" readonly="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Full Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="stud_name" class="form-control" value="<?php echo $stud_name; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Date of Birth <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="stud_dob" class="form-control" value="<?php echo $stud_dob; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="3" name="stud_address"><?php echo $stud_address; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Email Id <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="stud_email" class="form-control" value="<?php echo $stud_email; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Phone <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="stud_mobile" class="form-control" value="<?php echo $stud_mobile; ?>">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Parents Email Id <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="parents_email" class="form-control" value="<?php echo $parents_email; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Parents Phone <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="parents_mobile" class="form-control" value="<?php echo $parents_mobile; ?>">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
                            <a  href="manage_students.php" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Back</a>
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