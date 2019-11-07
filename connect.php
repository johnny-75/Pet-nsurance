<?php
//session_start();
$mysqli = new mysqli("localhost", "root", "", "insurance");
    if($mysqli->connect_error)
    {
        die("Connection failed ".$mysqli->connect_error);
    }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>