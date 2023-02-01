<?php
require_once './process.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

    .blogPost {
        align-items: center;
        justify-content: center;
        width: 40%;
        margin-left: 5%;
        margin-top: 20px;
        margin-bottom: 50px;
        padding: 10px;
        border-radius: 10px;
        background-color: rgba(170, 192, 175, 0.3);
        font-family: "Poppins", sans-serif;
    }

    .avatarBlog {
        width: 4vw;
        height: 4vw;
        border-radius: 50%;
        object-fit: cover;
        cursor: pointer;
    }

    .avatarAnnouncement {
        width: 2.5vw;
        height: 2.5vw;
        border-radius: 50%;
        object-fit: cover;
    }

    .blogProfile {
        width: 100%;
        display: flex;
        margin-bottom: 2vw;
        padding-bottom: 1vw;
        border-style: solid;
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-bottom: 1px solid rgb(210, 210, 210);
    }

    .profileText {
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: space-between;
        align-items: center;
    }

    .profileName {
        color: var(--text);
        margin-left: 1vw;
        text-align: left;
        font-size: 1.5vw;
    }

    .profileDate {
        color: var(--text);
        margin: 0;
        text-align: right;
        font-size: 1vw;
    }

    .postImg {
        align-self: center;
        justify-self: center;
        max-width: 30vw;
        max-height: 40vw;
    }

    .blogTitle {
        color: black;
        font-weight: bold;
        font-family: "Poppins", sans-serif;
        margin-top: 1vw;
        font-size: 1.5vw;
    }

    .blogBody {
        font-size: clamp(1vw, 10px, 5px);
        margin-top: 0;
        text-align: justify;
    }

    .announcementFlex {
        display: flex;
        flex-wrap: wrap;
    }

</style>

<body>
    <div class="topbar">
        <?php
        require './marginals/topbarLanding.php';
        $resultOfficer = $con->query("SELECT * FROM post, homeowner_profile WHERE full_name = CONCAT(first_name, ' ', last_name) AND officer_post = 'Yes' ORDER BY post_id DESC") or die($mysqli->error);
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
        <div class="announcementFlex">
            <?php while ($row = $resultOfficer->fetch_assoc()) : ?>
                <div class="blogPost">
                    <div class="blogProfile">
                        <img class="avatarBlog" <?php
                                                $imageURL = './media/displayPhotos/' . $row['display_picture'];
                                                ?> src="<?= $imageURL ?>" alt="" />
                        <div class="profileText">
                            <p class="profileName"><?php echo $row['full_name']; ?></p>
                            <p class="profileDate">
                                <?php
                                $datetime = strtotime($row['published_at']);
                                echo $phptime = date("g:i A m/d/y", $datetime);
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="postContent">
                        <img class="postImg" <?php
                                                $imageURL = '../media/postsPhotos/' . $row['content_image'];
                                                ?> src="<?= $imageURL ?>" alt="">
                        </img>
                        <p class="blogTitle"><?php echo $row['title']; ?></p>
                        <p class="blogBody">
                            <?php echo $row['content']; ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>

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

    <!-- <div class="mapouter">
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
    </div> -->


    <div>
        <?php
        require './marginals/footer.php';
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>