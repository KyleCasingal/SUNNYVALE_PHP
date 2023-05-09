<?php
require '../marginals/topbar.php';
if ($_SESSION['user_type'] != 'Homeowner' and $_SESSION['user_type'] != 'Tenant') {
    echo '<script>window.location.href = "../modules/blogHome.php";</script>';
    exit;
}
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
if ($_SESSION['user_type'] == 'Tenant') {
    $result = $con->query("SELECT * FROM user, tenant WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND user_tenant_id = tenant_id") or die($mysqli->error);
    $row = $result->fetch_assoc();
    $user_idAmenityRenting = $row['user_id'];
    $homeowner_id = $row['homeowner_id'];
} else {
    $result = $con->query("SELECT * FROM user, homeowner_profile WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
    $row = $result->fetch_assoc();
    $user_idAmenityRenting = $row['user_id'];
    $homeowner_id = $row['homeowner_id'];
}

$resultComplaints = $con->query("SELECT * FROM concern WHERE complainant_homeowner_id = '$homeowner_id' OR complainee_homeowner_id = '$homeowner_id' AND status = 'Processing' ORDER BY datetime DESC");
$resultComplaints1 = $con->query("SELECT * FROM concern WHERE complainant_homeowner_id = '$homeowner_id' OR complainee_homeowner_id = '$homeowner_id' AND status = 'Processing' ORDER BY datetime DESC");
$resultBillConsumer = $con->query("SELECT * FROM bill_consumer INNER JOIN billing_period ON bill_consumer.billingPeriod_id = billing_period.billingPeriod_id  WHERE homeowner_id = '$homeowner_id' AND status = 'UNPAID' || status = 'PENDING' ORDER BY billing_period.billingPeriod_id DESC");
$resultBillConsumer1 = $con->query("SELECT * FROM bill_consumer INNER JOIN billing_period ON bill_consumer.billingPeriod_id = billing_period.billingPeriod_id  WHERE homeowner_id = '$homeowner_id' AND status = 'UNPAID' || status = 'PENDING' ORDER BY billing_period.billingPeriod_id DESC");
$resultTransaction = $con->query("SELECT * FROM transaction WHERE user_id = '$user_idAmenityRenting' AND (status = 'Pending' OR status = 'Approved') AND transaction_type = 'Amenity Renting'");
$resultTransactionAmenity = $con->query("SELECT * FROM amenity_renting WHERE user_id = '$user_idAmenityRenting' AND (cart = 'Pending' OR cart = 'Approved')");
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


    thead {
        top: 0;
        position: sticky;
        text-align: center;
        background-color: rgb(251, 250, 244);
    }

    td,
    th {
        color: rgb(89, 89, 89);
        font-size: 1.2vw;
        border-style: none !important;
        text-align: left;
        width: min-content;
        padding: 0.8vw;
        border: 1px solid lightgray;
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

    .inbox {
        overflow: hidden;
        margin: 2vw;
        justify-content: center;
        align-items: center;
    }

    .inboxContainer {
        margin: 2vw;
        padding: 2vw;
        padding-left: 0;
        padding-right: 0;
        border-radius: 1vw;
        background-color: rgb(219, 217, 217);
        display: flex;
        width: 95%;
        height: 70vh;
        overflow-x: hidden;
        overflow-y: scroll;
    }

    .tblMessage {
        width: 100%;
        height: 100%;
        max-height: 30px;
    }

    .trInbox {
        color: rgb(89, 89, 89);
        background-color: rgb(219, 217, 217);
        border-bottom: 1px solid rgb(192, 192, 192);
    }

    .trInbox:hover {
        background-color: rgb(233, 233, 233);
        cursor: pointer;
    }

    .msgSender {
        white-space: nowrap;
        font-family: "Poppins", sans-serif;
        font-size: 1.2vw;
        font-weight: bold;
    }

    .msgDesc {
        max-width: 50vw;
        width: fixed;
        text-align: left;
        font-family: "Poppins", sans-serif;
        font-size: 1vw;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .msgTime {
        text-align: center;
        font-family: "Poppins", sans-serif;
        font-size: 1vw;
    }

    .inboxPanel {
        flex: 8;
        width: 100%;
        display: block;

    }

    .inboxTitle {
        margin-top: 1vw;
        margin-left: 2vw;
        font-size: 2vw;
        font-family: "Poppins", sans-serif;
        padding: 0;
        color: rgb(89, 89, 89);
        font-weight: 800;
    }

    .subject {
        font-weight: 800;
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

    .modal-header,
    .modal-footer {
        background-color: rgb(170, 192, 175, 0.3);
    }
</style>

<body>
    <div class="member">
        <div class="sideBar">
            <?php require '../marginals/sidebarMemberPanel.php'; ?>
        </div>

        <div class="inboxPanel" id="inbox">
            <label class="inboxTitle">Messages</label>
            <div class="inboxContainer">
                <table class="tblMessage">
                    <?php while ($rowTransaction = $resultTransaction->fetch_assoc()) : ?>
                        <tr class="trInbox">
                            <td class="subject" data-bs-toggle="modal" data-bs-target="#transactionAmenity<?php
                                                                                                            echo $rowTransaction['transaction_id']
                                                                                                            ?>">Transaction</label>

                            <td class="subject" data-bs-toggle="modal" data-bs-target="#transactionAmenity<?php
                                                                                                            echo $rowTransaction['transaction_id']
                                                                                                            ?>"><?php
                                                                                                                echo $rowTransaction['transaction_type']
                                                                                                                ?></label>
                            <td></td>
                            <td></td>
                            <td class="msgDesc" data-bs-toggle="modal" data-bs-target="#transactionAmenity<?php
                                                                                                            echo $rowTransaction['transaction_id']
                                                                                                            ?>"><?php
                                                                                                                echo $rowTransaction['status']
                                                                                                                ?></label>
                        </tr>
                    <?php endwhile; ?>
                    <?php while ($rowBillConsumer = $resultBillConsumer->fetch_assoc()) : ?>
                        <tr class="trInbox">
                            <td class="subject" data-bs-toggle="modal" data-bs-target="#billConsumer<?php
                                                                                                    echo $rowBillConsumer['billConsumer_id']
                                                                                                    ?>">Monthly Due</label>
                            <td class="msgDesc" data-bs-toggle="modal" data-bs-target="#billConsumer<?php
                                                                                                    echo $rowBillConsumer['billConsumer_id']
                                                                                                    ?>"><?php
                                                                                                        echo $rowBillConsumer['month']
                                                                                                        ?></label>
                            <td class="msgDesc" data-bs-toggle="modal" data-bs-target="#billConsumer<?php
                                                                                                    echo $rowBillConsumer['billConsumer_id']
                                                                                                    ?>"><?php
                                                                                                        echo $rowBillConsumer['year']
                                                                                                        ?></label>
                            <td></td>
                            <td class="msgDesc" data-bs-toggle="modal" data-bs-target="#billConsumer<?php
                                                                                                    echo $rowBillConsumer['billConsumer_id']
                                                                                                    ?>"><?php
                                                                                                        echo $rowBillConsumer['status']
                                                                                                        ?></label>
                        </tr>
                    <?php endwhile; ?>
                    <?php while ($row = $resultComplaints->fetch_assoc()) : ?>
                        <tr class="trInbox">
                            <?php if ($row['complainee_homeowner_id'] != $homeowner_id) { ?>
                                <td class="subject" data-bs-toggle="modal" data-bs-target="#complaintStatus<?php
                                                                                                            echo $row['concern_id']
                                                                                                            ?>">Complaint</label>
                                <td class="subject" data-bs-toggle="modal" data-bs-target="#complaintStatus<?php
                                                                                                            echo $row['concern_id']
                                                                                                            ?>"><?php echo $row['concern_subject'] ?></label>
                                <td class="msgDesc use-address" data-bs-toggle="modal" data-bs-target="#complaintStatus<?php
                                                                                                                        echo $row['concern_id']
                                                                                                                        ?>"><?php echo $row['concern_description']; ?></td>

                            <?php } else { ?>
                                <td class="subject" data-bs-toggle="modal" data-bs-target="#complaintStatus<?php
                                                                                                            echo $row['concern_id']
                                                                                                            ?>">You have received a complaint</label>
                                <td></td>
                                <td></td>
                            <?php } ?>

                            <td class=" msgTime" data-bs-toggle="modal" data-bs-target="#complaintStatus<?php
                                                                                                        echo $row['concern_id']
                                                                                                        ?>"><?php $datetime = strtotime($row['datetime']);
                                                                                                            echo $phptime = date("g:i A m/d/y", $datetime); ?></td>
                            <td class="use-address" data-bs-toggle="modal" data-bs-target="#complaintStatus<?php
                                                                                                            echo $row['concern_id']
                                                                                                            ?>"> <?php echo $row['status']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
    <?php
    require '../marginals/footer2.php'
    ?>
    <?php while ($row1 = $resultTransactionAmenity->fetch_assoc()) : ?>
        <div class="modal fade" id="transactionAmenity<?php
                                                        echo $row1['transaction_id']
                                                        ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <?php $resultAmenityRenting2 = $con->query("SELECT * FROM amenity_renting, amenity_purpose WHERE amenity_renting.transaction_id = " . $row1['transaction_id'] . " AND amenity_renting.amenity_purpose = amenity_purpose.amenity_purpose_id"); ?>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            Amenity Renting
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modalConcernBody">
                        <table>
                            <tr>
                                <input type="hidden" name="transaction_id" value="<?php echo $row1['transaction_id'] ?>">
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Renter Name: </td>
                                <td id="" colspan="5"><?php echo $row1['renter_name'] ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Status: </td>
                                <td id="" colspan="5"><?php echo $row1['cart'] ?></td>
                            </tr>
                            <tr>
                                <td id="" style="font-weight: bold;">Subdivision</td>
                                <td id="" style="font-weight: bold;">Amenity</td>
                                <td id="" style="font-weight: bold;">Purpose</td>
                                <td id="" style="font-weight: bold;">From</td>
                                <td id="" style="font-weight: bold;">To</td>
                                <td id="" style="font-weight: bold;">Cost</td>
                            </tr>
                            <?php while ($row2 = $resultAmenityRenting2->fetch_assoc()) : ?>
                                <input type="hidden" name="concern_id" value="<?php echo $row2['amenity_renting_id'] ?>">
                                <tr>
                                    <td id=""><?php echo $row2['subdivision_name'] ?></td>
                                    <td id=""><?php echo $row2['amenity_name'] ?></td>
                                    <td id=""><?php echo $row2['amenity_purpose'] ?></td>
                                    <td id=""><?php $datetime = strtotime($row2['date_from']);
                                                echo $phptime = date("m/d/y g:i A", $datetime); ?></td>
                                    <td id=""><?php $datetime = strtotime($row2['date_to']);
                                                echo $phptime = date("m/d/y g:i A ", $datetime); ?></td>
                                    <td id=""><?php echo $row2['cost'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php while ($row1 = $resultBillConsumer1->fetch_assoc()) : ?>
        <div class="modal fade" id="billConsumer<?php
                                                echo $row1['billConsumer_id']
                                                ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            Monthly Due
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modalConcernBody">
                        <table>
                            <tr>
                                <input type="hidden" name="concern_id" value="<?php echo $row1['billConsumer_id'] ?>">
                            </tr>
                            <tr>
                                <td>Month:</td>
                                <td id=""><?php echo $row1['month'] ?></td>
                            </tr>
                            <tr>
                                <td>Year:</td>
                                <td id=""><?php echo $row1['year'] ?></td>
                            </tr>
                            <tr>
                                <td>Amount:</td>
                                <td id=""><?php echo $row1['amount'] ?></td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td id=""><?php echo $row1['status'] ?></td>
                            </tr>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php while ($row1 = $resultComplaints1->fetch_assoc()) : ?>
        <div class="modal fade" id="complaintStatus<?php
                                                    echo $row1['concern_id']
                                                    ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            Complaint Report
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modalConcernBody">
                        <table>
                            <tr>
                                <input type="hidden" name="concern_id" value="<?php echo $row1['concern_id'] ?>">
                                <input type="hidden" value="<?php echo $row1['complainee_homeowner_id'] ?? '' ?>">
                            </tr>
                            <?php
                            if ($row1['complainee_homeowner_id'] != $homeowner_id) {
                                echo "<tr>
                                <td>Complainant:</td>
                                <td id=''>" . $row1['full_name'] . "</td>
                            </tr>";
                            } else {
                                echo  "<tr>
                                <td>You have received a complaint</td>
                            </tr>";
                            }
                            ?>
                            <?php
                            if ($row1['complainee_homeowner_id'] != NULL) {
                                echo "<tr>
                                <td>Complainee:</td>
                                <td id=''>" . $row1['complainee_full_name'] ?? '' . "</td>
                            </tr>";
                            } ?>
                            <?php if ($row1['complainee_homeowner_id'] != $homeowner_id) { ?>
                                <tr>
                                    <td>Subject:</td>
                                    <td id=""><?php echo $row1['concern_subject'] ?></td>
                                </tr>
                                <tr>
                                    <td>Complaint Description:</td>
                                    <td id=""><?php echo $row1['concern_description'] ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td>Date Submitted:</td>
                                <td><?php $datetime = strtotime($row1['datetime_submitted']);
                                    echo $phptime = date("g:i A m/d/y", $datetime); ?></td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td><?php echo $row1['status'] ?></td>
                            </tr>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</body>

</html>