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

$c1->sql="select student.*,rank.rank_belt_color,parents.*,user.user_type,user.user_name from student inner join rank on student.stud_rank_id=rank.rank_id inner JOIN parents on student.stud_parents_id=parents.parents_id inner join user on student.stud_user_id=user.user_id WHERE student.stud_id='".$sid."'";
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
  $stud_rank=$row['rank_belt_color'];
  $parents_email=$row['parents_email'];
  $parents_mobile=$row['parents_mobile'];
  $register_by=$row['user_type'];
} 
?>

   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View Student</h3>
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
                    <form class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Enrollment Number : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label" style="color:black"><?php echo $stud_erno; ?></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Full Name : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:black"><?php echo $stud_name; ?></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Date of Birth : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:black"><?php echo $stud_dob; ?></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Address : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:black"><?php echo $stud_address; ?></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Email Id : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:black"><?php echo $stud_email; ?></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Phone : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:black"><?php echo $stud_mobile; ?></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Rank : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:black"><?php echo $stud_rank; ?></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Join Date : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:black"><?php echo $stud_joindate; ?></label>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Parents Email : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:black"><?php echo $parents_email; ?></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Parents Contact : </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label" style="color:black"><?php echo $parents_mobile; ?></label>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      
                      <div class="ln_solid"></div>
                      
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
                            <a class="btn btn-success" href="manage_students.php"><i class="fa fa-arrow-left"></i>&nbsp; Back</a>
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