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
    }

    .member {
        display: flex;
    }

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
        color: rgb(89, 89, 89);
        font-family: "Poppins", sans-serif;
        text-align: center;
        padding: 1.5vw;
        font-size: max(1.5vw, min(10px));
        cursor: pointer;
        border-bottom: 1px solid lightgray;
    }

    .memberSideBar li:hover {
        background-color: rgb(236, 235, 226);
    }

    .memberPanel {
        flex: 8;
        width: 100%;
        overflow-x: hidden;
    }

    thead {
        top: 0;
        position: sticky;
        text-align: center;
        background-color: rgb(251, 250, 244);
    }

    td,
    th {
        color: rgb(89, 89, 89);
        font-size: 1.2vw;
        border-style: none !important;
        text-align: left;
        width: min-content;
        padding: 0.8vw;
        border: 1px solid lightgray;
    }

    .lbl {
        font-weight: 800;
        width: 1%;
        white-space: nowrap;
    }

    .editBtn {
        width: vw;
        cursor: pointer;
        text-align: right;
    }

    .table-responsive {
        font-size: max(1vw, min(10px));
        max-height: 500px;
        min-height: 20vw;
    }

    .table {
        margin-top: 1vw;
        margin-bottom: 2vw;
        overflow-y: scroll;
        align-items: center;
        justify-self: center;
        margin: 2vw;
        max-width: 95%;
    }

    .inbox {
        overflow: hidden;
        margin: 2vw;
        justify-content: center;
        align-items: center;
    }

    .inboxContainer {
        padding: 2vw;
        padding-left: 0;
        padding-right: 0;
        border-radius: 1vw;
        background-color: rgb(219, 217, 217);
        display: flex;
        width: 95%;
        height: 70vh;
        overflow-x: hidden;
        overflow-y: scroll;
    }

    .tblMessage {
        width: 100%;
        height: 100%;
        max-height: 30px;
    }

    .trInbox {
        color: rgb(89, 89, 89);
        background-color: rgb(219, 217, 217);
        border-bottom: 1px solid rgb(192, 192, 192);
    }

    .trInbox:hover {
        background-color: rgb(233, 233, 233);
        cursor: pointer;
    }

    .msgSender {
        font-family: "Poppins", sans-serif;
        font-size: 1.5vw;
        font-weight: bold;
    }

    .msgDesc {
        max-width: 50vw;
        width: fixed;
        text-align: left;
        font-family: "Poppins", sans-serif;
        font-size: 1.2vw;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .msgTime {
        text-align: center;
        font-family: "Poppins", sans-serif;
        font-size: 1.2vw;
    }

    .inbox {
        width: 100%;
        display: block;
        flex: 8;
    }

    .inboxTitle {
        font-size: 2vw;
        font-family: "Poppins", sans-serif;
        padding: 0;
        margin-bottom: 1vw;
        color: rgb(89, 89, 89);
        font-weight: 800;
    }
</style>

<body>
    <?php require '../marginals/topbar.php'; ?>
    <div class="member">
        <?php require '../marginals/sidebarMemberPanel.php'; ?>
        <div class="inbox" id="inbox">
            <label class="inboxTitle">Messages</label>
            <div class="inboxContainer">
                <table class="tblMessage">
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                    <tr class="trInbox">
                        <td class="msgSender">Jane Doe</td>
                        <td class="msgDesc">
                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit
                            amet, consectetur, adipisci velit sdasdasdasdsadas"
                        </td>
                        <td class="msgTime">9:00 pm</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
    require '../marginals/footer2.php'
        ?>
</body>

</html>