<?php
require '../marginals/topbar.php';
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($mysqli));
$result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $result->fetch_assoc();
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
            <div class="homeownerRegistration">
                <label class="lblRegistration">Registration</label>
                <div class="regForm">
                    <table class="tblForm">
                        <tr>
                            <td>First Name:</td>
                            <td>
                                <input type="text" name="" id="" placeholder="first name" />
                            </td>
                            <td>Date of Birth:</td>
                            <td>
                                <input type="date" name="" id="" />
                            </td>
                        </tr>
                        <tr>
                            <td>Middle Name:</td>
                            <td>
                                <input type="text" name="" id="" placeholder="middle name" />
                            </td>
                            <td>Sex</td>
                            <td>
                                <select name="" id="">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Last Name:</td>
                            <td>
                                <input type="text" name="" id="" placeholder="last name" />
                            </td>
                            <td>Email:</td>
                            <td>
                                <input type="text" name="" id="" placeholder="email" />
                            </td>
                        </tr>
                        <tr>
                            <td>Residence Address:</td>
                            <td>
                                <input type="text" name="" id="" placeholder="Lot and Block" />
                            </td>
                            <td>
                                <select name="" id="">
                                    <option value="Sunnyvale 1">Sunnyvale 1</option>
                                    <option value="Sunnyvale 2">Sunnyvale 2</option>
                                    <option value="Sunnyvale 3">Sunnyvale 3</option>
                                    <option value="Sunnyvale 4">Sunnyvale 4</option>
                                </select>
                            </td>
                            <td>
                                <select name="" id="">
                                    <option value="Palangoy">Palangoy</option>
                                    <option value="Pantok">Pantok</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Business Address:</td>
                            <td>
                                <input type="text" name="" id="" placeholder="input business address" />
                            </td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>
                                <input type="text" name="" id="" placeholder="mobile no." />
                            </td>
                        </tr>
                        <tr>
                            <td>Occupation:</td>
                            <td>
                                <input type="text" name="" id="" placeholder="occupation" />
                            </td>
                        </tr>
                        <tr>
                            <td>Employer:</td>
                            <td>
                                <input type="text" name="" id="" placeholder="employer" />
                            </td>
                            <td>
                                <button name="homeowner_submit" type="submit" class="btnSubmitReg">
                                    Submit
                                </button>
                            </td>
                            <td>
                                <button type="reset" value="reset" class="btnClearReg">
                                    Clear
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
                <label class="lblRegistration">Registered Homeowners</label>
                <div class="tblContainer">
                    <table class="tblHomeowners table-hover">
                        <thead>
                            <th>Full Name</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Residence Address</th>
                            <th>Business Address</th>
                            <th>Mobile Number</th>
                            <th>Occupation</th>
                            <th>Employer</th>
                        </thead>
                        <tr>
                            <td>Elizabeth B. Mckinney</td>
                            <td>Jan 1, 2001</td>
                            <td>Female</td>
                            <td>sample@gmail.com</td>
                            <td>lot1 block2, Sunnyvale 1, Palangoy</td>
                            <td>NA</td>
                            <td>09123456789</td>
                            <td>NA</td>
                            <td>NA</td>
                        </tr>
                        <tr>
                            <td>Elizabeth B. Mckinney</td>
                            <td>Jan 1, 2001</td>
                            <td>Female</td>
                            <td>sample@gmail.com</td>
                            <td>lot1 block2, Sunnyvale 1, Palangoy</td>
                            <td>NA</td>
                            <td>09123456789</td>
                            <td>NA</td>
                            <td>NA</td>
                        </tr>
                        <tr>
                            <td>Elizabeth B. Mckinney</td>
                            <td>Jan 1, 2001</td>
                            <td>Female</td>
                            <td>sample@gmail.com</td>
                            <td>lot1 block2, Sunnyvale 1, Palangoy</td>
                            <td>NA</td>
                            <td>09123456789</td>
                            <td>NA</td>
                            <td>NA</td>
                        </tr>
                        <tr>
                            <td>Elizabeth B. Mckinney</td>
                            <td>Jan 1, 2001</td>
                            <td>Female</td>
                            <td>sample@gmail.com</td>
                            <td>lot1 block2, Sunnyvale 1, Palangoy</td>
                            <td>NA</td>
                            <td>09123456789</td>
                            <td>NA</td>
                            <td>NA</td>
                        </tr>
                        <tr>
                            <td>Elizabeth B. Mckinney</td>
                            <td>Jan 1, 2001</td>
                            <td>Female</td>
                            <td>sample@gmail.com</td>
                            <td>lot1 block2, Sunnyvale 1, Palangoy</td>
                            <td>NA</td>
                            <td>09123456789</td>
                            <td>NA</td>
                            <td>NA</td>
                        </tr>
                        <tr>
                            <td>Elizabeth B. Mckinney</td>
                            <td>Jan 1, 2001</td>
                            <td>Female</td>
                            <td>sample@gmail.com</td>
                            <td>lot1 block2, Sunnyvale 1, Palangoy</td>
                            <td>NA</td>
                            <td>09123456789</td>
                            <td>NA</td>
                            <td>NA</td>
                        </tr>
                        <tr>
                            <td>Elizabeth B. Mckinney</td>
                            <td>Jan 1, 2001</td>
                            <td>Female</td>
                            <td>sample@gmail.com</td>
                            <td>lot1 block2, Sunnyvale 1, Palangoy</td>
                            <td>NA</td>
                            <td>09123456789</td>
                            <td>NA</td>
                            <td>NA</td>
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