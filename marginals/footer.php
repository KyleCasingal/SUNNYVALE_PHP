<?php
$resultSubidivision = $con->query("SELECT * FROM subdivision WHERE subdivision_id != 1") or die($mysqli->error);
$resultOfficer1 = $con->query("SELECT * FROM officers WHERE subdivision_name = 'Sunnyvale 1' ORDER BY officer_id LIMIT 3");
$resultOfficer2 = $con->query("SELECT * FROM officers WHERE subdivision_name = 'Sunnyvale 1' ORDER BY officer_id LIMIT 3 OFFSET 3");
$resultPrivacy = $con->query("SELECT * FROM privacy");
$resultContact = $con->query("SELECT * FROM contact INNER JOIN subdivision WHERE contact.subdivision_id = subdivision.subdivision_id ORDER BY subdivision.subdivision_id LIMIT 2") or die($mysqli->error);
$resultContact2 = $con->query("SELECT * FROM contact INNER JOIN subdivision WHERE contact.subdivision_id = subdivision.subdivision_id ORDER BY subdivision.subdivision_id LIMIT 2 OFFSET 2") or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
    margin: 0, 5vmax;
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

  .carousel-inner {
    margin: 0;
    padding: 2vw;
    padding-top: 0;
    padding-bottom: 0;
  }

  .carousel-item {
    padding: 2vw;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-left: 2vw;

  }

  .OfficersTitle {
    font-size: 1.5vw;
  }

  .modal-body {
    padding: 0;
    margin: 0;
    /* border: 1px solid green; */
  }


  td {
    font-size: 1vw;
    padding: 1vw;
    text-align: center;
    vertical-align: middle;
  }

  table {
    width: 100%;
    height: 100%;
    table-layout: fixed;
  }

  .tbl-contacts td {
    /* border: 1px solid blue; */
    font-size: 1vw;
    padding: 2.5vw;
    text-align: center;
    vertical-align: middle;
  }

  .footerListText {
    color: rgb(89, 89, 89);
    margin: 0.8vw;
    margin-top: 0.5vw;
    font-size: 1vmax;
    font-weight: 300;
  }

  .modal-content {
    margin: 0;
    padding: 0;
    background-color: rgb(255, 255, 255, 0.5);
    backdrop-filter: blur(5px);
  }

  .card-subtext {
    margin: 0;
    font-size: 0.8vw;

  }

  .card-title {
    font-size: 1.2vw;
  }

  .card-text {
    font-size: 0.8vw;
    margin: 0;
  }

  .carousel-control-prev {
    width: 10%;
  }

  .carousel-control-next {
    width: 10%;
  }

  .privacy-policy {
    padding: 1vw;
  }

  .privacy-policy p {
    text-align: justify;
    text-justify: inter-word;
  }

  .dev-img {
    max-width: 10vw;
    max-height: 10vw;
  }

  .card {
    background-color: rgb(255, 255, 255, 0);
    backdrop-filter: blur(5px);
  }

  .tbl-devs {
    width: 100%;
    /* table-layout: fixed; */
  }

  .tbl-devs td {
    padding: 2vw
  }

  .tbl-dev-info tr td:last-child {
    width: 1%;
    height: 1%;
    white-space: nowrap;
    padding: 0;
    margin: 0;
  }

  .fa-brands {
    cursor: pointer;
    color: black;
    font-size: 2.5vw;
  }
</style>

