<?php
require '../marginals/topbar.php';
if ($_SESSION['user_type'] != 'Admin' and $_SESSION['user_type'] != 'Secretary' and $_SESSION['user_type'] != 'Super Admin') {
    echo '<script>window.location.href = "../modules/blogHome.php";</script>';
    exit;
}
$result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $result->fetch_assoc();
if ($_SESSION['subdivision'] != '') {
    $resultComplaints = $con->query("SELECT * FROM concern, homeowner_profile WHERE (status = 'Pending' OR status = 'Processing') AND concern.complainant_homeowner_id = homeowner_profile.homeowner_id AND subdivision = '" . $_SESSION['subdivision'] . "'");
} else {
    $resultComplaints = $con->query("SELECT * FROM concern, homeowner_profile WHERE (status = 'Pending' OR status = 'Processing') AND concern.complainant_homeowner_id = homeowner_profile.homeowner_id");
}
$resultComplaints1 = $con->query("SELECT * FROM concern WHERE status = 'Pending' OR status = 'Processing'");
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
        font-family: 'Poppins', sans-serif;
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
        background-color: rgba(234, 232, 199, 0.2);
        width: 90%;
        padding: 2vw;
        margin: 2vw;
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

    .trComplaints a {
        text-decoration: none;
        color: black;
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
</style>


<body>
    <div class="secretary">
        <div class="sideBar">
            <?php require '../marginals/sidebarAdmin.php'; ?>
        </div>

        <div class="secretaryPanel">
            <div class="complaintManagement">
                <label class="inboxTitle">Complaints</label>
                <div class="inboxContainer">


                    <table class="tblComplaints">
                        <?php while ($row = $resultComplaints->fetch_assoc()) : ?>
                            <tr class="trComplaints">
                                <!-- <td class="use-address" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                                                    echo $row['concern_id']
                                                                                                                    ?>"><?php echo $row['concern_id'] ?></td> -->
                                <td class="use-address" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                                                echo $row['concern_id']
                                                                                                                ?>"><?php echo $row['full_name']; ?></td>
                                <td class="use-address" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                                                echo $row['concern_id']
                                                                                                                ?>"><label class="subject"><?php echo $row['concern_subject'] ?></label></td>
                                <td class="use-address" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                                                echo $row['concern_id']
                                                                                                                ?>"><?php echo $row['concern_description']; ?></td>
                                <td id="myBtn" class="complaintTime" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                                                            echo $row['concern_id']
                                                                                                                            ?>"><?php $datetime = strtotime($row['datetime']);
                                                                                                                                echo $phptime = date("g:i A m/d/y", $datetime); ?></td>
                                <td class="use-address" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                                                echo $row['concern_id']
                                                                                                                ?>"><?php echo $row['status']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <?php
    require '../marginals/footer2.php'
    ?>
    <?php while ($row1 = $resultComplaints1->fetch_assoc()) : ?>
        <form action="" method="POST">

            <div class="modal fade " id="complaintModal<?php
                                                        echo $row1['concern_id']
                                                        ?>" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                    <input type="hidden" value="<?php echo $row1['complainant_homeowner_id'] ?>">
                                    <input type="hidden" value="<?php echo $row1['complainee_homeowner_id'] ?? '' ?>">
                                </tr>
                                <tr>
                                    <td>Complainant:</td>
                                    <td id=""><?php echo $row1['full_name'] ?></td>
                                </tr>
                                <?php
                                if ($row1['complainee_homeowner_id'] != NULL) {
                                    echo "<tr>
                                <td>Complainee:</td>
                                <td id=''>" . $row1['complainee_full_name'] ?? '' . "</td>
                            </tr>";
                                } ?>
                                <tr>
                                    <td>Subject:</td>
                                    <td id=""><?php echo $row1['concern_subject'] ?></td>
                                </tr>
                                <tr>
                                    <td>Complaint Description:</td>
                                    <td id=""><?php echo $row1['concern_description'] ?></td>
                                </tr>
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
                                <button type="button" name="concernProcess1" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#processingModal<?php echo $row1['concern_id']; ?>">
                                    Processing
                                </button>
                                <button type="button" name="concernResolved1" class="btn btn-success" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#resolvedModal<?php echo $row1['concern_id']; ?>">
                                    Resolved
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="processingModal<?php echo $row1['concern_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        </div>
                        <div class="modal-body">
                            Do you really want to Process this Complaint?
                        </div>
                        <div class="modal-footer">
                            <button name="concernProcess" type="submit" class="btn btn-success">Yes</button>
                            <button class="btn btn-secondary" data-bs-target="#complaintModal<?php
                                                                                                echo $row1['concern_id'];
                                                                                                ?>" data-bs-toggle="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="resolvedModal<?php echo $row1['concern_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        </div>
                        <div class="modal-body">
                            Do you really want to Resolved this Complaint?
                        </div>
                        <div class="modal-footer">
                            <button name="concernResolved" type="submit" class="btn btn-success">Yes</button>
                            <button class="btn btn-secondary" data-bs-target="#complaintModal<?php
                                                                                                echo $row1['concern_id'];
                                                                                                ?>" data-bs-toggle="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endwhile; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script>
    // $(document).ready(function() {
    //     $("#closeProcess").click(function() {
    //         $('#processing').modal('hide');
    //     });
    // });
</script>

</html>