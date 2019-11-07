<?php
    session_start();
?>
<!DOCTYPE html>
<html>
 <?php
    include "header.php";
if(!isset($_SESSION['admin']))
{
    echo'
    <form method="post" action="_login.php">
    <div class="my-auto" style="margin:0 auto">
    <div class="" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog shadow" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Admin Login</h5>
          
        </div>
        <div class="modal-body">';
        if(isset($_GET['status']))
        echo'
        <div id="alertdiv" class="alert alert-danger alert-dismissible fade show"><a class="close" data-dismiss="alert">×</a><strong>Error!</strong> Invalid Username or Password</div>';
        echo'
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control custom-input" id="exampleInputEmail1" name="username" aria-describedby="text" placeholder="Enter username" required="required" data-error="Username is required" oninvalid="this.setCustomValidity(\'Enter Username\')"
        oninput="this.setCustomValidity(\'\')" >
          
        </div>
        <div class="form-group mb-0">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control  custom-input" id="exampleInputPassword1" name="password" placeholder="Password" required="required" data-error="password is required." oninvalid="this.setCustomValidity(\'Enter your password\')"
        oninput="this.setCustomValidity(\'\')" value="">
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </div>
    </div>
  </div>
    </div>
    </form>';
    
include "footer.php";
}
else
{

echo'
<div id="page-content-wrapper" class="container-fluid d-inline-block bg">
    <div class=" ">
            <div class="container ">
                    <div class="container-fluid panel mt-2 ">
                        <div class="container-fluid p-title">Welcome Admin
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12 animate">
                                    <a href="proposers.php" style="text-decoration: none">
                                <div class="jumbotron text-center bg-white rounded py-4 panel-fo">
                                    <div class="icon-circle my-2">
                                        <i class="fa fa-user-circle-o"></i>
                                    </div>
                                    <h4 class="panel-text panel-texthead">Proposers</h4>
                                    <p class="panel-text">Start editing profile to keep it up to date</p>
                                </div></a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 animate">
                                    <a href="policies.php" style="text-decoration: none">
                                <div class="jumbotron text-center bg-white rounded py-4 panel-fo">
                                    <div class="icon-circle my-2">
                                        <i class="fa fa-shield"></i>
                                    </div>
                                    <h4 class="panel-text panel-texthead">Policies</h4>
                                    <p class="panel-text">Start editing profile to keep it up to date</p>
                                </div></a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 animate">
                                    <a href="verify_claim.php" style="text-decoration: none">
                                <div class="jumbotron text-center bg-white rounded py-4 panel-fo">
                                    <div class="icon-circle my-2">
                                        <i class="fa fa-medkit"></i>
                                    </div>
                                    <h4 class="panel-text panel-texthead">Verify Claim</h4>
                                    <p class="panel-text">Start editing profile to keep it up to date</p>
                                </div></a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 animate">
                                    <a href="verify_policy.php" style="text-decoration: none">
                                <div class="jumbotron text-center bg-white rounded py-4 panel-fo">
                                    <div class="icon-circle my-2">
                                        <i class="fa fa-heartbeat"></i>
                                    </div>
                                    <h4 class="panel-text panel-texthead">Verify Policy</h4>
                                    <p class="panel-text">Start editing profile to keep it up to date</p>
                                </div></a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 animate">
                                <a href="enquiries.php" style="text-decoration: none">
                                <div class="jumbotron text-center bg-white rounded py-4 panel-fo">
                                    <div class="icon-circle my-2">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <h4 class="panel-text panel-texthead">Enquiries</h4>
                                    <p class="panel-text">Start editing profile to keep it up to date</p>
                                </div></a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 animate">
                                <a href="change_password.php" style="text-decoration: none">
                                    <div class="jumbotron text-center bg-white rounded py-4 panel-fo">
                                    <div class="icon-circle my-2">
                                        <i class="fa fa-unlock-alt"></i>
                                    </div>
                                    <h4 class="panel-text panel-texthead">Change Password</h4>
                                    <p class="panel-text">Start editing profile to keep it up to date</p>
                                </div></a>
                            </div>
                        </div>
                    </div> 
                </div>
    </div>
</div>';
include "footer.php";
}
?>
</html>