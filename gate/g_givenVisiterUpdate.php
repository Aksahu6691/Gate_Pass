<?php
include("g_dbconnect.php");

 $id = $_REQUEST['id'];
 $tm = date("h:i:sa");
 
$sql="UPDATE `g_createvisiter` SET `OUTIME`='$tm' WHERE ID ='$id';";
mysqli_query($con,$sql) or die("quarry_error");

echo "<script>alert('Successfully Saved');  

window.location.href='g_givenVisiterList.php';
</script>";


?>