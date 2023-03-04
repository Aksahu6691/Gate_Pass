<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gete Pass</title>

    <!-- Bootstrap CDN link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Jquery CDN link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Font Icons -->
    <script src="https://kit.fontawesome.com/c4d489c288.js" crossorigin="anonymous"></script>

    <!-- this is image crop files -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
    <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script>

    <!-- Data Table link-->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel=" stylesheet" />

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <?php @session_start();
    if (!isset($_SESSION["name"])) {
        header("location:index.php");
        die("session expired");
    } ?>

    <style>
        a {
            text-decoration: none;
        }

        nav,
        nav a {
            background-color: #9D9D9D;
            color: white;
        }

        body,
        .jumbotron {
            background-color: #3BACB6;
        }
    </style>
    <!-- Start Coding for navigation bar -->
    <nav class="navbar navbar-dark">
        <?php //@session_start();

        if (isset($_SESSION["name"])) {

            $b = $_SESSION["name"];

            echo '<h4><a href="g_home.php"> GATE PASS </a></h4>';

            echo ("<div class='fs-4'> Welcome $b </div>");
            echo ('<a href="g_logout.php" type="button" class="btn btn-outline-danger">Logout</a>');
            // echo ('<button type="button" onclick="btn()" class="btn btn-warning">बैक</button>');
        } else {
            echo '<h4><a href="#"> Polybond </a></h4>';
        } ?>
        <!-- End of Coding for navigation bar -->
        <script>
            var language = "English";
        </script>
        <?php
        if (!empty($_REQUEST["language"])) {
            $_SESSION["language"] = $_REQUEST["language"];
        }
        if (!empty($_SESSION["language"])) {
            if ($_SESSION["language"] == "Hindi") { ?>
                <script>
                    language = "Hindi";
                </script>
                <a href="?language=English" type="button" class="btn btn-success">भाषा बदलें</a>
            <?php } else { ?>
                <a href="?language=Hindi" type="button" id="change" class="btn btn-success">Change Language</a>
            <?php }
        } else { ?>
            <a href="?language=Hindi" type="button" id="change" class="btn btn-success">Change Language</a>
        <?php }
        ?>

        <script>
            $(document).ready(function(e) {
                // alert(language);
                if (language == "Hindi") {
                    $(".Hindi").show();
                    $(".English").hide();
                } else {
                    $(".Hindi").hide();
                    $(".English").show();
                }
            })
        </script>