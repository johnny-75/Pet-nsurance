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
<div class="container bg">
    <div class="container-fluid panel mt-0">
        <div class="container-fluid p-title">Welcome 
            <?php
                include "connect.php";
                $query = "select * from user where userid='$_SESSION[userid]'";
                $result1=$mysqli->query($query);
                if($result1->num_rows>0)
                {
                    $row=$result1->fetch_assoc();
                        echo "$row[fname]"." "."$row[lname]";
                }
            ?>
             
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 animate">
                    <a href="profile.php" style="text-decoration: none">
                <div class="jumbotron text-center bg-white rounded py-4 panel-fo">
                    <div class="icon-circle my-2">
                        <i class="fa fa-user-circle-o"></i>
                    </div>
                    <h4 class="panel-text panel-texthead">User Profile</h4>
                    <p class="panel-text">Start editing profile to keep it up to date</p>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 animate">
                    <a href="my_policies.php" style="text-decoration: none">
                <div class="jumbotron text-center bg-white rounded py-4 panel-fo">
                    <div class="icon-circle my-2">
                        <i class="fa fa-heartbeat"></i>
                    </div>
                    <h4 class="panel-text panel-texthead">My Policies</h4>
                    <p class="panel-text">Start editing profile to keep it up to date</p>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 animate">
                    <a href="track_claim.php" style="text-decoration: none">
                <div class="jumbotron text-center bg-white rounded py-4 panel-fo">
                    <div class="icon-circle my-2">
                        <i class="fa fa-medkit"></i>
                    </div>
                    <h4 class="panel-text panel-texthead">Track Claim</h4>
                    <p class="panel-text">Start editing profile to keep it up to date</p>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 animate">
                    <a href="payment.php" style="text-decoration: none">
                <div class="jumbotron text-center bg-white rounded py-4 panel-fo">
                    <div class="icon-circle my-2">
                        <i class="fa fa-paypal"></i>
                    </div>
                    <h4 class="panel-text panel-texthead">Payment</h4>
                    <p class="panel-text">Start editing profile to keep it up to date</p>
                </div></a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 animate">
                <a href="contact_us.php" style="text-decoration: none">
                <div class="jumbotron text-center bg-white rounded py-4 panel-fo">
                    <div class="icon-circle my-2">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <h4 class="panel-text panel-texthead">Queries</h4>
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

<?php
include "footer.php";
?>
</html>