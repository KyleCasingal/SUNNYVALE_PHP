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
    $row = $result->fetch_assoc();
    $sql1 = "SELECT * FROM user WHERE email_address = '$email_address'";
    $result1 = mysqli_query($con, $sql1);
    $homeowner_id = $row['homeowner_id'] ?? '';

    if (mysqli_num_rows($result1) == 1) {
        echo "<div class='messageFail'>
        <label>
          Your email is already associated with an existing user!
        </label>
      </div>";
    } else if ($password !== $confirm_password) {
        echo "<div class='messageFail'>
        <label>
        Passwords do not match!
        </label>
      </div>";
    } else if (mysqli_num_rows($result) == 1) {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sunnyvalesubdivision@gmail.com';
            $mail->Password = 'xtxphqmvhpllutrz';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom('sunnyvalesubdivision@gmail.com');
            $mail->addAddress($email_address, $full_name);
            $mail->isHTML(true);
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $mail->Subject = 'Email verification';
            $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
            $mail->send();
            $sql = "INSERT INTO user (user_homeowner_id, full_name,password,user_type,email_address,account_status,verification_code,email_verified_at) VALUES('$homeowner_id', '$full_name', '$password','Homeowner','$email_address','Pending', '$verification_code', NULL)";
            $result = mysqli_query($con, $sql);
            $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $first_name . ' ' . $last_name . "' ,  'created an account', NOW())";
            mysqli_query($con, $sql1);
            header("Location: ../modules/verify.php? email_address=" . $email_address);
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<div class='messageFail'>
        <label>
        The information that you have provided is not found in the homeowners' list. Please try again.
        </label>
      </div>";
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
        $result = mysqli_query($con, $sql);
        $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('$email_address' ,  'verified their email', NOW())";
        mysqli_query($con, $sql1);
        echo "<div class='messageSuccess'>
        <label >
          Account is now verified. Please wait for the Admin to activate your account.
        </label>
        <form method='post'>
            <button class='okBtn' name='okBtn' type='submit' >OK</button>
        </form>
      </div>";
    } else {
        echo "<div class='messageFail'>
        <label >
          Wrong OTP. Please try again.
        </label>
      </div>";
    }
}

//REDIRECT TO INDEX AFTER OTP VERIFY
if (isset($_POST["okBtn"])) {
    header("Location: ../index.php");
}

// RESEND OTP
if (isset($_POST["emailVerify"])) {
    $email_address = $_POST["email_verify"];
    $sql = "SELECT * FROM user WHERE email_address = '$email_address' ";
    $result = mysqli_query($con, $sql);
    $sql1 = "SELECT * FROM user WHERE email_address = '$email_address' AND email_verified_at IS NOT NULL";
    $result1 = mysqli_query($con, $sql);
    $row = $result->fetch_assoc();
    if (mysqli_num_rows($result) == 0) {
        echo "<div class='messageFail'>
        <label>
        Your email is not registered with an existing account.
        </label>
      </div>";
    } else if (mysqli_num_rows($result) == 1) {
        echo "<div class='messageFail'>
        <label>
        Your email is already verified.
        </label>
      </div>";
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
    $sql1 = "SELECT * FROM user WHERE email_address = '$email_address' AND password = '$password' AND (account_status = 'Pending' or account_status = 'Deactivated')";
    $result1 = mysqli_query($con, $sql1);

    if (mysqli_num_rows($result) == 1) {
        $con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
        $result = $con->query($sql = "SELECT * FROM user WHERE email_address = '$email_address'");
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id'];
        $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','logged in', NOW())";
        mysqli_query($con, $sql1);
        header("Location: ../modules/blogHome.php");
    } elseif (mysqli_num_rows($result1) == 1) {
        echo "<div class='messageFail'>
        <label >
          Your account is not activated.
        </label>
      </div>";
    } else {
        echo "<div class='messageFail'>
        <label >
          Wrong username or password!
        </label>
      </div>";
    }
    $con->close();
}

// UPLOADING A POST
if (isset($_POST['submitPost'])) {
    $targetDir = '../media/postsPhotos/';
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $content = mysqli_real_escape_string($con,  $_POST['content']);
    $fileName = '' . $_FILES['image']['name'] ?? '';
    $targetFilePath = $targetDir . $fileName;
    $result = $con->query("SELECT * FROM user WHERE user_id = " . $user_id = $_SESSION['user_id'] . "") or die($mysqli->error);
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
    $full_name = $row['full_name'];

    if ($_FILES['image']['size'] != 0) {
        copy($_FILES['image']['tmp_name'], $targetFilePath);
    }

    $sql = "INSERT INTO post(user_id, full_name, title, content, published_at, content_image) VALUES ('$user_id','$full_name', '$title', '$content', now(), '$fileName')";
    mysqli_query($con, $sql);
    echo "<div class='messageSuccess'>
        <label >
          Your post has been uploaded!
        </label>
      </div>";
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "' ,  'uploaded a new post', NOW())";
    mysqli_query($con, $sql1);
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
    $bussiness_address = $_POST['business_address'];
    $mobile_number = $_POST['mobile_number'];
    $occupation = $_POST['occupation'];
    $employer = $_POST['employer'];
    $birthdate = strtotime($_POST['birthdate']);
    $birthdate = date('Y-m-d', $birthdate);
    $sex = $_POST['sex'];
    $email_address = $_POST['email_address'];

    $sql = "INSERT INTO homeowner_profile(last_name, first_name, middle_name, suffix, sex, street, subdivision, barangay, business_address, occupation, email_address, birthdate, mobile_number, employer, display_picture) VALUES ('$last_name','$first_name','$middle_name','$suffix','$sex', '$street', '$subdivision', '$barangay', '$bussiness_address','$occupation','$email_address','$birthdate','$mobile_number','$employer','default.png')";
    $result = mysqli_query($con, $sql);

    $resultSession = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $resultSession->fetch_assoc();
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "', '" .  'added homeowner' . ' ' . "$first_name" . ' ' . "$last_name" . "' , NOW())";
    mysqli_query($con, $sql1);
    header("Location: homeownerRegistration.php");
}

// SELECTING A REGISTERED HOMEOWNER TO EDIT
$update = false;
if (isset($_GET['homeowner_id'])) {
    $update = true;
    $homeowner_id = $_GET['homeowner_id'];
    $result = $con->query("SELECT * FROM homeowner_profile WHERE homeowner_id = '$homeowner_id'");
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $last_name = $row['last_name'];
        $suffix = $row['suffix'];
        $street = $row['street'];
        $subdivision = $row['subdivision'];
        $barangay = $row['barangay'];
        $business_address = $row['business_address'];
        $occupation = $row['occupation'];
        $employer = $row['employer'];
        $birthdate = $row['birthdate'];
        $sex = $row['sex'];
        $email_address = $row['email_address'];
        $mobile_number = $row['mobile_number'];
    }
}

