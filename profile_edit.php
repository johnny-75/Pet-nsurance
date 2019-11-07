<?php
    session_start();
    if(!isset($_SESSION['userid']))
        header("location:login.php");
?>
<!DOCTYPE html>
<html>

<?php
    include"header.php";
    include "connect.php";
    $userid=$_SESSION['userid'];
    $query = "select * from profile where userid=$userid";
    $result1=$mysqli->query($query);
    if($result1->num_rows>0)
    {
        $row=$result1->fetch_assoc();
        
        $name=$row['name'];
        $age=$row['age'];
        $phone=$row['phone'];
        $add1=$row['add1'];
        $city=$row['city'];
        $state=$row['state'];
        $pincode=$row['pincode'];
        $occupation=$row['occupation'];
        $gender=$row['gender'];
        $about=$row['about'];
        $pic=$row['pic'];

    }
?>
<form id="contact-form needs-validation" method="post" action="_profile_edit.php" role="form"   enctype="multipart/form-data">
<div class="col-lg-8 offset-lg-2 mt-5">
    <div class="col-lg-12 border rounded shadow animate">
            <div class="modal-header mb-3">
                <h4 class="modal-title text-info" id="myModalLabel">My Profile</h4>
            </div>
            <div class="form-row text-sm-right">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Name:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" placeholder="Enter your name" required="required" data-error="name is required." oninvalid="this.setCustomValidity('Enter your name')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="age" class="col-sm-4 col-form-label">Age:</label>
                        <div class="col-sm-8">
                                <input type="number" max="100" class="form-control" id="age" name="age" placeholder="Enter your age" value="<?php echo $age ?>">
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="gender" class="col-sm-4 col-form-label">Gender:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="gender" name="gender" required="required" data-error="Gender is required" oninvalid="this.setCustomValidity('Select Gender')"
                            oninput="this.setCustomValidity('')" >
                                <option value="" hidden selected disabled>Choose one..</option>
                                <option <?php if($gender=="male") echo "selected" ?> value="male">Male</option>
                                <option <?php if($gender=="female") echo "selected" ?> value="female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 col-form-label">Address:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="add1" placeholder="#house Street/location" required="required" data-error="address is required."  value="<?php echo $add1 ?>" oninvalid="this.setCustomValidity('Enter your address')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="state" class="col-sm-4 col-form-label">State:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="state" name="state" required="required" data-error="state is required" oninvalid="this.setCustomValidity('Select state')"
                            oninput="this.setCustomValidity('')">
                                <?php
                                    $str = file_get_contents('source/states_cities.json');
                                    $json = json_decode($str, true);
                                    foreach ($json['states'][0] as $field => $value) {
                                        if($state==$field)
                                            echo "<option selected='selected' value='".$field."'>".$field."</option>";
                                        else
                                            echo "<option value='".$field."'>".$field."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="city" class="col-sm-4 col-form-label">City:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="city" name="city" required="required" data-error="city is required" oninvalid="this.setCustomValidity('Select city')"
                            oninput="this.setCustomValidity('')">
                                <option  value="<?php echo $city ?>" selected><?php echo $city ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="pincode" class="col-sm-4 col-form-label">Pincode:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                                <input type="text" id="pincode" name="pincode" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" class="form-control" placeholder="pincode" required="required" data-error="Enter pincode." oninvalid="this.setCustomValidity('Enter pincode')" oninput="this.setCustomValidity('')" value="<?php echo $pincode ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="phone" class="col-sm-4 col-form-label">Phone:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" id="phone" name="phone" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" class="form-control" placeholder="phone" required="required" data-error="Enter phone no." oninvalid="this.setCustomValidity('Enter phone no.')" oninput="this.setCustomValidity('')" value="<?php echo $phone ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="occupation" class="col-sm-4 col-form-label">Occupation:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter Pet name" value="<?php echo $occupation ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="display_pic" class="col-sm-4 col-form-label">Display Pic:</label>
                        <div class="col-sm-8">
                            <div class="custom-file text-left">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="display_pic" value="<?php echo $pic ?>">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                        <div class="form-group row">
                            <label for="about" class="col-sm-2 col-form-label">About Me:</label>
                            <div class="col-sm-10">
                                <textarea id="about" name="about" class="form-control" placeholder="Message for me *" rows="4"><?php echo $about ?></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-12 d-flex justify-content-end mb-4">
                <button type="submit" id="btn" class="btn btn-primary ">Submit</button>
            </div>
    </div>
</div>
</form>
<?php
include"footer.php";
?>
<script src="assets/js/jquery.min.js"></script>
<script>
    $('#state').on('change', function() {
      loadx();
    });
    $( document ).ready(function() {
        loadx();
    });
    function loadx()
    {
        var city = $('#city').val();
        document.getElementById("city").innerHTML="<option value='' hidden selected disabled>Choose one..</option>";
        var state = $('#state').val();
        console.log(city);
        $.getJSON("source/states_cities.json", function(result){
            $.each(result, function(key,value){
                $.each(value,function(key,value){
                    $.each(value,function(key,value){
                        if(key==state)
                    $.each(value,function(key,value){
                        if(value==city)
                            $('#city').append('<option selected=selected value="'+value+'">'+value+'</option>');
                        else
                            $('#city').append('<option value="'+value+'">'+value+'</option>');
                            //console.log(value);
                    });
                });
                });
            });
        });
    }
</script>
</html>