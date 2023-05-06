<?php
require '../marginals/topbar.php';
if ($_SESSION['user_type'] != 'Treasurer' and $_SESSION['user_type'] != 'Admin') {
    echo '<script>window.location.href = "../modules/blogHome.php";</script>';
    exit;
}
$rowZ = $result->fetch_assoc();
$resultDues = $con->query("SELECT * FROM monthly_dues_bill");
$resultSubdivision = $con->query("SELECT * FROM monthly_dues ORDER BY monthly_dues_id ASC");
$resultSubdivision1 = $con->query("SELECT * FROM monthly_dues ORDER BY monthly_dues_id ASC");
$resultSubdivision2 = $con->query("SELECT * FROM monthly_dues ORDER BY monthly_dues_id ASC");
$resultSubdivision3 = $con->query("SELECT * FROM monthly_dues ORDER BY monthly_dues_id ASC");
$resultHomeowners = $con->query("SELECT CONCAT(first_name, ' ', last_name)  AS fullname, subdivision, email_address FROM `homeowner_profile` WHERE `subdivision` != '' ");
$resultHomeowners1 = $con->query("SELECT CONCAT(first_name, ' ', last_name)  AS fullname, subdivision, email_address FROM `homeowner_profile` WHERE `subdivision` != '' ");

//homeowner
$resultYearToday = $con->query("SELECT * FROM billing_period WHERE year= '" . date('Y') . "'  ORDER BY billingPeriod_id ASC");
$resultYearToday1 = $con->query("SELECT * FROM billing_period WHERE year= '" . date('Y') . "' ORDER BY billingPeriod_id ASC");
//monthly
$resultYearToday2 = $con->query("SELECT * FROM billing_period WHERE year= '" . date('Y') . "' ORDER BY billingPeriod_id ASC");
$resultYearToday3 = $con->query("SELECT * FROM billing_period WHERE year= '" . date('Y') . "' ORDER BY billingPeriod_id ASC");
//annual
$resultYearToday4 = $con->query("SELECT * FROM billing_period WHERE year=  '" . date('Y') . "'  ORDER BY billingPeriod_id ASC LIMIT 1");
$resultYearToday5 = $con->query("SELECT * FROM billing_period WHERE year=  '" . date('Y') . "'  ORDER BY billingPeriod_id DESC LIMIT 1");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#000000" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

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
        font-size: 1vw;
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
        font-size: max(1.2vw, min(10px));
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
        font-size: 1.5vw;
    }

    .tblBilling-form td {

        text-align: left;
        border: none;
        padding: 0;
        vertical-align: top;
    }

    .accordion {
        background-color: rgb(170, 192, 175, 0.3);
        border: none !important;
    }

    .accordion-header {
        border: none !important;
        font-family: 'Poppins', sans-serif;
    }

    .accordion-button {
        border: none !important;
        background-color: rgb(170, 192, 175, 0.3);
        font-size: 1.2vw;
    }

    .accordion-body {
        background-color: rgb(170, 192, 175, 0.3);
        border: none !important;
    }

    .accordion-collapse {
        border: none !important;
    }

    .Homeowner-table {
        width: 100%;
        font-family: 'Poppins', sans-serif;
    }

    .Homeowner-table-data-row:hover {
        background-color: lightgray;
    }

    .sideBar {
        background-color: rgb(248, 245, 227);
        flex: 2;
        color: black;
    }

    .secretarySideBar {
        display: inline;
        justify-content: flex-end;
        margin-top: 5px;
        margin-bottom: 0;
        padding: 0;
        list-style: none;
    }

    .secretarySideBar li {
        color: rgb(89, 89, 89);
        font-family: "Poppins", sans-serif;
        text-align: center;
        padding: 1.5vw;
        padding-left: 0.5vw;
        padding-right: 0.5vw;
        font-size: max(1.5vw, min(10px));
        cursor: pointer;
        border-bottom: 1px solid lightgray;
    }

    .secretarySideBar li:hover {
        background-color: rgb(236, 235, 226);
    }
    .year-text{
        margin-left: 1em;
    }
