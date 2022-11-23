<?php
require '../marginals/topbar.php';
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($mysqli));
$result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <div class="sideBar">
            <?php require '../marginals/sidebarSecretaryPanel.php'; ?>
        </div>
        
        <div class="secretaryPanel">
            <div class="complaintManagement">
                <label class="inboxTitle">Complaints</label>
            <div class="inboxContainer">
                <table class="tblMessage">
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                </table>
            </div>
            </div>
            
        </div>
    </div>
        <?php
        require '../marginals/footer2.php'
            ?>
</body>

</html>