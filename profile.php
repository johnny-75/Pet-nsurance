<?php
    session_start();
    if(!isset($_SESSION['userid']))
        header("location:login.php");
?>
<!DOCTYPE html>
<html>

<?php
    include "header.php";
    include "connect.php";
    $userid=$_SESSION['userid'];
    $query = "select * from user u,profile p where u.userid=$userid and u.userid=p.userid";
    $result1=$mysqli->query($query);
    if($result1->num_rows>0)
    {
        $row=$result1->fetch_assoc();
        
        $name=$row['name'];
        $age=$row['age'];
        $email=$row['email'];
        $phone=$row['phone'];
        $add1=$row['add1'];
        $city=$row['city'];
        $state=$row['state'];
        $pincode=$row['pincode'];
        $occupation=$row['occupation'];
        $gender=$row['gender'];
        $about=$row['about'];

    }
?>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 border rounded shadow bg-white my-5">
            <div class="row">
            <div class="col-md-4 py-4 text-center">
                <?php
                    if(file_exists("assets/img/profile_pic/$userid.jpg"))
                    echo'<img class="img-fluid rounded-circle" width="90%" src="assets/img/profile_pic/'.$userid.'.jpg">';
                    else
                    echo'<i class="fa fa-user-circle" style="font-size: 200px"></i>';
                ?>
                                        
                
            </div>
            <div class="col-md-8">
                <div class="modal-header mb-3">
                    <h4 class="modal-title text-info" id="myModalLabel">My Profile</h4>
                    <button type="button" class="btn btn-link" aria-label="edit">
          <span aria-hidden="true"><a href="profile_edit.php">edit</a></span>
        </button>
                </div>
                <div class="form-row px-3">
                    <div class="col-md-12">
                        <ul class="fa-ul align-middle">
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-id-card text-info" style="font-size: 20px"></i>
                                        User ID:
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $userid; ?>
                                    </div>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-user-circle text-info" style="font-size: 20px"></i>
                                        Name
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $name; ?>
                                    </div>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-male text-info" style="font-size: 20px"></i>
                                        Gender
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $gender; ?>
                                    </div>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-birthday-cake text-info" style="font-size: 20px"></i>
                                        Age
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $age; ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <hr/>
                        <ul class="fa-ul align-middle">
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-phone text-info" style="font-size: 20px"></i>
                                        Phone
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $phone; ?>
                                    </div>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-envelope text-info" style="font-size: 20px"></i>
                                        Email
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $email; ?>
                                    </div>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-address-card text-info" style="font-size: 20px"></i>
                                        Add1
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $add1; ?>
                                    </div>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-building text-info" style="font-size: 20px"></i>
                                        City
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $city; ?>
                                    </div>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-flag text-info" style="font-size: 20px"></i>
                                        State
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $state; ?>
                                    </div>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-map-pin text-info" style="font-size: 20px"></i>
                                        pincode
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $pincode; ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <hr/>
                        <ul class="fa-ul align-middle">
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-industry text-info" style="font-size: 20px"></i>
                                        Occupation
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $occupation; ?>
                                    </div>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa-li fa fa-info text-info" style="font-size: 20px"></i>
                                        about
                                    </div>
                                    <div class="col-8">
                                        : <?php echo $about; ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<?php
include"footer.php";
?>
</html>