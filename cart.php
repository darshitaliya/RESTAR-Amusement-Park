<?php
session_start(); // Start the session

if (!isset($_SESSION['email'])) { // Check if the user is logged in
    header("Location: login.php"); // Redirect to login page if not logged in
    exit(); // Stop further execution
}

include "./include/connect.php"; // Include database connection
?>

<?php include 'header.php'; ?> <!-- Include the header file -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> <!-- Set character encoding -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Ensure compatibility with IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> <!-- Responsive design -->

    <title>Cart - Restar Merchandise</title> <!-- Page title -->

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/amusement-park.png" type="image/x-icon"> <!-- Favicon -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet"> <!-- Google Fonts -->

    <!-- Stylesheets -->
    <link href="assets/css/font-awesome-all.css" rel="stylesheet"> <!-- Font Awesome -->
    <link href="assets/css/flaticon.css" rel="stylesheet"> <!-- Flaticon icons -->
    <link href="assets/css/owl.css" rel="stylesheet"> <!-- Owl Carousel -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"> <!-- Bootstrap CSS -->
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet"> <!-- Fancybox -->
    <link href="assets/css/animate.css" rel="stylesheet"> <!-- Animate.css -->
    <link href="assets/css/color.css" rel="stylesheet"> <!-- Color CSS -->
    <link href="assets/css/style.css" rel="stylesheet"> <!-- Main stylesheet -->
    <link href="assets/css/responsive.css" rel="stylesheet"> <!-- Responsive CSS -->
