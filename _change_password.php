<?php
    session_start();
    include "connect.php";
    $current_password=md5(test_input($_POST['current_password']));
    $new_password=md5(test_input($_POST['new_password']));
    if(!isset($_SESSION['userid']))
    {
        if(isset($_POST['request_mail']))
        {
            
            change_password("email",$_POST['request_mail']);
        }
        else
        {
            $email=test_input($_POST['email']);
            $query = "select userid from user where email='$email'";
            $result1=$mysqli->query($query);
            if($result1->num_rows>0)
            {
                $row=$result1->fetch_assoc();
                $hash=md5($row['userid']);
                    //change_password("email",$email);
                    header("location:phpmailer/send_mail.php?hash=$hash&email=$email&task=forgot");
            }
            else
            header("location:change_password.php?mail_status=0");
        }
    }
    else
    {
        $userid=$_SESSION['userid'];
        $query = "select password from user where userid=$userid";
        $result1=$mysqli->query($query);
        if($result1->num_rows>0)
        {
            $row=$result1->fetch_assoc();
            if($current_password==$row['password'])
                change_password("userid",$userid);
            else
                header("location:change_password.php?cpass_status=0");
        }
    }

    function change_password($name,$value)
    {
        $mysqli=$GLOBALS['mysqli'];
        $new_password=$GLOBALS['new_password'];
        $query = "update user set password=? where $name=?";
		$statement = $mysqli->prepare($query);

        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        if($name=="userid")
            $statement->bind_param('si', $new_password,$value);
        else
            $statement->bind_param('ss', $new_password,$value);

		if($statement->execute()){
		   header("location:success.php");
		}else{
			die('Error : ('. $mysqli->errno .') '. $mysqli->error);
		}
    }
?>