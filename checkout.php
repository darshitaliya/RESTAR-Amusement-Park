<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include "./include/connect.php";

// Get item details from the URL
$item_id = $_GET['item_id'] ?? null;
$item_name = $_GET['item_name'] ?? 'Unknown Item';
$price = $_GET['price'] ?? 0;

if (!$item_id) {
    die("Invalid item.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Checkout - Restar Merchandise</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/amusement-park.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/owl.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

    <style>
        .checkout-container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            margin-top: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .checkout-container h2 {
            font-size: 26px;
            margin-bottom: 50px;
            color: #333;
        }

        .checkout-container p {
            font-size: 20px;
            color: #555;
            margin-bottom: 20px;
        }

        .checkout-container .btn-confirm {
            background-color: #F7BF39;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .checkout-container .btn-confirm:hover {
            background-color: #e64a19;
        }
    </style>
</head>

<body>
    <div class="boxed_wrapper">
        <!-- Include Header -->
        <?php include 'header.php'; ?>

        <!-- Checkout Content -->
        <div class="checkout-container">
            <h2>Checkout</h2>
            <p>You are purchasing: <strong><?php echo htmlspecialchars($item_name); ?></strong></p>
            <p>Price: <strong>₹<?php echo htmlspecialchars($price); ?></strong></p>
            <button class="btn-confirm" onclick="confirmPurchase()">Confirm Purchase</button>
        </div>

        <!-- Include Footer -->
        <?php include 'footer.php'; ?>
    </div>

    <!-- JavaScript for Confirmation -->
    <script>
        function confirmPurchase() {
            // Simulate a purchase confirmation
            alert('Thank you for your purchase!');
            window.location.href = 'index.php'; // Redirect to home or another page
        }
    </script>

    <!-- jQuery plugins -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/parallax.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/scrollbar.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>
</body>

</html>