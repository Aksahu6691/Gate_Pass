<?php
include("g_dbconnect.php");

// Gateentry out time setting
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    mysqli_query($con, "UPDATE `g_gateentryemp` SET `EXIT_TIME` = '$time' WHERE ID ='$id'") or die("quarry_error");

    // Here it is checking whether there is time in the table or not and store value in variable.
    $rs = mysqli_query($con, "SELECT * FROM `g_gateentrytime` WHERE REFFERAL_ID = '$id' and DATE = '$date'") or die("Quary Error1");

    if (mysqli_num_rows($rs) != 0) {

        // If the employee's exit time is not set, then the exit time will also be set.
        $rse = mysqli_query($con, "SELECT * FROM `g_gateentrytime` WHERE REFFERAL_ID = '$id' and DATE = '$date'") or die("Quary Error1");

        $endTimeId = 0;
        while ($r = mysqli_fetch_assoc($rse)) {
            $endTimeId = $r['ID'];
        }
        mysqli_query($con, "UPDATE `g_gateentrytime` SET `BREACK_TIME_END`= '$time' WHERE ID ='$endTimeId'") or die("quarry_error");
    }
    echo "<script>alert('Successfully Saved');

window.location.href='g_gateentry.php';
</script>";
} else if (isset($_REQUEST['sid'])) { // gateentry employee BREACK_TIME_START setting
    $id = $_REQUEST['sid'];

    mysqli_query($con, "UPDATE `g_gateentrytime` SET `BREACK_TIME_START`= '$time' WHERE ID = $id") or die("quarry_error2");

    echo "<script>alert('Successfully Saved');
    window.location.href='g_gateentry.php';
</script>";

} else if (isset($_REQUEST['eid'])) { // gateentry employee BREACK_TIME_END setting
    $id = $_REQUEST['eid'];
    mysqli_query($con, "UPDATE `g_gateentrytime` SET `BREACK_TIME_END`= '$time' WHERE ID ='$id'") or die("quarry_error");

    echo "<script>alert('Successfully Saved');

window.location.href='g_gateentry.php';
</script>";
} else {
    echo "No data found";
}
