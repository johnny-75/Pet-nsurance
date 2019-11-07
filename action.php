<?php
    session_start();
    if(!isset($_SESSION['userid']))
        header("location:login.php");

    if(!isset($_GET['insurance_id']))
        header("location:user_panel.php");
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
                    <h4 class="modal-title" id="myModalLabel">Activate Policy</h4>
                </div>
                <div class="table-responsive-lg">
                        <table class="table">
                                <tbody>
                                <tr class="text-dark">
                                    <th scope="row" style="font-weight: 600">Insurance ID</th>
                                    <th scope="row" style="font-weight: 600">Pet Type</th>
                                    <th scope="row" style="font-weight: 600">Pet Name</th>
                                    <th scope="row" style="font-weight: 600">Investment</th>
                                    <th scope="row" style="font-weight: 600">Term</th>
                                </tr>
    
                                    <?php
                                        include "connect.php";
                                        $userid=$_SESSION['userid'];
                                        $insurance_id=$_GET['insurance_id'];
                                        $query = "select * from insured_pet where userid=$userid and insurance_id=$insurance_id";
                                        $result1=$mysqli->query($query);
                                        $sl_no=0;
                                        if($result1->num_rows>0)
                                        {
                                            while($row=$result1->fetch_assoc())
                                            {
                                                $sl_no+=1;
                                                $pet_name=$row['pet_name'];
                                                $pet_type=$row['pet_type'];
                                                $pet_name=$row['pet_name'];
                                                $invest=$row['invest'];
                                                $term=$row['term'];
                                                echo '
                                                <tr class="text-secondary">
                                                <td class="align-middle">'.$insurance_id.'</td>
                                                <td class="align-middle">'.$pet_type.'</td>
                                                <td class="align-middle">'.$pet_name.'</td>
                                                <td class="align-middle">'.$invest.'</td>
                                                <td class="align-middle">'.$term.'year(s)</td>';
                                                echo'</tr>';
                                            }
    
                                        }
                                    ?>
                                    <tr>
                                    </tr>
                            </tbody>
                        </table>
                        
                    </div>
                        <div class="container-fluid">
                            <form id="contact-form needs-validation" method="post" action="_action.php" role="form">
                        <hr/>
                                    <div class="controls">
                                    <div id="alert_placeholder">
                                    </div>
                                    <input type="hidden" name="insurance_id" value="<?php echo $insurance_id; ?>">
                                        <div class="row" <?php if(isset($_GET['action'])) if($_GET['action']=="claim") echo'hidden'; ?>>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="challan_number">Challan Number *</label>
                                                    <input id="challan_number" type="text" name="challan_number" class="form-control" placeholder="Enter challan number *" 
                                                    <?php if(isset($_GET['action'])) if($_GET['action']=="activate") echo'required="required" data-error="Challan number is required." oninvalid="this.setCustomValidity(\'Enter challan number\')" oninput="this.setCustomValidity(\'\')" '; ?>>
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="payment_date">Payment Date *</label>
                                                    <input type="date" class="form-control" id="payment_date" name="payment_date" <?php if(isset($_GET['action'])) if($_GET['action']=="activate") echo' required="required" data-error="Payment date is required" oninvalid="this.setCustomValidity(\'Select payment date\')"
                                                    oninput="this.setCustomValidity(\'\')"'; ?>>
                                                    </div>
                                            </div>
                                            </div>
                                            <div class="row" <?php if(isset($_GET['action'])) if($_GET['action']=="activate") echo'hidden'; ?>>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                        <label for="reason">Reason *</label>
                                                        <select class="custom-select" id="reason" name="reason" <?php if(isset($_GET['action'])) if($_GET['action']=="claim") echo'required="required" data-error="Reason is required" oninvalid="this.setCustomValidity(\'Select Reason\')"
                                                        oninput="this.setCustomValidity(\'\')"'?></select>>
                                                            <option value="" hidden selected disabled>Choose one..</option>
                                                            <option value="illnesses">Illnesses</option>
                                                            <option value="injury">Injury</option>
                                                            <option value="wellness">Wellness care</option>
                                                        </select>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="form_message">Discription *</label>
                                                    <textarea id="form_message" name="description" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message." oninvalid="this.setCustomValidity('Leave us a message')"
                            oninput="this.setCustomValidity('')"></textarea>
                                                    </div>
                                            </div>
                                            <div class="col-md-12">
                                                <?php 
                                                if(isset($_GET['action'])) 
                                                    if($_GET['action']=="activate") 
                                                        echo'<input type="submit" class="btn btn-dark btn-send" id="btn" value="Activate Policy" name="activate_policy">';
                                                    else
                                                        echo'<input type="submit" class="btn btn-dark btn-send" id="btn" value="Claim Policy" name="claim_policy">';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-muted"><strong>*</strong> These fields are required.</p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                      </div>
            </div>
        </div>
    </div>
</div>
<?php
    include "footer.php";
?>
</html>