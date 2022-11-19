<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="blogWrite.css">
  <link rel="stylesheet" href="../topbar/topbar1.css" media="screen">
  <link rel="stylesheet" href="../footer/footer.css" media="screen">
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <title>SUNNYVALE</title>
</head>
<style>
  body {
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

  input[type="file"] {
    display: none;
  }

  label {
    font-size: 2vw;
    padding: 0.5vw;
  }

  textarea {
    margin-bottom: 1vw;
    padding: 0.5vw;
    font-size: 1.2vw;
    border: 1;
    border-radius: 0.8vw;
    max-width: 50vw;
    min-height: 1vw;
    height: 4vw;
    overflow-x: auto;
    resize: vertical;
    font-family: 'Newsreader', serif;
  }

  .upload1 {
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
    margin-top: 0.5vw;
    margin-bottom: 0.5vw;
  }

  .upload:hover {
    background-color: rgb(253, 200, 86);
  }

  .formBlog {
    display: flex;
    justify-content: center;
    padding: 2vw;
    width: 95%;
    border-radius: 1vw;
    flex-direction: column;
    background-color: rgba(234, 232, 199, 0.2);
    font-family: 'Newsreader', serif;
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
    width: 15vw;
    font-family: "Poppins", sans-serif;
    font-size: 1.5vw;
    margin-top: 2vw;
    color: white;
    border-radius: 0.8vw;
    cursor: pointer;
  }

  .btnSubmitPost:hover {
    background-color: rgb(167, 197, 167);
  }

  .imagePrev {
    max-width: 60vw;
    max-height: 20vw;
    margin-bottom: 2vw;
  }
</style>

<body>
  <form method="post" enctype="multipart/form-data">
    <div class="blogWrite">
      <div class="blogWritePage">
        <div class="formBlog">
          <label class="writeText">Add Photos</label>
          <input class="attInput" type="file" name="image" id="image" accept="image/*" onchange="preview()"></input>
          <img class="imagePrev" id="imagePreview" src=# alt="" />
          <label for="image" class="upload">Upload Photo</label>
          <br></br>
          <label>Title</label>
          <input type="text" name="title" id="title" />
          <br></br>
          <label>Description</label>
          <br></br>
          <textarea class="descInput" type="text" name="content" id="content" maxLength={255}></textarea>
          <br></br>
          <label>Tags</label>
          <input type="text" />
          <br></br>
          <button class="btnSubmitPost" name="submitPost" id="submitPost">Submit</button>
          <br></br>
        </div>
      </div>
    </div>
  </form>
</body>

</html>

// SCRIPTS
<script type="text/javascript">
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }

  function preview() {
    imagePreview.src = URL.createObjectURL(event.target.files[0]);
  }
</script>