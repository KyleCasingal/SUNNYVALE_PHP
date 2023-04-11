<?php
require '../marginals/topbar.php';
if ($_SESSION['user_type'] != 'Admin') {
    echo '<script>window.location.href = "../modules/blogHome.php";</script>';
    exit;
}
$result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $result->fetch_assoc();
$resultSubdivision_selectBlock = $con->query("SELECT * FROM subdivision") or die($mysqli->error);
$resultSubdivision_selectLot = $con->query("SELECT * FROM subdivision") or die($mysqli->error);
$resultSubdivision = $con->query("SELECT * FROM subdivision") or die($mysqli->error);
$resultSubdivision_table = $con->query("SELECT * FROM subdivision") or die($mysqli->error);
$resultBlock = $con->query("SELECT * FROM block INNER JOIN subdivision ON block.subdivision_id = subdivision.subdivision_id ORDER BY subdivision.subdivision_id + 0, block.block + 0 ASC") or die($mysqli->error);
$resultLot = $con->query("SELECT * FROM lot INNER JOIN block ON lot.block_id = block.block_id INNER JOIN subdivision ON block.subdivision_id = subdivision.subdivision_id ORDER BY subdivision.subdivision_id + 0, block.block + 0, lot.lot + 0 ASC") or die($mysqli->error);
$resultLot_selectBlock = $con->query("SELECT * FROM lot INNER JOIN block ON lot.block_id = block.block_id INNER JOIN subdivision ON block.subdivision_id = subdivision.subdivision_id ORDER BY block.block + 0, lot.lot + 0 ASC") or die($mysqli->error);
if (isset($_GET['lot_id'])) {
    $resultUpdateBlock = $con->query("SELECT * FROM block WHERE subdivision_id ='$subdivision_id_lot' ORDER BY block + 0 ASC") or die($mysqli->error);
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        $("#subdivision_id_lot").on('click', function() {
            var subdivision_id_lot = $(this).val();
            if (subdivision_id_lot) {
                $.ajax({
                    type: 'POST',
                    url: '../process.php/',
                    data: 'subdivision_id_lot=' + subdivision_id_lot,
                    success: function(html) {
                        $("#block_id").html(html);
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
            <!-- SETTINGS SUBDIVISION -->
            <label class="lblSettings">Subdivisions</label>
            <div class="settingsAddSubdivision" id="settingsAddSubdivision">
                <div class="addAmenityForm">
                    <form method="post" autocomplete="off">
                        <input type="hidden" name="subdivision_id" value="<?php echo $subdivision_id ?? ''; ?>">
                        <table class="tblAmenityForm">
                            <tr>
                                <td>Subdivision:</td>
                                <td>
                                    <input name="subdivision" value="<?php echo $subdivision_name ?? ''; ?>" type="text" placeholder="new subdivision" required />
                                </td>
                            </tr>
                            <tr>
                                <td>Barangay:</td>
                                <td>
                                    <input name="barangay" value="<?php echo $barangay ?? ''; ?>" type="text" placeholder="barangay" required />
                                </td>
                            </tr>
                        </table>

                        <!-- MODAL ADD SUBDIVISION -->
                        <div class="modal fade" id="addSubdivisionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to add this new subdivision?
                                    </div>
                                    <div class="modal-footer">
                                        <button name="subdivisionAdd" type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btnArea">
                            <button type="button" class="btnSubmitReg" data-bs-toggle="modal" data-bs-target="#addSubdivisionModal" <?php
                                                                                                                                    if ($subdivision_id ?? '') {
                                                                                                                                        echo "disabled";
                                                                                                                                    } else {
                                                                                                                                        echo "";
                                                                                                                                    } ?>>
                                Add Subdivision
                            </button>

                            <!-- MODAL UPDATE SUBDIVISION -->
                            <div class="modal fade" id="updateSubdivisionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to update this subdivision?
                                        </div>
                                        <div class="modal-footer">
                                            <button name="subdivisionUpdate" type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btnClearReg" data-bs-toggle="modal" data-bs-target="#updateSubdivisionModal" <?php
                                                                                                                                        if ($subdivision_id ?? '') {
                                                                                                                                            echo "";
                                                                                                                                        } else {
                                                                                                                                            echo "disabled";
                                                                                                                                        } ?>>
                                Update Subdivision
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
                                            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal" onclick="location.href='settingsSubdivision.php'">Clear</button>
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

                <!-- SETTINGS SUBIDIVISION TABLE -->
                <div class="tblAmenityContainer">
                    <table class="table tblAmenity">
                        <thead>
                            <th></th>
                            <th>Subdivision</th>
                            <th>Barangay</th>
                        </thead>
                        <?php while ($row = $resultSubdivision->fetch_assoc()) : ?>
                            <tr>

                                <td>
                                    <a href="settingsSubdivision.php?subdivision_id=<?php echo $row['subdivision_id']; ?>" class="btnEdit">Edit</a>
                                </td>
                                <td><?php echo $row['subdivision_name'] ?></td>
                                <td><?php echo $row['barangay'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
            <label class="lblSettings" id="subdivisionBlock">Block</label>
            <div class="settingsAddSubdivision" id="">
                <div class="addAmenityForm">
                    <form method="post" autocomplete="off">
                        <input type="hidden" name="block_id" value="<?php echo $block_id ?? ''; ?>">
                        <table class="tblAmenityForm">
                            <tr>
                                <td>Subdivision:</td>
                                <td>
                                    <select name="subdivision_id_block" id="" required>
                                        <option>Select...</option>
                                        <?php while ($row = $resultSubdivision_selectBlock->fetch_assoc()) : ?>
                                            <option value="<?php echo $row['subdivision_id'] ?>" <?php
                                                                                                    if (isset($_GET['block_id'])) {
                                                                                                        if ($subdivision_id_block == $row['subdivision_id']) {
                                                                                                            echo 'selected="selected"';
                                                                                                        }
                                                                                                    }
                                                                                                    ?>><?php echo $row['subdivision_name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Block:</td>
                                <td>
                                    <input name="block" value="<?php echo $block ?? ''; ?>" type="text" placeholder="block" required />
                                </td>
                            </tr>
                        </table>

                        <!-- MODAL ADD BLOCK -->
                        <div class="modal fade" id="addBlockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to add this new block?
                                    </div>
                                    <div class="modal-footer">
                                        <button name="blockAdd" type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btnArea">
                            <button type="button" class="btnSubmitReg" data-bs-toggle="modal" data-bs-target="#addBlockModal" <?php
                                                                                                                                if ($block_id ?? '') {
                                                                                                                                    echo "disabled";
                                                                                                                                } else {
                                                                                                                                    echo "";
                                                                                                                                } ?>>
                                Add Block
                            </button>

                            <!-- MODAL UPDATE BLOCK -->
                            <div class="modal fade" id="updateBlockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to update this block?
                                        </div>
                                        <div class="modal-footer">
                                            <button name="blockUpdate" type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btnClearReg" data-bs-toggle="modal" data-bs-target="#updateBlockModal" <?php
                                                                                                                                if ($block_id ?? '') {
                                                                                                                                    echo "";
                                                                                                                                } else {
                                                                                                                                    echo "disabled";
                                                                                                                                } ?>>
                                Update Block
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
                                            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal" onclick="location.href='settingsSubdivision.php'">Clear</button>
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

                <!-- SETTINGS SUBIDIVISION TABLE -->
                <div class="tblAmenityContainer">
                    <table class="table tblAmenity">
                        <thead>
                            <th></th>
                            <th>Subdivision</th>
                            <th>Block</th>
                        </thead>
                        <?php while ($row = $resultBlock->fetch_assoc()) : ?>
                            <tr>
                                <td>
                                    <a href="settingsSubdivision.php?block_id=<?php echo $row['block_id']; ?>#subdivisionBlock" class="btnEdit">Edit</a>
                                </td>
                                <td><?php echo $row['subdivision_name'] ?></td>
                                <td><?php echo $row['block'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
            <label class="lblSettings" id="subdivisionLot">Lot</label>
            <div class="settingsAddSubdivision" id="settingsAddSubdivision">
                <div class="addAmenityForm">
                    <form method="post" autocomplete="off">
                        <input type="hidden" name="lot_id" value="<?php echo $lot_id ?? ''; ?>">
                        <table class="tblAmenityForm">
                            <tr>
                                <td>Subdivision:</td>
                                <td>
                                    <select name="subdivision_id" id="subdivision_id_lot" required>
                                        <?php
                                        if ($lot_id ?? '') {
                                            while ($row = $resultSubdivision_selectLot->fetch_assoc()) :
                                                echo '<option value="' . $row['subdivision_id'] . '"';
                                                if (isset($_GET['lot_id'])) {
                                                    if ($subdivision_id_lot == $row['subdivision_id']) {
                                                        echo 'selected="selected"';
                                                    }
                                                }
                                                echo 'disabled>' . $row['subdivision_name'] . '</option>';
                                            endwhile;
                                        } else {
                                            echo '<option>Select...</option>';
                                            while ($row = $resultSubdivision_selectLot->fetch_assoc()) :
                                                echo '<option value="' . $row['subdivision_id'] . '">' . $row['subdivision_name'] . '</option>';
                                            endwhile;
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Block:</td>
                                <td>
                                    <select name="block_id" id="block_id" required>
                                        <?php
                                        if ($lot_id ?? '') {
                                            while ($row = $resultUpdateBlock->fetch_assoc()) :
                                                echo '<option value="' . $row['block_id'] . '"';
                                                if (isset($_GET['lot_id'])) {
                                                    if ($block_id == $row['block_id']) {
                                                        echo 'selected="selected"';
                                                    }
                                                }
                                                echo '>' . $row['block'] . '</option>';
                                            endwhile;
                                        } else {
                                            echo "<option>Select Subdivision First...</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Lot:</td>
                                <td>
                                    <input name="lot" value="<?php echo $lot ?? ''; ?>" type="text" placeholder="lot" required />
                                </td>
                            </tr>
                        </table>

                        <!-- MODAL ADD LOT -->
                        <div class="modal fade" id="addLotModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to add this new lot?
                                    </div>
                                    <div class="modal-footer">
                                        <button name="lotAdd" type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btnArea">
                            <button type="button" class="btnSubmitReg" data-bs-toggle="modal" data-bs-target="#addLotModal" <?php
                                                                                                                            if ($lot_id ?? '') {
                                                                                                                                echo "disabled";
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            } ?>>
                                Add Lot
                            </button>

                            <!-- MODAL UPDATE SUBDIVISION -->
                            <div class="modal fade" id="updateLotModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to update this lot?
                                        </div>
                                        <div class="modal-footer">
                                            <button name="lotUpdate" type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btnClearReg" data-bs-toggle="modal" data-bs-target="#updateLotModal" <?php
                                                                                                                                if ($lot_id ?? '') {
                                                                                                                                    echo "";
                                                                                                                                } else {
                                                                                                                                    echo "disabled";
                                                                                                                                } ?>>
                                Update Lot
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
                                            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal" onclick="location.href='settingsSubdivision.php'">Clear</button>
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

                <!-- SETTINGS SUBIDIVISION TABLE -->
                <div class="tblAmenityContainer">
                    <table class="table tblAmenity">
                        <thead>
                            <th></th>
                            <th>Subdivision</th>
                            <th>Block</th>
                            <th>Lot</th>
                        </thead>
                        <?php while ($row = $resultLot->fetch_assoc()) : ?>
                            <tr>
                                <td>
                                    <a href="settingsSubdivision.php?lot_id=<?php echo $row['lot_id']; ?>#subdivisionLot" class="btnEdit">Edit</a>
                                </td>
                                <td><?php echo $row['subdivision_name'] ?></td>
                                <td><?php echo $row['block'] ?></td>
                                <td><?php echo $row['lot'] ?></td>
                                <td></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>
        </form>
    </div>
    <?php
    require '../marginals/footer2.php'
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>