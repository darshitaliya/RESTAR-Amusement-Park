<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include "./include/connect.php";
?>

<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Restar Merchandise</title>

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
</head>
<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease;
        margin-bottom: 20px; /* Add margin to separate cards */
        background-color: #fff; /* Ensure cards have a white background */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        margin-top: 30px;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Enhance shadow on hover */
    }

    .card-img-top {
        width: 100%;
        height: 350px; /* Adjust image height */
        object-fit: cover; /* Ensure images cover the area without distortion */
        display: block; /* Remove extra space below images */
    }

    .card-body {
        padding: 15px;
        text-align: center;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333; /* Darker text for better readability */
    }

    .card-text {
        font-size: 14px;
        color: #555;
        margin-bottom: 15px;
    }

    .btn-buy {
        background-color: #F7BF39;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 14px;
        width: 100%;
        margin-bottom: 10px; /* Add margin to separate buttons */
    }

    .btn-buy:hover {
        background-color: #e64a19;
    }

    .btn-add-to-cart {
        background-color: #bf1e55;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 14px;
        width: 100%;
    }

    .btn-add-to-cart:hover {
        background-color:rgb(211, 79, 123);
    }

    .container {
        margin-top: 30px;
        padding: 0 15px; /* Add padding to container */
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* Distribute space between cards */
        margin: -15px; /* Compensate for card margins */
    }

    .col-md-4 {
        flex: 0 0 31%; /* Adjust width to fit 3 cards in a row with spacing */
        max-width: 31%;
        padding: 15px; /* Add padding to columns */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .col-md-4 {
            flex: 0 0 48%; /* Two cards per row on smaller screens */
            max-width: 48%;
        }
    }

    @media (max-width: 576px) {
        .col-md-4 {
            flex: 0 0 100%; /* One card per row on mobile */
            max-width: 100%;
        }
    }

    h1 {
        text-align: center;
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin-top: 100px; /* Push down to appear under the navbar */
    }

    .navbar {
        position: fixed; /* Keep navbar fixed */
        top: 0;
        width: 100%;
        z-index: 1000;
    }

    body {
        padding-top: 120px; /* Push content down */
    }

    .card-price {
        font-size: 16px;
        font-weight: bold;
        color: #d9534f; /* Red price color */
        margin-bottom: 10px;
    }

    .cart-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 1px 5px;
        font-size: 10px;
        font-weight: bold;
        display: none; /* Hide by default */
        line-height: 1;
        min-width: 16px;
        text-align: center;
    }
</style>
<body>
<div class="boxed_wrapper">
    <!-- preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div id="handle-preloader" class="handle-preloader about-page-2">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="r" class="letters-loading">r</span>
                        <span data-text-preloader="e" class="letters-loading">e</span>
                        <span data-text-preloader="s" class="letters-loading">s</span>
                        <span data-text-preloader="t" class="letters-loading">t</span>
                        <span data-text-preloader="a" class="letters-loading">a</span>
                        <span data-text-preloader="r" class="letters-loading">r</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="mb-4">RESTAR MERCHANDISE</h1>
        <div class="row">
            <!-- Clothing Item 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="admin/images/cloths/50.jpg" class="card-img-top" alt="Shirt 1">
                    <div class="card-body">
                        <h5 class="card-title">Lycra one Piece Women Swimsuit</h5>
                        <p class="card-price"><strong>Price: ₹250</strong></p>
                        <p class="card-text">Size: S, M, L & More</p>
                        <button class="btn-buy" onclick="window.location.href='checkout.php?item_id=1&item_name=Lycra+one+Piece+Women+Swimsuit&price=250'">Buy Now</button>
                        <button class="btn-add-to-cart" onclick="addToCart(1, 'Lycra one Piece Women Swimsuit', 250)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Clothing Item 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="admin/images/cloths/49.jpg" class="card-img-top" alt="Shirt 2">
                    <div class="card-body">
                        <h5 class="card-title">Lycra one Piece black Women Swimsuit</h5>
                        <p class="card-price"><strong>Price: ₹350</strong></p>
                        <p class="card-text">Size: M, L, XL & More</p>
                        <button class="btn-buy" onclick="window.location.href='checkout.php?item_id=2&item_name=Lycra+one+Piece+black+Women+Swimsuit&price=350'">Buy Now</button>
                        <button class="btn-add-to-cart" onclick="addToCart(2, 'Lycra one Piece black Women Swimsuit', 350)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Clothing Item 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="admin/images/cloths/46.jpg" class="card-img-top" alt="Hoodie 1">
                    <div class="card-body">
                        <h5 class="card-title">Bold Swim shoot for women</h5>
                        <p class="card-price"><strong>Price: ₹350</strong></p>
                        <p class="card-text">Size: M, L, XL & More</p>
                        <button class="btn-buy" onclick="window.location.href='checkout.php?item_id=3&item_name=Bold+Swim+shoot+for+women&price=350'">Buy Now</button>
                        <button class="btn-add-to-cart" onclick="addToCart(3, 'Bold Swim shoot for women', 350)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Clothing Item 4 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="admin/images/cloths/47.jpg" class="card-img-top" alt="Cap 1">
                    <div class="card-body">
                        <h5 class="card-title">Swim Set Top and Swimskirt with Boy Short</h5>
                        <p class="card-price"><strong>Price: ₹350</strong></p>
                        <p class="card-text">Size: S, M, L & More</p>
                        <button class="btn-buy" onclick="window.location.href='checkout.php?item_id=4&item_name=Swim+Set+Top+and+Swimskirt+with+Boy+Short&price=350'">Buy Now</button>
                        <button class="btn-add-to-cart" onclick="addToCart(4, 'Swim Set Top and Swimskirt with Boy Short', 350)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Clothing Item 5 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="admin/images/cloths/11.webp" class="card-img-top" alt="Jacket 1">
                    <div class="card-body">
                        <h5 class="card-title">Three Fourth-Women</h5>
                        <p class="card-price"><strong>Price: ₹300</strong></p>
                        <p class="card-text">Size: M, L, XL & More</p>
                        <button class="btn-buy" onclick="window.location.href='checkout.php?item_id=5&item_name=Three+Fourth-Women&price=300'">Buy Now</button>
                        <button class="btn-add-to-cart" onclick="addToCart(5, 'Three Fourth-Women', 300)">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Clothing Item 6 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="admin/images/cloths/12.webp" class="card-img-top" alt="Sweatshirt 1">
                    <div class="card-body">
                        <h5 class="card-title">Full Pants-Women</h5>
                        <p class="card-price"><strong>Price: ₹350</strong></p>
                        <p class="card-text">Size: S, M, L & More</p>
                        <button class="btn-buy" onclick="window.location.href='checkout.php?item_id=6&item_name=Full+Pants-Women&price=350'">Buy Now</button>
                        <button class="btn-add-to-cart" onclick="addToCart(6, 'Full Pants-Women', 350)">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Function to add item to cart
        function addToCart(itemId, itemName, itemPrice) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let item = { id: itemId, name: itemName, price: itemPrice };
            cart.push(item);
            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Item added to cart!');
            updateCartCount(); // Update the cart count
        }

        // Function to update cart count
        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartCount = cart.length;

            // Update the cart count badge
            let cartBadge = document.getElementById('cart-count');
            if (cartCount > 0) {
                cartBadge.textContent = cartCount;
                cartBadge.style.display = 'inline-block'; // Show the badge
            } else {
                cartBadge.style.display = 'none'; // Hide the badge if cart is empty
            }
        }

        // Update cart count when the page loads
        window.onload = updateCartCount;
    </script>
    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

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