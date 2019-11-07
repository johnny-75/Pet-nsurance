<?php
    include "connect.php";
    $fname=test_input($_POST['fname']);
	$lname=test_input($_POST['lname']);
	$email=test_input($_POST['email']);
	$password=md5(test_input($_POST['password']));
    
    $sql="select email from user where email='$email'";
    $result1=$mysqli->query($sql);
    if(!$result1->num_rows>0)
    {

        $sql="select max(userid) as userid from user";
        $result1=$mysqli->query($sql);
        $row1=$result1->fetch_assoc();
        if($row1['userid']!=null)
        {
            $userid=$row1['userid']+1;
        }else
        {
            $userid=101;    
        }


        $query = "insert into user (userid,fname,lname,email,password) VALUES(?,?, ?, ?, ?)";
        $statement = $mysqli->prepare($query);

        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('issss',$userid,$fname,$lname,$email,$password);

        if($statement->execute()){
            $name=$fname." ".$lname;
            $query = "insert into profile (userid,name) VALUES(?,?)";
            $statement = $mysqli->prepare($query);

            //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
            $statement->bind_param('is',$userid,$name);
            if($statement->execute()){
                header("location:login.php");
            }
        }
    }
    else
    {
        header("location:registration.php?status=0");
    }

?>