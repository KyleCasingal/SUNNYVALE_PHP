<?php
require '../marginals/topbar.php';
$result = $con->query("SELECT * FROM amenities WHERE availability =  'Available' ORDER BY subdivision_name ASC") or die($mysqli->error);
$resultSubdivision = $con->query("SELECT * FROM subdivision ORDER BY subdivision_id ASC");
$resultReservation = $con->query("SELECT * FROM facility_renting WHERE date_from BETWEEN NOW() AND NOW() + INTERVAL 1 DAY;");
$resultSubdivision_selectAmenities = $con->query("SELECT * FROM subdivision ") or die($mysqli->error);
$resultAmenities = $con->query("SELECT * FROM amenities") or die($mysqli->error);
//IMPORTANT DONT DELETE I DONT KNOW WHY WORK
$resultRes = $con->query("SELECT renter_name, subdivision_name, amenity_name, amenity_purpose, date_from, date_to, cost FROM amenity_renting WHERE user_id= ". $_SESSION['user_id']."");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap"
    rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <title>SUNNYVALE</title>
</head>
<style>
  * {
    margin: 0;
  }

  .messageSuccess {
    display: flex;
    padding: 1vw;
    justify-content: space-between;
    font-family: 'Poppins', sans-serif;
    font-size: 1.5vw;
    background-color: darkseagreen;
    color: white;
  }

  .messageFail {
    display: flex;
    padding: 1vw;
    justify-content: space-between;
    font-family: 'Poppins', sans-serif;
    font-size: 1.5vw;
    background-color: lightcoral;
    color: white;
  }

  input {
    padding: 0.5vw;
    max-width: 50vw;
    height: 2vw;
    font-size: 1.2vw;
    border: 0;
    border-radius: 0.8vw;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 1vw;
  }

  select {
    max-width: 50vw;
    height: 2vw;
    font-size: 1.2vw;
    border: 0;
    border-radius: 0.8vw;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 1vw;
  }

  input[type="file"] {
    display: none;
  }

  label {
    font-size: 2vw;
    padding: 0.5vw;
  }

  .form-check-label {
    font-size: 1.5em;

  }

  .form-check {
    display: flex;
    align-items: stretch;

  }

  .form-check-input {
    align-self: flex-end;
  }

  .amenities {
    display: flex;

  }

  .amenitiesForm {
    display: flex;
    justify-content: center;
    padding: 2vw;
    margin: 1.5vw;
    width: 60%;
    border-radius: 1vw;
    flex-direction: column;
    background-color: rgb(170, 192, 175, 0.3);
    font-family: 'Poppins', sans-serif;
  }

  .paymentForm {
    display: flex;
    padding: 2vw;
    margin: 1.5vw;
    width: 40%;
    border-radius: 1vw;
    flex-direction: column;
    background-color: rgb(170, 192, 175, 0.3);
    font-family: 'Poppins', sans-serif;
  }

  .imagePrev {
    max-width: 30vw;
    max-height: 20vw;
    margin-bottom: 1vw;
  }

  .btnSubmit {
    background-color: darkseagreen;
    border: 0;
    padding: 0.5vw;
    max-width: 50vw;
    width: 15vw;
    font-family: "Poppins", sans-serif;
    font-size: 1.5vw;
    margin-top: 2vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
  }

  .btnCompute {
    background-color: rgb(248, 186, 55);
    border: 0;
    padding: 0.5vw;
    max-width: 50vw;
    width: 15vw;
    font-family: "Poppins", sans-serif;
    font-size: 1.5vw;
    margin-top: 2vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
  }

  .btnCompute:hover {
    background-color: rgb(253, 200, 86);
  }

  .btnSubmit:hover {
    background-color: rgba(167, 197, 167);
  }

  .upload {
    text-align: center;
    background-color: rgb(248, 186, 55);
    border: 0;
    padding: 0.5vw;
    max-width: 50vw;
    width: 15vw;
    font-family: "Poppins", sans-serif;
    font-size: 1.5vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
    margin-bottom: 1vw;
  }

  .upload:hover {
    background-color: rgb(253, 200, 86);
  }

  .tblAmenity {
    width: 90%;
    margin-bottom: 2vw;
    overflow-x: auto;
    overflow-y: auto;
    text-align: center;
    margin: 2vw;
    margin-right: 2vw;
  }

  .tblAmenity thead,
  th {
    padding: 0.5vw;
    text-align: center;
    font-size: 1.2vw;
    background-color: rgb(170, 192, 175, 0.3);
    width: max-content;
    white-space: nowrap;
  }

  .tblAmenity td {
    width: max-content;
    white-space: nowrap;
  }

  .tblAmenity tr:hover {
    background-color: rgb(211, 211, 211);
  }
