<?php @session_start();

// $a = $_FILES['image'];
$img = $_REQUEST['imageName'];
$b = $_REQUEST['FROM'];
$c = $_REQUEST['ADDRESS'];
$d = $_REQUEST['LIST'];
$e = $_REQUEST['EMP_NAME'];
$f = $_REQUEST['list'];
$g = $_SESSION["name"];
$dateTime = date("Y-m-d h:i:s");
// echo $img;
include 'g_dbconnect.php';

   mysqli_query($con,"INSERT INTO `g_dak_details`(`IMAGE`, `FROM`, `ADDRESS`, `TYPE`, `EMP_NAME`, `IN_OUT`, `GATE_MEN`, `DATE`) VALUES ('$img','$b','$c','$d','$e','$f','$g','$dateTime')") or die("quary error");

   echo "<script>

   alert('Successfully Saved');  
   window.location.href='g_DakForm.php';
  
   </script>";

?>