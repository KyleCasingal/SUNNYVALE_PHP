<?php
require '../marginals/topbar.php';
if ($_SESSION['user_type'] != 'Admin' and $_SESSION['user_type'] != 'Secretary' and $_SESSION['user_type'] != 'Super Admin') {
    echo '<script>window.location.href = "../modules/blogHome.php";</script>';
    exit;
}

if ($_SESSION['subdivision'] != '') {
    $res = $con->query("SELECT * FROM user, homeowner_profile WHERE subdivision = '" . $_SESSION['subdivision'] . "' AND homeowner_id = user_homeowner_id AND account_status = 'Activated' AND email_verified_at IS NOT NULL ORDER  by user_id ASC") or die($mysqli->error);
    //ACCOUNT MANAGEMENT SORT, ACTIVATE, DEACTIVATE
    $status_filter = $_POST['status_filter'] ?? '';
    if (isset($_POST['filterButton'])) {
        if ($status_filter == 'Activated') {
            $res = $con->query("SELECT * FROM user, homeowner_profile WHERE subdivision = '" . $_SESSION['subdivision'] . "' AND homeowner_id = user_homeowner_id AND account_status = 'Activated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        } elseif ($status_filter == 'Deactivated') {
            $res = $con->query("SELECT * FROM user, homeowner_profile WHERE subdivision = '" . $_SESSION['subdivision'] . "' AND homeowner_id = user_homeowner_id AND account_status = 'Deactivated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        }
    }
    if (isset($_POST['activate'])) {
        if (isset($_POST['checkbox'])) {
            echo "<div class='messageSuccess'>
        <label >
          Selected user/s are activated!
        </label>
      </div>";
            foreach ($_POST['checkbox'] as $user_id) {
                $sql = "UPDATE user SET account_status = 'Activated' WHERE user_id = '$user_id'";
                $result = mysqli_query($con, $sql);
                $resultActivate = $con->query("SELECT * FROM user WHERE user_id = '$user_id'");
                $row = $resultActivate->fetch_assoc();
                $full_name = $row['full_name'];
                $resultSession = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
                $row = $resultSession->fetch_assoc();
                $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "', '" .  'activated user' . ' ' . "$full_name" . "' , NOW())";
                mysqli_query($con, $sql1);
            }
        } else {
            echo 'Please select an account to activate!';
        }
        if ($status_filter == 'Activated') {
            $res = $con->query("SELECT * FROM user WHERE account_status = 'Activated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        } else if ($status_filter == 'Deactivated') {
            $res = $con->query("SELECT * FROM user WHERE account_status = 'Deactivated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        }
    }
    if (isset($_POST['deactivate'])) {
        if (isset($_POST['checkbox'])) {
            echo "<div class='messageSuccess'>
        <label >
          Selected user/s are deactivated!
        </label>
      </div>";
            foreach ($_POST['checkbox'] as $user_id) {
                $sql = "UPDATE user SET account_status = 'Deactivated' WHERE user_id = '$user_id'";
                $result = mysqli_query($con, $sql);
                $resultDeactivate = $con->query("SELECT * FROM user WHERE user_id = '$user_id'");
                $row = $resultDeactivate->fetch_assoc();
                $full_name = $row['full_name'];
                $resultSession = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
                $row = $resultSession->fetch_assoc();
                $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "', '" .  'deactivated user' . ' ' . "$full_name" . "' , NOW())";
                mysqli_query($con, $sql1);
            }
        } else {
            echo 'Please select an account to deactivate!';
        }
        if ($status_filter == 'Activated') {
            $res = $con->query("SELECT * FROM user, homeowner_profile WHERE subdivision = '" . $_SESSION['subdivision'] . "' AND homeowner_id = user_homeowner_id AND account_status = 'Activated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        } else if ($status_filter == 'Deactivated') {
            $res = $con->query("SELECT * FROM user, homeowner_profile WHERE subdivision = '" . $_SESSION['subdivision'] . "' AND homeowner_id = user_homeowner_id AND account_status = 'Deactivated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        }
    }
} else {
    $res = $con->query("SELECT * FROM user, homeowner_profile WHERE homeowner_id = user_homeowner_id AND account_status = 'Activated' AND email_verified_at IS NOT NULL ORDER  by user_id ASC") or die($mysqli->error);
    //ACCOUNT MANAGEMENT SORT, ACTIVATE, DEACTIVATE
    $status_filter = $_POST['status_filter'] ?? '';
    if (isset($_POST['filterButton'])) {
        if ($status_filter == 'Activated') {
            $res = $con->query("SELECT * FROM user, homeowner_profile WHERE homeowner_id = user_homeowner_id AND account_status = 'Activated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        } elseif ($status_filter == 'Deactivated') {
            $res = $con->query("SELECT * FROM user, homeowner_profile WHERE homeowner_id = user_homeowner_id AND account_status = 'Deactivated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        }
    }
    if (isset($_POST['activate'])) {
        if (isset($_POST['checkbox'])) {
            echo "<div class='messageSuccess'>
        <label >
          Selected user/s are activated!
        </label>
      </div>";
            foreach ($_POST['checkbox'] as $user_id) {
                $sql = "UPDATE user SET account_status = 'Activated' WHERE user_id = '$user_id'";
                $result = mysqli_query($con, $sql);
                $resultActivate = $con->query("SELECT * FROM user WHERE user_id = '$user_id'");
                $row = $resultActivate->fetch_assoc();
                $full_name = $row['full_name'];
                $resultSession = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
                $row = $resultSession->fetch_assoc();
                $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "', '" .  'activated user' . ' ' . "$full_name" . "' , NOW())";
                mysqli_query($con, $sql1);
            }
        } else {
            echo 'Please select an account to activate!';
        }
        if ($status_filter == 'Activated') {
            $res = $con->query("SELECT * FROM user WHERE account_status = 'Activated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        } else if ($status_filter == 'Deactivated') {
            $res = $con->query("SELECT * FROM user WHERE account_status = 'Deactivated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        }
    }
    if (isset($_POST['deactivate'])) {
        if (isset($_POST['checkbox'])) {
            echo "<div class='messageSuccess'>
        <label >
          Selected user/s are deactivated!
        </label>
      </div>";
            foreach ($_POST['checkbox'] as $user_id) {
                $sql = "UPDATE user SET account_status = 'Deactivated' WHERE user_id = '$user_id'";
                $result = mysqli_query($con, $sql);
                $resultDeactivate = $con->query("SELECT * FROM user WHERE user_id = '$user_id'");
                $row = $resultDeactivate->fetch_assoc();
                $full_name = $row['full_name'];
                $resultSession = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
                $row = $resultSession->fetch_assoc();
                $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "', '" .  'deactivated user' . ' ' . "$full_name" . "' , NOW())";
                mysqli_query($con, $sql1);
            }
        } else {
            echo 'Please select an account to deactivate!';
        }
        if ($status_filter == 'Activated') {
            $res = $con->query("SELECT * FROM user, homeowner_profile WHERE homeowner_id = user_homeowner_id AND account_status = 'Activated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        } else if ($status_filter == 'Deactivated') {
            $res = $con->query("SELECT * FROM user, homeowner_profile WHERE homeowner_id = user_homeowner_id AND account_status = 'Deactivated' AND email_verified_at IS NOT NULL ORDER by user_id ASC") or die($mysqli->error);
        }
    }
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
        margin-top: 1vw;
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

    .tblUser {
        max-width: 100%;
        margin-top: 2vw;
    }

    .tblUser th {
        text-align: center;
    }

    .tblUser td {
        text-align: center;
    }

    .btnArea {
        display: flex;
        margin: 2vw;
        gap: 1vw;
    }

    .tblUser tr:hover {
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

    .lblFilter {
        margin-top: 1vw;
        font-size: 1vw;
        font-family: 'Poppins', sans-serif;
        margin-left: 2vw;
    }

    .selectFilter {
        background-color: rgb(241, 241, 241);
    }

    .hidetext {
        -webkit-text-security: disc;
    }
</style>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<body>
    <div class="secretary">
        <div class="sideBar">
            <?php require '../marginals/sidebarAdmin.php'; ?>
        </div>
        <div class="secretaryPanel">
            <form method="post">
                <label class="lblRegistration">Account Management</label>
                <div class="userManagement">
                    <label class="lblFilter">Filter By: </label>
                    <select name="status_filter" id="status_filter" class="selectFilter">
                        <option value="Activated" <?php if ($status_filter == "Activated") echo 'selected="selected"'; ?>>Activated</option>
                        <option value="Deactivated" <?php if ($status_filter == "Deactivated") echo 'selected="selected"'; ?>>Deactivated</option>
                    </select>
                    <button name="filterButton" type="submit" class="btnSubmitReg">
                        Filter
                    </button>
                    <div class="tblContainer">

                        <table class="tblUser">
                            <thead>
                                <th><input type="checkbox" name="select-all" id="select-all" /></th>
                                <th>User ID</th>
                                <th>Fullname</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Account Status</th>
                            </thead>
                            <?php while ($row = $res->fetch_assoc()) : ?>
                                <tr>
                                    <td><input type="checkbox" value=<?php echo $row['user_id']; ?> name="checkbox[]" id="checkbox"></td>
                                    <td><?php echo $row['user_id']; ?> </td>
                                    <td><?php echo $row['full_name']; ?></td>
                                    <td class="hidetext"><?php echo $row['password']; ?></td>
                                    <td><?php echo $row['email_address']; ?></td>
                                    <td><?php echo $row['account_status']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                    <div class="modal fade" id="activate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Do you really want to activate this/these account/s?
                                </div>
                                <div class="modal-footer">
                                    <button name="activate" type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btnArea">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#activate" <?php if ($status_filter == "Activated") { ?> disabled <?php   } ?> class="btnSubmitReg">
                            Activate
                        </button>
                        <div class="modal fade" id="deactivate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to deactivate this/these account/s?
                                    </div>
                                    <div class="modal-footer">
                                        <button name="deactivate" type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" name="deactivate" data-bs-toggle="modal" data-bs-target="#deactivate" <?php if ($status_filter == "Deactivated") { ?> disabled <?php   } ?> class="btnClearReg">
                            Deactivate
                        </button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <?php require '../marginals/footer2.php'; ?>
    <script>
        $('#select-all').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>