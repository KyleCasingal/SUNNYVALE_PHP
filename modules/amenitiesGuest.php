<?php
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
$result = $con->query("SELECT * FROM amenities WHERE availability =  'Available' ORDER BY subdivision_name ASC") or die($mysqli->error);
$resultReservation = $con->query("SELECT * FROM facility_renting WHERE date(date_from)=curdate()");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    background-color: rgba(234, 232, 199, 0.2);
    font-family: 'Poppins', sans-serif;
  }

  .paymentForm {
    display: flex;
    padding: 2vw;
    margin: 1.5vw;
    width: 40%;
    border-radius: 1vw;
    flex-direction: column;
    background-color: rgba(234, 232, 199, 0.2);
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
  .table{
    margin: 2vw;
    width: 90%;
  }
  thead{
    background-color: rgba(234, 232, 199, 0.2);
  }
  td, th{
    text-align: center;
  }

  .upload:hover {
    background-color: rgb(253, 200, 86);
  }
</style>

<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<body>
  <div class="topbar">
    <?php include '../marginals/topbarGuest.php'; ?>
  </div>
  <form method="post" enctype="multipart/form-data">

    <div class='amenities'>
      <div class="amenitiesForm">
        <label>Name</label>
        <input type="text" name="full_name" value="<?php echo $_POST['full_name'] ?? '' ?>" id="name" required />
        <div class="timeinput">
          <label>Time</label>
          <select name="hrFrom" id="" required>
            <option value="">hr</option>
            <?php
            for ($x = 1; $x <= 12; $x++) {
              $x = sprintf("%02d", $x);
              echo "<option value='$x'";
              if (isset($_POST['compute'])) {
                if ($_POST['hrFrom'] == $x) echo "selected='selected'";
              }
              echo ">  $x ";
            }
            ?>
          </select>
          <select name="minsFrom" id="" required>
            <option value="">mins</option>
            <?php
            for ($x = 0; $x <= 55; $x = $x + 5) {
              $x = sprintf("%02d", $x);
              echo "<option value='$x'";
              if (isset($_POST['compute'])) {
                if ($_POST['minsFrom'] == $x) echo "selected='selected'";
              }
              echo ">  $x ";
            }
            ?>
          </select>
          <select name="ampmFrom" id="" required>
            <option value="">am/pm</option>
            <option value="am" <?php
                                if (isset($_POST['compute'])) {
                                  if ($_POST['ampmFrom'] == "am") echo 'selected="selected"';
                                }
                                ?>>am</option>
            <option value="pm" <?php
                                if (isset($_POST['compute'])) {
                                  if ($_POST['ampmFrom'] == "pm") echo 'selected="selected"';
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
                if ($_POST['hrTo'] == $x) echo "selected='selected'";
              }
              echo ">  $x ";
            }
            ?>
          </select>
          </option>
          </select>
          <select name="minsTo" id="" required>
            <option value="">mins</option>
            <?php
            for ($x = 0; $x <= 55; $x = $x + 05) {
              $x = sprintf("%02d", $x);
              echo "<option value='$x'";
              if (isset($_POST['compute'])) {
                if ($_POST['minsTo'] == $x) echo "selected='selected'";
              }
              echo ">  $x ";
            }
            ?>
          </select>
          <select name="ampmTo" id="" required>
            <option value="">am/pm</option>
            <option value="am" <?php
                                if (isset($_POST['compute'])) {
                                  if ($_POST['ampmTo'] == "am") echo 'selected="selected"';
                                }
                                ?>>am</option>
            <option value="pm" <?php
                                if (isset($_POST['compute'])) {
                                  if ($_POST['ampmTo'] == "pm") echo 'selected="selected"';
                                }
                                ?>>pm</option>
          </select>
          <label>6:00am to 9:00pm only</label>
        </div>
        <label>Date</label>
        <input required type="date" name="date" <?php
                                                if (isset($_POST['compute'])) {
                                                  $date = $_POST['date'];
                                                  echo "value = '$date'";
                                                }
                                                $date = date('Y-m-d', strtotime('today'));
                                                echo "min='$date'"
                                                ?>>
        <label>Amenity</label>
        <select name="amenity" id="" required>
          <option value="">Select...</option>
          <?php
          while ($row = $result->fetch_assoc()) :
            $price =  $row['price']
          ?>
            <option <?php
                    if (isset($_POST['compute'])) {
                      $amenity = $_POST['amenity'];
                      if ($amenity == $row['amenity_name']) {
                        echo 'selected="selected"';
                      }
                    }
                    ?>>
              <?php echo $row['amenity_name'] ?>
            </option>
          <?php endwhile; ?>
        </select>
        <label>Amount</label>
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
                                                              $timeFrom = to_24_hour($_POST['hrFrom'], $_POST['minsFrom'], $_POST['ampmFrom']);
                                                              $timeTo = to_24_hour($_POST['hrTo'], $_POST['minsTo'], $_POST['ampmTo']);
                                                              $timeFrom = strtotime($timeFrom);
                                                              $timeTo = strtotime($timeTo);
                                                              $difference = ($timeTo - $timeFrom);
                                                              $totalHrs = ($difference / 3600);
                                                              $totalHrs = number_format((float)$totalHrs, 2, '.', '');
                                                              $res = $con->query("SELECT * FROM amenities WHERE amenity_name = '$amenity'") or die($mysqli->error);
                                                              $row = $res->fetch_assoc();
                                                              $cost = $totalHrs * $row['price'];

                                                              if ($cost < 0) {
                                                                echo "value = ''";
                                                              } else if ($_POST['ampmFrom'] == 'am' and $_POST['hrFrom'] < 6) {
                                                                echo "value = ''";
                                                              } else if ($_POST['ampmTo'] == 'pm' and $_POST['hrTo'] > 8) {
                                                                echo "value = ''";
                                                              } else {
                                                                echo "value = '$cost'";
                                                              }
                                                            }
                                                            ?> required />
        <br>
        <button name="compute" class="btnCompute">Compute</button>
        <button class="btnSubmit" name="submitReservation" id="submitPost">Submit Reservation</button>
      </div>
      <div class="paymentForm">
        <label class="writeText">Upload proof of payment here:</label>
        <div class="BlogWrite">
          <input class="attInput" name="image" type="file" id="image" accept="image/*" onchange="preview()"></input>
          <img class="imagePrev" id="imagePreview" src=# alt="" />
        </div>
        <label for="image" class="upload">Upload Photo</label>
      </div>
    </div>
    <table class="table table-hover">
      <thead>
        <th>Amenity</th>
        <th>Renter</th>
        <th>From</th>
        <th>To</th>
        <th>Cost</th>
      </thead>
      <?php while ($row = $resultReservation->fetch_assoc()) : ?>
        <tr>
          <td><?php echo $row['renter_name'] ?></td>
          <td><?php echo $row['amenity_name'] ?></td>
          <td><?php echo $row['date_from'] ?></td>
          <td><?php echo $row['date_to'] ?></td>
          <td><?php echo $row['cost'] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </form>
  <?php
  require '../marginals/footer2.php';
  ?>
</body>

</html>
<!-- SCRIPTS -->
<script>
  function readURL(input, id) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#' + id).attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#image").change(function() {
    readURL(this, 'imagePreview');
  });
</script>