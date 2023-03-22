<?php
require '../marginals/topbar.php';
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
$resultDues = $con->query("SELECT * FROM monthly_dues_bill");
$resultSubd = $con->query("SELECT * FROM subdivision");
$resultSubdivision3 = $con->query("SELECT * FROM monthly_dues ORDER BY monthly_dues_id ASC");
$resultBilling = $con->query(
  "SELECT billing_period.month, bill_consumer.fullname, bill_consumer.amount, bill_consumer.status 
FROM bill_consumer
INNER JOIN billing_period ON bill_consumer.billingPeriod_id = billing_period.billingPeriod_id;"
);

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
  * {
    margin: 0;
  }

  input {
    font-family: 'Poppins', sans-serif;
    margin-bottom: 2vw;
    padding: 0.5vw;
    max-width: 50vw;
    height: 2vw;
    font-size: 1.2vw;
    border: 0;
    border-radius: 0.8vw;
    margin-bottom: 1vw;
  }

  select {
    background-color: white;
    font-family: 'Poppins', sans-serif;
    margin-right: 2vw;
    width: 15vw;
    max-width: 15vw;
    height: 2vw;
    font-size: 1.2vw;
    border: 0;
    border-radius: 0.8vw;
    margin-bottom: 1vw;
  }

  input[type="file"] {
    display: none;
  }

  label {
    font-family: 'Poppins', sans-serif;
    margin-right: 0.5vw;
    font-size: max(1.2vw, min(10px));
    padding: 0.5vw;
  }


  thead {
    top: 0;
    position: sticky;
    text-align: center;
    background-color: rgb(170, 192, 175, 0.3);
  }

  th,
  td {
    text-align: center;
    padding: 0.8vw;
    border: 1px solid lightgray;
  }

  .table-responsive {
    font-size: max(1vw, min(10px));
    max-height: 500px;
    min-height: 20vw;
  }

  .table {
    margin-top: 2vw;
    margin-bottom: 2vw;
    overflow-y: scroll;
    align-items: center;
    justify-self: center;
    margin: 2vw;
    max-width: 95%;
  }

  .treasurer {
    width: 100%;
    display: flex;
  }

  .treasurerForm {
    display: flex;
    justify-content: center;
    padding: 2vw;
    margin: 1.5vw;
    width: 95%;
    border-radius: 1vw;
    flex-direction: column;
    background-color: rgb(170, 192, 175, 0.3);
    font-family: "Newsreader", serif;
  }

  .imagePrev {
    max-width: 30vw;
    max-height: 20vw;
    margin-bottom: 1vw;
  }

  .treasurerPanel {
    flex: 8;
    width: 100%;
    overflow-y: scroll;
  }

  .facilityRenting {
    display: block;
    width: 95%;
  }

  .amenitiesForm {
    width: 100%;
  }

  .btnSubmitPost {
    background-color: darkseagreen;
    border: 0;
    padding: 0.5vw;
    max-width: 50vw;
    width: 15vw;
    font-family: "Poppins", sans-serif;
    font-size: 1.5vw;
    margin-top: 2vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
  }

  .btnSubmitPost:hover {
    background-color: rgba(167, 197, 167);
  }

  .lblTable {
    font-size: 2vw;
    font-family: "Poppins", sans-serif;
    margin-left: 2vw;
    margin-bottom: -2vw;
    padding: 0;
    color: rgb(89, 89, 89);
    font-weight: 800;
  }

  .select-homeowner {
    width: 80%;
  }

  .Homeowner-table {
    width: 100%;
    font-family: 'Poppins', sans-serif;
  }

  .Homeowner-table-data-row:hover {
    background-color: lightgray;
  }
</style>

<body>

  <div class="treasurer">
    <?php require '../marginals/sidebarTreasurerPanel.php'; ?>
    <div class="treasurerPanel">
      <div class="monthlyDues" id="monthlyDues">
        <div class="treasurerForm">
          <div class="filter-area">
            <label>Search:</label>
            <input type="text" id="search" onkeyup="myFunction()" placeholder="Search for names..">
            <!-- <label for="">filter by Subdivision:</label>
            <select name="homeowner" id="homeowner" onclick="myFunction1()">
              <option value="">Select...</option>
              <?php
              while ($rowSubdivision3 = $resultSubdivision3->fetch_assoc()) : {
                  echo '<option value="' . $rowSubdivision3['monthly_dues_id'] . '">' . $rowSubdivision3['subdivision_name'] . '</option>';
                }
              ?>
              <?php endwhile; ?>
            </select> -->
          </div>
          <div class="table-area">
            <table class="Homeowner-table" id="Homeowner_table">
              <thead>
                <th>Month</th>
                <th>Full name</th>
                <th>Amount</th>
                <th>Status</th>
              </thead>
              <?php while ($row = $resultBilling->fetch_assoc()) : ?>
                <tr class="Homeowner-table-data-row" id="Homeowner_table_data_row">
                  <td><?php echo $row['month'] ?></td>
                  <td><?php echo $row['fullname'] ?></td>
                  <td><?php echo $row['amount'] ?></td>
                  <td><?php echo $row['status'] ?></td>
                </tr>
              <?php endwhile; ?>
            </table>
          </div>

        </div>

      </div>
    </div>
  </div>
  <?php
  require '../marginals/footer2.php'
  ?>
</body>
<script>
  function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("Homeowner_table");
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
  }

  function myFunction1() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("homeowner");
    filter = input.value.toUpperCase();
    table = document.getElementById("Homeowner_table");
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