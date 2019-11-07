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
<div class="modal-dialog modal-content  my-3" >
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Change Password</h4>
            </div>
            <div class="modal-body">
            <!-- <div class="messages" id="alert_placeholder"></div> -->
                    <div id="alertdiv" <?php if(!isset($_GET['cpass_status'])) echo'hidden'; ?> class="alert alert-danger alert-dismissible fade show"><a class="close" data-dismiss="alert">×</a><strong>Error!</strong> <?php if(isset($_GET['cpass_status'])) echo'incorrect current password!'; ?></div>
                
                    <?php
                        if(isset($_GET['status']))
                            if($_GET['status']==1) 
                            echo '<div id="alertdiv" class="alert alert-success alert-dismissible fade show"><a class="close" data-dismiss="alert">×</a><strong>Success!</strong> Password Changed Successully</div>';
                    ?>
                    <div class="row"> 
                      <div class="col col-sm-12 px-5">
                      <form class="text-md-right" action="_change_password.php" id="myform" method="post">
                         
                              <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-dm-12">
                                    <label for="c_pass" class="control-label">Current password:</label></div>
                                    <div class="col-md-8 col-sm-12 my-auto">
                                    <input type="password" class="form-control custom-input d-inline-flex" name='current_password'  id="c_pass" aria-describedby="Current password" placeholder="Enter Current password" required="required" data-error="Current password is required." oninvalid="this.setCustomValidity('Enter current password')"
                                    oninput="this.setCustomValidity('')">
                                </div>
                                </div>
                            </div>
                              <div class="form-group mb-0" >
                                  <div class="row">
                                    <div class="col-md-4 col-dm-12 my-auto">
                                    <label for="n_pass" class="control-label">New password:</label></div>
                                    <div class="col-md-8 col-sm-12 my-auto">
                                    <input type="password" class="form-control custom-input d-inline-flex" name='new_password' style="width: inherit !important" id="n_pass" aria-describedby="new password" placeholder="Enter new password" required="required" data-error="New password is required." oninvalid="this.setCustomValidity('Enter new password')"
                                    oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                                </div>
                              <div class="form-group my-3">
                                  <div class="row">
                                    <div class="col-md-4 col-dm-12 my-auto">
                                    <label for="nc_pass" class="control-label">Confirm password:</label></div>
                                    <div class="col-md-8 col-sm-12 my-auto">
                                    <input type="password" class="form-control custom-input d-inline-flex" style="width: inherit !important" name="cpassword" id="nc_pass" aria-describedby="Confirm password" placeholder="Enter conform password" required="required" data-error="Confirm password is required." oninvalid="this.setCustomValidity('Passwords Don't match')"
                                    oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                                </div>
                              <button type="submit" class="btn btn-primary" id="btn">Submit</button>
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