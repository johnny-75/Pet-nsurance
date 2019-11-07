<?php
    session_start();
    include "connect.php";
    $pet_type=test_input($_POST['pet_type']);
    $breed=test_input($_POST['breed']);
    $pet_name=test_input($_POST['pet_name']);
    $pet_gender=test_input($_POST['pet_gender']);
    $pet_dob=test_input($_POST['pet_dob']);
    $pet_age=test_input($_POST['pet_age']);
    $invest=test_input($_POST['invest']);
    $term=test_input($_POST['term']);
    $is_injured=test_input($_POST['is_injured']);
    $is_vet=test_input($_POST['is_vet']);
    $is_insured=test_input($_POST['is_insured']);
    $userid=$_SESSION['userid'];

    $sql="select max(insurance_id) as insurance_id from insured_pet";
    $result1=$mysqli->query($sql);
    $row1=$result1->fetch_assoc();
    if($row1['insurance_id']!=null)
    {
        $insurance_id=$row1['insurance_id']+1;
    }else
    {
        $insurance_id=1001;    
    }

    $query = "insert into insured_pet (insurance_id,userid,pet_type,breed,pet_name,pet_gender,pet_dob,pet_age,invest,term,is_injured,is_vet,is_insured) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $statement = $mysqli->prepare($query);

    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $statement->bind_param('iisssssiiisss',$insurance_id,$userid,$pet_type,$breed,$pet_name,$pet_gender,$pet_dob,$pet_age,$invest,$term,$is_injured,$is_vet,$is_insured);

    if($statement->execute()){
        header("location:buy_policy_payment.php?insurance_id=$insurance_id");
    }
?>