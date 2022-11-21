<?php
session_start();
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));

//PREVENT USER FROM ACCESSING LOGIN AND INDEX WHEN LOGGED IN

//Redirect to register page when in index page
if (isset($_POST['registerButtonLanding'])) {
    header("Location: ./modules/register.php");
}
// Redirect to login page when in index page
if (isset($_POST['loginButtonLanding'])) {
    header("Location: ./modules/login.php");
}
//Redirect to register page when in login page
if (isset($_POST['registerButtonTop'])) {
    header("Location: ../modules/register.php");
}
//Redirect to index page when in login page
if (isset($_POST['guestButtonLogin'])) {
    header("Location: ../index.php");
}
//Redirect to login page when in register page
if (isset($_POST['loginButtonReg'])) {
    header("Location: ../modules/login.php");
}
//Redirect to index page when in register page
if (isset($_POST['guestButtonRegister'])) {
    header("Location: ../index.php");
}
//Redirect to register page when in guest amenities page
if (isset($_POST['registerButtonGuest'])) {
    header("Location: ../modules/register.php");
}
//Redirect to login page when in guest amenities page
if (isset($_POST['loginButtonGuest'])) {
    header("Location: ../modules/login.php");
}

// REGISTER A NEW USER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $first_name . " " . $last_name;
    $password = $_POST['password'];
    $email_address = $_POST['email_address'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $_SESSION['password'] = "";
    } else if (strlen($first_name and $last_name and $email_address and $password and $confirm_password) !== 0) {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sunnyvalesubdivision@gmail.com';
            $mail->Password = 'xmdyrdzqmopfjpbo';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom('sunnyvalesubdivision@gmail.com');
            $mail->addAddress($email_address, $username);
            $mail->isHTML(true);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $mail->Subject = 'Email verification';
            $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
            $mail->send();
            $sql = "INSERT INTO user (username,password,user_type,email_address,account_status,verification_code,email_verified_at,display_picture) VALUES('$username', '$password','Homeowner','$email_address','Pending', '$verification_code', NULL,'default.png')";
            $result = mysqli_query($con, $sql);
            header("Location: ../modules/verify.php?email_address=" . $email_address);
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['register'] = "";
    }
}

// VERIFYING EMAIL USING OTP
if (isset($_POST["verify"])) {
    $email_address = $_POST["email_address"];
    $verification_code = $_POST["verification_code"];

    // mark email as verified
    $sql = "UPDATE user SET email_verified_at = NOW() WHERE email_address = '" . $email_address . "' AND verification_code = '" . $verification_code . "'";
    $result = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) == 0) {
        echo "Verification code failed. Please try again.";
    } else {
        header("Location:../index.php");
        echo "<p>Your email is now verified, wait for the admin to activate your account.</p>";
    }
}

// RESEND OTP
if (isset($_POST["emailVerify"])) {
    $email_address = $_POST["email_verify"];
    $sql = "SELECT * FROM user WHERE email_address = '$email_address' ";
    $result = mysqli_query($con, $sql);
    $row = $result->fetch_assoc();
    $username = $row['username'];
    if (mysqli_num_rows($result) == 0) {
        echo "Your email is not registered with an existing account.";
    } else {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sunnyvalesubdivision@gmail.com';
            $mail->Password = 'xmdyrdzqmopfjpbo';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom('sunnyvalesubdivision@gmail.com');
            $mail->addAddress($email_address, $username);
            $mail->isHTML(true);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $mail->Subject = 'Email verification';
            $mail->Body = '<p>Your new verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
            $mail->send();
            $sql = "UPDATE user SET verification_code =  '$verification_code' WHERE username = '" . $username . "'";
            $result = mysqli_query($con, $sql);
            header("Location: ../modules/verify.php?email_address=" . $email_address);
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
// LOGGING IN
if (isset($_POST['login'])) {
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE email_address = '$email_address' AND password = '$password' AND account_status = 'Active' ";
    $result = mysqli_query($con, $sql);

    if (strlen($email_address and $password) == 0) {
        echo "All fields required!";
    } else if (mysqli_num_rows($result) == 1) {
        $sql = "SELECT username FROM user where email_address = '$email_address' ";
        $result = mysqli_query($con, $sql);
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $_SESSION['username'] = $username;
        header("Location: ../modules/blogHome.php");
    } else {
        echo "Wrong email or password!";
    }
    $con->close();
}
// LOGGING OUT
if (isset($_POST['logout'])) {
    session_destroy();
}
// UPLOADING A POST
$targetDir = '../media/postsPhotos/';

if (isset($_POST['submitPost'])) {
    $username = $_SESSION['username'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $fileName = '' . $_FILES['image']['name'];
    $targetFilePath = $targetDir . $fileName;

    if (copy($_FILES['image']['tmp_name'], $targetFilePath)) {
        $sql = "INSERT INTO `post`(`full_name`, `title`, `content`, `published_at`, `content_image`) VALUES ('$username', '$title', '$content', now(), '$fileName')";
        mysqli_query($con, $sql);
        header("Location: ../modules/blogHome.php");
    }
}
