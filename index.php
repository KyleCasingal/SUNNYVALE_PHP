<?php
require './process.php';
if (isset($_SESSION['user_id'])) {
    header("Location: ./modules/blogHome.php");
}
$resultMissionVision = $con->query("SELECT * FROM mission_vision") or die($mysqli->error);

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
    @import "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css";


    * {
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }



    html {
        scroll-behavior: smooth;
    }

    .landingPage {
        max-width: 100%;
        margin-top: ;
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
        font-size: 1vmax;
    }

    .landingPage img {
        width: 100%;
        height: auto;
    }

    .RecentContent {
        width: 80%;
        margin: 2em 2em;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .landingIntroduction {
        margin-left: 30em;
        margin-right: 30em;
    }

    .landingTitles {
        font-size: 1.5vmax;
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
        width: 80%;
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
        font-size: 1vmax;
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
        font-size: 1.5vmax;
    }

    .blogBody {
        margin-bottom: 1vw;
        font-size: clamp(1vmax, 10px, 5px);
        margin-top: 0;
        text-align: justify;
    }

    .announcementFlex {
        padding: 0;
        margin: 0;
        display: flex;
        flex-wrap: wrap;
    }

    .mapAPI {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding-bottom: 2vw;
    }

    .navbar-fixed-top.scrolled {
        top: 0;
        position: sticky;
        background-color: gray;
        transition: background-color 200ms linear;
    }

    .nav {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 2vmax;
    }

    .nav-item {
        font-size: 1.5vmax;
    }

    .tab-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .tab-pane {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>

<body>

    <div class="navbar-fixed-top">

        <?php
        require './marginals/topbarLanding.php';
        $resultOfficer = $con->query("SELECT * FROM post WHERE officer_post = 'Yes' AND post_status = 'Active' ORDER BY post_id DESC") or die($mysqli->error);
        ?>
    </div>
    <form action="" method="post">
        <div class="modal fade" id="raiseConcern" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Amenities</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="message-text" class="col-form-label">Enter your Full Name:</label>
                        <input type="text" class="form-control" name="guestName" id="recipient-name" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="sessionName" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="landingPage">
        <input type="hidden" value=<?php echo $verified ?? ''; ?> />
        <img src="./img/landingBG2.jpg" alt="" />
        <div class="landingTitle">
            Sunnyvale
            <p>Where dreams come home.</p>
        </div>
    </div>





    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Recent Announcements</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Mission and Vision</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Mapping</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">

        <div class="RecentContent tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <label class="landingTitles">Recent Announcements</label>
            <div class="announcementFlex">
                <?php while ($row = $resultOfficer->fetch_assoc()) : ?>
                    <div class="blogPost">

                        <div class="postContent">
                            <p class="blogTitle"><?php echo $row['title']; ?></p>
                            <p class="blogBody">
                                <?php echo $row['content']; ?>
                            </p>
                        </div>
                        <div class="profileText">
                            <p class="profileDate">
                                <?php
                                $datetime = strtotime($row['published_at']);
                                echo $phptime = date("g:i A m/d/y", $datetime);
                                ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="landingIntroduction tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <?php while ($rowMissionVision = $resultMissionVision->fetch_assoc()) : ?>
                <label class="landingTitles"><?php echo $rowMissionVision['type']; ?></label>
                <p class="landingText">
                    <?php
                    echo $rowMissionVision['description'];
                    ?>
                </p>
            <?php endwhile; ?>
        </div>
        <div class="mapAPI tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <label class="landingTitles">Sunnyvale Mapping and Location</label>
            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="1000" height="650" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.693686289688!2d121.18504008032782!3d14.50226569107638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c1095fa7f5f3%3A0x844718961bfe7b61!2sSunnyvale%20II%20Subdivision!5e0!3m2!1sen!2sph!4v1676337760857!5m2!1sen!2sph" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href=""></a><br>
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
        </div>

    </div>


    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.693686289688!2d121.18504008032782!3d14.50226569107638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c1095fa7f5f3%3A0x844718961bfe7b61!2sSunnyvale%20II%20Subdivision!5e0!3m2!1sen!2sph!4v1676337760857!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->


    <div>
        <?php
        require './marginals/footer.php';
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(document).scroll(function() {
                var $nav = $(".topLanding");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });
        });
    </script>
</body>

</html>