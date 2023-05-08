<?php
include "../process.php";
if (isset($_SESSION['user_id'])) {
  header("Location: ../modules/blogHome.php");
  exit;
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
<style>
  * {
    margin: 0;
  }

  .messageFail {
    display: flex;
    padding: 1vw;
    justify-content: space-between;
    font-family: 'Poppins', sans-serif;
    font-size: 1.5vw;
    background-color: lightcoral;
    color: white;
  }

  .loginPage {
    height: calc(100vh - 50px);
    display: flex;
    margin-top: -6rem;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-image: url("../img/landingBG2.jpg");
    font-family: "Poppins", sans-serif;
    color: white;
  }

  .loginTitle {
    font-size: 3vmax;
  }

  .loginForm {
    /* font-size: 1.5vw; */
    padding-top: 2vw;
    padding-bottom: 3.5vw;
    padding-left: 5vw;
    padding-right: 5vw;
    border-radius: 1rem;
    background-color: rgba(255, 255, 255, 0.15);
    margin-top: px;
    display: flex;
    flex-direction: column;
    backdrop-filter: blur(5px);
  }

  .loginForm>label {
    margin: 0 0;
  }

  .loginForm label {
    font-size: 1.5vmax;
  }

  .loginInput {
    padding: 0.8rem;
    background-color: white;
    border: none;
    border-radius: 0.5rem;
    font-size: 1.5vmax;
  }

  .loginButton {
    margin-top: 1vw;
    cursor: pointer;
    background-color: lightcoral;
    border: none;
    color: white;
    border-radius: 0.5rem;
    padding: 0.6vw;
    font-size: 1.5vmax;
  }

  .loginBtn:disabled {
    cursor: not-allowed;
    background-color: rgb(252, 173, 173);
  }

  input {
    border-radius: 0.5vw;
    height: 1vw;
    margin-bottom: 1vw;
  }

  .guestButtonLogin {
    margin-top: 1vw;
    cursor: pointer;
    background-color: darkseagreen;
    border: none;
    color: white;
    border-radius: 0.5vw;
    padding: 0.6vw;
    font-size: 1vw;
  }

  .verifyLink {
    justify-content: center;
    align-items: center;
    text-align: center;
    font-size: 1.5vmax;
    height: auto;
    text-decoration: none;
    color: #fd9616;
  }

  .verifyLinkLbl {
    display: flex;
    gap: 0.2vw;
    align-items: baseline;
    justify-content: center;
  }

  .verifyLinkLbl p {
    font-size: 1.5vmax;
    margin-top: 1vw;
    text-decoration: none;
    color: white;
  }
</style>

<body>
  <?php require "../marginals/topbarLogin.php"; ?>

  <div class="loginPage">
    <span class="loginTitle">Login</span>
    <form class="loginForm" method="post">
      <label>Email</label>
      <input type="text" name="email_address" id="email_address" class="loginInput" placeholder="Enter your email..." value="" required />
      <label>Password</label>
      <input type="password" name="password" id="password" class="loginInput" placeholder="Enter your password..." value="" required />
      <button class="loginButton" id="login" name="login">
        Login
      </button>
      <!-- <button class="guestButtonLogin" id="guestButtonLogin" name="guestButtonLogin" formnovalidate>
        Continue as Guest
      </button> -->
      <div class="verifyLinkLbl">
        <p>Activate your account </p>
        <a class="verifyLink" href="../modules/register.php"> here</a>
      </div>

    </form>
  </div>
  <?php
  require '../marginals/footer2.php';
  ?>
</body>

</html>