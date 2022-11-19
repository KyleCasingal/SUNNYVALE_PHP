<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="treasurerPanelFacility.css" media="screen">
    <link rel="stylesheet" href="../sidebarTreasurerPanel/sidebarTreasurerPanel.css" media="screen">
    <link rel="stylesheet" href="../topbar/topbar.css" media="screen">
    <link rel="stylesheet" href="../footer/footer.css" media="screen">
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
    <title>SUNNYVALE</title>
</head>
<style>
    * {
        margin: 0;
    }
</style>

<body>
    <?php require '../topbar/topbar.php'; ?>
    <div class="treasurer">
        <?php require '../sidebarTreasurerPanel/sidebarTreasurerPanel.php'; ?>
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
    require '../footer/footer2.php'
    ?>
</body>

</html>