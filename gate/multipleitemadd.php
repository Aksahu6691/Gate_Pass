<?php
include("g_dbconnect.php");
if (isset($_POST["show"])) {



  $file = $_FILES['file']['tmp_name'];
  $handle = fopen($file, "r");
  $c = 0;

  while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {

    $value1 = $filesop[0];

    $sql = "INSERT INTO `master_purchase_ledger`(`m_purchase_ledger_name`) VALUES ('$value1')";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_execute($stmt);
    $c = $c + 1;
  }

  if ($sql) {
    echo "<div id='sucess'>sucess</div>";
  } else {
    echo "<div id='false'>Sorry! Unable to impo.</div>";
  }
}
///////////////////////////


?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  <style>
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .required {
      color: red;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    #sucess {
      height: 40px;
      background-color: #FFD372;
      text-align: center;
      font-weight: bold;
      font-size: larger;
      padding-top: 10px;
    }

    #false {
      height: 40px;
      text-align: center;
      font-weight: bold;
      background-color: #FF1E1E;
      font-size: larger;
      padding-top: 10px;

    }
  </style>
</head>

<body>
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <div class="modal-content">
        <div class="container">
          <div>
            <h4 class="modal-title">Item Name File Upload</h4>
          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data" method="post" role="form">
              <div class="form-group">
                <label for="exampleInputFile">Select CSV File</label>
                <input type="file" name="file" id="file" size="150" accept=".csv" / required="">
                <p class="help-block">Only CSV File Import.</p>
              </div>
              <div>
                <button type="submit" name="show" value="submit" class="btn btn-primary" style="width:20%">Upload</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4"></div>
  </div>




</body>

<script>
  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

</body>

</html>