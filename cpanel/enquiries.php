<?php
    session_start();
    if(!isset($_SESSION['admin']))
        header("location:index.php");
?>
<!DOCTYPE html>
<html>
<style>
        .actions{
            width:40px;height:40px;padding-top:10px;
        }
    </style>
<?php
    include "header.php";
?>

<div class="container-fluid">
    <div class="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg shadow" style="max-width:90%">
          <div class="modal-content border-0">
            <div class="modal-header text-info">
                <h4 class="modal-title" id="myModalLabel">Enquiries</h4>
            </div>
            <div class="container-fluid">
            <?php
            if(isset($_GET['status']))
                if($_GET['status']!=1)
                    echo'
                    <div id="alertdiv" class="alert alert-danger alert-dismissible fade show"><a class="close" data-dismiss="alert">×</a><strong>Error!</strong> Error in the action..!</div>'; 
                        
                else
                    echo'
                    <div id="alertdiv" class="alert alert-success alert-dismissible fade show"><a class="close" data-dismiss="alert">×</a><strong>Success!</strong> Action is completed..!</div>'; 
                ?>
                <div class="table-responsive">
                    <table class="table">
                            <tbody>
                            <tr class="text-dark">
                                <th scope="row" style="font-weight: 600">SL No.</th>
                                <th scope="row" style="font-weight: 600">Name</th>
                                <th scope="row" style="font-weight: 600">Email ID</th>
                                <th scope="row" style="font-weight: 600">Phone</th>
                                <th scope="row" style="font-weight: 600">Query</th>
                                <th scope="row" style="font-weight: 600">Action</th>
                            </tr>

                                <?php
                                    include "../connect.php";
                                    $query = "select * from enquiries order by query_id desc";
                                    $result1=$mysqli->query($query);
                                    $sl_no=0;
                                    if($result1->num_rows>0)
                                    {
                                        while($row=$result1->fetch_assoc())
                                        {
                                            $sl_no+=1;
                                            $query_id=$row['query_id'];
                                            $name=$row['fname']." ".$row['lname'];
                                            $email=$row['email'];
                                            $phone=$row['phone'];
                                            $query=$row['query'];
                                            echo '
                                            <tr class="text-secondary">
                                            <td class="align-middle">'.$sl_no.'</td>
                                            <td class="align-middle">'.$name.'</td>
                                            <td class="align-middle">'.$email.'</td>
                                            <td class="align-middle">'.$phone.'</td>
                                            <td class="align-middle">'.$query.'</td>
                                            <td class="align-middle">
                                            <a href="_verify.php?enquiry=0&query_id='.$query_id.'"><b><i class="fa fa-ban rounded-circle shadow border bg-danger text-white text-center actions act" data-toggle="tooltip" data-placement="right" title="Delete"></i></b></a>
                                            </td>';
                                        }
                                        echo'</tr>';
                                    }
                                ?>
                        </tbody>
                    </table>
                  </div>
            </div>
          </div>
        </div>
      </div>
</div>

<?php
    include "footer.php";
?>
</html>