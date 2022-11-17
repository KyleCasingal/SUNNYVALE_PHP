<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="blogWrite.css" media="screen">
    <link rel="stylesheet" href="../topbar/topbar.css" media="screen">
    <link rel="stylesheet" href="../footer/footer.css" media="screen">
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
    <title>SUNNYVALE</title>
</head>
<body>
<?php require '../topbar/topbar.php';?>
<form method="post" enctype="multipart/form-data">
    <div class="blogWrite">
      <div class="blogWritePage">
        <div class="formBlog">
            <label class="writeText">Add Photos</label>
              <input class="attInput" type="file" name="image" id="image" accept="image/*" onchange="preview()"></input>
              <img class="imagePrev" id="imagePreview" src=# alt=""  /> 
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
            <input type="text"/>
            <br></br>
            <button class="btnSubmitPost" name="submitPost" id="submitPost">Submit</button>
            <br></br>
        </div>
      </div>
    </div>
    </form>
    <?php 
      require '../footer/footer2.php'
    ?>
</body>
</html>

// SCRIPTS
<script type="text/javascript">
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
function preview() {
  imagePreview.src=URL.createObjectURL(event.target.files[0]);
}
</script>