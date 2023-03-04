<?php @session_start();
$a = $_REQUEST["PHONE"];
$b = $_REQUEST["pass"];
//   echo $a;

include("g_dbconnect.php");
$rsMember = mysqli_query($con, "SELECT * FROM `g_guard_details` WHERE PHONE = '$a'");

$row = mysqli_fetch_array($rsMember);
$n = $row["NAME"];

if (mysqli_num_rows($rsMember) == true) {
	if ($row["PASSWORD"] == $b) {

		$_SESSION["name"] = $n;
		
		header("location:g_home.php");
		// echo "yes";
	} else {

		// echo "दर्ज किया गया पासवर्ड गलत है प्लीज् सही नम्बर दर्ज करें";
		echo "<script>

   		alert('दर्ज किया गया पासवर्ड गलत है प्लीज् सही पासवर्ड दर्ज करें');  
  		window.location.href='index.php';

   		</script>";
	}
} else {
	// echo "दर्ज किया गया नम्बर गलत है प्लीज् सही नम्बर दर्ज करें";
	echo "<script>

   		alert('दर्ज किया गया नम्बर गलत है प्लीज् सही नम्बर दर्ज करें');  
  		window.location.href='index.php';

   		</script>";
}
