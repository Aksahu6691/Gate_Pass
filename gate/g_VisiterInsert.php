<?php @session_start();

$a = $_REQUEST['NAME'];
$b = $_REQUEST['PHONE'];
$c = $_REQUEST['PURPOSE'];
$d = $_REQUEST['EMPLIST'];
// $e = $_FILES['IMAGE'];
$img = $_REQUEST['imageName'];
$g = $_SESSION["name"];
$f = $_REQUEST["list"];
 
include 'g_dbconnect.php';
$rs = mysqli_query($con, "select * from g_visiter_details where NAME='$a'");
   
   mysqli_query($con,"INSERT INTO `g_visiter_details` (`NAME`, `PHONE`, `PURPOSE`, `EMPLIST`, `WAITING`, `IMAGE`, `GATE_MEN`, `DATE`) VALUES ('$a', '$b', '$c', '$d','$f', '$img', '$g', '$date')") or die("quary error");

   echo "<script>

   alert('Successfully Saved');  
  
   window.location.href='g_VisiterForm.php';
  
   </script>";
