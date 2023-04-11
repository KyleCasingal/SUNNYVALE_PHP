<?php
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
$result0 = $con->query("SELECT DISTINCT transaction_type  FROM transaction  WHERE 1");
$result = $con->query("SELECT * FROM transaction");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
=======
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"/>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/> -->
>>>>>>> eb238ca3eb09877d5de710ca1436affee15312fb


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

  @media only print {

    .tblFilter,
    .noprint {
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
  <!-- <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <h class="navbar-brand" onclick="location.href='../modules/settingsAmenity.php'">Back</h>
</nav> -->
<<<<<<< HEAD
  <div class="fab-wrapper">
    <label class="fab" for="print" id="print">
      <center>
        <i class="fa fa-print" aria-hidden="true" id="print">
      </center>
    </label>
  </div>
  <div class="reportPage">
=======
     <div class="fab-wrapper">
      <label class="fab noprint" for="print" id="print">
        <center>
         <i class="fa fa-print" aria-hidden="true" id="print">
        </center>
      </label>
    </div>
    <div class="reportPage">
>>>>>>> eb238ca3eb09877d5de710ca1436affee15312fb
    <div class="head">
      <label class="reportHeader">Sunnyvale Home Owners Association</label>
      <label class="reportSubtext">Sunnyvale Subdivision Compound, Binangonan, Rizal</label>
    </div>
    <div class="reportContainer">
      <label class="tblTitle">Transactions</label>


      <label class="tblFilter" for="">filter by transaction type:</label>
      <select name="tblFilter" class="noprint" id="tblFilter" onclick="myFunction1()">
        <option value="">Select...</option>
        <?php
        while ($row0 = $result0->fetch_assoc()) {
          echo '<option value="' . $row0['transaction_type'] . '">' . $row0['transaction_type'] . '</option>';
        }
        ?>
      </select>

      <table class="tblReportData" id="tblReportData">
        <thead>

          <th>Renter Name</th>
          <th>Transaction Type</th>
          <th>Total Cost</th>
        </thead>
        <?php while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['transaction_type']; ?></td>
            <td><?php echo $row['total_cost']; ?></td>
          </tr>
        <?php endwhile; ?>


      </table>
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
      td = tr[i].getElementsByTagName("td")[1];
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