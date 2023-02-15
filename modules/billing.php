<?php
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
$resultDues = $con->query("SELECT * FROM monthly_dues_bill");
$resultSubd = $con->query("SELECT * FROM subdivision");

?>
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
        margin-bottom: 2vw;
        padding: 0.5vw;
        max-width: 50vw;
        height: 2vw;
        font-size: 1.2vw;
        border: 0;
        border-radius: 0.8vw;
        margin-bottom: 1vw;
        font-family: 'Poppins', sans-serif;
    }

    select {
        background-color: white;
        margin-right: 2vw;
        width: 15vw;
        max-width: 15vw;
        height: 2vw;
        font-size: 1.2vw;
        border: 0;
        border-radius: 0.8vw;
        margin-bottom: 1vw;
        font-family: 'Poppins', sans-serif;
    }

    input[type="file"] {
        display: none;
    }

    label {
        font-family: 'Poppins', sans-serif;
        margin-right: 0.5vw;
        font-size: max(1.5vw, min(10px));
        padding: 0.5vw;
    }

    thead {
        top: 0;
        position: sticky;
        text-align: center;
        background-color: rgb(170, 192, 175, 0.3);
    }

    th,
    td {
        text-align: center;
        padding: 0.8vw;
        border: 1px solid lightgray;
    }

    .table-responsive {
        font-size: max(1vw, min(10px));
        max-height: 500px;
        min-height: 20vw;
    }

    .table {
        margin-top: 2vw;
        margin-bottom: 2vw;
        overflow-y: scroll;
        align-items: center;
        justify-self: center;
        margin: 2vw;
        max-width: 95%;
    }

    .treasurer {
        width: 100%;
        display: flex;
    }

    .treasurerForm {
        display: flex;
        justify-content: center;
        padding: 2vw;
        margin: 1.5vw;
        width: 95%;
        border-radius: 1vw;
        flex-direction: column;
        background-color: rgb(170, 192, 175, 0.3);
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

    .facilityRenting {
        display: block;
        width: 95%;
    }

    .amenitiesForm {
        width: 100%;
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

    .lblTable {
        font-size: 2vw;
        font-family: "Poppins", sans-serif;
        margin-left: 2vw;
        margin-bottom: -2vw;
        padding: 0;
        color: rgb(89, 89, 89);
        font-weight: 800;
    }

    .select-homeowner {
        width: 80%;
    }

    .lblTitle {
        font-size: 2vw;
    }
    .tblBilling-form td{
        text-align: left;
    }
</style>

<body>
    <?php require '../marginals/topbar.php'; ?>
    <div class="treasurer">
        <?php require '../marginals/sidebarTreasurerPanel.php'; ?>
        <div class="treasurerPanel">
            <div class="monthlyDues" id="monthlyDues">
                <div class="treasurerForm">
                    <label class="lblTitle">Generate billing</label>
                    <label>Generate for: </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Homeowner
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Month
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Year
                        </label>
                    </div>
                    <div>
                        <table class="tblBilling-form">
                            <tr>
                                <td> <label for="">Search for Homeowner</label> </td>
                                <td><input type="search" name="" id=""></td>
                                <td><label for="">Select Subdivision</label></td>
                                <td> <select name="homeowner" id="homeowner">
                                        <option value="">Select...</option>
                                        <?php
                                        while ($rowSubdivision = $resultSubd->fetch_assoc()) {
                                            echo '<option value="' . $rowSubd['subdivision_id'] . '">' . $rowSubdivision['subdivision_name'] . '</option>';
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td><label for="">From:</label></td>
                                <td>
                                    <select name="" id="">
                                        <option value="">January</option>
                                        <option value="">Fenruary</option>
                                        <option value="">March</option>
                                        <option value="">April</option>
                                        <option value="">May</option>
                                        <option value="">June</option>
                                        <option value="">July</option>
                                        <option value="">August</option>
                                        <option value="">September</option>
                                        <option value="">October</option>
                                        <option value="">November</option>
                                        <option value="">December</option>

                                    </select>
                                </td>
                                <td><label for="">To:</label></td>
                                <td><select name="" id="">
                                        <option value="">January</option>
                                        <option value="">Fenruary</option> 
                                        <option value="">March</option>
                                        <option value="">April</option>
                                        <option value="">May</option>
                                        <option value="">June</option>
                                        <option value="">July</option>
                                        <option value="">August</option>
                                        <option value="">September</option>
                                        <option value="">October</option>
                                        <option value="">November</option>
                                        <option value="">December</option>

                                    </select></td>
                            </tr>
                        </table>








                    </div>
                    <button class="btnSubmitPost" name="submitPost" id="submitPost">Generate</button>
                </div>
                <!-- <label class="lblTable">Recent Monthly Dues Payments</label>
                <div class="table-responsive">
                    <table id="dtBasicExample" class="table table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Subdivision</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Address</th>
                                <th>Paid at</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $resultDues->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row['homeowner_name'] ?></td>
                                    <td><?php echo $row['subdivision'] ?></td>
                                    <td><?php echo $row['month'] ?></td>
                                    <td><?php echo $row['year'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['paid_at'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                <?php endwhile; ?>
                                </tr>
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
    </div>
    <?php
    require '../marginals/footer2.php'
    ?>
</body>

</html>