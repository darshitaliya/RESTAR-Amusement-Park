<?php

include "./include/connect.php";

session_start();
if (!isset($_SESSION['email'])){
    header("Location:login.php");
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
        $currentPage = 'about';
        include "header.php";
        ?>

        <!-- Page Title -->
        <section class="page-title">
            <div class="img-wrap parallax-demo-1">
                <div class="parallax-inner back-img" style="background-image: url(assets/images/gallery/amusment/1920x500.jpg);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index-2.php">Home</a></li>
                        <li>About Us</li>
                    </ul>
                    <div class="title">
                        <h1>About Us</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- about-style-three -->
        <section class="about-style-three sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <figure class="image-box"><img src="assets/images/gallery/aquarium/an-extra-ordinary-kind-of-fish-e1628655121470.jpg" alt=""></figure>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_three">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h2>get to know about Restar-Amusment Park</h2>
                                </div>
                                <div class="text">
                                    <h5>An amusement park is a park that features various attractions, such as rides and games, as well as other events for entertainment purposes.</h5>
                                </div>
                                <div class="text">
                                    <p>first Join us at Restar Amusement Park, where every moment is an adventure waiting to unfold. Get ready to experience the thrill of a lifetime – your journey into fun begins here!</p>

                                </div>
                                <div class="btn-box">
                                    <?php if (isset($_SESSION["email"])) {
                                    ?>
                                            <a href="pricing.php" class="theme-btn btn-one">BOOK Your TICKET</a>
                                    <?php
                                        } else {
                                    ?>
                                            <a href="login.php" class="theme-btn btn-one">BOOK Your TICKET</a>
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
        <!-- about-style-three end -->
        <section class="testimonial-section centred sec-pad">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-6.png);"></div>
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

        <!-- team-section -->
        <section class="team-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h2>the Team in <br />our Amusment park</h2>
                </div>
                <div class="inner-content">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                            <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="assets/images/team/sahil.jpg" alt=""></figure>
                                    <div class="lower-content">
                                        <h3><a href="about.php">sahil</a> <span>Animal & Fish Doctor</span></h3>
                                        <p> "Explore the wild and dive deep! Roar with animals and swim with marine wonders in an adventure blending safari thrills and ocean magic!"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                            <div class="team-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="assets/images/team/darsh1.jpg" alt=""></figure>
                                    <div class="lower-content">
                                        <h3><a href="about.php">darsh</a> <span>Ride enginaer</span></h3>
                                        <p> "A Ride Engineer ensures amusement park rides are safe, reliable, and thrilling by designing, testing ."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                            <div class="team-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="assets/images/team/hit.jpeg" alt=""></figure>
                                    <div class="lower-content">
                                        <h3><a href="about.php">hit</a> <span>Animal & Fish Doctor</span></h3>
                                        <p>"Dedicated to the health of all creatures, from furry friends to finned companions, we provide expert care with compassion and commitment, ensuring every animal and aquatic life thrives."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                            <div class="team-block-one wow fadeInUp animated" data-wow-delay="900ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="assets/images/team/vig.jpeg" alt=""></figure>
                                    <div class="lower-content">
                                        <h3><a href="about.php">vignesh</a> <span>Mechanical Engineers</span></h3>
                                        <p> "Mechanical engineers design and maintain rides, ensuring they are safe, smooth, and reliable for an unforgettable experience."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                            <div class="team-block-one wow fadeInUp animated" data-wow-delay="1200ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="assets/images/team/ce.jpeg" alt=""></figure>
                                    <div class="lower-content">
                                        <h3><a href="about.php">alok</a> <span>Civil Engineers</span></h3>
                                        <p>"Civil engineers design and oversee the construction of park infrastructure, ensuring safe, durable, and functional spaces for every adventure."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                            <div class="team-block-one wow fadeInUp animated" data-wow-delay="1500ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="assets/images/team/en.jpeg" alt=""></figure>
                                    <div class="lower-content">
                                        <h3><a href="about.php">dev</a> <span>Computer/Software Engineers</span></h3>
                                        <p> "Computer/software engineers develop and maintain ride control systems, ticketing, and virtual experiences, ensuring seamless, high-tech adventures for every visitor."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team-section end -->

        <?php
            include "footer.php";
        ?>

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

</body><!-- End of .page_wrapper -->

</html>