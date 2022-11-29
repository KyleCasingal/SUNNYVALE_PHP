<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="verify.css" media="screen">
  <link rel="stylesheet" href="../topbarVerify/topbarVerify.css" media="screen">
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
  .messageSuccess{
    display: flex;
    padding: 1vw;
    justify-content: space-between;
    font-family: 'Poppins', sans-serif;
    font-size: 1.5vw;
    background-color: darkseagreen;
    color: white;
  }
  .messageFail{
    display: flex;
    padding: 1vw;
    justify-content: space-between;
    font-family: 'Poppins', sans-serif;
    font-size: 1.5vw;
    background-color: lightcoral;
    color: white;
  }
  .okBtn{
    border-radius: 0.5vw;
    width: 5vw;
    border: none;
    font-size: 1vw;
    font-family: 'Poppins', sans-serif;
    background-color: darkgreen;
    color: white;
  }
 
</style>

<body>
 
<div>
  <?php require "../marginals/topbarVerify.php"; ?>
  <div class="verifyPage">
    <form class="verifyForm" method="post">
      <input type="hidden" name="email_address" value="<?php echo $_GET['email_address']; ?>" required>
      <label>Email verification</label>
      <input type="text" name="verification_code" id="verification_code" class="verifyInput" placeholder="Enter your OTP..." value="" required />
      <button type="submit" class="verifyButton" id="verify" name="verify" data-bs-toggle="modal" data-bs-target="#successModal">
        Verify
      </button>
    </form>
  </div>

  <?php
  require '../marginals/footer2.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>