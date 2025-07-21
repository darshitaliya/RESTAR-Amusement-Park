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

<body>
    <div class="container mx-5 mt-5">
        <h1 class="display-4 text-center fw-bolder text-primary">Ticket Booking Payment Details</h1>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>Card Id</th>
                <td>
                    <?php echo $id; ?>
                </td>
            </tr>
            <tr>
                <th>Cardno</th>
                <td>
                    <?php echo $cardno; ?>
                </td>
            </tr>
            <tr>
                <th>Cardname</th>
                <td>
                    <?php echo $cardname; ?>
                </td>
            </tr>
            <tr>
                <th>Cardemail</th>
                <td>
                    <?php echo $cardemail; ?>
                </td>
            </tr>
            <tr>
                <th>Cardmonth</th>
                <td>
                    <?php echo $cardmonth; ?>
                </td>
            </tr>
            <tr>
                <th>Cardyear</th>
                <td>
                    <?php echo $cardyear; ?>
                </td>
            </tr>
        </table>
        <br>
        <a href="tbpayment.php" class="btn btn-primary">Back to Dashboard</a>
    </div>
</body>

</html>