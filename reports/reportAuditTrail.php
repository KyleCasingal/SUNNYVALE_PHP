<?php
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
$result = $con->query("SELECT user, action, DATE(datetime) AS DATE, TIME(datetime) AS TIME FROM audit_trail order by DATE(datetime) DESC ");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.4/b-2.3.6/sl-1.6.2/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="Editor-2.1.2/css/editor.dataTables.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css" />



    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>


    <script type="text/javascript" src="Editor-2.1.2/js/dataTables.editor.js"></script>





    <title>SUNNYVALE</title>
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        display: flex;
        justify-content: center;
    }

    .reportPage {
        width: 1000px;
    }

    .head {
        display: flex;
        gap: 18vw;
    }

    .head-text {
        padding-bottom: 2vw;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .reportHeader {
        font-weight: 800;
        font-size: 1.5em;
    }

    .reportSubtext {
        font-size: 1em;
    }

    .reportContainer {

        height: 800px;
    }

    .tblTitle {

        font-size: 1.5em;
        font-weight: 800;
    }

    .tblReportData {
        margin-top: 2vw;
        width: 100%;
        border-collapse: collapse;
    }

    .tblReportData thead {
        background-color: darkgray;
        padding: 0;
        margin: 0;
    }

    .tblReportData th,
    .tblReportData td {
        border: 1px solid black;
        padding: 0.5vw;
        text-align: center;

    }

    .fab-wrapper {
        position: fixed;
        bottom: 3rem;
        right: 3rem;
    }

    .fab {
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        bottom: -1rem;
        right: -1rem;
        width: 4vw;
        height: 4vw;
        border-radius: 50%;
        transition: all 0.3s ease;
        z-index: 1;
        background-color: rgb(248, 186, 55);
        box-shadow: 5px 10px 8px #888888;
    }

    .fc-clear {
        background-color: rgb(170, 192, 175, 0.3);
    }

    .fc-toolbar {
        background-color: rgb(170, 192, 175, 0.3);
    }

    .print-button {
        font-family: 'Poppins', sans-serif;
        font-size: 1vw;
        color: white;

    }

    .logo-header {
        max-width: 9vw;
        max-height: 9vw;
        height: 9vw;
        width: 9vw;
    }

    @media only print {

        .tblFilter,
        .noprint,
        .print-button,
        .dataTables_info,
        .tblReportData_filter,
        .dataTables_filter,
        .dataTables_paginate {
            visibility: hidden;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            window.print();
        });
    });
</script>
<!-- onload="print();" onafterprint="close();" -->

<body>
    <div class="fab-wrapper">
        <label class="fab" for="print" id="print">
            <center>
                <span class="print-button">Print</span>
            </center>
        </label>
    </div>
    <div class="reportPage">
        <div class="head">
            <img class="logo-header" src="../media/content-images/sv2_logo.png" alt="">
            <div class="head-text">
                <label class="reportHeader">Sunnyvale Home Owners Association</label>
                <label class="reportSubtext">Sunnyvale Subdivision Compound, Binangonan, Rizal</label>
            </div>
        </div>
        <label class="tblTitle">Audit Trail</label>


        <div class="reportContainer">

            <table border="0" cellspacing="5" cellpadding="5" class="noprint">
                <tbody>
                    <tr>
                        <td>Minimum date:</td>
                        <td><input type="text" id="min" name="min"></td>
                    </tr>
                    <tr>
                        <td>Maximum date:</td>
                        <td><input type="text" id="max" name="max"></td>
                    </tr>
                </tbody>
            </table>
            <table class="tblReportData" id="tblReportData">

                <thead>
                    <th>User</th>
                    <th>Activity</th>
                    <th>Date</th>
                    <th>Time</th>
                </thead>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['user']; ?></td>
                        <td><?php echo $row['action']; ?></td>
                        <td><?php echo $row['DATE']; ?></td>
                        <td><?php echo $row['TIME']; ?></td>
                    </tr>
                <?php endwhile; ?>


            </table>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script> -->
</body>
<script>
    //   function myFunction1() {
    //     // Declare variables
    //     var input, filter, table, tr, td, i, txtValue;
    //     input = document.getElementById("tblFilter");
    //     filter = input.value.toUpperCase();
    //     table = document.getElementById("tblReportData");
    //     tr = table.getElementsByTagName("tr");

    //     // Loop through all table rows, and hide those who don't match the search query
    //     for (i = 0; i < tr.length; i++) {
    //       td = tr[i].getElementsByTagName("td")[1];
    //       if (td) {
    //         txtValue = td.textContent || td.innerText;
    //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //           tr[i].style.display = "";
    //         } else {
    //           tr[i].style.display = "none";
    //         }
    //       }
    //     }
    //   };
    $(document).ready( function () {
    $('#tblReportData').DataTable();
} );
    var minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[2]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        // DataTables initialisation
        var table = $('#tblReportData').DataTable();

        // Refilter the table
        $('#min, #max').on('change', function() {
            table.draw();
        });
    });

    $(document).ready(function() {
        $('#reportContainer').dataTable({
            "LengthChange": false,
        });
    });
</script>

</html>