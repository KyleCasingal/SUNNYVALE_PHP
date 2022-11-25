<?php
require '../marginals/topbar.php';
$result = $con->query("SELECT * FROM amenities") or die($mysqli->error);
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
  <title>SUNNYVALE</title>
</head>
<style>
  * {
    margin: 0;
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

  .btnSubmitPost {
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

  .btnSubmitPost:hover {
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
</style>


<body>
  <form action="amenities" method="post">

    <div class='amenities'>
      <div class="amenitiesForm">
        <label>Name</label>
        <input type="text" name="name" id="name" value="<?php echo $row['full_name'] ?>" readonly />
        <div class="timeinput">
          <label>Time</label>
          <select name="hrFrom" id="">
            <option value="">hr</option>
            <?php
            for ($x = 1; $x <= 12; $x++) {
              $x = sprintf("%02d", $x);
              echo "<option value='$x'> $x </option>";
            }
            ?>
          </select>
          <select name="minsFrom" id="">
            <option value="">mins</option>
            <?php
            for ($x = 0; $x <= 55; $x = $x + 5) {
              $x = sprintf("%02d", $x);
              echo "<option value='$x'> $x </option>";
            }
            ?>
          </select>
          <select name="ampmFrom" id="">
            <option value="">am/pm</option>
            <option value="am">am</option>
            <option value="pm">pm</option>
          </select>
          <label>To</label>
          <select name="hrTo" id="">
            <option value="">hr</option>
            <?php
            for ($x = 1; $x <= 12; $x++) {
              $x = sprintf("%02d", $x);
              echo "<option value='$x'> $x </option>";
            }
            ?>
          </select>
          <select name="minsTo" id="">
            <option value="">mins</option>
            <?php
            for ($x = 0; $x <= 55; $x = $x + 05) {
              $x = sprintf("%02d", $x);
              echo "<option value='$x'> $x </option>";
            }
            ?>
          </select>
          <select name="ampmTo" id="">
            <option value="">am/pm</option>
            <option value="am">am</option>
            <option value="pm">pm</option>
          </select>
          <label>6:00am to 9:00pm only</label>
        </div>
        <label>Date</label>
        <input type="date" name="date" />
        <label>Amenity</label>
        <select name="amenity" id="amenity">
          <option value="">Select...</option>
          <?php
          while ($row = $result->fetch_assoc()) :
            $price =  $row['price']
          ?>
            <option><?php echo $row['amenity_name'] ?></option>
          <?php endwhile; ?>
        </select>
        <label>Amount</label>
        <?php
        //COMPUTE AMOUNT AMENITY RESERVATION


        ?>
        <input type="text" id="price" readOnly <?php
                                                if (isset($_POST['compute'])) {
                                                  $amenity = $_POST['amenity'];
                                                  function to_24_hour($hours, $minutes, $meridiem)
                                                  {
                                                    $hours = sprintf('%02d', (int) $hours);
                                                    $minutes = sprintf('%02d', (int) $minutes);
                                                    $meridiem = (strtolower($meridiem) == 'am') ? 'am' : 'pm';
                                                    return date('H:i', strtotime("{$hours}:{$minutes} {$meridiem}"));
                                                  }

                                                  echo $name = $_POST['name'] . "\n";
                                                  if (empty($_POST['hrFrom']) or empty($_POST['minsFrom']) or empty($_POST['ampmFrom']) or empty($_POST['hrTo']) or empty($_POST['minsTo']) or empty($_POST['ampmTo'])) {
                                                    echo 'Please select a valid time! ';
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
                                                  $date = $_POST['date'];
                                                  echo "value = '$cost'";
                                                }
                                                ?> />
        <br>
        <button name="compute">Compute</button>
        <button class="btnSubmitPost" name="submitPost" id="submitPost">Submit Reservation</button>
      </div>
      <div class="paymentForm">
        <label class="writeText">Upload proof of payment here:</label>
        <div class="BlogWrite">
          <input class="attInput" type="file" id="image" accept="image/*" onChange={handleChange}></input>
          <img class="imagePrev" id="imagePreview" src={file} alt="" onError='this.style.display = "none"' />
        </div>
        <label for="image" class="upload">Upload Photo</label>
      </div>
    </div>
  </form>
  <?php
  require '../marginals/footer2.php';
  ?>
</body>

</html>