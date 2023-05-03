<?php
require '../marginals/topbar.php';
$result = $con->query("SELECT post.post_id, post.full_name, post.title, post.content, post.content_image, post.published_at, tenant.full_name, tenant.display_picture FROM post, tenant WHERE tenant.full_name = post.full_name AND officer_post = 'No' AND post_status = 'Active' UNION SELECT post.post_id, post.full_name, post.title, post.content, post.content_image, post.published_at, CONCAT(homeowner_profile.first_name, ' ', homeowner_profile.last_name), homeowner_profile.display_picture FROM post, homeowner_profile WHERE CONCAT(homeowner_profile.first_name, ' ', homeowner_profile.last_name) = post.full_name AND officer_post = 'No' AND post_status = 'Active' ORDER BY post_id DESC") or die($mysqli->error);
$resultOfficer = $con->query("SELECT * FROM post, homeowner_profile WHERE full_name = CONCAT(first_name, ' ', last_name) AND officer_post = 'Yes' AND post_status = 'Active' ORDER BY post_id DESC") or die($mysqli->error);
$resultOfficer1 = $con->query("SELECT * FROM post, homeowner_profile WHERE full_name = CONCAT(first_name, ' ', last_name) AND officer_post = 'Yes' AND post_status = 'Active' ORDER BY post_id DESC") or die($mysqli->error);
$resultUser = $con->query("SELECT * FROM user WHERE user_id = " . $user_id = $_SESSION['user_id'] . "") or die($mysqli->error);
$rowUser = $resultUser->fetch_assoc();
$resultVehicle = $con->query("SELECT * FROM vehicle_monitoring ORDER BY datetime DESC");
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

  .modal-footer {
    background-color: rgb(0, 0, 0, 0);
  }

  .announcementText {
    font-size: 1.1em;
    padding: 0.5em;

  }

  .archived-post-btn {
    background-color: rgb(248, 186, 55);
    color: white;
    justify-self: flex-end;
    font-size: 1vw;
    height: 3vw;
    width: 10vw;
    border-radius: 0.5vw;
    border: 0 none;
  }

  .new-announcement-btn {
    background-color: rgb(248, 186, 55);
    color: white;
    justify-self: flex-end;
    font-size: 0.8vw;
    height: 3vw;
    width: 10vw;
    border-radius: 0.5vw;
    border: 0 none;
  }

  .archive-btn {
    margin: 0.5vw;
    font-family: 'Poppins', sans-serif;
    color: white;
    text-decoration: none;
    border-radius: 0.5vw;
    max-height: 2vw;
    font-size: 0.8vw;
    background-color: lightcoral;
    padding: 0.5vw;
  }

  .archive-btn:hover {
    color: white;
  }

  .tbl-vehicle-reg td {
    padding: 0.5vw;
  }

  .lbl-vehicle-reg {
    font-size: 1vw;
    font-weight: bold;
  }

  .vehicle-reg-input {
    font-family: 'Poppins', sans-serif;
    border-radius: 0.5vw;
    border: none;
  }

  .vehicle-reg-select {
    font-family: 'Poppins', sans-serif;
    border: none;
    border-radius: 0.5vw;
  }

  .vehicle-reg-btn-group {
    display: flex;
    gap: 2vw;
  }

  .btn-vehicle-reg {
    border: none;
    border-radius: 0.5vw;
    background-color: lightcoral;
    padding: 0.5vw;
    color: white;
    margin: 0;
  }

  .tbl-vehicle-reg-list {
    width: 100%;
    table-layout: fixed;
  }

  .tbl-vehicle-reg-list td {
    padding: 0.2vw;
  }

  .vehicle-reg-container {
    display: flex;
    padding: 0.5vw;
  }
</style>

