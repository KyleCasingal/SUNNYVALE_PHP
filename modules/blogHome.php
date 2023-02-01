<?php
require '../marginals/topbar.php';
$result = $con->query("SELECT * FROM post, homeowner_profile WHERE full_name = CONCAT(first_name, ' ', last_name) AND officer_post = 'No' ORDER BY post_id DESC") or die($mysqli->error);
$resultOfficer = $con->query("SELECT * FROM post, homeowner_profile WHERE full_name = CONCAT(first_name, ' ', last_name) AND officer_post = 'Yes' ORDER BY post_id DESC") or die($mysqli->error);

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>SUNNYVALE</title>
</head>
<style>
  :root {
    --text: black;
  }

  .blogHome {
    display: flex;
    flex-direction: row;
  }

  .messageSuccess {
    display: flex;
    padding: 1vw;
    justify-content: space-between;
    font-family: 'Poppins', sans-serif;
    font-size: 1.5vw;
    background-color: darkseagreen;
    color: white;
  }

  .mdl-body {
    margin: 0;
    font-style: 'Poppins', sans-serif;
  }

  .newPostBtn {
    background-color: rgb(248, 186, 55);
    color: white;
    justify-self: flex-end;
    font-size: 1.5vw;
    height: 3vw;
    width: 10vw;
    border-radius: 0.5vw;
    border: 0 none;
  }

  .blogHead {
    color: var(--text);
    font-size: 2vw;
    display: flex;
    width: 85%;
    margin-left: 5%;
    margin-top: 2vw;
    font-family: "Poppins", sans-serif;
  }

  .headTxt {
    flex: 1;
  }

  .blogScroll {
    width: 100%;
    color: rgb(89, 89, 89);
  }

  .blogPost {
    align-items: center;
    justify-content: center;
    width: 85%;
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
    text-indent: 5vw;
    margin-top: 0;
    text-align: justify;
  }

  .sideContent {
    padding-right: 1vw;
    z-index: 1;
    margin: 0;
    position: sticky;
    top: 1vw;
    height: 100%;
    width: 40%;
    overflow: hidden;
    margin-top: 2vw;
  }

  .sideText label {
    padding-bottom: 1vw;
    font-weight: normal;
    font-size: 2vw;
    font-family: "Poppins", sans-serif;
    color: var(--text);
  }

  .sideText {
    margin: 0;
  }

  .categoriesText {
    color: var(--text);
    margin-top: 2vw;
    padding: 0.5vw;
    border-radius: 1vw;
    font-family: "Poppins", sans-serif;
  }

  .categoryList {
    font-weight: normal;
    display: inline;
    justify-content: flex-end;
    margin-bottom: 0;
    padding: 0;
    list-style: none;
  }

  .categoryListItem {
    font-size: 1.5vw;
    font-weight: normal !important;
    margin-top: 0.5vw;
    margin-left: 0.5vw;
    cursor: pointer;
  }

  .categoryListItem:hover {
    color: rgb(89, 89, 89);
    cursor: pointer;
  }

  .darkmodeBtn {
    height: 1.4vw;
    align-items: center;
    display: inline-flex;
    margin-top: 2vw;
    margin-left: 4vw;
  }

  .darkBtnTxt {
    font-size: 1.5vw;
    font-family: "Poppins", sans-serif;
  }

  input[type="checkbox"]:checked~.darkBtnTxt {
    color: lightgray;
    transition: ease-in 0.5s;
  }

  input[type="checkbox"] {
    appearance: none;
    -webkit-appearance: none;
    visibility: hidden;
    display: none;
  }

  .check {
    z-index: -999;
    position: relative;
    display: block;
    width: 4vw;
    height: 2vw;
    border-radius: 2vw;
    background: #141d26;
    cursor: pointer;
    overflow: hidden;
    transition: ease-in 0.5s;
  }

  input[type="checkbox"]:checked~.check {
    background: #fff;
    box-shadow: 0 0 0 99999vw #141d26;
  }

  .check:before {
    content: "";
    position: absolute;
    top: 0.2vw;
    left: 0.2vw;
    background: #fff;
    width: 1.6vw;
    height: 1.6vw;
    border-radius: 50%;
    transition: 0.5s;
  }

  input[type="checkbox"]:checked~.check:before {
    transform: translateX(-5vw);
  }

  .check:after {
    content: "";
    position: absolute;
    top: 0.2vw;
    right: 0.2vw;
    background: #141d26;
    width: 1.6vw;
    height: 1.6vw;
    border-radius: 50%;
    transition: 0.5s;
    transform: translateX(5vw);
  }

  input[type="checkbox"]:checked~.check:after {
    transform: translateX(0vw);
  }

  .dark {
    --text: lightgray;
  }

  .postContent {
    display: flex;
    flex-direction: column;
  }

  .announcementScroll {
    background-color: rgb(170, 192, 175, 0.3);
    border-radius: 1vw;
    padding-top: 1vw;
    padding-bottom: 1vw;
  }

  .announcementTable {
    width: 100%;
  }

  .announcementTable tr {
    width: 100%;
  }

  .announcementTable .tblTitle {
    text-align: left;
    white-space: nowrap;
    padding-left: 1vw;
    padding-top: 0.5vw;
    padding-bottom: 0.5vw;
    width: auto;
  }


  .announcementTable .tblAvatarCell {
    padding-left: 1vw;
    padding-top: 0.5vw;
    padding-bottom: 0.5vw;
    width: 2.5vw;
  }

  .announcementTable .tblDate {
    padding-left: 0.5vw;
  }


  .announcementTable tr:hover {
    background-color: rgb(170, 192, 175);
    cursor: pointer;
  }

  .mdl-body,
  .modal-header {
    background-color: rgb(170, 192, 175, 0.3);
  }

  .tblAvatar {
    max-width: 2.5vw;
    max-height: 2.5vw;
    border-radius: 50%;
  }

  .tblTitle {
    text-align: left;
    font-family: 'Poppins', sans-serif;
    font-size: 1vw;
    font-weight: bold;
  }

  .tblDate {
    text-align: left;
    font-family: 'Poppins', sans-serif;
    font-size: 0.8vw;
  }

  .linkList {
    margin-left: 1em;
  }

  .footerLink {
    font-family: 'Poppins', sans-serif;
    font-size: 1vw;
    padding: 0.2em;
    color: gray;
    text-decoration: none;
  }

  .footerLink:hover {
    color: gray;
    text-decoration: underline;
  }

  .footerCopyright {
    font-family: 'Poppins', sans-serif;
    font-size: 1vw;
    padding: 0.2em;
    color: gray;
    margin-left: 1em;
  }

  .modalConcernBody {
    background-color: rgb(170, 192, 175, 0.3);
    padding: 1vw;
  }
  .modal-footer{
    background-color: rgb(0, 0, 0, 0);
  }
  .announcementText{
    font-size: 1.1em;
    padding: 0.5em;

  }
