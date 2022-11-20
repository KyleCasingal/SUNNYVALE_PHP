<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="treasurerPanel.css" media="screen">
  <link rel="stylesheet" href="../sidebarTreasurerPanel/sidebarTreasurerPanel.css" media="screen">
  <link rel="stylesheet" href="../topbar/topbar.css" media="screen">
  <link rel="stylesheet" href="../footer/footer.css" media="screen">
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap"
    rel="stylesheet">
  <title>SUNNYVALE</title>
</head>
<style>
  * {
    margin: 0;
  }

  input {
    padding: 0.5vw;
    max-width: 50vw;
    height: 2vw;
    font-size: 1.2vw;
    border: 0;
    border-radius: 0.8vw;
    font-family: "Newsreader", serif;
    margin-bottom: 1vw;
  }

  select {
    margin-right: 2vw;
    width: 15vw;
    max-width: 15vw;
    height: 2vw;
    font-size: 1.2vw;
    border: 0;
    border-radius: 0.8vw;
    font-family: "Newsreader", serif;
    margin-bottom: 1vw;
  }

  input[type="file"] {
    display: none;
  }

  label {
    margin-right: 0.5vw;
    font-size: max(1.5vw, min(10px));
    padding: 0.5vw;
  }

  thead {
    top: 0;
    position: sticky;
    text-align: center;
    background-color: rgb(251, 250, 244);
  }

  th,
  td {
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
    width: 70%;
    border-radius: 1vw;
    flex-direction: column;
    background-color: rgba(234, 232, 199, 0.2);
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
</style>

<body>
  <?php require '../topbar/topbar.php'; ?>
  <div class="treasurer">
    <?php require '../sidebarTreasurerPanel/sidebarTreasurerPanel.php'; ?>
    <div class="treasurerPanel">
      <div class="monthlyDues" id="monthlyDues">
        <div class="treasurerForm">
          <label>Name:</label>
          <input type="text" name="name" id="name" />
          <div class="date">
            <label>Month:</label>
            <select name="month" id="month">
              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="July">July</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
              <option value="December">December</option>
            </select>
            <label>Year:</label>
            <select name="year" id="year">
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
            </select>
          </div>
          <label>Block and Lot Number:</label>
          <input type="text" readOnly />
          <button class="btnSubmitPost" name="submitPost" id="submitPost">Submit Payment</button>
        </div>
        <div class="table-responsive">
          <table id="dtBasicExample" class="table table-hover" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>Month</th>
                <th>Year</th>
                <th>Address</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Jane Doe</td>
                <td>October</td>
                <td>2022</td>
                <td>blk 1 lot 2</td>
              </tr>
              <tr>
                <td>Jane Doe</td>
                <td>October</td>
                <td>2022</td>
                <td>blk 1 lot 2</td>
              </tr>
              <tr>
                <td>Jane Doe</td>
                <td>October</td>
                <td>2022</td>
                <td>blk 1 lot 2</td>
              </tr>
              <tr>
                <td>Jane Doe</td>
                <td>October</td>
                <td>2022</td>
                <td>blk 1 lot 2</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php
  require '../footer/footer2.php'
    ?>
</body>

</html>