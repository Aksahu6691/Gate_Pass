<?php //include("g_header.php");
include "g_dbconnect.php";
// $gname = $_REQUEST['gname'];
$id = $_REQUEST['id'];
$sql = "SELECT * FROM g_visiter_details where ID ='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>
<table class="table bg-white">
    <thead class="thead-dark">
        <tr>
            <!-- <h3>विजिटर का डिटेल्स</h3> -->
            <th scope="col">नाम</th>
            <th scope="col">वैल्यू</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <th scope="row">नाम</th>
            <td><?php echo $row["NAME"]; ?></td>
        </tr>

        <tr>
            <th scope="row">फोन नम्बर</th>
            <td><?php echo $row["PHONE"]; ?></td>
        </tr>

        <tr>
            <th scope="row">उद्देश्य</th>
            <td><?php echo $row["PURPOSE"]; ?></td>
        </tr>

        <tr>
            <th scope="row">कर्मचारी लिस्ट</th>
            <td><?php echo $row["EMPLIST"]; ?></td>
        </tr>

        <tr>
            <th scope="row">सिटिंग एरिया</th>
            <td><?php echo $row["WAITING"]; ?></td>
        </tr>

        <tr>
            <th scope="row">फोटो</th>
            <td>
                <a href="<?php echo $row['IMAGE']; ?>">
                    <img width="60px" height="60px" src="<?php echo $row['IMAGE']; ?>">
                </a>
            </td>
        </tr>

        <tr>
            <th scope="row">दिनांक</th>
            <td><?php echo $row["DATE"]; ?></td>
        </tr>

        <tr>
            <th scope="row">गेट मैन का नाम</th>
            <td><?php echo $row["GATE_MEN"]; ?></td>
        </tr>

        <tr>
            <th scope="row">आने का टाइाम</th>
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
            <th scope="row">जाने का टााम</th>
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

    </tbody>
</table>