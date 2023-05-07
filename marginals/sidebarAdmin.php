<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        text-align: left;
        margin: 0;
        padding-left: 2vw;
        padding-right: 0.5vw;
        font-size: max(1.5vw, min(10px));
        cursor: pointer;
        border-bottom: 1px solid lightgray;
    }

    .secretarySideBar li:hover {
        background-color: rgb(236, 235, 226);
    }

    .btnSettings {
        padding-right: 1.5vw;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-left: 0;
        color: rgb(89, 89, 89);
        font-family: "Poppins", sans-serif;
        text-align: left;
        font-size: max(1.5vw, min(10px));
        background-color: rgb(0, 0, 0, 0);
        border: none;
        width: 100%;
        height: 100%;

    }

    .btnReports {
        padding-right: 1.5vw;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-left: 0;
        color: rgb(89, 89, 89);
        font-family: "Poppins", sans-serif;
        text-align: left;
        font-size: max(1.5vw, min(10px));
        background-color: rgb(0, 0, 0, 0);
        border: none;
        width: 100%;
        height: 100%;

    }

    .dropdown-menu li {
        font-size: 1vw;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 1vw;
        border: none;
    }
</style>


<body>
    <div class="secretarySideBar">
        <form method="post">
            <ul class="secretarySideBar">
                <?php if ($row['user_type'] != 'Treasurer') { ?>
                    <li id="approval" onclick="location.href='../modules/accManagement.php'">Account Management</li>
                <?php } ?>
                <?php if ($row['user_type'] != 'Secretary') { ?>
                    <li id="facility">
                        <button type="button" class="btnSettings" data-bs-toggle="dropdown" aria-expanded="false">
                            Amenity <i class="fa-sharp fa-solid fa-chevron-right"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li id="Amenities" onclick="location.href='../modules/treasurerPanelFacility.php'">Amenity Renting</li>
                            <li id="Amenities" onclick="location.href='../modules/treasurerPanelReservation.php'">Reservation List</li>
                        </ul>
                    </li>
                    </li>
                <?php } ?>
                <!-- <?php if ($row['user_type'] != 'Secretary' && $row['user_type'] != 'Treasurer') { ?>
                    <li id='Backup'>
                        <button type='button' class='btnReports' data-bs-toggle='dropdown' aria-expanded='false'>
                            Backup<i class='fa-sharp fa-solid fa-chevron-right'></i>
                        </button>
                        <ul class='dropdown-menu'>
                            <li id='Collection Report' onclick="location.href='../BackupRestore/backup.php'" target='_blank'>Backup</li>
                            <li id='Home Owner List' onclick="location.href='../BackupRestore/restore.php'" target='_blank'>Restore</li>
                        </ul>
                    </li>
                <?php } ?> -->
                <?php if ($row['user_type'] != 'Secretary') { ?>
                    <li id="billing" onclick="location.href='../modules/billing.php'">Billing</li>
                <?php } ?>
                <?php if ($row['user_type'] != 'Treasurer') { ?>
                    <li id="ticket" onclick="location.href='../modules/complaintManagement.php'">Complaint Tickets</li>
                <?php } ?>
                <?php if ($row['user_type'] != 'Treasurer') { ?>
                    <li id="settings">
                        <button type="button" class="btnSettings" data-bs-toggle="dropdown" aria-expanded="false">
                            Homeowner <i class="fa-sharp fa-solid fa-chevron-right"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li id="Subdivision" onclick="location.href='../modules/homeownerRegistration.php'">Homeowner Registration</li>
                            <li id="Amenities" onclick="location.href='../modules/homeownerlist.php'">Registered Homeowners</li>
                            <li id="Amenities" onclick="location.href='../modules/tenantManagement.php'">Tenant Management</li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($row['user_type'] != 'Secretary') { ?>
                    <li>
                        <button type="button" class="btnReports" data-bs-toggle="dropdown" aria-expanded="false">
                            Monthly Dues <i class="fa-sharp fa-solid fa-chevron-right"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li id="dues" onclick="location.href='../modules/treasurerPanel.php'">Monthly Dues</li>
                            <li id="Amenities" onclick="location.href='../modules/monthlyDuesTransaction.php'">Monthly Dues Transaction</li>
                        </ul>
                    </li>

                <?php } ?>
                <?php if ($row['user_type'] != 'Treasurer') { ?>
                    <li id="reports">
                        <button type="button" class="btnReports" data-bs-toggle="dropdown" aria-expanded="false">
                            Reports <i class="fa-sharp fa-solid fa-chevron-right"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li id="Collection Report" onclick="location.href='../reports/reportAmenities.php'" target="_blank">Collection Report</li>
                            <li id="Home Owner List" onclick="location.href='../reports/reportHomeOwnerList.php'" target="_blank">Home Owner List</li>
                            <li id="Audit Trail" onclick="location.href='../reports/reportAuditTrail.php'" target="_blank">
                                Audit Trail</li>
                        </ul>
                    </li>
                    <li id="settings">
                        <button type="button" class="btnSettings" data-bs-toggle="dropdown" aria-expanded="false">
                            Settings <i class="fa-sharp fa-solid fa-chevron-right"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li id="Amenities" onclick="location.href='../modules/settingsAmenity.php'">Amenities</li>
                            <?php
                            if ($row['user_type'] == 'Super Admin') {
                                echo "<li id='billing-period' onclick=";
                                echo '"';
                                echo "location.href='../modules/settingsBillingPeriod.php'";
                                echo '"';
                                echo ">Billing Period</li>";
                            }
                            ?>
                            <?php
                            if ($row['user_type'] == 'Super Admin') {
                            ?>
                                <li id='Collection Report' onclick="location.href='../Backup/backup.php'" target='_blank'>Backup</li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['user_type'] == 'Admin' or $row['user_type'] == 'Super Admin' or $row['user_type'] == 'Secretary') { ?>
                                <li id="missionVision" onclick="location.href='../modules/settingsContact.php'">Contact Information</li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['user_type'] == 'Super Admin') {
                            ?>
                                <li id="missionVision" onclick="location.href='../modules/settingsMissionVision.php'">Mission/Vision</li>
                            <?php
                            }
                            ?>
                            <li id="MonthlyDues" onclick="location.href='../modules/settingsMonthlydues.php'">Monthly Dues</li>

                            <?php
                            if ($row['user_type'] == 'Super Admin') {
                                echo "<li id='Subdivision' onclick=";
                                echo '"';
                                echo "location.href='../modules/settingsSubdivision.php'";
                                echo '"';
                                echo ">Subdivisions</li>"; ?>
                                <li id="MonthlyDues" onclick="location.href='../modules/settingsPrivacy.php'">Privacy</li>
                            <?php
                            }
                            ?>
                            <li id="Subdivision Officers" onclick="location.href='../modules/settingsSubdivisionOfficer.php'">Subdivision Officers</li>
                            <?php
                            if ($row['user_type'] == 'Admin' or $row['user_type'] == 'Super Admin') {
                                echo "<li id='System Accounts' onclick=";
                                echo '"';
                                echo "location.href='../modules/settingsSystemAcc.php'";
                                echo '"';
                                echo ">System Accounts</li>";
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>