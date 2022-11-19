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
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <title>SUNNYVALE</title>
</head>
<style>
  * {
    margin: 0;
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