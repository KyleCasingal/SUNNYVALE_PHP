<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<Style>
    .sideBar {
        background-color: rgb(248, 245, 227);
        flex: 2;
        color: black;
    }

    .memberSideBar {
        display: inline;
        justify-content: flex-end;
        margin-top: 5px;
        margin-bottom: 0;
        padding: 0;
        list-style: none;
    }

    .memberSideBar li {
        color: black;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        padding: 1.5vw;
        font-size: max(1.5vw, min(10px));
        cursor: pointer;
        border-bottom: 1px solid lightgray;
    }

    .memberSideBar li:hover {
        background-color: rgb(236, 235, 226);
    }
</Style>

<body>
    <div class="sideBar">
        <form method="post">
            <ul class="memberSideBar">
                <li id="profile" onclick="location.href='../modules/memberPanel.php'">Profile</li>
                <li id="inbox" onclick="location.href='../modules/inboxPanel.php'">Inbox</li>
            </ul>
        </form>
    </div>
</body>

</html>