<?php
include "./include/connect.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Fetch only visible feedback
$sql = "SELECT username, feedback, rating FROM feedback1 WHERE is_hidden = 0";
$result = $conn->query($sql);

$feedbacks = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $feedbacks[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Restar-Amusement Park</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/amusement-park.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- <link rel="stylesheet" href="pop_css.css" -->
</head>
<style>
     .parking-comforts-section {
        text-align: center;
    }
    .owl-carousel .comfort-box {
        width: 180px;
        height: 180px;
        background: #F7B739;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
        margin: auto;
    }
    .owl-carousel .comfort-box:hover {
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }
    .comfort-icon span {
        font-size: 30px;
    }
    .comfort-text {
        display: block;
        font-size: 16px;
        margin-top: 5px;
        font-weight: bolder;
        color: white;
        text-align: center;
    }
    .hp{
        margin-top: -50px;
    }
    @keyframes fadeInScale {
    from {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.8);
    }
    to {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }
}

.popup {
    position: fixed;
    margin-top: 50px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 320px;
    height: 620px;
    background: white;
    padding: 20px;
    border-radius: 10px; /* Reduced border radius */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 1000;
    opacity: 0;
    animation: fadeInScale 0.5s ease-out forwards;
}

.popup img {
    width: 100%;
    border-radius: 8px;
    margin-bottom: 10px;
}

#close {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
    transition: transform 0.2s ease-in-out;
}

#close:hover {
    transform: scale(1.2);
}

.popup h2 {
    margin: 10px 0;
    font-size: 22px;
}

.popup p {
    font-size: 14px;
    color: #555;
}

.popup a {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    background: #F7B739;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
}

.popup a:hover {
    background: #e69a25;
    transform: scale(1.1);
}

.h1 {
    color: red;
    font-weight: bolder;
    animation: blink 1s infinite alternate;
}

@keyframes blink {
    from {
        opacity: 1;
    }
    to {
        opacity: 0.5;
    }
}
#close{
    color: red;
}
/* Center the card container on the page */
/* Center the card container on the page */
.card-container {
    display: flex;
    flex-direction: column;
    align-items: center; /* Center rows horizontally */
    gap: 20px; /* Space between rows */
    padding: 20px;
    max-width: 1200px; /* Adjust as needed */
    margin: 0 auto; /* Center the container */
}

/* Style for each card row */
.card-row {
    display: flex;
    justify-content: center; /* Center cards horizontally */
    gap: 20px; /* Space between cards */
    width: 100%;
}

/* Reverse the order of the second row */
.card-row.reverse {
    flex-direction: row-reverse;
}

/* Card styles */
.card {
    background-size: cover;
    background-position: center;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: flex-end;
    color: white;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    margin: 10px; /* Add equal margin to all cards */
    border-color: white;

}

/* Large card dimensions */
.card-large {
    width: 528px; /* Large card width */
    height: 324px; /* Large card height */
}

/* Small card dimensions */
.card-small {
    width: 252px; /* Small card width */
    height: 321.44px; /* Small card height */
}

/* Card content styling */
.card-content {
    padding: 20px;
    width: 100%;
}

/* Card link styling */
.card-link {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    background: #F7B739;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
}

/* Hover effect for card link */
.card-link:hover {
    background: white;
    transform: scale(1.1);
}
/* Section Title Styling */
.sec-title.centred {
    text-align: center; /* Center-align the title */
    margin-bottom: 40px; /* Add space below the title */
    padding: 20px; /* Add padding for better spacing */
}

.sec-title h2 {
    font-size: 2.5rem; /* Adjust font size */
    color: #333; /* Set text color */
    margin: 0; /* Remove default margin */
    font-weight: bold; /* Make the title bold */
    text-transform: uppercase; /* Convert text to uppercase */
    letter-spacing: 2px; /* Add spacing between letters */
}

/* Card Container Styling */
.card-container {
    display: flex;
    flex-direction: column;
    align-items: center; /* Center rows horizontally */
    gap: 20px; /* Space between rows */
    padding: 20px;
    max-width: 1200px; /* Adjust as needed */
    margin: 0 auto; /* Center the container */
}

/* Card Row Styling */
.card-row {
    display: flex;
    justify-content: center; /* Center cards horizontally */
    gap: 20px; /* Space between cards */
    width: 100%;
}

/* Card Link Styling */
.card-link {
    text-decoration: none; /* Remove underline */
    color: inherit; /* Inherit text color */
    display: block; /* Make the link cover the entire card */
    background: white;
}

/* Card Item Styling */
.card-item {
    background-size: cover;
    background-position: center;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: flex-end;
    color: white;
    text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.5);
    margin-right: 20px; /* Add margin-right for spacing */
}

