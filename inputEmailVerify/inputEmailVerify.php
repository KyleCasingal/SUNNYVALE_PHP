<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="inputEmailVerify.css" media="screen">
    <link rel="stylesheet" href="../topbarVerify/topbarVerify.css" media="screen">
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
    <title>SUNNYVALE</title>
</head>
<style>
  *{
    margin: 0;
  }

</style>
<body>
  <?php require "../topbarVerify/topbarVerify.php";?>
<div class="verifyPage">
          <form class="verifyForm" method="post">
            <label>Email verification</label>
            <input
              type="text"
              name="email_verify"
              id="email_verify"
              class="verifyInput"
              placeholder="Enter your email..."
              value=""
            />
            <button class="verifyButton" id="emailVerify" name="emailVerify">
              Resend OTP
            </button>           
          </form>
        </div>
        <?php
        require '../footer/footer2.php';
    ?>
</body>
</html>