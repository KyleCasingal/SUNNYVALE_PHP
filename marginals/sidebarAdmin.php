<?php

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
        background-color: rgb(170, 192, 175, 0.3);
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

    
</style>


<body>
        <div class="secretarySideBar">
            <form method="post">
                <ul class="secretarySideBar">
                    <li id="registration" onclick="location.href='../modules/homeownerRegistration.php'">Homeowner Registration</li>
                    <li id="approval" onclick="location.href='../modules/accManagement.php'">Approval of Accounts</li>
                    <li id="ticket" onclick="location.href='../modules/complaintManagement.php'">Complaint Tickets</li>
                    <li id="settings" onclick="location.href='../modules/settings.php'">Settings</li>
                    <li id="reports" onclick="location.href='../modules/reports.php'">Reports</li>
                </ul>
            </form>
        </div>
</body>

</html>