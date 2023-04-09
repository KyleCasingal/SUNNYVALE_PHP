<?php
include "../process.php";
if (isset($_SESSION['user_id'])) {
  header("Location: ./blogHome.php");
  exit;
}
?>
<style>
  .topVerify {
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

  .topLeftVerify {
    flex: 3;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin-left: 2vw;
  }

  .topLeftVerify img {
    max-height: 5vw;
  }

  .topIconVerify {
    font-size: 2.5vw;
    margin-right: 10px;
    color: white;
    font-family: "Poppins", sans-serif;
    font-style: normal;
    cursor: pointer;
  }

  .topLeftVerify {
    color: white;
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: flex-start;
  }

  .topRightVerify {
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

  .topListVerify {
    display: inline-flex;
    justify-content: flex-end;
    margin: 0;
    padding: 0;
    list-style: none;
    color: rgb(89, 89, 89);
  }

  .topListItemVerify {
    color: white;
    padding: 0.8vw;
    margin-right: 0.2vw;
    font-size: 1vw;
    font-weight: 300;
    cursor: pointer;
  }

  .topListItemVerify:hover {
    color: black;
    cursor: pointer;
  }

  .topSearchIcon {
    font-size: 18px;
    color: rgb(89, 89, 89);
    cursor: pointer;
    margin-left: 15px;
  }

  .registerButtonVerify {
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

  .loginButtonVerify {
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
</style>
<form method='POST'>
  <div class="topVerify">
    <div class="topLeftVerify">
      <img src="..\img\logoSV.png" alt= />
      <i class="topIconVerify">SUNNYVALE</i>
    </div>

  </div>
</form>