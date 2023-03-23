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
    margin-top: -6vw;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-image: url("../img/landingBG.png");
    font-family: "Poppins", sans-serif;
    color: white;
  }

  .loginTitle {
    font-size: 3.5vw;
  }

  .loginForm {
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

  .loginForm>label {
    margin: 0 0;
  }

  .loginForm label {
    font-size: 1.5vw;
  }

  .loginInput {
    padding: 10px;
    background-color: white;
    border: none;
    font-size: 1vw;
  }

  .loginButton {
    margin-top: 1vw;
    cursor: pointer;
    background-color: lightcoral;
    border: none;
    color: white;
    border-radius: 0.5vw;
    padding: 0.6vw;
    font-size: 1vw;
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
    font-size: 1vw;
    height: auto;
    text-decoration: none;
    color: #F6E70C;
  }

  .verifyLinkLbl {
    display: flex;
    gap: 0.2vw;
    align-items: baseline;
    justify-content: center;
  }

  .verifyLinkLbl p {
    font-size: 1vw;
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