//UPDATING A REGISTERED HOMEOWNER
if (isset($_POST['homeowner_update'])) {
    $homeowner_id = $_POST['homeowner_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $suffix = $_POST['suffix'];
    $street = $_POST['street'];
    $subdivision = $_POST['subdivision'];
    $barangay = $_POST['barangay'];
    $bussiness_address = $_POST['business_address'];
    $mobile_number = $_POST['mobile_number'];
    $occupation = $_POST['occupation'];
    $employer = $_POST['employer'];
    $birthdate = strtotime($_POST['birthdate']);
    $birthdate = date('Y-m-d', $birthdate);
    $sex = $_POST['sex'];
    $email_address = $_POST['email_address'];
    $full_name = $first_name . ' ' . $last_name;

    $sql = "UPDATE homeowner_profile SET first_name =  '$first_name', middle_name = '$middle_name', last_name = '$last_name', suffix = '$suffix', sex = '$sex', street = '$street', subdivision = '$subdivision', barangay = '$barangay', business_address = '$barangay', occupation = '$occupation', email_address = '$email_address', birthdate = '$birthdate', mobile_number = '$mobile_number', employer = '$employer' WHERE homeowner_id = '$homeowner_id' ";
    $result = mysqli_query($con, $sql);
    $sql2 = "UPDATE user SET full_name = '$full_name', email_address = '$email_address' WHERE user_homeowner_id = '$homeowner_id'";
    $result = mysqli_query($con, $sql2);
    $resultSession = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $resultSession->fetch_assoc();
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "', '" .  'updated homeowner' . ' ' . "$first_name" . ' ' . "$last_name" . "' , NOW())";
    mysqli_query($con, $sql1);
    header("Location: homeownerRegistration.php");
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

    if ($cost == '') {
        echo "<div class='messageFail'>
    <label >
      Please compute your reservation first!
    </label>
  </div>";
    } else if ($_FILES['image']['size'] == 0) {
        echo "<div class='messageFail'>
    <label >
      Please upload your proof of payment!
    </label>
  </div>";
    } else if (copy($_FILES['image']['tmp_name'], $targetFilePath)) {
        $sql = "INSERT INTO facility_renting(amenity_name, renter_name, date_from, date_to, cost, payment_proof) VALUES ('$amenity','$name','$dateTimeFrom','$dateTimeTo','$cost','$fileName')";
        mysqli_query($con, $sql);
        $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('$name' ,  'reserved an amenity', NOW())";
        mysqli_query($con, $sql1);
        echo "<div class='messageSuccess'>
    <label >
      Your reservation has been set!
    </label>
  </div>";
    }
}

// AMENITY ERROR 
if (isset($_POST['compute'])) {
    if ($_POST['ampmFrom'] == 'pm' and $_POST['ampmTo'] == 'am') {
        echo "<div class='messageFail'>
    <label >
      Invalid time input!
    </label>
  </div>";
    }
    if ($_POST['ampmFrom'] == 'am' and $_POST['hrFrom'] < 6) {
        echo "<div class='messageFail'>
    <label >
      Invalid time input!
    </label>
  </div>";
    } else if ($_POST['ampmTo'] == 'pm' and $_POST['hrTo'] > 9 and $_POST['minsTo'] > 1) {
        echo "<div class='messageFail'>
        <label >
          Invalid time input!
        </label>
      </div>";
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
    $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $result->fetch_assoc();
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','" . 'added a new amenity' . ' ' . "$subdivision_name" . '-' . "$newAmenity" . "', NOW())";
    mysqli_query($con, $sql1);
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
    $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $result->fetch_assoc();
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','" . 'updated an exisiting amenity' . ' ' . "$subdivision_name" . '-' . "$amenity_name" . "', NOW())";
    mysqli_query($con, $sql1);
    header("Location: settings.php#addAmenity");
}



// SUBDIVISION ADD
if (isset($_POST['subdivisionAdd'])) {
    $subdivision = $_POST['subdivision'];
    $barangay = $_POST['barangay'];

    $sql = "INSERT INTO subdivision(subdivision_name, barangay) VALUES ('$subdivision', '$barangay')";
    $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $result->fetch_assoc();
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','" . 'added a new subdivision' . ' ' . "$subdivision" . ' ' . "$barangay" . "', NOW())";
    mysqli_query($con, $sql1);
    mysqli_query($con, $sql);
    header("Location: settings.php#settingsAddSubdivision");
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
if (isset($_POST['subdivisionUpdate'])) {
    $subdivision_id = $_POST['subdivision_id'];
    $subdivision_name = $_POST['subdivision'];
    $barangay = $_POST['barangay'];
    $con->query("UPDATE subdivision SET subdivision_name = '$subdivision_name', barangay = '$barangay' WHERE subdivision_id = '$subdivision_id'");
    $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $result->fetch_assoc();
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','" . 'updated an existing subdivision' . ' ' . "$subdivision_name" . ' ' . "$barangay" . "', NOW())";
    mysqli_query($con, $sql1);
    header("Location: settings.php#settingsAddSubdivision");
}

// MONTHLY DUES ADD
if (isset($_POST['monthlyDuesAdd'])) {
    $subdivision = $_POST['subdivision'];
    $rate = $_POST['rate'];

    $sql = "INSERT INTO monthly_dues(subdivision_name, amount, updated_at) VALUES ('$subdivision','$rate',NOW())";
    $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $result->fetch_assoc();
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','" . 'added a new monthly due' . ' ' . "$subdivision" . '-' . "$rate" . '.00' . "', NOW())";
    mysqli_query($con, $sql1);
    mysqli_query($con, $sql);
    header("Location: settings.php#settingsMonthlyDues");
}

// SELECTING A ROW TO EDIT MONTHLY DUES
if (isset($_GET['monthly_dues_id'])) {
    $monthly_dues_id = $_GET['monthly_dues_id'];
    $result = $con->query("SELECT * FROM monthly_dues WHERE monthly_dues_id = '$monthly_dues_id'");
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $subdivision_name = $row['subdivision_name'];
        $rate = $row['amount'];
    }
}

// UPDATING A ROW MONTHLY DUES
if (isset($_POST['monthlyDuesUpdate'])) {
    $monthly_dues_id = $_POST['monthly_dues_id'];
    $subdivision_name = $_POST['subdivision'];
    $rate = $_POST['rate'];
    $con->query("UPDATE monthly_dues SET subdivision_name = '$subdivision_name', amount = '$rate', updated_at = NOW() WHERE monthly_dues_id = '$monthly_dues_id'");
    $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $result->fetch_assoc();
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','" . 'updated an existing monthly due' . ' ' . "$subdivision_name" . '-' . "$rate" . '.00' . "', NOW())";
    mysqli_query($con, $sql1);
    header("Location: settings.php#settingsMonthlyDues");
}


// SYSTEM ACCOUNT ADD
if (isset($_POST['sysAccAdd'])) {
    $systemAccount = $_POST['account_name'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];


    $sql1 = "INSERT INTO homeowner_profile(last_name, first_name, middle_name, suffix, sex, street, subdivision, barangay, business_address, occupation, email_address, birthdate, mobile_number, employer, display_picture) VALUES ('', '$systemAccount', NULL, NULL,'' , '', '', '', NULL, NULL, '', NOW(), '', '', 'default.png')";
    mysqli_query($con, $sql1);
    $result = $con->query("SELECT * FROM homeowner_profile WHERE first_name = '$systemAccount'");
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $user_homeowner_id = $row['homeowner_id'];
        $sql = "INSERT INTO user(user_homeowner_id, full_name, user_type, password, email_address, account_status, verification_code, email_verified_at) VALUES ('$user_homeowner_id', '$systemAccount', '$userType', '$password', '$systemAccount', 'Activated', NULL, NULL)";
        $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
        $row = $result->fetch_assoc();
        $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','" . 'added a new system account' . ' ' . "$systemAccount" . '-' . "$userType"  . "', NOW())";
        mysqli_query($con, $sql1);
        mysqli_query($con, $sql);
        header("Location: settings.php#settingsSystemAccounts");
    }
}

// SELECTING A ROW TO EDIT SYSTEM ACCOUNT
if (isset($_GET['user_id'])) {
    $account_id = $_GET['user_id'];
    $result = $con->query("SELECT * FROM user WHERE user_id = '$account_id'");
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $account_name = $row['full_name'];
        $password = $row['password'];
        $account_type = $row['user_type'];
        $account_status = $row['account_status'];
    }
}

