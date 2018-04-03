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
                <h3>Class Schedule</h3>
              </div>
            </div>
              
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> Weekly Schedule</h2>
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">Monday</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
                            <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="SELECT * FROM `class` WHERE class_day='Monday'";
                            $c->getdata($c->sql);

                             echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                                 echo "<p>Level : ".$row[3]."</p><p>Timings : ".$row[2]." </p>";
                                 echo "<a class=\"btn btn-success\" href=\"fill_attendance.php?page:fill_attendance&class_day=".$row[1]."&class_id=".$row[0]."&class_time=".$row[2]."\"><i class=\"fa fa-check-square-o\"></i> Attendance</a>";
                             } 
                             ?>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">Tuesday</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
                            <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="SELECT * FROM `class` WHERE class_day='Tuesday'";
                            $c->getdata($c->sql);

                             echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                                 echo "<p>Level : ".$row[3]."</p><p>Timings : ".$row[2]." </p>";
                                 echo "<a class=\"btn btn-success\" href=\"fill_attendance.php?page:fill_attendance&class_day=".$row[1]."&class_id=".$row[0]."&class_time=".$row[2]."\"><i class=\"fa fa-check-square-o\"></i> Attendance</a>";
                             } 
                             ?>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          <h4 class="panel-title">Wednesday</h4>
                        </a>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
                            <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="SELECT * FROM `class` WHERE class_day='Wednesday'";
                            $c->getdata($c->sql);

                             echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                                 echo "<p>Level : ".$row[3]."</p><p>Timings : ".$row[2]." </p>";
                                 echo "<a class=\"btn btn-success\" href=\"fill_attendance.php?page:fill_attendance&class_day=".$row[1]."&class_id=".$row[0]."&class_time=".$row[2]."\"><i class=\"fa fa-check-square-o\"></i> Attendance</a>";
                             } 
                             ?>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          <h4 class="panel-title">Thursday</h4>
                        </a>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
                            <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="SELECT * FROM `class` WHERE class_day='Thursday'";
                            $c->getdata($c->sql);

                             echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                                 echo "<p>Level : ".$row[3]."</p><p>Timings : ".$row[2]." </p>";
                                 echo "<a class=\"btn btn-success\" href=\"fill_attendance.php?page:fill_attendance&class_day=".$row[1]."&class_id=".$row[0]."&class_time=".$row[2]."\"><i class=\"fa fa-check-square-o\"></i> Attendance</a>";
                             } 
                             ?>
                          </div>
                        </div>
                      </div>  
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                          <h4 class="panel-title">Friday</h4>
                        </a>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
                            <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="SELECT * FROM `class` WHERE class_day='Friday'";
                            $c->getdata($c->sql);

                             echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                                 echo "<p>Level : ".$row[3]."</p><p>Timings : ".$row[2]." </p>";
                                 echo "<a class=\"btn btn-success\" href=\"fill_attendance.php?page:fill_attendance&class_day=".$row[1]."&class_id=".$row[0]."&class_time=".$row[2]."\"><i class=\"fa fa-check-square-o\"></i> Attendance</a>";
                             } 
                             ?>
                          </div>
                        </div>
                      </div>  
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                          <h4 class="panel-title">Saturday</h4>
                        </a>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
                            <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="SELECT * FROM `class` WHERE class_day='Saturday'";
                            $c->getdata($c->sql);
                            
                             echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                                 echo "<p>Level : ".$row[3]."</p><p>Timings : ".$row[2]." </p>";
                                 echo "<a class=\"btn btn-success\" href=\"fill_attendance.php?page:fill_attendance&class_day=".$row[1]."&class_id=".$row[0]."&class_time=".$row[2]."\"><i class=\"fa fa-check-square-o\"></i> Attendance</a>";
                             } 
                             ?>
                          </div>
                        </div>
                      </div>    
                        
                    </div>
                    <!-- end of accordion -->

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