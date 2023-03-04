<?php
include("g_dbconnect.php");
$id = $_REQUEST['id'];

// Here it is checking whether there is time in the table or not and store value in variable.
$rs = mysqli_query($con, "SELECT * FROM `g_gateentrytime` WHERE REFFERAL_ID = '$id' and DATE = '$date'") or die("Quary Error1");

if (mysqli_num_rows($rs) == 0) { // Does this variable have star time or not? If not, go inside.

    mysqli_query($con, "INSERT INTO `g_gateentrytime`(`REFFERAL_ID`, `BREACK_TIME_START`, `DATE`) VALUES ('$id','$time','$date')") or die("Quarry error2");
}
$rse = mysqli_query($con, "SELECT * FROM `g_gateentrytime` WHERE REFFERAL_ID = '$id' and DATE = '$date'") or die("Quary Error2");

$startTime = 0;
$endTime = 0;
while ($r = mysqli_fetch_assoc($rse)) {
    $startTime = $r['BREACK_TIME_START'];
    $endTime = $r['BREACK_TIME_END'];
}
// echo $startTime;
// echo $endTime;

////////////////////////////////////////////////////////////////////////<?php echo $row['BREACK_TIME_END']; 

if ($endTime == '') {

    $result = mysqli_query($con, "SELECT * FROM `g_gateentrytime` WHERE REFFERAL_ID = '$id'") or die("Quary Error3");

    while ($row = mysqli_fetch_assoc($result)) {
        // echo "hiiiii";
?>
        <tr>
            <th scope="row">अवकाश चालू</th>
            <?php if ($row['BREACK_TIME_START'] == '') { ?>

                <td>
                    <form action="g_gateentry_out.php" method="post">
                        <input type="hidden" name="sid" value="<?php echo $row['ID']; ?>">
                        <input type="submit" class="btn btn-success" value="START">
                    </form>
                </td>

            <?php } else { ?>

                <td>
                    <?php
                    $currentDateTime = $row['BREACK_TIME_START'];
                    $newDateTime = date('h:i A', strtotime($currentDateTime));
                    echo $newDateTime;
                    // echo "hello";
                    ?>
                </td>

                <th scope="row">अवकाश बंद</th>
                <?php if ($row['BREACK_TIME_END'] == '') { ?>

                    <td>
                        <form action="g_gateentry_out.php" method="post">
                            <input type="hidden" name="eid" value="<?php echo $row['ID']; ?>">
                            <input type="submit" class="btn btn-success" value="END">
                        </form>
                    </td>

                <?php } else { ?>

                    <td>
                        <?php
                        $currentDateTime = $row['BREACK_TIME_END'];
                        $newDateTime = date('h:i A', strtotime($currentDateTime));
                        echo $newDateTime;
                        // echo "hello";
                        ?>
                    </td>

            <?php }
            } ?>
        </tr>
    <?php }
} else {

    mysqli_query($con, "INSERT INTO `g_gateentrytime`(`REFFERAL_ID`, `BREACK_TIME_START`, `DATE`) VALUES ('$id','$time','$date')") or die("Quarry error4");

    $result = mysqli_query($con, "SELECT * FROM `g_gateentrytime` WHERE REFFERAL_ID = '$id'") or die("Quary Error5");

    while ($row = mysqli_fetch_assoc($result)) {
        // echo "hello";
    ?>
        <tr>
            <th scope="row">अवकाश चालू</th>
            <?php if ($row['BREACK_TIME_START'] == '') { ?>

                <td>
                    <form action="g_gateentry_out.php" method="post">
                        <input type="hidden" name="sid" value="<?php echo $row['ID']; ?>">
                        <input type="submit" class="btn btn-success" value="START">
                    </form>
                </td>

            <?php } else { ?>

                <td>
                    <?php
                    $currentDateTime = $row['BREACK_TIME_START'];
                    $newDateTime = date('h:i A', strtotime($currentDateTime));
                    echo $newDateTime;
                    // echo "hello";
                    ?>
                </td>

                <th scope="row">अवकाश बंद</th>
                <?php if ($row['BREACK_TIME_END'] == '') { ?>

                    <td>
                        <form action="g_gateentry_out.php" method="post">
                            <input type="hidden" name="eid" value="<?php echo $row['ID']; ?>">
                            <input type="submit" class="btn btn-success" value="END">
                        </form>
                    </td>

                <?php } else { ?>

                    <td>
                        <?php
                        $currentDateTime = $row['BREACK_TIME_END'];
                        $newDateTime = date('h:i A', strtotime($currentDateTime));
                        echo $newDateTime;
                        // echo "hello";
                        ?>
                    </td>

            <?php }
            } ?>
        </tr>
<?php }
} ?>