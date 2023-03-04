<?php 
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i:s');
$dateTime = date("Y-m-d h:i:s");

$user="polybondpi";
$password="polybondpi";
$database="polybondbh";

// $con = mysqli_connect('localhost',$user,$password) or die("Connection error");
// mysqli_select_db($con,"$database") or die("database selection error");

$con = mysqli_connect("127.0.0.1","root","") or die("Connection error");
mysqli_select_db($con,"polybond123") or die("database selection error");
