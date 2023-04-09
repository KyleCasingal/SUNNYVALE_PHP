<?php
require '../marginals/topbar.php';
if ($_SESSION['user_type'] != 'Admin' and $_SESSION['user_type'] != 'Secretary') {
    echo '<script>window.location.href = "../modules/blogHome.php";</script>';
    exit;
}
$res = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $res->fetch_assoc();
$result = $con->query("SELECT * FROM homeowner_profile WHERE email_address != '' ORDER BY homeowner_id ASC ") or die($mysqli->error);
$resultSubd = $con->query("SELECT * FROM subdivision ORDER BY subdivision_id ASC") or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    .btnUpdateReg {
        background-color: orange;
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

    .btnUpdateReg:hover {
        background-color: orangered;
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

    .lblNA {
        margin: 0;
        color: gray;
        font-size: 0.8vw;
        text-align: center;
        font-style: italic;
    }

    .NA {
        vertical-align: bottom !important;
        text-align: center;
        padding-bottom: 0 !important;
    }

    .NAemployer {
        margin: 0;
        padding-top: 2vw;
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

    .buttonGrpRegister {
        display: flex;
        justify-content: end;
        gap: 1em;
    }

    .btnImportReg,
    .btnImport {
        background-color: orange;
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
</style>
<script>
    $("#form_id").trigger("reset");

    // $(document).ready(function() {
    //     $('.btnImport').click(function() {
    //         $('#confirmation').modal('show');
    //     });
    // });
    $(document).ready(function() {
        $(".btnImport").click(function() {
            $("#first_id").removeAttr("required");
            $("#middle_id").removeAttr("required");
            $("#last_id").removeAttr("required");
            $("#suffix_id").removeAttr("required");
            $("#birth_id").removeAttr("required");
            $("#sex_id").removeAttr("required");
            $("#email_id").removeAttr("required");
            $("#mobile_id").removeAttr("required");
            $("#street_id").removeAttr("required");
            $("#subd_id").removeAttr("required");
            $("#bussy_id").removeAttr("required");
            $("#occupation_id").removeAttr("required");
            $("#employer_id").removeAttr("required");
        });
    });

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
    $(document).ready(function() {
        $("#block_id").on('click', function() {
            var block_id = $(this).val();
            if (block_id) {
                $.ajax({
                    type: 'POST',
                    url: '../process.php/',
                    data: 'block_id=' + block_id,
                    success: function(html) {
                        $("#lot_id").html(html);
                    }
                });
            }
        });
    });
</script>

<body>
    <form method="post">
        <div class="secretary">
            <div class="sideBar">
                <?php require '../marginals/sidebarAdmin.php'; ?>
            </div>

            <div class="secretaryPanel">
                <div class="homeownerRegistration">
                    <label class="lblRegistration">Homeowner Registration</label>
                    <div class="regForm">
                        <table class="tblForm">
                            <input type="hidden" name="homeowner_id" value="<?php echo $homeowner_id ?? ''; ?>">
                            <tr>
                                <td>First Name:</td>
                                <td>
                                    <input type="text" name="first_name" id="first_id" placeholder="first name" value="<?php echo $first_name ?? ''; ?>" required />
                                </td>
                                <td>Date of Birth:</td>
                                <td>
                                    <input type="date" data-date-format="yyyy-mm-dd" name="birthdate" value="<?php echo $birthdate ?? ''; ?>" id="birth_id" required />
                                </td>
                            </tr>
                            <tr>
                                <td>Middle Name:</td>
                                <td>
                                    <input type="text" name="middle_name" id="middle_id" placeholder="middle name" value="<?php echo $middle_name ?? ''; ?>" required />
                                    <p class="lblNA">*write N/A if not applicable*</p>
                                </td>
                                <td>Sex:</td>
                                <td>
                                    <select name="sex" id="sex_id" required>
                                        <option value="">Select...</option>
                                        <option value="Male" <?php
                                                                if (isset($_GET['homeowner_id'])) {
                                                                    if ($sex == "Male") {
                                                                        echo 'selected="selected"';
                                                                    }
                                                                }
                                                                ?>>Male</option>
                                        <option value="Female" <?php
                                                                if (isset($_GET['homeowner_id'])) {
                                                                    if ($sex == "Female") {
                                                                        echo 'selected="selected"';
                                                                    }
                                                                }
                                                                ?>>Female</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td>
                                    <input type="text" name="last_name" id="last_id" placeholder="last name" value="<?php echo $last_name ?? ''; ?>" required />
                                </td>
                                <td>Email:</td>
                                <td>
                                    <input type="text" name="email_address" id="email_id" placeholder="email" value="<?php echo $email_address ?? ''; ?>" required />
                                </td>
                            </tr>
                            <tr>
                                <td>Suffix:</td>
                                <td>
                                    <input type="text" name="suffix" id="suffix_id" placeholder="suffix" value="<?php echo $suffix ?? ''; ?>" required />
                                    <p class="lblNA">*write N/A if not applicable*</p>
                                </td>
                                <td>Mobile Number:</td>
                                <td>
                                    <input type="text" name="mobile_number" id="mobile_id" placeholder="mobile no." value="<?php echo $mobile_number ?? ''; ?>" required />
                                </td>
                            </tr>
                            <tr>
                                <td>Residence Address:</td>
                                <td>
                                    <select name="subdivision" id="subdivision_id_lot" required>
                                        <option >Select Subdivision...</option>
                                        <?php while ($row = $resultSubd->fetch_assoc()) : ?>
                                            <option value="<?php echo $row['subdivision_id'] ?>" <?php
                                                                                                    if (isset($_GET['homeowner_id'])) {
                                                                                                        if ($subdivision_name == $row['subdivision_name']) {
                                                                                                            echo 'selected="selected"';
                                                                                                        }
                                                                                                    }
                                                                                                    ?>><?php echo $row['subdivision_name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </td>
                                <td>Block:</td>
                                <td>
                                    <select name="block" id="block_id" required>
                                        <option value="">Select Subdivision First...</option>
                                    </select>
                                </td>
                                <td>Lot:</td>
                                <td> <select name="lot" id="lot_id" required>
                                        <option value="">Select Block First...</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Business Address:</td>
                                <td class="NA">
                                    <input type="text" name="business_address" id="bussy_id" placeholder="business address" value="<?php echo $business_address ?? ''; ?>" required />
                                    <p class="lblNA">*write N/A if not applicable*</p>
                                </td>
                            </tr>
                            <tr>

                            </tr>
                            <tr>
                                <td>Occupation:</td>
                                <td class="NA">
                                    <input type="text" name="occupation" id="occupation_id" placeholder="occupation" value="<?php echo $occupation ?? ''; ?>" required />
                                    <p class="lblNA">*write N/A if not applicable*</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Employer:</td>
                                <td class="NA">
                                    <input type="text" name="employer" id="employer_id" placeholder="employer" value="<?php echo $employer ?? ''; ?>" required />
                                    <p class="lblNA">*write N/A if not applicable*</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Vehicle Registration:</td>
                                <td class="NA">
                                    <input type="text" name="vehicle_registration" id="employer_id" placeholder="vehicle registration" value="<?php echo $vehicle_registration ?? ''; ?>" required />
                                    <p class="lblNA">*write N/A if not applicable*</p>
                                </td>
                            </tr>
                        </table>
                        <div class="buttonGrpRegister">
                            <div class="modal fade" id="homeowner_submit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to add this homeowner profile?
                                        </div>
                                        <div class="modal-footer">
                                            <button name="homeowner_submit" type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="homeowner_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to update this homeowner profile?
                                        </div>
                                        <div class="modal-footer">
                                            <button name="homeowner_update" type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($update == true) : ?>
                                <button data-bs-toggle="modal" data-bs-target="#homeowner_update" type="button" class="btnUpdateReg">
                                    Update
                                </button>
                            <?php else : ?>
                                <button data-bs-toggle="modal" data-bs-target="#homeowner_submit" type="button" class="btnSubmitReg">
                                    Submit
                                </button>
                            <?php endif; ?>
                            <button type="button" value="" class="btnClearReg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Clear
                            </button>
                            <button type="button" value="" class="btnImportReg" data-bs-toggle="modal" data-bs-target="#importCSVModal">
                                Import CSV
                            </button>

                            <!-- <div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you really want to save your changes?
                                        </div>
                                        <div class="modal-footer">
                                            <button name="importSubmit" type="submit" class="btn btn-success" id="saveIMP">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="modal fade" id="importCSVModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">CSV FILE</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <label>Select CSV file:</label>
                                                    <input type="file" name="file" id="file" class="file" accept=".csv,.xls,.xlsx">
                                                </div>
                                                <div>
                                                    <label>Import data:</label>
                                                    <button type="submit" value="" class="btnImportReg" name="importSubmit">
                                                        Import CSV
                                                    </button>
                                                </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- <label class="lblRegistration">Registered Homeowners</label>
                    <div class="tblContainer">
                        <table class="tblHomeowners table-hover">
                            <thead>
                                <th></th>
                                <th>Homeowner ID</th>
                                <th>Full Name</th>
                                <th>Date of Birth</th>
                                <th>Sex</th>
                                <th>Residence Address</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Business Address</th>
                                <th>Occupation</th>
                                <th>Employer</th>
                            </thead>
                            <?php
                            while ($row = $result->fetch_assoc()) :
                                $suffix = $row['suffix'];
                                if ($suffix == "N/A") {
                                    $suffix = NULL;
                                } else {
                                    $suffix = " " . $row['suffix'];
                                }
                                $middle_name = $row['middle_name'];
                                if ($middle_name == "N/A") {
                                    $middle_name = NULL;
                                } else {
                                    $middle_name = " " . $row['middle_name'];
                                }
                                $residence_address = $row['street'] . ' ' . $row['subdivision'] . ' ' . $row['barangay'];

                            ?>
                                <tr>
                                    <td>
                                        <a href="homeownerRegistration.php?homeowner_id=<?php echo $row['homeowner_id']; ?>" class="btnEdit">Edit</a>
                                    </td>
                                    <td><?php echo $row['homeowner_id']; ?></td>
                                    <td><?php echo $row['first_name'] . $middle_name . " " . $row['last_name'] . $suffix; ?></td>
                                    <td><?php
                                        $datetime = strtotime($row['birthdate']);
                                        echo $phptime = date("m/d/Y", $datetime);
                                        ?></td>
                                    <td><?php echo $row['sex']; ?></td>
                                    <td><?php echo $residence_address; ?></td>
                                    <td><?php echo $row['email_address']; ?></td>
                                    <td><?php echo $row['mobile_number']; ?></td>
                                    <td><?php echo $row['business_address']; ?></td>
                                    <td><?php echo $row['occupation']; ?></td>
                                    <td><?php echo $row['employer']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                    </div> -->
            </div>
        </div>
        </div>
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
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal" onclick="location.href='homeownerRegistration.php'">Clear</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="discardConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Your changes will be discarded!
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" onclick="location.href='memberPanel.php'">Discard changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function validateFile() {
            var csvInputFile = document.forms["frmCSVImport"]["file"].value;
            if (csvInputFile == "") {
                error = "No source found to import. Please choose a CSV file. ";
                $("#response").html(error).addClass("error");;
                return false;
            }
            return true;
        }
    </script>
    <?php
    require '../marginals/footer2.php'
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>