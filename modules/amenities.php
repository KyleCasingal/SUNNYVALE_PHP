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

  <!-- calendar -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>-->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>

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

  /* calendar */
  .calendarbox {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-bottom: 30px;

    margin-top: 2vw;

  }

  .containercalendar {
    position: relative;
    width: 1200px;
    min-height: 850px;
    margin: 0 auto;
    padding: 5px;
    color: #fff;
    display: flex;
    margin-bottom: 2vw;
    border-radius: 10px;
    background-color: #373c4f;
  }

  .left {
    width: 60%;
    padding: 20px;
  }

  .calendar {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: space-between;
    color: #878895;
    border-radius: 5px;
    background-color: #fff;
  }

  /* set after behind the main element */
  /* .calendar::before,
  .calendar::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 100%;
    width: 12px;
    height: 97%;
    border-radius: 0 5px 5px 0;
    background-color: #d3d4d6d7;
    transform: translateY(-50%);
  }
  .calendar::before {
    height: 94%;
    left: calc(100% + 12px);
    background-color: rgb(153, 153, 153);
  } */

  .calendar .month {
    width: 100%;
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 50px;
    font-size: 1.2rem;
    font-weight: 500;
    text-transform: capitalize;
  }

  .calendar .month .prev,
  .calendar .month .next {
    cursor: pointer;
  }

  .calendar .month .prev:hover,
  .calendar .month .next:hover {
    color: darkseagreen;
  }

  .calendar .weekdays {
    width: 100%;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    font-size: 1rem;
    font-weight: 500;
    text-transform: capitalize;
  }

  .weekdays div {
    width: 14.28%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .calendar .days {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 0 20px;
    font-size: 1rem;
    font-weight: 500;
    margin-bottom: 20px;
  }

  .calendar .days .day {
    width: 14.28%;
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: darkseagreen;
    border: 1px solid #f5f5f5;
  }

  .calendar .days .day:nth-child(7n + 1) {
    border-left: 2px solid #f5f5f5;
  }

  .calendar .days .day:nth-child(7n) {
    border-right: 2px solid #f5f5f5;
  }

  .calendar .days .day:nth-child(-n + 7) {
    border-top: 2px solid #f5f5f5;
  }

  .calendar .days .day:nth-child(n + 29) {
    border-bottom: 2px solid #f5f5f5;
  }

  .calendar .days .day:not(.prev-date, .next-date):hover {
    color: #fff;
    background-color: darkseagreen;
  }

  .calendar .days .prev-date,
  .calendar .days .next-date {
    color: #b3b3b3;
  }

  .calendar .days .active {
    position: relative;
    font-size: 2rem;
    color: #fff;
    background-color: darkseagreen;
  }

  /* .calendar .days .active::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    box-shadow: 0 0 10px 2px darkseagreen;
  } */

  .calendar .days .today {
    font-size: 2rem;
  }

  .calendar .days .event {
    position: relative;
  }

  /* .calendar .days .event::after {
    content: "";
    position: absolute;
    bottom: 10%;
    left: 50%;
    width: 75%;
    height: 6px;
    border-radius: 30px;
    transform: translateX(-50%);
    background-color: darkseagreen;
  } */

  /* .calendar .days .day:hover.event::after {
    background-color: #fff;
  }
  .calendar .days .active.event::after {
    background-color: #fff;
    bottom: 20%;
  } */

  .calendar .days .active.event {
    padding-bottom: 10px;
  }

  .calendar .goto-today {
    width: 100%;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 5px;
    padding: 0 20px;
    margin-bottom: 20px;
    color: darkseagreen;
  }

  .calendar .goto-today .goto {
    display: flex;
    align-items: center;
    border-radius: 5px;
    overflow: hidden;
    border: 1px solid darkseagreen;
  }

  .calendar .goto-today .goto input {
    width: 100%;
    height: 30px;
    outline: none;
    border: none;
    border-radius: 5px;
    padding: 0 20px;
    color: darkseagreen;
    border-radius: 5px;
  }

  .calendar .goto-today button {
    padding: 5px 10px;
    border: 1px solid darkseagreen;
    border-radius: 5px;
    background-color: transparent;
    cursor: pointer;
    color: darkseagreen;
  }

  .calendar .goto-today button:hover {
    color: #fff;
    background-color: darkseagreen;
  }

  .calendar .goto-today .goto button {
    border: none;
    border-left: 1px solid darkseagreen;
    border-radius: 0;
  }

  .containercalendar .right {
    position: relative;
    width: 40%;
    min-height: 100%;
    padding: 20px 0;
  }

  .right .today-date {
    width: 100%;
    height: 50px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
    justify-content: space-between;
    padding: 0 40px;
    padding-left: 70px;
    margin-top: 50px;
    margin-bottom: 20px;
    text-transform: capitalize;
  }

  .right .today-date .event-day {
    font-size: 2rem;
    font-weight: 500;
  }

  .right .today-date .event-date {
    font-size: 1rem;
    font-weight: 400;
    color: #878895;
  }

  .events {
    width: 100%;
    height: 100%;
    max-height: 600px;
    overflow-x: hidden;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    padding-left: 4px;
  }

  .events .event {
    position: relative;
    width: 95%;
    min-height: 70px;
    display: flex;
    justify-content: center;
    flex-direction: column;
    gap: 5px;
    padding: 0 20px;
    padding-left: 50px;
    color: #fff;
    background: linear-gradient(90deg, #3f4458, transparent);
    cursor: pointer;
  }

  /* even event */
  .events .event:nth-child(even) {
    background: transparent;
  }

  .events .event:hover {
    background: linear-gradient(90deg, darkseagreen, transparent);
  }

  .events .event .title {
    display: flex;
    align-items: center;
    pointer-events: none;
  }

  .events .event .title .event-title {
    font-size: 1rem;
    font-weight: 400;
    margin-left: 20px;
  }

  .events .event i {
    color: darkseagreen;
    font-size: 0.5rem;
  }

  .events .event:hover i {
    color: #fff;
  }

  .events .event .event-time {
    font-size: 0.8rem;
    font-weight: 400;
    color: #878895;
    margin-left: 15px;
    pointer-events: none;
  }

  .events .event:hover .event-time {
    color: #fff;
  }

  /* add tick in event after */
  .events .event::after {
    content: "✓";
    position: absolute;
    top: 50%;
    right: 0;
    font-size: 3rem;
    line-height: 1;
    display: none;
    align-items: center;
    justify-content: center;
    opacity: 0.3;
    color: darkseagreen;
    transform: translateY(-50%);
  }

  .events .event:hover::after {
    display: flex;
  }

  .add-event {
    position: absolute;
    bottom: 30px;
    right: 30px;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    color: #878895;
    border: 2px solid #878895;
    opacity: 0.5;
    border-radius: 50%;
    background-color: transparent;
    cursor: pointer;
  }

  .add-event:hover {
    opacity: 1;
  }

  .add-event i {
    pointer-events: none;
  }

  .events .no-event {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 500;
    color: #878895;
  }

  .add-event-wrapper {
    position: absolute;
    bottom: 100px;
    left: 50%;
    width: 90%;
    max-height: 0;
    overflow: hidden;
    border-radius: 5px;
    background-color: #fff;
    transform: translateX(-50%);
    transition: max-height 0.5s ease;
  }

  .add-event-wrapper.active {
    max-height: 300px;
  }

  .add-event-header {
    width: 100%;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    color: #373c4f;
    border-bottom: 1px solid #f5f5f5;
  }

  .add-event-header .close {
    font-size: 1.5rem;
    cursor: pointer;
  }

  .add-event-header .close:hover {
    color: darkseagreen;
  }

  .add-event-header .title {
    font-size: 1.2rem;
    font-weight: 500;
  }

  .add-event-body {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 20px;
  }

  .add-event-body .add-event-input {
    width: 100%;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
  }

  .add-event-body .add-event-input input {
    width: 100%;
    height: 100%;
    outline: none;
    border: none;
    border-bottom: 1px solid #f5f5f5;
    padding: 0 10px;
    font-size: 1rem;
    font-weight: 400;
    color: #373c4f;
  }

  .add-event-body .add-event-input input::placeholder {
    color: #a5a5a5;
  }

  .add-event-body .add-event-input input:focus {
    border-bottom: 1px solid darkseagreen;
  }

  .add-event-body .add-event-input input:focus::placeholder {
    color: darkseagreen;
  }

  .add-event-footer {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }

  .add-event-footer .add-event-btn {
    height: 40px;
    font-size: 1rem;
    font-weight: 500;
    outline: none;
    border: none;
    color: #fff;
    background-color: darkseagreen;
    border-radius: 5px;
    cursor: pointer;
    padding: 5px 10px;
    border: 1px solid darkseagreen;
  }

  .add-event-footer .add-event-btn:hover {
    background-color: transparent;
    color: darkseagreen;
  }

  /* media queries */

  @media screen and (max-width: 1000px) {
    body {
      align-items: flex-start;
      justify-content: flex-start;
    }

    .containercalendar {
      min-height: 100vh;
      flex-direction: column;
      border-radius: 0;
    }

    .containercalendar .left {
      width: 100%;
      height: 100%;
      padding: 20px 0;
    }

    .containercalendar .right {
      width: 100%;
      height: 100%;
      padding: 20px 0;
    }

    .calendar::before,
    .calendar::after {
      top: 100%;
      left: 50%;
      width: 97%;
      height: 12px;
      border-radius: 0 0 5px 5px;
      transform: translateX(-50%);
    }

    .calendar::before {
      width: 94%;
      top: calc(100% + 12px);
    }

    .events {
      padding-bottom: 340px;
    }

    .add-event-wrapper {
      bottom: 100px;
    }
  }

  @media screen and (max-width: 500px) {
    .calendar .month {
      height: 75px;
    }

    .calendar .weekdays {
      height: 50px;
    }

    .calendar .days .day {
      height: 40px;
      font-size: 0.8rem;
    }

    .calendar .days .day.active,
    .calendar .days .day.today {
      font-size: 1rem;
    }

    .right .today-date {
      padding: 20px;
    }
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

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth'
    });
    calendar.render();
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
    <div class="amenitiesForm">

      <!-- calendar -->
      <div class="calendarbox" id="mycalendarshow">
        <div class="containercalendar">
          <div class="left">
            <div class="calendar">
              <div class="month">
                <i class="fas fa-angle-left prev"></i>
                <div class="date" id="focusdate">Date</div>
                <i class="fas fa-angle-right next"></i>
              </div>
              <div class="weekdays">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
              </div>
              <div class="days"></div>
              <div class="goto-today">
                <div class="goto">
                  <input type="text" placeholder="mm/yyyy" class="date-input" />
                  <button class="goto-btn">Go</button>
                </div>
                <button class="today-btn">Today</button>
              </div>
            </div>
          </div>
          <div class="right">
            <div class="today-date">
              <div class="event-day">wed</div>
              <div class="event-date">12th december 2022</div>
            </div>
            <div class="events"></div>
            <div class="add-event-wrapper">
              <div class="add-event-header">
                <div class="title">Add Event</div>
                <i class="fas fa-times close"></i>
              </div>
              <div class="add-event-body">
                <div class="add-event-input">
                  <input type="text" placeholder="Event Name" class="event-name" />
                </div>
                <div class="add-event-input">
                  <input type="text" placeholder="Event Time From" class="event-time-from" />
                </div>
                <div class="add-event-input">
                  <input type="text" placeholder="Event Time To" class="event-time-to" />
                </div>
              </div>
              <div class="add-event-footer">
                <button class="add-event-btn">Add Event</button>
              </div>
            </div>
          </div>
          <button class="add-event">
            <i class="fas fa-plus"></i>
          </button>
        </div>
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

  //calendar
  const calendar = document.querySelector(".calendar"),
    date = document.querySelector(".date"),
    daysContainer = document.querySelector(".days"),
    prev = document.querySelector(".prev"),
    next = document.querySelector(".next"),
    todayBtn = document.querySelector(".today-btn"),
    gotoBtn = document.querySelector(".goto-btn"),
    dateInput = document.querySelector(".date-input"),
    eventDay = document.querySelector(".event-day"),
    eventDate = document.querySelector(".event-date"),
    eventsContainer = document.querySelector(".events"),
    addEventBtn = document.querySelector(".add-event"),
    addEventWrapper = document.querySelector(".add-event-wrapper "),
    addEventCloseBtn = document.querySelector(".close "),
    addEventTitle = document.querySelector(".event-name "),
    addEventFrom = document.querySelector(".event-time-from "),
    addEventTo = document.querySelector(".event-time-to "),
    addEventSubmit = document.querySelector(".add-event-btn ");

  let today = new Date();
  let activeDay;
  let month = today.getMonth();
  let year = today.getFullYear();

  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  // const eventsArr = [
  //   {
  //     day: 13,
  //     month: 11,
  //     year: 2022,
  //     events: [
  //       {
  //         title: "Event 1 lorem ipsun dolar sit genfa tersd dsad ",
  //         time: "10:00 AM",
  //       },
  //       {
  //         title: "Event 2",
  //         time: "11:00 AM",
  //       },
  //     ],
  //   },
  // ];

  const eventsArr = [];
  getEvents();
  console.log(eventsArr);

  //function to add days in days with class day and prev-date next-date on previous month and next month days and active on today
  function initCalendar() {
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const prevLastDay = new Date(year, month, 0);
    const prevDays = prevLastDay.getDate();
    const lastDate = lastDay.getDate();
    const day = firstDay.getDay();
    const nextDays = 7 - lastDay.getDay() - 1;

    date.innerHTML = months[month] + " " + year;

    let days = "";

    for (let x = day; x > 0; x--) {
      days += `<div class="day prev-date">${prevDays - x + 1}</div>`;
    }

    for (let i = 1; i <= lastDate; i++) {
      //check if event is present on that day
      let event = false;
      eventsArr.forEach((eventObj) => {
        if (
          eventObj.day === i &&
          eventObj.month === month + 1 &&
          eventObj.year === year
        ) {
          event = true;
        }
      });
      if (
        i === new Date().getDate() &&
        year === new Date().getFullYear() &&
        month === new Date().getMonth()
      ) {
        activeDay = i;
        getActiveDay(i);
        updateEvents(i);
        if (event) {
          days += `<div class="day today active event">${i}</div>`;
        } else {
          days += `<div class="day today active">${i}</div>`;
        }
      } else {
        if (event) {
          days += `<div class="day event">${i}</div>`;
        } else {
          days += `<div class="day ">${i}</div>`;
        }
      }
    }

    for (let j = 1; j <= nextDays; j++) {
      days += `<div class="day next-date">${j}</div>`;
    }
    daysContainer.innerHTML = days;
    addListner();
  }

  //function to add month and year on prev and next button
  function prevMonth() {
    month--;
    if (month < 0) {
      month = 11;
      year--;
    }
    initCalendar();
  }

  function nextMonth() {
    month++;
    if (month > 11) {
      month = 0;
      year++;
    }
    initCalendar();
  }

  prev.addEventListener("click", prevMonth);
  next.addEventListener("click", nextMonth);

  initCalendar();

  //function to add active on day
  function addListner() {
    const days = document.querySelectorAll(".day");
    days.forEach((day) => {
      day.addEventListener("click", (e) => {
        getActiveDay(e.target.innerHTML);
        updateEvents(Number(e.target.innerHTML));
        activeDay = Number(e.target.innerHTML);
        //remove active
        days.forEach((day) => {
          day.classList.remove("active");
        });
        //if clicked prev-date or next-date switch to that month
        if (e.target.classList.contains("prev-date")) {
          prevMonth();
          //add active to clicked day afte month is change
          setTimeout(() => {
            //add active where no prev-date or next-date
            const days = document.querySelectorAll(".day");
            days.forEach((day) => {
              if (
                !day.classList.contains("prev-date") &&
                day.innerHTML === e.target.innerHTML
              ) {
                day.classList.add("active");
              }
            });
          }, 100);
        } else if (e.target.classList.contains("next-date")) {
          nextMonth();
          //add active to clicked day afte month is changed
          setTimeout(() => {
            const days = document.querySelectorAll(".day");
            days.forEach((day) => {
              if (
                !day.classList.contains("next-date") &&
                day.innerHTML === e.target.innerHTML
              ) {
                day.classList.add("active");
              }
            });
          }, 100);
        } else {
          e.target.classList.add("active");
        }
      });
    });
  }

  todayBtn.addEventListener("click", () => {
    today = new Date();
    month = today.getMonth();
    year = today.getFullYear();
    initCalendar();
  });

  dateInput.addEventListener("input", (e) => {
    dateInput.value = dateInput.value.replace(/[^0-9/]/g, "");
    if (dateInput.value.length === 2) {
      dateInput.value += "/";
    }
    if (dateInput.value.length > 7) {
      dateInput.value = dateInput.value.slice(0, 7);
    }
    if (e.inputType === "deleteContentBackward") {
      if (dateInput.value.length === 3) {
        dateInput.value = dateInput.value.slice(0, 2);
      }
    }
  });

  gotoBtn.addEventListener("click", gotoDate);

  function gotoDate() {
    console.log("here");
    const dateArr = dateInput.value.split("/");
    if (dateArr.length === 2) {
      if (dateArr[0] > 0 && dateArr[0] < 13 && dateArr[1].length === 4) {
        month = dateArr[0] - 1;
        year = dateArr[1];
        initCalendar();
        return;
      }
    }
    alert("Invalid Date");
  }

  //function get active day day name and date and update eventday eventdate
  function getActiveDay(date) {
    const day = new Date(year, month, date);
    const dayName = day.toString().split(" ")[0];
    eventDay.innerHTML = dayName;
    eventDate.innerHTML = date + " " + months[month] + " " + year;
  }

  //function update events when a day is active
  function updateEvents(date) {
    let events = "";
    eventsArr.forEach((event) => {
      if (
        date === event.day &&
        month + 1 === event.month &&
        year === event.year
      ) {
        event.events.forEach((event) => {
          events += `<div class="event">
            <div class="title">
              <i class="fas fa-circle"></i>
              <h3 class="event-title">${event.title}</h3>
            </div>
            <div class="event-time">
              <span class="event-time">${event.time}</span>
            </div>
        </div>`;
        });
      }
    });
    if (events === "") {
      events = `<div class="no-event">
            <h3>No Events</h3>
        </div>`;
    }
    eventsContainer.innerHTML = events;
    saveEvents();
  }

  //function to add event
  addEventBtn.addEventListener("click", () => {
    addEventWrapper.classList.toggle("active");
  });

  addEventCloseBtn.addEventListener("click", () => {
    addEventWrapper.classList.remove("active");
  });

  document.addEventListener("click", (e) => {
    if (e.target !== addEventBtn && !addEventWrapper.contains(e.target)) {
      addEventWrapper.classList.remove("active");
    }
  });

  //allow 50 chars in eventtitle
  addEventTitle.addEventListener("input", (e) => {
    addEventTitle.value = addEventTitle.value.slice(0, 60);
  });


  //allow only time in eventtime from and to
  addEventFrom.addEventListener("input", (e) => {
    addEventFrom.value = addEventFrom.value.replace(/[^0-9:]/g, "");
    if (addEventFrom.value.length === 2) {
      addEventFrom.value += ":";
    }
    if (addEventFrom.value.length > 5) {
      addEventFrom.value = addEventFrom.value.slice(0, 5);
    }
  });

  addEventTo.addEventListener("input", (e) => {
    addEventTo.value = addEventTo.value.replace(/[^0-9:]/g, "");
    if (addEventTo.value.length === 2) {
      addEventTo.value += ":";
    }
    if (addEventTo.value.length > 5) {
      addEventTo.value = addEventTo.value.slice(0, 5);
    }
  });

  //function to add event to eventsArr
  addEventSubmit.addEventListener("click", () => {
    const eventTitle = addEventTitle.value;
    const eventTimeFrom = addEventFrom.value;
    const eventTimeTo = addEventTo.value;
    if (eventTitle === "" || eventTimeFrom === "" || eventTimeTo === "") {
      alert("Please fill all the fields");
      return;
    }

    //check correct time format 24 hour
    const timeFromArr = eventTimeFrom.split(":");
    const timeToArr = eventTimeTo.split(":");
    if (
      timeFromArr.length !== 2 ||
      timeToArr.length !== 2 ||
      timeFromArr[0] > 23 ||
      timeFromArr[1] > 59 ||
      timeToArr[0] > 23 ||
      timeToArr[1] > 59
    ) {
      alert("Invalid Time Format");
      return;
    }

    const timeFrom = convertTime(eventTimeFrom);
    const timeTo = convertTime(eventTimeTo);

    //check if event is already added
    let eventExist = false;
    eventsArr.forEach((event) => {
      if (
        event.day === activeDay &&
        event.month === month + 1 &&
        event.year === year
      ) {
        event.events.forEach((event) => {
          if (event.title === eventTitle) {
            eventExist = true;
          }
        });
      }
    });
    if (eventExist) {
      alert("Event already added");
      return;
    }
    const newEvent = {
      title: eventTitle,
      time: timeFrom + " - " + timeTo,
    };
    console.log(newEvent);
    console.log(activeDay);
    let eventAdded = false;
    if (eventsArr.length > 0) {
      eventsArr.forEach((item) => {
        if (
          item.day === activeDay &&
          item.month === month + 1 &&
          item.year === year
        ) {
          item.events.push(newEvent);
          eventAdded = true;
        }
      });
    }

    if (!eventAdded) {
      eventsArr.push({
        day: activeDay,
        month: month + 1,
        year: year,
        events: [newEvent],
      });
    }

    console.log(eventsArr);
    addEventWrapper.classList.remove("active");
    addEventTitle.value = "";
    addEventFrom.value = "";
    addEventTo.value = "";
    updateEvents(activeDay);
    //select active day and add event class if not added
    const activeDayEl = document.querySelector(".day.active");
    if (!activeDayEl.classList.contains("event")) {
      activeDayEl.classList.add("event");
    }
  });

  //function to delete event when clicked on event
  eventsContainer.addEventListener("click", (e) => {
    if (e.target.classList.contains("event")) {
      if (confirm("Are you sure you want to delete this event?")) {
        const eventTitle = e.target.children[0].children[1].innerHTML;
        eventsArr.forEach((event) => {
          if (
            event.day === activeDay &&
            event.month === month + 1 &&
            event.year === year
          ) {
            event.events.forEach((item, index) => {
              if (item.title === eventTitle) {
                event.events.splice(index, 1);
              }
            });
            //if no events left in a day then remove that day from eventsArr
            if (event.events.length === 0) {
              eventsArr.splice(eventsArr.indexOf(event), 1);
              //remove event class from day
              const activeDayEl = document.querySelector(".day.active");
              if (activeDayEl.classList.contains("event")) {
                activeDayEl.classList.remove("event");
              }
            }
          }
        });
        updateEvents(activeDay);
      }
    }
  });

  //function to save events in local storage
  function saveEvents() {
    localStorage.setItem("events", JSON.stringify(eventsArr));
  }

  //function to get events from local storage
  function getEvents() {
    //check if events are already saved in local storage then return event else nothing
    if (localStorage.getItem("events") === null) {
      return;
    }
    eventsArr.push(...JSON.parse(localStorage.getItem("events")));
  }

  function convertTime(time) {
    //convert time to 24 hour format
    let timeArr = time.split(":");
    let timeHour = timeArr[0];
    let timeMin = timeArr[1];
    let timeFormat = timeHour >= 12 ? "PM" : "AM";
    timeHour = timeHour % 12 || 12;
    time = timeHour + ":" + timeMin + " " + timeFormat;
    return time;
  }
</script>

</html>