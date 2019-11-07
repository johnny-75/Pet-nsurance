<?php
    session_start();
    if(!isset($_SESSION['admin']))
        header("location:index.php");
?>
<!DOCTYPE html>
<html>
<?php
    include "header.php";
?>

<div class="container-fluid">
    <div class="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg shadow" style="max-width:90%">
          <div class="modal-content border-0">
            <div class="modal-header text-info">
                <h4 class="modal-title" id="myModalLabel">All Policies</h4>
            </div>
            <div class="container-fluid">
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
                                <th scope="row" style="font-weight: 600">Status</th>
                            </tr>

                                <?php
                                    include "../connect.php";
                                    $query = "select * from insured_pet";
                                    $result1=$mysqli->query($query);
                                    $sl_no=0;
                                    if($result1->num_rows>0)
                                    {
                                        while($row=$result1->fetch_assoc())
                                        {
                                            $sl_no+=1;
                                            $insured_status=$row['insured_status'];
                                            $insurance_id=$row['insurance_id'];
                                            $userid=$row['userid'];
                                            $pet_name=$row['pet_name'];
                                            $pet_type=$row['pet_type'];
                                            $invest=$row['invest'];
                                            $term=$row['term'];
                                            echo '
                                            <tr class="text-secondary">
                                            <td class="align-middle">'.$sl_no.'</td>
                                            <td class="align-middle">'.$insurance_id.'</td>
                                            <td class="align-middle">'.$userid.'</td>
                                            <td class="align-middle">'.$pet_name.'</td>
                                            <td class="align-middle">'.$pet_type.'</td>
                                            <td class="align-middle">'.$invest.'</td>
                                            <td class="align-middle">'.$term.' year(s)</td>
                                            <td class="align-middle">';
                                            
                                            if($insured_status==1)
                                                echo '<span class="text-success"><b>Active</b></span>';
                                            else
                                                echo '<span class="text-danger"><b>Inactive</b></span>';
                                            
                                            echo'</td>';
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