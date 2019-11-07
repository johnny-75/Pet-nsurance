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
<div class="login-img">
      <div class="modal-content content-model my-3">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Login to PetInsurance</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  
                    <div class="col-lg-6 col-sm-12 px-5 border-right border-sm">
                    <div class="messages" style="font-size: .85rem" id="alert_placeholder">
                    <div id="alertdiv" <?php if(!isset($_GET['status'])) echo'hidden'; ?> class="alert alert-danger alert-dismissible fade show"><a class="close" data-dismiss="alert">×</a><strong>Error!</strong> <?php if(isset($_GET['status'])) if($_GET['status']==1) echo'incorrect password'; else echo 'incorrect email'; ?></div>
                    </div>
                    <form method="post" action="_login.php">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" class="form-control custom-input" id="exampleInputEmail1" name="email" aria-describedby="email" placeholder="Enter email" required="required" data-error="Enter valid email" oninvalid="this.setCustomValidity('Enter valid email')"
                            oninput="this.setCustomValidity('')" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } else if(isset($_GET['email'])) echo $_GET['email']; ?>">
                              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group mb-0">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control  custom-input" id="exampleInputPassword1" name="password" placeholder="Password" required="required" data-error="password is required." oninvalid="this.setCustomValidity('Enter your password')"
                            oninput="this.setCustomValidity('')" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>">
                            </div>
                            <div class="form-check mb-4">
                              <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck2" <?php if(isset($_COOKIE["member_login"])) echo 'checked'; ?>>
                              <label class="form-check-label" for="exampleCheck2">Remember me</label>
                            </div>
                            <button type="submit" id="btn" class="btn btn-primary btn-block">Login</button>
            <label class="form-check-label float-right">Forgot<a href=""> Password?</a></label>
                          </form>
                          </div>
                  <div class="col-lg-6 col-sm-12 px-5 ">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Protect your pet with Insurance</li>
                          <li><span class="fa fa-check text-success"></span> Claim your Insurance</li>
                          <li><span class="fa fa-check text-success"></span> Save your Pets</li>
                          <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                          <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                      </ul>
                      <p><a href="registration.php" class="btn btn-info btn-block mt-4">Yes please, register now!</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>

<?php
    include("footer.php");
?>
</html>