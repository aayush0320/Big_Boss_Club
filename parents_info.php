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
                <h3>Parents Information</h3>
              </div>
            </div>
              
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Parents Details</h2>
                   <div class="clearfix"></div>
                  </div>
                    <div id="delete_div"> </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      You can view parents information and also detail of student which relate to this parents. 
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Parents ID</th>
                          <th>Email</th>
                          <th>Contact</th>
                         
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="select * from parents order by parents_id";
                            $c->getdata($c->sql);

                             echo  "<tbody>";
                             while($row = mysql_fetch_array($c->res))
                             {
                               if($row['parents_status']=='active')
                               {
                                   $img="<span class=\"badge bg-green\">Active</span>";
                               }
                               else
                               {
                                   $img="<span class=\"badge bg-red\">Disable</span>";
                               }
						if($row['parents_mobile']!=NULL){
                             echo "<tr>";
                             echo "<td>". $row['parents_id'] ."</td>";
                             echo "<td><b>" .$row['parents_email'] . "</b></td>";
                             echo "<td>". $row['parents_mobile'] ."</td>";
                            
                             echo "<td>"."<a class=\"btn btn-info\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"View\" href=\"view_parents.php?page=view_parents&pid=".$row['parents_id']." \"><i class=\"fa fa-search-plus\"></i> View Children </a>"."</td>";
                             echo "</tr>";
						}
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