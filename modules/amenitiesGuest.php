<?php
require '../marginals/topbarGuest.php';
// if (empty($_SESSION)) {
//   header("Location: ./amenitiesGuest.php");
//   exit;
// }
// $con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
$result = $con->query("SELECT * FROM amenities WHERE availability =  'Available' ORDER BY subdivision_name ASC") or die($mysqli->error);
$resultSubdivision = $con->query("SELECT * FROM subdivision ORDER BY subdivision_id ASC");
$resultReservation = $con->query("SELECT * FROM facility_renting WHERE date(date_from)=curdate()");
$resultSubdivision_selectAmenities = $con->query("SELECT * FROM subdivision ") or die($mysqli->error);
$resultAmenities = $con->query("SELECT * FROM amenities") or die($mysqli->error);
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
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <!-- calendar -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
  <!-- JS for jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- JS for full calender -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  <!-- bootstrap css and js -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  
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

  .table {
    margin: 2vw;
    width: 90%;
  }

  thead {
    background-color: rgb(170, 192, 175, 0.3);
  }

  td,
  th {
    text-align: center;
  }

  .upload:hover {
    background-color: rgb(253, 200, 86);
  }

  
  .calendar-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 2vw;
    margin-top: 2vw;
  }

  .calendar {
    position: relative;
    width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: space-between;
    color: black;
    border-radius: 5px;
    background-color: #fff;
    /* max-width: 90%; */
  }




  /*left right modal*/
  .modal.left_modal {
    position: fixed;
    z-index: 99999;
  }

  .modal.left_modal .modal-dialog {
    /* position: fixed; */
    margin: auto;
    width: 90%;
    height: 90%;
    -webkit-transform: translate3d(0%, 0, 0);
    -ms-transform: translate3d(0%, 0, 0);
    -o-transform: translate3d(0%, 0, 0);
    transform: translate3d(0%, 0, 0);
  }

  .modal-dialog {
    /* max-width: 100%; */
    margin: 1.75rem auto;
  }

  @media (min-width: 576px) {
    .left_modal .modal-dialog {
      max-width: 100%;
    }

  }

  .modal.left_modal .modal-content {
    /*overflow-y: auto;
    overflow-x: hidden;*/
    height: 100vh !important;
  }

  .modal.left_modal .modal-body {
    padding: 15px 15px 30px;
  }

  /*.modal.left_modal  {
    pointer-events: none;
    background: transparent;
}*/

  .modal-backdrop {
    display: none;
  }

  /*Left*/
  .modal.left_modal.fade .modal-dialog {
    left: -50%;
    -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
    -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
    -o-transition: opacity 0.3s linear, left 0.3s ease-out;
    transition: opacity 0.3s linear, left 0.3s ease-out;
  }

  .modal.left_modal.fade.show .modal-dialog {
    left: 0;
    box-shadow: 0px 0px 19px rgba(0, 0, 0, .5);
  }


  /* ----- MODAL STYLE ----- */
  .modal-content {
    border-radius: 0;
    border: none;
  }

  .modal-header.left_modal {

    padding: 10px 15px;
    border-bottom-color:
      #EEEEEE;
    background-color:
      #FAFAFA;
  }

  .modal_outer .modal-body {
    /*height:90%;*/
    /* overflow-y: auto; */
    overflow-x: hidden;
    height: 91vh;
  }



  .fab-wrapper {
    position: fixed;
    bottom: 3rem;
    right: 3rem;
  }

  .fab {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    bottom: -1rem;
    right: -1rem;
    width: 4vw;
    height: 4vw;
    border-radius: 50%;
    transition: all 0.3s ease;
    z-index: 1;
    background-color: rgb(248, 186, 55);
    box-shadow: 5px 10px 8px #888888;
  }

  .calendar {
    background-color: rgb(170, 192, 175, 0);
  }

  .fc-clear {
    background-color: rgb(170, 192, 175, 0.3);
  }

  .fc-toolbar {
    background-color: rgb(170, 192, 175, 0.3);
  }
</style>

<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  $(document).ready(function() {
    $("#subdivision_id").on('click', function() {
      var subdivision_id = $(this).val();
      if (subdivision_id) {
        $.ajax({
          type: 'POST',
          url: '../process.php/',
          data: 'subdivision_id=' + subdivision_id,
          success: function(html) {
            $("#amenity_id").html(html);
          }
        });
      }
    });
  });

  $(document).ready(function() {
    $("#subdivision_id").on('click', function() {
      var subdivision_id = $(this).val();
      if (subdivision_id) {
        $.ajax({
          type: 'POST',
          url: '../process.php/',
          data: 'subdivision_id=' + subdivision_id,
          success: function(html) {
            $("#purpose_id").html(html);
          }
        });
      }
    });
  });

  $(document).ready(function() {
    $("#amenity_id").on('click', function() {
      var amenity_id = $(this).val();
      if (amenity_id) {
        $.ajax({
          type: 'POST',
          url: '../process.php/',
          data: 'amenity_id=' + amenity_id,
          success: function(html) {
            $("#purpose_id").html(html);
          }
        });
      }
    });
  });

  $(document).ready(function() {
    $("#purpose_id").on('click', function() {
      var purpose_id = $(this).val();
      if (purpose_id) {
        $.ajax({
          type: 'POST',
          url: '../process.php/',
          data: 'purpose_id=' + purpose_id,
          success: function(html) {
            $("#day_id").html(html);
            $("#night_id").html(html);
          }
        });
      }
    });
  });
