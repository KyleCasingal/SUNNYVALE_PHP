<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
    <title>SUNNYVALE</title>
</head>
<style>
    * {
        margin: 0;
    }

    input {
        padding: 0.5vw;
        max-width: 50vw;
        height: 2vw;
        font-size: 1.2vw;
        border: 0;
        border-radius: 0.8vw;
        font-family: "Newsreader", serif;
        margin-bottom: 1vw;
    }

    select {
        margin-right: 2vw;
        width: 15vw;
        max-width: 15vw;
        height: 2vw;
        font-size: 1.2vw;
        border: 0;
        border-radius: 0.8vw;
        font-family: "Newsreader", serif;
        margin-bottom: 1vw;
    }

    label {
        margin-right: 0.5vw;
        font-size: max(1.5vw, min(10px));
        padding: 0.5vw;
    }

    .treasurer {
        width: 100%;
        display: flex;
    }

    .facilityRenting {
        display: flex;
        justify-content: center;
        padding: 2vw;
        margin: 1.5vw;
        width: 70%;
        border-radius: 1vw;
        flex-direction: column;
        background-color: rgba(234, 232, 199, 0.2);
        font-family: "Newsreader", serif;
    }

    .imagePrev {
        max-width: 30vw;
        max-height: 20vw;
        margin-bottom: 1vw;
    }

    .treasurerPanel {
        flex: 8;
        width: 100%;
        overflow-y: scroll;
    }

    .sideBar {
        background-color: rgb(248, 245, 227);
        flex: 2;
        color: black;
    }

    .treasurerSideBar {
        display: inline;
        justify-content: flex-end;
        margin-top: 5px;
        margin-bottom: 0;
        padding: 0;
        list-style: none;
    }

    .treasurerSideBar li {
        color: black;
        font-family: "Poppins", sans-serif;
        text-align: center;
        padding: 1.5vw;
        font-size: max(1.5vw, min(10px));
        cursor: pointer;
        border-bottom: 1px solid lightgray;
    }

    .treasurerSideBar li:hover {
        background-color: rgb(236, 235, 226);
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
        background-color: rgba(167, 197, 167);
    }
</style>

<body>
    <?php require '../marginals/topbar.php'; ?>
    <div class="treasurer">
        <?php require '../marginals/sidebarTreasurerPanel.php'; ?>
        <div class="treasurerPanel">
            <div class="facilityRenting" id="facilityRenting">
                <label>Name:</label>
                <input type="text" name="name" id="name" />
                <div class="timeinput">
                    <label>Time:</label>
                    <input type="time" name="time" id="time" min="6:00" max="21:00" required />
                    <label>To</label>
                    <input type="time" name="time2" id="time2" min="6:00:00" max="21:00:00" required />
                    <label>6:00am to 9:00pm only</label>
                </div>
                <label>Date:</label>
                <input type="date" />
                <label>Amenity:</label>
                <select name="amenity" id="amenity">
                    <option value="Basketball Court">Basketball Court</option>
                    <option value="Volleyball Court">Volleyball Court</option>
                    <option value="Badminton Court">Badminton Court</option>
                    <option value="Multi-purpose Hall">Multi-purpose Hall</option>
                </select>
                <label>Amount:</label>
                <input type="text" readOnly />
                <button class="btnSubmitPost" name="submitPost" id="submitPost">Submit Reservation</button>
            </div>
        </div>
    </div>
    <?php
    require '../marginals/footer2.php'
    ?>
</body>

</html>