</style>
<script>
    $(document).ready(function() {
        $("#monthly_dues_id").on('click', function() {
            var monthly_dues_id = $(this).val();
            if (monthly_dues_id) {
                $.ajax({
                    type: 'POST',
                    url: '../process.php/',
                    data: 'monthly_dues_id=' + monthly_dues_id,
                    success: function(html) {
                        $("#subdivisionMonthlyAmount").html(html);
                    }
                });
            }
        });
    });


    $(document).ready(function() {
        $("#subdivisionHomeowner_id").on('click', function() {
            var subdivision_id_homeowner = $(this).val();
            if (subdivision_id_homeowner) {
                $.ajax({
                    type: 'POST',
                    url: '../process.php/',
                    data: 'subdivision_id_homeowner=' + subdivision_id_homeowner,
                    success: function(html) {
                        $("#homeowner-amount").html(html);
                        $("#Homeowner_id").html(html);
                    }
                });
            }
        });
    });

    $(document).ready(function() {
        $("#subdivisionAnnual_id").on('click', function() {
            var monthly_dues_id = $(this).val();
            if (monthly_dues_id) {
                $.ajax({
                    type: 'POST',
                    url: '../process.php/',
                    data: 'monthly_dues_id=' + monthly_dues_id,
                    success: function(html) {
                        $("#AnnualAmount").html(html);

                    }
                });
            }
        });
    });

    $(document).ready(function() {
        $('.accordion-button').on("click", function(e) {
            $("#subdivisionHomeowner_id").val("");
            $("#homeowner-name").val("");
            $("#month-select-homeowner-from").val("");
            $("#month-select-homeowner-to").val("");
            document.getElementById("homeowner-amount").setAttribute("value", "");


            $("#monthly_dues_id").val("");
            $("#homeowner-name").val("");
            $("#month-select-monthly-dues-from").val("");
            $("#month-select-monthly-dues-to").val("");
            document.getElementById("subdivisionMonthlyAmount").setAttribute("value", "");

            $("#subdivisionAnnual_id").val("");
            document.getElementById("AnnualAmount").setAttribute("value", "");

        });
    });
    // $(document).ready(function() {
    //     $("#subdivisionHomeowner_id").on('click', function() {
    //         var subdivisionHomeowner_id = $(this).val();
    //         if (subdivisionHomeowner_id) {
    //             $.ajax({
    //                 type: 'POST',
    //                 url: '../process.php/',
    //                 data: 'subdivisionHomeowner_id=' + subdivisionHomeowner_id,
    //                 success: function(html) {
    //                     $("#Homeowner_id").html(html);
    //                 }
    //             });
    //         }
    //     });
    // });
</script>

