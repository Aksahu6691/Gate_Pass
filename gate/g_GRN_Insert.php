<?php @session_start();
// $a = $_FILES["IMAGE"];
$img = $_REQUEST['imageName'];
$b = $_REQUEST["grn"];
$c = $_REQUEST["pname"];
$d = $_REQUEST["material"];
$e = $_REQUEST["invoice"];
$f = $_REQUEST["vehicle"];
$g = $_REQUEST["qty"];
$h = $_REQUEST["list"];
$i = $_REQUEST["rst"];
$k = $_REQUEST["weight"];

$l = $_SESSION["name"];
$dateTime = date("Y-m-d h:i:s");

// $img = $a['name'];
// move_uploaded_file($a["tmp_name"],"./collection/$img");

include 'g_dbconnect.php';

mysqli_query($con,"INSERT INTO `g_grn`(`IMAGE`, `GRN`, `PNAME`, `MATERIAL`, `INVOICE`, `VEHICLE`, `QTY`, `LIST`, `RST`, `WEIGHT`, `GUARD`, `DATE_TIME`) VALUES ('$img','$b','$c','$d','$e','$f','$g','$h','$i','$k','$l', '$dateTime')") or die("quarry error");

echo "<script>

   alert('Successfully Saved');  
  
   window.location.href='g_GRN.php';
  
   </script>";
?>