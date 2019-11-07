<?php
    session_start();
    include "connect.php";
    $userid=$_SESSION['userid'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $phone=$_POST['phone'];
    $add1=$_POST['add1'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];
    $occupation=$_POST['occupation'];
    $gender=$_POST['gender'];
    $about=$_POST['about'];

    if(!empty($_FILES['display_pic']['name'])){
        $pic_name = $_FILES['display_pic']['name'];
        $pic_tmp = $_FILES['display_pic']['tmp_name'];
        $ext = substr(strrchr($pic_name, '.'), 1);
        $pic_name = $userid.".$ext";
        move_uploaded_file($pic_tmp, "assets/img/profile_pic/". $pic_name);
        $query = "update profile set name=?, age=?, phone=?,add1=?, city=?, state=?, pincode=?, occupation=?, gender=?, about=?,pic=? where userid=?";
        $statement = $mysqli->prepare($query);

        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('sisssssssssi', $name,$age,$phone,$add1,$city,$state,$pincode,$occupation,$gender,$about,$pic_name,$userid);
    }
    else{
        $query = "update profile set name=?, age=?, phone=?,add1=?, city=?, state=?, pincode=?, occupation=?, gender=?, about=? where userid=?";
        $statement = $mysqli->prepare($query);

        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('sissssssssi', $name,$age,$phone,$add1,$city,$state,$pincode,$occupation,$gender,$about,$userid);
    }


    
    if($statement->execute()){
        header("location:profile.php");
    }else{
        die('Error : ('. $mysqli->errno .') '. $mysqli->error);
    }
?>