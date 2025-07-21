<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location:login.php");
        exit();
    }
    $currentPage = 'offers';
    include "header.php";
    include 'include/connect.php';

    // Fetch offers from the database
    $query = "SELECT * FROM offer";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .offer-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 0.5rem;
        }
        .offer-card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 0.5rem;
            padding: 15px;
        }
        .offer-card h3 {
            margin-top: 0;
        }
        .offer-card p {
            margin-bottom: 10px;
        }
        .offer-card .btn {
            width: 100%;
        }

        /* Added Styles */
        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card-body p {
            margin-bottom: 10px;
        }
        .line-through {
            color: red;
            text-decoration: line-through;
            font-weight: normal;
        }
        .offer-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #28a745;
        }
    </style>

    <title>Restar-Amusement Park - Offers</title>
    
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
        <!-- preloader end -->

        <!-- Page Title -->
        <section class="page-title">
            <div class="img-wrap parallax-demo-1">
                <div class="parallax-inner back-img" style="background-image: url(assets/images/gallery/resort/1.PNG);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Offers</li>
                    </ul>
                    <div class="title">
                        <h1>Special Offers</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- Offers Section -->
        <section class="offers-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h2>Exclusive Offers</h2>
                </div>

                <div class="container my-4">
                    <div class="row">

                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card offer-card">
                                    
                                    <img src="admin/images/offers/<?php echo htmlspecialchars($row['image']); ?>"
                                         class="card-img-top offer-image"
                                         alt="Offer Image"
                                         style="width: 360px; height: 236.25px; object-fit: cover; border-radius: 5px;">

                                    <div class="card-body text-center">
                                        <h3 class="card-title"><?php echo htmlspecialchars($row['toffer']); ?></h3>
                                        
                                        <p class="card-text">
                                            <strong>Person:</strong> <?php echo htmlspecialchars($row['Person']); ?> Person
                                        </p>

                                        <p class="card-text">
                                            <strong>Start Date:</strong> <?php echo htmlspecialchars($row['start_date']); ?>
                                        </p>

                                        <p class="card-text">
                                            <strong>End Date:</strong> <?php echo htmlspecialchars($row['end_date']); ?>
                                        </p>

                                        <!-- Original Price with red line -->
                                        <p class="card-text">
                                            <strong>Price:</strong>
                                            <span class="line-through">₹<?php echo number_format($row['Price'], 2); ?></span>
                                        </p>

                                        <!-- Offer Price below -->
                                        <p class="offer-price">
                                            Offer Price: ₹<?php echo number_format($row['offerprice'], 2); ?>
                                        </p>

                                        <a href="book_offer.php?offer_id=<?php echo $row['id']; ?>" class="theme-btn btn-one">Book Offer</a>
                                    </div>

                                </div>
                            </div>
                        <?php endwhile; ?>

                    </div>
                </div>

            </div>
        </section>
        <!-- End Offers Section -->

        <!-- Footer -->
        <?php include "footer.php"; ?>
        <!-- End Footer -->

        <!-- scroll to top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fal fa-long-arrow-up"></i>
        </button>
    </div>

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

    <!-- main-js -->
    <script src="assets/js/script.js"></script>
</body>
</html>
