<?php
require '../marginals/topbar.php';
$result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    margin-top: 0.5vw;
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

  .profileForm img {
    width: 10vw;
    height: 10vw;
    border-radius: 50%;
    object-fit: cover;
    border: 0.3vw solid rgb(107, 105, 105);
  }

  .profileForm {
    display: flex;
    background-color: rgba(234, 232, 199, 0.2);
    width: 90%;
    padding: 2vw;
    margin: 2vw;
    border-radius: 1vw;
  }

  .tblProfile {
    color: rgb(89, 89, 89);
    margin: 0;
    margin-left: 2vw;
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
          <div class="profileImg">
            <img <?php
                  $imageURL = '../media/displayPhotos/' . $row['display_picture'];
                  ?> src="<?= $imageURL ?>" alt="" />
          </div>

          <table class="table tblProfile">
            <tbody>
              <tr>
                <td class="lbl">Name:</td>
                <td class="data"><?php echo $row['first_name'] . " " . $row['middle_name']  . " " . $row['last_name']; ?></td>
                <td class="editBtn">
                  <i class="fa-solid fa-pen fa-2x"></i>
                </td>
              </tr>
              <tr>
                <td class="lbl">Date of Birth:</td>
                <td class="data"><?php
                                  $datetime = strtotime($row['birthdate']);
                                  echo $phptime = date("F/d/Y", $datetime);
                                  ?>
                </td>
              </tr>
              <tr>
                <td class="lbl">Gender:</td>
                <td class="data"><?php echo $row['sex'] ?></td>
              </tr>
              <tr>
                <td class="lbl">Residence Address:</td>
                <td class="data">
                  <?php echo $row['residence_address'] ?></ </td>
              </tr>
              <tr>
                <td class="lbl">Business Address:</td>
                <td class="data">
                  <?php echo $row['business_address'] ?>
                </td>
              </tr>
              <tr>
                <td class="lbl">Occupation:</td>
                <td class="data"><?php echo $row['occupation'] ?></td>
              </tr>
              <tr>
                <td class="lbl">Employer:</td>
                <td class="data"><?php echo $row['employer'] ?></td>
              </tr>
              <tr>
                <td class="lbl">Email:</td>
                <td class="data"><?php echo $row['email_address'] ?></td>
              </tr>
              <tr>
                <td class="lbl">Mobile Number:</td>
                <td class="data"><?php echo $row['mobile_number'] ?></td>
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