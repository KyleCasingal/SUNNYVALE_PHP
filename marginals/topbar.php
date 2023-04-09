<?php
include "../process.php";
if (empty($_SESSION)) {
  header("Location: ../index.php");
  exit;
}
$result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$result1 = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row1 = $result1->fetch_assoc();
$homeowner_id_profile = $row1['user_homeowner_id'];
$user_type = $row1['user_type'];
$resultSubdivision = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$rowSubdivision = $resultSubdivision->fetch_assoc();
$subdivision_name1 = $rowSubdivision['subdivision'];
$resultComplainee = $con->query("SELECT * FROM homeowner_profile WHERE subdivision ='$subdivision_name1' AND homeowner_id != '$homeowner_id_profile' ORDER BY first_name");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#000000" />
  <link rel="stylesheet" href="../topbar/topBar.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script>

  </script>
  <title>SUNNYVALE</title>
</head>
<style>
  .topbarNav {
    display: flex;
    gap: 1vw;
    align-items: center;
  }

  .nav {
    margin-top: 0;
    margin-bottom: 0;
    padding: 0;
    width: 100%;
    height: 4.5vw;
    background-color: rgba(106, 153, 78);
    position: sticky;
    top: 0;
    display: flex;
    align-items: center;
    font-family: "Poppins", sans-serif;
    z-index: 999;
    backdrop-filter: blur(5px);
  }


  .topLeft {
    max-height: 4.5vw;
    margin-top: 0;
    flex: 3;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin-left: 1vw;
  }

  .topLeft img {
    max-height: 4vw;
  }

  .topRight {
    max-height: 4.5vw;
    flex: 3;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin-right: 1vw;
  }

  .topCenter {
    flex: 60;
  }

  .topIcon {
    font-size: 2vw;
    margin-right: 10px;
    color: white;
    font-family: "Poppins", sans-serif;
    font-style: normal;
    cursor: pointer;
  }

  .menu-trigger {
    display: flex;
    max-height: 4.5vw;
  }

  .topImg1 {
    max-height: 3vw;
    max-width: 3vw;
    width: 3vw;
    height: 3vw;
    border-radius: 50%;
    object-fit: cover;
    cursor: pointer;
  }

  .topList {
    display: flex;
    justify-content: flex-end;
    margin: 0;
    padding: 0;
    list-style: none;
    color: white;

  }

  .topListItem1 {

    color: white;
    padding: 0.5vw;
    margin-right: 0.1vw;
    font-size: 1.2vw;
    font-weight: 300;
    cursor: pointer;
  }

  .topListItem1:hover {
    color: black;
    cursor: pointer;
  }

  .topSearchIcon {
    font-size: 18px;
    color: white;
    cursor: pointer;
    margin-left: 15px;
  }

  .dropdown-menu1 {
    box-shadow: 0px 1px 10px gray;
    position: absolute;
    align-content: center;
    justify-content: center;
    top: 5vw;
    right: 2vw;
    background-color: rgba(255, 253, 245, 0.95);
    border-radius: var(--border-radius);
    padding: 1vw 1vw;
    width: 20vw;
  }

  .dropdown-menu1::before {
    content: '';
    position: absolute;
    top: -5vw;
    right: 2vw;
    height: 2vw;
    width: 2vw;
    background: var(--secondary-bg);
    transform: rotate(45deg);
  }

  .dropdown-menu1.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    transition: var(--speed) ease;
  }

  .dropdown-menu1.inactive {
    opacity: 0;
    visibility: hidden;
    transform: translateY(-20px);
    transition: var(--speed) ease;
  }


  .uName {
    width: 100%;
    text-align: center;
    font-size: 1.5vw;
    padding: 1vw 0;
    font-weight: 500;
    color: var(--primary-text-color);
    line-height: 1rem;
  }

  .uType {
    font-size: 1vw;
    color: var(--secondary-text-color);
    font-weight: 400;
  }

  .dropdown-menu1 ul li {
    padding-bottom: 0.1vw 0;


  }

  .dropdown-menu1 ul li:hover a {
    color: rgb(212, 33, 9);
    cursor: pointer;
  }

  .dropdown-menu1 ul li:hover img {
    opacity: 1;
    cursor: pointer;
  }

  .dropdownItem1 {
    display: flex;
    margin: 1vw 0;
  }

  .dropdownItem1 img {
    max-width: 2vw;
    max-height: 2vw;
    margin-right: 1vw;
    opacity: 0.5;
    transition: var(--speed);
  }

  .dropdownItem1 a {
    font-size: 1.2vw;
    max-width: 20vw;
    transition: var(--speed);
  }

  .dropdownIMG {
    background-color: rgb(89, 89, 89, 0);
    border: none !important;
  }

  .modalConcernBody {
    padding: 0;
  }


  .concernSubject {
    height: auto;
    display: flex;
    align-items: stretch;
    margin: 0;
    width: 100%;
    border-bottom: 1px solid rgb(228, 228, 228);
  }

  .concernSubject label {
    font-family: 'Poppins' sans-serif;
    margin-left: 1vw;
    font-size: 1vw;
  }

  .concernMessage {
    height: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
    width: 100%;
    border: 1px solid rgb(228, 228, 228);
  }

  .subjectText {
    height: 3vw;
    border: none;
    overflow: hidden;
    outline: none;
    margin-right: 1vw;
    font-size: 1vw;
    width: 100%;
  }

  .concernText {
    height: 10vw;
    border: none;
    overflow: hidden;
    margin: 0;
    outline: none;
    font-size: 1vw;
    width: 100%;
  }

  .concernBtn {
    padding: 0;
    padding-bottom: 0.5vw;
    margin-top: -1vw;
    margin-bottom: 0vw;
    border: none;
    border-bottom: 1px solid rgb(211, 211, 211);
    background-color: rgba(0, 0, 0, 0);
  }

  .messageSuccess label {
    margin-left: 2vw;
  }

  .messageSuccess {
    margin: 0;
    display: flex;
    justify-content: space-between;
    font-family: 'Poppins', sans-serif;
    font-size: 1.5vw;
    color: white;
    align-items: center;
    background-color: darkseagreen;
  }

  .okBtn {
    margin: 0;
    color: white;
    border-radius: 0.5vw;
    width: 5vw;
    height: 3vw;
    border: none;
    font-size: 1vw;
    font-family: 'Poppins', sans-serif;
    background-color: darkgreen;
  }

  .formBTN {
    margin: 1vw;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .modal-header,
  .modal-body,
  .modal-footer {
    background-color: rgb(170, 192, 175, 0.3);
  }
</style>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<body>
  <div class='nav'>
    <div class="topLeft">
      <img src="..\img\logoSV.png" alt="" />
      <i class="topIcon">SUNNYVALE</i>
    </div>
    <form class="topbarNav" method="post">
      <div class="topCenter">
        <ul class="topList">
          <li data-bs-toggle="modal" data-bs-target="#confirmLogout" onclick="location.href='#confirmLogout'" class="topListItem1">HOME</li>
          <?php
          if ($user_type != 'Guard') {
          ?>
            <li onclick="location.href='../modules/amenities.php'" class="topListItem1">AMENITIES</li>
            <li onclick="location.href='../modules/blogHome.php'" class="topListItem1"> BLOG</li>
          <?php
          }
          ?>
        </ul>
      </div>
      <div class="topRight">
        <div class='menu-trigger'>
          <div class="btn-group dropleft">
            <button type="button" class="dropdownIMG" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="topImg1" <?php
                                    $row = $result->fetch_assoc();
                                    $imageURL = '../media/displayPhotos/' . $row['display_picture'];
                                    ?> src="<?= $imageURL ?>" alt="" />
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../modules/memberPanel.php">
                <?php
                if ($row['user_type'] == 'Homeowner') {
                  echo 'Member Profile';
                } else {
                  echo 'Profile';
                }
                ?></a>
              <?php
              if ($row['user_type'] == 'Homeowner') {
                echo '<a class="dropdown-item" href="../modules/inboxPanel.php">Inbox</a>';
              }
              ?>
              <?php
              if ($row['user_type'] == 'Homeowner') {
                echo ' <a data-bs-toggle="modal" data-bs-target="#raiseConcern" class="dropdown-item" href="#raiseConcern">Submit a Complaint</a>';
              }
              ?>
              <?php
              if ($row['user_type'] == 'Admin') {
                echo '<a class="dropdown-item" href="../modules/accManagement.php">Admin Panel</a>';
              }
              if ($row['user_type'] == 'Treasurer') {
                echo '<a class="dropdown-item" href="../modules/treasurerPanel.php">Treasurer Panel</a>';
              }
              if ($row['user_type'] == 'Secretary') {
                echo '<a class="dropdown-item" href="../modules/accManagement.php">Secretary Panel</a>';
              }
              ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../logoutProcess.php">Log Out</a>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <form action="" method="post">
    <div class="modal fade" id="raiseConcern" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              Raise a Concern
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modalConcernBody">
            <div class="concernSubject">
              <label>Concern Address: </label>
              <select name="concern_address" id="" required>
                <option value="">Select...</option>
                <option value="0">Community</option>
                <?php
                while ($rowComplainee = $resultComplainee->fetch_assoc()) {
                  echo '<option value="' . $rowComplainee['homeowner_id'] . '">' . $rowComplainee['first_name'] . ' ' . $rowComplainee['last_name'] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="concernSubject">
              <label>Subject:</label>
              <textarea name="concern_subject" id="" cols="30" rows="10" class="subjectText" required></textarea>
            </div>
            <div class="concernMessage">
              <textarea name="concern_description" id="" cols="30" rows="10" class="concernText" placeholder="Explain briefly your concern..." maxLength={255} required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Close
            </button>

            <button type="submit" name="concernSubmit" class="btn btn-primary">
              Submit Concern
            </button>

          </div>
        </div>
      </div>
    </div>
  </form>
  <div class="modal fade" id="confirmLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Do you really want to log out?
        </div>
        <div class="modal-footer">
          <button type="button" onclick="location.href='../logoutProcess.php'" class="btn btn-primary">Log out</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>