// UPDATING A SYSTEM ACCOUNT
if (isset($_POST['sysAccUpdate'])) {
    $account_id = $_POST['user_id'];
    $full_name = $_POST['account_name'];
    $password = $_POST['password'];
    $account_type = $_POST['user_type'];
    $account_status = $_POST['account_status'];
    $con->query("UPDATE user SET password = '$password', user_type = '$account_type', account_status = '$account_status' WHERE user_id = '$account_id'");
    $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $result->fetch_assoc();
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','" . 'updated an existing system account' . ' ' . "$full_name" . '-' . "$account_type"  . "', NOW())";
    mysqli_query($con, $sql1);
    header("Location: settings.php#settingsSystemAccounts");
}

// SUBDIVISION OFFICER ADD
if (isset($_POST['officerAdd'])) {
    $officer_name = $_POST['officer_name'];
    $subdivision_name = $_POST['subdivision_name'];
    $position_name = $_POST['position_name'];
    $sql = "INSERT INTO officers(subdivision_name, officer_name, position_name) VALUES ('$subdivision_name', '$officer_name', '$position_name')";
    $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $result->fetch_assoc();
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','" . 'added a new subdivision officer' . ' ' . "$officer_name" . '-' . "$position_name"  . "', NOW())";
    mysqli_query($con, $sql1);
    mysqli_query($con, $sql);
    header("Location: settings.php#settingsOfficers");
}

