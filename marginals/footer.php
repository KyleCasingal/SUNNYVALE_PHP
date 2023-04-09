<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#000000" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>SUNNYVALE</title>
</head>
<style>
  .footer {
    width: 100%;
    height: 12vmax;
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

    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .footerCenter img {
    display: flex;
    justify-content: center;
    align-self: center;
    margin: 10px;
    padding: 0;
    max-width: 7vw;
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
    font-size: 3vw;
    margin: 0;
    padding: 0;
    list-style: none;
    font-family: 'Poppins', sans-serif;
    font-style: normal;
    font-weight: 800;
    color: rgb(89, 89, 89);
  }

  .footerListItem {
    margin: 0.8vw;
    margin-top: -0.8vw;
    font-size: 1vw;
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

  .footerListText {
    color: rgb(89, 89, 89);
    margin: 0.8vw;
    margin-top: 0.5vw;
    font-size: 1vw;
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

  .card-text {

    margin: 0;
  }

  .carousel-control-prev {
    width: 10%;
  }

  .carousel-control-next {
    width: 10%;
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
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Noelle Maxwell</p>
                          <p class="card-subtext">President</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf5.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Harriet Fennimore</p>
                          <p class="card-subtext">Vice President</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf6.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Aileen Sims</p>
                          <p class="card-subtext">Secretary</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Damon Reese</p>
                          <p class="card-subtext">Treasurer</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Frederick Roffe</p>
                          <p class="card-subtext">Auditor</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Phoebe Jackson</p>
                          <p class="card-subtext">P.I.O</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="carousel-item">

                <table>
                  <tr>
                    <td class="OfficersTitle" colspan="3">Sunnyvale 2 Officers</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Noelle Maxwell</p>
                          <p class="card-subtext">President</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf5.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Harriet Fennimore</p>
                          <p class="card-subtext">Vice President</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf6.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Aileen Sims</p>
                          <p class="card-subtext">Secretary</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Damon Reese</p>
                          <p class="card-subtext">Treasurer</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Frederick Roffe</p>
                          <p class="card-subtext">Auditor</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Phoebe Jackson</p>
                          <p class="card-subtext">P.I.O</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="carousel-item">
                <table>
                  <tr>
                    <td class="OfficersTitle" colspan="3">Sunnyvale 3 Officers</td>
                  <tr>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Noelle Maxwell</p>
                          <p class="card-subtext">President</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf5.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Harriet Fennimore</p>
                          <p class="card-subtext">Vice President</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf6.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Aileen Sims</p>
                          <p class="card-subtext">Secretary</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Damon Reese</p>
                          <p class="card-subtext">Treasurer</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Frederick Roffe</p>
                          <p class="card-subtext">Auditor</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Phoebe Jackson</p>
                          <p class="card-subtext">P.I.O</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="carousel-item">
                <table>
                  <tr>
                    <td class="OfficersTitle" colspan="3">Sunnyvale 4 Officers</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Noelle Maxwell</p>
                          <p class="card-subtext">President</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf5.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Harriet Fennimore</p>
                          <p class="card-subtext">Vice President</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf6.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Aileen Sims</p>
                          <p class="card-subtext">Secretary</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Damon Reese</p>
                          <p class="card-subtext">Treasurer</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Frederick Roffe</p>
                          <p class="card-subtext">Auditor</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="card" style="width: 18rem;">
                        <img src="./media/content-images/pf3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Phoebe Jackson</p>
                          <p class="card-subtext">P.I.O</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
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
          Contacts
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
        <div class="modal-body">
          Privacy
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="developersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Developers</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          devs
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