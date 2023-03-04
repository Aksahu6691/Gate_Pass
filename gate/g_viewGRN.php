<?php //include("g_header.php");
include "g_dbconnect.php";
// $gname = $_REQUEST['gname'];
$id = $_REQUEST['id'];
$sql = "SELECT * FROM g_grn where ID ='$id'";
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
      <th scope="row">GRN NO.</th>
      <td><?php echo $row["GRN"]; ?></td>
    </tr>

    <tr>
      <th scope="row">पार्टी का नाम</th>
      <td><?php echo $row["PNAME"]; ?></td>
    </tr>

    <tr>
      <th scope="row">मटेरियल का नाम</th>
      <td><?php echo $row["MATERIAL"]; ?></td>
    </tr>

    <tr>
      <th scope="row">इनवॉइस नंबर</th>
      <td><?php echo $row["INVOICE"]; ?></td>
    </tr>

    <tr>
      <th scope="row">गाड़ी नंबर</th>
      <td><?php echo $row["VEHICLE"]; ?></td>
    </tr>

    <tr>
      <th scope="row">मात्रा</th>
      <td><?php echo $row["QTY"]; ?></td>
    </tr>

    <tr>
      <th scope="row">यूनिट</th>
      <td><?php echo $row["LIST"]; ?></td>
    </tr>

    <tr>
      <th scope="row">RST NO.</th>
      <td><?php echo $row["RST"]; ?></td>
    </tr>

    <tr>
      <th scope="row">RST वजन</th>
      <td><?php echo $row["WEIGHT"]; ?></td>
    </tr>

    <tr>
      <th scope="row">गेट मैन का नाम</th>
      <td><?php echo $row["GUARD"]; ?></td>
    </tr>

    <tr>
      <th scope="row">दिनांक और समय</th>
      <td>
        <?php
        $currentDateTime = $row['DATE_TIME'];
        $newDateTime = date('h:i A | d/m/Y', strtotime($currentDateTime));
        echo $newDateTime;
        ?>
      </td>
    </tr>

  </tbody>
</table>