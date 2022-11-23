<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<Style>
    .secretarySideBar {
        display: inline;
        color: black;
        justify-content: flex-end;
        height: 100%;
        margin-top: 5px;
        margin-bottom: 0;
        padding: 0;
        background-color: rgb(248, 245, 227);
    }

    .secretarySideBar li {
        color: black;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        padding: 1.5vw;
        font-size: max(1.5vw, min(10px));
        cursor: pointer;
        border-bottom: 1px solid lightgray;
        list-style: none;
    }

    .secretarySideBar li:hover {
        background-color: rgb(236, 235, 226);
    }
</Style>

<body>

<div class="secretary">
    <div class="secretarySideBar">
        <form method="post">
            <ul class="secretarySideBar">
                <li id="registration" onclick="location.href='../modules/homeownerRegistration.php'">Homeowner Registration</li>
                <li id="approval" onclick="location.href='../modules/userManagement.php'">Approval of Accounts</li>
                <li id="ticket" onclick="location.href='../modules/complaintManagement.php'">Complaint Tickets</li>
                <li id="settings" onclick="">Settings</li>
            </ul>
        </form>
    </div>
</div>
</body>

</html>