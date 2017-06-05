<?php
include('config.php');
session_start();

$user_valid = $_SESSION['current_user'];
$query = mysqli_query($con,"SELECT username, email FROM users WHERE username = '$user_valid' ");
$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
$current_user = $row['username'];

if(!isset($_SESSION['current_user'])){
    header("location:login.php");
}
?>