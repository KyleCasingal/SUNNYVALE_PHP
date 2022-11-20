<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="landing.css" media="screen">
    <link rel="stylesheet" href="./footer/footer.css" media="screen">
    <link rel="stylesheet" href="./topbarLanding/topbarLanding.css" media="screen">
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

    .landingPage {
        max-width: 100%;
        margin-top: -6vw;
        top: 0;
        position: relative;
        text-align: center;
        color: white;
        z-index: -1;

    }

    .landingTitle {
        font-size: 10vw;
        position: absolute;
        top: 40%;
        left: 50%;
        justify-content: center;
        align-items: center;
        transform: translate(-50%, -50%);
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
    }

    .landingTitle p {
        font-size: 1.1vw;
    }

    .landingPage img {
        width: 100%;
        height: auto;
    }
</style>

<body>
    <?php
    require './topbarLanding/topbarLanding.php';
    ?>
    <div class="landingPage">
        <img src="./img/landingBG.png" alt="" />
        <div class="landingTitle">
            Sunnyvale
            <p>Where dreams come home.</p>
        </div>
    </div>
    <?php
    require './footer/footer.php';
    ?>
</body>

</html>
<?php
if (isset($_SESSION['username'])) {
    header("Location: ./blogHome/blogHome.php");
}
?>