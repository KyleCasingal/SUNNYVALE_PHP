<?php
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($mysqli));
$result = $con->query("SELECT * FROM post, user WHERE full_name = username ORDER BY post_id DESC") or die($mysqli->error);
require '../marginals/topbar.php';
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>SUNNYVALE</title>
</head>
<style>
  :root {
    --text: black;
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
    font-size: 30px;
    display: flex;
    width: 55%;
    margin-left: 5%;
    margin-top: 20px;
    padding-right: 10px;
    font-family: "Poppins", sans-serif;
  }

  .headTxt {
    flex: 1;
  }

  .blogHome {
    width: 100%;
    color: rgb(89, 89, 89);
  }

  .blogPost {
    align-items: center;
    justify-content: center;
    width: 55%;
    margin-left: 5%;
    margin-top: 20px;
    margin-bottom: 50px;
    padding: 10px;
    border-radius: 10px;
    background-color: rgba(234, 232, 199, 0.2);
    font-family: "Poppins", sans-serif;
  }

  .blogProfile {
    width: 100%;
    display: flex;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-style: solid;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    border-bottom: 1px solid rgb(210, 210, 210);
  }

  .avatarBlog {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    cursor: pointer;
    margin-right: 10px;
  }

  .profileText {
    color: var(--text);
    display: flex;
    align-items: center;
    width: 100%;
  }

  .profileName {
    flex: 11;
    font-size: 25px;
    align-items: center;
    justify-content: flex-start;
  }

  .profileName:hover {
    color: rgb(89, 89, 89);
    cursor: pointer;
  }

  .profileDate {
    flex: 2;
    font-size: 15px;
    align-self: flex-end;
    justify-content: flex-end;
  }

  .postImg {
    max-width: 90%;
    max-height: 40vw;
  }

  .blogTitle {
    font-weight: bold;
    font-family: "Poppins", sans-serif;
    margin-top: 10px;
    font-size: 20px;
  }

  .blogBody {
    text-indent: 50px;
    margin-top: 10px;
    text-align: justify;
  }

  .sideContent {
    color: rgb(89, 89, 89);
    height: 100%;
    width: 30%;
    position: fixed;
    z-index: 0;
    top: 0;
    right: 0;
    overflow-x: hidden;
    margin-top: 20px;
  }

  .sideText {
    font-size: 30px;
    margin-top: 80px;
    padding-right: 10px;
    font-family: "Poppins", sans-serif;
    color: var(--text);
  }

  .categoriesText {
    color: var(--text);
    margin-top: 20px;
    margin-bottom: 50px;
    padding: 10px;
    border-radius: 10px;
    background-color: rgba(234, 232, 199, 0.2);
    font-family: "Poppins", sans-serif;
  }

  .categoryList1 {
    display: inline;
    justify-content: flex-end;
    margin-top: 5px;
    margin-bottom: 0;
    padding: 0;
    list-style: none;
  }

  .categoryListItem1 {
    margin-top: 10px;
    margin-left: 10px;
    cursor: pointer;
  }

  .categoryListItem1:hover {
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
</style>

<body>

  <div class='blogHome'>
    <div class="blogPage">
      <div class="blogHead">
        <p class="headTxt">Recent Posts</p>
        <button id="newPost" type="button" class="newPostBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          + New Post
        </button>
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
        <img class="postImg" <?php
                              $imageURL = '../media/postsPhotos/' . $row['content_image'];
                              ?> src="<?= $imageURL ?>" alt="">
        </img>
        <p class="blogTitle"><?php echo $row['title']; ?></p>
        <p class="blogBody">
          <?php echo $row['content']; ?>
        </p>
      </div>
      <div class="sideContent">
        <div class="sideText">
          <p>Categories</p>
          <div class="categoriesText">
            <ul class="categoryList1">
              <li class="categoryListItem1">LifeStyle</li>
              <li class="categoryListItem1">Food</li>
              <li class="categoryListItem1">Events</li>
              <li class="categoryListItem1">Sports</li>
            </ul>
          </div>
        </div>
      </div>
  </div>
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
<?php endwhile; ?>
<?php
require '../marginals/footer2.php'
?>
</body>

</html>
<script>

</script>