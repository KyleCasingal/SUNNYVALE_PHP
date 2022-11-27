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
        $_SESSION['subdivision_name'] = $row['subdivision_name'];
        header("Location: ../modules/blogHome.php");
    } else {
        echo "Wrong email or password!";
    }
    $con->close();
}

// UPLOADING A POST
if (isset($_POST['submitPost'])) {
    $targetDir = '../media/postsPhotos/';
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $content = mysqli_real_escape_string($con,  $_POST['content']);
    $fileName = '' . $_FILES['image']['name'];
    $targetFilePath = $targetDir . $fileName;
    $result = $con->query("SELECT * FROM user WHERE user_id = " . $user_id = $_SESSION['user_id'] . "") or die($mysqli->error);
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
    $full_name = $row['full_name'];
    copy($_FILES['image']['tmp_name'], $targetFilePath);

    $sql = "INSERT INTO post(user_id, full_name, title, content, published_at, content_image) VALUES ('$user_id','$full_name', '$title', '$content', now(), '$fileName')";
    mysqli_query($con, $sql);
    header("Location: ../modules/blogHome.php");
    // $sql = "INSERT INTO post(user_id, full_name, title, content, published_at, content_image) VALUES ('$user_id','$full_name', '$title', '$content', now(), NULL)";
    // mysqli_query($con, $sql);
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
    header("Location: homeownerRegistration.php");
}

//FACILITY RENTING
if (isset($_POST['submitReservation'])) {
    function to_24_hour($hours, $minutes, $meridiem)
    {
        $hours = sprintf('%02d', (int) $hours);
        $minutes = sprintf('%02d', (int) $minutes);
        $meridiem = (strtolower($meridiem) == 'am') ? 'am' : 'pm';
        return date('H:i', strtotime("{$hours}:{$minutes} {$meridiem}"));
    }
    $targetDir = '../media/paymentProof/';
    $fileName = '' . $_FILES['image']['name'];
    $targetFilePath = $targetDir . $fileName;
    $amenity = $_POST['amenity'];
    $name = $_POST['full_name'];
    $cost = $_POST['cost'];
    $timeFrom = to_24_hour($_POST['hrFrom'], $_POST['minsFrom'], $_POST['ampmFrom']);
    $timeTo = to_24_hour($_POST['hrTo'], $_POST['minsTo'], $_POST['ampmTo']);
    $date = $_POST['date'];
    $dateTimeFrom = $date . " " . $timeFrom;
    $dateTimeTo = $date . " " . $timeTo;
    if (copy($_FILES['image']['tmp_name'], $targetFilePath)) {
        $sql = "INSERT INTO facility_renting(amenity_name, renter_name, date_from, date_to, cost, payment_proof, marked_by, approved) VALUES ('$amenity','$name','$dateTimeFrom','$dateTimeTo','$cost','$fileName',NULL,'NOT YET')";
        mysqli_query($con, $sql);
    }
}

//SETTINGS INSERTION

// AMENITY ADD, EDIT
if (isset($_POST['amenityAdd'])) {
    $newAmenity = $_POST['newAmenity'];
    $rate = $_POST['rate'];
    $availability = $_POST['availability'];
    $subdivision_name = $_POST['subdivision_name'];


    $sql = "INSERT INTO amenities(amenity_name, subdivision_name, price, availability) VALUES ('$newAmenity', '$subdivision_name', '$rate', '$availability')";
    mysqli_query($con, $sql);
    
}

//SELECTING A ROW TO EDIT AMENITY
if (isset($_GET['amenity_id'])) {
    $amenity_id = $_GET['amenity_id'];
    $result = $con->query("SELECT * FROM amenities WHERE amenity_id = '$amenity_id'");
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $amenity_name = $row['amenity_name'];
        $subdivision_name = $row['subdivision_name'];
        $price = $row['price'];
        $availability = $row['availability'];
    }
}

// UPDATING A ROW AMENITY
if (isset($_POST['amenityUpdate'])) {
    $amenity_id = $_POST['amenity_id'];
    $amenity_name = $_POST['newAmenity'];
    $subdivision_name = $_POST['subdivision_name'];
    $rate = $_POST['rate'];
    $subdivision_name = $_POST['subdivision_name'];
    $availability = $_POST['availability'];

    $con->query("UPDATE amenities SET amenity_name = '$amenity_name', subdivision_name = '$subdivision_name', price = '$rate', availability = '$availability' WHERE amenity_id = '$amenity_id'");
    header ("Location: settings.php#addAmenity");
}



// SUBDIVISION ADD, EDIT
if (isset($_POST['subdivisionAdd'])) {
    $subdivision = $_POST['subdivision'];
    $barangay = $_POST['barangay'];

    $sql = "INSERT INTO subdivision(subdivision_name, barangay) VALUES ('$subdivision', '$barangay')";
    mysqli_query($con, $sql);
}

// SELECTING A ROW TO EDIT AMENITY
if (isset($_GET['subdivision_id'])) {
    $subdivision_id = $_GET['subdivision_id'];
    $result = $con->query("SELECT * FROM subdivision WHERE subdivision_id = '$subdivision_id'");
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $subdivision_name = $row['subdivision_name'];
        $barangay = $row['barangay'];
    }
}
// UPDATING A ROW SUBDIVISION
if (isset($_POST['subdivisionUpdate'])){
    $subdivision_id = $_POST['subdivision_id'];
    $subdivision_name = $_POST['subdivision'];
    $barangay = $_POST['barangay'];
    $con->query("UPDATE subdivision SET subdivision_name = '$subdivision_name', barangay = '$barangay' WHERE subdivision_id = '$subdivision_id'");
    header ("Location: settings.php#settingsAddSubdivision");
}

// MONTHLY DUES ADD
if (isset($_POST['monthlyDuesAdd'])) {
    $subdivision = $_POST['subdivision'];
    $rate = $_POST['rate'];

    $sql = "INSERT INTO monthly_dues(subdivision_name, amount, updated_at) VALUES ('$subdivision','$rate',NOW())";
    mysqli_query($con, $sql);
}

// SYSTEM ACCOUNT ADD
if (isset($_POST['sysAccAdd'])) {
    $subdivision = $_POST['subdivision'];
    $systemAccount = $_POST['account_name'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    $sql = "INSERT INTO user(full_name, subdivision_name, user_type, password, email_address, account_status, verification_code, email_verified_at) VALUES ('$systemAccount', '$subdivision','$userType', '$password', NULL, 'Activated', NULL, NULL)";
    mysqli_query($con, $sql);
}

// SUBDIVISION OFFCER ADD
if (isset($_POST['officerAdd'])) {
    $name = $_POST['officer'];
    $subdivision = $_POST['subdivision'];
    $position = $_POST['position'];
    $sql = "INSERT INTO officers(subdivision_name, officer_name, position_name) VALUES ('$subdivision', '$name', '$position')";
    mysqli_query($con, $sql);
}
