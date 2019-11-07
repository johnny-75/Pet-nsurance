<?php
include "../connect.php";
session_start();
$current_password=md5(test_input($_POST['current_password']));

$username=$_SESSION['admin'];
$query = "select password from admin where username='$username'";
$result1=$mysqli->query($query);
if($result1->num_rows>0)
{
    $row=$result1->fetch_assoc();
    if($current_password==$row['password'])
    {
        $new_password=md5($_POST['new_password']);
        $query = "update admin set password=? where username=?";
		$statement = $mysqli->prepare($query);

        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
            $statement->bind_param('ss',$new_password, $username);

		if($statement->execute()){
		   header("location:change_password.php?status=1.php");
		}else{
			die('Error : ('. $mysqli->errno .') '. $mysqli->error);
		}
    }
    else
        header("location:change_password.php?cpass_status=0");
}
?>