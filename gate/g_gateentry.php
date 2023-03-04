<?php
include("g_header.php");
include("g_dbconnect.php");
@session_start();
$name = $_SESSION["name"];
?>
<a href="g_home.php" type="button" class="btn btn-warning"><span class="Hindi">बैक</span><span class="English">Back</span></a>
</nav><br>

<!---tender--->
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">

    <!-- Modal -->
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content text-center">
        <h5><span class="Hindi">कर्मचारी</span><span class="English">Employee</span></h5>
        <div class="modal-body">

          <!--- serach open-->
          <div class="row">
            <div class="col-sm-4">
              <form action="g_gateentry_do.php" method="post" enctype="multipart/form-data">

                  <input class="form-control" name="name" placeholder="Select Name" required list="browsers1" autocomplete="off">
                  <?php
                  $sql = "SELECT * FROM emp_detail1 where LOCATION='$name' order by NAME";
                  $result = mysqli_query($con, $sql);

                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <datalist id="browsers1">
                    <option value="<?php echo $row['NAME']; ?>">
                  <?php } ?>
                </datalist>
                <br>
            </div>
            <div class="col-sm-2">
              <button type="submit" name="paid" class="btn btn-primary" style="width:100%">In</button>&nbsp;
            </div>
            </form>

            <!----->
            <div class="col-sm-4">
              <form action="g_gateentry_do.php" method="post" enctype="multipart/form-data">
                  
                  <input class="form-control" placeholder="Select Name" name="name" required list="browsers1" autocomplete="off">
                  <?php
                  $sql = "SELECT * FROM emp_detail1 where LOCATION!='$name' order by NAME";
                  $result = mysqli_query($con, $sql);

                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <datalist id="browsers1">
                    <option value="<?php echo $row['NAME']; ?>">

                  <?php } ?>
                </datalist>
                <br>
            </div>
            <div class="col-sm-2"><button type="submit1" name="paid" class="btn btn-primary" style="width:100%">In</button>
            </div>
            </form>
            <br><br>

            <div class="table-responsive" style="height: 500px; border: 1px solid #777777; ">
              <table class="table bg-white">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col"><span class="Hindi">नाम</span><span class="English">Name</span></th>
                    <th scope="col"><span class="Hindi">आने का समय</span><span class="English">Arrival time</span></th>
                    <th scope="col"><span class="Hindi">जाने का समय</span><span class="English">Time to go</span></th>
                    <th scope="col"><span class="Hindi">अवकाश</span><span class="English">Short Break</span></th>
                  </tr>
                </thead>
                <tbody id="myData">
                  <?php
                  date_default_timezone_set("Asia/Kolkata");
                  $dt = date('Y-m-d');

                  $sql1 = "SELECT * FROM g_gateentryemp where GATE_MEN='$name' and ENTRY_DATE ='$dt'";
                  $result1 = mysqli_query($con, $sql1);

                  while ($row1 = mysqli_fetch_assoc($result1)) {

                  ?>
                    <tr>
                      <td><?php echo $row1['EMP_NAME']; ?></td>

                      <td>
                        <?php
                        $currentDateTime = $row1['ENTRY_TIME'];
                        $newDateTime = date('h:i A', strtotime($currentDateTime));
                        echo $newDateTime;
                        ?>
                      </td>

                      <?php if ($row1['EXIT_TIME'] == '') { ?>

                        <td>
                          <form action="g_gateentry_out.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $row1['ID']; ?>">
                            <input type="submit" value="Out">
                          </form>
                        </td>

                        <?php
                        $id = $row1["ID"];
                        // Here it is checking whether there is time in the table or not and store value in variable.
                        $rs = mysqli_query($con, "SELECT * FROM `g_gateentrytime` WHERE REFFERAL_ID = '$id' and DATE = '$date'") or die("Quary Error1");

                        if (mysqli_num_rows($rs) == 0) { ?>

                          <td>
                            <button type="button" class="btn-info edit" data-bs-toggle="modal" data-bs-target="#viewid" id="<?php echo $row1['ID']; ?>">Start</button>
                          </td>

                          <?php } else {

                          $startTime = 0;
                          $endTime = 0;
                          while ($r = mysqli_fetch_assoc($rs)) {
                            $startTime = $r['BREACK_TIME_START'];
                            $endTime = $r['BREACK_TIME_END'];
                          }

                          if ($endTime == '') { ?>

                            <td>
                              <button type="button" class="btn-info edit" data-bs-toggle="modal" data-bs-target="#viewid" id="<?php echo $row1['ID']; ?>">View</button>
                            </td>

                          <?php } else { ?>

                            <td>
                              <button type="button" class="btn-info edit" data-bs-toggle="modal" data-bs-target="#viewid" id="<?php echo $row1['ID']; ?>">Start</button>
                            </td>

                          <?php } ?>

                        <?php } ?>

                      <?php } else { ?>
                        <td>
                          <?php
                          $currentDateTime = $row1['EXIT_TIME'];
                          $newDateTime = date('h:i A', strtotime($currentDateTime));
                          echo $newDateTime;
                          ?>
                        </td>
                      <?php } ?>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

          </div>



        </div>

      </div>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div>

<!-- This code fatch model data for another page -->
<script type="text/javascript">
  $(document).ready(function() {
    $(".edit").click(function() {
      var id = $(this).attr('id');
      // alert(id);
      if (id) {
        $.ajax({
          url: 'g_gateentryView.php',
          type: "POST",
          data: {
            'id': id
          },
          // dataType: "json",
          success: function(data) {
            $('#output').html(data);
          }
        });
      } else {
        $('#output').empty();

      }
    });
  });
</script>

<!-- Modal for view details buttons -->
<div class="modal fade" id="viewid" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View Details</h5>
        <a href="g_gateentry.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
      </div>
      <form action="g_gateentry_out.php">
        <div class="modal-body">

          <table class="table">
            <tbody id="output"></tbody>
          </table>

          <div class="modal-footer">
            <a href="g_gateentry.php" type="button" class="btn btn-secondary">Close</a>
          </div>
      </form>
    </div>
  </div>
</div>
</div>

<?php
include("g_footer.php");
?>