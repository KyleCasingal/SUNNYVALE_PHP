<?php
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
$resultAmenity = $con->query("SELECT * FROM facility_renting WHERE date_from BETWEEN NOW() AND NOW() + INTERVAL 1 DAY;");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <title>SUNNYVALE</title>
</head>
<style>
  * {
    margin: 0;
  }

  .treasurer {
    width: 100%;
    display: flex;
  }

  .facilityRenting {
    display: flex;
    justify-content: center;
    padding: 2vw;
    margin: 1.5vw;
    width: 70%;
    border-radius: 1vw;
    flex-direction: column;
    background-color: rgba(234, 232, 199, 0.2);
    font-family: "Newsreader", serif;
  }



  .treasurerPanel {
    flex: 8;
    width: 100%;
    overflow-y: scroll;
  }







  .table-responsive {
    font-size: max(1vw, min(10px));
    max-height: 500px;
    min-height: 20vw;
  }

  .table {
    margin-top: 1vw;
    margin-bottom: 2vw;
    overflow-y: scroll;
    align-items: center;
    justify-self: center;
    margin: 2vw;
    max-width: 95%;
  }

  .lblTable {
    font-size: 2vw;
    font-family: "Poppins", sans-serif;
    margin-left: 2vw;
    margin-bottom: -2vw;
    padding: 0;
    color: rgb(89, 89, 89);
    font-weight: 800;
  }

  thead {
    top: 0;
    position: sticky;
    text-align: center;
    background-color: rgb(251, 250, 244);
  }

  th,
  td {
    text-align: center;
    padding: 0.8vw;
    border: 1px solid lightgray;
  }

  .amenitiesForm {
    display: flex;
    justify-content: center;
    padding: 2vw;
    margin: 1.5vw;
    width: 95%;
    border-radius: 1vw;
    flex-direction: column;
    background-color: rgba(234, 232, 199, 0.2);
    font-family: 'Poppins', sans-serif;
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
</style>

<body>
  <?php require '../marginals/topbar.php'; ?>
  <div class="treasurer">
    <?php require '../marginals/sidebarTreasurerPanel.php'; ?>
    <div class="treasurerPanel">
      <div class="amenitiesForm">
        <label>Name</label>
        <input type="text" name="full_name" id="name" value="<?php echo $row['full_name'] ?>" readonly />
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
                                                              } else if ($_POST['ampmFrom'] == 'pm' and $_POST['hrFrom'] > 9 and $_POST['minsFrom'] > 1) {
                                                                echo "value = ''";
                                                              } else if ($_POST['ampmTo'] == 'pm' and $_POST['hrTo'] > 9 and $_POST['minsTo'] > 1) {
                                                                echo "value = ''";
                                                              } else {
                                                                echo "value = '$cost'";
                                                              }
                                                            }



                                                            ?> />
        <br>
        <button name="compute" class="btnCompute">Compute</button>
        <button class="btnSubmit" name="submitReservation" id="submitPost">Submit Reservation</button>
      </div>
      <div class="table-responsive">
        <label class="lblTable">Current Scheduled Amenities</label>
        <table class="table table-hover">
          <thead>
            <th>Amenity</th>
            <th>Renter</th>
            <th>Date/time from</th>
            <th>Date/time to</th>
            <th>cost</th>
          </thead>
          <?php while ($row = $resultAmenity->fetch_assoc()) : ?>
            <tr>
              <td><?php echo $row['amenity_name']; ?></td>
              <td><?php echo $row['renter_name']; ?></td>
              <td><?php echo $row['date_from']; ?></td>
              <td><?php echo $row['date_to']; ?></td>
              <td><?php echo $row['cost']; ?></td>
            </tr>
          <?php endwhile; ?>


        </table>
      </div>
    </div>
  </div>

  <?php
  require '../marginals/footer2.php'
  ?>
</body>

</html>