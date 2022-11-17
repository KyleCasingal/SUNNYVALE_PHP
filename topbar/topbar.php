<?php
include "../process.php";
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($mysqli));
$username = $_SESSION['username'];
$res = $con->query("SELECT * FROM user WHERE username = '" . $username = $_SESSION['username'] . "'") or die($mysqli->error);
if(empty($_SESSION))
{
  header("Location: ../index.php");
}
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
    <title>SUNNYVALE</title>
</head>
<body>
<form method = "post">
<div class='top1'>
        <div class="topLeft">
          <img src="..\img\logoSVgray.png" alt="" />
            <i class="topIcon">SUNNYVALE</i>
        </div>
        <div class="topCenter">
            <ul class="topList">
              <li name="logout" onclick="location.href='../logout.php'" class="topListItem1">HOME</li>
              <li onclick="location.href='../amenities/amenities.php'" class="topListItem1">AMENITIES</li>
              <li onclick="location.href='../blogHome/blogHome.php'" class="topListItem1"> BLOG</li>
              <li onclick="location.href='../blogWrite/blogWrite.php'" class="topListItem1" name="write" id="write">WRITE</li>
            </ul>
        </div>
        <div class="topRight">
        <div class='menu-trigger'>
        <img
              class="topImg1"
              <?php
              $row = $res->fetch_assoc();
                $imageURL = '../media/displayPhotos/' . $row['display_picture'];
              ?>
              src="<?=$imageURL?>" alt=""/>
        </div>
        </div>

        <!-- <div class={`dropdown-menu ${open? 'active' : 'inactive'}`} >
          <h3>Nene Yashiro<br/><span>Member</span></h3>
          <ul>
            <div>
              <DropdownItem img = {user} text = {"My Profile"}/>
            </div>
            <div>
              <DropdownItem img = {edit} text = {"Edit Profile"}/>
            </div>
            <div>
              <DropdownItem img = {inbox} text = {"Inbox"}/>
            </div>
            <div>
              <DropdownItem img = {settings} text = {"Settings"}/>
            </div>
            <div>
              <DropdownItem img = {help} text = {"Helps"}/>
            </div>
            <div >
              <DropdownItem img = {logout} text = {"Logout"}/>
            </div>
          </ul>
        </div> -->

    </div>
    </form>
</body>
</html>
