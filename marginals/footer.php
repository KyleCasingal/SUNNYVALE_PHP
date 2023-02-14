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

  .carousel-item {
    padding-left: 10vw;
    padding-right: 10vw;
    padding-bottom: 5vw;

  }

  .aboutTitle {
    font-size: 1.5vw;
  }

  .modal-officers {
    margin: 0;
  }
 
 
  td {
    padding: 1.5vw;
  }
</style>

<body>
  <div class='footer'>

    <div class="footerCenter">
      <img src=".\img\logoSVgray.png" alt="" />
      <i class="footerListTitle">Sunnyvale Subdivision</i>


    </div>
    <ul class="footerList">
      <li class="footerListItem" data-bs-toggle="modal" data-bs-target="#aboutModal">ABOUT</li>
      <li class="footerListItem" data-bs-toggle="modal" data-bs-target="#contactModal">CONTACT</li>
      <li class="footerListItem" data-bs-toggle="modal" data-bs-target="#privacyModal">PRIVACY</li>
      <li class="footerListItem" data-bs-toggle="modal" data-bs-target="#developersModal">DEVELOPERS</li>
    </ul>
  </div>

  <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">About</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-officers">
          <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>

            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <table>
                  <tr>
                    <td class="aboutTitle">Sunnyvale 1 Officers</td>
                  </tr>
                  <tr>
                    <td>President:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Vice President:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Secretary:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Treasurer:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                  </tr>
                </table>
              </div>
              <div class="carousel-item">
                <table>
                  <tr>
                    <td class="aboutTitle">Sunnyvale 2 Officers</td>
                  </tr>
                  <tr>
                    <td>President:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Vice President:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Secretary:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Treasurer:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                  </tr>
                </table>
              </div>
              <div class="carousel-item">
                <table>
                  <tr>
                    <td class="aboutTitle">Sunnyvale 3 Officers</td>
                  </tr>
                  <tr>
                    <td>President:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Vice President:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Secretary:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Treasurer:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                  </tr>
                </table>
              </div>
              <div class="carousel-item">
                <table>
                  <tr>
                    <td class="aboutTitle">Sunnyvale 4 Officers</td>
                  </tr>
                  <tr>
                    <td>President:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Vice President:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Secretary:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
                    <td>Treasurer:</td>
                    <td>name here</td>
                  </tr>
                  <tr>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">About</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          About the Subdivision
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">About</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          About the Subdivision
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">About</h1>
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