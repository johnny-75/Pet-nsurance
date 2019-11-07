<?php
session_start();
if(isset($_GET['user_logout']))
{
	logout();
}

if(isset($_POST['email']))
{
    login();
}

function logout(){
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
	header("location:index.php");
}

function login()
{
    include "connect.php";
	$email=test_input($_POST['email']);
	$password=md5(test_input($_POST['password']));
    
    $query = "select userid from user where email='$email'";
    $result1=$mysqli->query($query);
    if($result1->num_rows>0)
    {
        $query = "select userid from user where email='$email' and password='$password'";
        $result1=$mysqli->query($query);
        if($result1->num_rows>0)
        {
            $row=$result1->fetch_assoc();
            if(isset($_POST["remember"])) {
				setcookie ("member_login",$email,time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
				if(isset($_COOKIE["member_password"])) {
					setcookie ("member_password","");
				}
            }
            $_SESSION['userid']=$row['userid'];
            header("location:user_panel.php");
        }
        else
        {
            header("location:login.php?email=$email&status=1");
        }
        
    }else
    {
        header("location:login.php?email=$email&status=0");
    }
}

?>