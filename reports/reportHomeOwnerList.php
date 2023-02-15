<?php
require '../process.php';
$res = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $res->fetch_assoc();
$result = $con->query("SELECT * FROM homeowner_profile WHERE email_address != '' ORDER BY homeowner_id ASC ") or die($mysqli->error);
$resultSubd = $con->query("SELECT * FROM subdivision ORDER BY subdivision_id ASC") or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
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
</style>

<body onload="print();" onafterprint="close();">
    <div class="reportPage">
        <div class="head">
            <label class="reportHeader">Sunnyvale Home Owners Association</label>
            <label class="reportSubtext">Sunnyvale Subdivision Compound, Binangonan, Rizal</label>
        </div>
        <div class="reportContainer">
            <label class="tblTitle">Homeowner List</label>
            <!-- <table class="tblReportData">
            <thead>
                <th>Amenity</th>
                <th>Renter</th>
                <th>Date/time from</th>
                <th>Date/time to</th>
                <th>cost</th>
            </thead>
            <tr>
                <td>Basketball Court</td>
                <td>Mon Carlo Delima</td>
                <td>2022-11-26 01:00:00</td>
                <td>2022-11-26 02:00:00</td>
                <td>150</td>
            </tr>
           

        </table> -->
            <div class="tblContainer">
                <table class="tblHomeowners">
                    <thead>
                        <!-- <th></th> -->
                        <th>Homeowner ID</th>
                        <th>Full Name</th>
                        <th>Date of Birth</th>
                        <th>Sex</th>
                        <th>Residence Address</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Business Address</th>
                        <th>Occupation</th>
                        <th>Employer</th>
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
                        $residence_address = $row['street'] . ' ' . $row['subdivision'] . ' ' . $row['barangay'];

                    ?>
                        <tr>
                            <!-- <td>
                                <a href="homeownerRegistration.php?homeowner_id=<?php echo $row['homeowner_id']; ?>" class="btnEdit">Edit</a>
                            </td> -->
                            <td>
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
                            <td>
                                <?php echo $row['mobile_number']; ?>
                            </td>
                            <td>
                                <?php echo $row['business_address']; ?>
                            </td>
                            <td>
                                <?php echo $row['occupation']; ?>
                            </td>
                            <td>
                                <?php echo $row['employer']; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>