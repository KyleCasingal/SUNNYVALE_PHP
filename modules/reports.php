<?php
require '../marginals/topbar.php';
$result = $con->query("SELECT * FROM user, homeowner_profile  WHERE user_id = " . $user_id = $_SESSION['user_id'] . "  AND full_name = CONCAT(first_name, ' ', last_name)") or die($mysqli->error);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        font-family: 'Poppins', sans-serif;
    }

    input {
        font-size: 1vw;
        border-radius: 0.5vw;
        border: none !important;

    }

    select {
        font-size: 1vw;
        border: none !important;
        border-radius: 1vw;
        width: 15vw;
    }

    .tblForm {
        border: 0 none !important;

    }

    .tblForm th,
    td {
        font-size: 1vw;
        padding: 1vw;
    }

    .secretary {
        display: flex;
    }

    .sideBar {
        background-color: rgb(248, 245, 227);
        flex: 2;
        color: black;
    }

    .secretarySideBar {
        display: inline;
        justify-content: flex-end;
        margin-top: 5px;
        margin-bottom: 0;
        padding: 0;
        list-style: none;
    }

    .secretarySideBar li {
        color: rgb(89, 89, 89);
        font-family: "Poppins", sans-serif;
        text-align: center;
        padding: 1.5vw;
        padding-left: 0.5vw;
        padding-right: 0.5vw;
        font-size: max(1.5vw, min(10px));
        cursor: pointer;
        border-bottom: 1px solid lightgray;
    }

    .secretarySideBar li:hover {
        background-color: rgb(236, 235, 226);
    }

    .secretaryPanel {
        flex: 8;
        width: 100%;
        overflow-x: hidden;
    }
    .btnSubmitReg {
  background-color: darkseagreen;
  border: 0;
  padding: 0.5vw;
  max-width: 50vw;
  width: 15vw;
  font-family: "Poppins", sans-sans-serif;
  font-size: 1.5vw;
  margin-top: 2vw;
  color: white;
  border-radius: 0.8vw;
  cursor: pointer;
}
.btnSubmitReg:hover {
  background-color: rgb(93, 151, 93);
}
.buttonArea{
  margin: 2vw;
  display: flex;
  flex-direction: column;
}

</style>


<body>

    <div class="secretary">
        <div class="sideBar">
        <?php
              if ($row['user_type'] == 'Admin' ){
                require '../marginals/sidebarAdmin.php';
              }
              
              if ($row['user_type'] == 'Secretary'){
                require '../marginals/sidebarSecretaryPanel.php';
              }
              ?>
        </div>
        <div class="secretaryPanel">
          
      <div class="reportsContainer">
        <div class="buttonArea">
          <button type="submit" class="btnSubmitReg">
            Amenity Renting
          </button>
          <button type="submit" class="btnSubmitReg">
            Paid Monthly Dues
          </button>
          <button type="submit" class="btnSubmitReg">
            Unpaid Dues
          </button>
          <button type="submit" class="btnSubmitReg">
            Audit Trail
          </button>
        </div>
        
      </div>  
                
        </div>
        
    </div>
    <?php
    require '../marginals/footer2.php'
        ?>
</body>

</html>


