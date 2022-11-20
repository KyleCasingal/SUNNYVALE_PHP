<?php
include "../process.php";
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($mysqli));
$username = $_SESSION['username'];
$res = $con->query("SELECT * FROM user WHERE username = '" . $username = $_SESSION['username'] . "'") or die($mysqli->error);
if (empty($_SESSION)) {
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
  <link rel="stylesheet" href="../topbar/topBar.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>SUNNYVALE</title>
</head>
<style>
  .topbarNav {
    display: flex;
    gap: 1vw;
    align-items: center;
  }

  .nav {
    margin-bottom: 0;
    padding: 0;
    width: 100%;
    height: 4.5vw;
    background-color: rgba(255, 253, 245, 0.767);
    position: sticky;
    top: 0;
    display: flex;
    align-items: center;
    font-family: "Poppins", sans-serif;
    z-index: 999;
    backdrop-filter: blur(5px);
  }


  .topLeft {
    flex: 3;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin-left: 1vw;
  }

  .topLeft img {
    max-height: 4vw;
  }

  .topRight {
    flex: 3;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin-right: 1vw;
  }

  .topCenter {
    flex: 60;
  }

  .topIcon {
    font-size: 2vw;
    margin-right: 10px;
    color: rgb(89, 89, 89);
    font-family: "Poppins", sans-serif;
    font-style: normal;
    cursor: pointer;
  }

  .topImg1 {
    width: 3vw;
    border-radius: 50%;
    object-fit: cover;
    cursor: pointer;
  }

  .topList {
    display: flex;
    justify-content: flex-end;
    margin: 0;
    padding: 0;
    list-style: none;
    color: rgb(89, 89, 89);

  }

  .topListItem1 {

    color: rgb(89, 89, 89);
    padding: 0.5vw;
    margin-right: 0.1vw;
    font-size: 1.2vw;
    font-weight: 300;
    cursor: pointer;
  }

  .topListItem1:hover {
    color: black;
    cursor: pointer;
  }

  .topSearchIcon {
    font-size: 18px;
    color: rgb(89, 89, 89);
    cursor: pointer;
    margin-left: 15px;
  }

  .dropdown-menu1 {
    box-shadow: 0px 1px 10px gray;
    position: absolute;
    align-content: center;
    justify-content: center;
    top: 5vw;
    right: 2vw;
    background-color: rgba(255, 253, 245, 0.95);
    border-radius: var(--border-radius);
    padding: 1vw 1vw;
    width: 20vw;
  }

  .dropdown-menu1::before {
    content: '';
    position: absolute;
    top: -5vw;
    right: 2vw;
    height: 2vw;
    width: 2vw;
    background: var(--secondary-bg);
    transform: rotate(45deg);
  }

  .dropdown-menu1.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    transition: var(--speed) ease;
  }

  .dropdown-menu1.inactive {
    opacity: 0;
    visibility: hidden;
    transform: translateY(-20px);
    transition: var(--speed) ease;
  }


  .uName {
    width: 100%;
    text-align: center;
    font-size: 1.5vw;
    padding: 1vw 0;
    font-weight: 500;
    color: var(--primary-text-color);
    line-height: 1rem;
  }

  .uType {
    font-size: 1vw;
    color: var(--secondary-text-color);
    font-weight: 400;
  }

  .dropdown-menu1 ul li {
    padding-bottom: 0.1vw 0;


  }

  .dropdown-menu1 ul li:hover a {
    color: rgb(212, 33, 9);
    cursor: pointer;
  }

  .dropdown-menu1 ul li:hover img {
    opacity: 1;
    cursor: pointer;
  }

  .dropdownItem1 {
    display: flex;
    margin: 1vw 0;
  }

  .dropdownItem1 img {
    max-width: 2vw;
    max-height: 2vw;
    margin-right: 1vw;
    opacity: 0.5;
    transition: var(--speed);
  }

  .dropdownItem1 a {
    font-size: 1.2vw;
    max-width: 20vw;
    transition: var(--speed);
  }
</style>

<body>
  <div class='nav'>
    <div class="topLeft">
      <img src="..\img\logoSVgray.png" alt="" />
      <i class="topIcon">SUNNYVALE</i>
    </div>
    <form class="topbarNav" method="post">
      <div class="topCenter">
        <ul class="topList">
          <li name="logout" onclick="location.href='../logout.php'" class="topListItem1">HOME</li>
          <li onclick="location.href='../modules/amenities.php'" class="topListItem1">AMENITIES</li>
          <li onclick="location.href='../modules/blogHome.php'" class="topListItem1"> BLOG</li>
        </ul>
      </div>
      <div class="topRight">
        <div class='menu-trigger'>
          <img class="topImg1" <?php
                                $row = $res->fetch_assoc();
                                $imageURL = '../media/displayPhotos/' . $row['display_picture'];
                                ?> src="<?= $imageURL ?>" alt="" />
        </div>
      </div>
    </form>
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
</body>

</html>