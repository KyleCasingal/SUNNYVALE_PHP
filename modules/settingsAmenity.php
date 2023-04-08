<?php
require '../marginals/topbar.php';
$result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $result->fetch_assoc();
$resultSubdivision_selectAmenities = $con->query("SELECT * FROM subdivision") or die($mysqli->error);
$resultSubdivision_selectPurpose = $con->query("SELECT * FROM subdivision") or die($mysqli->error);
$resultAmenities = $con->query("SELECT * FROM amenities ORDER BY subdivision_name ASC, amenity_name") or die($mysqli->error);
$resultPurpose = $con->query("SELECT * FROM amenity_purpose INNER JOIN amenities ON amenity_purpose.amenity_id = amenities.amenity_id ORDER BY subdivision_name ASC, amenity_name") or die($mysqli->error);
$resultAmenities_selectAmenities = $con->query("SELECT * FROM amenities ORDER BY amenity_name ASC") or die($mysqli->error);
if (isset($_GET['amenity_purpose_id'])) {
    $resultAmenities_selectAmenities = $con->query("SELECT * FROM amenities WHERE subdivision_id ='$subdivision_id' ORDER BY amenity_name ASC") or die($mysqli->error);
}
?>

<?php

if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo

    "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Alert!</h4>
                Restore Success
              </div>";
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

    .btnSubmitReg:disabled {
        background-color: rgb(40, 68, 40);
    }

    .btnSubmitReg[disabled]:hover {
        background-color: rgb(40, 68, 40);
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

    .btnClearReg:disabled {
        background-color: rgb(97, 45, 45);
    }

    .btnClearReg[disabled]:hover {
        background-color: rgb(97, 45, 45);
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
<script>
    $(document).ready(function() {
        $("#subdivision_id").on('click', function() {
            var subdivision_id = $(this).val();
            if (subdivision_id) {
                $.ajax({
                    type: 'POST',
                    url: '../process.php/',
                    data: 'subdivision_id=' + subdivision_id,
                    success: function(html) {
                        $("#amenity_id").html(html);
                    }
                });
            }
        });
    });
</script>

<body>
    <div class="secretary">
        <div class="sideBar">
            <?php require '../marginals/sidebarAdmin.php'; ?>
        </div>
        <div class="secretaryPanel">

            <!-- SETTINGS AMENITY -->
            <label class="lblSettings" id="amenity">Amenities</label>
            <div class="settingsAddAmenity" id="AddAmenity">
                <div class="addAmenityForm">
                    <form method="post" autocomplete="off">
                        <input type="hidden" name="amenity_id_settings" value="<?php echo $amenity_id ?? ''; ?>">
                        <table class="tblAmenityForm">
                            <tr>
                                <td>Subdivision:</td>
                                <td>
                                    <select name="subdivision_id" id="" required>
                                        <option value="">Select...</option>
                                        <?php while ($row = $resultSubdivision_selectAmenities->fetch_assoc()) : ?>
                                            <option value="<?php echo $row['subdivision_id'] ?>"<?php
                                                                                                    if (isset($_GET['amenity_id'])) {
                                                                                                        if ($subdivision_id == $row['subdivision_id']) {
                                                                                                            echo 'selected="selected"';
                                                                                                        }
                                                                                                    }
                                                                                                    ?>><?php echo $row['subdivision_name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Amenity:</td>
                                <td>
                                    <input name="newAmenity" value="<?php echo $amenity_name ?? ''; ?>" type="text" placeholder="new amenity" required />
                                </td>
                            </tr>
                            <tr>
                                <td>Availability:</td>
                                <td>
                                    <select name="availability" id="" required>
                                        <option value="">Select...</option>
                                        <option value="Available" <?php
                                                                    if (isset($_GET['amenity_id'])) {
                                                                        if ($availability == "Available") {
                                                                            echo 'selected="selected"';
                                                                        }
                                                                    }
                                                                    ?>>Available</option>
                                        <option value="Unavailable" <?php
                                                                    if (isset($_GET['amenity_id'])) {
                                                                        if ($availability == "Unavailable") {
                                                                            echo 'selected="selected"';
                                                                        }
                                                                    }
                                                                    ?>>Unavailable</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <!--MODAL ADD AMENITY -->
                        <div class="modal fade" id="addAmenityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to add this new amenity?
                                    </div>
                                    <div class="modal-footer">
                                        <button name="amenityAdd" type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btnArea">
                            <button type="button" class="btnSubmitReg" data-bs-toggle="modal" data-bs-target="#addAmenityModal" <?php
                                                                                                                                if ($amenity_id ?? '') {
                                                                                                                                    echo "disabled";
                                                                                                                                } else {
                                                                                                                                    echo "";
                                                                                                                                } ?>>
                                Add amenity
                            </button>

                            <!-- MODAL UPDATE AMENITY -->
                            <div class="modal fade" id="updateAmenityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to update this amenity?
                                        </div>
                                        <div class="modal-footer">
                                            <button name="amenityUpdate" type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btnClearReg" data-bs-toggle="modal" data-bs-target="#updateAmenityModal" <?php
                                                                                                                                    if ($amenity_id ?? '') {
                                                                                                                                        echo "";
                                                                                                                                    } else {
                                                                                                                                        echo "disabled";
                                                                                                                                    } ?>>
                                Update Amenity
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            This will clear all fields!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal" onclick="location.href='settingsAmenity.php'">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" value="" class="btnClearReg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Clear
                            </button>
                        </div>
                    </form>
                </div>

                <!-- SETTINGS AMENITY TABLE -->
                <div class="tblAmenityContainer">
                    <table class="table tblAmenity">
                        <thead>
                            <th></th>
                            <th>Subdivision</th>
                            <th>Amenity</th>
                            <th>Availabiliity</th>
                        </thead>
                        <?php while ($row = $resultAmenities->fetch_assoc()) : ?>
                            <tr>
                                <td>
                                    <a href="settingsAmenity.php?amenity_id=<?php echo $row['amenity_id']; ?>" class="btnEdit">Edit</a>
                                </td>
                                <td>
                                    <?php echo $row['subdivision_name'] ?>
                                </td>
                                <td><?php echo $row['amenity_name'] ?></td>
                                <td><?php echo $row['availability'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
            <div class="secretaryPanel">
                <!-- SETTINGS AMENITY -->
                <label class="lblSettings" id="amenityPurpose">Amenity Purpose</label>
                <div class="settingsAddAmenity" id="addPurpose">
                    <div class="addAmenityForm">
                        <form method="post" autocomplete="off">
                            <input type="hidden" name="amenity_purpose_id" value="<?php echo $amenity_purpose_id ?? ''; ?>">
                            <table class="tblAmenityForm">
                                <tr>
                                    <td>Subdivision:</td>
                                    <td>
                                        <select name="subdivision_name_purpose" id="subdivision_id" required>
                                            <?php
                                            if ($amenity_purpose_id ?? '') {
                                                while ($row = $resultSubdivision_selectPurpose->fetch_assoc()) :
                                                    echo '<option value="' . $row['subdivision_id'] . '"';
                                                    if (isset($_GET['amenity_purpose_id'])) {
                                                        if ($subdivision_id == $row['subdivision_id']) {
                                                            echo 'selected="selected"';
                                                        }
                                                    }
                                                    echo 'disabled>' . $row['subdivision_name'] . '</option>';
                                                endwhile;
                                            } else {
                                                echo '<option value="0">Select...</option>';
                                                while ($row = $resultSubdivision_selectPurpose->fetch_assoc()) :
                                                    echo '<option value="' . $row['subdivision_id'] . '">' . $row['subdivision_name'] . '</option>';
                                                endwhile;
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Amenity:
                                    </td>
                                    <td>
                                        <select name="amenity" id="amenity_id" required>
                                            <?php
                                            if ($amenity_purpose_id ?? '') {
                                                while ($row = $resultAmenities_selectAmenities->fetch_assoc()) :
                                                    echo '<option value="' . $row['amenity_id'] . '"';
                                                    if (isset($_GET['amenity_purpose_id'])) {
                                                        if ($amenity_id == $row['amenity_id']) {
                                                            echo 'selected="selected"';
                                                        }
                                                    }
                                                    echo 'disabled>' . $row['amenity_name'] . '</option>';
                                                endwhile;
                                            } else {
                                                echo "<option value=''>Select Subdivision First...</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Purpose:</td>
                                    <td>
                                        <input name="amenity_purpose" value="<?php echo $amenity_purpose ?? ''; ?>" type="text" placeholder="new amenity purpose" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Day Rate Per Hour:</td>
                                    <td>
                                        <input name="dayRate" value="<?php echo $dayRate ?? ''; ?>" type="text" placeholder="day rate per hour" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Night Rate Per Hour:</td>
                                    <td>
                                        <input name="nightRate" value="<?php echo $nightRate ?? ''; ?>" type="text" placeholder="night rate per hour" required />
                                    </td>
                                </tr>
                            </table>

                            <!--MODAL ADD AMENITY -->
                            <div class="modal fade" id="addPurposeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to add this new purpose?
                                        </div>
                                        <div class="modal-footer">
                                            <button name="purposeAdd" type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btnArea">
                                <button type="button" class="btnSubmitReg" data-bs-toggle="modal" data-bs-target="#addPurposeModal" <?php
                                                                                                                                    if ($amenity_purpose_id ?? '') {
                                                                                                                                        echo "disabled";
                                                                                                                                    } else {
                                                                                                                                        echo "";
                                                                                                                                    } ?>>
                                    Add Purpose
                                </button>

                                <!-- MODAL UPDATE AMENITY -->
                                <div class="modal fade" id="updatePurposeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do you really want to update this purpose?
                                            </div>
                                            <div class="modal-footer">
                                                <button name="purposeUpdate" type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btnClearReg" data-bs-toggle="modal" data-bs-target="#updatePurposeModal" <?php
                                                                                                                                        if ($amenity_purpose_id ?? '') {
                                                                                                                                            echo "";
                                                                                                                                        } else {
                                                                                                                                            echo "disabled";
                                                                                                                                        } ?>>
                                    Update Purpose
                                </button>
                                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                This will clear all fields!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal" onclick="location.href='settingsAmenity.php#amenityPurpose'">Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" value="" class="btnClearReg" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                    Clear
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- SETTINGS AMENITY TABLE -->
                    <div class="tblAmenityContainer">
                        <table class="table tblAmenity">
                            <thead>
                                <th></th>
                                <th>Subdivision</th>
                                <th>Amenity</th>
                                <th>Purpose</th>
                                <th>Day Rate</th>
                                <th>Night Rate</th>
                            </thead>
                            <?php while ($row = $resultPurpose->fetch_assoc()) : ?>
                                <tr>
                                    <td>
                                        <a href="settingsAmenity.php?amenity_purpose_id=<?php echo $row['amenity_purpose_id']; ?>#amenityPurpose" class="btnEdit">Edit</a>
                                    </td>
                                    <td>
                                        <?php echo $row['subdivision_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['amenity_name'] ?>
                                    </td>
                                    <td><?php echo $row['amenity_purpose'] ?></td>
                                    <td>
                                        <?php echo $row['day_rate'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['night_rate'] ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
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