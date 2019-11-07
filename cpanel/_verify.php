<?php
    include "../connect.php";

if(isset($_GET['verify_claim']))
{
    if($_GET['verify_claim']==1)
        verify_claim(1);
    else
        verify_claim(2);
}


if(isset($_GET['verify_policy']))
{
    if($_GET['verify_policy']==1)
        verify_policy(1);
    else
        verify_policy(0);
}

if(isset($_GET['enquiry']))
{
    delete_query();
}

function verify_claim($status)
{
    $mysqli=$GLOBALS['mysqli'];
    $claim_id=$_GET['claim_id'];
    $query = "update claim_policy set claim_status=? where claim_id=?";
    $statement = $mysqli->prepare($query);

    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('ii', $status,$claim_id);
    if($statement->execute()){
        header("location:verify_claim.php?status=1");
    }else{
        header("location:verify_claim.php?status=0");
    }
}


function verify_policy($status)
{
    $mysqli=$GLOBALS['mysqli'];
    $insurance_id=$_GET['insurance_id'];
    $query = "update insured_pet set insured_status=? where insurance_id=?";
    $statement = $mysqli->prepare($query);

    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('ii', $status,$insurance_id);
    if($statement->execute()){
        header("location:verify_policy.php?status=1");
    }else{
        header("location:verify_policy.php?status=0");
    }
}


function delete_query()
{
    $mysqli=$GLOBALS['mysqli'];
    $query_id=$_GET['query_id'];
    $query = "delete from enquiries where query_id=?";
    $statement = $mysqli->prepare($query);

    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('i', $query_id);
    if($statement->execute()){
        header("location:enquiries.php?status=1");
    }else{
        header("location:enquiries.php?status=0");
    }
}
?>