<?php
require '../marginals/topbar.php';
if ($_SESSION['user_type'] != 'Treasurer' and $_SESSION['user_type'] != 'Admin') {
  echo '<script>window.location.href = "../modules/blogHome.php";</script>';
  exit;
}
$resultTransaction = $con->query("SELECT * FROM transaction WHERE transaction_type = 'Monthly Dues'");
$resultBillConsumer = $con->query("SELECT * FROM bill_consumer, transaction WHERE bill_consumer.transaction_id = transaction.transaction_id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <title>SUNNYVALE</title>
</head>
<style>
  * {
    margin: 0;
  }

  .messageSuccess {
    display: flex;
    padding: 1vw;
    justify-content: space-between;
    font-family: 'Poppins', sans-serif;
    font-size: 1.5vw;
    background-color: darkseagreen;
    color: white;
  }

  .messageFail {
    display: flex;
    padding: 1vw;
    justify-content: space-between;
    font-family: 'Poppins', sans-serif;
    font-size: 1.5vw;
    background-color: lightcoral;
    color: white;
  }

  input {
    padding: 0.5vw;
    max-width: 50vw;
    height: 2vw;
    font-size: 1.2vw;
    border: 0;
    border-radius: 0.8vw;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 1vw;
  }

  select {
    background-color: white;
    max-width: 50vw;
    height: 2vw;
    font-size: 1.2vw;
    border: 0;
    border-radius: 0.8vw;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 1vw;
  }

  input[type="file"] {
    display: none;
  }

  label {
    font-size: 2vw;
    padding: 0.5vw;
  }

  .form-check-label {
    font-size: 1.5em;

  }

  .form-check {
    display: flex;
    align-items: stretch;

  }

  .form-check-input {
    align-self: flex-end;
  }

  .amenities {
    display: flex;

  }

  .amenitiesForm {
    display: flex;
    /* justify-content: center; */
    padding: 2vw;
    margin: 1.5vw;
    width: 60%;
    border-radius: 1vw;
    flex-direction: column;
    background-color: rgb(170, 192, 175, 0.3);
    font-family: 'Poppins', sans-serif;
    overflow: auto;
  }

  .paymentForm {
    display: flex;
    padding: 2vw;
    margin: 1.5vw;
    width: 40%;
    border-radius: 1vw;
    flex-direction: column;
    background-color: rgb(170, 192, 175, 0.3);
    font-family: 'Poppins', sans-serif;
  }

  .imagePrev {
    max-width: 30vw;
    max-height: 20vw;
    margin-bottom: 1vw;
  }

  .btnSubmit {
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

  .btnCompute {
    background-color: rgb(248, 186, 55);
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

  .btnCompute:hover {
    background-color: rgb(253, 200, 86);
  }

  .btnSubmit:hover {
    background-color: rgba(167, 197, 167);
  }

  .upload {
    text-align: center;
    background-color: rgb(248, 186, 55);
    border: 0;
    padding: 0.5vw;
    max-width: 50vw;
    width: 15vw;
    font-family: "Poppins", sans-serif;
    font-size: 1.5vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
    margin-bottom: 1vw;
  }

  .upload:hover {
    background-color: rgb(253, 200, 86);
  }

  .tblAmenity {

    width: 100%;
    margin-bottom: 2vw;
    overflow-x: auto;
    overflow-y: auto;
    text-align: center;
    margin: 2vw;
    margin-right: 2vw;
  }

  .tblAmenity thead,
  th {
    padding: 0.5vw;
    text-align: center;
    font-size: 1.2vw;
    background-color: rgb(170, 192, 175, 0.3);
    width: max-content;
    white-space: nowrap;
  }

  .tblAmenity td {
    width: max-content;
    white-space: nowrap;
  }

  .tblAmenity tr:hover {
    background-color: rgb(211, 211, 211);
  }

  .treasurer {
    width: 100%;
    display: flex;
  }

  .treasurerPanel {
    flex: 8;
    width: 100%;
    overflow-y: scroll;
  }

  .lblSettings {
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
    background-color: rgba(234, 232, 199, 0.2);
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
    background-color: rgba(234, 232, 199, 0.2);
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

  .tblComplaints {
    margin: 0;
    width: 100%;
    height: 100%;
    max-height: 30px;
  }

  .trComplaints {
    width: 100%;
    color: rgb(89, 89, 89);
    background-color: rgb(241, 241, 241);
    border-bottom: 1px solid rgb(192, 192, 192);
  }

  .trComplaints:hover {
    background-color: rgb(233, 233, 233);
    cursor: pointer;
  }

  .trComplaints td {
    text-align: left;
    padding: 1vw;
    font-size: 1.2vw;
  }

  .trComplaints:hover a {
    color: rgb(233, 233, 233);
  }

  .sender {
    white-space: nowrap;
    font-family: "Poppins", sans-serif;
    font-size: 1.2vw;
    font-weight: bold;
  }

  .complaintDesc {
    max-width: 50vw;
    width: fixed;
    text-align: left;
    font-family: "Poppins", sans-serif;
    font-size: 1vw;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .complaintTime {
    text-align: center;
    font-family: "Poppins", sans-serif;
    font-size: 1vw;
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

  .subject {
    font-weight: 800;
  }

  .modal-header,
  .modalConcernBody {
    background-color: rgba(170, 192, 175, 0.3);
  }

  .modal-footer {
    background-color: rgba(170, 192, 175, 0);
  }

  .renter-name {
    font-weight: bold;
  }

  .availed-amenity-list {
    table-layout: fixed;
    width: 100%;

  }

  .availed-amenity-list td {
    padding: 1vw;
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
</style>
<script type="text/javascript">
</script>

<body>
  <div class="treasurer">
    <div class="sideBar">
      <?php require '../marginals/sidebarAdmin.php'; ?>
    </div>

    <div class="treasurerPanel">
      <label class="lblSettings" id="amenity">Monthly Dues Payment</label>
      <div class="complaintManagement">
        <div class="inboxContainer">
          <table class="tblComplaints">
            <?php while ($row = $resultTransaction->fetch_assoc()) : ?>
              <tr class="trComplaints">
                <!-- <td class="use-address" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                                    echo $row['transaction_id']
                                                                                                    ?>"><?php echo $row['transaction_id'] ?></td> -->
                <td class="renter-name" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                              echo $row['transaction_id']
                                                                                              ?>"><?php echo $row['name'] ?></td>
                <td class="use-address" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                              echo $row['transaction_id']
                                                                                              ?>"><?php echo $row['total_cost'] ?></td>
                <td class="use-address" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                              echo $row['transaction_id']
                                                                                              ?>"><?php echo $row['status'] ?></td>
              </tr>
            <?php endwhile; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php while ($row1 = $resultBillConsumer->fetch_assoc()) : ?>
    <form action="" method="POST">
      <div class="modal fade" id="complaintModal<?php
                                                echo $row1['transaction_id'];
                                                ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <?php $resultBillConsumer2 = $con->query("SELECT * FROM bill_consumer, billing_period WHERE transaction_id = " . $row1['transaction_id'] . " AND billing_period.billingPeriod_id = bill_consumer.billingPeriod_id"); ?>
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">
                Monthly Dues Payment Details
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modalConcernBody">
              <table class="availed-amenity-list">
                <tr>
                  <input type="hidden" name="transaction_id" value="<?php echo $row1['transaction_id'] ?>">
                </tr>
                <tr>
                  <td style="font-weight: bold;">Name: </td>
                  <td id="" colspan="5"><?php echo $row1['name'] ?></td>
                </tr>
                <tr>
                <td id="" style="font-weight: bold;">Name</td>
                  <td id="" style="font-weight: bold;">Month</td>
                  <td id="" style="font-weight: bold;">Year</td>
                  <td id="" style="font-weight: bold;">Amount</td>
                  <td id="" style="font-weight: bold;">Status</td>
                </tr>
                <?php while ($row2 = $resultBillConsumer2->fetch_assoc()) : ?>
                  <input type="hidden" name="concern_id" value="<?php echo $row2['billConsumer_id'] ?>">
                  <tr>
                  <td id=""><?php echo $row2['fullname'] ?></td>
                    <td id=""><?php echo $row2['month'] ?></td>
                    <td id=""><?php echo $row2['year'] ?></td>
                    <td id=""><?php echo $row2['amount'] ?></td>
                    <td id=""><?php echo $row2['status'] ?></td>
                  <?php endwhile; ?>
                  <tr>
                    <td style="font-weight: bold;">Total Cost:</td>
                    <td><?php echo $row1['total_cost'] ?></td>
                  </tr>
                  <tr>
                    <td>Payment Proof:</td>
                    <td>
                      <img class="postImg" <?php
                                            $imageURL = '../media/paymentProof/' . $row1['payment_proof'];
                                            ?> src="<?= $imageURL ?>" alt="">
                      </img>
                    </td>
                  </tr>
              </table>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Close
                </button>
                <button type="submit" name="approveMonthlyDuesPayment" class="btn btn-success">
                  Paid
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  <?php endwhile; ?>
  <script>
    $('#select-all').click(function(event) {
      if (this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
          this.checked = true;
        });
      } else {
        $(':checkbox').each(function() {
          this.checked = false;
        });
      }
    });
  </script>
  <?php
  require '../marginals/footer2.php';
  ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>