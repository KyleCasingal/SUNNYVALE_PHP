<?php 
    $con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
    $result = $con->query("SELECT * FROM facility_renting");
    
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
    .reportPage{
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
        <label class="tblTitle">Amenity Renting</label>
        <table class="tblReportData">
            <thead>
                <th>Amenity</th>
                <th>Renter</th>
                <th>Date/time from</th>
                <th>Date/time to</th>
                <th>cost</th>
            </thead>
            <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['amenity_name']; ?></td>
                <td><?php echo $row['renter_name']; ?></td>
                <td><?php echo $row['date_from']; ?></td>
                <td><?php echo $row['date_to']; ?></td>
                <td><?php echo $row['cost']; ?></td>
            </tr>
            <?php endwhile; ?>
           

        </table>
    </div>
    </div>
</body>

</html>