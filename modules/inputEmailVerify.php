<?php
require "../marginals/topbarVerify.php";
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
<style>
  * {
    margin: 0;
  }

  .verifyPage {
    height: calc(100vh - 50px);
    display: flex;
    margin-top: -6vw;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-image: url("../img/landingBG.png");
    font-family: "Poppins", sans-serif;
    color: white;
  }

  .verifyForm {
    font-size: 1.5vw;
    padding-top: 2vw;
    padding-bottom: 3.5vw;
    padding-left: 5vw;
    padding-right: 5vw;
    border-radius: 0.8vw;
    background-color: rgba(255, 255, 255, 0.15);
    margin-top: px;
    display: flex;
    flex-direction: column;
    backdrop-filter: blur(5px);
  }

  .verifyForm>label {
    margin: 10px 0;
  }

  .verifyForm label {
    font-size: 1.5vw;
  }

  input {
    padding: 10px;
    background-color: white;
    border: none;
    border-radius: 0.5vw;
    font-size: 1vw;
  }

  .verifyButton {
    margin-top: 1vw;
    cursor: pointer;
    background-color: lightcoral;
    border: none;
    color: white;
    border-radius: 0.5vw;
    padding: 0.6vw;
    font-size: 1vw;
  }
</style>

<body>
  <div class="verifyPage">
    <form class="verifyForm" method="post">
      <label>Email verification</label>
      <input type="text" name="email_verify" id="email_verify" class="verifyInput" placeholder="Enter your email..." value="" required/>
      <button class="verifyButton" id="emailVerify" name="emailVerify">
        Resend OTP
      </button>
    </form>
  </div>
  <?php
  require '../marginals/footer2.php';
  ?>
</body>

</html>