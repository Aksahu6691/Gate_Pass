<?php
  include("g_dbconnect.php");


  $id = $_REQUEST['id'];
 //  echo"$name"; 
  //$dt=date("Y-m-d");
  $dt1=date("h:i:sa");
  
 echo $sql="DELETE FROM `g_createvisiter` WHERE ID = '$id'";
 //////////////////////////////////////////
 echo mysqli_query($con,$sql) or die(mysqli_error($conn));
 
 echo "<script>

 alert('Successfully Saved');  

 window.location.href='g_givenEmpList.php';

 </script>";
?>