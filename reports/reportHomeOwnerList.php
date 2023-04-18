<?php
require '../process.php';
$res = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $res->fetch_assoc();
$result = $con->query("SELECT * FROM homeowner_profile WHERE email_address != '' ORDER BY homeowner_id ASC ") or die($mysqli->error);
$resultSubd = $con->query("SELECT * FROM subdivision ORDER BY subdivision_id ASC") or die($mysqli->error);
$result0 = $con->query("SELECT * FROM subdivision ORDER BY subdivision_id ASC");

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
        width: 80%px;
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
        table-layout: fixed;
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

    .ID-column {
        width: 8%;
        white-space: nowrap;
    }

    @media only print {

        .tblFilter,
        .noprint,
        .print-button,
        .print-button,
        .fab-wrapper {
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
        <div class="reportContainer">
            <label class="tblTitle">Homeowner List</label>
            <div>
                <label class="tblFilter" for="">filter by transaction type:</label>
                <select name="tblFilter" class="noprint" id="tblFilter" onclick="myFunction1()">
                    <option value="">Select...</option>
                    <?php
                    while ($row0 = $result0->fetch_assoc()) {
                        echo '<option value="' . $row0['subdivision_name'] . '">' . $row0['subdivision_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="tblContainer">
                <table class="tblReportData" id="tblReportData">
                    <thead>
                        <!-- <th></th> -->
                        <th class="ID-column">Homeowner ID</th>
                        <th>Full Name</th>
                        <th>Date of Birth</th>
                        <th>Sex</th>
                        <th>Residence Address</th>
                        <th>Email</th>
                    </thead>
                    <?php
                    while ($row = $result->fetch_assoc()) :
                        $suffix = $row['suffix'];
                        if ($suffix == "N/A") {
                            $suffix = NULL;
                        } else {
                            $suffix = " " . $row['suffix'];
                        }
                        $middle_name = $row['middle_name'];
                        if ($middle_name == "N/A") {
                            $middle_name = NULL;
                        } else {
                            $middle_name = " " . $row['middle_name'];
                        }
                        $residence_address = $row['street'] . ' ' . $row['subdivision'] . ', ' . $row['barangay'];

                    ?>
                        <tr>
                            <!-- <td>
                                <a href="homeownerRegistration.php?homeowner_id=<?php echo $row['homeowner_id']; ?>" class="btnEdit">Edit</a>
                            </td> -->
                            <td >
                                <?php echo $row['homeowner_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['first_name'] . $middle_name . " " . $row['last_name'] . $suffix; ?>
                            </td>
                            <td>
                                <?php
                                $datetime = strtotime($row['birthdate']);
                                echo $phptime = date("m/d/Y", $datetime);
                                ?>
                            </td>
                            <td>
                                <?php echo $row['sex']; ?>
                            </td>
                            <td>
                                <?php echo $residence_address; ?>
                            </td>
                            <td>
                                <?php echo $row['email_address']; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    function myFunction1() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("tblFilter");
        filter = input.value.toUpperCase();
        table = document.getElementById("tblReportData");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    };
</script>

</html>