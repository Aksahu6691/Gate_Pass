<?php include("g_header.php");
@session_start();
$name = $_SESSION["name"];
?>
<a href="g_report.php" type="button" class="btn btn-warning">बैक</a>
</nav><br>

<style>
    .modal-body {
        background-color: #FFE3A9;
    }
</style>
<center>
    <font color="red">Visiter Report Detail</font>
</center><br>
<div class="container">
    <div class="modal-body">
        <form action="g_reportTableVisiter.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    
                    <div class="col">
                        <div class="input-group">
                            <!--<span class="input-group-text">From</span>-->
                            <input type="date" class="form-control" id="date1" name="date1">
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="input-group">
                            <!--<span class="input-group-text">To</span>-->
                            <input type="date" class="form-control" id="date2" name="date2">
                        </div>
                    </div>
                    
                    <!--<div class="col input-group">-->
                    <!--    <input class="form-control" type="search" id="searchName" name="search">-->
                    <!--</div>-->
                    
                    <div class="col-2">
                        <button type="submit" class="btn btn-success" id="search">सर्च</button>
                    </div>
                    
                </div>
            </div>
        </form>
        <br>
        <div class="col">
            <!--<div class="col" style="overflow:auto; max-height: 400px;">-->
            <table id="myTable" class="table table-striped table-bordered table-sm bg-white">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"><span class="Hindi">नाम</span><span class="English">Name</span></th>
                        <th scope="col"><span class="Hindi">दिनांक</span><span class="English">Date</span></th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody id="filterTb">
                    <?php
                    include("g_dbconnect.php");
                    if (isset($_REQUEST["date1"]) && isset($_REQUEST["date2"])) {
                        $a = $_REQUEST['date1'];
                        $b = $_REQUEST['date2'];
                        // $gname = $_REQUEST['gname'];

                        echo "<div class='text-center'>Date From: " . $a . "&nbsp; To &nbsp;" . $b;
                        echo "</div><br><br>";
                    
                        $sql1 = "SELECT * FROM `g_visiter_details` where `GATE_MEN` = '$name' AND `DATE` BETWEEN '$a' and  '$b' ORDER BY `DATE` DESC ";
                    } else {
                        // $gname = $_REQUEST['gname'];
                        $sql1 = "SELECT * FROM `g_visiter_details` where `GATE_MEN` = '$name' order by `DATE` DESC";
                    }
                    $i = 1;
                    $result1 = mysqli_query($con, $sql1);

                    while ($row1 = mysqli_fetch_assoc($result1)) {
                    
                        echo '<tr>';
                    
                        echo '<td>';
                        echo $row1['NAME'];
                        echo '</td>';
                    
                        echo '<td>';
                        echo $row1['DATE'];
                        echo '</td>';
                    
                    ?>
                        <td>
                            <button type="button" class="view btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalData" onclick="show('<?php echo $row1['ID']; ?>')">View</button>
                        </td>
                    <?php
                        echo '</tr>';
                    } ?>
                </tbody>
            </table>
            <!--</div>-->
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="info"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
            </div>
        </div>
    </div>
</div>
<span id="gname" class="d-none"><?php echo $name; ?></span>
<script>
    function show(id){
        // alert(id);
        $.post("g_viewVisiter.php", {
            id: id
        }, function(result) {
            $("#info").html(result);
        });
    }
    $(document).ready(function() {
        
        $('#myTable').DataTable({
            dom: 'lBfrtip',
            // paging: false,
            // searching: false,
            order:[[1,"desc"]],
            retrieve: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'lengthMenu'
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
        
        // filter table containt
        // $("#searchName").on("keyup", function() {
        //     var value = $(this).val().toLowerCase();
        //     $("#myTable tbody tr").filter(function() {
        //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //     });
        // });
        
        // // Shorting Table containt
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
        
        // // load table
        // function load(){
        //     var gname = $("#gname").html();
        //     $.post("g_filterVisiterTable.php", {
        //         gname: gname
        //     }, function(result) {
        //         $("#filterTb").html(result);
        //     });
        // }
        // load();
        
        // $("#search").click(function() {
        //     var date1 = $("#date1").val();
        //     var date2 = $("#date2").val();
        //     var gname = $("#gname").html();
        //     if (date1 && date2) {
        //         $.post("g_filterVisiterTable.php", {
        //             date1: date1,
        //             date2: date2,
        //             gname: gname
        //         }, function(result) {
        //             $("#filterTb").html(result);
        //         });
        //         // alert(date1);
        //         // alert(date2);
        //         // alert(gname);
        //     }
        //     else {
        //         alert("Please fill box");
        //     }
        // });
    });
</script>
<?php include("g_footer.php"); ?>