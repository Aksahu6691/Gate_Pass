<?php include("g_header.php"); ?>
<a href="g_home.php" type="button" class="btn btn-warning"><span class="Hindi">बैक</span><span class="English">Back</span></a>
</nav><br>
<?php include("g_imgCrop.php"); ?>

<script>
    $(document).ready(function() {
        $("#name").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_name").text("* You have to enter your first name!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");
            }
        });
        $("#phone").focusout(function() {
            $pho = $("#phone").val();
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_phone").text("* You have to enter your Phone Number!");
            } else if ($pho.length != 10) {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_phone").text("* Lenght of Phone Number Should Be Ten");
            } else if (!$.isNumeric($pho)) {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_phone").text("* Phone Number Should Be Numeric");
            } else {
                $(this).css({
                    "border-color": "#2eb82e"
                });
                $('#submit').attr('disabled', false);
                $("#error_phone").text("");
            }
        });
        $("#purpose").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_dob").text("* You have to enter your Address!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_address").text("");
            }
        });
        $("#list").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_dob").text("* You have to enter your Address!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_address").text("");
            }
        });
        $("#file").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_formFile").text("* You have to choose your file!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_File").text("");
            }
        });
    });

    // image size chacking
    $(document).ready(function() {
        maxFileSize = 5 * 1024 * 1024; // 5MB

        $("#photoInput").change(function() {
            fileSize = this.files[0].size;

            if (fileSize > maxFileSize) {
                this.setCustomValidity("You can upload only files under 5MB");
                this.reportValidity();
            } else {
                this.setCustomValidity("");
            }
        });
        if (language == "Hindi") {
            $("#name").attr("placeholder","नाम");
            $("#phone").attr("placeholder","फ़ोन नंबर");
            $("#purpose").attr("placeholder","यहाँ आने का कारण");
            $("#list").attr("placeholder","कर्मचारी लिस्ट");
        } else {
            $("#name").attr("placeholder","Name");
            $("#phone").attr("placeholder","Phone Number");
            $("#purpose").attr("placeholder","Reason for coming here");
            $("#list").attr("placeholder","Employee List");
        }
    });
</script>

<div class="container"><br>
    <section class="vh-90 gradient-custom">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h1 class="text-white bg-dark text-center">
                                <span class="Hindi">विसिटर रजिस्ट्रेशन</span><span class="English">Visitor</span>
                                </h1>

                                <form action="g_VisiterInsert.php" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <input type="text" name="NAME" id="name" class="form-control" placeholder="नाम" required>
                                    </div><br>

                                    <div>
                                        <input type="number" id="phone" name="PHONE" class="form-control" placeholder="फ़ोन नंबर" required>
                                    </div><br>

                                    <div class="form-group">
                                        <textarea name="PURPOSE" class="form-control" rows="2" id="purpose" placeholder="यहाँ आने का कारण" required></textarea>
                                    </div><br>

                                    <div class="form-group">
                                            <input class="form-control" id="list" name="EMPLIST" required list="browsers" autocomplete="off" placeholder="कर्मचारी लिस्ट">

                                            <?php
                                            include "g_dbconnect.php";
                                            $sql1 = "SELECT * FROM emp_detail1";
                                            $result1 = mysqli_query($con, $sql1);

                                            while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                                        <datalist id="browsers">
                                            <option value="<?php echo $row1['NAME']; ?>">
                                            <?php } ?>
                                        </datalist>
                                    </div><br>

                                    <div class="form-group">
                                        <select id="list" name="list" class="form-control" required>
                                            <option value="">Where will you sit</option>
                                            <option value="waiting">Waiting room</option>
                                            <option value="hall">Hall</option>
                                            <option value="office">Meeting room</option>
                                        </select>
                                    </div><br>

                                    <!-- <div>
                                        <label for="file">फोटो</label>
                                        <input type="file" name="IMAGE" id="photoInput" class="form-control" onchange="checkPhoto(this)">
                                    </div><br> -->
                                    <div>
                                        <img src="upload/user.png" id="uploaded_image" class="img-responsive rounded-circle" width="60px" />

                                        <label for="upload_image">
                                            <input type="file" name="image" class="form-control image" id="upload_image">

                                            <input type="text" name="imageName" id="imgName" style="display: none;">

                                        </label>
                                    </div><br>

                                    <button type="submit" name="submit" class="btn btn-success"><span class="Hindi">सबमिट</span><span class="English">submit</span></button>

                                    <a href="g_reportTableVisiter.php" type="button" class="btn btn-success"><span class="Hindi">डाटा देखें</span><span class="English">View Data</span></a>

                                    <a href="g_home.php" type="button" class="btn btn-warning"><span class="Hindi">बैक</span><span class="English">Back</span></a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include("g_footer.php"); ?>