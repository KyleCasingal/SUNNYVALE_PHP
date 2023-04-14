<?php
require '../marginals/topbar.php';
if ($_SESSION['user_type'] == 'Tenant') {
  $result = $con->query("SELECT * FROM user, tenant  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND user.full_name = tenant.full_name") or die($mysqli->error);
  $row = $result->fetch_assoc();
  $user_type = $row['user_type'];
} else {
  $result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
  $row = $result->fetch_assoc();
  $user_type = $row['user_type'];
  $residence_address = $row['street'] . ' ' . $row['subdivision'] . ' ' . $row['barangay'];
  $resultSubd = $con->query("SELECT * FROM subdivision");
  $resultDues = $con->query("SELECT * FROM user, monthly_dues_bill WHERE user_id = " . $user_id = $_SESSION['user_id'] . " AND user_type = 'Homeowner' AND full_name = homeowner_name");
  $resultBillConsumer = $con->query("SELECT * FROM bill_consumer INNER JOIN billing_period ON bill_consumer.billingPeriod_id = billing_period.billingPeriod_id  WHERE homeowner_id = '$homeowner_id_profile' AND status = 'PAID' ORDER BY billing_period.billingPeriod_id ASC");
}

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
    z-index: -1;
    width: 10vw;
    height: 10vw;
    border-radius: 50%;
    object-fit: cover;
    border: 0.3vw solid rgb(107, 105, 105);
  }

  .profileForm {
    display: flex;
    background-color: rgb(170, 192, 175, 0.3);
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
    border: 1px solid red;
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

  .tblPaidDues {
    margin: 2vw;
    width: 90%;
  }

  .tblPaidDues td {
    text-align: center;
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

  input {
    font-size: 1vw;
    border-radius: 0.5vw;
    border: none !important;

  }

  select {
    font-size: 1vw;
    border: none !important;
    border-radius: 1vw;
    width: 15vw;
  }

  .tblForm {
    border: 0 none !important;


  }

  .tblForm th,
  td {
    font-size: 1vw;
    padding: 1vw;
  }

  .secretary {
    display: flex;
  }

  .sideBar {
    background-color: rgb(248, 245, 227);
    flex: 2;
    color: black;
  }

  .secretarySideBar {
    display: inline;
    justify-content: flex-end;
    margin-top: 5px;
    margin-bottom: 0;
    padding: 0;
    list-style: none;
  }

  .secretarySideBar li {
    color: rgb(89, 89, 89);
    font-family: "Poppins", sans-serif;
    text-align: center;
    padding: 1.5vw;
    padding-left: 0.5vw;
    padding-right: 0.5vw;
    font-size: max(1.5vw, min(10px));
    cursor: pointer;
    border-bottom: 1px solid lightgray;
  }

  .secretarySideBar li:hover {
    background-color: rgb(236, 235, 226);
  }

  .secretaryPanel {
    flex: 8;
    width: 100%;
    overflow-x: hidden;
  }

  .regForm {
    width: 100%;
    padding: 1vw;
    /* margin: 1vw; */
    border-radius: 1vw;
  }

  .btnSubmitReg {
    background-color: darkseagreen;
    border: 0;
    padding: 0.5vw;
    max-width: 50vw;
    width: 10vw;
    font-family: "Poppins", sans-sans-serif;
    font-size: 1vw;
    margin-top: 2vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
  }

  .btnSubmitReg:hover {
    background-color: rgb(93, 151, 93);
  }

  .btnUpdateReg {
    background-color: orange;
    border: 0;
    padding: 0.5vw;
    max-width: 50vw;
    width: 10vw;
    font-family: "Poppins", sans-sans-serif;
    font-size: 1vw;
    margin-top: 2vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
  }

  .btnUpdateReg:hover {
    background-color: orangered;
  }

  .btnClearReg {
    background-color: lightcoral;
    border: 0;
    padding: 0.5vw;
    max-width: 50vw;
    width: 10vw;
    font-family: "Poppins", sans-sans-serif;
    font-size: 1vw;
    margin-top: 2vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
  }

  .btnClearReg:hover {
    background-color: rgb(180, 83, 83);
  }

  .lblRegistration {
    font-size: 2vw;
    font-family: "Poppins", sans-serif;
    margin-top: 1vw;
    margin-left: 2vw;
    margin-bottom: -2vw;
    padding: 0;
    color: rgb(89, 89, 89);
    font-weight: 800;
  }

  .tblContainer {
    justify-content: center;
    margin-top: 0vw;
    margin-bottom: 2vw;
    margin-left: 2vw;
    margin-right: 0;
    overflow-y: auto;
    overflow-x: auto;
    max-height: 20vw;
  }

  .tblHomeowners {
    margin-bottom: 2vw;
    overflow-x: auto;
    overflow-y: auto;
    text-align: center;
    margin: 2vw;
    margin-right: 2vw;
    max-width: 60%;
  }

  .tblHomeowners thead,
  th {
    padding: 0.5vw;
    text-align: center;
    font-size: 1.2vw;
    background-color: rgb(170, 192, 175, 0.3);
    width: max-content;
    white-space: nowrap;
  }

  .tblHomeowners td {
    width: max-content;
    white-space: nowrap;
  }

  .tblHomeowners tr:hover {
    background-color: rgb(211, 211, 211);
  }

  .userManagementForm {
    background-color: rgb(170, 192, 175, 0.3);
    width: 95%;
    padding: 2vw;
    margin: 2vw;
    border-radius: 1vw;
  }

  .tblUsers {
    max-width: 95%;
    margin-top: 2vw;
  }

  .tblUsers th {
    text-align: center;
  }

  .tblUsers td {
    text-align: center;
  }

  .btnArea {
    display: flex;
    margin: 2vw;
    gap: 1vw;
  }

  .tbl tr:hover {
    background-color: rgb(211, 211, 211);
  }


  /* complaint container */
  .inbox {
    overflow: hidden;
    margin: 2vw;
    justify-content: center;
    align-items: center;
  }

  .inboxContainer {
    padding: 2vw;
    padding-left: 0;
    padding-right: 0;
    border-radius: 1vw;
    background-color: rgb(241, 241, 241);
    display: flex;
    width: 95%;
    height: 70vh;
    overflow-x: hidden;
    overflow-y: scroll;
  }

  .tblMessage {
    margin: 0;
    width: 100%;
    height: 100%;
    max-height: 30px;
  }

  .trInbox {
    width: 100%;
    color: rgb(89, 89, 89);
    background-color: rgb(241, 241, 241);
    border-bottom: 1px solid rgb(192, 192, 192);
  }

  .trInbox:hover {
    background-color: rgb(233, 233, 233);
    cursor: pointer;
  }

  .msgSender {
    font-family: "Poppins", sans-serif;
    font-size: 1.5vw;
    font-weight: bold;
  }

  .msgDesc {
    max-width: 50vw;
    width: fixed;
    text-align: left;
    font-family: "Poppins", sans-serif;
    font-size: 1.2vw;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .msgTime {
    text-align: center;
    font-family: "Poppins", sans-serif;
    font-size: 1.2vw;
  }

  .inboxTitle {
    font-size: 2vw;
    font-family: "Poppins", sans-serif;
    padding: 0;
    margin-bottom: 1vw;
    color: rgb(89, 89, 89);
    font-weight: 800;
  }

  .complaintManagement {
    margin: 2vw;
  }

  .lblNA {
    margin: 0;
    color: gray;
    font-size: 0.8vw;
    text-align: center;
    font-style: italic;
  }

  .NA {
    vertical-align: bottom !important;
    text-align: center;
    padding-bottom: 0 !important;
  }

  .NAemployer {
    margin: 0;
    padding-top: 2vw;
  }

  .btnEdit {
    background-color: orange;
    border: 0;
    padding: 0.5vw;
    max-width: 50vw;
    width: 5vw;
    font-family: "Poppins", sans-sans-serif;
    font-size: .8vw;
    margin-top: 2vw;
    border-radius: 0.8vw;
    cursor: pointer;
    text-decoration: none;
    color: white;
  }

  .fa-camera {
    color: rgba(0, 0, 0, 0);
  }

  .profileImg {
    width: 10vw;
    height: 10vw;
    border-radius: 50%;
  }

  /* .profileImg:hover .lblUpload{
      box-shadow:  rgba(0, 0, 0, 0.2);
      background-color: rgba(0, 0, 0, 0.2);
      color: black;
    } */
  .lblUpload {
    display: none;
    border-radius: 50%;
    display: flex;
    gap: 1vw;
    height: 10vw;
    width: 10vw;
    border: none;
    font-family: 'Poppins', sans-serif;
    color: rgba(0, 0, 0, 0);
    bottom: 10vw;
    font-size: 1vw;
    justify-content: center;
    align-items: center;
    position: relative;
    cursor: pointer;
  }

  .lblUpload:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: white;
  }

  .lblUpload:hover .fa-camera {
    color: white;
  }

  .input {
    display: hidden;
  }

  .savePhoto {
    background-color: darkseagreen;
    border: 0;
    padding: 0.5vw;
    max-width: 20vw;
    width: 10vw;
    font-family: "Poppins", sans-serif;
    font-size: 1.2vw;
    margin-top: 2vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
  }

  .imagePrev {
    max-width: 20vw;
    max-height: 20vw;
  }

  .mdl-body {
    margin: 1vw;
  }

  .formBlog {
    display: flex;
    flex-direction: column;
  }

  .formBlog label {
    padding-top: 1vw;
    font-size: 1.5vw;
  }

  .change-password {
    color: white;
    border: none;
    border-radius: 2vw;
    background-color: lightcoral;
    width: 12vw;
    height: 50px;
  }

  .button-area {
    display: flex;
    align-items: flex-end;
  }
</style>

<body>
  <div class="member">
    <div class="sideBar">
      <?php require '../marginals/sidebarMemberPanel.php'; ?>
    </div>
    <div class="memberPanel">
      <div class="profileMem" id="profile">
        <label class='lblProfile'><?php
                                  if ($user_type == 'Homeowner') {
                                    echo "Member Profile";
                                  } else if ($user_type == 'Tenant') {
                                    echo "Tenant Profile";
                                  } else {
                                    echo "Profile";
                                  }
                                  ?></label>
        <div class="profileForm">
          <div class="profileImg">
            <img <?php
                  $imageURL = '../media/displayPhotos/' . $row['display_picture'];
                  ?> src="<?= $imageURL ?>" />
            <label class="lblUpload" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Upload Photo</label>
          </div>
          <table class="table tblProfile">
            <tbody>
              <tr>
                <td class="lbl">Name:</td>
                <td class="data"><?php
                                  if ($user_type == 'Homeowner') {
                                    if ($row['suffix'] == "N/A") {
                                      echo $row['first_name'] . " " . $row['middle_name']  . " " . $row['last_name'];
                                    } else {
                                      echo $row['first_name'] . " " . $row['middle_name']  . " " . $row['last_name'] . " " . $row['suffix'];
                                    }
                                  } else if ($user_type == 'Tenant') {
                                    echo $row['full_name'];
                                  };
                                  ?></td>
                <td class="editBtn">
                  <?php
                  if ($user_type == 'Homeowner') {
                    echo "<i class='fa-solid fa-pen fa-2x' data-bs-toggle='modal' data-bs-target='#editProfile'></i>";
                  }
                  ?>
                </td>
              </tr>
              <?php
              if ($user_type == 'Homeowner') {
                $datetime = strtotime($row['birthdate']);
                echo "<tr>
                <td class='lbl'>Date of Birth:</td>
                <td class='data'>
                               " . $phptime = date('F/d/Y', $datetime) . "
                </td>
              </tr>
              <tr>
                <td class='lbl'>Sex:</td>
                <td class='data'> " . $row['sex'] . "</td>
              </tr>
              <tr>
                <td class='lbl'>Email:</td>
                <td class='data'>" . $row['email_address'] . "</td>
              </tr>
              <tr>
                <td class='lbl'>Mobile Number:</td>
                <td class='data'>" . $row['mobile_number'] . "</td>
              </tr>
              <tr>
                <td class='lbl'>Residence Address:</td>
                <td class='data'>
                  " . $residence_address . "</td>
              </tr>
              <tr>
                <td class='lbl'>Business Address:</td>
                <td class='data'>
                " . $row['business_address'] . "
                </td>
              </tr>
              <tr>
                <td class='lbl'>Occupation:</td>
                <td class='data'>" . $row['occupation'] . "</td>
              </tr>
              <tr>
                <td class='lbl'>Employer:</td>
                <td class='data'>" . $row['employer'] . "</td>
              </tr>
              <tr>
              <td class='lbl'>Vehicle Registration:</td>
              <td class='data'>" . $row['vehicle_registration'] . "</td>
              <td class='editBtn'><button class='change-password' type='button' data-bs-toggle='modal' data-bs-target='#editPassword'>Change password <i class='fa-solid fa-lock'></i></button></td>
            </tr>";
              } else if ($user_type == 'Tenant') {
                $datetime = strtotime($row['birthdate']);
                echo "<tr>
                <td class='lbl'>Date of Birth:</td>
                <td class='data'>
                               " . $phptime = date('F/d/Y', $datetime) . "
                </td>
              </tr>
              <tr>
                <td class='lbl'>Sex:</td>
                <td class='data'> " . $row['sex'] . "</td>
              </tr>
              <tr>
                <td class='lbl'>Email:</td>
                <td class='data'>" . $row['email_address'] . "</td>
              </tr>
              <tr>
                <td class='lbl'>Mobile Number:</td>
                <td class='data'>" . $row['mobile_no'] . "</td>
              </tr>";
              }
              ?>
            </tbody>
          </table>
          <!-- <div class="button-area">
            <?php
            if ($user_type == 'Homeowner') {
              echo "<button class='change-password' type='button' data-bs-toggle='modal' data-bs-target='#editPassword'>Change password <i class='fa-solid fa-lock'></i></button>";
            }
            ?>
          </div> -->
        </div>
        <?php
        if ($user_type == 'Homeowner') {
          echo "<div class='table-responsive'>
          <label class='lblTable'>Paid Monthly Dues</label>
          <table class='tblPaidDues table-hover' cellspacing='0' width='100%'>
            <thead>
              <tr>
                <th>Month</th>
                <th>Year</th>
                <th>Amount</th>
                <th>Date Paid</th>
              </tr>
            </thead>
            <tbody>";
          while ($rowBillConsumer = $resultBillConsumer->fetch_assoc()) :
            $datetime = strtotime($rowBillConsumer['datetime_paid']);
            $phptime = date("g:i A m/d/y", $datetime);
            echo "<tr>
              <td>" . $rowBillConsumer['month'] . "</td>
              <td>" .  $rowBillConsumer['year'] . "</td>
              <td>" .  $rowBillConsumer['amount'] . "</td>
              <td>" . $phptime . "</td>";
          endwhile;
          echo "</tr>
        </tbody>
      </table>
    </div>
  </div>";
        }
        ?>
      </div>
    </div>
  </div>
  <form method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Your Information</h5>
            <button type="button" class="btn-close discardChanges"></button>
          </div>
          <div class="modal-body">
            <div class="regForm">
              <table class="tblForm">
                <tr>
                  <td>First Name:</td>
                  <td>
                    <input disabled type="text" name="first_name" id="" placeholder="first name" value="<?php echo $row['first_name']; ?>" required />
                  </td>
                  <td>Email:</td>
                  <td>
                    <input disabled type="text" name="email_address" id="" placeholder="email" value="<?php echo $row['email_address'] ?? ''; ?>" required />
                  </td>
                </tr>
                <tr>
                  <td>Middle Name:</td>
                  <td>
                    <input disabled type="text" name="middle_name" id="" placeholder="middle name" value="<?php echo $row['middle_name'] ?? ''; ?>" required />
                  </td>
                  <td>Mobile Number:</td>
                  <td>
                    <input type="text" name="mobile_number" id="" placeholder="mobile no." value="<?php echo $row['mobile_number'] ?? ''; ?>" required />
                  </td>
                </tr>
                <tr>
                  <td>Last Name:</td>
                  <td>
                    <input disabled type="text" name="last_name" id="" placeholder="last name" value="<?php echo $row['last_name'] ?? ''; ?>" required />
                  </td>
                  <td>Occupation:</td>
                  <td class="NA">
                    <input type="text" name="occupation" id="" placeholder="occupation" value="<?php echo $row['occupation'] ?? ''; ?>" required />
                    <p class="lblNA">*write N/A if not applicable*</p>
                  </td>
                </tr>
                <tr>
                  <td>Suffix:</td>
                  <td>
                    <input disabled type="text" name="suffix" id="" placeholder="suffix" value="<?php echo $row['suffix'] ?? ''; ?>" required />
                  </td>
                  <td>Business Address:</td>
                  <td class="NA">
                    <input type="text" name="business_address" id="" placeholder="business address" value="<?php echo $row['business_address'] ?? ''; ?>" required />
                    <p class="lblNA">*write N/A if not applicable*</p>
                  </td>
                </tr>
                <tr>
                  <td>Date of Birth:</td>
                  <td>
                    <input disabled type="date" data-date-format="yyyy-mm-dd" name="birthdate" value="<?php echo $row['birthdate'] ?? ''; ?>" id="" required />
                  </td>
                  <td>Employer:</td>
                  <td class="NAemployer">
                    <input type="text" name="employer" id="" placeholder="employer" value="<?php echo $row['employer'] ?? ''; ?>" required />
                    <p class="lblNA">*write N/A if not applicable*</p>
                  </td>
                </tr>
                <tr>
                  <td>Sex:</td>
                  <td>
                    <select disabled name="sex" id="">
                      <option value="" required>Select...</option>
                      <option value="Male" <?php
                                            if ($row['sex'] == "Male") {
                                              echo 'selected="selected"';
                                            }
                                            ?>>Male</option>
                      <option value="Female" <?php
                                              if ($row['sex'] == "Female") {
                                                echo 'selected="selected"';
                                              }
                                              ?>>Female</option>
                    </select>
                  </td>
                  <td>Vehicle Registration:</td>
                  <td class="NAemployer">
                    <input type="text" name="vehicle_registration" id="" placeholder="employer" value="<?php echo $row['vehicle_registration'] ?? ''; ?>" required />
                    <p class="lblNA">*write N/A if not applicable*</p>
                  </td>
                </tr>
                <tr>
                  <td>Residence Address:</td>
                  <td>
                    <input disabled type="text" name="street" id="" placeholder="Lot and Block" value="<?php echo $row['street'] ?? ''; ?>" required />
                  </td>
                  <td>
                    <select disabled name="subdivision" id="">
                      <option value="">Select...</option>
                      <?php while ($rowSubd = $resultSubd->fetch_assoc()) : ?>
                        <option value="<?php echo $rowSubd['subdivision_name'] ?>" <?php
                                                                                    if ($rowSubd['subdivision_name'] == $row['subdivision']) {
                                                                                      echo 'selected="selected"';
                                                                                    }
                                                                                    ?>><?php echo $rowSubd['subdivision_name'] ?></option>
                      <?php endwhile; ?>
                    </select>
                  </td>
                </tr>
                <tr>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <button data-bs-toggle="modal" type="button" class="btnSubmitReg saveChanges">
                      Save
                    </button>
                  </td>
                  <td>
                    <button type="button" value="" class="btnClearReg discardChanges" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Discard
                    </button>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Do you really want to save your changes?
          </div>
          <div class="modal-footer">
            <button name="editProfile" type="submit" class="btn btn-success">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Change profile photo</h5>
            <button type="button" class="btn-close discardChanges"></button>
          </div>
          <div class="mdl-body">
            <div class="blogWrite">
              <div class="blogWritePage">
                <div class="formBlog">
                  <label class="writeText">Add Photos</label>
                  <input class="attInput" type="file" name="image" id="image" accept="image/*" onchange="preview()"></input>
                  <img class="imagePrev" id="imagePreview" src=# alt="" />
                  <label for="image" class="upload">Upload Photo</label>
                  <button data-bs-toggle="modal" type="button" class="savePhoto">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="photoConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Do you really want to change your profile photo?
          </div>
          <div class="modal-footer">
            <button name="editProfilePhoto" type="submit" class="btn btn-success">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <form action="" method="post">
    <div class="modal fade" id="editPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
            <button type="button" class="btn-close discardChanges"></button>
          </div>
          <div class="modal-body">
            <div class="regForm">
              <table class="tblForm">
                <tr>
                  <td>Old Password:</td>
                  <td><input type="text" name="oldPassword"></td>
                </tr>
                <tr>
                  <td>New Password:</td>
                  <td><input type="text" name="newPassword"></td>
                </tr>
                <tr>
                  <td>Confirm Password:</td>
                  <td><input type="text" name="confirmPassword"></td>

                </tr>
                <tr>
                  <td>
                    <button data-bs-toggle="modal" type="button" class="btnSubmitReg savePassword">
                      Save
                    </button>
                  </td>
                  <td>
                    <button type="button" value="" class="btnClearReg discardChanges" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Discard
                    </button>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="passwordConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Do you really want to save your changes?
          </div>
          <div class="modal-footer">
            <button name="editPassword" type="submit" class="btn btn-success">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <div class="modal fade" id="discardConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Your changes will be discarded!
        </div>
        <div class="modal-footer">
          <button class="btn btn-warning" onclick="location.href='memberPanel.php'">Discard changes</button>
        </div>
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
  $(document).ready(function() {
    $('.saveChanges').click(function() {
      $('#confirmation').modal('show');
    });
  });
  $(document).ready(function() {
    $('.savePhoto').click(function() {
      $('#photoConfirmation').modal('show');
    });
  });
  $(document).ready(function() {
    $('.savePassword').click(function() {
      $('#passwordConfirmation').modal('show');
    });
  });
  $(document).ready(function() {
    $('.discardChanges').click(function() {
      $('#discardConfirmation').modal('show');
    });
  });

  function readURL(input, id) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#' + id).attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#image").change(function() {
    readURL(this, 'imagePreview');
  });
</script>

</html>