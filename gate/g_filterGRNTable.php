<?php
include("g_dbconnect.php");
if (isset($_REQUEST["date1"]) && isset($_REQUEST["date2"])) {
    $a = $_REQUEST['date1'];
    $b = $_REQUEST['date2'];
    $gname = $_REQUEST['gname'];
    
    // echo "Date From: " . $a . "&nbsp; To &nbsp;" . $b;
    // echo "<br><br>";

    $sql1 = "SELECT * FROM g_grn where GUARD = '$gname' AND DATE_TIME BETWEEN '$a' and  '$b' ORDER BY `DATE_TIME` DESC ";
} else {
    $gname = $_REQUEST['gname'];
    $sql1 = "SELECT * FROM g_grn where GUARD = '$gname' order by DATE_TIME DESC";
}
$i = 1;
$result = mysqli_query($con, $sql1);

while ($row = mysqli_fetch_assoc($result)) {

    echo '<tr>';

    echo '<td>';
    echo $row['PNAME'];
    echo '</td>';

    echo '<td>';
    if($row['DATE_TIME'] == "0000-00-00 00:00:00"){
        echo "no data available";
    } else {
        $currentDateTime = $row['DATE_TIME'];
        $newDateTime = date('Y/m/d | h:i A', strtotime($currentDateTime));
        echo $newDateTime;
    }
    echo '</td>';
?>

    <td>
        <!--<button type="button" class="view btn btn-info btn-sm" data-toggle="modal" data-target="#modalData" onclick="show('<?php echo $row['ID']; ?>')"> View</button>-->
        <button type="button" class="view btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalData" onclick="show('<?php echo $row['ID']; ?>')">View</button>
    </td>

<?php
    echo '</tr>';
} ?>

<script>
function show(id){
    // alert(id);
    $.post("g_viewGRN.php", {
        id: id
    }, function(result) {
        $("#info").html(result);
    });
}
</script>