<?php include("g_header.php") ?>
<a href="g_home.php" type="button" class="btn btn-warning">बैक</a>
</nav><br>

<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }

    .modal-body {
        background-color: #FFE3A9;
    }
</style>

<div class="container">
    <div class="modal-body">
        <div class="container">
            <form action="g_empAttenDate.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <input class="form-control" id="inputDate" name="month" type="month" placeholder="Enter Date" aria-label="default input example">
                    </div>
                    <div class="col-4 d-grid">
                        <button class="btn btn-success btn-block" type="submit" name="submit">सर्च</button>
                    </div>
                    <!--<div class="col input-group">-->
                    <!--    <input class="form-control" type="search" id="searchName" name="search" placeholder="Search">-->
                    <!--</div>-->
                    <!--<div class="col-2">-->
                    <!--    <a href="g_empAttenPrint.php"><button type="button" id="downloadTable" class="btn btn-danger">प्रिंट टेबल</button></a>-->
                    <!--</div>-->
                </div>
            </form>
        </div><br>
         <!--<div class="table-responsive" style="height: 500px;"> -->
            <table id="myTable" class="table bg-white">
                <thead class="thead-dark">
                    <tr>
                        <th><span class="Hindi">नाम</span><span class="English">Name</span></th>
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
                        echo "<center>Month Number:- " . $monthNo . "-" . $yearNo."</center>";

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
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("g_dbconnect.php");
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
    <!--    </div>-->
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#search").click(function() {
            // alert($("#heatdate1").val());
            $.post("g_empAttenDate.php", {
                    date: $("#inputDate").val()
                },
                function(data) {
                    $("#heatTableLoad").html(data);
                });
        });
        
        // filter table containt
        // $("#searchName").on("keyup", function() {
        //     var value = $(this).val().toLowerCase();
        //     $("#myTable tbody tr").filter(function() {
        //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //     });
        // });
        
        $('#myTable').DataTable({
            dom: 'lBfrtip',
            // paging: false,
            // searching: false,
            // order:[[1,"desc"]],
            scrollY: '50vh',
            scrollX: true,
            retrieve: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'lengthMenu'
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
        
        // Shorting Table containt
        // $('th').click(function(){
        //     var table = $(this).parents('table').eq(0)
        //     var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        //     this.asc = !this.asc
        //     if (!this.asc){rows = rows.reverse()}
        //     for (var i = 0; i < rows.length; i++){table.append(rows[i])}
        // });
        // function comparer(index) {
        //     return function(a, b) {
        //         var valA = getCellValue(a, index), valB = getCellValue(b, index)
        //         return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
        //     }
        // }
        // function getCellValue(row, index){ return $(row).children('td').eq(index).text() }

        // table scroll style code
        // $('#myTable').DataTable({
        //     "scrollY": "50vh",
        //     "scrollCollapse": true,
        // });
        // $('.dataTables_length').addClass('bs-select');
    });
</script>
<?php include("g_footer.php") ?>