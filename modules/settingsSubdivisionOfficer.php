<?php
require '../marginals/topbar.php';
$result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $result->fetch_assoc();
$resultSubdivision = $con->query("SELECT * FROM subdivision ") or die($mysqli->error);
$resultSubdivision_table = $con->query("SELECT * FROM subdivision ") or die($mysqli->error);
$resultSubdivision_selectOfficers = $con->query("SELECT * FROM subdivision ") or die($mysqli->error);

$resultOfficer = $con->query("SELECT * FROM officers") or die($mysqli->error);

$resultPositions = $con->query("SELECT * FROM positions") or die($mysqli->error);
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

        background-color: rgb(170, 192, 175, 0.3);
        margin: 2vw;
        border-radius: 1vw;
        padding: 2vw;
        width: 50%;
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

    .tblAmenity th {
        background-color: rgb(170, 192, 175, 0.3);
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
        vertical-align: center;
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
        overflow-x: auto;
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

    .btnEdit {
        background-color: orange;
        border: 0;
        padding: 0.5vw;
        max-width: 50vw;
        width: 5vw;
        font-family: "Poppins", sans-sans-serif;
        font-size: .8vw;
        margin-top: 2vw;
        border-radius: 0.8vw;
        cursor: pointer;
        text-decoration: none;
        color: white;
    }

    .secretaryPanel {
        flex: 8;
        width: 100%;
        overflow-x: hidden;
    }

    .regForm {
        background-color: rgb(170, 192, 175, 0.3);
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
        background-color: rgb(170, 192, 175, 0.3);
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
        background-color: rgb(170, 192, 175, 0.3);
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

</style>


<body>
    <div class="secretary">
        <div class="sideBar">
            <?php require '../marginals/sidebarAdmin.php'; ?>
        </div>
        <div class="secretaryPanel">
            <!-- SETTINGS SUBDIVISION OFFICERS -->
            <label class="lblSettings">Subivision Officers</label>
            <div class="settingsOfficers" id="settingsOfficers">
                <div class="addAmenityForm">
                    <form method="post" autocomplete="off">
                        <input type="hidden" name="officer_id" value="<?php echo $officer_id ?? ''; ?>">
                        <table class="tblAmenityForm">
                            <tr>
                                <td>Officer Name:</td>
                                <td>
                                    <input name="officer_name" type="text" value="<?php echo $officer_name ?? ''; ?>" placeholder="officer name" required />
                                </td>
                            </tr>
                            <tr>
                                <td>Subdivision:</td>
                                <td>
                                    <select name="subdivision_name" id="" required>
                                        <option value="">Select...</option>
                                        <?php while ($row = $resultSubdivision_selectOfficers->fetch_assoc()) : ?>
                                            <option value="<?php echo $row['subdivision_name'] ?>" <?php
                                                                                                    if (isset($_GET['officer_id'])) {
                                                                                                        if ($subdivision_name == $row['subdivision_name']) {
                                                                                                            echo 'selected="selected"';
                                                                                                        }
                                                                                                    }
                                                                                                    ?>><?php echo $row['subdivision_name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Position:</td>
                                <td>
                                    <select name="position_name" id="" required>
                                        <option value="">Select...</option>
                                        <?php while ($row = $resultPositions->fetch_assoc()) : ?>
                                            <option value="<?php echo $row['position_name'] ?>" <?php
                                                                                                if (isset($_GET['officer_id'])) {
                                                                                                    if ($position_name == $row['position_name']) {
                                                                                                        echo 'selected="selected"';
                                                                                                    }
                                                                                                }
                                                                                                ?>><?php echo $row['position_name'] ?> </option>
                                        <?php endwhile; ?>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <!-- MODAL ADD SUBDIVISION OFFICER -->
                        <div class="modal fade" id="addOfficer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to add this new officer?
                                    </div>
                                    <div class="modal-footer">
                                        <button name="officerAdd" onclick="location.href = '#settingsOfficers'" type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btnArea">
                            <button type="button" class="btnSubmitReg" data-bs-toggle="modal" data-bs-target="#addOfficer">
                                Add Officer
                            </button>

                            <!-- MODAL UPDATE SUBDIVISION OFFICER -->
                            <div class="modal fade" id="updateOfficer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to updated this existing officer?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="officerUpdate" onclick="location.href = '#settingsOfficers'" type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btnClearReg" data-bs-toggle="modal" data-bs-target="#updateOfficer">
                                Update Officer
                            </button>
                        </div>
                    </form>
                </div>

                <!-- TABLE SUBDIVISION OFFICERS  -->
                <div class="tblAmenityContainer">
                    <table class="table tblAmenity">
                        <thead>
                            <th></th>
                            <th>Subdivision</th>
                            <th>Officer Name</th>
                            <th>Position</th>
                        </thead>
                        <?php while ($row = $resultOfficer->fetch_assoc()) : ?>
                            <tr>
                                <td>
                                    <a href="settingsSubdivisionOfficer.php?officer_id=<?php echo $row['officer_id']; ?>#settingsOfficers" class="btnEdit">Edit</a>
                                </td>
                                <td><?php echo $row['subdivision_name'] ?></td>
                                <td><?php echo $row['officer_name'] ?></td>
                                <td><?php echo $row['position_name'] ?></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>