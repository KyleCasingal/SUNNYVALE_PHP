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
    height: calc(100vh);
    display: flex;
    margin-top: -6rem;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-size: auto;
    background-image: url("../img/landingBG2.jpg");
    font-family: "Poppins", sans-serif;
    color: white;
  }

  .registerTitle {
    margin-top: 4.5vw;
    font-size: 2vmax;
  }

  .registerForm {
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

  .registerForm>label {
    margin: 0 0;
  }

  .registerForm label {
    font-size: 1.5vmax;
  }

  .registerInput {
    padding: 0.5rem;
    background-color: white;
    border: none;
    border-radius: 0.5rem;
    font-size: 1.5vmax;
  }

  .registerButton {
    margin-top: 1vw;
    cursor: pointer;
    background-color: lightcoral;
    border: none;
    color: white;
    border-radius: 0.5rem;
    padding: 0.6vw;
    font-size: 1.5vmax;
  }

  .registerButton:disabled {
    cursor: not-allowed;
    background-color: rgb(252, 173, 173);
  }

  input {
    border-radius: 0.5vw;
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

  .messageFail {
    display: flex;
    padding: 1vw;
    justify-content: space-between;
    font-family: 'Poppins', sans-serif;
    font-size: 1.5vw;
    background-color: lightcoral;
    color: white;
  }

  label {
    padding-top: 1vw;
  }
</style>

<body>
  <div class="topbar">
  </div>
  <div class="register">
    <span class="registerTitle">Activate your Account</span>
    <form class="registerForm" method="post">
      <label>Email</label>
      <input type="text" name="email_address" id="email" class="registerInput" placeholder="Enter your email..." value="" required />
      <!-- <label>Last Name</label>
      <input type="text" name="last_name" id="last_name" class="registerInput" placeholder="Enter your last name..." value="" required />
      <label>Email</label>
      <input type="text" name="email_address" id="email_address" class="registerInput" placeholder="Enter your email..." value="" required />
      <label>Password</label>
      <input type="password" name="password" id="password" class="registerInput" placeholder="Enter your password..." value="" required />
      <label>Confirm password</label>
      <input type="password" name="confirm_password" id="confirm_password" class="registerInput" placeholder="Enter your password..." value="" /> -->
      <button class="registerButton" name="register" id="register">
        Activate
      </button>
      <!-- <button class="guestButtonRegister" id="" name="guestButtonRegister" formnovalidate>
        Continue as Guest
      </button> -->
    </form>
  </div>
  <!-- <?php
  require '../marginals/footer2.php';
  ?> -->
</body>

</html>