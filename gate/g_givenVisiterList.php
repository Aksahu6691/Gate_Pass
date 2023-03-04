<?php @session_start();
include("g_header.php"); ?>
<a href="g_home.php" type="button" class="btn btn-warning">बैक</a>
</nav><br>

<div class="container"><br>
    <section class="vh-90 gradient-custom">
        <!--<div class="container py-3 h-100">-->
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="">
                    <div class="card bg-info text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <H4 class="bg-primary"><span class="Hindi">आने वाले विसिटर का लिस्ट</span><span class="English">List of Incoming Visitors</span></H4><br>
                                <table class="table bg-white">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col"><span class="Hindi">कर्मचारी नाम</span><span class="English">Employee Name</span></th>
                                            <th scope="col"><span class="Hindi">विसिटर नाम</span><span class="English">Visitor Name</span></th>
                                            <th scope="col"><span class="Hindi">आने का समय</span><span class="English">In time</th>
                                            <th scope="col"><span class="Hindi">दिनांक</span><span class="English">Date</span></th>
                                            <th scope="col"><span class="Hindi">चेक बॉक्स</span><span class="English">Chack Box</span></th>
                                        </tr>
                                    </thead>
                                    <tbody id="myData">
                                        <?php
                                        include("g_dbconnect.php");
                                        $name = $_SESSION['name'];

                                        $sql1 = "SELECT * FROM g_createvisiter WHERE GETMANNAME = '$name' ";
                                        $result1 = mysqli_query($con, $sql1);

                                        while ($row1 = mysqli_fetch_assoc($result1)) {

                                            if ($row1["OUTIME"] == 0) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row1['EMPNAME']; ?></td>
                                                    <td><?php echo $row1['VISITER_NAME']; ?></td>
                                                    <td>
                                                        <?php
                                                        $currentDateTime = $row1['INTIME'];
                                                        $newDateTime = date('h:i A', strtotime($currentDateTime));
                                                        echo $newDateTime;
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row1['GETIN']; ?></td>

                                                    <td>
                                                        <form action="g_givenVisiterUpdate.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $row1['ID']; ?>">
                                                            <input type="submit" value="आउट">
                                                        </form>
                                                    </td>

                                            <?php
                                            }
                                        } ?>
                                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--</div>-->
    </section>
</div>

<?php include("g_footer.php"); ?>