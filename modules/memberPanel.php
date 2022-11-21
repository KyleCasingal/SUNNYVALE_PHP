<!DOCTYPE html>
<html lang="en">
<?php require '../marginals/topbar.php'; ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

  .member {
    display: flex;
  }

  .sideBar {
    background-color: rgb(248, 245, 227);
    flex: 2;
    color: black;
  }

  .memberSideBar {
    display: inline;
    justify-content: flex-end;
    margin-top: 5px;
    margin-bottom: 0;
    padding: 0;
    list-style: none;
  }

  .memberSideBar li {
    color: rgb(89, 89, 89);
    font-family: "Poppins", sans-serif;
    text-align: center;
    padding: 1.5vw;
    font-size: max(1.5vw, min(10px));
    cursor: pointer;
    border-bottom: 1px solid lightgray;
  }

  .memberSideBar li:hover {
    background-color: rgb(236, 235, 226);
  }

  .memberPanel {
    flex: 8;
    width: 100%;
    overflow-x: hidden;
  }

  .profileImg {
    width: 10vw;
    height: 10vw;
    border-radius: 50%;
    margin: 0;
    border: 0.3vw solid rgb(107, 105, 105);
  }

  .profileForm {
    display: flex;
    background-color: rgba(234, 232, 199, 0.2);
    width: 80%;
    padding: 2vw;
    margin: 2vw;
    border-radius: 1vw;
  }

  .tblProfile {
    color: rgb(89, 89, 89);
    margin: 0;
    margin-left: 1vw;
    font-family: "Poppins", sans-serif;
  }

  td,
  th {
    color: rgb(89, 89, 89);
    font-size: 1.2vw;
    border-style: none !important;
    text-align: left;
    width: min-content;
  }

  .lbl {
    font-weight: 800;
    width: 1%;
    white-space: nowrap;
  }

  .editBtn {
    width: vw;
    cursor: pointer;
    text-align: right;
  }

  .fa-pen {
    color: rgb(89, 89, 89);
  }

  .fa-pen:hover {
    color: rgb(117, 117, 117);
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
    margin-top: 1vw;
    margin-bottom: 2vw;
    overflow-y: scroll;
    align-items: center;
    justify-self: center;
    margin: 2vw;
    max-width: 95%;
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

  .lblProfile {
    font-size: 2vw;
    font-family: "Poppins", sans-serif;
    margin-top: 1vw;
    margin-left: 2vw;
    margin-bottom: -2vw;
    padding: 0;
    color: rgb(89, 89, 89);
    font-weight: 800;
  }
</style>

<body>

  <div class="member">
    <div class="sideBar">

      <?php require '../marginals/sidebarMemberPanel.php'; ?>
    </div>
    <div class="memberPanel">
      <div class="profileMem" id="profile">
        <label class="lblProfile">Member Profile</label>
        <div class="profileForm">
          <img class="profileImg" src="https://i.pinimg.com/736x/6a/6c/ca/6a6cca8ac5994554019c257af2b17b6a.jpg"
            alt="" />
          <table class="table tblProfile">
            <tbody>
              <tr>
                <td class="lbl">Name:</td>
                <td class="data">Nene Yashiro</td>
                <td class="editBtn">
                  <i class="fa-solid fa-pen fa-2x"></i>
                </td>
              </tr>
              <tr>
                <td class="lbl">Date of Birth:</td>
                <td class="data">January 1, 2001</td>
              </tr>
              <tr>
                <td class="lbl">Gender:</td>
                <td class="data">Female</td>
              </tr>
              <tr>
                <td class="lbl">Residence Address:</td>
                <td class="data">
                  blk 1 lot 2 kingsroad st. Sunnyvale 2
                </td>
              </tr>
              <tr>
                <td class="lbl">Business Address:</td>
                <td class="data">
                  blk 1 lot 2 kingsroad st. Sunnyvale 2
                </td>
              </tr>
              <tr>
                <td class="lbl">Occupation:</td>
                <td class="data">None</td>
              </tr>
              <tr>
                <td class="lbl">Email:</td>
                <td class="data">sample@gmail.com</td>
              </tr>
              <tr>
                <td class="lbl">Mobile Number:</td>
                <td class="data">09123456789</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="table-responsive">
          <label class="lblTable">Paid Monthly Dues</label>
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
  </div>
  <?php
  require '../marginals/footer2.php'
    ?>
</body>

</html>