<?php //include("g_header.php");
include "g_dbconnect.php";
// $gname = $_REQUEST['gname'];
$id = $_REQUEST['id'];
$sql = "SELECT * FROM g_dak_details where ID ='$id' ";
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
      <th scope="row">फोटो</th>
      <td>
        <a href="<?php echo $row['IMAGE']; ?>">
          <img width="60px" height="60px" src="<?php echo $row['IMAGE']; ?>">
        </a>
      </td>
    </tr>

    <tr>
      <th scope="row">कहा से है</th>
      <td><?php echo $row["FROM"]; ?></td>
    </tr>

    <tr>
      <th scope="row">पूरा पता</th>
      <td><?php echo $row["ADDRESS"]; ?></td>
    </tr>

    <tr>
      <th scope="row">टाइप</th>
      <td><?php echo $row["TYPE"]; ?></td>
    </tr>

    <tr>
      <th scope="row">कर्मचारी का नाम</th>
      <td><?php echo $row["EMP_NAME"]; ?></td>
    </tr>

    <tr>
      <th scope="row">फ्रॉम</th>
      <td><?php echo $row["IN_OUT"]; ?></td>
    </tr>

    <tr>
      <th scope="row">गेट मैन का नाम</th>
      <td><?php echo $row["GATE_MEN"]; ?></td>
    </tr>

    <tr>
      <th scope="row">दिनांक</th>
      <td><?php echo $row["DATE"]; ?></td>
    </tr>

  </tbody>
</table>