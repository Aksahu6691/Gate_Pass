<?php
include("g_dbconnect.php");

if (isset($_REQUEST['name'])) {
    $a = $_REQUEST['name'];
    $date = date('Y-m-d');
    
    $result = mysqli_query($con, "SELECT * FROM `g_visiter_details` WHERE `NAME` = '$a' and DATE = '$date'");
    $row = mysqli_fetch_array($result);

    if ($row["ENTRY_TIME"]) {

        echo "<script>alert('विजिटर पहले से आ गया है');

        window.location.href='g_VisiterOut.php';
        </script>";

    } else {
        $sql = "UPDATE `g_visiter_details` SET `ENTRY_TIME`= '$time' WHERE NAME = '$a'";
        mysqli_query($con, $sql) or die("quarry_error");
    }
} else if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "UPDATE `g_visiter_details` SET `EXIT_TIME`= '$time' WHERE ID = '$id'";
    mysqli_query($con, $sql) or die("quarry_error");
}

echo "<script>alert('Successfully Saved');

window.location.href='g_VisiterOut.php';
</script>";
