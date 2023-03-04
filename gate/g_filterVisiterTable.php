<?php
include("g_dbconnect.php");
if (isset($_REQUEST["date1"]) && isset($_REQUEST["date2"])) {
    $a = $_REQUEST['date1'];
    $b = $_REQUEST['date2'];
    $gname = $_REQUEST['gname'];
    
    // echo "Date From: " . $a . "&nbsp; To &nbsp;" . $b;
    // echo "<br><br>";

    $sql1 = "SELECT * FROM `g_visiter_details` where `GATE_MEN` = '$gname' AND `DATE` BETWEEN '$a' and  '$b' ORDER BY `DATE` DESC ";
} else {
    $gname = $_REQUEST['gname'];
    $sql1 = "SELECT * FROM `g_visiter_details` where `GATE_MEN` = '$gname' order by `DATE` DESC";
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

<script>
function show(id){
    // alert(id);
    $.post("g_viewVisiter.php", {
        id: id
    }, function(result) {
        $("#info").html(result);
    });
}
</script>