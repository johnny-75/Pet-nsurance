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
                <div class="table-responsive">
                    <table class="table">
                            <tbody>
                            <tr class="text-dark">
                                <th scope="row" style="font-weight: 600">SL No.</th>
                                <th scope="row" style="font-weight: 600">Insurance ID</th>
                                <th scope="row" style="font-weight: 600">Pet Type</th>
                                <th scope="row" style="font-weight: 600">Pet Name</th>
                                <th scope="row" style="font-weight: 600">Investment</th>
                                <th scope="row" style="font-weight: 600">Term</th>
                                <th scope="row" style="font-weight: 600">Reson</th>
                                <th scope="row" style="font-weight: 600">Description</th>
                                <th scope="row" style="font-weight: 600">Status</th>
                            </tr>

                                <?php
                                    include "connect.php";
                                    $userid=$_SESSION['userid'];
                                    $query = "select i.*,c.claim_status,c.insurance_id as claim_insurance_id,c.reason as claim_reason,c.description as claim_descriptoin from insured_pet i,claim_policy c where i.userid=$userid and i.insurance_id=c.insurance_id";
                                    $result1=$mysqli->query($query);
                                    $sl_no=0;
                                    if($result1->num_rows>0)
                                    {
                                        while($row=$result1->fetch_assoc())
                                        {
                                            $sl_no+=1;
                                            $insured_status=$row['insured_status'];
                                            $claim_status=$row['claim_status'];
                                            $claim_reason=$row['claim_reason'];
                                            $claim_descriptoin=$row['claim_descriptoin'];
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
                                            <td class="align-middle">'.$term.'year(s)</td>
                                            <td class="align-middle">'.$claim_reason.'</td>
                                            <td class="align-middle">'.$claim_descriptoin.'</td>';
                                            if($claim_status==0)
                                                echo'<td><span class="text-warning"><i class="fa fa-toggle-off text-warning" style="font-size: 17px"></i>Applied</span></td>';
                                            elseif($claim_status==1)
                                                echo'<td><span class="text-success"><i class="fa fa-toggle-on text-success" style="font-size: 17px"></i>Claimed</span></td>';
                                            else
                                                echo'<td><span class="text-danger"><i class="fa fa-ban text-danger" style="font-size: 17px"></i>Rejected</span></td>';
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