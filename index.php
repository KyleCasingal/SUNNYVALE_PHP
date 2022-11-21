<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    }
    .topbar{
        top: 0;
        position: sticky;
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
    <div class="topbar">
    <?php
    require './marginals/topbarLanding.php';
    ?>
    </div>
    <div class="landingPage">
        <img src="./img/landingBG.png" alt="" />
        <div class="landingTitle">
            Sunnyvale
            <p>Where dreams come home.</p>
        </div>
    </div>
    <?php
    require './marginals/footer.php';
    ?>
</body>

</html>