<?php
include "../process.php";
if (isset($_SESSION['user_id'])) {
  header("Location: ./blogHome.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  .topLanding {
    margin-bottom: 0;
    padding: 0;
    width: 100%;
    height: 6vw;
    background-color: rgba(131, 151, 145);
    position: sticky;
    top: 0;
    display: flex;
    align-items: center;
    font-family: "Poppins", sans-serif;
    z-index: 999;
    backdrop-filter: blur(5px);

  }

  .topLeftLanding {
    flex: 3;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin-left: 2vw;
  }

  .topLeftLanding img {
    max-height: 5vw;
  }

  .topIconLanding {
    font-size: 2.5vw;
    margin-right: 10px;
    color: white;
    font-family: "Poppins", sans-serif;
    font-style: normal;
    cursor: pointer;
  }

  .topLeftLanding {
    color: white;
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: flex-start;
  }

  .topRightLanding {
    color: white;
    flex: 1;
    display: flex;
    padding-right: 20px;
    flex-direction: column;
    align-items: flex-end;
    justify-content: flex-end;

  }



  .topCenter {
    flex: 60;

  }



  .topImg {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    cursor: pointer;
  }

  .topListLanding {
    display: inline-flex;
    justify-content: flex-end;
    margin: 0;
    padding: 0;
    list-style: none;
    color: white;
  }

  .topListItemLanding {
    color: white;
    padding: 0.8vw;
    margin-right: 0.2vw;
    font-size: 1vw;
    font-weight: 300;
    cursor: pointer;
  }

  .topListItemLanding:hover {
    color: black;
    cursor: pointer;
  }

  .topSearchIcon {
    font-size: 18px;
    color: rgb(89, 89, 89);
    cursor: pointer;
    margin-left: 15px;
  }

  .registerButtonLanding {
    font-size: 0.9vw;
    cursor: pointer;
    height: 3em;
    background-color: lightcoral;
    border: none;
    color: white;
    border-radius: 0.6vw;
    padding: 0.8em;
    margin-right: 1vw;
  }

  .loginButtonLanding {
    font-size: 0.9vw;
    cursor: pointer;
    height: 3em;
    background-color: darkseagreen;
    border: none;
    color: white;
    border-radius: 0.6vw;
    padding: 0.8em;
    margin-right: 1vw;
  }

  .registerButtonLanding:hover {
    background-color: rgb(180, 83, 83);
  }

  .loginButtonLanding:hover {
    background-color: rgb(93, 151, 93);
  }

  .topCenterLanding {
    display: flex;
    max-height: 4.5vw;
  }
</style>

<body>

</body>
<form method='POST'>

  <div class="topLanding">
    <div class="topLeftLanding">
      <img src="..\img\logoSV.png" alt= />
      <i class="topIconLanding">SUNNYVALE</i>
    </div>
    <div class="topCenterLanding">
      <ul class="topListLanding">
        <li class="topListItemLanding" onclick="location.href='../index.php'">HOME</li>
        <li class="topListItemLanding">AMENITIES</li>

        <button class="registerButtonLanding" name="registerButtonGuest" id="registerButtonGuest">
          Activate your Account
        </button>
        <button class="loginButtonLanding" name="loginButtonGuest" id="loginButtonGuest">
          Login
        </button>
      </ul>
    </div>
  </div>
</form>

</html>