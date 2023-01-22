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
        font-family: 'Poppins', sans-serif;
    }

    .topbar {
        top: 0;
        position: sticky;
    }

    html {
        scroll-behavior: smooth;
    }

    .landingPage {
        max-width: 100%;
        margin-top: -6vw;
        top: 0;
        position: relative;
        text-align: center;
        color: white;
        z-index: -1;
        margin-bottom: -0.5vw;
    }

    .landingTitle {
        font-size: 10vw;
        position: absolute;
        top: 40%;
        left: 50%;
        justify-content: center;
        align-items: center;
        transform: translate(-50%, -50%);
        font-family: "Poppins", sans-serif;
        font-weight: 800;
    }

    .landingTitle p {
        font-size: 1.1vw;
    }

    .landingPage img {
        width: 100%;
        height: auto;
    }

    .RecentContent {
        margin: 2em 2em;
        display: flex;
        flex-direction: column;
    }

    .landingIntroduction {
        margin: 2em 2em;
    }

    .landingTitles {
        font-size: 2em;
        color: rgb(50, 50, 50);
    }

    .landingText {
        color: rgb(89, 89, 89);
        font-size: 1em;
        text-align: justify;
    }
</style>

<body>
    <div class="topbar">
        <?php
        require './marginals/topbarLanding.php';
        ?>
    </div>
    <div class="landingPage">
        <input type="hidden" value=<?php echo $verified ?? ''; ?> />
        <img src="./img/landingBG.png" alt="" />
        <div class="landingTitle">
            Sunnyvale
            <p>Where dreams come home.</p>
        </div>
    </div>

    <div class="RecentContent">
        <label class="landingTitles">Recent Announcements</label>
        <label>announcement content here</label>
    </div>

    <div class="landingIntroduction">
        <label class="landingTitles">Mission</label>
        <p class="landingText">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
            mollis aliquet aliquet. Ut non porta lacus, in commodo ligula. Duis
            dapibus ex a malesuada molestie. Vestibulum eu enim et orci laoreet
            fringilla. Integer non sodales nibh. Nam sodales, orci id elementum
            dictum, dolor diam malesuada metus, id ullamcorper dui diam id magna.
            Curabitur sodales libero non purus pharetra, eu pharetra dolor
            dapibus.
        </p>

        <label class="landingTitles">Vision</label>
        <p class="landingText">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
            mollis aliquet aliquet. Ut non porta lacus, in commodo ligula. Duis
            dapibus ex a malesuada molestie. Vestibulum eu enim et orci laoreet
            fringilla. Integer non sodales nibh. Nam sodales, orci id elementum
            dictum, dolor diam malesuada metus, id ullamcorper dui diam id magna.
            Curabitur sodales libero non purus pharetra, eu pharetra dolor
            dapibus.
        </p>

        <label class="landingTitles">Goals</label>
        <p class="landingText">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
            mollis aliquet aliquet. Ut non porta lacus, in commodo ligula. Duis
            dapibus ex a malesuada molestie. Vestibulum eu enim et orci laoreet
            fringilla. Integer non sodales nibh. Nam sodales, orci id elementum
            dictum, dolor diam malesuada metus, id ullamcorper dui diam id magna.
            Curabitur sodales libero non purus pharetra, eu pharetra dolor
            dapibus.
        </p>
    </div>

    <div class="mapouter">
        <div class="gmap_canvas"><iframe width="1000" height="650" id="gmap_canvas" src="https://maps.google.com/maps?q=Sunnyvale%20II&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br>
            <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    height: 650px;
                    width: 1000px;
                }
            </style><a href="https://www.embedgooglemap.net">embed map on website</a>
            <style>
                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    height: 650px;
                    width: 1000px;
                }
            </style>
        </div>
    </div>


    <div>
        <?php
        require './marginals/footer.php';
        ?>
    </div>

</body>

</html>