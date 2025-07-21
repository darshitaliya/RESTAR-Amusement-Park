<?php
include './include/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Restar-Amusement Park</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/amusement-park.png" type="image">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;c:\xampp\htdocs\project\header.php
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #eeeeee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        .user-icon {
            font-size: 34px; /* Adjust the size */
            cursor: pointer;
            margin-left: 20px;
        }
        .user-circle {
            font-size: 22px; /* Ensure this is set to match or be larger */
            margin-top: 3px;
        }
        .dropdown-menu {
             right: 0; /* Align to the right */
             left: auto; /* Prevent left alignment */
    }
        .dropdown-item {
        font-weight: bold;
        color: black; 
    }
    .cart-badge {
    position: absolute;
    top: -5px; /* Adjust this value to align properly with the cart icon */
    right: -5px; /* Adjust this value to align properly with the cart icon */
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 1px 5px; /* Smaller padding */
    font-size: 10px; /* Smaller font size */
    font-weight: bold;
    display: none; /* Hide by default */
    line-height: 1; /* Ensure text is centered vertically */
    min-width: 16px; /* Minimum width to maintain circular shape */
    text-align: center; /* Center the text horizontally */
}
    </style>
</head>

<body>

    <!-- main header -->
    <header class="main-header header-style-one">
        <div class="header-lower">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="index.php"><img src="assets/images/logo.png" alt="Loading"></a>
                    </figure>
                </div>
                <div class="menu-area">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="<?php echo ($currentPage === 'index') ? 'active' : ''; ?>"><a
                                        href="index.php">HOME</a></li>
                                        <li class="<?php echo ($currentPage === 'resort') ? 'active' : ''; ?>"><a
                                        href="resort.php">ROOM</a></li>
                                <li class="dropdown">RIDES</a>
                                <ul>
                                        <li class="<?php echo ($currentPage === 'theme') ? 'active' : ''; ?>"><a
                                                href="themepark.php">THEMEPARK RIDES</a></li>
                                        <li class="<?php echo ($currentPage === 'water') ? 'active' : ''; ?>"><a
                                                href="waterpark.php">WATERPARK RIDES</a></li>
                                    </ul>
                                </li>
                                <li class="<?php echo ($currentPage === 'attraction') ? 'active' : ''; ?>"><a
                                        href="attrection.php">ATTRACTION</a></li>
                                        <li class="<?php echo ($currentPage === 'event') ? 'active' : ''; ?>"><a
                                        href="event.php">EVENTS</a></li>
                                        <li class="<?php echo ($currentPage === 'dining') ? 'active' : ''; ?>"><a
                                        href="daining.php">DINING</a></li>
                                        <li class="<?php echo ($currentPage === 'offers') ? 'active' : ''; ?>"><a
                                        href="offers.php">OFFERS</a></li>
                                        <li class="<?php echo ($currentPage === 'gallery') ? 'active' : ''; ?>"><a
                                        href="gallery.php">OUR GALLERY</a></li>
                                <li class="<?php echo ($currentPage === 'about') ? 'active' : ''; ?>"><a
                                        href="about.php">ABOUT US</a></li>
                                <li class="<?php echo ($currentPage === 'contact') ? 'active' : ''; ?>"><a
                                        href="contact.php">CONTACT US</a></li>
                                        <li class="<?php echo ($currentPage === 'feedback') ? 'active' : ''; ?>"><a 
                                            href="feedback.php">FEEDBACK</a></li>
                                    <li>
                                    <a
                                        href="<?php echo isset($_SESSION['email']) ? './logout.php' : './login.php'; ?>">
                                        <?php echo isset($_SESSION['email']) ? 'LOGOUT' : 'LOGIN'; ?>
                                    </a>
                                </li>
                            
                                <li class="<?php echo ($currentPage === 'cart') ? 'active' : ''; ?>">
                                <a href="cart.php">
                                    <i class="fas fa-shopping-cart"></i>
                                    <!-- Cart Item Count Badge -->
                                    <span id="cart-count" class="cart-badge">0</span>
                                </a>
                            </li>

                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="menu-right-content">
                    <div class="btn-box">
                        <?php if (isset($_SESSION["email"])) {
                            ?>
                            <a href="pricing.php">BOOK YOUR TICKET</a>

                            <?php
                        } else {
                            ?>
                            <a href="login.php">BOOK YOUR TICKET</a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!--sticky Header-->
<div class="sticky-header">
 <div class="outer-box">
        <div class="logo-box">
            <figure class="logo"><a href="index.php"><img src="assets/images/logo.png" alt=""></a></figure>
        </div>
        <div class="menu-area">
            <nav class="main-menu clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
            </nav>
        </div>
        <div class="menu-right-content">
            <div class="btn-box">
                <?php if (isset($_SESSION["email"])) { ?>
                    <a href="pricing.php">BOOK YOUR TICKET</a>
                <?php } else { ?>
                    <a href="login.php">BOOK YOUR TICKET</a>
                <?php } ?>
            </div>
            <!-- Add Cart Icon with Badge to Sticky Header -->
            <a href="cart.php" style="position: relative; margin-left: -91px; margin-right: 10px;">
    <i class="fas fa-shopping-cart" style="margin-right: 5px;"></i>
    <span id="sticky-cart-count" class="cart-badge" style="position: absolute; top: -5px; right: -10px;">0</span>
</a>
        </div>
    </div>
</div>
    </header>
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>
        <nav class="menu-box">
            <div class="nav-logo"><a href="index.php"><img src="assets/images/logo.png" alt="" title=""></a></div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>Canal Road,Parvat Patiya,Magob, Surat,Gujarat 395010
                    <li>
                        <a href="tel:9107776767">+91 91067 76464</a><br>
                        <a href="tel:76988 65902">+91 76988 65902</a>
                    </li>
                    <li><a href="mailto:restarpark@gmail.com">restarpark@gmail.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="https://www.facebook.com/profile.php?id=61557667266549" target="_blank"><i
                                class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.instagram.com/restar_amusmentpark/?next=%2F" target="_blank"><i
                                class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/@RestarPark" target="_blank"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->
    <script>
    // Function to update the cart count
    function updateCartCount() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let cartCount = cart.length;

        // Update the cart count badge in the regular header
        let cartBadge = document.getElementById('cart-count');
        if (cartBadge) {
            if (cartCount > 0) {
                cartBadge.textContent = cartCount;
                cartBadge.style.display = 'inline-block'; // Show the badge
            } else {
                cartBadge.style.display = 'none'; // Hide the badge if cart is empty
            }
        }

        // Update the cart count badge in the sticky header
        let stickyCartBadge = document.getElementById('sticky-cart-count');
        if (stickyCartBadge) {
            if (cartCount > 0) {
                stickyCartBadge.textContent = cartCount;
                stickyCartBadge.style.display = 'inline-block'; // Show the badge
            } else {
                stickyCartBadge.style.display = 'none'; // Hide the badge if cart is empty
            }
        }
    }

    // Update cart count when the page loads
    window.onload = updateCartCount;

    // Update cart count when an item is added to the cart
    function addToCart(itemId, itemName, itemPrice) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let item = { id: itemId, name: itemName, price: itemPrice };
        cart.push(item);
        localStorage.setItem('cart', JSON.stringify(cart));
        alert('Item added to cart!');
        updateCartCount(); // Update the cart count
    }

    // Update cart count when an item is removed from the cart
    function removeFromCart(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        loadCart(); // Reload cart items
        updateCartCount(); // Update the cart count
    }
</script>
    <!-- jequery plugins -->
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
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>