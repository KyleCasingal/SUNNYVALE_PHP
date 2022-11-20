<?php
include "../process.php";
if (isset($_SESSION['username'])) {
    header("Location: ../blogHome/blogHome.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="topbarRegister.css" media="screen">
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap"
        rel="stylesheet">
    <title>SUNNYVALE</title>
</head>
<style>
    .topRegister {
        margin-bottom: 0;
        padding: 0;
        width: 100%;
        height: 6vw;
        background-color: rgba(255, 253, 245, 0);
        position: sticky;
        top: 0;
        display: flex;
        align-items: center;
        font-family: "Poppins", sans-serif;
        z-index: 999;
        backdrop-filter: blur(5px);
    }


    .topLeftRegister {
        flex: 3;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin-left: 2vw;
    }

    .topLeftRegister img {
        max-height: 5vw;
    }

    .topRightRegister {
        color: white;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: flex-end;
        padding-right: 30px;

    }

    .topRightRegister p {
        font-size: 0.9vw;
    }



    .topCenter {
        flex: 60;

    }

    .topIconRegister {
        color: white;
        font-size: 2.5vw;
        margin-right: 10px;
        font-family: "Poppins", sans-serif;
        font-style: normal;
        cursor: pointer;
    }

    .topImgRegister {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        cursor: pointer;
    }

    .topList {
        display: flex;
        justify-content: flex-end;
        margin: 0;
        padding: 0;
        list-style: none;
        color: rgb(89, 89, 89);
    }

    .topListItem {
        margin-right: 20px;
        font-size: 20px;
        font-weight: 300;
        cursor: pointer;
    }

    .topListItem:hover {
        color: black;
        cursor: pointer;
    }

    .topSearchIcon {
        font-size: 18px;
        color: rgb(89, 89, 89);
        cursor: pointer;
        margin-left: 15px;
    }

    .dropdown-menu {
        box-shadow: 0px 1px 10px gray;
        position: absolute;
        top: 90px;
        right: 20px;
        background-color: rgba(255, 253, 245, 0.95);
        border-radius: var(--border-radius);
        padding: 10px 20px;
        width: 200px;
    }

    .dropdown-menu::before {
        content: '';
        position: absolute;
        top: -5px;
        right: 20px;
        height: 20px;
        width: 20px;
        background: var(--secondary-bg);
        transform: rotate(45deg);
    }

    .dropdown-menu.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        transition: var(--speed) ease;
    }

    .dropdown-menu.inactive {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-20px);
        transition: var(--speed) ease;
    }


    h3 {
        width: 100%;
        text-align: center;
        font-size: 18px;
        padding: 20px 0;
        font-weight: 500;
        font-size: 18px;
        color: var(--primary-text-color);
        line-height: 1.2rem;
    }

    h3 span {
        font-size: 14px;
        color: var(--secondary-text-color);
        font-weight: 400;
    }

    .dropdown-menu ul li {
        padding: 10px 0;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    .dropdown-menu ul li:hover a {
        color: rgb(212, 33, 9);
        cursor: pointer;
    }

    .dropdown-menu ul li:hover img {
        opacity: 1;
        cursor: pointer;
    }

    .dropdownItem {
        display: flex;
        margin: 10px auto;
    }

    .dropdownItem img {
        max-width: 25px;
        margin-right: 10px;
        opacity: 0.5;
        transition: var(--speed);
    }

    .dropdownItem a {
        max-width: 100px;
        margin-left: 10px;
        transition: var(--speed);
    }

    .loginButtonReg {
        font-size: 0.9vw;
        cursor: pointer;
        background-color: darkseagreen;
        border: none;
        color: white;
        border-radius: 10px;
        border-radius: 0.6vw;
        padding: 0.8em;
    }
</style>

<body>
    <?php if (isset($_SESSION['register'])): ?>
    <div class="alert alert-warning">
        <strong> All Fields Required!</strong>
        <?php
    echo $_SESSION['register'];
    unset($_SESSION['register']);
                    ?>
    </div>
    <?php endif ?>
    <?php if (isset($_SESSION['password'])): ?>
    <div class="alert alert-warning">
        <strong> Passwords do not match!</strong>
        <?php
    echo $_SESSION['password'];
    unset($_SESSION['password']);
                    ?>
    </div>
    <?php endif ?>
    <form method="post">
        <div class="topRegister">
            <div class="topLeftRegister">
                <img src="..\img\logoSV.png" alt="" />
                <i class="topIconRegister">SUNNYVALE</i>
            </div>
            <div class="topRightRegister">
                <p>Already have an Account?</p>
                <button class="loginButtonReg" name="loginButtonReg" id="loginButtonReg">
                    Login
                </button>
            </div>
        </div>
    </form>
</body>

</html>