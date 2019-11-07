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
                <h4 class="modal-title" id="myModalLabel">Verify Claim</h4>
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
                                <th scope="row" style="font-weight: 600">Insurance ID</th>
                                <th scope="row" style="font-weight: 600">Proposer ID</th>
                                <th scope="row" style="font-weight: 600">Pet Name</th>
                                <th scope="row" style="font-weight: 600">Pet Type</th>
                                <th scope="row" style="font-weight: 600">Invest (Rs.)</th>
                                <th scope="row" style="font-weight: 600">Term</th>
                                <th scope="row" style="font-weight: 600">Reason</th>
                                <th scope="row" style="font-weight: 600">Description</th>
                                <th scope="row" style="font-weight: 600">Action</th>
                            </tr>

                                <?php
                                    include "../connect.php";
                                    $query = "select * from insured_pet i, claim_policy c where c.claim_status=0 and c.insurance_id=i.insurance_id";
                                    $result1=$mysqli->query($query);
                                    $sl_no=0;
                                    if($result1->num_rows>0)
                                    {
                                        while($row=$result1->fetch_assoc())
                                        {
                                            $sl_no+=1;
                                            $claim_id=$row['claim_id'];
                                            $insurance_id=$row['insurance_id'];
                                            $userid=$row['userid'];
                                            $pet_name=$row['pet_name'];
                                            $pet_type=$row['pet_type'];
                                            $invest=$row['invest'];
                                            $term=$row['term'];
                                            $reason=$row['reason'];
                                            $description=$row['description'];
                                            echo '
                                            <tr class="text-secondary">
                                            <td class="align-middle">'.$sl_no.'</td>
                                            <td class="align-middle">'.$insurance_id.'</td>
                                            <td class="align-middle">'.$userid.'</td>
                                            <td class="align-middle">'.$pet_name.'</td>
                                            <td class="align-middle">'.$pet_type.'</td>
                                            <td class="align-middle">'.$invest.'</td>
                                            <td class="align-middle">'.$term.' year(s)</td>
                                            <td class="align-middle">'.$reason.'</td>
                                            <td class="align-middle">'.$description.'</td>
                                            <td class="align-middle">
                                            <a href="_verify.php?verify_claim=2&claim_id='.$claim_id.'"><b><i class="fa fa-ban rounded-circle shadow border bg-danger text-white text-center actions act" data-toggle="tooltip" data-placement="right" title="Reject"></i></b></a>
                                            <a href="_verify.php?verify_claim=1&claim_id='.$claim_id.'"><b><i class="fa fa-check shadow border rounded-circle bg-success text-white text-center actions" data-toggle="tooltip" data-placement="right" title="Accept"></i></b></a>
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