// SELECTING A ROW TO EDIT OFFICERS
if (isset($_GET['officer_id'])) {
    $officer_id = $_GET['officer_id'];
    $result = $con->query("SELECT * FROM officers WHERE officer_id = '$officer_id'");
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $officer_name = $row['officer_name'];
        $subdivision_name = $row['subdivision_name'];
        $position_name = $row['position_name'];
    }
}

// UPDATING AN OFFICER
if (isset($_POST['officerUpdate'])) {
    $officer_id = $_POST['officer_id'];
    $officer_name = $_POST['officer_name'];
    $subdivision_name = $_POST['subdivision_name'];
    $position_name = $_POST['position_name'];
    $con->query("UPDATE officers SET subdivision_name = '$subdivision_name', officer_name = '$officer_name', position_name = '$position_name' WHERE officer_id = '$officer_id'");
    $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $result->fetch_assoc();
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','" . 'updated an existing subdivision officer' . ' ' . "$officer_name" . '-' . "$position_name"  . "', NOW())";
    mysqli_query($con, $sql1);
    header("Location: settings.php#settingsOfficers");
}

// SUBMITTING A CONCERN
if (isset($_POST['concernSubmit'])) {
    $concern_subject = $_POST['concern_subject'];
    $concern_description = $_POST['concern_description'];
    $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $row = $result->fetch_assoc();
    $sql = "INSERT INTO concern(full_name, concern_subject, concern_description, status) VALUES ('" . $row['full_name'] . "','$concern_subject', '$concern_description', 'Pending')";
    mysqli_query($con, $sql);
    $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "' ,  'submitted a concern', NOW())";
    mysqli_query($con, $sql1);
    echo "<div class='messageSuccess'>
    <label>
      Your concern has been sent. The officers will take a look into it.
    </label>
    <form  class='formBTN' method='post'>
    <button class='okBtn' name='concernOk' type='submit' >OK</button>
    </form>
  </div>";
}

if (isset($_POST['concernOk'])) {
    header("Location: blogHome.php");
}

if (isset($_GET['concern_id'])) {;
}
