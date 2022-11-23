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
    }
    .secretary {
        display: flex;
    }
    .sideBar {
        background-color: rgb(248, 245, 227);
        flex: 2;
        color: black;
    }

    .tblContainer {
        justify-content: center;
        margin-top: 2vw;
        margin-bottom: 2vw;
        margin-left: 2vw;
        margin-right: 0;
        overflow-y: auto;
        overflow-x: auto;
        max-height: 20vw;
    }

    .btnArea {
        display: flex;
        margin: 2vw;
        gap: 1vw;
    }

    .btnSubmitReg {
        background-color: darkseagreen;
        border: 0;
        padding: 0.5vw;
        max-width: 50vw;
        width: 15vw;
        font-family: "Poppins", sans-serif;
        font-size: 1.5vw;
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
        width: 15vw;
        font-family: "Poppins", sans-serif;
        font-size: 1.5vw;
        margin-top: 2vw;
        color: white;
        border-radius: 0.8vw;
        cursor: pointer;
    }

    .btnClearReg:hover {
        background-color: rgb(180, 83, 83);
    }
    th {
        text-align: center;
    }

    td {
        text-align: center;
    }
    .tblUser tr:hover {
        background-color: rgb(211, 211, 211);
    }
    .tblUsers {
        max-width: 95%;
        margin-top: 2vw;
    }
</style>

<body>
    <?php require '../marginals/topbar.php'; ?>
    <div class="secretary">
        <div class="sideBar">
            <?php require '../marginals/sidebarSecretaryPanel.php'; ?>
        </div>
        <div class="tblContainer">
            <table class="tblUser">
                <thead>
                    <th>User ID</th>
                    <th>Fullname</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Account Status</th>
                </thead>
                <tr>
                    <td>1</td>
                    <td>Mon Carlo Delima</td>
                    <td>********</td>
                    <td>sample@gmail.com</td>
                    <td>activated</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mon Carlo Delima</td>
                    <td>********</td>
                    <td>sample@gmail.com</td>
                    <td>activated</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mon Carlo Delima</td>
                    <td>********</td>
                    <td>sample@gmail.com</td>
                    <td>activated</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mon Carlo Delima</td>
                    <td>********</td>
                    <td>sample@gmail.com</td>
                    <td>activated</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mon Carlo Delima</td>
                    <td>********</td>
                    <td>sample@gmail.com</td>
                    <td>activated</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mon Carlo Delima</td>
                    <td>********</td>
                    <td>sample@gmail.com</td>
                    <td>activated</td>
                </tr>
            </table>

        </div>
        <div class="btnArea">
            <button type="submit" class="btnSubmitReg">
                Activate
            </button>


            <button type="reset" value="reset" class="btnClearReg">
                Deactivate
            </button>
        </div>
    </div>
        <?php
    require '../marginals/footer2.php'
        ?>
</body>

</html>