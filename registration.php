<?php
    session_start();
    if(isset($_SESSION['userid']))
        header("location:user_panel.php");
?>
<!DOCTYPE html>
<html>

<?php
    include("header.php");
?>

    <div class="modal-content content-model my-3">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Create Your Account</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                
                    <div class="col-lg-6 col-sm-12 px-5 border-right border-sm text-center">
                        <p class="lead text-hedding">Brief  <span class="text-success"><b>History</span> About Us</b></p>
                        <p class=" text-hedding" style="font-weight: 500; font-size: 20px;">Pet Insurance</p>
                        <p class="text-content">Suspendisse leo lacus, hendrerit consectetur scelerisque in, tempor sit amet tortor. Pellentesque rhoncus</p>
                        
                        <p class=" text-hedding" style="font-weight: 500; font-size: 20px;">Sign Up with</p>
                        <div class="container-fluid text-center social-reg">
                                <i class="fa fa-facebook"></i>
                                <i class="fa fa-twitter"></i>
                                <i class="fa fa-dribbble"></i>
                                <i class="fa fa-vk"></i>
                                <i class="fa fa-linkedin"></i>
                            </div>
                            <p class="text-content mt-3 text-dark" >Already have account? <a href="">Login</a></p>
                    
                        </div>
                <div class="col-lg-6 col-sm-12 px-5 ">
                    <div class="messages" style="font-size: .85rem" id="alert_placeholder"></div>
                    <div id="alertdiv" <?php if(!isset($_GET['status'])) echo'hidden'; ?>  style="font-size: .85rem" class="alert alert-danger alert-dismissible fade show"><a class="close" data-dismiss="alert">×</a><strong>Error!</strong> Email is already used!!</div>
                    <form method="post" action="_registration.php">
                        <div class="form-group">
                            <input type="text" name="fname" class="form-control custom-input" aria-describedby="emailHelp" placeholder="Enter first name" required="required" data-error="first name is required." oninvalid="this.setCustomValidity('Enter your first name')"
                            oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lname" class="form-control custom-input" aria-describedby="emailHelp" placeholder="Enter last name" required="required" data-error="last name is required." oninvalid="this.setCustomValidity('Enter your last name')"
                            oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control custom-input" aria-describedby="emailHelp" placeholder="Enter email" required="required" data-error="email is required." oninvalid="this.setCustomValidity('Enter valid email')"
                            oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control custom-input" aria-describedby="emailHelp" placeholder="Enter password" required="required" data-error="password is required." oninvalid="this.setCustomValidity('Enter your password')"
                            oninput="this.setCustomValidity('')">
                        </div>
                        <div class=" input-group form-group mb-4">
                            
                            <input type="password" name="cpassword" id="cpassword" class="form-control  custom-input" placeholder="Confirm your Password" required="required" data-error="Confirm password is required." oninvalid="this.setCustomValidity('Passwords Don't Match')"
                            oninput="this.setCustomValidity('')"><div class="input-group-append" hidden>
                                    <span class="input-group-text bg-white border-left-0" id="basic-addon2" for="cpassword">X</span>
                                  </div>
                            <div id="message"></div>
                        </div>
                        <button type="submit" id="btn" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
?>
    <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("cpassword");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                cpassword.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</html>