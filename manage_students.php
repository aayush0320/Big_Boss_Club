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
                <h3>Manage Student</h3>
              </div>
            </div>
              
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Details</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                    <div id="delete_div"> </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      You can view the student details here. You can also edit and delete the information of student. 
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Enroll No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact</th>
                          <th>Rank</th>
                          <th>Join Date</th>
                         
                          <th>Action</th>
                        </tr>
                      </thead>
                        <?php
                            $c=new connection1();
                            $c->connect();

                            $c->sql="select student.*,rank.*,user.user_type from student inner join rank on student.stud_rank_id=rank.rank_id inner join user on student.stud_user_id=user.user_id order by student.stud_id";
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
                            
                             echo "<td>"."<a class=\"btn btn-info\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"View\" href=\"view_student.php?page=view_student&sid=".$row['stud_id']." \"><i class=\"fa fa-search-plus\"></i></a>"
                                     ."<a class=\"btn btn-dark \" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"Edit\" href=\"edit_student.php?page=edit_student&sid=".$row['stud_id']." \"><i class=\"fa fa-edit\"></i></a>";
                                     #."<a class=\"btn btn-danger\" href=\"#\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"Delete\" onclick=\"deleteMe('".$row['stud_id']."');\"><i class=\"fa fa-trash-o\"></i> </a>"."</td>";
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
<script>
function deleteMe(str){
    var c=confirm("Are you Sure want to Delete this item?");
    if(c==true)
    {
        var xmlhttp;
                if(window.XMLHttpRequest)
                {//code for IE7+,Firefox,Chrome,Opera,Safari 
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {//code for IE5,IE6
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function()
                {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            document.getElementById("delete_div").innerHTML=xmlhttp.responseText;
                        }
                }
                xmlhttp.open("GET","delete_student.php?sid="+str,true);
                xmlhttp.send();
    }
    else{
            
    }
}
</script>