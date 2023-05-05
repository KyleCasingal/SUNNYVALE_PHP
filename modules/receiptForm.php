<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz@6..72&family=Poppins:wght@400;800&family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .receipt-head {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .receipt-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding-top: 1.5em;
    }

    .head-title {
        font-weight: bold;
        font-size: 1.2em;
    }

    .head-subtext {
        font-weight: normal;
        font-size: 0.7em;
    }

    .receipt-table {
        width: 100%;
        font-size: 0.8em;
    }

    .receipt-table tbody {
        border: 1px solid black;
    }

    .receipt-table th {
        border: 1px solid black;
    }

    .receipt-table td,
    th {
        padding: 0.5em;
    }

    .amount-td,
    .total-amount-td {
        border: 1px solid black;
        text-align: center;
    }

    .amount-total-label {
        border: 1px solid black;
    }

    .modal-body {
        width: 80%;
        align-self: center;
        justify-self: center;
    }

    .receipt-content {
        text-align: center;
    }

    .receipt-label {
        padding: 0.8em;
        font-size: 1em;
        font-weight: bold;
        align-self: flex-start;
    }
</style>

<body>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Receipt</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="receipt-head">
                        <label class="head-title" for="">Sunnyvale Home Owners Association</label>
                        <label class="head-subtext" for="">Sunnyvale Subdivision Compound, Binangonan Rizal</label>
                    </div>
                    <div class="receipt-body">
                        <label class="receipt-label">Monthly Dues</label>
                        <table class="receipt-table">
                            <thead>
                                <th>Name</th>
                                <th>Date Paid</th>
                                <th>Status</th>
                                <th>Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="receipt-content">Kyle Casingal</td>
                                    <td class="receipt-content">5/5/2023</td>
                                    <td class="receipt-content">PAID</td>
                                    <td class="amount-td">500</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="amount-total-label">Total:</td>
                                    <td class="total-amount-td">500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="receipt-footer"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Hide this modal and show the first with the button below.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>