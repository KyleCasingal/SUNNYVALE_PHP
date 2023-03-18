<?php
require '../marginals/topbar.php';
$result = $con->query("SELECT * FROM amenities WHERE availability =  'Available' ORDER BY subdivision_name ASC") or die($mysqli->error);
$resultSubdivision = $con->query("SELECT * FROM subdivision ORDER BY subdivision_id ASC");
$resultSubdivision_selectAmenities = $con->query("SELECT * FROM subdivision ") or die($mysqli->error);
$resultAmenities = $con->query("SELECT * FROM amenities") or die($mysqli->error);
$resultRes = $con->query("SELECT * FROM amenity_renting WHERE user_id= " . $_SESSION['user_id'] . " AND cart='Yes'") or die($mysqli->error);
$resultTotal = $con->query("SELECT SUM(cost) AS total_cost FROM amenity_renting WHERE user_id= " . $_SESSION['user_id'] . " AND cart='Yes'") or die($mysqli->error);
// $display_query = "select * from amenity_renting";
// $results = mysqli_query($con,$display_query);   
// $count = mysqli_num_rows($results);  
// if($count>0) 
// {
// 	$data_arr=array();
//     $i=1;
// 	while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
// 	{	
// 	$data_arr[$i]['event_id'] = $data_row['event_id'];
// 	$data_arr[$i]['title'] = $data_row['event_name'];
// 	$data_arr[$i]['start'] = date("Y-m-d", strtotime($data_row['event_start_date']));
// 	$data_arr[$i]['end'] = date("Y-m-d", strtotime($data_row['event_end_date']));
// 	$data_arr[$i]['color'] = '#'.substr(uniqid(),-6); // 'green'; pass colour name
// 	$data_arr[$i]['url'] = 'https://www.shinerweb.com';
// 	$i++;
// 	}
	
// 	$data = array(
//                 'status' => true,
//                 'msg' => 'successfully!',
// 				'data' => $data_arr
//             );
// }
// else
// {
// 	$data = array(
//                 'status' => false,
//                 'msg' => 'Error!'				
//             );
// }
// echo json_encode($data);   

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!--calendar -->
  <link href="js/fullcalendar/lib/main.css" rel="stylesheet" />
