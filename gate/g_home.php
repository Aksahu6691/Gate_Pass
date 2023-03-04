<?php @session_start();
include("g_header.php"); ?>
<a href="g_home.php" type="button" class="btn btn-warning"><span class="Hindi">बैक</span><span class="English">Back</span></a>
</nav><br>

<?php date_default_timezone_set('Asia/Kolkata'); ?>
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container" style="text-align: center; font-size:24px;">
            <div onclick="time()" id="time"><?php echo date('h:i:s A l F d Y'); ?></div>
            <p class="lead"></p>
        </div>
    </div>
</div>

<script>
    let a;
    let date;
    let time;
    const option = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    setInterval(() => {
        a = new Date();
        time = a.getHours() + ':' + a.getMinutes() + ':' + a.getSeconds();
        date = a.toLocaleDateString(undefined, option);
        document.getElementById('time').innerHTML = time + "&nbsp;&nbsp;" + date;

    }, 1000);

    function show() {
        alert("ये अभी कम नहीं कर रहा है");
    }

    // $(document).ready(function(){
    //     $(".Hindi").hide();
    // })
</script>

<?php
if (isset($_SESSION['name'])) {

    $name = $_SESSION['name'];
    include("g_dbconnect.php");
    $sql1 = "SELECT * FROM g_createvisiter WHERE GETMANNAME = '$name' ";
    $result1 = mysqli_query($con, $sql1);
?>
    <!--***** running notification *****-->
    <div class="container">
        <marquee class="text-danger text-uppercase" behavior="scroll" direction="left" scrollamount="6">
            <!-- आने वाले विजिटर का नाम:- &nbsp; -->
            <?php
            while ($row1 = mysqli_fetch_assoc($result1)) {
                if ($row1["OUTIME"] == 0) {

                    echo $row1['VISITER_NAME'];
                    echo '&nbsp;&nbsp;';
                    echo $row1['INTIME'];
                    echo ',&nbsp;&nbsp;&nbsp;';
                }
            } ?>
        </marquee>
    </div><br>
<?php } ?>

<style>
    @import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:600&display=swap");

    @-webkit-keyframes active {
        from {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 10px 0px rgba(0, 0, 250, 0.6);
        }

        to {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 3px #CECFD1;
        }
    }

    @keyframes active {
        from {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 10px 0px rgba(0, 0, 250, 0.6);
        }

        to {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 3px #CECFD1;
        }
    }

    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }

    #myBottons {
        padding: 0;
        background-color: white;
        min-height: 480px;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        /*margin: 0 10px;*/
    }

    .grid {
        max-width: 400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 150px 150px;
        align-items: center;
        justify-content: center;
        grid-gap: 40px 25px;
    }

    button,
    [role=button] {
        -webkit-appearance: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        display: flex;
        align-items: center;
        justify-content: center;
        outline: none;
        cursor: pointer;
        width: 150px;
        height: 50px;
        background-image: linear-gradient(to top, #D8D9DB 0%, #fff 80%, #FDFDFD 100%);
        border-radius: 30px;
        border: 1px solid #8F9092;
        box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 0 #CECFD1;
        transition: all 0.2s ease;
        font-family: "Source Sans Pro", sans-serif;
        font-size: 14px;
        font-weight: 600;
        color: #606060;
        text-shadow: 0 1px #fff;
    }

    button::-moz-focus-inner,
    [role=button]::-moz-focus-inner {
        border: 0;
    }

    button>*,
    [role=button]>* {
        transition: transform 0.2s ease;
    }

    button:hover:not([disabled]),
    [role=button]:hover:not([disabled]) {
        box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 3px #CECFD1;
    }

    button:hover:not([disabled])>*,
    [role=button]:hover:not([disabled])>* {
        transform: scale(0.975);
    }

    button:focus:not(:active),
    [role=button]:focus:not(:active) {
        -webkit-animation: active 0.9s alternate infinite;
        animation: active 0.9s alternate infinite;
        outline: none;
    }

    a {
        text-decoration: none;
    }

    .a {
        border-radius: 50px;
    }
</style>

<div id="myBottons">
    <div class="grid">
        <div class="row">
            <div class="col">
                <!--<a href="#" onclick="show()"><button>कर्मचारी</button></a><br>-->
                <a href="g_gateentry.php"><button><span class="Hindi">कर्मचारी</span><span class="English">Employee</span></button></a><br>
                <a href="g_DakForm.php"><button><span class="Hindi">डाक</span><span class="English">Dack</span></button></a><br>
                <a href="g_givenVisiterList.php"><button><span class="Hindi">इन्कामिंग विजिटर</span><span class="English">Incoming Visitors</button></a><br>
                <a href="g_report.php"><button><span class="Hindi">रिपोर्ट</span><span class="English">Report</span></button></a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="g_VisiterForm.php"><button><span class="Hindi">विजिटर</span><span class="English">Visitors</span></button></a><br>
                <a href="g_GRN.php"><button><span class="Hindi">जि.आर.ऐन.</span><span class="English">G. R. N.</span></button></a><br>
                <a href="g_VisiterOut.php"><button><span class="Hindi">विजिटर आउट</span><span class="English">Visitor Out</span></button></a><br>
                <a href="g_empAttenTable.php"><button><span class="Hindi">उपस्तिथि टेबल</span><span class="English">Attendence Table</span></button></a>
            </div>
        </div>
    </div>
</div>

<?php include("g_footer.php"); ?>