<?php
include "./include/connect.php";

session_start();
if (!isset($_SESSION['email'])){
    header("Location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Restar-Amusment Park</title>

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

</head>
<style>
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        /* Aspect ratio 16:9 */
        overflow: hidden;
    }

    .video-container video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
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
        $currentPage = 'water';
        include "header.php";
        ?>


        <!-- Page Title -->
        <section class="page-title">
            <div class="img-wrap parallax-demo-1">
                <div class="parallax-inner back-img"
                    style="background-image: url(assets/images/gallery/waterpark/little-boy-diving-in-the-swimming-pool--e1628826049636.jpg);">
                </div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index-2.php">Home</a></li>
                        <li>amusement-park</li>
                    </ul>
                    <div class="title">
                        <h1>waterride</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- waterpark-section -->
        <section class="animals-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h2>amazing Rides <br />in our Restar Watrepark</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box p_relative d_block mb_60 centred">
                        <div class="tab-btns tab-buttons centred">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-1">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/waterpark/001-amusement-park.png" alt=""></div>
                                        <h5>Tunnel ride</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn active-btn" data-tab="#tab-2">
                                        <div class="icon-box"><img src="assets/images/icons/waterpark/002-waterfall.png"
                                                alt=""></i></div>
                                        <h5>Waterfall</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-3">
                                        <div class="icon-box"><img src="assets/images/icons/waterpark/003-umbrella.png"
                                                alt=""></div>
                                        <h5>Umbrella</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-4">
                                        <div class="icon-box"><img src="assets/images/icons/waterpark/004-bucket.png"
                                                alt=""></div>
                                        <h5>Bucket</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-5">
                                        <div class="icon-box"><img src="assets/images/icons/waterpark/005-slide.png"
                                                alt=""></div>
                                        <h5>slide</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-6">
                                        <div class="icon-box"><img src="assets/images/icons/waterpark/006-wave.png"
                                                alt=""></div>
                                        <h5>wave</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tabs-content">
                        <div class="tab" id="tab-1">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>Tunnel ride</h2>
                                            <p>As you navigate the tunnels, be prepared for a sensory explosion of
                                                twists, turns, and unexpected drops. The Tunnel Ride at restar waterpark
                                                is engineered to deliver an adrenaline rush, creating a water-based
                                                roller coaster experience that will have you screaming with delight.
                                                What sets our Tunnel Ride apart is the immersive theming that surrounds
                                                you throughout the journey. Each tunnel is a portal to a different
                                                aquatic world, complete with vibrant colors, captivating soundscapes,
                                                and special effects that enhance the overall adventure. Whether you're
                                                speeding through a dark abyss or under a cascade of waterfalls, every
                                                moment is a spectacle.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/waterride/tunnelride.mp4"
                                                        type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab active-tab" id="tab-2">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>Waterfall</h2>
                                            <p>The base of the waterfall transforms into an interactive splash zone,
                                                providing refreshing relief on hot summer days. Guests of all ages can
                                                delight in the cool mist and playful splashes, turning a simple visit to
                                                the waterfall into an interactive water adventure.
                                                Bring your camera or smartphone to capture the breathtaking scenery. The
                                                waterfall serves as a backdrop for stunning photos, allowing you to
                                                document the moments of serenity, joy, and natural beauty. Share your
                                                snapshots and let the world see the wonders of Resatr waterpark.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/waterride/fall.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-3">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>umbrella</h2>
                                            <p>
                                                Positioned strategically around our pool areas, the umbrellas create the
                                                perfect atmosphere for poolside enjoyment. Grab a refreshing beverage,
                                                relax on a comfortable lounger, and let the gentle breeze under the
                                                umbrella enhance your overall waterpark experience.
                                                Capture those picture-perfect moments! Our colorful umbrellas provide an
                                                ideal backdrop for your waterpark photos. Share your experiences with
                                                friends and family as you soak up the sun or cool off in the shade.
                                                Don't forget to tag us at restar waterpark!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/waterride/umbrella.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-4">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>Bucket</h2>
                                            <p>The anticipation builds as guests gather beneath the giant bucket,
                                                eagerly awaiting the refreshing cascade. When the bucket tips, it's a
                                                moment of sheer exhilaration and joy as the cool water splashes down,
                                                creating an instant water wonderland for everyone in its path.
                                                The Big Bucket Splash isn't just about getting wet; it's a visual
                                                spectacle. The vibrant colors, playful designs, and the sheer size of
                                                the bucket create a captivating show that adds to the overall excitement
                                                of restar waterpark.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/waterride/buccket.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-5">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>slide</h2>
                                            <p>Experience the heart-pounding excitement of free-fall on our thrilling
                                                drop slides. Perched high above the water, these slides offer a moment
                                                of weightlessness before plunging into the refreshing pool below. It's
                                                an instant rush that leaves you craving for more.
                                                Our waterpark features family-friendly slides, perfect for riders of all
                                                ages. Enjoy the twists and turns together as you create lasting memories
                                                with your loved ones. The waterplay area at the base of these slides
                                                adds an extra element of fun for the little ones.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/waterride/waterslide.mp4"
                                                        type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-6">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>wave</h2>
                                            <p>Whether you're a seasoned surfer or a first-time rider, our wave pool
                                                offers the ideal conditions for catching the perfect wave. Feel the
                                                surge of water beneath you as the waves carry you towards the shore.
                                                It's a surfing adventure that guarantees smiles, laughter, and a whole
                                                lot of watery fun.
                                                Surrounded by lush palm trees, sandy shores, and vibrant tropical
                                                landscaping, our wave pool creates an oasis of relaxation and
                                                excitement. Lounge on the sandy beach or float in the gentle waves,
                                                immersing yourself in the tropical paradise atmosphere.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/waterride/wavy.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--waterpark-section end -->
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