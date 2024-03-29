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
//Redirect to archived posts page when in blog home page
if (isset($_POST['archivedPosts'])) {
  header("Location: archivedPosts.php");
}
if (isset($_POST['return'])) {
  header("Location: blogHome.php");
}

// REGISTER A NEW USER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['register'])) {
  $email_address = $_POST['email_address'];
  //   $password = $_POST['password'];
  //   $confirm_password = $_POST['confirm_password'];
  $sql = "SELECT * FROM homeowner_profile WHERE email_address = '$email_address'";
  $result = mysqli_query($con, $sql);
  $row = $result->fetch_assoc();
  $first_name = $row['first_name'] ?? '';
  $last_name = $row['last_name'] ?? '';
  $full_name = $first_name . " " . $last_name;
  $subdivision = $row['subdivision'] ?? '';

  $sql1 = "SELECT * FROM user WHERE email_address = '$email_address'";
  $result1 = mysqli_query($con, $sql1);
  $homeowner_id = $row['homeowner_id'] ?? '';

  $sql2 = "SELECT * FROM tenant WHERE email = '$email_address'";
  $result2 = mysqli_query($con, $sql2);
  $row2 = $result2->fetch_assoc();
  $first_name2 = $row2['first_name'] ?? '';
  $last_name2 = $row2['last_name'] ?? '';
  $fullnameTenant = $first_name2 . " " . $last_name2 ?? '';
  $tenant_id = $row2['tenant_id'] ?? '';
  $subdivision2 = $row2['subdivision'] ?? '';

  if (mysqli_num_rows($result1) == 1) {
    echo
    "<div class='messageFail'>
          <label>
            Your email is already activated!
          </label>
        </div>";
  } else if (mysqli_num_rows($result) == 1) {
    $mail = new PHPMailer(true);
    try {
      $mail->isSMTP();
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'subdivisionsunnyvale@gmail.com';
      $mail->Password = 'rwttevqjkrwcbupp';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;
      $mail->setFrom('subdivisionsunnyvale@gmail.com');
      $mail->addAddress($email_address, $full_name);
      $mail->isHTML(true);
      $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
      $mail->Subject = 'Account Activation';
      $mail->Body = '<p>Your temporary password is: <b style="font-size: 30px;">' . $verification_code . '</b></p><p>Please change it immediately after successful login. </p>';
      $mail->send();
      $sql = "INSERT INTO user (user_homeowner_id, subdivision, full_name, password, user_type, email_address, account_status, verification_code, email_verified_at, display_picture) VALUES('$homeowner_id', '$subdivision', '$full_name', '$verification_code','Homeowner','$email_address','Activated', '$verification_code', NOW(), 'default.png')";
      $result = mysqli_query($con, $sql);
      $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $first_name . ' ' . $last_name . "' ,  'Created an account', NOW())";
      mysqli_query($con, $sql1);
      header("Location: ../modules/login.php");
      exit();
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  } else if (mysqli_num_rows($result2) == 1) {
    $mail = new PHPMailer(true);
    try {
      $mail->isSMTP();
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'subdivisionsunnyvale@gmail.com';
      $mail->Password = 'rwttevqjkrwcbupp';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;
      $mail->setFrom('subdivisionsunnyvale@gmail.com');
      $mail->addAddress($email_address, $full_name);
      $mail->isHTML(true);
      $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
      $mail->Subject = 'Account Activation';
      $mail->Body = '<p>Your temporary password is: <b style="font-size: 30px;">' . $verification_code . '</b></p><p>Please change it immediately after successful login. </p>';
      $mail->send();
      $sql = "INSERT INTO user (user_homeowner_id, user_tenant_id, subdivision, full_name, password,user_type,email_address,account_status,verification_code,email_verified_at) VALUES(NULL, $tenant_id, '$subdivision2', '$fullnameTenant', '$verification_code','Tenant','$email_address','Activated', '$verification_code', NOW())";
      $result = mysqli_query($con, $sql);
      $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('$fullnameTenant' ,  'Created an account', NOW())";
      mysqli_query($con, $sql1);
      header("Location: ../modules/login.php");
      exit();
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  } else {
    echo
    "<div class='messageFail'>
          <label>
          The email address that you have provided is not found in the homeowners' or tenants' list. Please try again.
          </label>
        </div>";
  }
}

// // VERIFYING EMAIL USING OTP
// if (isset($_POST["verify"])) {
//   $email_address = $_POST["email_address"];
//   $verification_code = $_POST["verification_code"];

//   // mark email as verified
//   $sql = "UPDATE user SET email_verified_at = NOW() WHERE email_address = '" . $email_address . "' AND verification_code = '" . $verification_code . "'";
//   $result = mysqli_query($con, $sql);

//   if (mysqli_affected_rows($con) == 1) {
//     $result = mysqli_query($con, $sql);
//     $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('$email_address' ,  'verified their email', NOW())";
//     mysqli_query($con, $sql1);
//     echo "<div class='messageSuccess'>
//         <label >
//           Account is now verified. Please wait for the Admin to activate your account.
//         </label>
//         <form method='post'>
//             <button class='okBtn' name='okBtn' type='submit' >OK</button>
//         </form>
//       </div>";
//   } else {
//     echo "<div class='messageFail'>
//         <label >
//           Wrong OTP. Please try again.
//         </label>
//       </div>";
//   }
// }

// //REDIRECT TO INDEX AFTER OTP VERIFY
// if (isset($_POST["okBtn"])) {
//   header("Location: ../index.php");
// }

// // RESEND OTP
// if (isset($_POST["emailVerify"])) {
//   $email_address = $_POST["email_verify"];
//   $sql = "SELECT * FROM user WHERE email_address = '$email_address' ";
//   $result = mysqli_query($con, $sql);
//   $sql1 = "SELECT * FROM user WHERE email_address = '$email_address' AND email_verified_at IS NOT NULL";
//   $result1 = mysqli_query($con, $sql);
//   $row = $result->fetch_assoc();
//   if (mysqli_num_rows($result) == 0) {
//     echo "<div class='messageFail'>
//         <label>
//         Your email is not registered with an existing account.
//         </label>
//       </div>";
//   } else if (mysqli_num_rows($result) == 1) {
//     echo "<div class='messageFail'>
//         <label>
//         Your email is already verified.
//         </label>
//       </div>";
//   } else {
//     $full_name = $row['full_name'];
//     $mail = new PHPMailer(true);
//     try {
//       $mail->SMTPDebug = 2;
//       $mail->isSMTP();
//       $mail->Host = 'smtp.gmail.com';
//       $mail->SMTPAuth = true;
//       $mail->Username = 'sunnyvalesubdivision@gmail.com';
//       $mail->Password = 'xmdyrdzqmopfjpbo';
//       $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//       $mail->Port = 587;
//       $mail->setFrom('sunnyvalesubdivision@gmail.com');
//       $mail->addAddress($email_address, $full_name);
//       $mail->isHTML(true);
//       $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
//       $mail->Subject = 'Email verification';
//       $mail->Body = '<p>Your new verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
//       $mail->send();
//       $sql = "UPDATE user SET verification_code =  '$verification_code' WHERE full_name = '" . $full_name . "'";
//       $result = mysqli_query($con, $sql);
//       header("Location: ../modules/verify.php?email_address=" . $email_address);
//       exit();
//     } catch (Exception $e) {
//       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
//   }
// }

// LOGGING IN
if (isset($_POST['login'])) {

  $email_address = $_POST['email_address'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM user WHERE BINARY email_address = '$email_address' AND BINARY password = '$password' AND account_status = 'Activated' ";
  $result = mysqli_query($con, $sql);
  $sql1 = "SELECT * FROM user WHERE BINARY email_address = '$email_address' AND password = '$password' AND (account_status = 'Pending' or account_status = 'Deactivated')";
  $result1 = mysqli_query($con, $sql1);

  if (mysqli_num_rows($result) == 1) {

    $con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
    $result = $con->query("SELECT * FROM user WHERE email_address = '$email_address'");
    $row = $result->fetch_assoc();
    $homeowner_id = $row['user_homeowner_id'];

    $user_type = $row['user_type'];
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_type'] = $row['user_type'];
    $_SESSION['subdivision'] = $row['subdivision'];
    $_SESSION['user_type'] = $row['user_type'];
    $_SESSION['full_name'] = $row['full_name'];
    $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Logged in', NOW())";
    mysqli_query($con, $sqlAudit);
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
  $content = mysqli_real_escape_string($con, $_POST['content']);
  $days = $_POST['days'] ?? '';
  $result = $con->query("SELECT * FROM user WHERE user_id = " . $user_id = $_SESSION['user_id'] . "") or die($mysqli->error);
  $row = $result->fetch_assoc();
  $user_id = $row['user_id'];
  $full_name = $row['full_name'];

  if ($row['user_type'] != "Homeowner" and $row['user_type'] != "Tenant") {
    $sql = "INSERT INTO post(user_id, full_name, title, content, published_at, days_archive, content_image, officer_post, post_status) VALUES ('$user_id','$full_name', '$title', '$content', now(), '$days', '', 'Yes', 'Active')";
    mysqli_query($con, $sql);
  } else {
    $fileName = '' . $_FILES['image']['name'] ?? '';
    $targetFilePath = $targetDir . $fileName;
    if ($_FILES['image']['size'] != 0) {
      copy($_FILES['image']['tmp_name'], $targetFilePath);
    }
    $sql = "INSERT INTO post(user_id, full_name, title, content, published_at, days_archive, content_image, officer_post, post_status) VALUES ('$user_id','$full_name', '$title', '$content', now(), NULL, '$fileName', 'No', 'Active')";
    mysqli_query($con, $sql);
    echo "<div class='messageSuccess'>
        <label >
          Your post has been uploaded!
        </label>
      </div>";
  }


  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','uploaded a new post', NOW())";
  mysqli_query($con, $sqlAudit);
}

if (isset($_POST['importSubmit'])) {

  $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
  if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

    // If the file is uploaded
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {

      // Open uploaded CSV file with read-only mode
      $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

      // Skip the first line
      fgetcsv($csvFile);

      while (($line = fgetcsv($csvFile)) !== FALSE) {
        $homeowner_id  = $line[0];
        $last_name = $line[1];
        $first_name = $line[2];
        $middle_name = $line[3];
        $suffix = $line[4];
        $sex = $line[5];
        $street = $line[6];
        $subdivision = $line[7];
        $barangay = $line[8];
        $bussiness_address = $line[9];
        $occupation = $line[10];
        $email_address = $line[11];
        $birthdate = $line[12];
        $mobile_number = $line[13];
        $employer = $line[14];


        $sql = "INSERT IGNORE INTO homeowner_profile(homeowner_id, last_name, first_name, middle_name, suffix, sex, street, subdivision, barangay, business_address, occupation, email_address, birthdate, mobile_number, employer) VALUES ('$homeowner_id','$last_name','$first_name','$middle_name','$suffix','$sex', '$street', '$subdivision', '$barangay', '$bussiness_address','$occupation','$email_address','$birthdate','$mobile_number','$employer') ON DUPLICATE KEY UPDATE first_name =  '$first_name', middle_name = '$middle_name', last_name = '$last_name', suffix = '$suffix', sex = '$sex', street = '$street', subdivision = '$subdivision', barangay = '$barangay', business_address = '$barangay', occupation = '$occupation', email_address = '$email_address', birthdate = '$birthdate', mobile_number = '$mobile_number', employer = '$employer'";
        $result = mysqli_query($con, $sql);

        $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Imported csv file', NOW())";
        mysqli_query($con, $sqlAudit);

        // $resultSession = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
        // $row = $resultSession->fetch_assoc();
        // $sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "', '" . 'added homeowner' . ' ' . "$first_name" . ' ' . "$last_name" . "' , NOW())";
        // mysqli_query($con, $sql1);
        header("Location: homeownerlist.php");
      }
    }
  }
}

// REGISTRATION OF HOMEOWNERS
if (isset($_POST['homeowner_submit'])) {
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $suffix = $_POST['suffix'];
  $subdivision = $_POST['subdivision'];
  $block_id = $_POST['block'];
  $lot_id = $_POST['lot'];
  $bussiness_address = $_POST['business_address'];
  $mobile_number = $_POST['mobile_number'];
  $occupation = $_POST['occupation'];
  $employer = $_POST['employer'];
  $birthdate = strtotime($_POST['birthdate']);
  $birthdate = date('Y-m-d', $birthdate);
  $sex = $_POST['sex'];
  $email_address = $_POST['email_address'];
  $vehicle_registration = $_POST['vehicle_registration'];

  $resultSubdivision = $con->query("SELECT * FROM subdivision WHERE subdivision_id = '$subdivision'");
  $rowSubdivision = $resultSubdivision->fetch_assoc();
  $barangay = $rowSubdivision['barangay'];
  $subdivision_name = $rowSubdivision['subdivision_name'];

  $resultBlock = $con->query("SELECT * FROM block WHERE block_id = '$block_id'");
  $rowBlock = $resultBlock->fetch_assoc();
  $block = $rowBlock['block'];

  $resultLot = $con->query("SELECT * FROM lot WHERE lot_id = '$lot_id'");
  $rowLot = $resultLot->fetch_assoc();
  $lot = $rowLot['lot'];

  $street = "Lot " . $lot . " Block " . $block;

  $sql = "INSERT INTO homeowner_profile(last_name, first_name, middle_name, suffix, sex, street, subdivision, barangay, business_address, occupation, email_address, birthdate, mobile_number, employer, vehicle_registration) VALUES ('$last_name','$first_name','$middle_name','$suffix','$sex', '$street', '$subdivision_name', '$barangay', '$bussiness_address','$occupation','$email_address','$birthdate','$mobile_number','$employer', '$vehicle_registration')";
  $result = mysqli_query($con, $sql);

  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Registed a homeowner profile', NOW())";
  mysqli_query($con, $sqlAudit);
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
    $lot = substr($street, 4, 1);
    $block = substr($street, 12, 1);

    $resultLot = $con->query("SELECT * FROM lot INNER JOIN block ON lot.block_id = block.block_id WHERE block.block = '$block' AND lot.lot = '$lot'") or die($mysqli->error);
    $rowLot = $resultLot->fetch_assoc();
    $lot_id = $rowLot['lot_id'];
    $block_id = $rowLot['block_id'];

    $subdivision_name = $row['subdivision'];
    $resultSubdivision = $con->query("SELECT * FROM subdivision WHERE subdivision_name = '$subdivision_name'");
    $rowSubdivision = $resultSubdivision->fetch_assoc();
    $subdivision_id = $rowSubdivision['subdivision_id'];

    $business_address = $row['business_address'];
    $occupation = $row['occupation'];
    $employer = $row['employer'];
    $birthdate = $row['birthdate'];
    $sex = $row['sex'];
    $email_address = $row['email_address'];
    $mobile_number = $row['mobile_number'];
    $vehicle_registration = $row['vehicle_registration'];
  }
}

//UPDATING A REGISTERED HOMEOWNER
if (isset($_POST['homeowner_update'])) {
  $homeowner_id = $_POST['homeowner_id'];
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $suffix = $_POST['suffix'];
  $subdivision = $_POST['subdivision'];
  $block_id = $_POST['block'];
  $lot_id = $_POST['lot'];
  $business_address = $_POST['business_address'];
  $mobile_number = $_POST['mobile_number'];
  $occupation = $_POST['occupation'];
  $employer = $_POST['employer'];
  $vehicle_registration = $_POST['vehicle_registration'];
  $birthdate = strtotime($_POST['birthdate']);
  $birthdate = date('Y-m-d', $birthdate);
  $sex = $_POST['sex'];
  $email_address = $_POST['email_address'];
  $full_name = $first_name . ' ' . $last_name;

  $resultSubdivision = $con->query("SELECT * FROM subdivision WHERE subdivision_id = '$subdivision'");
  $rowSubdivision = $resultSubdivision->fetch_assoc();
  $barangay = $rowSubdivision['barangay'];

  $resultBlock = $con->query("SELECT * FROM block WHERE block_id = '$block_id'");
  $rowBlock = $resultBlock->fetch_assoc();
  $block = $rowBlock['block'];

  $resultLot = $con->query("SELECT * FROM lot WHERE lot_id = '$lot_id'");
  $rowLot = $resultLot->fetch_assoc();
  $lot = $rowLot['lot'];

  $street = "Lot " . $lot . " Block " . $block;
  $sql = "UPDATE homeowner_profile SET first_name =  '$first_name', middle_name = '$middle_name', last_name = '$last_name', suffix = '$suffix', sex = '$sex', street = '$street', subdivision = '$subdivision_name', barangay = '$barangay', business_address = '$business_address', occupation = '$occupation', email_address = '$email_address', birthdate = '$birthdate', mobile_number = '$mobile_number', employer = '$employer', vehicle_registration = '$vehicle_registration' WHERE homeowner_id = '$homeowner_id'";
  $result = mysqli_query($con, $sql);
  $sql2 = "UPDATE user SET full_name = '$full_name', email_address = '$email_address', subdivision = '$subdivision_name' WHERE user_homeowner_id = '$homeowner_id'";
  $result2 = mysqli_query($con, $sql2);

  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Update a homeowner profile', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: homeownerRegistration.php");
}

//HOMEOWNER REGISTRATION CLEAR
if (isset($_POST['homeownerReset'])) {
  header("Location: homeownerRegistration.php");
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
  }
  if ($_POST['ampmTo'] == 'pm' and $_POST['hrTo'] >= 9 and $_POST['minsTo'] >= 1) {
    echo "<div class='messageFail'>
        <label >
          Invalid time input!
        </label>
      </div>";
  }
  if ($_POST['ampmFrom'] == 'pm' and $_POST['hrFrom'] >= 9 and $_POST['minsFrom'] >= 0) {
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
  $availability = $_POST['availability'];
  $subdivision_id = $_POST['subdivision_id'];

  $result1 = $con->query("SELECT * FROM subdivision WHERE subdivision_id= '$subdivision_id'");
  $row1 = $result1->fetch_assoc();
  $subdivision_name = $row1['subdivision_name'];

  $sql = "INSERT INTO amenities(amenity_name, subdivision_id, subdivision_name, availability) VALUES ('$newAmenity', '$subdivision_id', '$subdivision_name', '$availability')";
  mysqli_query($con, $sql);

  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added an amenity', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsAmenity.php");
}

//SELECTING A ROW TO EDIT AMENITY
if (isset($_GET['amenity_id'])) {
  $amenity_id = $_GET['amenity_id'];
  $result = $con->query("SELECT * FROM amenities WHERE amenity_id = '$amenity_id'");
  if ($result->num_rows) {
    $row = $result->fetch_array();
    $amenity_name = $row['amenity_name'];
    $subdivision_id = $row['subdivision_id'];
    $availability = $row['availability'];
  }
}

// UPDATING A ROW AMENITY
if (isset($_POST['amenityUpdate'])) {
  $amenity_id = $_POST['amenity_id_settings'];
  $amenity_name = $_POST['newAmenity'];
  $subdivision_id = $_POST['subdivision_id'];
  $availability = $_POST['availability'];

  $resultSubdivision_selectAmenities = $con->query("SELECT * FROM subdivision WHERE subdivision_id = '$subdivision_id'") or die($mysqli->error);
  $row1 = $resultSubdivision_selectAmenities->fetch_assoc();
  $subdivision_name = $row1['subdivision_name'];

  $con->query("UPDATE amenities SET amenity_name = '$amenity_name', subdivision_id = '$subdivision_id', subdivision_name = '$subdivision_name', availability = '$availability' WHERE amenity_id = '$amenity_id'");
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated an amenity', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsAmenity.php");
}

//AMENITY PURPOSE ADD, EDIT
if (isset($_POST['purposeAdd'])) {
  $amenity_id = $_POST['amenity'];
  $amenity_purpose = $_POST['amenity_purpose'];
  $dayRate = $_POST['dayRate'];
  $nightRate = $_POST['nightRate'];

  $sql = "INSERT INTO amenity_purpose(amenity_id, amenity_purpose, day_rate, night_rate) VALUES ('$amenity_id', '$amenity_purpose', '$dayRate', '$nightRate')";
  mysqli_query($con, $sql);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added an amenity purpose', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsAmenity.php#amenityPurpose");
}

//SELECTING A ROW TO EDIT PURPOSE
if (isset($_GET['amenity_purpose_id'])) {
  $amenity_purpose_id = $_GET['amenity_purpose_id'];
  $result = $con->query("SELECT * FROM amenity_purpose INNER JOIN amenities ON amenity_purpose.amenity_id = amenities.amenity_id WHERE amenity_purpose_id = '$amenity_purpose_id'");
  if ($result->num_rows) {
    $row = $result->fetch_array();
    $amenity_purpose_id = $row['amenity_purpose_id'];
    $amenity_id = $row['amenity_id'];
    $amenity_name_purpose = $row['amenity_name'];
    $amenity_purpose = $row['amenity_purpose'];
    $subdivision_id = $row['subdivision_id'];
    $dayRate = $row['day_rate'];
    $nightRate = $row['night_rate'];
  }
}

// UPDATING A ROW AMENITY PURPOSE
if (isset($_POST['purposeUpdate'])) {
  $amenity_purpose_id = $_POST['amenity_purpose_id'];
  $amenity_purpose = $_POST['amenity_purpose'];
  $dayRate = $_POST['dayRate'];
  $nightRate = $_POST['nightRate'];

  $con->query("UPDATE amenity_purpose SET amenity_purpose = '$amenity_purpose', day_rate = '$dayRate', night_rate = '$nightRate' WHERE amenity_purpose_id = '$amenity_purpose_id'");
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated an amenity purpose', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsAmenity.php");
}

// BILLING PERIOD ADD
if (isset($_POST['billingPeriodAdd'])) {
  $year = $_POST['year'];

  $sql = "INSERT INTO years(year) VALUES ('$year')";
  mysqli_query($con, $sql);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a billing period', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsBillingPeriod.php");
}

// SELECTING A ROW TO EDIT BILLING PERIOD
if (isset($_GET['year_id'])) {
  $year_id = $_GET['year_id'] ?? '';
  $result = $con->query("SELECT * FROM years WHERE yearID = '$year_id'");

  if ($result->num_rows) {
    $row = $result->fetch_array();
    $yearID = $row['yearID'];
    $year = $row['year'];
  }
}

// UPDATING A ROW BILLING PERIOD
if (isset($_POST['billingPeriodUpdate'])) {
  $year_id = $_POST['year_id'];
  $year = $_POST['year'];

  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated a billing period', NOW())";
  mysqli_query($con, $sqlAudit);
  $con->query("UPDATE years SET year = '$year' WHERE yearID = '$year_id'");
  header("Location: settingsBillingPeriod.php");
}

// SUBDIVISION ADD
if (isset($_POST['subdivisionAdd'])) {
  $subdivision = $_POST['subdivision'];
  $barangay = $_POST['barangay'];

  $sql = "INSERT INTO subdivision(subdivision_name, barangay) VALUES ('$subdivision', '$barangay')";
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a subdivision', NOW())";
  mysqli_query($con, $sqlAudit);
  mysqli_query($con, $sql);
  header("Location: settingsSubdivision.php");
}

// SELECTING A ROW TO EDIT SUBDIVISION
if (isset($_GET['subdivision_id'])) {
  $subdivision_id = $_GET['subdivision_id'];
  $result = $con->query("SELECT * FROM subdivision WHERE subdivision_id = '$subdivision_id'");
  if ($result->num_rows) {
    $row = $result->fetch_array();
    $subdivision_id = $row['subdivision_id'];
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
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated a subdivision', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsSubdivision.php");
}

// BLOCK ADD
if (isset($_POST['blockAdd'])) {
  $subdivision_id = $_POST['subdivision_id_block'];
  $block = $_POST['block'];

  $sql = "INSERT INTO block (subdivision_id, block) VALUES ('$subdivision_id', '$block')";
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a block', NOW())";
  mysqli_query($con, $sqlAudit);
  mysqli_query($con, $sql);

  header("Location: settingsSubdivision.php#subdivisionBlock");
}

// SELECTING A ROW TO EDIT BLOCK
if (isset($_GET['block_id'])) {
  $block_id = $_GET['block_id'];
  $result = $con->query("SELECT * FROM block WHERE block_id = '$block_id'");

  if ($result->num_rows) {
    $row = $result->fetch_array();
    $subdivision_id_block = $row['subdivision_id'];
    $block = $row['block'];
  }
}

// UPDATING A ROW BLOCK
if (isset($_POST['blockUpdate'])) {
  $block_id = $_POST['block_id'];
  $subdivision_id = $_POST['subdivision_id_block'];
  $block = $_POST['block'];
  $con->query("UPDATE block SET subdivision_id = '$subdivision_id', block = '$block' WHERE block_id = '$block_id'");
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated a block', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsSubdivision.php#subdivisionBlock");
}

// CASCADING DROP DOWN FOR BLOCK
if (isset($_POST['subdivision_id_lot'])) {
  $subdivision_id = $_POST['subdivision_id_lot'];

  $result = $con->query("SELECT * FROM block WHERE subdivision_id= '$subdivision_id' ORDER BY block + 0 ASC");

  if (mysqli_num_rows($result) > 0) {
    echo '<option value="0">Select Block...</option>';
    while ($row = $result->fetch_assoc()) {
      echo '<option value="' . $row['block_id'] . '">' . $row['block'] . '</option>';
    }
  } else {
    echo '<option value="0">No Block Found</option>';
  }
}

// CASCADING DROP DOWN FOR LOT
if (isset($_POST['block_id'])) {
  $block_id = $_POST['block_id'];

  $result = $con->query("SELECT * FROM lot WHERE block_id = '$block_id' ORDER BY lot + 0 ASC");

  if (mysqli_num_rows($result) > 0) {
    echo '<option value="0">Select Lot...</option>';
    while ($row = $result->fetch_assoc()) {
      echo '<option value="' . $row['lot_id'] . '">' . $row['lot'] . '</option>';
    }
  } else {
    echo '<option value="0">No Lot Found</option>';
  }
}

// LOT ADD
if (isset($_POST['lotAdd'])) {
  $block_id = $_POST['block_id'];
  $lot = $_POST['lot'];

  $sql = "INSERT INTO lot (block_id, lot) VALUES ('$block_id', '$lot')";
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a lot', NOW())";
  mysqli_query($con, $sqlAudit);
  mysqli_query($con, $sql);
  header("Location: settingsSubdivision.php#subdivisionLot");
}

// SELECTING A ROW TO EDIT LOT
if (isset($_GET['lot_id'])) {
  $lot_id = $_GET['lot_id'];
  $result = $con->query("SELECT * FROM lot INNER JOIN block ON lot.block_id = block.block_id INNER JOIN subdivision ON block.subdivision_id = subdivision.subdivision_id WHERE lot_id = '$lot_id'");

  if ($result->num_rows) {
    $row = $result->fetch_array();
    $subdivision_id_lot = $row['subdivision_id'];
    $block_id = $row['block_id'];
    $lot = $row['lot'];
  }
}

// UPDATING A ROW LOT
if (isset($_POST['lotUpdate'])) {
  $block_id = $_POST['block_id'];
  $lot_id = $_POST['lot_id'];
  $lot = $_POST['lot'];
  $con->query("UPDATE lot SET lot = '$lot', block_id = '$block_id' WHERE lot_id = '$lot_id'");
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated a lot', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsSubdivision.php#subdivisionLot");
}

// MONTHLY DUES ADD
if (isset($_POST['monthlyDuesAdd'])) {
  $subdivision = $_POST['subdivision'];
  $rate = $_POST['rate'];

  $sql = "INSERT INTO monthly_dues(subdivision_name, amount, updated_at) VALUES ('$subdivision','$rate',NOW())";
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a monthly dues', NOW())";
  mysqli_query($con, $sqlAudit);
  mysqli_query($con, $sql);
  header("Location: settingsMonthlydues.php");
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
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated a monthly dues', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsMonthlydues.php");
}

// GCASH NUMBER ADD
if (isset($_POST['gcashAdd'])) {
  $subdivision = $_POST['subdivision'];
  $gcash_no = $_POST['gcash_no'];

  $sql = "INSERT INTO gcash(subdivision, mobile_no) VALUES ('$subdivision','$gcash_no')";
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a gcash number', NOW())";
  mysqli_query($con, $sqlAudit);
  mysqli_query($con, $sql);
  header("Location: settingsGcash.php");
}

// SELECTING A ROW TO EDIT GCASH NUMBER
if (isset($_GET['gcash_id'])) {
  $gcash_id = $_GET['gcash_id'];
  $result = $con->query("SELECT * FROM gcash WHERE gcash_id = '$gcash_id'");
  if ($result->num_rows) {
    $row = $result->fetch_array();
    $subdivision_name = $row['subdivision'];
    $gcash_no = $row['mobile_no'];
  }
}

// UPDATING A ROW GCASH NUMBER
if (isset($_POST['gcashUpdate'])) {
  $gcash_id = $_POST['gcash_id'];
  $subdivision_name = $_POST['subdivision'];
  $gcash_no = $_POST['gcash_no'];

  $con->query("UPDATE gcash SET subdivision = '$subdivision_name', mobile_no = '$gcash_no' WHERE gcash_id = '$gcash_id'");
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated a gcash number', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsGcash.php");
}

// STICKER PRICE ADD
if (isset($_POST['stickerAdd'])) {
  $subdivision = $_POST['subdivision'];
  $sticker_price = $_POST['sticker_price'];

  $sql = "INSERT INTO sticker(subdivision, cost) VALUES ('$subdivision','$sticker_price')";
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a sticker price', NOW())";
  mysqli_query($con, $sqlAudit);
  mysqli_query($con, $sql);
  header("Location: settingsSticker.php");
}

// SELECTING A ROW TO EDIT STICKER PRICE
if (isset($_GET['sticker_id'])) {
  $sticker_id = $_GET['sticker_id'];
  $result = $con->query("SELECT * FROM sticker WHERE sticker_id = '$sticker_id'");
  if ($result->num_rows) {
    $row = $result->fetch_array();
    $subdivision_name = $row['subdivision'];
    $sticker_price = $row['cost'];
  }
}

// UPDATING A ROW STICKER PRICE
if (isset($_POST['stickerUpdate'])) {
  $sticker_id = $_POST['sticker_id'];
  $subdivision_name = $_POST['subdivision'];
  $sticker_price = $_POST['sticker_price'];

  $con->query("UPDATE sticker SET subdivision = '$subdivision_name', cost = '$sticker_price' WHERE sticker_id = '$sticker_id'");
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated a sticker price', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsSticker.php");
}


// SYSTEM ACCOUNT ADD
if (isset($_POST['sysAccAdd'])) {
  $systemAccount = $_POST['account_name'];
  $password = $_POST['password'];
  $userType = $_POST['user_type'];
  $account_status = $_POST['account_status'];


  $sql1 = "INSERT INTO homeowner_profile(last_name, first_name, middle_name, suffix, sex, street, subdivision, barangay, business_address, occupation, email_address, birthdate, mobile_number, employer) VALUES ('', '$systemAccount', NULL, NULL,'' , '', '" . $_SESSION['subdivision'] . "', '', NULL, NULL, '', NULL, NULL, NULL)";
  mysqli_query($con, $sql1);
  $result = $con->query("SELECT * FROM homeowner_profile WHERE first_name = '$systemAccount'");
  if ($result->num_rows) {
    $row = $result->fetch_array();
    $user_homeowner_id = $row['homeowner_id'];
    $sql = "INSERT INTO user(user_homeowner_id, subdivision, full_name, user_type, password, email_address, account_status, verification_code, email_verified_at, display_picture) VALUES ('$user_homeowner_id', '" . $_SESSION['subdivision'] . "', '$systemAccount', '$userType', '$password', '$systemAccount', '$account_status', NULL, NULL, 'default.png')";
    mysqli_query($con, $sql);
    $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a system account', NOW())";
    mysqli_query($con, $sqlAudit);
    header("Location: settingsSystemAcc.php");
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
  $account_name = $_POST['account_name'];
  $password = $_POST['password'];
  $account_type = $_POST['user_type'];
  $account_status = $_POST['account_status'];

  $resultHomeownerID = $con->query("SELECT * FROM user WHERE user_id = '$account_id'");
  $rowHomeownerID = $resultHomeownerID->fetch_assoc();
  $homeowner_id = $rowHomeownerID['user_homeowner_id'];

  $con->query("UPDATE homeowner_profile SET first_name = '$account_name' WHERE homeowner_id = '$homeowner_id'");
  $con->query("UPDATE user SET full_name = '$account_name', password = '$password', user_type = '$account_type', account_status = '$account_status', email_address = '$account_name' WHERE user_id = '$account_id'");
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated a system account', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsSystemAcc.php");
}

// SUBDIVISION OFFICER ADD
if (isset($_POST['officerAdd'])) {
  $targetDir = '../media/content-images/';
  $fileName = '' . $_FILES['image']['name'] ?? '';
  $targetFilePath = $targetDir . $fileName;
  if ($_FILES['image']['size'] != 0) {
    copy($_FILES['image']['tmp_name'], $targetFilePath);
  }

  $officer_name = $_POST['officer_name'];
  $subdivision_name = $_POST['subdivision_name'];
  $position_name = $_POST['position_name'];
  $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
  $row = $result->fetch_assoc();
  $sql = "INSERT INTO officers(subdivision_name, officer_name, position_name, officer_img) VALUES ('$subdivision_name', '$officer_name', '$position_name', '$fileName')";

  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a subdivision officer', NOW())";
  mysqli_query($con, $sqlAudit);
  mysqli_query($con, $sql);
  header("Location: settingsSubdivisionOfficer.php");
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
    $officer_img = $row['officer_img'];
  }
}

// UPDATING AN OFFICER
if (isset($_POST['officerUpdate'])) {
  $officer_id = $_POST['officer_id'];
  $officer_name = $_POST['officer_name'];
  $subdivision_name = $_POST['subdivision_name'];
  $position_name = $_POST['position_name'];

  $targetDir = '../media/content-images/';
  $fileName = '' . $_FILES['image']['name'] ?? '';
  $targetFilePath = $targetDir . $fileName;
  if ($_FILES['image']['size'] != 0) {
    copy($_FILES['image']['tmp_name'], $targetFilePath);
    $con->query("UPDATE officers SET subdivision_name = '$subdivision_name', officer_name = '$officer_name', position_name = '$position_name', officer_img = '$fileName' WHERE officer_id = '$officer_id'");
  } else {
    $con->query("UPDATE officers SET subdivision_name = '$subdivision_name', officer_name = '$officer_name', position_name = '$position_name' WHERE officer_id = '$officer_id'");
  }


  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated an officer', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsSubdivisionOfficer.php");
}

// UPDATING MISSION VISION GOALS
if (isset($_POST['missionVision'])) {
  $id = $_POST['missionVisionID'];
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $con->query("UPDATE mission_vision SET description = '$description' WHERE id = '$id'");
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated the mission, vision, and goals', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsMissionVision.php");
}

// UPDATING PRIVACY
if (isset($_POST['privacy'])) {
  $id = $_POST['privacyID'];
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $con->query("UPDATE privacy SET description = '$description' WHERE privacy_id = '$id'");
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated the privacy', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsPrivacy.php");
}

// CONTACT ADD, EDIT
if (isset($_POST['contactAdd'])) {
  $email = $_POST['newEmail'];
  $telephone = $_POST['newTelephone'];
  $subdivision_id = $_POST['subdivision_id'];

  $sql = "INSERT INTO contact(subdivision_id, telephone, email) VALUES ('$subdivision_id', '$telephone', '$email')";
  mysqli_query($con, $sql);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a contact', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsContact.php");
}

//SELECTING A ROW TO EDIT CONTACT
if (isset($_GET['contact_id'])) {
  $contact_id = $_GET['contact_id'];
  $result = $con->query("SELECT * FROM contact WHERE contact_id = '$contact_id'");
  if ($result->num_rows) {
    $row = $result->fetch_array();
    $email = $row['email'];
    $subdivision_id = $row['subdivision_id'];
    $telephone = $row['telephone'];
  }
}

// UPDATING A ROW CONTACT
if (isset($_POST['contactUpdate'])) {
  $contact_id = $_POST['contact_id'];
  $email = $_POST['newEmail'];
  $telephone = $_POST['newTelephone'];
  $subdivision_id = $_POST['subdivision_id'];

  $con->query("UPDATE contact SET email = '$email', subdivision_id = '$subdivision_id', telephone = '$telephone' WHERE contact_id = '$contact_id'");
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated a contact', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: settingsContact.php");
}

// SUBMITTING A CONCERN
if (isset($_POST['concernSubmit'])) {
  $concern_address = $_POST['concern_address'];
  $concern_subject = $_POST['concern_subject'];
  $concern_description = $_POST['concern_description'];
  $result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
  $row = $result->fetch_assoc();
  $resultComplainee = $con->query("SELECT * FROM user WHERE user_homeowner_id = '$concern_address'");
  $rowComplainee = $resultComplainee->fetch_assoc();
  $complainee_fullName = $rowComplainee['full_name'] ?? '';

  if ($concern_address == '0') {
    $sql = "INSERT INTO concern(complainant_homeowner_id, full_name, complainee_homeowner_id, complainee_full_name, concern_subject, concern_description, status, datetime, datetime_submitted) VALUES ('" . $row['user_homeowner_id'] . "', '" . $row['full_name'] . "', NULL, NULL, '$concern_subject', '$concern_description', 'Pending', NOW(), NOW())";
  } else {
    $sql = "INSERT INTO concern(complainant_homeowner_id, full_name, complainee_homeowner_id, complainee_full_name, concern_subject, concern_description, status, datetime, datetime_submitted) VALUES ('" . $row['user_homeowner_id'] . "', '" . $row['full_name'] . "', '$concern_address', '$complainee_fullName', '$concern_subject', '$concern_description', 'Pending', NOW(), NOW())";
  }

  mysqli_query($con, $sql);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Submitted a concern', NOW())";
  mysqli_query($con, $sqlAudit);
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

// UPDATING A CONCERN TO PROCESSING
if (isset($_POST['concernProcess'])) {
  $concern_id = $_POST['concern_id'];
  $con->query("UPDATE concern SET status = 'Processing', datetime = NOW() WHERE concern_id = '$concern_id'");
}

// UPDATING A CONCERN TO RESOLVED
if (isset($_POST['concernResolved'])) {
  $concern_id = $_POST['concern_id'];
  $con->query("UPDATE concern SET status = 'Resolved', datetime = NOW() WHERE concern_id = '$concern_id'");
}

// EDITING PROFILE

if (isset($_POST['editProfile'])) {
  $business_address = $_POST['business_address'];
  $mobile_number = $_POST['mobile_number'];
  $occupation = $_POST['occupation'];
  $employer = $_POST['employer'];
  $vehicle_registration = $_POST['vehicle_registration'];



  $resultID = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
  $rowID = $resultID->fetch_assoc();

  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated their profile', NOW())";
  mysqli_query($con, $sqlAudit);

  $sql = "UPDATE homeowner_profile SET business_address ='" . $business_address . "', occupation ='" . $occupation . "', mobile_number='" . $mobile_number . "', employer='" . $employer . "', vehicle_registration = '" . $vehicle_registration . "'   WHERE homeowner_id = '" . $rowID['user_homeowner_id'] . "'";
  $result = mysqli_query($con, $sql);

  echo "<div class='messageSuccess'>
        <label >
          Changes saved!
        </label>
      </div>";
}

// EDITING PROFILE PHOTO

if (isset($_POST['editProfilePhoto'])) {
  $targetDir = '../media/displayPhotos/';
  $fileName = '' . $_FILES['image']['name'] ?? '';
  $targetFilePath = $targetDir . $fileName;

  if ($_FILES['image']['size'] != 0) {
    copy($_FILES['image']['tmp_name'], $targetFilePath);
  }


  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated their profile photo', NOW())";
  mysqli_query($con, $sqlAudit);

  $sql = "UPDATE user SET display_picture = '" . $fileName . "' WHERE user_id = '" . $_SESSION['user_id'] . "'";
  mysqli_query($con, $sql);
  echo "<div class='messageSuccess'>
        <label >
          Profile Photo changed successfully!
        </label>
      </div>";
}

// CASCADING DROP DOWN FOR AMENITY
if (isset($_POST['subdivision_id'])) {
  $subdivision_id = $_POST['subdivision_id'];

  $result = $con->query("SELECT * FROM amenities WHERE subdivision_id=$subdivision_id ORDER BY amenity_name DESC");

  if (mysqli_num_rows($result) > 0) {
    echo '<option>Select Amenity...</option>';
    while ($row = $result->fetch_assoc()) {
      echo '<option value="' . $row['amenity_id'] . '">' . $row['amenity_name'] . '</option>';
      echo '<script type="text/javascript"> 
  document.getElementById("day_id").setAttribute("value","");
  document.getElementById("night_id").setAttribute("value","");
</script>';
    }
  } else {
    echo '<option>No Amenity Found</option>';
    echo '<script type="text/javascript">
  document.getElementById("day_id").setAttribute("value","");
  document.getElementById("night_id").setAttribute("value","");
</script>';
  }
}

if (isset($_POST['amenity_id'])) {
  $amenity_id = $_POST['amenity_id'];
  $result = $con->query("SELECT * FROM amenity_purpose WHERE amenity_id=$amenity_id ORDER BY amenity_purpose DESC");

  if (mysqli_num_rows($result) > 0) {
    echo '<option>Select Purpose...</option>';
    while ($row = $result->fetch_assoc()) {
      echo '<option value="' . $row['amenity_purpose_id'] . '">' . $row['amenity_purpose'] . '</option>';
      echo '<script type="text/javascript"> 
  document.getElementById("day_id").setAttribute("value","");
  document.getElementById("night_id").setAttribute("value","");
</script>';
    }
  } else {
    echo '<option>No Purpose Found</option>';
    echo '<script type="text/javascript"> 
  document.getElementById("day_id").setAttribute("value","");
  document.getElementById("night_id").setAttribute("value","");
</script>';
  }
}

if (isset($_POST['purpose_id'])) {
  $purpose_id = $_POST['purpose_id'];
  $result = $con->query("SELECT * FROM amenity_purpose WHERE amenity_purpose_id=$purpose_id");
  $row = $result->fetch_assoc();

  if (mysqli_num_rows($result) > 0) {
    echo '<script type="text/javascript"> 
  document.getElementById("day_id").setAttribute("value",' . $row['day_rate'] . ');
  document.getElementById("night_id").setAttribute("value",' . $row['night_rate'] . ');
</script>';
  } else {
    echo '<script type="text/javascript"> 
  document.getElementById("day_id").setAttribute("value","");
  document.getElementById("night_id").setAttribute("value","");
</script>';
  }
}



// ADDING TO CART AMENITIES

if (isset($_POST['addToCart'])) {
  if ($_SESSION['user_type'] == 'Guest') {
    $renter_name = $_POST['renter_name'];
    $subdivision_id = $_POST['subdivision'];
    $amenity_id = $_POST['amenity'];
    $amenity_purpose_id = $_POST['purpose'];

    $resultSubdivision = $con->query("SELECT * FROM subdivision WHERE subdivision_id = '$subdivision_id'");
    $rowSubdivision = $resultSubdivision->fetch_assoc();

    $resultAmenity = $con->query("SELECT * FROM amenities WHERE amenity_id = '$amenity_id'");
    $rowAmenity = $resultAmenity->fetch_assoc();


    $sql = "INSERT INTO amenity_renting (user_id, renter_name, subdivision_name, amenity_name, amenity_purpose, cart) VALUES(NULL, '$renter_name', '" . $rowSubdivision['subdivision_name'] . "', '" . $rowAmenity['amenity_name'] . "', '$amenity_purpose_id', 'Yes')";
    $result = mysqli_query($con, $sql);
  } else {
    $renter_name = $_POST['renter_name'];
    $subdivision_id = $_POST['subdivision'];
    $amenity_id = $_POST['amenity'];
    $amenity_purpose_id = $_POST['purpose'];

    $resultSubdivision = $con->query("SELECT * FROM subdivision WHERE subdivision_id = '$subdivision_id'");
    $rowSubdivision = $resultSubdivision->fetch_assoc();

    $resultAmenity = $con->query("SELECT * FROM amenities WHERE amenity_id = '$amenity_id'");
    $rowAmenity = $resultAmenity->fetch_assoc();

    $resultID = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $rowID = $resultID->fetch_assoc();

    $sql = "INSERT INTO amenity_renting (user_id, renter_name, subdivision_name, amenity_name, amenity_purpose, cart) VALUES('" . $rowID['user_id'] . "', '$renter_name', '" . $rowSubdivision['subdivision_name'] . "', '" . $rowAmenity['amenity_name'] . "', '$amenity_purpose_id', 'Yes')";
    $result = mysqli_query($con, $sql);
  }
}

// REMOVING FROM CART AMENITIES
if (isset($_POST['removeSelected'])) {
  if (isset($_POST['checkbox'])) {
    foreach ($_POST['checkbox'] as $amenity_renting_id) {

      $sql = "UPDATE amenity_renting SET cart='Removed' WHERE amenity_renting_id = '$amenity_renting_id'";
      $result = mysqli_query($con, $sql);
    }
  }
}

//FACILITY RENTING APPLY DATE AND COST
if (isset($_POST['applyDateTime'])) {
  function to_24_hour($hours, $minutes, $meridiem)
  {
    $hours = sprintf('%02d', (int) $hours);
    $meridiem = (strtolower($meridiem) == 'am') ? 'am' : 'pm';
    return date('H:i', strtotime("{$hours}:{$minutes} {$meridiem}"));
  }
  $timeFrom = to_24_hour($_POST['hrFrom'], '00', $_POST['ampmFrom']);
  $timeTo = to_24_hour($_POST['hrTo'], '00', $_POST['ampmTo']);
  $date = $_POST['date'];
  $dateTimeFrom = $date . " " . $timeFrom;
  $dateTimeTo = $date . " " . $timeTo;
  if (isset($_POST['checkbox'])) {

    if ($_POST['hrTo'] >= 6 and $_POST['hrTo'] < 12 and $_POST['ampmTo'] == 'pm') {
      $nightStart = strtotime('18:00');

      $timeTo = strtotime($timeTo);
      $nightDifference = ($timeTo - $nightStart);
      $totalNightHrs = ($nightDifference / 3600);

      $timeFrom = strtotime($timeFrom);
      $dayDifference = ($nightStart - $timeFrom);
      $totalDayHrs = ($dayDifference / 3600);


      foreach ($_POST['checkbox'] as $amenity_renting_id) {
        $resultRate = $con->query("SELECT * FROM amenity_renting, amenity_purpose WHERE amenity_renting_id = '$amenity_renting_id' AND amenity_renting.amenity_purpose = amenity_purpose.amenity_purpose_id");
        $rowRate = $resultRate->fetch_assoc();

        $nightCost = $totalNightHrs * $rowRate['night_rate'];
        $dayCost = $totalDayHrs * $rowRate['day_rate'];

        $totalCost = $nightCost + $dayCost;
        $sql = "UPDATE amenity_renting SET date_from = '$dateTimeFrom', date_to = '$dateTimeTo', cost='$totalCost' WHERE amenity_renting_id = '$amenity_renting_id'";
        $result = mysqli_query($con, $sql);
      }
    } else if ($_POST['hrFrom'] >= 6 and $_POST['ampmFrom'] == 'pm' and $_POST['hrTo'] >= 6 and $_POST['ampmTo'] == 'pm') {
      $nightStart = strtotime('18:00');

      $timeTo = strtotime($timeTo);
      $timeFrom = strtotime($timeFrom);
      $difference = ($timeTo - $timeFrom);
      $totalHrs = ($difference / 3600);

      foreach ($_POST['checkbox'] as $amenity_renting_id) {
        $resultRate = $con->query("SELECT * FROM amenity_renting, amenity_purpose WHERE amenity_renting_id = '$amenity_renting_id' AND amenity_renting.amenity_purpose = amenity_purpose.amenity_purpose_id");
        $rowRate = $resultRate->fetch_assoc();

        $totalCost = $totalHrs * $rowRate['night_rate'];
        $sql = "UPDATE amenity_renting SET date_from = '$dateTimeFrom', date_to = '$dateTimeTo', cost='$totalCost' WHERE amenity_renting_id = '$amenity_renting_id'";
        $result = mysqli_query($con, $sql);
      }
    } else {
      $timeTo = strtotime($timeTo);
      $timeFrom = strtotime($timeFrom);
      $difference = ($timeTo - $timeFrom);
      $totalHrs = ($difference / 3600);

      foreach ($_POST['checkbox'] as $amenity_renting_id) {
        $resultRate = $con->query("SELECT * FROM amenity_renting, amenity_purpose WHERE amenity_renting_id = '$amenity_renting_id' AND amenity_renting.amenity_purpose = amenity_purpose.amenity_purpose_id");
        $rowRate = $resultRate->fetch_assoc();

        $totalCost = $totalHrs * $rowRate['day_rate'];
        $sql = "UPDATE amenity_renting SET date_from = '$dateTimeFrom', date_to = '$dateTimeTo', cost='$totalCost' WHERE amenity_renting_id = '$amenity_renting_id'";
        $result = mysqli_query($con, $sql);
      }
    }
  }
}

// AMENITY RENTING CHECKOUT

if (isset($_POST['checkout'])) {

  if ($_SESSION['user_type'] == 'Treasurer' or $_SESSION['user_type'] == 'Admin' or $_SESSION['user_type'] == 'Super Admin') {
    $resultID = $con->query("SELECT MAX(transaction_id) AS max FROM transaction");
    $rowID = $resultID->fetch_assoc();
    $max = $rowID['max'];

    $resultUserID = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $rowUserID = $resultUserID->fetch_assoc();

    $resultSumTotal = $con->query("SELECT SUM(cost) AS total_cost FROM amenity_renting WHERE user_id = '" . $_SESSION['user_id'] . "' AND cart='Yes'");
    $rowSumTotal = $resultSumTotal->fetch_assoc();
    $total_cost = $rowSumTotal['total_cost'];

    $sql = "UPDATE amenity_renting SET cart = 'Approved', transaction_id = $max + 1 WHERE cart='Yes' AND user_id= '" . $_SESSION['user_id'] . "'";
    $result = mysqli_query($con, $sql);

    $sql1 = "INSERT INTO transaction (user_id, name, total_cost, payment_proof, transaction_type, status) VALUES('" . $rowUserID['user_id'] . "', '" . $rowUserID['full_name'] . "', '$total_cost', NULL, 'Amenity Renting', 'Approved')";
    $result1 = mysqli_query($con, $sql1);

    $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Checkout', NOW())";
    mysqli_query($con, $sqlAudit);
  }
  if ($_SESSION['user_type'] == 'Guest') {
    $targetDir = '../media/paymentProof/';
    $fileName = '' . $_FILES['image']['name'];
    $targetFilePath = $targetDir . $fileName;

    $resultID = $con->query("SELECT MAX(transaction_id) AS max FROM transaction");
    $rowID = $resultID->fetch_assoc();
    $max = $rowID['max'];

    $resultSumTotal = $con->query("SELECT SUM(cost) AS total_cost FROM amenity_renting WHERE renter_name= '" . $_SESSION['guestName'] . "' AND cart='Yes'");
    $rowSumTotal = $resultSumTotal->fetch_assoc();
    $total_cost = $rowSumTotal['total_cost'];

    if (copy($_FILES['image']['tmp_name'], $targetFilePath)) {
      $sql = "UPDATE amenity_renting SET cart = 'Pending', transaction_id = $max + 1 WHERE cart='Yes' AND renter_name= '" . $_SESSION['guestName'] . "'";
      $result = mysqli_query($con, $sql);

      $sql1 = "INSERT INTO transaction (user_id, name, total_cost, payment_proof, transaction_type, status) VALUES(NULL, '" . $_SESSION['guestName'] . "', '$total_cost', '$fileName', 'Amenity Renting', 'Pending')";
      $result1 = mysqli_query($con, $sql1);
    }
  } else {
    $targetDir = '../media/paymentProof/';
    $fileName = '' . $_FILES['image']['name'];
    $targetFilePath = $targetDir . $fileName;

    $resultID = $con->query("SELECT MAX(transaction_id) AS max FROM transaction");
    $rowID = $resultID->fetch_assoc();
    $max = $rowID['max'];

    $resultUserID = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
    $rowUserID = $resultUserID->fetch_assoc();

    $resultSumTotal = $con->query("SELECT SUM(cost) AS total_cost FROM amenity_renting WHERE user_id = '" . $_SESSION['user_id'] . "' AND cart='Yes'");
    $rowSumTotal = $resultSumTotal->fetch_assoc();
    $total_cost = $rowSumTotal['total_cost'];

    if (copy($_FILES['image']['tmp_name'], $targetFilePath)) {
      $sql = "UPDATE amenity_renting SET cart = 'Pending', transaction_id = $max + 1 WHERE cart='Yes' AND user_id= '" . $_SESSION['user_id'] . "'";
      $result = mysqli_query($con, $sql);

      $sql1 = "INSERT INTO transaction (user_id, name, total_cost, payment_proof, transaction_type, status) VALUES('" . $rowUserID['user_id'] . "', '" . $rowUserID['full_name'] . "', '$total_cost', '$fileName', 'Amenity Renting', 'Pending')";
      $result1 = mysqli_query($con, $sql1);

      $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Checkout', NOW())";
      mysqli_query($con, $sqlAudit);
    }
  }
}


//BILLING PERIOD 
//add new annual 
if (isset($_POST['billingPeriodAdd'])) {

  $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  $i = 0;
  $year = $_POST['year'];
  while ($i < count($months)) {

    $sql = "INSERT INTO billing_period (month, year) VALUE ('$months[$i]', '$year')";
    $result = mysqli_query($con, $sql);
    $i++;
  }
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a Billing Period Months Annual', NOW())";
  mysqli_query($con, $sqlAudit);
}

//retrieve monthly dues amount
if (isset($_POST['monthly_dues_id'])) {

  $monthly_dues_id = $_POST['monthly_dues_id'];
  $monthly_to = $_POST['month_select_monthly_dues_to'];
  $result = $con->query("SELECT * FROM monthly_dues WHERE monthly_dues_id=$monthly_dues_id");
  // $monthly2 = $con->query("SELECT billingPeriod_id FROM billing_period WHERE billingPeriod_id=$monthly_to");
  $row = $result->fetch_assoc();
  $monthlyfinal = $row['amount'];


  if (mysqli_num_rows($result) > 0) {
    echo '<script type="text/javascript"> 
  document.getElementById("subdivisionMonthlyAmount").setAttribute("value",' . $monthlyfinal . ');
</script>';
  } else {
    echo '<script type="text/javascript"> 
  document.getElementById("subdivisionMonthlyAmount").setAttribute("value","");
</script>';
  }
}
//retrieve homeowner dues amount
if (isset($_POST['subdivision_id_homeowner'])) {
  $monthly_dues_id = $_POST['subdivision_id_homeowner'];

  $result = $con->query("SELECT * FROM monthly_dues WHERE subdivision_id=$monthly_dues_id");
  $row = $result->fetch_assoc();
  $result2 = $con->query("SELECT *, CONCAT(first_name, ' ', last_name)  AS fullname FROM homeowner_profile WHERE subdivision='" . $row['subdivision_name'] . "' AND last_name != '' ");

  if (mysqli_num_rows($result) > 0) {
    echo '<script type="text/javascript">
  document.getElementById("homeowner-amount").setAttribute("value",' . $row['amount']  . ');
</script>';
  } else {
    echo '<script type="text/javascript">
  document.getElementById("homeowner-amount").setAttribute("value","");
</script>';
  }

  if (mysqli_num_rows($result2) > 0) {
    echo '<option value="0">Select...</option>';
    while ($row2 = $result2->fetch_assoc()) {
      echo '<option value="' . $row2['homeowner_id'] . '">' . $row2['fullname'] . '</option>';
    }
  } else {
    echo '<option value="0">Select...</option>';
  }
}
//retrieve annual dues amount
if (isset($_POST['monthly_dues_id'])) {
  $monthly_dues_id = $_POST['monthly_dues_id'];
  $result = $con->query("SELECT * FROM monthly_dues WHERE monthly_dues_id=$monthly_dues_id");
  $row = $result->fetch_assoc();
  $annualfinal =  $row['amount'];


  if (mysqli_num_rows($result) > 0) {
    echo '<script type="text/javascript"> 
  document.getElementById("AnnualAmount").setAttribute("value",' . $annualfinal .  ');
  
</script>';
  } else {
    echo '<script type="text/javascript"> 
  document.getElementById("AnnualAmount").setAttribute("value","");
</script>';
  }
}

//Inserting monthly dues billing to all homeowners
if (isset($_POST['billMonth'])) {
  $monthly_dues_id = $_POST['subdivision-monthly'];
  $billingPeriod_id_from = $_POST['month_select_monthly_dues_from'];
  $billingPeriod_id_to = $_POST['month_select_monthly_dues_to'];
  $monthlyAmount = $_POST['monthlyAmount'];
  $resultSubdivision = $con->query("SELECT * FROM monthly_dues WHERE monthly_dues_id=$monthly_dues_id");
  $rowSubdivision = $resultSubdivision->fetch_assoc();


  $resultHomeowner = $con->query("SELECT * FROM homeowner_profile WHERE subdivision='" . $rowSubdivision['subdivision_name'] . "'");
  // $rowHomeowner = $resultHomeowner->fetch_assoc();
  // $firstName = $rowHomeowner['first_name'];
  // $lastName = $rowHomeowner['last_name'];
  // $fullName = $firstName . " " . $lastName;

  $homeownerList = array();
  if (mysqli_num_rows($resultHomeowner) >= 0) {
    while ($rowHomeowner = $resultHomeowner->fetch_assoc()) {
      $homeownerList[] = $rowHomeowner['homeowner_id'];
    }
  }


  $homeowner_id_array = [];
  foreach ($homeownerList as $HOlist) {
    $homeowner_id_array[] = $HOlist;
  }





  for ($x = $billingPeriod_id_from; $x <= $billingPeriod_id_to; $x++) {
    $i = 0;
    while ($i < count($homeowner_id_array)) {
      $resultFullname = $con->query("SELECT * FROM homeowner_profile WHERE homeowner_id = '$homeowner_id_array[$i]'");
      $rowFullname = $resultFullname->fetch_assoc();
      $first_name = $rowFullname['first_name'];
      $last_name = $rowFullname['last_name'];
      $fullname = $first_name . " " . $last_name;


      // $sql = "INSERT INTO bill_consumer (billingPeriod_id, homeowner_id, fullname, amount, status) VALUES ('$x', '$homeowner_id_array[$i]', '$fullname', '$AnnualAmount', 'UNPAID')";
      $sql = "INSERT INTO bill_consumer (billingPeriod_id, homeowner_id, fullname, amount, status) SELECT * FROM(SELECT '$x', '$homeowner_id_array[$i]', '$fullname', '$monthlyAmount', 'UNPAID') AS temp
      WHERE NOT EXISTS (SELECT billingPeriod_id, homeowner_id  FROM bill_consumer WHERE billingPeriod_id = '$x' AND homeowner_id = '$homeowner_id_array[$i]')";



      $result = mysqli_query($con, $sql);
      $i++;
    }
  }
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added monthly dues to all homeowners', NOW())";
  mysqli_query($con, $sqlAudit);
}
//annual
if (isset($_POST['billAnnual'])) {
  $subdivisionAnnual_id = $_POST['subdivision-annual'];
  $billingPeriod_id_from = $_POST['month_select_annual_from'];
  $billingPeriod_id_to = $_POST['month_select_annual_to'];
  $AnnualAmount = $_POST['AnnualAmount'];

  $resultSubdivision = $con->query("SELECT * FROM monthly_dues WHERE monthly_dues_id=$subdivisionAnnual_id");
  $rowSubdivision = $resultSubdivision->fetch_assoc();


  $resultHomeowner = $con->query("SELECT * FROM homeowner_profile WHERE subdivision='" . $rowSubdivision['subdivision_name'] . "'");
  // $rowHomeowner = $resultHomeowner->fetch_assoc();
  // $firstName = $rowHomeowner['first_name'];
  // $lastName = $rowHomeowner['last_name'];
  // $fullName = $firstName . " " . $lastName;

  $homeownerList = array();
  if (mysqli_num_rows($resultHomeowner) >= 0) {
    while ($rowHomeowner = $resultHomeowner->fetch_assoc()) {
      $homeownerList[] = $rowHomeowner['homeowner_id'];
    }
  }


  $homeowner_id_array = [];
  foreach ($homeownerList as $HOlist) {
    $homeowner_id_array[] = $HOlist;
  }





  for ($x = $billingPeriod_id_from; $x <= $billingPeriod_id_to; $x++) {
    $i = 0;
    while ($i < count($homeowner_id_array)) {
      $resultFullname = $con->query("SELECT * FROM homeowner_profile WHERE homeowner_id = '$homeowner_id_array[$i]'");
      $rowFullname = $resultFullname->fetch_assoc();
      $first_name = $rowFullname['first_name'];
      $last_name = $rowFullname['last_name'];
      $fullname = $first_name . " " . $last_name;


      // $sql = "INSERT INTO bill_consumer (billingPeriod_id, homeowner_id, fullname, amount, status) VALUES ('$x', '$homeowner_id_array[$i]', '$fullname', '$AnnualAmount', 'UNPAID')";
      $sql = "INSERT INTO bill_consumer (billingPeriod_id, homeowner_id, fullname, amount, status) SELECT * FROM(SELECT '$x', '$homeowner_id_array[$i]', '$fullname', '$AnnualAmount', 'UNPAID') AS temp
      WHERE NOT EXISTS (SELECT billingPeriod_id, homeowner_id  FROM bill_consumer WHERE billingPeriod_id = '$x' AND homeowner_id = '$homeowner_id_array[$i]')";



      $result = mysqli_query($con, $sql);
      $i++;
    }
  }
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added annual dues to all homeowners', NOW())";
  mysqli_query($con, $sqlAudit);
}

//homeowner
if (isset($_POST['billHomeowner'])) {
  $homeowner_id = $_POST['homeowner'];
  // $homeowner = $_POST['homeowner'];
  $subdivision = $_POST['subdivision'];
  $month_select_monthly_dues_from = $_POST['month_select_monthly_dues_from'];
  $month_select_monthly_dues_to = $_POST['month_select_monthly_dues_to'];
  $homeownerAmount = $_POST['homeownerAmount'];

  // $resultHomeowner = $con->query("SELECT * FROM homeowner_profile WHERE homeowner_id='$homeowner_id'");
  $resultFullname = $con->query("SELECT *, CONCAT(first_name, ' ', last_name)  AS fullname FROM `homeowner_profile` WHERE `homeowner_id` ='$homeowner_id' ");
  $rowFullname = $resultFullname->fetch_assoc();
  $fullname = $rowFullname['fullname'];


  // while ($rowHomeowner = $resultHomeowner->fetch_assoc()) {
  //   $homeowner_id = $rowHomeowner['homeowner_id'];


  for ($x = $month_select_monthly_dues_from; $x <= $month_select_monthly_dues_to; $x++) {
    $sql = "INSERT INTO bill_consumer (billingPeriod_id, homeowner_id, fullname, amount, status) VALUES ('$x', '$homeowner_id', '$fullname', '$homeownerAmount', 'UNPAID')";
    $result = mysqli_query($con, $sql);
  }
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added monthly dues to homeowner', NOW())";
  mysqli_query($con, $sqlAudit);
}

// ADMIN MANUAL ARCHIVE POST BUTTON
if (isset($_GET['post_archive'])) {
  $post_id = $_GET['post_archive'];

  $sql = "UPDATE post SET post_status='Archived' WHERE post_id = '$post_id'";
  $result = mysqli_query($con, $sql);
  header("Location: ./modules/blogHome.php");
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Archived a post', NOW())";
  mysqli_query($con, $sqlAudit);
}

// CHANGE PASSWORD HOMEOWNER PROFILE
if (isset($_POST['editPassword'])) {
  $oldPassword = $_POST['oldPassword'];
  $newPassword = $_POST['newPassword'];
  $confirmPassword = $_POST['confirmPassword'];

  $sql = "SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "' ";
  $result = mysqli_query($con, $sql);
  $row = $result->fetch_assoc();

  if ($oldPassword != $row['password']) {
    echo "<div class='messageSuccess'>
        <label >
          Old password do not match!
        </label>
      </div>";
  } else if ($newPassword != $confirmPassword) {
    echo "<div class='messageSuccess'>
        <label >
          New and Confirm password do not match!
        </label>
      </div>";
  } else {
    $sql1 = "UPDATE user SET password='" . $newPassword . "' WHERE user_id = '" . $_SESSION['user_id'] . "'";
    $result1 = mysqli_query($con, $sql1);
    $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Updated their password', NOW())";
    mysqli_query($con, $sqlAudit);
    echo "<div class='messageSuccess'>
        <label >
          Password changes saved!
        </label>
      </div>";
  }
}

// AMENITY RESERVATION APPROVAL
if (isset($_POST['approveReservation'])) {
  $transaction_id = $_POST['transaction_id'];

  $sql = "UPDATE transaction, amenity_renting SET transaction.status = 'Approved', amenity_renting.cart = 'Approved', transaction.datetime = NOW() WHERE transaction.transaction_id= '$transaction_id' AND amenity_renting.transaction_id = '$transaction_id'";
  $result = mysqli_query($con, $sql);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Approved a reservation', NOW())";
  mysqli_query($con, $sqlAudit);
}

// VEHICLE STICKER TRANSACTION APPROVAL
if (isset($_POST['approveVehicleSticker'])) {
  $transaction_id = $_POST['transaction_id'];

  $sql = "UPDATE transaction SET status = 'Paid', datetime = NOW() WHERE transaction_id= '$transaction_id'";
  $result = mysqli_query($con, $sql);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Approved a vehicle sticker transaction', NOW())";
  mysqli_query($con, $sqlAudit);
}

// VEHICLE MONITORING
if (isset($_POST['incoming'])) {
  $vehicle_registration = $_POST['vehicle_registration'];
  $vehicle_type = $_POST['vehicle_type'];
  $vehicle_color = $_POST['vehicle_color'];
  $sql = "INSERT INTO vehicle_monitoring (vehicle_registration, vehicle_type, vehicle_color, datetime, status) VALUES ('$vehicle_registration', '$vehicle_type', '$vehicle_color', NOW(), 'INCOMING')";
  $result = mysqli_query($con, $sql);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Set a vehicle to incoming', NOW())";
  mysqli_query($con, $sqlAudit);
}

if (isset($_POST['outgoing'])) {
  $vehicle_registration = $_POST['vehicle_registration'];
  $sql = "INSERT INTO vehicle_monitoring (vehicle_registration, datetime, status) VALUES ('$vehicle_registration', NOW(), 'OUTGOING')";
  $result = mysqli_query($con, $sql);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Set a vehicle to outgoing', NOW())";
  mysqli_query($con, $sqlAudit);
}

// REMOVE VEHICLE
if (isset($_POST['removeVehicle'])) {
  $vehicle_monitoring_id = $_POST['vehicle_monitoring_id'];

  $sql = "DELETE FROM vehicle_monitoring WHERE vehicle_monitoring_id = '$vehicle_monitoring_id' ";
  $result = mysqli_query($con, $sql);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Removed a vehicle in monitoring', NOW())";
  mysqli_query($con, $sqlAudit);
}

// MONTHLY DUES PAYMENT CHECKOUT

if (isset($_POST['checkoutMonthlyDues'])) {
  $targetDir = '../media/paymentProof/';
  $fileName = '' . $_FILES['image']['name'];
  $targetFilePath = $targetDir . $fileName;

  $resultID = $con->query("SELECT MAX(transaction_id) AS max FROM transaction");
  $rowID = $resultID->fetch_assoc();
  $max = $rowID['max'];

  $resultUserID = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
  $rowUserID = $resultUserID->fetch_assoc();
  $homeowner_id = $rowUserID['user_homeowner_id'];

  $total_cost = 0;
  if (copy($_FILES['image']['tmp_name'], $targetFilePath)) {
    if (isset($_POST['checkbox'])) {
      foreach ($_POST['checkbox'] as $billConsumer_id) {

        $sql = "UPDATE bill_consumer SET status='PENDING', transaction_id = $max + 1, datetime_paid = NOW() WHERE billConsumer_id = '$billConsumer_id'";
        $result = mysqli_query($con, $sql);

        $resultSumTotal = $con->query("SELECT amount FROM bill_consumer WHERE billConsumer_id = '$billConsumer_id'");
        $rowSumTotal = $resultSumTotal->fetch_assoc();

        $total_cost += $rowSumTotal['amount'];
      }
    }

    $sql1 = "INSERT INTO transaction (user_id, name, total_cost, payment_proof, transaction_type, status) VALUES('" . $rowUserID['user_id'] . "', '" . $rowUserID['full_name'] . "', '$total_cost', '$fileName', 'Monthly Dues', 'Pending')";
    $result1 = mysqli_query($con, $sql1);
    $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Paid their monthly dues', NOW())";
    mysqli_query($con, $sqlAudit);
  }
}

// MONTHLY DUES PAYMENT APPROVAL

if (isset($_POST['approveMonthlyDuesPayment'])) {
  $transaction_id = $_POST['transaction_id'];

  $sql = "UPDATE transaction, bill_consumer SET transaction.status = 'Paid', bill_consumer.status = 'PAID', transaction.datetime = NOW() WHERE transaction.transaction_id= '$transaction_id' AND bill_consumer.transaction_id = '$transaction_id'";
  $result = mysqli_query($con, $sql);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Approved a monthly dues payment', NOW())";
  mysqli_query($con, $sqlAudit);
}

//TREASURER MONTHLY DUES PAID
if (isset($_POST['payDues'])) {
  $resultID = $con->query("SELECT MAX(transaction_id) AS max FROM transaction");
  $rowID = $resultID->fetch_assoc();
  $max = $rowID['max'];

  $resultUserID = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
  $rowUserID = $resultUserID->fetch_assoc();
  $homeowner_id = $rowUserID['user_homeowner_id'];

  $total_cost = 0;
  if (isset($_POST['checkbox'])) {
    foreach ($_POST['checkbox'] as $billConsumer_id) {

      $sql = "UPDATE bill_consumer SET status='PAID', datetime_paid = NOW(), transaction_id = $max + 1 WHERE billConsumer_id = '$billConsumer_id'";
      $result = mysqli_query($con, $sql);

      $resultSumTotal = $con->query("SELECT amount FROM bill_consumer WHERE billConsumer_id = '$billConsumer_id'");
      $rowSumTotal = $resultSumTotal->fetch_assoc();
      $total_cost += $rowSumTotal['amount'];
    }

    $sql1 = "INSERT INTO transaction (user_id, name, total_cost, payment_proof, transaction_type, status, datetime) VALUES('" . $rowUserID['user_id'] . "', '" . $rowUserID['full_name'] . "', '$total_cost', NULL, 'Monthly Dues', 'Paid', NOW())";
    $result1 = mysqli_query($con, $sql1);
    $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Set a monthly dues transaction to paid', NOW())";
    mysqli_query($con, $sqlAudit);
  }
}

// REGISTRATION OF TENANTS

if (isset($_POST['tenant_submit'])) {
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $suffix = $_POST['suffix'];
  $mobile_number = $_POST['mobile_number'];
  $birthdate = strtotime($_POST['birthdate']);
  $birthdate = date('Y-m-d', $birthdate);
  $sex = $_POST['sex'];
  $email_address = $_POST['email_address'];
  $subdivision = $_SESSION['subdivision'];

  $resultSession = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
  $row = $resultSession->fetch_assoc();
  $homeowner_id = $row['user_homeowner_id'];


  $sql = "INSERT INTO tenant(homeowner_id, first_name, middle_name, last_name, subdivision, birthdate, sex, email, mobile_no, display_picture) VALUES ('$homeowner_id', '$first_name', '$middle_name', '$last_name', '$subdivision', '$birthdate', '$sex', '$email_address', '$mobile_number', 'default.png')";
  $result = mysqli_query($con, $sql);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Added a tenant', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: tenantHomeowner.php");
}

// TOTAL COST STICKER
if (isset($_POST['quantity'])) {
  $quantity = $_POST['quantity'];

  $result = $con->query("SELECT * FROM sticker WHERE subdivision = '" . $_SESSION['subdivision'] . "'");
  $row = $result->fetch_assoc();
  $cost = $row['cost'];
  $total = $quantity * $cost;

  if (mysqli_num_rows($result) > 0) {
    echo '<script type="text/javascript">
  document.getElementById("cost").setAttribute("value",' . $total . ');
</script>';
  }
}

if (isset($_POST['subdivisionSticker'])) {
  $subdivision = $_POST['subdivisionSticker'];
  $_SESSION['subdivisionVehicle'] = $subdivision;
}

if (isset($_POST['quantity1'])) {
  $quantity = $_POST['quantity1'];
  $result = $con->query("SELECT * FROM sticker WHERE subdivision = '" . $_SESSION['subdivisionVehicle'] . "'");
  $row = $result->fetch_assoc();
  $cost = $row['cost'];
  $total = $quantity * $cost;

  if (mysqli_num_rows($result) > 0) {
    echo '<script tgype="text/javascript">
  document.getElementById("cost1").setAttribute("value",' . $total . ');
</script>';
  }
}


// BUYING VEHICLE STICKER
if (isset($_POST['stickerVehicle'])) {
  $resultUserID = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
  $rowUserID = $resultUserID->fetch_assoc();

  $quantity = $_POST['quantity'];
  $total_cost = $_POST['total_cost'];

  $targetDir = '../media/paymentProof/';
  $fileName = '' . $_FILES['image1']['name'];
  $targetFilePath = $targetDir . $fileName;

  if (copy($_FILES['image1']['tmp_name'], $targetFilePath)) {
    $sql1 = "INSERT INTO transaction (user_id, name, total_cost, quantity, payment_proof, transaction_type, status) VALUES('" . $rowUserID['user_id'] . "', '" . $rowUserID['full_name'] . "', '$total_cost', '$quantity', '$fileName', 'Vehicle Sticker', 'Pending')";
    $result1 = mysqli_query($con, $sql1);
    $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Bought a vehicle sticker', NOW())";
    mysqli_query($con, $sqlAudit);
  }
}

if (isset($_POST['stickerVehicleAdmin'])) {
  $resultUserID = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
  $rowUserID = $resultUserID->fetch_assoc();

  $quantity1 = $_POST['quantity1'];
  $total_cost = $_POST['total_cost1'];

  $sql1 = "INSERT INTO transaction (user_id, name, total_cost, quantity, payment_proof, transaction_type, status, datetime) VALUES('" . $rowUserID['user_id'] . "', '" . $rowUserID['full_name'] . "', '$total_cost', '$quantity', NULL, 'Vehicle Sticker', 'Paid', NOW())";
  $result1 = mysqli_query($con, $sql1);
  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Bought a vehicle sticker', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: vehicleSticker.php");
}

// CREATE SESSION FOR GUEST IN AMENITY
if (isset($_POST['sessionName'])) {
  $_SESSION['guestName'] = $_POST['guestName'];
  $_SESSION['user_type'] = 'Guest';

  header("Location: ./modules/amenitiesGuest.php");
}



if (isset($_GET['tenant_id'])) {
  $update = true;
  $tenant_id = $_GET['tenant_id'];

  $result = $con->query("SELECT * FROM tenant WHERE tenant_id = '$tenant_id'");
  if ($result->num_rows) {
    $row = $result->fetch_array();
    $first_name = $row['first_name'];
    $middle_name = $row['middle_name'];
    $last_name = $row['last_name'];
    $subdivision_name = $row['subdivision'];
    $birthdate = $row['birthdate'];
    $sex = $row['sex'];
    $email_address = $row['email'];
    $mobile_number = $row['mobile_no'];
    // $suffix = $row['suffix'];
    // $street = $row['street'];
    // $lot = substr($street, 4, 1);
    // $block = substr($street, 12, 1);

    // $resultLot = $con->query("SELECT * FROM lot INNER JOIN block ON lot.block_id = block.block_id WHERE block.block = '$block' AND lot.lot = '$lot'") or die($mysqli->error);
    // $rowLot = $resultLot->fetch_assoc();
    // $lot_id = $rowLot['lot_id'];
    // $block_id = $rowLot['block_id'];

    // $subdivision_name = $row['subdivision'];
    // $resultSubdivision = $con->query("SELECT * FROM subdivision WHERE subdivision_name = '$subdivision_name'");
    // $rowSubdivision = $resultSubdivision->fetch_assoc();
    // $subdivision_id = $rowSubdivision['subdivision_id'];

    // $business_address = $row['business_address'];
    // $occupation = $row['occupation'];
    // $employer = $row['employer'];
    // $birthdate = $row['birthdate'];
    // $sex = $row['sex'];
    // $email_address = $row['email_address'];
    // $mobile_number = $row['mobile_number'];
    // $vehicle_registration = $row['vehicle_registration'];
  }
}
if (isset($_POST['tenant_update'])) {
  $tenant_id = $_POST['tenant_id'];
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];


  $mobile_number = $_POST['mobile_number'];

  $birthdate = strtotime($_POST['birthdate']);
  $birthdate = date('Y-m-d', $birthdate);
  $sex = $_POST['sex'];
  $email_address = $_POST['email_address'];
  $full_name = $first_name . ' ' . $last_name;



  $sql = "UPDATE homeowner_profile SET first_name =  '$first_name', middle_name = '$middle_name', last_name = '$last_name', sex = '$sex', subdivision = '$subdivision_name', barangay = '$barangay', email_address = '$email_address', birthdate = '$birthdate', mobile_number = '$mobile_number' WHERE tenant_id = '$tenant_id'";
  $result = mysqli_query($con, $sql);
  // $sql2 = "UPDATE user SET full_name = '$full_name', email_address = '$email_address' WHERE user_homeowner_id = '$homeowner_id'";
  // $result2 = mysqli_query($con, $sql2);

  $sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Update a tenant profile', NOW())";
  mysqli_query($con, $sqlAudit);
  header("Location: homeownerRegistration.php");
}
