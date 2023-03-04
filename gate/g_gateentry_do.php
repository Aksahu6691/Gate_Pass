<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<?php @session_start();
include("g_dbconnect.php");

$name = $_REQUEST['name'];
$b = $_SESSION["name"];

$rs = mysqli_query($con, "SELECT * FROM g_gateentryemp WHERE EMP_NAME='$name' and ENTRY_DATE = '$date' and GATE_MEN = '$b' ") or die("quary error1");
$row1 = mysqli_num_rows($rs);
echo $row1;
if ($row1 != 0) {

    // echo "name already exist";
    echo "<script>

    alert('नाम पहले से दर्ज हो चूका है');
    window.location.href='g_gateentry.php';

    </script>";
} else {
    // echo "hello";
echo $sql="INSERT INTO `g_gateentryemp` (`EMP_NAME`, `ENTRY_DATE`, `ENTRY_TIME`, `STATUS`, `GATE_MEN`) VALUES ('$name', '$date', '$time', '1', '$b')";
        mysqli_query($con,$sql ) or die($con);

        echo "<script>

        alert('Successfully Saved');
        window.location.href='g_gateentry.php';

        </script>";
    }
?>

</html>