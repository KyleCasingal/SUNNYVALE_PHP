<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
        margin: 0;
        padding-left: 0.5vw;
        padding-right: 0.5vw;
        font-size: max(1.5vw, min(10px));
        cursor: pointer;
        border-bottom: 1px solid lightgray;
    }

    .secretarySideBar li:hover {
        background-color: rgb(236, 235, 226);
    }

    .btnSettings {
        color: rgb(89, 89, 89);
        font-family: "Poppins", sans-serif;
        text-align: center;
        font-size: max(1.5vw, min(10px));
        background-color: rgb(0, 0, 0, 0);
        border: 1px solid black;
        width: 100%;
        height: 100%;

    }
    .btnReports {
        color: rgb(89, 89, 89);
        font-family: "Poppins", sans-serif;
        text-align: center;
        font-size: max(1.5vw, min(10px));
        background-color: rgb(0, 0, 0, 0);
        border: 1px solid black;
        width: 100%;
        height: 100%;

    }
    
</style>


<body>
    <div class="secretarySideBar">
        <form method="post">
            <ul class="secretarySideBar">
                <li id="registration" onclick="location.href='../modules/homeownerRegistration.php'">Homeowner Registration</li>
                <li id="approval" onclick="location.href='../modules/accManagement.php'">Approval of Accounts</li>
                <li id="ticket" onclick="location.href='../modules/complaintManagement.php'">Complaint Tickets</li>
                <li id="settings">
                    <button type="button" class="btnSettings" data-bs-toggle="dropdown" aria-expanded="false">
                        Settings
                    </button>
                    <ul class="dropdown-menu">
                        <li id="Amenities" onclick="location.href='../modules/settingsAmenity.php'">Amenities</li>
                        <li id="Subdivision" onclick="location.href='../modules/settingsSubdivision.php'">Subdivisions</li>
                        <li id="Monthly Dues" onclick="location.href='../modules/settingsMonthlydues.php'">Monthly Dues</li>
                        <li id="System Accounts" onclick="location.href='../modules/settingsSystemAcc.php'">System Accounts</li>
                        <li id="Subdivision Officers" onclick="location.href='../modules/settingsSubdivisionOfficer.php'">Subdivision Officers</li>
                    </ul>
                </li>
    
                <li id="reports">
                <button type="button" class="btnReports" data-bs-toggle="dropdown" aria-expanded="false">
                        Reports
                    </button>
                    <ul class="dropdown-menu">
                        <li id="Collection Report" onclick="location.href='../reports/reportAmenities.php'" target="_blank">Collection Report</li>
                        <li id="Home Owner List" onclick="location.href='../reports/reportMonthlyDues.php'" target="_blank">Home Owner List</li>
                        <li id="Audit Trail" onclick="location.href='../reports/reportAuditTrail.php'" target="_blank">Audit Trail</li>
                    </ul>
                </li>
            </ul>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>