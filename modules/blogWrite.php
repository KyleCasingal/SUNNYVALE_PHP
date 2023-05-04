<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <title>SUNNYVALE</title>
</head>
<style>
  body {
    margin: 0;
  }

  input {
    max-width: 50vw;
    height: 2vw;
    font-size: 1vw;
    border: 0;
    border-radius: 0.8vw;
    font-family: "Poppins", sans-serif;
  }

  input[type="file"] {
    display: none;
  }

  label {
    font-size: 1.5vw;
    margin: 0;
  }

  textarea {
    margin-bottom: 1vw;
    padding: 0.5vw;
    font-size: 1.2vw;
    border: 0;
    border-radius: 0.8vw;
    max-width: 50vw;
    min-height: 1vw;
    height: 4vw;
    overflow-x: auto;
    resize: vertical;
    font-family: "Poppins", sans-serif;
  }

  .upload {
    text-align: center;
    background-color: rgb(248, 186, 55);
    border: 0;
    padding: 0.5vw;
    max-width: 50vw;
    width: 10vw;
    font-family: "Poppins", sans-serif;
    font-size: 1vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
    margin-top: 0.5vw;
    margin-bottom: 0.5vw;
  }

  .upload:hover {
    background-color: rgb(253, 200, 86);
  }

  .formBlog {
    display: flex;
    justify-content: center;
    padding: 1vw;
    margin: 1vw;
    width: 90%;
    border-radius: 1vw;
    flex-direction: column;

    font-family: "Poppins", sans-serif;
  }

  .blogWritePage {
    margin-left: 3vw;
  }

  .attInput {
    height: 4vw;
    border-radius: 0;
  }

  .btnSubmitPost {
    background-color: darkseagreen;
    border: 0;
    padding: 0.5vw;
    max-width: 50vw;
    width: 5vw;
    font-family: "Poppins", sans-serif;
    font-size: 1vw;
    margin-top: 2vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
  }

  .btnSubmitPost:hover {
    background-color: rgb(167, 197, 167);
  }

  .imagePrev {
    margin-top: 0;
    max-width: 40vw;
    max-height: 20vw;
    margin-bottom: 2vw;
  }

  .lblPostForm {
    padding-bottom: 1vw;
    padding-top: 1vw;
  }
</style>

<body>

  <form method='post' enctype='multipart/form-data'>
    <div class='blogWrite'>
      <div class='blogWritePage'>
        <div class='formBlog'>
          <?php
          if ($rowUser['user_type'] == 'Homeowner' or $rowUser['user_type'] == 'Tenant') {
            echo "<label class='writeText'>Add Photos</label>
            <input class='attInput' type='file' name='image' id='image' accept='image/*' onchange='preview()'></input>
            <img class='imagePrev' id='imagePreview' src=# alt='' />
            <label for='image' class='upload'>Upload Photo</label>";
          }
          ?>
          <label class='lblPostForm'>Title</label>
          <input type='text' name='title' id='title' required/>
          <label class='lblPostForm'>Description</label>
          <textarea class='descInput' type='text' name='content' id='content' maxLength={255} required></textarea>
          <?php
          if ($rowUser['user_type'] == 'Admin' or $rowUser['user_type'] == 'Secretary') {
            echo " <label class='lblPostForm'>Archive Post after </label>
            <input type='text' pattern='[0-9]+' name='days' id='' maxlength='3' size='3' />
            <label class='lblPostForm'>Days</label>";
          }
          ?>
          <button class='btnSubmitPost' name="submitPost" id="submitPost">Submit</button>
        </div>
      </div>
    </div>
  </form>
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