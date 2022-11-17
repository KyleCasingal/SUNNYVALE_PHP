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
          <input type="hidden" name="email_address" value="<?php echo $_GET['email_address']; ?>" required>
            <label>Email verification</label>
            <input
              type="text"
              name="verification_code"
              id="verification_code"
              class="verifyInput"
              placeholder="Enter your OTP..."
              value=""
            />
            <button class="verifyButton" id="verify" name="verify">
              Verify
            </button>           
          </form>
        </div>
        <?php
        require '../footer/footer2.php';
    ?>
</body>
</html>