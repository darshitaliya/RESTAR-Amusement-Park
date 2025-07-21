<?php

include "../include/connect.php";

session_start();

if (isset($_GET['id']) && isset($_GET['cardno']) && isset($_GET['cardname']) && isset($_GET['cardemail']) && isset($_GET['cardmonth']) && isset($_GET['cardyear']) && isset($_GET['cvv'])) {
    $id = $_GET['id'];
    $cardno = $_GET['cardno'];
    $cardname = $_GET['cardname'];
    $cardemail = $_GET['cardemail'];
    $cardmonth = $_GET['cardmonth'];
    $cardyear = $_GET['cardyear'];
} else {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Restar Admin</title>
    <script src="https://kit.fontawesome.com/206142e5bd.js" crossorigin="anonymous"></script>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/amusement-park.png" />
</head>
<Style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 50px 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }
        th {
            width: 150px;
            background-color: #007bff;
            color: #fff;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
        }
        .btn {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 20px auto;
        }
</Style>
<body>
<div class="container">
        <h1 class="display-4">Room Booking Details</h1>
        <table class="table table-bordered">
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Card Id</td>
                <td>
                    <?php echo $id; ?>
                </td>
            </tr>
            <tr>
                <td>Cardno</td>
                <td>
                    <?php echo $cardno; ?>
                </td>
            </tr>
            <tr>
                <td>Cardname</td>
                <td>
                    <?php echo $cardname; ?>
                </td>
            </tr>
            <tr>
                <td>Cardemail</td>
                <td>
                    <?php echo $cardemail; ?>
                </td>
            </tr>
            <tr>
                <td>Cardmonth</td>
                <td>
                    <?php echo $cardmonth; ?>
                </td>
            </tr>
            <tr>
                <td>Cardyear</td>
                <td>
                    <?php echo $cardyear; ?>
                </td>
            </tr>
        </table>
        <br>
        <a href="rbpayment.php" class="btn btn-primary">Back to Dashboard</a>
    </div>
</body>

</html>