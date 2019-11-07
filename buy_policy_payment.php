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
<?php
    include "connect.php";
    $insurance_id=test_input($_GET['insurance_id']);
    $query = "select * from insured_pet i,user u,profile p where i.insurance_id=$insurance_id and u.userid=i.userid and i.userid=p.userid";
    $result1=$mysqli->query($query);
    if($result1->num_rows>0)
    {
        $row=$result1->fetch_assoc();
        $userid=$row['userid'];
        $pet_type=$row['pet_type'];
        $breed=$row['breed'];
        $pet_name=$row['pet_name'];
        $pet_gender=$row['pet_gender'];
        $pet_dob=$row['pet_dob'];
        $pet_age=$row['pet_age'];
        $invest=$row['invest'];
        $term=$row['term'];
        $userid=$row['userid'];
        $name=$row['name'];
        $email=$row['email'];
        $phone=$row['phone'];
        $add=$row['add1'].", ".$row['city'].", ".$row['state'];
    }
?>
<div style="background: rgba(0, 0, 0, 0.05); padding-bottom: 20px;margin-bottom: -10px;">
    <div class="bg-white shadow" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(<?php if($pet_type=='cat') echo'assets/img/cat_page\.jpg';else echo'assets/img/dog_page\.jpg'; ?>);background-size: cover;
    background-repeat: no-repeat;">
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="jumbotron  mb-0 text-white" style="background: rgba(0, 0, 0, 0)">
                <div class="container" style="text-shadow: 2px 2px 8px black;">
                    <h1 class="display mt-4"><?php if($pet_type=='cat') echo'CAT';else echo'DOG'; ?> INSURANCE PLANS</h1>
                    <p class="lead">We offer dog health insurance plans for illnesses, injuries and routine wellness care. New chronic and recurring conditions are covered at no additional cost.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="container">
            
            </div>
        </div>
    </div>
</div>
</div>

<div class="row d-flex justify-content-center">
<div class="col-xl-4 col-lg-5 col-md-8 mt-5">
    <div class="col-lg-12 border rounded shadow bg-white">
        <div class="modal-header mb-3">
            <h4 class="modal-title text-info" id="myModalLabel">Pet Details</h4>
        </div>
        <div class="form-row px-3">
            <div class="col-md-12">
                <ul class="fa-ul align-middle">
                    <li class="py-1">
                        <div class="row">
                            <div class="col-4">
                                <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
                                Pet Type:
                            </div>
                            <div class="col-8">
                                : <?php echo $pet_type; ?>
                            </div>
                        </div>
                    </li>
                    <li class="py-1">
                        <div class="row">
                            <div class="col-4">
                                <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
                                Breed
                            </div>
                            <div class="col-8">
                                : <?php echo $breed; ?>
                            </div>
                        </div>
                    </li>
                    <li class="py-1">
                        <div class="row">
                            <div class="col-4">
                                <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
                                Name
                            </div>
                            <div class="col-8">
                                : <?php echo $pet_name; ?>
                            </div>
                        </div>
                    </li>
                    <li class="py-1">
                        <div class="row">
                            <div class="col-4">
                                <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
                                Gender
                            </div>
                            <div class="col-8">
                                : <?php echo $pet_gender; ?>
                            </div>
                        </div>
                    </li>
                    <li class="py-1">
                        <div class="row">
                            <div class="col-4">
                                <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
                                DOB
                            </div>
                            <div class="col-8">
                                : <?php echo $pet_dob; ?>
                            </div>
                        </div>
                    </li>
                    <li class="py-1">
                        <div class="row">
                            <div class="col-4">
                                <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
                                Age
                            </div>
                            <div class="col-8">
                                : <?php echo $pet_age." year(s)"; ?>
                            </div>
                        </div>
                    </li>
                </ul>
                <hr/>
                <ul class="fa-ul align-middle">
                    <li class="py-1">
                        <div class="row">
                            <div class="col-4">
                                <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
                                Invest
                            </div>
                            <div class="col-8">
                                : <?php echo $invest; ?>
                            </div>
                        </div>
                    </li>
                    <li class="py-1">
                        <div class="row">
                            <div class="col-4">
                                <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
                                Term
                            </div>
                            <div class="col-8">
                                : <?php echo $term." year(s)"; ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-8 mt-5">
    <div class="col-lg-12 border rounded shadow bg-white">
            <div class="modal-header mb-3">
                <h4 class="modal-title text-info" id="myModalLabel">Proposer Details</h4>
            </div>
            <div class="form-row px-3">
                <div class="col-md-12">
                    <ul class="fa-ul align-middle">
                        <li class="py-1">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
                                    Proposer ID
                                </div>
                                <div class="col-8">
                                    : <?php echo $userid; ?>
                                </div>
                            </div>
                        </li>
                        <li class="py-1">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
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
                                    <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
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
                                    <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
                                    Mobile No.
                                </div>
                                <div class="col-8">
                                    : <?php echo $phone; ?>
                                </div>
                            </div>
                        </li>
                        <li class="py-1">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fa-li fa fa-info-circle text-info" style="font-size: 20px"></i>
                                    Address
                                </div>
                                <div class="col-8">
                                    : <?php echo $add; ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
<div class="row d-flex justify-content-center">
    <div class="col-lg-10 col-md-8 mt-5">
        <div class="col-lg-12 border rounded shadow bg-white pb-3">
            <div class="modal-header">
                <h4 class="modal-title text-info" id="myModalLabel">Bank Details</h4>
            </div>
            <table class="table table-striped text-white">
                <thead>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row" class="clr-primary">Account Number</th>
                    <th scope="row" class="clr-primary">: 0108053000019932</th>
                    </tr>
                    <tr>
                    <th scope="row" class="clr-secondary">Account Name</th>
                    <th scope="row" class="clr-secondary">: Pet Insurance Co. Ltd</th>
                    </tr>
                    <tr>
                    <th scope="row" class="clr-primary">Account Type</th>
                    <th scope="row" class="clr-primary">: Savings Bank</th>
                    </tr>
                    <tr>
                    <th scope="row" class="clr-secondary">Bank Name</th>
                    <th scope="row" class="clr-secondary">: South Indian Bank Ltd</th>
                    </tr>
                    <tr>
                    <th scope="row" class="clr-primary">IFSC Code</th>
                    <th scope="row" class="clr-primary">: SIBL0000108</th>
                    </tr>
                </tbody>
            </table>
            <button type="button" id="btn" class="btn btn-outline-secondary mt-2">Print Challan</button>
            </div>
        </div>      
    </div>
</div>
<?php
    include "footer.php";
?>
</html>