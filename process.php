<?php
session_start();
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
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
    $full_name = $first_name . " " . $last_name;
    $password = $_POST['password'];
    $email_address = $_POST['email_address'];
    $confirm_password = $_POST['confirm_password'];
    $sql = "SELECT * FROM homeowner_profile WHERE first_name = '$first_name' AND last_name = '$last_name' AND email_address = '$email_address' ";
    $result = mysqli_query($con, $sql);

    if ($password !== $confirm_password) {
        echo 'Passwords do not match!';
    } else if (mysqli_num_rows($result) == 1) {
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
            $mail->addAddress($email_address, $full_name);
            $mail->isHTML(true);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $mail->Subject = 'Email verification';
            $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
            $mail->send();
            $sql = "INSERT INTO user (full_name,password,user_type,email_address,account_status,verification_code,email_verified_at) VALUES('$full_name', '$password','Homeowner','$email_address','Pending', '$verification_code', NULL)";
            $result = mysqli_query($con, $sql);
            header("Location: ../modules/verify.php? email_address=" . $email_address);
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "The information that you have provided is not found in the homeowners' list. Please try again.";
    }
}

// VERIFYING EMAIL USING OTP
if (isset($_POST["verify"])) {
    $email_address = $_POST["email_address"];
    $verification_code = $_POST["verification_code"];

    // mark email as verified
    $sql = "UPDATE user SET email_verified_at = NOW() WHERE email_address = '" . $email_address . "' AND verification_code = '" . $verification_code . "'";
    $result = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) == 1) {
        echo "<p>Your email is now verified, wait for the admin to activate your account.</p>";
        header("Location:../index.php");
    } else {
        echo "Verification code failed. Please try again.";
    }
}

// RESEND OTP
if (isset($_POST["emailVerify"])) {
    $email_address = $_POST["email_verify"];
    $sql = "SELECT * FROM user WHERE email_address = '$email_address' ";
    $result = mysqli_query($con, $sql);
    $row = $result->fetch_assoc();
    if (mysqli_num_rows($result) == 0) {
        echo "Your email is not registered with an existing account.";
    } else {
        $full_name = $row['full_name'];
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
            $mail->addAddress($email_address, $full_name);
            $mail->isHTML(true);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $mail->Subject = 'Email verification';
            $mail->Body = '<p>Your new verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
            $mail->send();
            $sql = "UPDATE user SET verification_code =  '$verification_code' WHERE full_name = '" . $full_name . "'";
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
    $sql = "SELECT * FROM user WHERE email_address = '$email_address' AND password = '$password' AND account_status = 'Activated' ";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
        $result = $con->query($sql = "SELECT * FROM user WHERE email_address = '$email_address'");
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id'];
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
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $content = mysqli_real_escape_string($con,  $_POST['content']);
    $fileName = '' . $_FILES['image']['name'];
    $targetFilePath = $targetDir . $fileName;
    $result = $con->query("SELECT * FROM user WHERE user_id = " . $user_id = $_SESSION['user_id'] . "") or die($mysqli->error);
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
    $full_name = $row['full_name'];
    if (copy($_FILES['image']['tmp_name'], $targetFilePath)) {
        $sql = "INSERT INTO post(user_id, full_name, title, content, published_at, content_image) VALUES ('$user_id','$full_name', '$title', '$content', now(), '$fileName')";
        mysqli_query($con, $sql);
        header("Location: ../modules/blogHome.php");
    }
}

// REGISTRATION OF HOMEOWNERS
if (isset($_POST['homeowner_submit'])) {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $suffix = $_POST['suffix'];
    $street = $_POST['street'];
    $subdivision = $_POST['subdivision'];
    $barangay = $_POST['barangay'];
    $residence_address = $street . " " . $subdivision . " " . $barangay;
    $bussiness_address = $_POST['business_address'];
    $mobile_number = $_POST['mobile_number'];
    $occupation = $_POST['occupation'];
    $employer = $_POST['employer'];
    $birthdate = strtotime($_POST['birthdate']);
    $birthdate = date('Y-m-d', $birthdate);
    $sex = $_POST['sex'];
    $email_address = $_POST['email_address'];

    $sql = "INSERT INTO homeowner_profile(last_name, first_name, middle_name, suffix, sex, residence_address, business_address, occupation, email_address, birthdate, mobile_number, employer, display_picture) VALUES ('$last_name','$first_name','$middle_name','$suffix','$sex','$residence_address','$bussiness_address','$occupation','$email_address','$birthdate','$mobile_number','$employer','default.png')";
    $result = mysqli_query($con, $sql);
}

//HOMEOWNER REGISTRATION CLEAR
if (isset($_POST['homeownerReset'])) {
    echo 'test';
    header("Location: homeownerRegistration.php");
}
