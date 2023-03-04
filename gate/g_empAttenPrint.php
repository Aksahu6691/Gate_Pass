<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gete Office</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel=" stylesheet" />
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" /> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/c4d489c288.js" crossorigin="anonymous"></script>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <?php @session_start();
    if (!isset($_SESSION["name"])) {
        header("location:index.php");
        die("session expired");
    } ?>
    <!-- <a href="g_empAttenTable.php" type="button" class="btn btn-warning">बैक</a> -->
    <script>
        function tPrint() {
            window.print();
        }
        tPrint();
    </script>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        #myTable {
            box-sizing: border-box;
        }

        @media print {
            body {
                size: landscape;
            }
        }
    </style>
    <div class="container">
        <h4>Employee Attendece Table</h4>
    </div>
    <table id="myTable" class="table bg-white">
        <thead class="thead-dark">
            <tr>
                <th>नाम</th>
                <?php
                // $day = date("d F Y");
                if (isset($_REQUEST["month"])) {
                    $monthNo = $_REQUEST["month"];
                    $yearNo = $_REQUEST["year"];
                    // echo "hii";
                } else {
                    $monthNo = date("m");
                    $yearNo = date("Y");
                }
                // echo "Month Number:- " . date("$monthNo - Y");
                // echo "Month Number:- " . $monthNo . "-" . $yearNo;

                if ($monthNo == 01 && $yearNo == date("Y")) {
                    $currentMonthNo = 31;
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else
                        if ($monthNo == 02 && $yearNo == date("Y")) {
                    $currentMonthNo = 28;
                    for ($i = 1; $i <= 28; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else
                        if ($monthNo == 03 && $yearNo == date("Y")) {
                    $currentMonthNo = 31;
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else
                        if ($monthNo == 04 && $yearNo == date("Y")) {
                    $currentMonthNo = 30;
                    for ($i = 1; $i <= 30; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else
                        if ($monthNo == 05 && $yearNo == date("Y")) {
                    $currentMonthNo = 31;
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else
                        if ($monthNo == 06 && $yearNo == date("Y")) {
                    $currentMonthNo = 30;
                    for ($i = 1; $i <= 30; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else
                        if ($monthNo == 07 && $yearNo == date("Y")) {
                    $currentMonthNo = 31;
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else
                        if ($monthNo == '08' && $yearNo == date("Y")) {
                    $currentMonthNo = 31;
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else
                        if ($monthNo == '09' && $yearNo == date("Y")) {
                    $currentMonthNo = 30;
                    for ($i = 1; $i <= 30; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else
                        if ($monthNo == 10 && $yearNo == date("Y")) {
                    $currentMonthNo = 31;
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else
                        if ($monthNo == 11 && $yearNo == date("Y")) {
                    $currentMonthNo = 30;
                    for ($i = 1; $i <= 30; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else
                        if ($monthNo == 12 && $yearNo == date("Y")) {
                    $currentMonthNo = 31;
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<th>" . $i . "</th>";
                    }
                } else {
                    echo "hiii";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            include "g_dbconnect.php";
            $name = $_SESSION["name"];
            $sql1 = "SELECT * FROM emp_detail1";

            $total = 0;
            $result1 = mysqli_query($con, $sql1);
            // $rc = mysqli_num_rows($result1);
            while ($row1 = mysqli_fetch_assoc($result1)) { ?>

                <tr>
                    <td>
                        <?php echo $row1['NAME'];
                        $name = $row1["NAME"];
                        ?>
                    </td>
                    <?php
                    for ($i = 1; $i <= $currentMonthNo; $i++) {

                        $result2 = mysqli_query($con, "SELECT * FROM `g_gateentryemp` WHERE `EMP_NAME` = '$name'");
                        // $row2 = mysqli_fetch_array($result2);
                        $sn = 0;
                        while ($row2 = mysqli_fetch_assoc($result2)) {

                            if ($row2['ENTRY_DATE'] == date("Y-$monthNo-$i")) {
                                echo '<td>';
                                $currentDateInTime = $row2['ENTRY_TIME'];
                                $newInTime = date('H:i', strtotime($currentDateInTime));
                                echo $newInTime;
                                echo "<br>";
                                $currentDateOutTime = $row2['EXIT_TIME'];
                                $newOutTime = date('H:i', strtotime($currentDateOutTime));
                                echo $newOutTime;
                                echo '</td>';
                                $sn = $sn + 1;
                            }
                        }
                        if ($sn == 0) {
                            echo '<td>';
                            echo 'A';
                            echo '</td>';
                        }
                    } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>