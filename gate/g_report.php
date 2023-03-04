<?php include("g_header.php"); ?>
<a href="g_home.php" type="button" class="btn btn-warning">बैक</a>
</nav><br>

<script>
    $(document).ready(function() {
        $("#save").click(function() {
            $.post("g_DakInsert.php", {
                    file: $("#file").val(),
                    from: $("#from").val(),
                    address: $("#address").val(),
                    list: $("#list").val(),
                    empname: $("#empname").val()
                },
                function(data, status) {
                    alert("Data: " + data + "\nStatus: " + status);
                    // alert($("#myName").val());
                });
        });
    });
</script>

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
        margin: 0 40px;
        padding: 0;
        background-color: white;
        min-height: 480px;
        /* border-radius: 40px; */
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
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
    a{
        text-decoration: none;
    }
</style>

<div id="myBottons">
    <div class="grid">
        <div class="row">
            <div class="col">
                <a href="g_reportTableVisiter.php"><button><span class="Hindi">विसिटर रिपोर्ट</span><span class="English">Visitor Report</span></button></a><br>
                <a href="g_reportTableEmp.php"><button><span class="Hindi">कर्मचारी रिपोर्ट</span><span class="English">Employee Report</span></button></a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="g_reportTableDak.php"><button><span class="Hindi">डाक रिपोर्ट</span><span class="English">Doc Report</span></button></a><br>
                <a href="g_reportTableGRN.php"><button><span class="Hindi">GRN रिपोर्ट</span><span class="English">GRN Report</span></button></a>
            </div>
        </div>
    </div>
</div>

<?php include("g_footer.php"); ?>