</style>

<body>

  <div class='blogHome'>
    <div class="blogScroll">
      <div class="blogHead">
        <p class="headTxt">Recent Posts</p>
        <button id="newPost" type="button" class="newPostBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          + New Post
        </button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add new post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="mdl-body">
                <form method="post" enctype="multipart/form-data">
                  <?php
                  require '../modules/blogWrite.php';
                  ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="blogPost">
          <div class="blogProfile">
            <img class="avatarBlog" <?php
                                    $imageURL = '../media/displayPhotos/' . $row['display_picture'];
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

    <div class="sideContent">
      <div class="sideText">
        <label class="sideTitle">Announcements</label>
        <div class="announcementScroll">
          <table class="announcementTable">
            <?php while ($row = $resultOfficer->fetch_assoc()) : ?>
              <tr>
                <td class="tblTitle use-address" data-bs-toggle="modal" data-bs-target="#complaintStatus"> <?php echo $row['title']; ?> </td>
                <td class="use-address" hidden><?php echo $row['content']; ?></td>
                <td class="tblDate use-address" data-bs-toggle="modal" data-bs-target="#complaintStatus"><?php
                                                                                                          $datetime = strtotime($row['published_at']);
                                                                                                          echo $phptime = date("g:i A m/d/y", $datetime);
                                                                                                          ?></td>
              </tr>
            <?php endwhile; ?>
          </table>
        </div>
      </div>
      <span class="footerList">
        <div class="linkList">
          <a class="footerLink" href="">About</a>
          <a class="footerLink" href="">Contact</a>
          <a class="footerLink" href="">Privacy</a>
          <a class="footerLink" href="">Developers</a>
        </div>
        <label class="footerCopyright">© Sunnyvale Subdivisions</label>
      </span>
    </div>
  </div>
  <div class="modal fade" id="complaintStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">
            Announcement Details
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modalConcernBody">
          <table>
            <tr>
              <td class="announcementText">Subject:</td>
              <td class="announcementText" id="subject"></td>
            </tr>
            <tr>
              <td class="announcementText">Details:</td>
              <td class="announcementText" id="details"></td>
            </tr>
            <tr>
              <td class="announcementText">Date Posted:</td>
              <td class="announcementText" id="date"></td>
            </tr>
          </table>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <?php require '../marginals/footer2.php' ?> -->
</body>
<script>
  $(".use-address").click(function() {
    var $row = $(this).closest("tr"); // Find the row
    var $tds = $row.find("td");
    $.each($tds, function(index) {
      document.getElementById("subject").innerHTML = ($(this).text());
      return (index !== 0);
    });
    $.each($tds, function(index) {
      document.getElementById("details").innerHTML = ($(this).text());
      return (index !== 1);
    });
    $.each($tds, function(index) {
      document.getElementById("date").innerHTML = ($(this).text());
      return (index !== 2);
    });

  });
</script>

</html>