</head>
<style>
    .cart-container {
        margin-top: 100px; /* Add top margin */
        padding: 20px; /* Add padding */
    }

    .cart-item {
        border: 1px solid #ddd; /* Add border */
        border-radius: 10px; /* Rounded corners */
        padding: 15px; /* Add padding */
        margin-bottom: 15px; /* Add bottom margin */
        background-color: #fff; /* White background */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow */
    }

    .cart-item h4 {
        margin-bottom: 10px; /* Add bottom margin */
        color: #333; /* Dark text color */
    }

    .cart-item p {
        margin-bottom: 5px; /* Add bottom margin */
        color: #555; /* Gray text color */
    }

    .btn-remove {
        background-color: #d9534f; /* Red background */
        color: white; /* White text */
        padding: 5px 10px; /* Add padding */
        border: none; /* Remove border */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Pointer cursor */
        transition: background-color 0.3s ease; /* Smooth transition */
    }

    .btn-remove:hover {
        background-color: #c9302c; /* Darker red on hover */
    }

    .btn-checkout {
        background-color: #F7BF39; /* Yellow background */
        color: white; /* White text */
        padding: 10px 20px; /* Add padding */
        border: none; /* Remove border */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Pointer cursor */
        transition: background-color 0.3s ease; /* Smooth transition */
        font-size: 16px; /* Font size */
        margin-top: 20px; /* Add top margin */
    }

    .btn-checkout:hover {
        background-color: #4cae4c; /* Green on hover */
    }

    .total-price {
        font-size: 20px; /* Font size */
        font-weight: bold; /* Bold text */
        color: #333; /* Dark text color */
        margin-top: 20px; /* Add top margin */
    }

    h1 {
        text-align: center; /* Center align text */
        margin-top: 50px; /* Add top margin */
        padding: 20px; /* Add padding */
    }

    .quantity-controls {
        display: flex; /* Flexbox layout */
        align-items: center; /* Center align items */
        margin-top: 10px; /* Add top margin */
    }

    .quantity-controls button {
        background-color: #f0f0f0; /* Light gray background */
        border: 1px solid #ddd; /* Add border */
        padding: 5px 10px; /* Add padding */
        cursor: pointer; /* Pointer cursor */
        font-size: 16px; /* Font size */
    }

    .quantity-controls button:hover {
        background-color: #ddd; /* Darker gray on hover */
    }

    .quantity-controls span {
        margin: 0 10px; /* Add horizontal margin */
        font-size: 16px; /* Font size */
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

    <div class="cart-container">
        <h1>YOUR CART</h1>
        <div id="cart-items"></div>
        <div class="total-price" id="total-price"></div>
        <button class="btn-checkout" onclick="proceedToCheckout()">Proceed to Checkout</button>
        <a href="index.php#restra-merch">
    <button class="btn-checkout">Buy More</button>
</a>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?> <!-- Include the footer file -->

    <!-- jQuery plugins -->
    <script src="assets/js/jquery.js"></script> <!-- jQuery library -->
    <script src="assets/js/parallax.js"></script> <!-- Parallax effect -->
    <script src="assets/js/popper.min.js"></script> <!-- Popper.js -->
    <script src="assets/js/bootstrap.min.js"></script> <!-- Bootstrap JS -->
    <script src="assets/js/owl.js"></script> <!-- Owl Carousel -->
    <script src="assets/js/wow.js"></script> <!-- Wow.js -->
    <script src="assets/js/validation.js"></script> <!-- Validation -->
    <script src="assets/js/jquery.fancybox.js"></script> <!-- Fancybox -->
    <script src="assets/js/appear.js"></script> <!-- Appear.js -->
    <script src="assets/js/scrollbar.js"></script> <!-- Scrollbar -->

    <!-- main-js -->
    <script src="assets/js/script.js"></script> <!-- Main JS -->

    <script>
        // Load cart items from localStorage
        function loadCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || []; // Get cart from localStorage or initialize as empty array
            let cartItemsHtml = ''; // HTML for cart items
            let totalPrice = 0; // Total price of all items

            if (cart.length === 0) { // If cart is empty
                cartItemsHtml = '<p>Your cart is empty.</p>'; // Display empty cart message
            } else {
                cart.forEach((item, index) => { // Loop through cart items
                    item.quantity = item.quantity || 1; // Ensure quantity is not undefined/null
                    let itemTotal = item.price * item.quantity; // Calculate total price for the item
                    totalPrice += itemTotal; // Add to total price

                    cartItemsHtml += ` <!-- Generate HTML for each cart item -->
                        <div class="cart-item">
                            <h4>${item.name}</h4> <!-- Item name -->
                            <p>Price: ₹${item.price}</p> <!-- Item price -->
                            <div class="quantity-controls">
                                <button onclick="decreaseQuantity(${index})">-</button> <!-- Decrease quantity button -->
                                <span>${item.quantity}</span> <!-- Display quantity -->
                                <button onclick="increaseQuantity(${index})">+</button> <!-- Increase quantity button -->
                            </div>
                            <p>Total: ₹${itemTotal.toFixed(2)}</p> <!-- Display total price for the item -->
                            <button class="btn-remove" onclick="removeFromCart(${index})">Remove</button> <!-- Remove button -->
                        </div>
                    `;
                });
            }

            document.getElementById('cart-items').innerHTML = cartItemsHtml; // Display cart items
            document.getElementById('total-price').innerHTML = `Total Price: ₹${totalPrice.toFixed(2)}`; // Display total price
        }

        // Increase quantity of an item
        function increaseQuantity(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || []; // Get cart from localStorage
            if (cart[index]) { // If item exists
                cart[index].quantity = (cart[index].quantity || 0) + 1; // Increase quantity
                localStorage.setItem('cart', JSON.stringify(cart)); // Update localStorage
                loadCart(); // Reload cart
            }
        }

        // Decrease quantity of an item
        function decreaseQuantity(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || []; // Get cart from localStorage
            if (cart[index]) { // If item exists
                cart[index].quantity = (cart[index].quantity || 1) - 1; // Decrease quantity
                if (cart[index].quantity < 1) { // If quantity is less than 1
                    cart[index].quantity = 1; // Set quantity to 1
                }
                localStorage.setItem('cart', JSON.stringify(cart)); // Update localStorage
                loadCart(); // Reload cart
            }
        }

        // Remove item from cart
        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || []; // Get cart from localStorage
            cart.splice(index, 1); // Remove item at the specified index
            localStorage.setItem('cart', JSON.stringify(cart)); // Update localStorage
            loadCart(); // Reload cart
        }

        // Proceed to checkout
        function proceedToCheckout() {
            let cart = JSON.parse(localStorage.getItem('cart')) || []; // Get cart from localStorage
            if (cart.length === 0) { // If cart is empty
                alert('Your cart is empty. Add items to proceed.'); // Show alert
            } else {
                localStorage.removeItem('cart'); // Clear cart
                window.location.href = 'card5.php'; // Redirect to checkout page
            }
        }

        // Load cart items when the page loads
        window.onload = loadCart; // Call loadCart function on page load
    </script>
</body>
</html>