</script>

<body>

  </div>
  <form method="post" enctype="multipart/form-data">

  <div class="fab-wrapper">
      <label class="fab" for="showcalendarmodal">
        <center>
          <i style="font-size:2vw" class="fa fa-calendar" id="showcalendarmodal"></i>
        </center>
      </label>
    </div>

    <div class="modal modal_outer left_modal fade" id="calendarmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
        <div class="modal-content ">
          <div class="modal-header">
            <button type="button" class="close" id="modalclose" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body get_quote_view_modal_body">
            <div class="calendar-container">
              <div id="calendar" class="calendar"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

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



        <label>Subdivision</label>
            <select name="subdivision" id="subdivision_id" required>
              <option value="0" selected="selected">Select...</option>
              <?php
              while ($rowSubdivision = $resultSubdivision->fetch_assoc()) {
                echo '<option value="' . $rowSubdivision['subdivision_id'] . '">' . $rowSubdivision['subdivision_name'] . '</option>';
              }
              ?>
            </select>
            <label>Amenity</label>
            <select name="amenity" id="amenity_id" required>
              <option value="0">Select Subdivision first...</option>
            </select>
            <label>Purpose</label>
            <select name="purpose" id="purpose_id" required>
              <option value="0">Select Amenity first...</option>
            </select>
            <label>Rate per Hour</label>
            <div>
              <label>Day</label>
              <input type="text" id="day_id" size="6" readonly>
              <label>Night</label>
              <input type="text" id="night_id" size="6" readonly>
              <label>Night rate starts at 6pm</label>
            </div>

        
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
                                                              } else if ($_POST['ampmFrom'] == 'pm' and $_POST['hrFrom'] >= 9 and $_POST['minsFrom'] >=0) {
                                                                echo "value = ''";
                                                              } else if ($_POST['ampmTo'] == 'pm' and $_POST['hrTo'] >=9 and $_POST['minsTo'] >=1) {
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
      <!-- <div class="timeinput">
                <label>Time</label>
                <select name="hrFrom" id="from1" required>
                  <option value="">hr</option>
                  <?php
                  for ($x = 1; $x <= 12; $x++) {
                    $x = sprintf("%02d", $x);
                    echo "<option value='$x'>$x";
                  }
                  ?>
                </select>
                <select name="minsFrom" id="from3" required>
                  <option value="">mins</option>
                  <?php
                  for ($x = 0; $x <= 59; $x++) {
                    $x = sprintf("%02d", $x);
                    echo "<option value='$x'>$x";
                  }
                  ?>
                </select>
                <select name="ampmFrom" id="from2" required>
                  <option value="">am/pm</option>
                  <option value="am">am</option>
                  <option value="pm">pm</option>
                </select>
                <label>To</label>
                <select name="hrTo" id="to1" required>
                  <option value="">hr</option>
                  <?php
                  for ($x = 1; $x <= 12; $x++) {
                    $x = sprintf("%02d", $x);
                    echo "<option value='$x'> $x ";
                  }
                  ?>
                </select>
                <select name="minsTo" id="to3" required>
                  <option value="">mins</option>
                  <?php
                  for ($x = 0; $x <= 59; $x++) {
                    $x = sprintf("%02d", $x);
                    echo "<option value='$x'>$x";
                  }
                  ?>
                </select>
                </option>
                <select name="ampmTo" id="to2" required>
                  <option value="">am/pm</option>
                  <option value="am">am</option>
                  <option value="pm">pm</option>
                </select>
              </div>
              <div>
                <label>Total Hours:</label>
                <input type="text" id="total_id" size="6">
              </div> -->
        <label class="writeText">Upload proof of payment here:</label>
        <div class="BlogWrite">
          <input class="attInput" name="image" type="file" id="image" accept="image/*" onchange="preview()"></input>
          <img class="imagePrev" id="imagePreview" src=# alt="" />
        </div>
        <label for="image" class="upload">Upload Photo</label>
      </div>
    </div>
    <!-- <table class="table table-hover">
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
    </table> -->
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