<?php //include("g_header.php");
include "g_dbconnect.php";
// $gname = $_REQUEST['gname'];
$id = $_REQUEST['id'];
$sql = "SELECT * FROM g_gateentryemp where ID ='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>

<div class="row">
  <div class="col-lg-6">

    <table class="table bg-white">
      <thead class="thead-dark">
        <tr>
          <th scope="col">नाम</th>
          <th scope="col">वैल्यू</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <th scope="row">एम्प्लोयी का नाम</th>
          <td><?php echo $row["EMP_NAME"]; ?></td>
        </tr>

        <tr>
          <th scope="row">दिनांक</th>
          <td><?php echo $row["ENTRY_DATE"]; ?></td>
        </tr>

        <tr>
          <th scope="row">आने का टाइम</th>
          <td>
            <?php
            if($row['ENTRY_TIME'] != ''){
                $currentDateTime = $row['ENTRY_TIME'];
                $newDateTime = date('h:i A', strtotime($currentDateTime));
                echo $newDateTime;
            } else{
                echo "no data available";
            }
            ?>
          </td>
        </tr>

        <tr>
          <th scope="row">जाने का टाइम</th>
          <td>
            <?php
            if($row['EXIT_TIME'] != ''){
                $currentDateTime = $row['EXIT_TIME'];
                $newDateTime = date('h:i A', strtotime($currentDateTime));
                echo $newDateTime;
            } else{
                echo "no data available";
            }
            ?>
          </td>
        </tr>

        <tr>
          <th scope="row">गेट मैन का नाम</th>
          <td><?php echo $row["GATE_MEN"]; ?></td>
        </tr>

      </tbody>
    </table>
  </div>
  <div class="col-lg-6">

    <table class="table bg-white">
      <thead class="thead-dark">
        <tr>
          <th scope="col">अवकाश चालू</th>
          <th scope="col">अवकाश बंद</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result1 = mysqli_query($con, "SELECT * FROM `g_gateentrytime` WHERE REFFERAL_ID = '$id'") or die("Quary Error2");

        if (mysqli_num_rows($result1)) {

          while ($r = mysqli_fetch_assoc($result1)) {
            echo "<tr>";
            echo "<td>";
            $currentDateTime = $r['BREACK_TIME_START'];
            $newDateTime = date('h:i A', strtotime($currentDateTime));
            echo $newDateTime;
            echo "</td>";

            echo "<td>";
            $currentDateTime = $r['BREACK_TIME_END'];
            $newDateTime = date('h:i A', strtotime($currentDateTime));
            echo $newDateTime;
            echo "</td>";
            echo "</tr>";
          }
        } ?>
      </tbody>
    </table>
  </div>
</div>