<body>
  <div class='footer'>

    <div class="footerCenter">
      <img src=".\img\logoSVgray.png" alt="" />
      <i class="footerListTitle">Sunnyvale Subdivision</i>


    </div>
    <ul class="footerList">
      <li class="footerListItem" data-bs-toggle="modal" data-bs-target="#OfficersModal">OFFICERS</li>
      <li class="footerListItem" data-bs-toggle="modal" data-bs-target="#contactModal">CONTACT</li>
      <li class="footerListItem" data-bs-toggle="modal" data-bs-target="#privacyModal">PRIVACY</li>
      <li class="footerListItem" data-bs-toggle="modal" data-bs-target="#developersModal">DEVELOPERS</li>
    </ul>
    <label class="footerListText">© Sunnyvale Subdivisions, 2023</label>
  </div>

  <div class="modal fade" id="OfficersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Officers</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-officers">

          <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="true">
            <!-- <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>

            </div> -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <table>
                  <tr>
                    <td class="OfficersTitle" colspan="3">Sunnyvale 1 Officers</td>
                  </tr>
                  <tr>
                    <?php while ($row = $resultOfficer1->fetch_assoc()) : ?>
                      <td>
                        <div class="card" style="width: 18rem;">
                          <img src="./media/content-images/<?php echo $row['officer_img']; ?>" class="card-img-top" alt="...">
                          <div class="card-body">
                            <p class="card-title"><?php echo $row['officer_name'] ?></p>
                            <p class="card-subtext"><?php echo $row['position_name'] ?></p>
                          </div>
                        </div>
                      </td>
                    <?php endwhile; ?>
                  </tr>
                  <tr>
                    <?php while ($row = $resultOfficer2->fetch_assoc()) : ?>
                      <td>
                        <div class="card" style="width: 18rem;">
                          <img src="./media/content-images/<?php echo $row['officer_img']; ?>" class="card-img-top" alt="...">
                          <div class="card-body">
                            <p class="card-title"><?php echo $row['officer_name'] ?></p>
                            <p class="card-subtext"><?php echo $row['position_name'] ?></p>
                          </div>
                        </div>
                      </td>
                    <?php endwhile; ?>
                  </tr>
                </table>
              </div>
              <?php
              while ($row = $resultSubidivision->fetch_assoc()) :
                $resultOfficer1 = $con->query("SELECT * FROM officers WHERE subdivision_name ='" . $row['subdivision_name'] . "' ORDER BY officer_id LIMIT 3");
                $resultOfficer2 = $con->query("SELECT * FROM officers WHERE subdivision_name ='" . $row['subdivision_name'] . "' ORDER BY officer_id LIMIT 3 OFFSET 3");
              ?>
                <div class="carousel-item">
                  <table>
                    <tr>
                      <td class="OfficersTitle" colspan="3"><?php echo $row['subdivision_name'] ?> Officers</td>
                    </tr>
                    <tr>
                      <?php while ($row = $resultOfficer1->fetch_assoc()) : ?>
                        <td>
                          <div class="card" style="width: 18rem;">
                            <img src="./media/content-images/<?php echo $row['officer_img']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-title"><?php echo $row['officer_name'] ?></p>
                              <p class="card-subtext"><?php echo $row['position_name'] ?></p>
                            </div>
                          </div>
                        </td>
                      <?php endwhile; ?>
                    </tr>
                    <tr>
                      <?php while ($row = $resultOfficer2->fetch_assoc()) : ?>
                        <td>
                          <div class="card" style="width: 18rem;">
                            <img src="./media/content-images/<?php echo $row['officer_img']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-title"><?php echo $row['officer_name'] ?></p>
                              <p class="card-subtext"><?php echo $row['position_name'] ?></p>
                            </div>
                          </div>
                        </td>
                      <?php endwhile; ?>
                    </tr>
                  </table>
                </div>
              <?php endwhile; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Contact</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="tbl-contacts">
            <tr>
              <?php while ($row = $resultContact->fetch_assoc()) : ?>

                <td>
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['subdivision_name'] ?></h5>
                      <p class="card-text">Email: <?php echo $row['email'] ?></p>
                      <p class="card-text">Telephone: <?php echo $row['telephone'] ?></p>
                    </div>
                  </div>
                </td>
              <?php endwhile; ?>
            </tr>
            <tr>
              <?php while ($row = $resultContact2->fetch_assoc()) : ?>
                <td>
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['subdivision_name'] ?></h5>
                      <p class="card-text">Email: <?php echo $row['email'] ?></p>
                      <p class="card-text">Telephone: <?php echo $row['telephone'] ?></p>
                    </div>
                  </div>
                </td>
              <?php endwhile; ?>
            </tr>

          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Privacy</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body privacy-policy">
          <?php while ($row = $resultPrivacy->fetch_assoc()) : ?>
            <h4><?php echo $row['type']; ?></h4>
            <p><?php echo $row['description']; ?></p>
          <?php endwhile; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="developersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Developers</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="tbl-devs">
            <td>
              <div class="card card-dev" style="width: 18rem;">
                <img src="./media/content-images/mon.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-title">Mon Carlo Delima</p>
                  <p class="card-subtext">Back end developer</p>
                </div>
              </div>
            </td>
            <td>
              <div class="card card-dev" style="width: 18rem;">
                <img src="./media/content-images/pao.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-title">Jeune Paolus Flores</p>
                  <p class="card-subtext">Back end developer</p>
                </div>
              </div>
            </td>
            <td>
              <div class="card card-dev" style="width: 18rem;">
                <img src="./media/content-images/kyle.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-title">Kyle Andrei Casingal</p>
                  <p class="card-subtext">Front end developer</p>
                </div>
              </div>
            </td>
            </tr>
            <tr>
              <td>
                <div class="card card-dev" style="width: 18rem;">
                  <img src="./media/content-images/krish.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-title">Krishtalene Bendaña</p>
                    <p class="card-subtext">Designer</p>
                  </div>
                </div>
              </td>
              <td>
                <table class="tbl-dev-info">
                  <tr>
                    <td colspan="3">Email: SoLunaIT@gmail.com</td>
                  </tr>
                  <tr>
                    <td colspan="3">Telephone: +63-280-555-6872</td>
                  </tr>
                  <tr>
                    <td colspan="3">Website: www.SoLunaIT.io</td>
                  </tr>
                  <tr>
                    <td><i class="fa-brands fa-facebook-f"></i></td>
                    <td><i class="fa-brands fa-twitter"></i></td>
                    <td><i class="fa-brands fa-github-alt"></i></td>
                  </tr>


                </table>
              </td>
              <td>
                <div class="card card-dev" style="width: 18rem;">
                  <img src="./media/content-images/marco.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-title">Marco Ivan Sta. Maria</p>
                    <p class="card-subtext">Database Engineer</p>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>