<?php
    session_start();
    if(!isset($_SESSION['userid']))
        header("location:login.php");
?>
<!DOCTYPE html>
<html>
<?php
    include "header.php";
?>

<div class="container">
    <div class="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg shadow">
          <div class="modal-content">
            <div class="modal-header text-info">
                <h4 class="modal-title" id="myModalLabel">My Policies</h4>
            </div>
            <div class="container-fluid">
            <div id="alertdiv" <?php if(!isset($_GET['status'])&&!isset($_GET['action'])) echo'hidden'; ?> class="alert <?php if(isset($_GET['status'])) if($_GET['status']==0) echo 'alert-danger'; else echo 'alert-success'; ?> alert-dismissible fade show mt-3"><a class="close" data-dismiss="alert">×</a>
            <?php 
                if(isset($_GET['status'])&&isset($_GET['action']))
                    if($_GET['status']==0)
                    {
                        if($_GET['action']=="activate")
                            echo "<strong>Error!</strong> Error in activating policy!! Try again..";
                        else
                            echo "<strong>Error!</strong> Error in claiming policy!! Try again..";
                    }
                    else
                    {
                        if($_GET['action']=="activate")
                            echo "<strong>Success!</strong> Thank you!! Your policy will be activated soon..";
                        else
                            echo "<strong>Success!</strong> Thank you!! Your policy will be claimed soon..";
                    }
            ?>   </div>
                <div class="table-responsive-lg">
                    <table class="table">
                            <tbody>
                            <tr class="text-dark">
                                <th scope="row" style="font-weight: 600">SL No.</th>
                                <th scope="row" style="font-weight: 600">Insurance ID</th>
                                <th scope="row" style="font-weight: 600">Pet Type</th>
                                <th scope="row" style="font-weight: 600">Pet Name</th>
                                <th scope="row" style="font-weight: 600">Investment</th>
                                <th scope="row" style="font-weight: 600">Term</th>
                                <th scope="row" style="font-weight: 600">Status</th>
                                <th scope="row" style="font-weight: 600">Actions</th>
                            </tr>

                                <?php
                                    include "connect.php";
                                    $userid=$_SESSION['userid'];
                                    $query = "select * from insured_pet where userid=$userid and insurance_id not in(select insurance_id from claim_policy where claim_status=1)";
                                    $result1=$mysqli->query($query);
                                    $sl_no=0;
                                    if($result1->num_rows>0)
                                    {
                                        while($row=$result1->fetch_assoc())
                                        {
                                            $sl_no+=1;
                                            $status=$row['insured_status'];
                                            $pet_name=$row['pet_name'];
                                            $insurance_id=$row['insurance_id'];
                                            $pet_type=$row['pet_type'];
                                            $pet_name=$row['pet_name'];
                                            $invest=$row['invest'];
                                            $term=$row['term'];
                                            echo '
                                            <tr class="text-secondary">
                                            <td class="align-middle">'.$sl_no.'</td>
                                            <td class="align-middle">'.$insurance_id.'</td>
                                            <td class="align-middle">'.$pet_type.'</td>
                                            <td class="align-middle">'.$pet_name.'</td>
                                            <td class="align-middle">'.$invest.'</td>
                                            <td class="align-middle">'.$term.'year(s)</td>';
                                            if($status!=1) 
                                            {
                                                echo'
                                                <td class="align-middle"><span class="text-danger"><i class="fa fa-toggle-off text-danger" style="font-size: 17px"></i> Inactive</span></td>
                                                <td class="align-middle"><a href="action.php?insurance_id='.$insurance_id.'&action=activate"><button';
                                                if($status==2) echo' disabled data-toggle="tooltip" data-placement="right" title="Activating" ';
                                                echo'
                                                type="button" class="btn btn-success btn-sm " style="width:70px">Activate</button></a></td>';
                                            }
                                            elseif($status==1) 
                                            {
                                                $query = "select * from claim_policy where insurance_id=$insurance_id";
                                                $result=$mysqli->query($query);
                                                $is_claimed=false;
                                                if($result->num_rows>0)
                                                {
                                                    while($row1=$result->fetch_assoc())
                                                    {
                                                        if($row1['claim_status']==0)
                                                        {
                                                            $is_claimed=true;
                                                            break;
                                                        }
                                                    }
                                                }
                                                echo'<td><span class="text-success"><i class="fa fa-toggle-on text-success" style="font-size: 17px"></i>Active</span></td>
                                                <td class="align-middle"><a href="action.php?insurance_id='.$insurance_id.'&action=claim"><button';
                                                if($is_claimed) echo' disabled data-toggle="tooltip" data-placement="right" title="Processing" ';
                                                echo'
                                                type="button" class="btn btn-warning btn-sm text-white" style="width:70px">Claim</button></a></td>';
                                            }
                                            echo'</tr>';
                                        }

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