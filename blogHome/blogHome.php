<?php
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($mysqli));
$result = $con->query("SELECT * FROM post, user WHERE full_name = username") or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="blogHome1.css" media="screen">
  <link rel="stylesheet" href="../topbar/topbar1.css" media="screen">
  <link rel="stylesheet" href="../footer/footer.css" media="screen">
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="../blogWrite/blogWrite.css">
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>SUNNYVALE</title>
</head>
<style>
  .mdl-body {
    margin: 0;
    font-style: 'Poppins', sans-serif;
  }

  .newPostBtn{
    background-color: rgb(248, 186, 55);
    color: white;
    justify-self: flex-end;
    font-size: 1.5vw;
    height: 3vw;
    width: 10vw;
    border-radius: 0.5vw;
    border: 0 none;
  }
  .blogHead{
    display: flex;
    width: 55%;
  }
  .headTxt{
    flex: 1;
  }
</style>

<body>
  <?php require '../topbar/topbar.php'; ?>
  <div class='blogHome'>
    <div class="blogPage">
      <div class="blogHead">
        <p class="headTxt">Recent Posts</p>
        <button type="button" class="newPostBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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

      <!-- <div class="blogPost">
        <div class="blogProfile">
          <img class="profileImg"
                src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/e2dfe33e-32e3-41b7-b62c-96985dd07256/ddr2jj8-e99ccf68-7627-4c2a-9e6c-a2cb8296745a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2UyZGZlMzNlLTMyZTMtNDFiNy1iNjJjLTk2OTg1ZGQwNzI1NlwvZGRyMmpqOC1lOTljY2Y2OC03NjI3LTRjMmEtOWU2Yy1hMmNiODI5Njc0NWEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.QmKKaPVNkSj_e9r_HO4hEbDua3HoNqS1IEwaYkqE9Vw"
                alt="" />
          <div class="profileText">
            <p class="profileName">Amane Yugi</p>
            <p class="profileDate">5:32 pm 10/30/2022</p>
          </div>
        </div>
        
        <img class="postImg" src="https://1.bp.blogspot.com/-D5CbLLfVCUE/VPro2zrcLEI/AAAAAAABVIA/2NxqCPL_k-c/s1600/Queen%2BElizabeth%2BII%2B(1).jpg" alt=""></img>
        <p class="blogTitle">Lorem Ipsum</p>
        <p class="blogBody">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu consectetur eros. Morbi non ex sed tellus tincidunt iaculis vitae id augue. Fusce laoreet ultrices libero id tristique. Nullam scelerisque maximus rutrum. Nam eu augue non leo sollicitudin vehicula ac at neque. Integer tempor gravida ex, vitae consectetur nisi fermentum ultrices. Donec luctus elementum neque, sit amet pellentesque elit eleifend a.
        </p>

        
      </div>

      <div class="blogPost">
        <div class="blogProfile">
          <img class="profileImg"
                src="https://i.pinimg.com/736x/57/6d/25/576d256698b579eb1a762406a74b9ef2.jpg"
                alt="" />
          <div class="profileText">
            <p class="profileName">Kou Minamoto</p>
            <p class="profileDate">5:57 pm 10/30/2022</p>
          </div>
        </div>
        
        <img class="postImg" src="https://www.boredpanda.com/blog/wp-content/uploads/2022/01/61e6c042b43f1_lc3n8ty6to881__700.jpg" alt=""></img>
        <p class="blogTitle">Lorem Ipsum</p>
        <p class="blogBody">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu consectetur eros. Morbi non ex sed tellus tincidunt iaculis vitae id augue. Fusce laoreet ultrices libero id tristique. Nullam scelerisque maximus rutrum. Nam eu augue non leo sollicitudin vehicula ac at neque. Integer tempor gravida ex, vitae consectetur nisi fermentum ultrices. Donec luctus elementum neque, sit amet pellentesque elit eleifend a.
        </p>      
      </div> -->
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
          <form method="post">
            <?php
            require '../blogWrite/blogWrite.php';
            ?>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Done</button>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>
<?php
require '../footer/footer2.php'
?>
</body>

</html>