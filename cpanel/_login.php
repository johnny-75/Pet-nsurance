<?php
session_start();
if(isset($_GET['admin_logout']))
{
	logout();
}

if(isset($_POST['username']))
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
    include "../connect.php";
	$username=test_input($_POST['username']);
	$password=md5(test_input($_POST['password']));
    
    $query = "select * from admin where username='$username' and password='$password'";
    $result1=$mysqli->query($query);
    if($result1->num_rows>0)
    {
            $_SESSION['admin']=$username;
            header("location:index.php");
    }else
    {
        header("location:index.php?status=0");
    }
}

?>