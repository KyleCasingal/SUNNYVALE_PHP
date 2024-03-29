<?php
require '../marginals/topbar.php';
if ($_SESSION['user_type'] != 'Treasurer' and $_SESSION['user_type'] != 'Admin' and $_SESSION['user_type'] != 'Super Admin') {
    echo '<script>window.location.href = "../modules/blogHome.php";</script>';
    exit;
}

if ($_SESSION['subdivision'] != '') {
    $result0 = $con->query("SELECT * FROM subdivision WHERE subdivision_name = '" .  $_SESSION['subdivision'] . "' ORDER BY subdivision_id ASC ");
} else {
    $result0 = $con->query("SELECT * FROM subdivision ORDER BY subdivision_id ASC");
}
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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


    .renter-name {
        font-weight: bold;
    }

    .availed-amenity-list {
        table-layout: fixed;
        width: 100%;

    }

    .availed-amenity-list td {
        padding: 0.5vw;
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

    .postImg {
        max-width: 20vw;
        max-height: 20vw;
    }

    .modal-footer {
        background-color: rgba(170, 192, 175, 0.3);
    }

    .receipt-head {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .receipt-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding-top: 1.5em;
    }

    .head-title {
        font-weight: bold;
        font-size: 1.2em;
    }

    .head-subtext {
        font-weight: normal;
        font-size: 0.7em;
    }

    .receipt-table {
        width: 100%;
        font-size: 0.8em;
    }

    .receipt-table tbody {
        border: 1px solid black;
    }

    .receipt-table th {
        border: 1px solid black;
        font-size: 1em;
    }

    .receipt-table td,
    th {
        padding: 0.5em;
    }

    .amount-td,
    .total-amount-td {
        border: 1px solid black;
        text-align: center;
    }

    .amount-total-label {
        border: 1px solid black;
        text-align: right;
    }

    .modal-body {
        width: 80%;
        align-self: center;
        justify-self: center;
    }

    .receipt-content {
        text-align: center;
    }

    .receipt-label {
        font-size: 1em;
        font-weight: bold;
        align-self: flex-start;
    }

    .receipt-text {
        font-size: 1em;
        font-weight: normal;
    }

    .receipt-number {
        align-self: flex-start;
        margin: 0;
    }

    .receipt-date {
        align-self: flex-start;
        padding-bottom: 0.5rem;
    }

    .receipt-transaction {
        align-self: flex-start;
        margin: 0;
    }

    @media only print {

        title,
        .navigation,
        .topleft,
        .topbarNav,
        .footer,
        .treasurer,
        .modal-footer,
        .modal-header {
            visibility: hidden;
        }

        .modal-body {
            visibility: visible;
        }
    }

    .btn-primary {
        float: right;
    }
</style>
<script>
    // if (window.history.replaceState) {
    //     window.history.replaceState(null, null, window.location.href);
    // }

    $(document).ready(function() {
        $("#subdivisionSticker").on('click', function() {
            var subdivisionSticker = $(this).val();
            if (subdivisionSticker) {
                $.ajax({
                    type: 'POST',
                    url: '../process.php/',
                    data: 'subdivisionSticker=' + subdivisionSticker,
                    success: function(html) {
                    }
                });
            }
        });
    });

    $(document).ready(function() {
        $("#quantity1").on('click', function() {
            var quantity1 = $(this).val();
            if (quantity1) {
                $.ajax({
                    type: 'POST',
                    url: '../process.php/',
                    data: 'quantity1=' + quantity1,
                    success: function(html) {
                        $("#cost1").html(html);
                    }
                });
            }
        });
    });
</script>

<body>
    <div class="treasurer">
        <div class="sideBar">
            <?php require '../marginals/sidebarAdmin.php'; ?>
        </div>

        <div class="treasurerPanel">
            <label class="lblSettings" id="amenity">Vehicle Sticker</label>
            <form action="" method="POST">
                <div class="amenitiesForm">

                    <div class="Sticker">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            Buy Sticker for Vehicle
                        </h5>
                    </div>
                    <div class="modalConcernBody">
                        <div class="concernSubject">
                            <label class="lbl-concern-text">Subdivision:</label>
                            <select name="tblFilter" class="noprint" id="subdivisionSticker" onclick="myFunction1()">
                                <option value="">Select...</option>
                                <?php
                                while ($row0 = $result0->fetch_assoc()) {
                                    echo '<option value="' . $row0['subdivision_name'] . '">' . $row0['subdivision_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="concernSubject">
                            <label class="lbl-concern-text">Quantity:</label>
                            <input type="number" value="0" min="00" name="quantity1" id="quantity1" class="subjectText" required>
                        </div>
                        <div class="concernSubject">
                            <label class="lbl-concern-text">Total Cost:</label>
                            <input name="total_cost1" id="cost1" class="subjectText" value="0" required readonly>
                        </div>

                        <button type="submit" name="stickerVehicleAdmin" class="btn btn-primary">
                            Buy
                        </button>
                    </div>
                </div>
        </div>
    </div>


    <script>
        document.getElementById("quantity").addEventListener("keydown", e => e.keyCode != 38 && e.keyCode != 40 && e.preventDefault());
    </script>
    <?php
    require '../marginals/footer2.php';
    ?>

</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->

</html>