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
<div style="background: rgba(0, 0, 0, .0); padding-bottom: 20px;margin-bottom: -10px;">
    <div class="bg-white shadow" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(<?php if (isset($_GET['pet_type'])){ if($_GET['pet_type']=='cat') echo'assets/img/cat_page\.jpg';else echo'assets/img/dog_page\.jpg';} else echo'assets/img/dog_page\.jpg'; ?>);background-size: cover;
    background-repeat: no-repeat;">
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="jumbotron  mb-0 text-white" style="background: rgba(0, 0, 0, 0)">
                <div class="container" style="text-shadow: 2px 2px 8px black;">
                    <h1 class="display mt-4"><?php if (isset($_GET['pet_type'])){ if($_GET['pet_type']=='cat') echo'CAT';else echo'DOG';} else echo'DOG'; ?> INSURANCE PLANS</h1>
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

<form id="contact-form needs-validation" method="post" action="_buy_policy.php" role="form">
<div class="col-lg-8 offset-lg-2 mt-5">
    <div class="col-lg-12 border rounded shadow animate">
            <div class="modal-header mb-3">
                <h4 class="modal-title text-info" id="myModalLabel">Pet Details</h4>
            </div>
            <div class="form-row text-sm-right">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="pet_type" class="col-sm-4 col-form-label">Pet Type:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="pet_type" name="pet_type" value="<?php if (isset($_GET['pet_type'])){ if($_GET['pet_type']=='cat') echo'Cat';else echo'Dog';} else echo'Dog'; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="breed" class="col-sm-4 col-form-label">Breed:</label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="breed" name="breed" required="required" data-error="Breed is required" oninvalid="this.setCustomValidity('Select Breed')"
                            oninput="this.setCustomValidity('')">
                                <option value="" hidden selected disabled>Choose one..</option>
                                <?php
                                    if(isset($_GET['pet_type']))
                                    {
                                        include 'connect.php';
                                        $pet_type=test_input($_GET['pet_type']);
                                        if($pet_type=="cat")
                                        {
                                            $str = file_get_contents('source/cats.json');
                                            $json = json_decode($str, true);
                                            foreach ($json['cats'] as $field => $value) {
                                                if(strcmp(substr($value,0,7),'disable')==0)
                                                {
                                                       echo'<option disabled value="'.substr($value,8,1).'">'.substr($value,8,1).'</option>';
                                                }
                                                else
                                                        echo'<option value="'.$value.'">'.$value.'</option>';
                                            }
                                        }
                                        else{
                                            show_dog();
                                        }

                                    }else{
                                        show_dog();
                                    }
                                    function show_dog(){
                                        $str = file_get_contents('source/dogs.json');
                                            $json = json_decode($str, true);
                                            foreach ($json['dogs'] as $field => $value) {
                                                if(strcmp(substr($value,0,7),'disable')==0)
                                                {
                                                       echo'<option disabled value="'.substr($value,8,1).'">'.substr($value,8,1).'</option>';
                                                }
                                                else
                                                        echo'<option value="'.$value.'">'.$value.'</option>';
                                            }
                                    }
                                ?>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="pet_name" class="col-sm-4 col-form-label">Pet Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pet_name" name="pet_name" placeholder="Enter Pet name" required="required" data-error="Pet name is required." oninvalid="this.setCustomValidity('Enter pet name')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="pet_gender" class="col-sm-4 col-form-label">Gender:</label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="pet_gender" name="pet_gender" required="required" data-error="Gender is required" oninvalid="this.setCustomValidity('Select Gender')"
                            oninput="this.setCustomValidity('')">
                                <option value="" hidden selected disabled>Choose one..</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="pet_dob" class="col-sm-4 col-form-label">DOB:</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="pet_dob" name="pet_dob" required="required" data-error="DOB is required" oninvalid="this.setCustomValidity('Select DOB')"
                            oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="pet_age" class="col-sm-4 col-form-label">Age:</label>
                        <div class="col-sm-8">
                            <input type="number" max="20" class="form-control" id="pet_age" name="pet_age" placeholder="Enter Pet age (0-20)" required="required" data-error="Pet age is required." oninvalid="this.setCustomValidity('Enter valid pet age (0-20)')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="col-lg-8 offset-lg-2 mt-5">
        <div class="col-lg-12   border rounded shadow animate">
                <div class="modal-header mb-3">
                    <h4 class="modal-title text-info" id="myModalLabel">Insurance Details</h4>
                </div>
                <div class="form-row text-sm-right">
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="invest" class="col-sm-2 col-form-label">Invest:</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rs.</span>
                                    </div>
                                    <input type="text" id="invest" name="invest" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" class="form-control text-right" aria-label="Amount (to the nearest rupees)" placeholder="Investment amount" required="required" data-error="Enter investment amount." oninvalid="this.setCustomValidity('Enter investment amount')" oninput="this.setCustomValidity('')">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 col-form-label mb-3">Term:</label>
                            <div class="col-sm-4 custom-control custom-radio custom-control-inline ml-4">
                                <input type="radio" id="term1" name="term" class="custom-control-input" required="required" checked value="1">
                                <label class="custom-control-label" for="term1">1 Year</label>
                            </div>
                            <div class=" col-sm-4 custom-control custom-radio custom-control-inline ml-4">
                                <input type="radio" id="term2" name="term" class="custom-control-input" required="required" value="3">
                                <label class="custom-control-label" for="term2">3 Year</label>
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-4 custom-control custom-radio custom-control-inline ml-4">
                                <input type="radio" id="term3" name="term" class="custom-control-input" required="required" value="5">
                                <label class="custom-control-label" for="term3">5 Year</label>
                            </div>
                            <div class=" col custom-control custom-radio custom-control-inline ml-4">
                                <input type="radio" id="term4" name="term" class="custom-control-input" required="required" value="10">
                                <label class="custom-control-label" for="term4">10 Year</label>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-lg-8 offset-lg-2 mt-5">
        <div class="col-lg-12   border rounded shadow animate">
            <div class="modal-header mb-3">
                <h4 class="modal-title text-info" id="myModalLabel">Questions about Pet</h4>
            </div>
                <div class="form-row">
                    <div class="col-12">
                        <ul class="fa-ul align-middle">
                            <li class="py-1">
                                <i class="fa-li fa fa-question-circle py-1 text-info" style="font-size: 20px"></i>
                                Has Pet shown any signs of an illness or injury or been unwell, either now or in the past?
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="is_injured1" name="is_injured" class="custom-control-input" value="yes">
                                    <label class="custom-control-label" for="is_injured1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="is_injured2" name="is_injured" class="custom-control-input" checked value="no">
                                    <label class="custom-control-label" for="is_injured2">No</label>
                                </div>
                            </li>
                            <li class="py-1">
                                <i class="fa-li fa fa-question-circle py-1 text-info" style="font-size: 20px"></i>
                                Has Pet been seen by a vet for any reason?
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="is_vet1" name="is_vet" class="custom-control-input" value="yes">
                                    <label class="custom-control-label" for="is_vet1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="is_vet2" name="is_vet" class="custom-control-input" checked value="no">
                                    <label class="custom-control-label" for="is_vet2">No</label>
                                </div>
                            </li>
                            <li class="py-1">
                                <i class="fa-li fa fa-question-circle py-1 text-info" style="font-size: 20px"></i>
                                Has Pet been insured elsewhere before?
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="is_insured1" name="is_insured" class="custom-control-input" value="yes">
                                    <label class="custom-control-label" for="is_insured1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="is_insured2" name="is_insured" class="custom-control-input" checked value="no">
                                    <label class="custom-control-label" for="is_insured2">No</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-2 mt-5 ">
            <div class="col-lg-12   border rounded shadow px-0 transparent animate">
                <div class="card border-0 pb-2">
                    <span class="btn btn-link text-info" data-toggle="collapse" data-target="#collapseOne" style="text-decoration: none" aria-expanded="false" aria-controls="collapseOne">
                        <div class="card-header bg-white text-left" id="headingOne">
                            <h5 class="mb-0">
                                Declarations <i class="fa fa-caret-down"></i>
                            </h5>
                        </div>
                    </span>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body text-justify">
                            I understand that pre-existing conditions will not be covered. pre existing conditions are illnesses and injuries which happened or your pet showed signs of before your policy starts.
                        </div>
                    </div>
                </div>
            <div class="container-fluid  bg-white pb-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" required="required">
                    <label class="custom-control-label" for="customCheck1">I confirm that I have read the terms and conditions.</label>
                </div>
                <button type="submit" id="btn" class="btn btn-primary mt-2">Submit</button>
            </div>
        </div>
    </div>
</form>
</div>
<?php
    include "footer.php";
?>
</html>