<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="register.css" media="screen">
    <link rel="stylesheet" href="../topbarRegister/topbarRegister.css" media="screen">
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
    <title>SUNNYVALE</title>
</head>

<body>

<?php require "../topbarRegister/topbarRegister.php";?>
<div class="register">
          <span class="registerTitle">Register your Account</span>
          <form class="registerForm" method="post">
            <label>First Name</label>
            <input
              type="text"
              name="first_name"
              id="first_name"
              class="registerInput"
              placeholder="Enter your first name..."
              value="" 
            />
             <label>Last Name</label>
            <input
              type="text"
              name="last_name"
              id="last_name"
              class="registerInput"
              placeholder="Enter your last name..."
              value=""
            />
             <label>Email</label>
            <input
              type="text"
              name="email_address"
              id="email_address"
              class="registerInput"
              placeholder="Enter your email..."
              value=""
            />
            <label>Password</label>
            <input
              type="password"
              name="password"
              id="password"
              class="registerInput"
              placeholder="Enter your password..."
              value=""
            />
             <label>Confirm password</label>
            <input
              type="password"
              name="confirm_password"
              id="confirm_password"
              class="registerInput"
              placeholder="Enter your password..."
              value=""
            />
            <button class="registerButton" name="register" id="register" >
              Register
            </button>
            <button class="guestButtonRegister" id="" name="guestButtonRegister">
              Continue as Guest
            </button>               
          </form>
        </div>
        <?php
        require '../footer/footer2.php';
    ?>
</body>
</html>