</style>
<script type="text/javascript">
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  // function readURL(input, id) {
  //   if (input.files && input.files[0]) {
  //     var reader = new FileReader();

  //     reader.onload = function(e) {
  //       $('#' + id).attr('src', e.target.result);
  //     }

  //     reader.readAsDataURL(input.files[0]);
  //   }
  // }

  $("#image").change(function () {
    readURL(this, 'imagePreview');
  });

  $(document).ready(function () {
    $("#amenity_id").on('click', function () {
      var amenity_id = $(this).val();
      if (amenity_id) {
        $.ajax({
          type: 'POST',
          url: '../process.php/',
          data: 'amenity_id=' + amenity_id,
          success: function (html) {
            $("#purpose_id").html(html);
          }
        });
      }
    });
  });

  $(document).ready(function () {
    $("#subdivision_id").on('click', function () {
      var subdivision_id = $(this).val();
      if (subdivision_id) {
        $.ajax({
          type: 'POST',
          url: '../process.php/',
          data: 'subdivision_id=' + subdivision_id,
          success: function (html) {
            $("#amenity_id").html(html);
          }
        });
      }
    });
  });
</script>

<body>
  <form method="post" enctype="multipart/form-data">

    <div class='amenities'>
      <div class="amenitiesForm">
        <label>Name</label>
        <input type="text" name="renter_name" id="name" value="<?php echo $row['full_name'] ?>" readonly />
        <!-- <label>Date</label>
        <input required type="date" name="date" <?php
        if (isset($_POST['compute'])) {
          $date = $_POST['date'];
          echo "value = '$date'";
        }
        $date = date('Y-m-d', strtotime('today'));
        echo "min='$date'"
          ?>>
        <div class="timeinput">
          <label>Time</label>
          <select name="hrFrom" id="" required>
            <option value="">hr</option>
            <?php
            for ($x = 1; $x <= 12; $x++) {
              $x = sprintf("%02d", $x);
              echo "<option value='$x'";
              if (isset($_POST['compute'])) {
                if ($_POST['hrFrom'] == $x)
                  echo "selected='selected'";
              }
              echo ">  $x ";
            }
            ?>
          </select>
          <select name="ampmFrom" id="" required>
            <option value="">am/pm</option>
            <option value="am" <?php
            if (isset($_POST['compute'])) {
              if ($_POST['ampmFrom'] == "am")
                echo 'selected="selected"';
            }
            ?>>am</option>
            <option value="pm" <?php
            if (isset($_POST['compute'])) {
              if ($_POST['ampmFrom'] == "pm")
                echo 'selected="selected"';
            }
            ?>>pm</option>
          </select>
          <label>To</label>
          <select name="hrTo" id="" required>
            <option value="">hr</option>
            <?php
            for ($x = 1; $x <= 12; $x++) {
              $x = sprintf("%02d", $x);
              echo "<option value='$x'";
              if (isset($_POST['compute'])) {
                if ($_POST['hrTo'] == $x)
                  echo "selected='selected'";
              }
              echo ">  $x ";
            }
            ?>
          </select>
          </option>
          <select name="ampmTo" id="" required>
            <option value="">am/pm</option>
            <option value="am" <?php
            if (isset($_POST['compute'])) {
              if ($_POST['ampmTo'] == "am")
                echo 'selected="selected"';
            }
            ?>>am</option>
            <option value="pm" <?php
            if (isset($_POST['compute'])) {
              if ($_POST['ampmTo'] == "pm")
                echo 'selected="selected"';
            }
            ?>>pm</option>
          </select>
        </div> -->
        <label>Subdivision</label>
        <select name="subdivision" id="subdivision_id" required>
          <option value="">Select...</option>
          <?php
          while ($rowSubdivision = $resultSubdivision->fetch_assoc()) {
            echo '<option value="' . $rowSubdivision['subdivision_id'] . '">' . $rowSubdivision['subdivision_name'] . '</option>';
          }
          ?>
        </select>
        <label>Amenity</label>
        <select name="amenity" id="amenity_id" required>
          <option value="">Select Subdivision first...</option>
        </select>
        <label>Purpose</label>
        <select name="purpose" id="purpose_id" required>
          <option value="">Select Amenity first...</option>
        </select>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked="">
          <label class="form-check-label" for="flexRadioDefault2">
            Day
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">
            Night
          </label>
        </div>

        <button class="btnSubmit" name="addToCart" id="">Add</button>
        <button type="button" class="btnSubmit" name="" id="" data-bs-toggle="modal"
          data-bs-target="#editProfile">Availed Services</button>
        <!-- <label>Amount</label>
        <input name="cost" type="text" id="price" readOnly <?php
        //AMOUNT COMPUTATION
        if (isset($_POST['compute'])) {
          function to_24_hour($hours, $minutes, $meridiem)
          {
            $hours = sprintf('%02d', (int) $hours);
            $minutes = sprintf('%02d', (int) $minutes);
            $meridiem = (strtolower($meridiem) == 'am') ? 'am' : 'pm';
            return date('H:i', strtotime("{$hours}:{$minutes} {$meridiem}"));
          }
          $timeFrom = to_24_hour($_POST['hrFrom'], 00, $_POST['ampmFrom']);
          $timeTo = to_24_hour($_POST['hrTo'], 00, $_POST['ampmTo']);
          $timeFrom = strtotime($timeFrom);
          $timeTo = strtotime($timeTo);
          $difference = ($timeTo - $timeFrom);
          $totalHrs = ($difference / 3600);
          $totalHrs = number_format((float) $totalHrs, 2, '.', '');
          $res = $con->query("SELECT * FROM amenities WHERE amenity_name = '$amenity'") or die($mysqli->error);
          $row = $res->fetch_assoc();
          $cost = $totalHrs * $row['price'];
          if ($cost < 0) {
            echo "value = ''";
          } else if ($_POST['ampmFrom'] == 'am' and $_POST['hrFrom'] < 6) {
            echo "value = ''";
          } else if ($_POST['ampmFrom'] == 'pm' and $_POST['hrFrom'] >= 9) {
            echo "value = ''";
          } else if ($_POST['ampmTo'] == 'pm' and $_POST['hrTo'] >= 9) {
            echo "value = ''";
          } else {
            echo "value = '$cost'";
          }
        }



        ?> />
        <br>
        <button name="compute" class="btnCompute">Compute</button>
        <button class="btnSubmit" name="submitReservation" id="submitPost">Submit Reservation</button> -->
      </div>
      <!-- <div class="paymentForm">
        <label class="writeText">Upload proof of payment here:</label>
        <div class="BlogWrite">
          <input class="attInput" name="image" type="file" id="image" accept="image/*" onchange="preview()"></input>
          <img class="imagePrev" id="imagePreview" src=# alt="" />
        </div>
        <label for="image" class="upload">Upload Photo</label>
      </div>
    </div> -->

      <div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Availed Services</h5>
              <button type="button" class="btn-close discardChanges" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="tblAmenity">
                <tr>
                  <th>Amenity</th>
                  <th>Subdivision</th>
                  <th>Renter</th>
                  <th>Purpose</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Cost</th>
                </tr>
                <?php while ($row = $resultRes->fetch_assoc()): ?>
                  <tr>
                    <td>
                      <?php echo $row['amenity_name'] ?>
                    </td>
                    <td>
                      <?php echo $row['subdivision_name'] ?>
                    </td>
                    <td>
                      <?php echo $row['renter_name'] ?>
                    </td>
                    
                    <td>
                      <?php echo $row['amenity_purpose'] ?>
                    </td>
                    <td>
                      <?php echo $row['date_from'] ?>
                    </td>
                    <td>
                      <?php echo $row['date_to'] ?>
                    </td>
                    <td>
                      <?php echo $row['cost'] ?>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </table>
            </div>
          </div>
        </div>
      </div>


  </form>
  <?php
  require '../marginals/footer2.php';
  ?>

</body>

</html>