<script src="js/fullcalendar/lib/main.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    /* margin-bottom: 1vw; */
  }

  select {
    background-color: white;
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
    /* justify-content: center; */
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
    /* padding: 0.5vw; */
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


  $(document).ready(function() {
    $("#add").click(function() {
      $("#date1").removeAttr("required");
      $("#from1").removeAttr("required");
      $("#from2").removeAttr("required");
      $("#from3").removeAttr("required");
      $("#to1").removeAttr("required");
      $("#to2").removeAttr("required");
      $("#to3").removeAttr("required");
      $("#image").removeAttr("required");
    });
  });

  $(document).ready(function() {
    $("#dateTime").click(function() {
      $("#subdivision_id").removeAttr("required");
      $("#amenity_id").removeAttr("required");
      $("#purpose_id").removeAttr("required");
      $("#image").removeAttr("required");
    });
  });

  $(document).ready(function() {
    $("#removeID").click(function() {
      $("#date1").removeAttr("required");
      $("#from1").removeAttr("required");
      $("#from2").removeAttr("required");
      $("#from3").removeAttr("required");
      $("#to1").removeAttr("required");
      $("#to2").removeAttr("required");
      $("#to3").removeAttr("required");
      $("#subdivision_id").removeAttr("required");
      $("#amenity_id").removeAttr("required");
      $("#purpose_id").removeAttr("required");
      $("#image").removeAttr("required");
    });
  });

  $(document).ready(function() {
    $("#checkout_id").click(function() {
      $("#date1").removeAttr("required");
      $("#from1").removeAttr("required");
      $("#from2").removeAttr("required");
      $("#from3").removeAttr("required");
      $("#to1").removeAttr("required");
      $("#to2").removeAttr("required");
      $("#to3").removeAttr("required");
      $("#subdivision_id").removeAttr("required");
      $("#amenity_id").removeAttr("required");
      $("#purpose_id").removeAttr("required");
    });
  });


</script>

<body>
  <form method="post" enctype="multipart/form-data">

    <div class='amenities'>
      <div class="amenitiesForm">
        <label>Name</label>
        <input type="text" name="renter_name" id="name" value="<?php echo $row['full_name'] ?>" readonly />

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
        <button class="btnSubmit" name="addToCart" id="add">Add</button>
        
        <br>
        <!-- <button class="calendarshow" name="" id="calendarshow">Show Calendar</button> -->
      </div>
      <div class='amenitiesForm'>
        <label>Availed Services</label>
        <table class="tblAmenity">
          <tr>
            <th><input type="checkbox" name="select-all" id="select-all" /></th>
            <th>Renter</th>
            <th>Subdivision</th>
            <th>Amenity</th>
            <th>Purpose</th>
            <th>From</th>
            <th>To</th>
            <th>Cost</th>
          </tr>
          <?php while ($row = $resultRes->fetch_assoc()) : ?>
            <tr>
              <td>
                <input type="checkbox" value=<?php echo $row['amenity_renting_id']; ?> name="checkbox[]" id="checkbox">
              </td>
              <td>
                <?php echo $row['renter_name'] ?>
              </td>
              <td>
                <?php echo $row['subdivision_name'] ?>
              </td>
              <td>
                <?php echo $row['amenity_name'] ?>
              </td>
              <td>
                <?php
                $amenity_purpose_id = $row['amenity_purpose'];
                $resultPurpose = $con->query("SELECT * FROM amenity_purpose WHERE amenity_purpose_id = '$amenity_purpose_id'");
                $rowPurpose = $resultPurpose->fetch_assoc();
                echo $rowPurpose['amenity_purpose'];
                ?>
              </td>
              <td>
                <?php
                if ($row['date_from'] != NULL) {
                  $date = $row['date_from'];
                  echo date('m/d/Y h:ia ', strtotime($date));
                } else {
                  echo $row['date_from'];
                }
                ?>
              </td>
              <td>
                <?php
                if ($row['date_to'] != NULL) {
                  $date = $row['date_to'];
                  echo date('m/d/Y h:ia ', strtotime($date));
                } else {
                  echo $row['date_to'];
                }
                ?>
              </td>
              <td>
                <?php echo $row['cost'] ?>
              </td>
            </tr>
          <?php endwhile; ?>
          <div><label>Date</label>
            <input required id="date1" type="date" name="date" <?php
                                                                if (isset($_POST['compute'])) {
                                                                  $date = $_POST['date'];
                                                                  echo "value = '$date'";
                                                                }
                                                                $date = date('Y-m-d', strtotime('today'));
                                                                echo "min='$date'"
                                                                ?>>
          </div>
          <div class="timeinput">
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
          </div>
          <div>
            <button class="btnSubmit" name="applyDateTime" id="dateTime">Apply to Selected</button>
            <button class="btnCompute" name="removeSelected" id="removeID">Remove Selected</button>
          </div>
        </table>
        <div>
          <label>Total Cost:</label>
          <input type="text" id="total_id" size="6" value="<?php
                                                            $rowTotal = $resultTotal->fetch_assoc();
                                                            echo $rowTotal['total_cost'];
                                                            ?>" readonly>
          <div class="paymentForm">
            <label class="writeText">Upload proof of payment here:</label>
            <div class="BlogWrite">
              <input class="attInput" name="image" type="file" id="image" accept="image/*" onchange="preview()" required></input>
              <img class="imagePrev" id="imagePreview" src=# alt="" />
            </div>
            <label for="image" class="upload">Upload Photo</label>
          </div>
          <button class="btnSubmit" name="checkout" id="checkout_id">Checkout All</button>
        </div>
      </div>
    </div>
    <!-- calendar -->
    <div class='amenitiesForm' id=fullcalendar>
      

    </div>
    </div>
  </form>
  <?php
  require '../marginals/footer2.php';
  ?>

</body>
<script>




  $('#select-all').click(function(event) {
    if (this.checked) {
      // Iterate each checkbox
      $(':checkbox').each(function() {
        this.checked = true;
      });
    } else {
      $(':checkbox').each(function() {
        this.checked = false;
      });
    }
  });

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
  $(document).ready(function() {
	display_events();
});



 
</script>

</html>