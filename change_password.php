<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<?php
    include "header.php";
?>
<div class="login-img">
        <div class="modal-dialog modal-content  my-3" >
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><?php if(isset($_SESSION['userid'])) echo'Change'; else echo 'Forgot'; ?> Password</h4>
            </div>
            <div class="modal-body">
            <!-- <div class="messages" id="alert_placeholder"></div> -->
                    <div id="alertdiv" <?php if(!isset($_GET['mail_status'])&&!isset($_GET['cpass_status'])) echo'hidden'; ?> class="alert alert-danger alert-dismissible fade show"><a class="close" data-dismiss="alert">×</a><strong>Error!</strong> <?php if(isset($_GET['cpass_status'])) echo'incorrect current password!'; else echo 'email not found!'; ?></div>
                <div class="row"> 
                    
                      <div class="col col-sm-12 px-5">
                      <form class="text-md-right" action="_change_password.php" id="myform" method="post">
                         <?php if(isset($_GET['request_mail']))
                            echo"<input type='hidden' name='request_mail' value='$_GET[request_mail]'>"; ?>
                            <div class="form-group" <?php if(isset($_SESSION['userid'])||isset($_GET['request_mail'])) echo 'hidden'; ?>>
                                    <div class="row">
                                        <div class="col-md-4 col-dm-12 my-auto">
                                        <label for="email" class="control-label">Email:</label></div>
                                        <div class="col-md-8 col-sm-12 my-auto">
                                        <input type="email" name='email' class="form-control custom-input d-inline-flex"  id="email" aria-describedby="Email id" placeholder="Enter email address" <?php if(!isset($_SESSION['userid']))if(!isset($_GET['request_mail'])) echo  'required="required" data-error="Email id is required." oninvalid="this.setCustomValidity(\'Enter valid email\')"
                                        oninput="this.setCustomValidity(\'\')"'?>>
                                    </div>
                                    </div>
                                </div>
                              <div class="form-group" <?php if(!isset($_SESSION['userid'])||isset($_GET['request_mail'])) echo 'hidden'; ?>>
                                <div class="row">
                                    <div class="col-md-4 col-dm-12">
                                    <label for="c_pass" class="control-label">Current password:</label></div>
                                    <div class="col-md-8 col-sm-12 my-auto">
                                    <input type="password" class="form-control custom-input d-inline-flex" name='current_password'  id="c_pass" aria-describedby="Current password" placeholder="Enter Current password" <?php if(isset($_SESSION['userid'])) echo  'required="required" data-error="Current password is required." oninvalid="this.setCustomValidity(\'Enter current password\')"
                                    oninput="this.setCustomValidity(\'\')"'; ?>>
                                </div>
                                </div>
                            </div>
                              <div class="form-group mb-0" <?php if(!isset($_SESSION['userid'])) if(!isset($_GET['request_mail'])) echo 'hidden'; ?>>
                                  <div class="row">
                                    <div class="col-md-4 col-dm-12 my-auto">
                                    <label for="n_pass" class="control-label">New password:</label></div>
                                    <div class="col-md-8 col-sm-12 my-auto">
                                    <input type="password" class="form-control custom-input d-inline-flex" name='new_password' style="width: inherit !important" id="n_pass" aria-describedby="new password" placeholder="Enter new password" <?php if(isset($_SESSION['userid'])||isset($_GET['request_mail']))echo  'required="required" data-error="New password is required." oninvalid="this.setCustomValidity(\'Enter new password\')"
                                    oninput="this.setCustomValidity(\'\')"'; ?>>
                                    </div>
                                </div>
                                </div>
                              <div class="form-group my-3" <?php if(!isset($_SESSION['userid'])) if(!isset($_GET['request_mail'])) echo 'hidden'; ?>>
                                  <div class="row">
                                    <div class="col-md-4 col-dm-12 my-auto">
                                    <label for="nc_pass" class="control-label">Confirm password:</label></div>
                                    <div class="col-md-8 col-sm-12 my-auto">
                                    <input type="password" class="form-control custom-input d-inline-flex" style="width: inherit !important" name="cpassword" id="nc_pass" aria-describedby="Confirm password" placeholder="Enter conform password" <?php if(isset($_SESSION['userid'])||isset($_GET['request_mail'])) echo  'required="required" data-error="Confirm password is required." oninvalid="this.setCustomValidity(\'Passwords Don\'t match\')"
                                    oninput="this.setCustomValidity(\'\')"'; ?>>
                                    </div>
                                </div>
                                </div>
                              <button type="submit" class="btn btn-primary" id="btn"><?php if(!isset($_SESSION['userid'])) echo'Submit'; else echo'Save Changes'; ?></button>
                            </form>
                            </div>
                    
                </div>
            </div>
        </div>
    </div>

<?php
    include "footer.php";
?>
<script>
        var password = document.getElementById("n_pass")
        , confirm_password = document.getElementById("nc_pass");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</html>