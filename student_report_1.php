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
                <h3>Student Reports</h3>
              </div>
            </div>
              
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Students By Join Date: <?php echo $_POST['join_date']; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link" href="student_report.php"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    <div id="delete_div"> </div>
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Enroll No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact</th>
                          <th>Rank</th>
                          <th>Join Date</th>
                          <th>Register By</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                        <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="select student.*,rank.rank_belt_color,user.user_type from student inner join rank on student.stud_rank_id=rank.rank_id inner join user on student.stud_user_id=user.user_id where stud_join_date between ('".$_POST['join_date']." 00:00:00') and ('".$_POST['join_date']." 23:59:59') order by stud_id";
                            $c->getdata($c->sql);

                             echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                               if($row['stud_status']=='active')
                               {
                                   $img="<span class=\"badge bg-green\">Active</span>";
                               }
                               else
                               {
                                   $img="<span class=\"badge bg-red\">Disable</span>";
                               }

                             echo "<tr>";
                             echo "<td>". $row['stud_enroll_num'] ."</td>";
                             echo "<td><b>" .$row['stud_name'] . "</b></td>";
                             echo "<td>". $row['stud_email'] ."</td>";
                             echo "<td>". $row['stud_mobile']."</td>";
                             echo "<td><b>". $row['rank_belt_color'] ."</b></td>";
                             echo "<td>". $row['stud_join_date']."</td>";
                             echo "<td>". $row['user_type']."</td>";
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