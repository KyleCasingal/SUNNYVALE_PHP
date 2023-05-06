<?php
require '../marginals/topbar.php';
if ($_SESSION['user_type'] != 'Admin' and $_SESSION['user_type'] != 'Secretary') {
    echo '<script>window.location.href = "../modules/blogHome.php";</script>';
    exit;
}
$result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $result->fetch_assoc();
$resultComplaints = $con->query("SELECT *, SUM(tenant.homeowner_id) AS total FROM tenant, user WHERE tenant.homeowner_id = user.user_homeowner_id AND tenant.subdivision =  '". $_SESSION['subdivision'] . "'");
$resultComplaints1 = $con->query("SELECT * FROM tenant, user WHERE tenant.homeowner_id = user.user_homeowner_id");
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

    .tbl-tenant-list {
        table-layout: fixed;
    }
</style>


<body>
    <div class="secretary">
        <div class="sideBar">
            <?php require '../marginals/sidebarAdmin.php'; ?>
        </div>

        <div class="secretaryPanel">
            <div class="complaintManagement">
                <label class="inboxTitle">Tenant Management</label>
                <div class="inboxContainer">


                    <table class="tblComplaints">
                        <th>Homeowner Name</th>
                        <th>Total Tenants</th>
                        <?php while ($row = $resultComplaints->fetch_assoc()) : ?>
                            <tr class="trComplaints">

                                <td class="use-address" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                                                echo $row['user_homeowner_id']
                                                                                                                ?>"><?php echo $row['full_name']; ?></td>
                                <td class="use-address" data-bs-toggle="modal" data-bs-target="#complaintModal<?php
                                                                                                                echo $row['user_homeowner_id']
                                                                                                                ?>"><?php echo $row['total'] ?></td>
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
            <div class="modal fade" id="complaintModal<?php
                                                        echo $row1['user_homeowner_id']
                                                        ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <?php $resultComplaints1 = $con->query("SELECT * FROM tenant WHERE homeowner_id = " .  $row1['user_homeowner_id']  . "") ?>
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                List of Tenants
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modalConcernBody">
                            <table class="tbl-tenant-list">
                                <tr>
                                    <td>Homeowner:</td>
                                    <td id=""><?php echo $row1['full_name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tenant Name</td>
                                    <td>Birthdate</td>
                                    <td>Sex</td>
                                    <td>Email</td>
                                    <td>Mobile No.</td>
                                </tr>
                                <?php while ($row1 = $resultComplaints1->fetch_assoc()) : ?>
                                    <tr>
                                        <td id=""><?php echo $row1['full_name'] ?></td>
                                        <td><?php echo $row1['birthdate'] ?></td>
                                        <td><?php echo $row1['sex'] ?></td>
                                        <td><?php echo $row1['email'] ?></td>
                                        <td><?php echo $row1['mobile_no'] ?></td>
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
        </form>
    <?php endwhile; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>