<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <title>SUNNYVALE</title>
</head>
<style>
  .footer {
    width: 100%;
    height: 15vmax;
    background-color: rgb(33, 37, 41);
    top: 0;
    margin-top: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-family: "Poppins", sans-serif;
    z-index: 999;
  }

  .footerCenter {
    margin: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .footerCenter img {
    display: flex;
    justify-content: center;
    align-self: center;
    margin: 0,5vmax;
    padding: 0;
    max-width: 6vmax;
  }

  .footerIcon {
    font-size: 5rem;
    margin-right: 10px;
    color: rgb(89, 89, 89);
    font-family: "Poppins", sans-serif;
    font-style: normal;
    cursor: pointer;
  }

  .footerImg {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    cursor: pointer;
  }

  .footerList {
    display: flex;
    justify-content: center;
    align-content: center;
    margin: 0;
    padding: 0;
    list-style: none;
    color: rgb(89, 89, 89);
  }

  .footerListTitle {
    display: flex;
    justify-content: center;
    align-self: center;
    font-size: 3vmax;
    margin: 0;
    padding: 0;
    list-style: none;
    font-family: 'Poppins', sans-serif;
    font-style: normal;
    font-weight: 800;
    color: rgb(89, 89, 89);
  }

  .footerListItem {
    margin: 0.8vmax;
    margin-top: 1vmax;
    font-size: 1vmax;
    font-weight: 300;
    cursor: pointer;
  }

  .footerListItem:hover {
    color: black;
    cursor: pointer;
  }
</style>

<body>
  <div class='footer'>

    <div class="footerCenter">
      <img src="..\img\logoSVgray.png" alt="" />
      <i class="footerListTitle">Sunnyvale Subdivision</i>


    </div>
    <ul class="footerList">
      <li class="footerListItem">OFFICERS</li>
      <li class="footerListItem">CONTACT</li>
      <li class="footerListItem">PRIVACY</li>
      <li class="footerListItem">DEVELOPERS</li>
    </ul>
  </div>
</body>

</html>