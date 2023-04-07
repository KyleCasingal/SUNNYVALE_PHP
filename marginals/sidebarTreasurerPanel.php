<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<Style>
    .sideBar {
        background-color: rgb(170, 192, 175, 0.3);
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
        color: rgb(89, 89, 89);
        font-family: 'Poppins', sans-serif;
        text-align: center;
        padding: 1.5vw;
        font-size: max(1.5vw, min(10px));
        cursor: pointer;
        border-bottom: 1px solid lightgray;
    }

    .treasurerSideBar li:hover {
        background-color: rgb(236, 235, 226);
    }

    .btnSettings {
        color: rgb(89, 89, 89);
        font-family: "Poppins", sans-serif;
        text-align: center;
        font-size: max(1.5vw, min(10px));
        background-color: rgb(0, 0, 0, 0);
        border: none;
        width: 100%;
        height: 100%;

    }
</Style>

<body>
    <div class="sideBar">
        <form method="post">
            <ul class="treasurerSideBar">
                <li id="dues" onclick="location.href='../modules/treasurerPanel.php'">Monthly Dues</li>
                <li id="facility">
                    <button type="button" class="btnSettings" data-bs-toggle="dropdown" aria-expanded="false">
                        Amenity <i class="fa-sharp fa-solid fa-chevron-right"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li id="Amenities" onclick="location.href='../modules/treasurerPanelFacility.php'">Amenity Renting</li>
                        <li id="Amenities" onclick="location.href='../modules/treasurerPanelReservation.php'">Reservation List</li>
                    </ul>
                </li>

                <li id="billing" onclick="location.href='../modules/billing.php'">Billing</li>
            </ul>
        </form>
    </div>
</body>

</html>