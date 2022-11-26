<?php
require '../marginals/topbar.php';
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

    .settings {
        display: none;
    }

    .tblRegForm td,
    .tblRegForm input,
    .tblRegForm select {
        color: rgb(89, 89, 89);
        font-size: 1.2vw;
        border: none !important;
        text-align: left;
    }

    .addAmenityForm {

        background-color: rgba(234, 232, 199, 0.2);
        margin: 2vw;
        border-radius: 1vw;
        padding: 2vw;
    }

    .tblAmenityForm td {
        color: rgb(89, 89, 89);
        font-size: 1.2vw;
        border: none !important;
        text-align: left;
    }

    .tblAmenityForm input,
    .tblAmenityForm select {
        background-color: white;
        color: rgb(89, 89, 89) !important;
    }

    .tblAmenity {
        width: 100%;
        margin: 0;
    }

    .tblAmenity th,
    .tblAmenity td {
        text-align: center;
        border: none !important;
        font-size: 1vw;
        overflow-y: auto;
        max-width: 100%;
        max-height: 20vw;
        margin-top: 2vw;
    }

    .tblAmenity tr:hover {
        background-color: rgb(211, 211, 211);
    }

    .tblAmenityContainer {
        padding: 0;
        width: 40%;
        /* border: 1px solid; */
        justify-content: center;
        margin-bottom: 2vw;
        margin-left: 2vw;
        margin-right: 0;
        overflow-y: auto;
        overflow-x: hidden;
        max-height: 20vw;
    }

    .settingsAddAmenity {
        width: 100%;
        display: flex;
        border-bottom: solid 1px rgb(211, 211, 211);
    }

    .settingsAddSubdivision {
        width: 100%;
        display: flex;
        border-bottom: solid 1px rgb(211, 211, 211);
    }

    .settingsMonthlyDues {
        width: 100%;
        display: flex;
        border-bottom: solid 1px rgb(211, 211, 211);
    }

    .settingsSystemAccounts {
        width: 100%;
        display: flex;
        border-bottom: solid 1px rgb(211, 211, 211);
    }

    .settingsOfficers {
        width: 100%;
        display: flex;
        border-bottom: solid 1px rgb(211, 211, 211);
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

    .buttonArea {
        margin: 2vw;
        display: flex;
        flex-direction: column;
    }
</style>


<body>

    <div class="secretary">
        <div class="sideBar">
            <?php require '../marginals/sidebarSecretaryPanel.php'; ?>
        </div>
        <div class="secretaryPanel">
            <form method="post">
                <label class="lblSettings" id="amenity">Amenities</label>
                <div class="settingsAddAmenity" id="AddAmenity">
                    <div class="addAmenityForm">
                        <table class="tblAmenityForm">
                            <tr>
                                <td>Amenity:</td>
                                <td>
                                    <input type="text" placeholder="new amenity" />
                                </td>
                            </tr>
                            <tr>
                                <td>Amenity Rate Per Hour:</td>
                                <td>
                                    <input type="text" placeholder="rate per hour" />
                                </td>
                            </tr>
                            <tr>
                                <td>Availability:</td>
                                <td>
                                    <select name="" id="">
                                        <option value="Available">Available</option>
                                        <option value="Unavailable">Unavailable</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="btnArea">
                            <button type="submit" class="btnSubmitReg">
                                Add amenity
                            </button>

                            <button type="submit" class="btnClearReg">
                                Update Amenity
                            </button>
                        </div>
                    </div>
                    <div class="tblAmenityContainer">
                        <table class="table tblAmenity">
                            <thead>
                                <th>Amenity</th>
                                <th>Rate</th>
                                <th>Availabiliity</th>
                            </thead>
                            <tr>
                                <td>BasketBall Court</td>
                                <td>150</td>
                                <td>Available</td>
                            </tr>
                            <tr>
                                <td>Multi-purpose hall</td>
                                <td>200</td>
                                <td>Available</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <label class="lblSettings">Subdivisions</label>
                <div class="settingsAddSubdivision">
                    <div class="addAmenityForm">
                        <table class="tblAmenityForm">
                            <tr>
                                <td>Subdivision:</td>
                                <td>
                                    <input type="text" placeholder="new subdivision" />
                                </td>
                            </tr>
                            <tr>
                                <td>Barangay:</td>
                                <td>
                                    <input type="text" placeholder="barangay" />
                                </td>
                            </tr>
                        </table>
                        <div class="btnArea">
                            <button type="submit" class="btnSubmitReg">
                                Add Subdivision
                            </button>

                            <button type="submit" class="btnClearReg">
                                Update Subdivision
                            </button>
                        </div>
                    </div>
                    <div class="tblAmenityContainer">
                        <table class="table tblAmenity">
                            <thead>
                                <th>Subdivision</th>
                                <th>Barangay</th>
                            </thead>
                            <tr>
                                <td>Sunnyvale 1</td>
                                <td>Pantok</td>
                            </tr>
                            <tr>
                                <td>Sunnyvale 2</td>
                                <td>Palangoy</td>
                            </tr>
                            <tr>
                                <td>Sunnyvale 3</td>
                                <td>Palangoy</td>
                            </tr>
                            <tr>
                                <td>Sunnyvale 4</td>
                                <td>Pantok</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <label class="lblSettings">Monthly Dues</label>
                <div class="settingsMonthlyDues">
                    <div class="addAmenityForm">
                        <table class="tblAmenityForm">
                            <tr>
                                <td>Subdivision:</td>
                                <td>
                                    <select name="" id="">
                                        <option value="Sunnyvale 1">Sunnyvale 1</option>
                                        <option value="Sunnyvale 2">Sunnyvale 2</option>
                                        <option value="Sunnyvale 3">Sunnyvale 3</option>
                                        <option value="Sunnyvale 4">Sunnyvale 4</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Monthly Dues Amount:</td>
                                <td>
                                    <input type="text" placeholder="monthly rate" />
                                </td>
                            </tr>

                        </table>
                        <div class="btnArea">
                            <button type="submit" class="btnSubmitReg">
                                Add amount
                            </button>

                            <button type="submit" class="btnClearReg">
                                Update Amount
                            </button>
                        </div>
                    </div>
                    <div class="tblAmenityContainer">
                        <table class="table tblAmenity">
                            <thead>
                                <th>Subdivision</th>
                                <th>Amount</th>
                                <th>Updated at</th>
                            </thead>
                            <tr>
                                <td>Sunnyvale 1</td>
                                <td>200</td>
                                <td>11/24/2022</td>
                            </tr>
                            <tr>
                                <td>Sunnyvale 2</td>
                                <td>200</td>
                                <td>11/19/2022</td>
                            </tr>
                            <tr>
                                <td>Sunnyvale 3</td>
                                <td>200</td>
                                <td>11/22/2022</td>
                            </tr>
                            <tr>
                                <td>Sunnyvale 4</td>
                                <td>200</td>
                                <td>11/16/2022</td>
                            </tr>

                        </table>
                    </div>
                </div>

                <label class="lblSettings">System Accounts</label>
                <div class="settingsSystemAccounts">
                    <div class="addAmenityForm">
                        <table class="tblAmenityForm">
                            <tr>
                                <td>System Account:</td>
                                <td>
                                    <input type="text" placeholder="account name" />
                                </td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td>
                                    <input type="text" placeholder="password" />
                                </td>
                            </tr>
                            <tr>
                                <td>Confirm Password:</td>
                                <td>
                                    <input type="text" placeholder="password" />
                                </td>
                            </tr>
                            <tr>
                                <td>Account Type:</td>
                                <td>
                                    <select name="" id="">
                                        <option value="Admin">Admin</option>
                                        <option value="Secretary">Secretary</option>
                                        <option value="Treasurer">Treasurer</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="btnArea">
                            <button type="submit" class="btnSubmitReg">
                                Add Officer
                            </button>

                            <button type="submit" class="btnClearReg">
                                Update Officer
                            </button>
                        </div>
                    </div>
                    <div class="tblAmenityContainer">
                        <table class="table tblAmenity">
                            <thead>
                                <th>Account Name</th>
                                <th>Password</th>
                                <th>Account Type</th>
                            </thead>
                            <tr>
                                <td>SV1_Admin</td>
                                <td>*********</td>
                                <td>Admin</td>
                            </tr>
                            <tr>
                                <td>SV1_Secretary</td>
                                <td>*********</td>
                                <td>Secretary</td>
                            </tr>
                            <tr>
                                <td>SV1_Treasurer</td>
                                <td>*********</td>
                                <td>Secretary</td>
                            </tr>
                            <tr>
                                <td>SV2_Admin</td>
                                <td>*********</td>
                                <td>Admin</td>
                            </tr>
                            <tr>
                                <td>SV2_Secretary</td>
                                <td>*********</td>
                                <td>Secretary</td>
                            </tr>
                            <tr>
                                <td>SV2_Treasurer</td>
                                <td>*********</td>
                                <td>Treasurer</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <label class="lblSettings">Subivision Officers</label>
                <div class="settingsOfficers">
                    <div class="addAmenityForm">
                        <table class="tblAmenityForm">
                            <tr>
                                <td>Officer Name:</td>
                                <td>
                                    <input type="text" placeholder="officer name" />
                                </td>
                            </tr>
                            <tr>
                                <td>Subdivision:</td>
                                <td>
                                    <select name="" id="">
                                        <option value="Sunnyvale 1">Sunnyvale 1</option>
                                        <option value="Sunnyvale 2">Sunnyvale 2</option>
                                        <option value="Sunnyvale 3">Sunnyvale 3</option>
                                        <option value="Sunnyvale 4">Sunnyvale 4</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Position:</td>
                                <td>
                                    <select name="" id="">
                                        <option value="President">President</option>
                                        <option value="Vice President">VicePresident</option>
                                        <option value="Secretary">Secretary</option>
                                        <option value="Treasurer">Treasurer</option>
                                        <option value="Auditor">Auditor</option>
                                        <option value="PIO">PIO</option>
                                        <option value="Sgt.at Arms">Sgt.at Arms</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="btnArea">
                            <button type="submit" class="btnSubmitReg">
                                Add account
                            </button>

                            <button type="submit" class="btnClearReg">
                                Update Account
                            </button>
                        </div>
                    </div>
                    <div class="tblAmenityContainer">
                        <table class="table tblAmenity">
                            <thead>
                                <th>Officer Name</th>
                                <th>Subdivision</th>
                                <th>Position</th>
                            </thead>
                            <tr>
                                <td>Sadie Wheeler</td>
                                <td>Sunnyvale 1</td>
                                <td>President</td>
                            </tr>
                            <tr>
                                <td>Bennett Cooke</td>
                                <td>Sunnyvale 1</td>
                                <td>Vice President</td>
                            </tr>
                            <tr>
                                <td>Martin Craig</td>
                                <td>Sunnyvale 1</td>
                                <td>Secretary</td>
                            </tr>
                            <tr>
                                <td>Audrey Benson</td>
                                <td>Sunnyvale 1</td>
                                <td>Treasurer</td>
                            </tr>
                            <tr>
                                <td>Ruth Walsh</td>
                                <td>Sunnyvale 1</td>
                                <td>Auditor</td>
                            </tr>
                            <tr>
                                <td>Hadley Steele</td>
                                <td>Sunnyvale 1</td>
                                <td>PIO</td>
                            </tr>
                            <tr>
                                <td>Hadley Steele</td>
                                <td>Sunnyvale 1</td>
                                <td>Sgt.at Arms</td>
                            </tr>
                        </table>
                    </div>
                </div>
        </div>
        </form>
    </div>
    <?php
    require '../marginals/footer2.php'
        ?>
</body>

</html>