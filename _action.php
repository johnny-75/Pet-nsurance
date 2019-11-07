<?php
include "connect.php";
if(isset($_POST['claim_policy']))
{
    claim_policy();
}
if(isset($_POST['activate_policy']))
{
    activate_policy();
}
function claim_policy()
{
    $mysqli=$GLOBALS['mysqli'];
    $reason=test_input($_POST['reason']);
    $description=test_input($_POST['description']);
    $insurance_id=test_input($_POST['insurance_id']);
    $query = "insert into claim_policy (insurance_id,reason,description) VALUES(?,?,?)";
    $statement = $mysqli->prepare($query);

    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $statement->bind_param('iss',$insurance_id,$reason,$description);

    if($statement->execute()){
        header("location:my_policies.php?status=1&action=claim");
    }
    else
    {
        header("location:my_policies.php?status=0&action=claim");
    }
}

function activate_policy()
{
    $mysqli=$GLOBALS['mysqli'];
    $challan_number=test_input($_POST['challan_number']);
    $payment_date=test_input($_POST['payment_date']);
    $description=test_input($_POST['description']);
    $insurance_id=test_input($_POST['insurance_id']);
    $query = "update insured_pet set challan_number=?,payment_date=?,description=?,insured_status=2 where insurance_id=?";
    $statement = $mysqli->prepare($query);

    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $statement->bind_param('sssi',$challan_number,$payment_date,$description,$insurance_id);

    if($statement->execute()){
        header("location:my_policies.php?status=1&action=activate");
    }
    else
    {
        header("location:my_policies.php?status=0&action=activate");
    }
}


?>