/* Remove margin-right from the last card in each row */
.card-row .card-item:last-child {
    margin-right: 0;
}

/* Large Card Dimensions */
.card-large {
    width: 528px; /* Large card width */
    height: 324px; /* Large card height */
}

/* Small Card Dimensions */
.card-small {
    width: 252px; /* Small card width */
    height: 321.44px; /* Small card height */
}

/* Card Content Styling */
.card-content {
    padding: 20px;
    width: 100%;
}
</style>

<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">
        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div id="handle-preloader" class="handle-preloader about-page-2">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->

        <?php
        $currentPage = 'index';
        include "header.php";
        ?>

        <!-- banner-section -->
        <section class="banner-section">
            <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/banner/banner-1.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h3>Explore Our Theme-park</h3>
                            <h2>New Ride Experience of Joy</h2>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/banner/banner-2.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h3>Explore Our Aquerium</h3>
                            <h2>New Underwater Experience of Joy</h2>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/banner/banner-3.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h3>Explore Our Waterpark</h3>
                            <h2>New Waterpark Rides Experience of Joy</h2>
                        </div>
                    </div>   
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/banner/banner-4.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h3>Explore Our Zoo</h3>
                            <h2>New Wildlife Experience of Joy</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section end -->


            <!-- info-section -->
            <section class="info-section">
            <div class="bg-layer"></div>
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-ticket"></i></div>
                                <h5>
                                        <a href="pricing.php">Book your ticket</a>
                                </h5>
                                <p>Experience the joy and excitement at Restar Amusement Park by grabbing your tickets
                                    online!</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-calendar"></i></div>
                                <h5><a href="resort.php">book room</a></h5>
                                <p>Join us at Restar Amusement Park for an adventure-packed season of fun and discovery.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 single-column">
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-map"></i></div>
                                <h5><a download href="map/mappp.pdf"
                                        class=" yb-btn uk-button uk-button-primary uk-button-large">Download Map</a>
                                </h5>
                                <p>Embark on a journey of discovery with the Restar Amusement Park interactive park map!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- info-section end -->

                <!-- about-section -->
                <section class="about-section sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_one">
                            <div class="image-box">
                                <div class="shape" style="background-image: url(assets/images/shape/shape-1.png);">
                                </div>
                                <figure class="image"><img src="assets/images/resource/about-1.jpg" alt=""></figure>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_one">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h2>welcome to best Amusment Park</h2>
                                </div>
                                <div class="text">
                                    <h4>Help us to protect Restar around the world.</h4>
                                    <p> Welcome to Restar Amusement Park, where every moment is a journey into joy and
                                        excitement!</p>
                                    <ul class="list-style-one clearfix">
                                        <li> Captivating Entertainment</li>
                                        <li>Exceptional Guest Service</li>
                                        <li> Restar Amusement Park is designed for families to create lasting memories
                                            together.</li>
                                    </ul>
                                </div>
                                <div class="btn-box">
                                    <?php if (isset($_SESSION["email"])) {
                                        ?>
                                        <a href="pricing.php" class="theme-btn btn-one">BOOK TICKET</a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="login.php" class="theme-btn btn-one">BOOK TICKET</a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!---------------------------------------------------------end---->

<section id="restra-merch" class="container text-center">
    <!-- Section Title -->
    <div class="sec-title centred">
                    <h2>RESTRA MERCH</h2>
                </div>

    <!-- Card Container -->
    <div class="row">
        <!-- First Row -->
        <div class="col-md-6">
            <a href="unisex.php" class="card-link d-block mb-3">
                <div class="card" style="background: none; border: none;">
                    <img src="admin/images/cloths/1.webp" class="card-img" alt="Unisex" style="width: 100%; height: auto;">
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="kids.php" class="card-link d-block mb-3">
                <div class="card" style="background: none; border: none;">
                    <img src="admin/images/cloths/2.webp" class="card-img" alt="Kids" style="width: 100%; height: auto;">
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="women.php" class="card-link d-block mb-3">
                <div class="card" style="background: none; border: none;">
                    <img src="admin/images/cloths/3.webp" class="card-img" alt="Women" style="width: 100%; height: auto;">
                </div>
            </a>
        </div>
    </div>

    <!-- Second Row -->
    <div class="row flex-md-row-reverse">
        <div class="col-md-6">
            <a href="unisex.php" class="card-link d-block mb-3">
                <div class="card" style="background: none; border: none;">
                    <img src="admin/images/cloths/6.webp" class="card-img" alt="Unisex" style="width: 100%; height: auto;">
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="kids.php" class="card-link d-block mb-3">
                <div class="card" style="background: none; border: none;">
                    <img src="admin/images/cloths/4.webp" class="card-img" alt="Kids" style="width: 100%; height: auto;">
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="women.php" class="card-link d-block mb-3">
                <div class="card" style="background: none; border: none;">
                    <img src="admin/images/cloths/5.webp" class="card-img" alt="Women" style="width: 100%; height: auto;">
                </div>
            </a>
        </div>
    </div>
</section>



        <!--atrrection start-->
        <section class="animals-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h2>beautiful!! <br />restar resort</h2>
                </div>
                <section class="rooms-section spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="room-item">
                                    <img src="assets\images\gallery\waterride.avif" alt="">
                                    <div class="ri-text">
                                        <table>
                                            <div class="text p-3 text-center">
                                                <h3 class="mb-3">WATERPARK RIDE</h3>
                                                <hr>
                                                <a href="waterpark.php" class="theme-btn btn-one">CLICK HERE</a>
                                            </div>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="room-item">
                                    <img src="assets\images\gallery\dryride.avif" alt="">
                                    <div class="ri-text">
                                        <table>
                                            <div class="text p-3 text-center">
                                                <h3 class="mb-3">THEMEPARK RIDE</h3>
                                                <hr>
                                                <a href="themepark.php" class="theme-btn btn-one">click here</a>
                                            </div>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="room-item">
                                    <img src="assets\images\gallery\attrection.avif" alt="">
                                    <div class="ri-text">
                                        <table>
                                            <div class="text p-3 text-center">
                                                <h3 class="mb-3">ATTRECTION</h3>
                                                <hr>
                                                <a href="attrection.php" class="theme-btn btn-one">click here</a>
                                            </div>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="room-item">
                                    <img src="assets\images\gallery\stay.avif" alt="">
                                    <div class="ri-text">
                                        <table>
                                            <div class="text p-3 text-center">
                                                <h3 class="mb-3">STAY</h3>
                                                <hr>
                                                <a href="resort.php" class="theme-btn btn-one">click here</a>
                                            </div>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="room-item">
                                    <img src="assets\images\gallery\daining.avif" alt="">
                                    <div class="ri-text">
                                        <table>
                                            <div class="text p-3 text-center">
                                                <h3 class="mb-3">DINING</h3>
                                                <hr>
                                                <a href="daining.php" class="theme-btn btn-one">click here</a>
                                         </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="room-item">
                                    <img src="assets\images\gallery\lakeside.avif" alt="">
                                    <div class="ri-text">
                                        <div class="text p-3 text-center">
                                            <h3 class="mb-3">LAKESIDE</h3>
                                            <hr>
                                            <a href="attrection.php" class="theme-btn btn-one">click here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
        <!--attrection end-->
        <!-- clients-section -->
        <section class="clients-section">
            <div class="img-wrap parallax-demo-1">
                <div class="parallax-inner back-img"
                    style="background-image: url(assets/images/gallery/amusment/1920x600.jpg);"></div>
            </div>
        </section>
        <!-- clients-section end -->


        <!-- adventure-section -->
        <section class="adventure-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_two">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h2>Your adventure begins here</h2>
                                </div>
                                <div class="inner-box">
                                    <div class="single-item">
                                        <div class="icon-box"><i class="flaticon-tick"></i></div>
                                        <h4>night at the Amusment Park</h4>
                                        <p>As the sun sets, the magic of Restar Amusement Park comes alive in a whole
                                            new light! Join us for an extraordinary "Night at the Amusement Park" where
                                            the thrills continue under the stars.</p>
                                    </div>
                                    <div class="single-item">
                                        <div class="icon-box"><i class="flaticon-tick"></i></div>
                                        <h4>Good Support from our team</h4>
                                        <p>At Restar Amusement Park, your joy and satisfaction are our top priorities.
                                            Our dedicated team is committed to ensuring you have the best experience,
                                            from the moment you plan your visit to the time you bid farewell with a
                                            heart full of cherished memories.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_two">
                            <div class="image-box">
                                <figure class="image"><img
                                        src="assets/images/gallery/ride/girl-in-an-amusement-park-e1645720632480.jpg"
                                        alt=""></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- adventure-section end -->
        <!-- about-section end -->
        <section class="testimonial-section centred sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h2>What they’re <br />saying?</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    <?php if (!empty($feedbacks)) { ?>
                        <?php foreach ($feedbacks as $feedback) { ?>
                            <div class="testimonil-block-one">
                                <div class="inner-box">
                                    <br>
                                    <div class="text">
                                        <!-- Display star rating dynamically -->
                                        <p>
                                            <?php echo str_repeat('<span style="font-size: 24px; color: gold;">⭐</span>', intval($feedback['rating'])); ?>
                                            <br>"<?php echo htmlspecialchars($feedback['feedback']); ?>"
                                        </p>
                                    </div>
                                    <div class="author-info">
                                        <h5><?php echo htmlspecialchars($feedback['username']); ?></h5>
                                        <span class="designation">Customer</span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="testimonil-block-one">
                            <div class="inner-box">
                                <div class="text">
                                    <p>No feedback available at the moment.</p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
<!-- testimonial-section end -->

<!-- events-section -->
<section class="events-section sec-pad">
            <div class="bg-layer"></div>
            <div class="bg-image"
                style="background-image: url(assets/images/gallery/ride/carousel-of-the-amusement-park-e1645720076976.jpg);">
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 title-column">
                        <div class="sec-title light">
                            <h2>Check Park upcoming events</h2>
                                <a href="event.php" class="theme-btn btn-one">Book Your Event Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="inner-content">
                            <div class="events-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img
                                                src="assets/images/gallery/aquarium/clown-fish-e1628655075684.jpg"
                                                alt=""></figure>
                                        <div class="post-date">
                                            <h6>16<span>mar</span></h6>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <ul class="info clearfix">
                                            <li><i class="far fa-clock"></i>2:00 am</li>
                                            <li><i class="far fa-map"></i>60 broklyn street</li>
                                        </ul>
                                        <h3><a href="event.php">Have you Visited clown fish's super show</a></h3>
                                        <p>Dive into the enchanting world of the Clown Fish Super Show, a captivating
                                            spectacle that awaits you at our amusement park! If you missed it so book
                                            now for new event</p>
                                    </div>
                                </div>
                            </div>
                            <div class="events-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="assets/images/resource/events-2.jpg" alt="">
                                        </figure>
                                        <div class="post-date">
                                            <h6>05<span>mar</span></h6>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <ul class="info clearfix">
                                            <li><i class="far fa-clock"></i>2:00 am</li>
                                            <li><i class="far fa-map"></i>60 broklyn street</li>
                                        </ul>
                                        <h3><a href="event.php">how Interaction with Animal can!! You Missed It?</a>
                                        </h3>
                                        <p>At our park, visitors of all ages can experience the thrill of connecting
                                            with a variety of fascinating creatures.Book next Event ticket!!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- events-section end -->
        
<section class="parking-comforts-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h2 class="hp">Parking Side Comforts</h2>
        </div>
        <div class="owl-carousel owl-theme">
            <?php 
            $services = [
                ["icon" => "<img src='assets/images/icons/app/1.png' alt='Parking Lot' style='width: 50px; height: 50px; display: block; margin: 0 auto;' />", "text" => "Parking Lot"],
                ["icon" => "<img src='assets/images/icons/app/6.png' style='width: 50px; height: 50px; display: block; margin: 0 auto;' />", "text" => "Wheelchair/Pram"],
                ["icon" => "<img src='assets/images/icons/app/2.png' style='width: 50px; height: 50px; display: block; margin: 0 auto;' />", "text" => "Lost & Found"],
                ["icon" => "<img src='assets/images/icons/app/7.png' style='width: 50px; height: 50px; display: block; margin: 0 auto;' />", "text" => "Student Briefing"],
                ["icon" => "<img src='assets/images/icons/app/9.png' style='width: 50px; height: 50px; display: block; margin: 0 auto;' />", "text" => "Ez Pay"],
                ["icon" => "<img src='assets/images/icons/app/3.png' alt='Individual Lockers' style='width: 50px; height: 50px; display: block; margin: 0 auto;' />", "text" => "Individual Lockers"],
                ["icon" => "<img src='assets/images/icons/app/8.png' style='width: 50px; height: 50px; display: block; margin: 0 auto;' />", "text" => "Changing Rooms"],
                ["icon" => "<img src='assets/images/icons/app/5.png' style='width: 50px; height: 50px; display: block; margin: 0 auto;' />", "text" => "Drinking Water"],
                ["icon" => "<img src='assets/images/icons/app/4.png' style='width: 50px; height: 50px; display: block; margin: 0 auto;' />", "text" => "First Aid"]
            ];            
            ?>
            <?php foreach ($services as $service) { ?>
                <div class="comfort-box text-center">
                    <div class="inner-box">
                        <div class="comfort-icon">
                            <span><?php echo $service['icon']; ?></span>
                        </div>
                        <p class="comfort-text"><?php echo htmlspecialchars($service['text']); ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


        <?php
        include "footer.php";
        ?>

        <!-- scroll to top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fal fa-long-arrow-up"></i>
        </button>
    </div>
    
    <script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 15,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 2000,
            responsive: {
                0: { items: 2 },
                600: { items: 3 },
                1000: { items: 5 }
            }
        });
    });
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
    
    <!-- main-js -->
    <script src="scrpit.js"></script>
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->


</html>