<body>

  <div class='blogHome'>
    <?php
    if ($user_type != 'Guard') {
    ?>
      <div class="blogScroll">
        <div class="blogHead">
          <p class="headTxt">Recent Posts</p>
          <form action="" method="POST">
            <?php
            if ($rowUser['user_type'] == 'Admin' or $rowUser['user_type'] == 'Secretary') {
              echo "<button id='archivedPosts' name='archivedPosts' type='submit' class='archived-post-btn'>Archived Posts</button>
          <button id='newPost' type='button' class='new-announcement-btn' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>+ New Announcement</button>";
            } else if ($rowUser['user_type'] == 'Homeowner' or $rowUser['user_type'] == 'Tenant') {
              echo "<button id='newPost' type='button' class='newPostBtn' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                    + New Post
                  </button>";
            }
            ?>
          </form>
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <?php
                  if ($rowUser['user_type'] == 'Admin' or $rowUser['user_type'] == 'Secretary') {
                    echo "<h5 class='modal-title' id='staticBackdropLabel'>Add new announcement</h5>";
                  } else if ($rowUser['user_type'] == 'Homeowner' or $rowUser['user_type'] == 'Tenant') {
                    echo "<h5 class='modal-title' id='staticBackdropLabel'>Add new post</h5>";
                  }
                  ?>
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
              <?php
              if ($rowUser['user_type'] == 'Admin' or $rowUser['user_type'] == 'Secretary') {
              ?>
                <a href='../process.php?post_archive=" . $row[' post_id'] . "'class='archive-btn'>ARCHIVE</a>
              <?php
              }
              ?>
              </div>
                  <div class=" postContent">
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
    <?php
    } else {
    ?>
      <div class="blogScroll">
        <form action="" method="POST">
          <div class="blogHead">
            <p class="headTxt">Vehicle Monitoring</p>
          </div>
          <div class="blogPost">
            <div class="blogProfile">
              <div class="profileText">
                <table class="tbl-vehicle-reg">
                  <tr>
                    <td><label class="lbl-vehicle-reg">Vehicle Registration Number</label></td>
                    <td><label class="lbl-vehicle-reg">Vehicle Type</label></td>
                    <td><label class="lbl-vehicle-reg">Vehicle Color</label></td>
                  </tr>
                  <tr>
                    <td> <input class="vehicle-reg-input" name="vehicle_registration" type="text" required></td>
                    <td> <select class="vehicle-reg-select" name="vehicle_type" id="vehicle_type" required>
                        <option value="">Select vehicle type</option>
                        <option value="Motorcycle">Motorcycle</option>
                        <option value="Tricycle">Tricycle</option>
                        <option value="Sedan">Sedan</option>
                        <option value="Van">Van</option>
                        <option value="SUV">SUV</option>
                        <option value="Truck">Truck</option>
                      </select></td>
                    <td> <input class="vehicle-reg-input" name="vehicle_color" type="text" required></td>
                  </tr>
                </table>
                <div class="vehicle-reg-btn-group">
                  <button class="btn-vehicle-reg" type="button" data-bs-toggle="modal" data-bs-target="#incomingModal">Incoming</button>
                  <button class="btn-vehicle-reg" type="button" data-bs-toggle="modal" data-bs-target="#outgoingModal">Outgoing</button>
                </div>
              </div>
            </div>
            <div class="modal fade" id="incomingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Do you really want to set this vehicle as incoming?
                  </div>
                  <div class="modal-footer">
                    <button name="incoming" type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="outgoingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Do you really want to set this vehicle as outgoing?
                  </div>
                  <div class="modal-footer">
                    <button name="outgoing" type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </div>
              </div>
            </div>
        </form>
        <div class="vehicle-reg-container">
          <table class="tbl-vehicle-reg-list">
            <th>Date</th>
            <th>Vehicle Registration</th>
            <th>Vehicle Type</th>
            <th>Vehicle Color</th>
            <th>Status</th>
            <?php while ($row = $resultVehicle->fetch_assoc()) : ?>
              <form action="" method="POST">
                <tr>
                  <input type="hidden" name="vehicle_monitoring_id" value="<?php echo $row['vehicle_monitoring_id'] ?>">
                  <td><?php
                      $datetime = strtotime($row['datetime']);
                      echo $phptime = date("g:i A m/d/y", $datetime);
                      ?></td>
                  <td><?php echo $row['vehicle_registration'] ?></td>
                  <td><?php echo $row['vehicle_type'] ?></td>
                  <td><?php echo $row['vehicle_color'] ?></td>
                  <td><?php echo $row['status'] ?></td>
                  <td><button class="archive-btn" type="button" data-bs-toggle="modal" data-bs-target="#removeModal<?php echo $row['vehicle_monitoring_id'] ?>">Remove</button></td>
                </tr>
                <div class="modal fade" id="removeModal<?php echo $row['vehicle_monitoring_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Do you really want to remove this?
                      </div>
                      <div class="modal-footer">
                        <button name="removeVehicle" type="submit" class="btn btn-danger">Remove</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            <?php endwhile; ?>
          </table>
        </div>
      </div>
  </div>
<?php
    }
?>
<div class="sideContent">
  <div class="sideText">
    <label class="sideTitle">Announcements</label>
    <div class="announcementScroll">
      <table class="announcementTable">
        <?php while ($row = $resultOfficer->fetch_assoc()) : ?>
          <tr>
            <td class="tblTitle use-address" data-bs-toggle="modal" data-bs-target="#complaintStatus<?php
                                                                                                    echo $row['post_id'];
                                                                                                    ?>"> <?php echo $row['title']; ?> </td>
            <td class="use-address" hidden><?php echo $row['content']; ?></td>
            <td class="tblDate use-address" data-bs-toggle="modal" data-bs-target="#complaintStatus<?php
                                                                                                    echo $row['post_id'];
                                                                                                    ?>"><?php
                                                                                                        $datetime = strtotime($row['published_at']);
                                                                                                        echo $phptime = date("g:i A m/d/y", $datetime);
                                                                                                        ?></td>
            <td><?php
                if ($rowUser['user_type'] == 'Admin' or $rowUser['user_type'] == 'Secretary') {

                  echo "<a href='../process.php?post_archive=" . $row['post_id'] . "'class='archive-btn'>ARCHIVE</a>";
                }
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
    <label class="footerCopyright">© Sunnyvale Subdivisions, 2023</label>
  </span>
</div>
</div>
<?php while ($row1 = $resultOfficer1->fetch_assoc()) : ?>
  <div class="modal fade" id="complaintStatus<?php
                                              echo $row1['post_id'];
                                              ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
              <td class="announcementText" id=""><?php echo $row1['title']; ?></td>
            </tr>
            <tr>
              <td class="announcementText">Details:</td>
              <td class="announcementText" id=""><?php echo $row1['content']; ?></td>
            </tr>
            <tr>
              <td class="announcementText">Date Posted:</td>
              <td class="announcementText" id=""><?php $datetime = strtotime($row1['published_at']);
                                                  echo $phptime = date("g:i A m/d/y", $datetime); ?></td>
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
<?php endwhile; ?>
<!-- <?php require '../marginals/footer2.php' ?> -->
</body>

</html>