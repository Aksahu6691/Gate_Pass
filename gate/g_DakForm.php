<?php include("g_header.php"); ?>
<a href="g_home.php" type="button" class="btn btn-warning">बैक</a>
</nav><br>
<?php include("g_imgCrop.php"); ?>

<div class="container"><br>
    <section class="vh-90 gradient-custom">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h1 class="text-white bg-dark text-center">
                                   <span class="Hindi"> डाक रजिस्ट्रेशन</span> <span class="English">DOC Registration</span>
                                </h1>

                                <form action="g_DakInsert.php" method="post" enctype="multipart/form-data">

                                    <div class="form-group">

                                        <div class="form-group">
                                            <select id="list" name="list" class="form-control">
                                                <option value="">सेलेक्ट डाक टाइप</option>
                                                <option value="Visiter">डाक जा रहा है</option>
                                                <option value="Employee">डाक आ रहा है</option>
                                            </select>
                                        </div><br>

                                        <!-- <div>
                                            <label for="file">फोटो</label>
                                            <input type="file" id="upload_image" name="image" class="form-control image" required>
                                        </div><br> -->

                                        <div>
                                            <img src="" id="uploaded_image" class="img-responsive rounded-circle" width="60px" />

                                            <label for="upload_image">
                                                <input type="file" name="image" class="form-control image" id="upload_image">

                                                <input type="text" name="imageName" id="imgName" style="display: none;">

                                            </label>
                                        </div><br>

                                        <div>
                                            <input type="text" name="FROM" id="from" class="form-control" placeholder="कहा से है" required>
                                        </div><br>

                                        <div class="form-group">
                                            <textarea name="ADDRESS" class="form-control" rows="2" id="address" placeholder="पूरा पता" required></textarea>
                                        </div><br>

                                        <div>
                                            <select id="list" class="form-control" aria-label="Default select example" name="LIST" required>
                                                <option value="">डॉक्यूमेंट का टाइप</option>
                                                <option value="pdf">pdf</option>
                                                <option value="image">image</option>
                                                <option value="docment">docment</option>
                                                <option value="other">other</option>
                                            </select>
                                        </div><br>

                                        <div>
                                            <input type="text" name="EMP_NAME" id="empname" class="form-control" placeholder="कर्मचारी नाम" required>
                                        </div><br>

                                        <input type="submit" name="submit" value="सेव" class="btn btn-success">

                                        <a href="g_reportTableDak.php" type="button" class="btn btn-success">डाटा देखें</a>

                                        <a href="g_home.php" type="button" class="btn btn-warning">बैक</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("g_footer.php"); ?>