<?php
session_start();
include './connection.php';
include './header.php';
include './sidemenu.php';
include './navbar_top.php';
error_reporting(E_ALL ^ E_DEPRECATED);
$sid=$_REQUEST['stud_id'];
?>
<?php
$c=new connection1();
$c->connect();

$c->sql="select * from student where stud_id='".$sid."'";
$c->getdata($c->sql);
while($row = mysql_fetch_array($c->res))
{
   $stud_name=$row['stud_name'];
   $stud_rec_rank=$row['stud_rank_id'];
}
 ?>
   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Student Progress Report</h3>
              </div>
            </div>
              
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Progress Report Card of <?php echo $stud_name; ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div id="delete_div"> </div>
                  <div class="x_content">
				  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Belt</th>
                          <th>Date Awarded</th>
                          
                          
                        </tr>
                      </thead>
                      <?php
                        $c=new connection1();
                        $c->connect();

                        $c->sql="select student_progress.*,rank.* from student_progress inner join rank on student_progress.stud_prog_rank_id=rank.rank_id where stud_prog_stud_id='".$sid."' order by stud_prog_rank_date desc";
                        $c->getdata($c->sql);
                        while($row = mysql_fetch_array($c->res))
                        {
                      
                    
					echo  "<tbody>";
					echo "<tr>";
                             echo "<td>". $row['rank_belt_color'] ."</td>";
                             echo "<td><b>" .$row['stud_prog_rank_date'] . "</b></td>";
                            
                            
                             echo "</tr>";
                            }
                            echo "</tbody>"; 
                       ?>
                        </div>
                      </div>
                        <?php
						echo  "<tbody>";
						?>
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