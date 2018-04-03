<?php
session_start();
include './connection.php';
include './header.php';
include './sidemenu.php';
include './navbar_top.php';
error_reporting(E_ALL ^ E_DEPRECATED);
?>
<?php	
                                
$c=new connection1();
$c->connect();
$c->sql="select * from attendance";
$c->getdata($c->sql);
while($row=mysql_fetch_array($c->res))
{
    $timestamp = $row['attendance_date'];
    $splitTimeStamp = explode(" ",$timestamp);
    $date = $splitTimeStamp[0];
    $time = $splitTimeStamp[1];
    
    $c2=new connection1();
    $c2->connect();
    $c2->sql="update attendance set
    attendance_date='".$date."'
    where attendance_id='".$row['attendance_id']."'";
   
   $c2->savedata($c2->sql);
   
   //query
   
   
    
} 
?>
   <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View Attendance by Date</h3>
              </div>
            </div>
              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Attendance on <small><?php echo $_POST['attendance_date']; ?></small></h2>
					
								
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
                    
						
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
                        <tr>
                          <th>Enrollment No.</th>
                          <th>Name</th>
                          <th>Time</th>
                          <th>Class Level</th>
                          <th>Day</th>
                          
                        </tr>
                      </thead>
					  
					 <?php
					  $c=new connection1();
                                $c->connect();
                                $c->sql="SELECT stud_enroll_num,stud_name,class_time,class_level,class_day FROM attendance AS A, student AS S, class AS C where A.attendance_date = '".$_POST['attendance_date']." 00:00:00' and A.attendance_stud_id = S.stud_id and A.attendance_class_id = C.class_id";
								
								
                                $c->getdata($c->sql);
					  
					  
					  echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                               

                             echo "<tr>";
                             echo "<td>". $row['stud_enroll_num'] ."</td>";
                             echo "<td><b>" .$row['stud_name'] . "</b></td>";
                             echo "<td>". $row['class_time'] ."</td>";
                             echo "<td>". $row['class_level']."</td>";
                            
                             echo "<td>". $row['class_day']."</td>";
                             
                             echo "</tr>";
                            }
                            echo "</tbody>"; 
                        ?>
                        <!--<script type="text/javascript">
                          // Get the context of the canvas element we want to select
                          var ctx = document.getElementById("piechart").getContext("2d");
                          var data = [{
                              value: ,
                              color:"#F7464A",
                              highlight: "#FF5A5E",
                              label: "Red"
                          },
                          {
                              value: 50,
                              color: "#46BFBD",
                              highlight: "#5AD3D1",
                              label: "Green"
                          },
                          {
                              value: 100,
                              color: "#FDB45C",
                              highlight: "#FFC870",
                              label: "Yellow"
                          }];

                          var options = {
                            animateScale: true
                          };

                          var myNewChart = new Chart(ctx).Pie(data,options);

                        </script> -->
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