<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" media="screen">
    <link rel="stylesheet" href="../topbarLogin/topbarLogin.css" media="screen">
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
  <?php require "../topbarLogin/topbarLogin.php";?>

<div class="loginPage">
          <span class="loginTitle">Login</span>
          <form class="loginForm" method="post">
            <label>Username</label>
            <input
              type="text"
              name="username"
              id="username"
              class="loginInput"
              placeholder="Enter your username..."
              value=""
            />
            <label>Password</label>
            <input
              type="password"
              name="password"
              id="password"
              class="loginInput"
              placeholder="Enter your password..."
              value= ""
            />
            <button class="loginButton" id="login" name="login">
              Login
            </button>
            <button class="guestButtonLogin" id="guestButtonLogin" name="guestButtonLogin" >
              Continue as Guest
            </button>               
          </form>
            
        </div>
        <?php
        require '../footer/footer2.php';
    ?>
</body>
</html>
<?php
if (isset($_SESSION['username'])) {
  header("Location: ../blogHome/blogHome.php");
}
?>