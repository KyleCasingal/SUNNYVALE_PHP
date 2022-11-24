<?php require "../marginals/topbarRegister.php"; ?>
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

  .topbar {
    top: 0;
    position: sticky;
  }

  .register {
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

  .registerTitle {
    margin-top: 4.5vw;
    font-size: 3vw;
  }

  .registerForm {
    font-size: 0.5vw;
    padding-top: 0.5vw;
    padding-bottom: 2vw;
    padding-left: 5vw;
    padding-right: 5vw;
    border-radius: 0.8vw;
    background-color: rgba(255, 255, 255, 0.15);
    margin-top: px;
    display: flex;
    flex-direction: column;
    backdrop-filter: blur(5px);
  }

  .registerForm>label {
    margin: 0;
  }

  .registerForm label {
    margin-top: 0;
    font-size: 1vw;
  }

  .registerInput {
    margin-bottom: 1vw;
    padding: 1vw;
    background-color: white;
    border: none;
    font-size: 1vw;
  }

  .registerButton {
    margin-top: 1vw;
    cursor: pointer;
    background-color: lightcoral;
    border: none;
    color: white;
    border-radius: 0.5vw;
    padding: 0.6vw;
    font-size: 1vw;
  }

  .registerButton:disabled {
    cursor: not-allowed;
    background-color: rgb(252, 173, 173);
  }

  input {
    border-radius: 0.5vw;
    height: 1vw;
  }

  .guestButtonRegister {
    margin-top: 1vw;
    cursor: pointer;
    background-color: darkseagreen;
    border: none;
    color: white;
    border-radius: 0.5vw;
    padding: 0.6vw;
    font-size: 1vw;
  }
</style>

<body>
  <div class="topbar">
  </div>
  <div class="register">
    <span class="registerTitle">Register your Account</span>
    <form class="registerForm" method="post">
      <label>First Name</label>
      <input type="text" name="first_name" id="first_name" class="registerInput" placeholder="Enter your first name..." value="" />
      <label>Last Name</label>
      <input type="text" name="last_name" id="last_name" class="registerInput" placeholder="Enter your last name..." value="" />
      <label>Email</label>
      <input type="text" name="email_address" id="email_address" class="registerInput" placeholder="Enter your email..." value="" />
      <label>Password</label>
      <input type="password" name="password" id="password" class="registerInput" placeholder="Enter your password..." value="" />
      <label>Confirm password</label>
      <input type="password" name="confirm_password" id="confirm_password" class="registerInput" placeholder="Enter your password..." value="" />
      <button class="registerButton" name="register" id="register">
        Register
      </button>
      <button class="guestButtonRegister" id="" name="guestButtonRegister">
        Continue as Guest
      </button>
    </form>
  </div>
  <?php
  require '../marginals/footer2.php';
  ?>
</body>

</html>