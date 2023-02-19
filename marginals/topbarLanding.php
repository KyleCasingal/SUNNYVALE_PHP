<?php
// include "./process.php";

?>
<style>
  .topLanding {
    margin-bottom: 0;
    padding: 0;
    width: 100%;
    height: 6vw;
    background-color: rgba(255, 253, 245, 0);
    position: sticky;
    top: 0;
    display: flex;
    align-items: center;
    font-family: "Poppins", sans-serif;
    z-index: 999;
    backdrop-filter: blur(5px);

  }

  .topLeftLanding {
    flex: 3;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin-left: 2vw;
  }

  .topLeftLanding img {
    max-height: 5vw;
  }

  .topIconLanding {
    font-size: 2.5vw;
    margin-right: 10px;
    color: white;
    font-family: "Poppins", sans-serif;
    font-style: normal;
    cursor: pointer;
  }

  .topLeftLanding {
    color: white;
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: flex-start;
  }

  .topRightLanding {
    color: white;
    flex: 1;
    display: flex;
    padding-right: 20px;
    flex-direction: column;
    align-items: flex-end;
    justify-content: flex-end;

  }



  .topCenter {
    flex: 60;

  }



  .topImg {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    cursor: pointer;
  }

  .topListLanding {
    display: inline-flex;
    justify-content: flex-end;
    margin: 0;
    padding: 0;
    list-style: none;
    color: rgb(89, 89, 89);
  }

  .topListItemLanding {
    color: white;
    padding: 0.8vw;
    margin-right: 0.2vw;
    font-size: 1vw;
    font-weight: 300;
    cursor: pointer;
  }

  .topListItemLanding:hover {
    color: black;
    cursor: pointer;
  }

  .topSearchIcon {
    font-size: 18px;
    color: rgb(89, 89, 89);
    cursor: pointer;
    margin-left: 15px;
  }

  .registerButtonLanding {
    font-size: 0.9vw;
    cursor: pointer;
    height: 3em;
    background-color: lightcoral;
    border: none;
    color: white;
    border-radius: 0.6vw;
    padding: 0.8em;
    margin-right: 1vw;
  }

  .loginButtonLanding {
    font-size: 0.9vw;
    cursor: pointer;
    height: 3em;
    background-color: darkseagreen;
    border: none;
    color: white;
    border-radius: 0.6vw;
    padding: 0.8em;
    margin-right: 1vw;
  }

  .registerButtonLanding:hover {
    background-color: rgb(180, 83, 83);
  }

  .loginButtonLanding:hover {
    background-color: rgb(93, 151, 93);
  }
  .topCenterLanding{
    display: flex;
    max-height: 4.5vw;
  }
</style>
<form method='POST'>

  <div class="topLanding">
    <div class="topLeftLanding">
      <img src="img\logoSV.png" alt= />
      <i class="topIconLanding">SUNNYVALE</i>
    </div>
    <div class="topCenterLanding">
      <ul class="topListLanding">
        <li class="topListItemLanding">HOME</li>
        <li class="topListItemLanding" onclick="location.href='./modules/amenitiesGuest.php'">AMENITIES</li>

        <button class="registerButtonLanding" name="registerButtonLanding" id="registerButtonLanding">
          Verify your Account
        </button>
        <button class="loginButtonLanding" name="loginButtonLanding" id="loginButtonLanding">
          Login
        </button>
      </ul>
    </div>
  </div>
</form>