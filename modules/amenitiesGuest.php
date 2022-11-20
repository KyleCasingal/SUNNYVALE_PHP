<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="amenitiesGuest.css" media="screen">
  <link rel="stylesheet" href="../footer/footer.css" media="screen">
  <link rel="stylesheet" href="../topbarLanding/topbarLanding.css" media="screen">
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap"
    rel="stylesheet">
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
    font-family: 'Newsreader', serif;
    margin-bottom: 1vw;
  }

  select {
    max-width: 50vw;
    height: 2vw;
    font-size: 1.2vw;
    border: 0;
    border-radius: 0.8vw;
    font-family: 'Newsreader', serif;
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
    font-family: 'Newsreader', serif;
  }

  .paymentForm {
    display: flex;
    padding: 2vw;
    margin: 1.5vw;
    width: 40%;
    border-radius: 1vw;
    flex-direction: column;
    background-color: rgba(234, 232, 199, 0.2);
    font-family: 'Newsreader', serif;
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
  <?php include '../marginals/topbarGuest.php'; ?>

  <form action="amenitiesGuest" method="post">
    <div class='amenities'>
      <div class="amenitiesForm">
        <label>Name</label>
        <input type="text" name="name" id="name" />

        <div class="timeinput">
          <label>Time</label>
          <input type="time" name="time" id="time" min="6:00" max="21:00" required />
          <label>To</label>
          <input type="time" name="time2" id="time2" min="6:00:00" max="21:00:00" required />
          <label>6:00am to 9:00pm only</label>
        </div>

        <label>Date</label>
        <input type="date" />

        <label>Amenity</label>
        <select name="amenity" id="amenity">
          <option value="Basketball Court">Basketball Court</option>
          <option value="Volleyball Court">Volleyball Court</option>
          <option value="Badminton Court">Badminton Court</option>
          <option value="Multi-purpose Hall">Multi-purpose Hall</option>
        </select>

        <label>Amount</label>
        <input type="text" readOnly />


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