<?php
require '../marginals/topbar.php';
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
$result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $result->fetch_assoc();
$resultComplaints = $con->query("SELECT * FROM concern WHERE status = 'Pending' OR status = 'Processing' ");



if (isset($_GET['concern_id'])) {
    $concern_id = $_GET['concern_id'];
    $resultConcern = $con->query("SELECT * FROM concern, WHERE concern_id = '$concern_id' AND ");
}
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
                    <?php while ($row = $resultComplaints->fetch_assoc()) : ?>

                        <tr class="trInbox">
                            <td onclick="location.href='inboxPanel.php?concern_id=<?php echo $row['concern_id']; ?>'">
                                OPEN
                            </td>
                            <td class="msgSender" data-bs-toggle="modal" data-bs-target="#complaintStatus"><?php echo $row['full_name']; ?></td>
                            <td class="msgDesc" data-bs-toggle="modal" data-bs-target="#complaintStatus"><label class="subject"><?php echo $row['concern_subject'] ?></label>
                                <?php echo $row['concern_description']; ?>
                            </td>
                            <td class="msgTime" data-bs-toggle="modal" data-bs-target="#complaintStatus"><?php echo $row['datetime'] ?></td>
                        </tr>

                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
    <?php
    require '../marginals/footer2.php'
    ?>
    <div class="modal fade" id="complaintStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <?php $rowConcern = $resultConcern->fetch_assoc(); ?>
                        <tr>
                            <td>Complainant:</td>
                            <td><?php echo $rowConcern['full_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Subject:</td>
                            <td><?php echo $rowConcern['concern_subject'] ?></td>
                        </tr>
                        <tr>
                            <td>Complaint Description:</td>
                            <td> <?php echo $rowConcern['concern_description']; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><?php echo $rowConcern['status']; ?></td>
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
</body>

</html>