<body>

    <div class="treasurer">
        <div class="sideBar">
            <?php require '../marginals/sidebarAdmin.php'; ?>
        </div>
        <div class="treasurerPanel">
            <div class="monthlyDues" id="monthlyDues">
                <div class="treasurerForm">
                    <label class="lblTitle">Generate billing for:</label>

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" id="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Homeowner
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body" id="accordion-body">
                                    <form action="" method="post" id="myForm">

                                        <div class="modal fade" id="confirmHome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you really want to generate?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success" name="billHomeowner" id="billHomeowner">Yes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <table class="tblBilling-form">

                                            <tr>
                                                <!-- para sa homeowner i echo lahat ng mga homeowner tas ppili nalang din kagaya ng subdivision, pero pwede i 
                                                filter kung ano ano lalabas gamit subdivision, at kung nahanap na yung homeowner ay mag auto na lagay yung subdivision.
                                                or pwede din mag lagay nalang ng button dun sa babang table para i echo nalang yung laman nung full name dito sa name-->
                                                <td><label for="">Select Subdivision:</label></td>
                                                <td> <select name="subdivision" id="subdivisionHomeowner_id" required>
                                                        <option value="">Select...</option>
                                                        <?php
                                                        while ($rowSubdivision = $resultSubdivision->fetch_assoc()) : {
                                                                echo '<option value="' . $rowSubdivision['subdivision_id'] . '">' . $rowSubdivision['subdivision_name'] . '</option>';
                                                            }
                                                        ?>
                                                        <?php endwhile; ?>
                                                    </select>


                                                </td>
                                                <td><label>Name:</label></td>
                                                <td><select name="homeowner" id="Homeowner_id" required>

                                                        <option value="">Select...</option>
                                                        <!-- <?php
                                                                while ($rowHomeowner = $resultHomeowners1->fetch_assoc()) : {
                                                                        echo '<option value="' . '">' . $rowHomeowner['fullname'] . '</option>';
                                                                    }
                                                                ?>
                                                        <?php endwhile; ?> -->
                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td><label for="">From:</label></td>
                                                <td>
                                                    <select name="month_select_monthly_dues_from" id="month-select-monthly-dues-from" required>
                                                        <option value="">Select...</option>
                                                        <?php
                                                        while ($rowMonth = $resultYearToday->fetch_assoc()) : {
                                                                echo '<option value="' . $rowMonth['billingPeriod_id'] . '">' . $rowMonth['month'] . '</option>';
                                                            }
                                                        ?>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </td>
                                                <td><label for="">To:</label></td>
                                                <td><select name="month_select_monthly_dues_to" id="month-select-monthly-dues-to" required>
                                                        <option value="">Select...</option>
                                                        <?php
                                                        while ($rowMonth = $resultYearToday1->fetch_assoc()) : {
                                                                echo '<option value="' . $rowMonth['billingPeriod_id'] . '">' . $rowMonth['month'] . '</option>';
                                                            }
                                                        ?>
                                                        <?php endwhile; ?>
                                                    </select></td>
                                                <!-- <td><input type="text" <?php
                                                                            $dateYear = date('Y');
                                                                            echo "value = '$dateYear'";
                                                                            ?> id="" readonly></td>-->
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="">Amount: </label>
                                                </td>
                                                <td><input name="homeownerAmount" type="text" value="" id="homeowner-amount" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btnSubmitPost" id="billHomeowner1">Generate</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button onclick="ClearFields();" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Month
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body" id="accordion-body">
                                    <form action="" method="post" id="myForm">

                                        <div class="modal fade" id="confirmMonth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you really want to generate?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success" name="billMonth" id="billMonth">Yes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <table class="tblBilling-form">
                                            <tr>
                                                <td><label for="">Select Subdivision</label></td>
                                                <td> <select name="subdivision-monthly" id="monthly_dues_id" required>
                                                        <option value="">Select...</option>
                                                        <?php
                                                        while ($rowSubdivision1 = $resultSubdivision1->fetch_assoc()) : {
                                                                echo '<option value="' . $rowSubdivision1['monthly_dues_id'] . '">' . $rowSubdivision1['subdivision_name'] . '</option>';
                                                            }
                                                        ?>
                                                        <?php endwhile; ?>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><label for="">From:</label></td>
                                                <td>
                                                    <select name="month_select_monthly_dues_from" id="month-select-monthly-dues-from" required>
                                                        <option value="">Select...</option>
                                                        <?php
                                                        while ($rowMonth = $resultYearToday2->fetch_assoc()) : {
                                                                echo '<option value="' . $rowMonth['billingPeriod_id'] . '">' . $rowMonth['month'] . '</option>';
                                                            }
                                                        ?>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </td>
                                                <td><label for="">To:</label></td>
                                                <td><select name="month_select_monthly_dues_to" id="month-select-monthly-dues-to" required>
                                                        <option value="">Select...</option>
                                                        <?php
                                                        while ($rowMonth = $resultYearToday3->fetch_assoc()) : {
                                                                echo '<option value="' . $rowMonth['billingPeriod_id'] . '">' . $rowMonth['month'] . '</option>';
                                                            }
                                                        ?>
                                                        <?php endwhile; ?>
                                                    </select></td>
                                                <td><input class="year-text" type="text" <?php
                                                                        $dateYear = date('Y');
                                                                        echo "value = '$dateYear'";
                                                                        ?> id="" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="">Amount: </label>
                                                </td>
                                                <td><input name="monthlyAmount" type="text" value="" id="subdivisionMonthlyAmount" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btnSubmitPost" id="billMonth1">Generate</button>
                                                </td>
                                            </tr>
                                        </table>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Annual
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body" id="accordion-body">
                                    <form action="" method="post" id="myForm">

                                        <div class="modal fade" id="confirmAnnual" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you really want to generate?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success" name="billAnnual" id="billAnnual">Yes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="tblBilling-form">
                                            <tr>
                                                <!-- <td> <label for="">Search for Homeowner</label> </td>
                                            <td><input type="search" name="" id=""></td> -->
                                                <td><label for="">Select Subdivision</label></td>
                                                <td> <select name="subdivision-annual" id="subdivisionAnnual_id" required>
                                                        <option value="">Select...</option>
                                                        <?php
                                                        while ($rowSubdivision2 = $resultSubdivision2->fetch_assoc()) : {
                                                                echo '<option value="' . $rowSubdivision2['monthly_dues_id'] . '">' . $rowSubdivision2['subdivision_name'] . '</option>';
                                                            }
                                                        ?>
                                                        <?php endwhile; ?>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><label for="">From:</label></td>
                                                <td>
                                                    <select name="month_select_annual_from" id="month-select-annual-from" required>
                                                        <!-- <option value="">Select...</option> -->
                                                        <?php
                                                        while ($rowMonth = $resultYearToday4->fetch_assoc()) : {
                                                                echo '<option value="' . $rowMonth['billingPeriod_id'] . '">' . $rowMonth['month'] . '</option>';
                                                            }
                                                        ?>
                                                        <?php endwhile; ?>
                                                </td>
                                                <td><label for="">To:</label></td>
                                                <td>
                                                    <select name="month_select_annual_to" id="month-select-annual-to" required>
                                                        <!-- <option value="">Select...</option> -->
                                                        <?php
                                                        while ($rowMonth = $resultYearToday5->fetch_assoc()) : {
                                                                echo '<option value="' . $rowMonth['billingPeriod_id'] . '">' . $rowMonth['month'] . '</option>';
                                                            }
                                                        ?>
                                                        <?php endwhile; ?>

                                                </td>
                                                <td><input class="year-text" type="text" name="yearNow" value="<?php
                                                                                                $dateYear = date('Y');
                                                                                                echo $dateYear;
                                                                                                ?>" id="yearNow" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="">Amount: </label>
                                                </td>
                                                <td><input type="text" name="AnnualAmount" value="" id="AnnualAmount" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <form action="" method="post">

                                                        <button type="button" class="btnSubmitPost" name="billAnnual" id="billAnnual1">Generate</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require '../marginals/footer2.php'
    ?>
</body>
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("Homeowner_table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function myFunction1() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("homeowner");
        filter = input.value.toUpperCase();
        table = document.getElementById("Homeowner_table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    };

    $(document).ready(function() {
        $("#billHomeowner1").click(function() {
            $('#confirmHome').modal('show');
        });
    });

    $(document).ready(function() {
        $("#billMonth1").click(function() {
            $('#confirmMonth').modal('show');
        });
    });

    $(document).ready(function() {
        $("#billAnnual1").click(function() {
            $('#confirmAnnual').modal('show');
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>