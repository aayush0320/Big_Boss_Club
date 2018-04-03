<?php
session_start();
include './connection.php';
include './header.php';
include './sidemenu.php';
include './navbar_top.php';
error_reporting(E_ALL ^ E_DEPRECATED);
?>
<?php
//$c=new connection1();
//$c->connect();
//
//$c->sql="select * from class";
//$c->getdata($c->sql);
//
// echo  "<tbody>";
// while($row = mysql_fetch_array($c->res))
// {
// }
 ?>
   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Fill Attendance</h3>
              </div>
            </div>
              
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Attendance of <?php echo $_GET['class_day']; ?>  ( <?php echo $_GET['class_time']; ?> )</h2>
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
                    <p class="text-muted font-13 m-b-30">
                      You can view the student details here. You can also edit and delete the information of student. 
                    </p>
                    <form method="POST" action="conn_fill_attendance.php">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Enroll No</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="select student.* from student order by stud_enroll_num";
                            $c->getdata($c->sql);

                             echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                             echo "<tr>";
                             echo "<td>". $row['stud_enroll_num'] ."</td>";
                             echo "<td><b>" .$row['stud_name'] . "</b></td>";
                             echo "<td>"."<input type=\"checkbox\" name=\"stud_id[]\" value=\"".$row[0]."\" />"."</td>";
                             echo "</tr>";
                            }
                            echo "</tbody>"; 
                        ?>
                    </table>
                        <input type="hidden" name="class_id" value="<?php echo $_GET['class_id']; ?>"/>
                        <center><button class="btn btn-success"><i class="fa fa-check-square-o"></i> Record Attendance</button></center>
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