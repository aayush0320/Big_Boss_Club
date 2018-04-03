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
                <h3>Payment from <?php echo $_POST['from_date']; ?> to <?php echo $_POST['to_date']; ?></h3>
              </div>
            </div>
              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Payment from <small><?php echo $_POST['from_date']; ?> to <?php echo $_POST['to_date']; ?> </small></h2>
					
								
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
                          <th>Amount</th>
                          <th>Payment type</th>
                          <th>Status</th>
                          <th>Payment date</th>
                          
                        </tr>
                      </thead>
					  
					  
					 <?php
					  $f_date = $_POST['from_date'];
					  $t_date = $_POST['to_date'];
					  $c=new connection1();
                                $c->connect();
                                $c->sql="select S.stud_enroll_num,S.stud_name,PT.payment_type_name,P.payment_amount,P.payment_status,P.payment_date 
								from payment as P, student as S, payment_type as PT 
								where P.payment_date between'".$_POST['from_date']."' and '".$_POST['to_date']."'
								and P.payment_stud_id = S.stud_id 
								and P.payment_type = PT.payment_type_id";
								
								
                                $c->getdata($c->sql);
					  
					  
					  echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                               

                             echo "<tr>";
                             echo "<td>". $row['stud_enroll_num'] ."</td>";
                             echo "<td><b>" .$row['stud_name'] . "</b></td>";
                             echo "<td>". $row['payment_amount'] ."</td>";
                             echo "<td>". $row['payment_type_name']."</td>";
                             echo "<td>". $row['payment_status']."</td>";
                             echo "<td>". $row['payment_date']."</td>";
                             
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