<?php
include "../process.php";
if (!isset($_SESSION['username'])) {
    header("Location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="topbarRegister.css" media="screen">
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
    <title>SUNNYVALE</title>
</head>
<body>
<?php if (isset($_SESSION['register'])): ?>
            <div class="alert alert-warning">
                <strong> All Fields Required!</strong>
                    <?php
                        echo $_SESSION['register'];
                        unset($_SESSION['register']);
                    ?>
            </div>
<?php endif ?>
<?php if (isset($_SESSION['password'])): ?>
            <div class="alert alert-warning">
                <strong> Passwords do not match!</strong>
                    <?php
                        echo $_SESSION['password'];
                        unset($_SESSION['password']);
                    ?>
            </div>
<?php endif ?>
<form method="post">
<div class="topRegister">
        <div class="topLeftRegister">
          <img src="..\img\logoSV.png" alt="" />
            <i class="topIconRegister">SUNNYVALE</i>
        </div>
        <div class="topRightRegister">
          <p>Already have an Account?</p> 
          <button class="loginButtonReg" name="loginButtonReg" id="loginButtonReg">
              Login
            </button>
        </div>
    </div>
</form>
</body>
</html>