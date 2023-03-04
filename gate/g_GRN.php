<?php include("g_header.php"); ?>
<a href="g_home.php" type="button" class="btn btn-warning"><span class="Hindi">बैक</span><span class="English">Back</span></a>
</nav><br>
<?php include("g_imgCrop.php"); ?>

<script>
    $(document).ready(function() {
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
        $("#grn").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#grn").text("* You have to enter your grn number!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");
            }
        });
        $("#panme").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_name").text("* You have to enter your party name!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");
            }
        });
        $("#material").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_name").text("* You have to enter your material name!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");
            }
        });
        $("#invoice").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_invoice").text("* You have to enter your invoice number!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_invoice").text("");
            }
        });
        $("#vehicle").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_name").text("* You have to enter your Vehicle Number!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");
            }
        });
        $("#qty").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_name").text("* You have to enter your Quantity!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");
            }
        });
        $("#list").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_name").text("* You have to Select your Unite!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");
            }
        });
        $("#rst").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_name").text("* You have to enter your RST Number!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");
            }
        });
        $("#rstqty").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_name").text("* You have to enter your RST quantity!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");
            }
        });
        $("#weight").focusout(function() {
            if ($(this).val() == '') {
                $(this).css("border-color", "#FF0000");
                $('#submit').attr('disabled', true);
                $("#error_name").text("* You have to enter Weight!");
            } else {
                $(this).css("border-color", "#2eb82e");
                $('#submit').attr('disabled', false);
                $("#error_name").text("");
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
        
        // Form input type number only
        $('#rst').keyup(function(event) {
            $(this).val(function(index, value) {
                return value.replace(/\D/g, "");
            });
        });
        $('#weight').keyup(function(event) {
            $(this).val(function(index, value) {
                return value.replace(/\D/g, "");
            });
        });
        if (language == "Hindi") {
            $("#grn").attr("placeholder","GRN NO.");
            $("#pname").attr("placeholder","पार्टी का नाम");
            $("#material").attr("placeholder","मटेरियल का नाम");
            $("#invoice").attr("placeholder","इनवॉइस नंबर");
            $("#vehicle").attr("placeholder","गाड़ी नंबर");
            $("#qty").attr("placeholder","मटेरियल मात्रा");
            $("#rst").attr("placeholder","RST NO.");
            $("#weight").attr("placeholder","वजन");
        } else {
            $("#grn").attr("placeholder","GRN NO.");
            $("#pname").attr("placeholder","Name Of Party");
            $("#material").attr("placeholder","Name Of Material");
            $("#invoice").attr("placeholder","Invoice NO.");
            $("#vehicle").attr("placeholder","Vehicle NO.");
            $("#qty").attr("placeholder","Material Quantity");
            $("#rst").attr("placeholder","RST NO.");
            $("#weight").attr("placeholder","Weight");
        
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
                                </h1><br>

                                <form action="g_GRN_Insert.php" method="post" enctype="multipart/form-data">
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

                                    <div class="form-group">
                                        <input type="text" name="grn" id="grn" class="form-control" placeholder="GRN NO." required>
                                    </div><br>

                                    <div class="form-group">
                                        <input type="text" name="pname" id="pname" class="form-control" placeholder="पार्टी का नाम" required>
                                    </div><br>

                                    <div class="form-group">
                                        <input type="text" name="material" id="material" class="form-control" placeholder="मटेरियल का नाम" required>
                                    </div><br>

                                    <div class="form-group">
                                        <input type="text" name="invoice" id="invoice" class="form-control" placeholder="इनवॉइस नंबर" required>
                                    </div><br>

                                    <div class="form-group">
                                        <input type="text" name="vehicle" id="vehicle" class="form-control" placeholder="गाड़ी नंबर" required>
                                    </div><br>

                                    <div class="form-group">
                                        <input type="text" name="qty" id="qty" class="form-control" placeholder="मटेरियल मात्रा" required>
                                    </div><br>

                                    <div class="form-group">
                                        <select id="list" name="list" class="form-control" required>
                                            <option value=""><span class="Hindi">सेलेक्ट यूनिट</span><span class="English">(Select Unite)</span></option>
                                            <option value="RMT">RMT</option>
                                            <option value="MT"> MT</option>
                                        </select>
                                    </div><br>

                                    <div class="form-group">
                                        <input type="text" name="rst" id="rst" class="form-control" placeholder="RST NO." required>
                                    </div><br>

                                    <div class="form-group">
                                        <input type="text" name="weight" id="weight" class="form-control" placeholder="वजन" required>
                                    </div><br>

                                    <button type="submit" name="submit" class="btn btn-success"><span class="Hindi">सबमिट</span><span class="English">submit</span></button>

                                    <a href="g_reportTableGRN.php" type="button" class="btn btn-success"><span class="Hindi">डाटा देखें</span><span class="English">Report</span></a>

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