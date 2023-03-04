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
                <h5><span class="Hindi">विजिटर</span><span class="English">Visitor</span></h5>
                <div class="modal-body">

                    <!--- serach open-->
                    <div class="row">
                        <div class="col-sm-8">
                            <form action="g_VisiterUpdateTime.php" method="post" enctype="multipart/form-data">

                                <select class="form-control" name="name" required="">
                                    <option value="">विजिटर का नाम</option>
                                    <?php
                                    $dt = date('Y-m-d');
                                    $dt1 = date("h:i:sa");
                                    $sql = "SELECT * FROM g_visiter_details where GATE_MEN = '$name' and DATE ='$dt' order by NAME";
                                    $result = mysqli_query($con, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                        <option class="checkout" value="<?php echo $row['NAME']; ?>"><?php echo $row['NAME']; ?></option>

                                    <?php } ?>
                                </select>&nbsp;
                        </div>
                        <div class="col-sm-4">
                            <button type="submit1" name="paid" class="btn btn-primary" style="width:100%">In</button>
                        </div>
                        </form>
                        <br><br>

                        <div class="table-responsive" style="height: 500px; border: 1px solid #777777; ">
                            <table class="table bg-white">
                                <thead class="thead-dark">
                                    <tr>

                                        <th scope="col"><span class="Hindi">नाम</span><span class="English">Name</span></th>
                                        <th scope="col"><span class="Hindi">आने का समय</span><span class="English">In time</span></th>
                                        <th scope="col"><span class="Hindi">जाने का समय</span><span class="English">Out time</span></th>
                                    </tr>
                                </thead>
                                <tbody id="myData">
                                    <?php

                                    $result1 = mysqli_query($con, "SELECT * FROM g_visiter_details where GATE_MEN ='$name' and DATE ='$dt' and ENTRY_TIME");
                                    // $r = mysqli_fetch_array($result1)

                                    while ($row1 = mysqli_fetch_assoc($result1)) {

                                    ?>
                                        <tr>
                                            <td><?php echo $row1['NAME']; ?></td>

                                            <td>
                                                <?php
                                                $currentDateTime = $row1['ENTRY_TIME'];
                                                $newDateTime = date('h:i A', strtotime($currentDateTime));
                                                echo $newDateTime;
                                                ?>
                                            </td>

                                            <?php if ($row1['EXIT_TIME'] == 0) { ?>

                                                <td>
                                                    <form action="g_VisiterUpdateTime.php" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $row1['ID']; ?>">
                                                        <input type="submit" value="Out">
                                                    </form>
                                                </td>

                                            <?php } else { ?>
                                                <td>
                                                    <?php
                                                    $currentDateTime = $row1['EXIT_TIME'];
                                                    $newDateTime = date('h:i A', strtotime($currentDateTime));
                                                    echo $newDateTime;
                                                    // echo "hello";
                                                    ?>
                                                </td>
                                            <?php } ?>

                                        </tr>
                                    <?php }?>
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