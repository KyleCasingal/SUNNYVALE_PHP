<?php
//ACCOUNT MANAGEMENT SORT, ACTIVATE, DEACTIVATE
$res = $con->query("SELECT * FROM user WHERE account_status = 'Pending' AND email_verified_at IS NOT NULL ORDER  by user_id ASC") or die($mysqli->error);
$status_filter = $_POST['status_filter'] ?? '';
if (isset($_POST['filterButton'])) {
    if ($status_filter == 'Pending') {
        $res = $con->query("SELECT * FROM user WHERE account_status = 'Pending' AND email_verified_at IS NOT NULL ORDER  by user_id ASC") or die($mysqli->error);
    } elseif ($status_filter == 'Activated') {
        $res = $con->query("SELECT * FROM user WHERE account_status = 'Activated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
    } elseif ($status_filter == 'Deactivated') {
        $res = $con->query("SELECT * FROM user WHERE account_status = 'Deactivated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
    }
}

if (isset($_POST['activate'])) {
    if (isset($_POST['checkbox'])) {
        foreach ($_POST['checkbox'] as $user_id) {
            $sql = "UPDATE user SET account_status = 'Activated' WHERE user_id = '$user_id'";
            $result = mysqli_query($con, $sql);
        }
        if ($status_filter == 'Pending') {
            $res = $con->query("SELECT * FROM user WHERE account_status = 'Pending' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        } else if ($status_filter == 'Activated') {
            $res = $con->query("SELECT * FROM user WHERE account_status = 'Activated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        } else if ($status_filter == 'Deactivated') {
            $res = $con->query("SELECT * FROM user WHERE account_status = 'Deactivated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        }
    }
} else if (isset($_POST['deactivate'])) {
    if (isset($_POST['checkbox'])) {
        foreach ($_POST['checkbox'] as $user_id) {
            $sql = "UPDATE user SET account_status = 'Deactivated' WHERE user_id = '$user_id'";
            $result = mysqli_query($con, $sql);
        }
    }
    if ($status_filter == 'Pending') {
        $res = $con->query("SELECT * FROM user WHERE account_status = 'Pending' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
    } else if ($status_filter == 'Activated') {
        $res = $con->query("SELECT * FROM user WHERE account_status = 'Activated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
    } else if ($status_filter == 'Deactivated') {
        $res = $con->query("SELECT * FROM user WHERE account_status = 'Deactivated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</style>


<body>
    <div class="secretary">
        <div class="secretarySideBar">
            <form method="post">
                <ul class="secretarySideBar">
                    <li id="registration" onclick="location.href='../modules/homeownerRegistration.php'">Homeowner Registration</li>
                    <li id="approval" onclick="location.href='../modules/accManagement.php'">Approval of Accounts</li>
                    <li id="ticket" onclick="location.href='../modules/complaintManagement.php'">Complaint Tickets</li>
                    <li id="settings" onclick="">Settings</li>
                </ul>
            </form>
        </div>
    </div>
</body>

</html>