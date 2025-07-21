<?php

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
        $currentPage = 'theme';
        include "header.php";
        ?>


        <!-- Page Title -->
        <section class="page-title">
            <div class="img-wrap parallax-demo-1">
                <div class="parallax-inner back-img"
                    style="background-image: url(assets/images/gallery/amusment/1920x500.jpg);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Amusement park</li>
                    </ul>
                    <div class="title">
                        <h1>dry ride</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!--themepark-section -->
        <section class="animals-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h2>amazing Rides <br />in our Restar Amusement park</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box p_relative d_block mb_60 centred">
                        <div class="tab-btns tab-buttons centred">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-1">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/amusmentparkicon/005-tea-cup-ride.png" alt="">
                                        </div>
                                        <h5>Tea&cup</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn active-btn" data-tab="#tab-2">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/amusmentparkicon/006-ferris-wheel.png"
                                                alt=""></i></div>
                                        <h5>wheel</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-3">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/amusmentparkicon/001-amusement-park.png"
                                                alt=""></div>
                                        <h5>freefall</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-4">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/amusmentparkicon/002-pendulum.png" alt="">
                                        </div>
                                        <h5>Pendulum</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-5">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/amusmentparkicon/003-chair-swing-ride.png"
                                                alt=""></div>
                                        <h5>Swinger</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-6">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/amusmentparkicon/004-bumper-car.png" alt="">
                                        </div>
                                        <h5>bumpercar</h5>
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
                                            <h2>tea&cup</h2>
                                            <p>Take control of your own spinning destiny with the spinning teacup wheel
                                                at the center of each ride. Whether you prefer a gentle twirl or a
                                                dizzying spin, the Tea Cup Ride allows you to adjust the speed, ensuring
                                                a delightful experience for everyone.
                                                The Tea Cup Ride is not just about the spin; it's a feast for the eyes.
                                                Adorned in a spectrum of colors, our teacups create a vibrant whirlwind
                                                as they spin, adding a touch of magic to your amusement park adventure.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/dryrides/teacup.mp4" type="video/mp4">
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
                                            <h2>Wheel</h2>
                                            <p>Whether you choose to ride during the day or as the sun sets, the Wheel
                                                Ride at Restar transforms into a magical spectacle. Admire the vibrant
                                                hues of the park in daylight or revel in the twinkling lights that
                                                illuminate the night sky, creating an enchanting atmosphere for riders
                                                of all ages.
                                                Safety is paramount, and our Wheel Ride is designed with your well-being
                                                in mind. Each spacious, enclosed cabin provides a secure and comfortable
                                                setting for you to relax and enjoy the ride. Our state-of-the-art safety
                                                features ensure a worry-free experience as you ascend to the sky.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/dryrides/wheell.mp4" type="video/mp4">
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
                                            <h2>freefall</h2>
                                            <p>
                                                we've crafted an experience that blends breathtaking panoramic views
                                                with a heart-stopping free fall. Marvel at the landscape from the top
                                                before succumbing to the gravity-powered plunge that will leave you
                                                craving more.
                                                Rest assured, your safety is our top priority. Our Free Fall Ride boasts
                                                state-of-the-art safety measures, ensuring an adrenaline-packed
                                                adventure without compromising on well-being. Feel the rush with
                                                confidence!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/dryrides/freefall.mp4" type="video/mp4">
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
                                            <h2>Pendulum</h2>
                                            <p>As the Pendulum Ride reaches its peak, brace yourself for unparalleled
                                                panoramic views of the park and beyond. It's not just a ride; it's an
                                                awe-inspiring experience that combines breathtaking heights with the
                                                thrill of swinging through the air.
                                                Safety is paramount at Restar, and the Pendulum Ride is no exception.
                                                Our state-of-the-art safety measures ensure that you can enjoy the
                                                adrenaline rush without any compromise on well-being. So, buckle up and
                                                let the excitement begin!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/dryrides/pendulum.mp4" type="video/mp4">
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
                                            <h2>Swinger</h2>
                                            <p>As you swing higher and higher, the vibrant colors of the chairs create a
                                                mesmerizing spectacle against the backdrop of the park. This picturesque
                                                ride is not just about thrills; it's a visual feast that adds a splash
                                                of joy to your day.
                                                Safety is our priority at Restar. The Chair Swing Ride is designed with
                                                secure, comfortable seating and stringent safety measures, ensuring that
                                                you can delight in the magic without any worry. It's an experience that
                                                both children and the young at heart can enjoy.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/dryrides/swinger.mp4" type="video/mp4">
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
                                            <h2>bumpercar</h2>
                                            <p>Unleash your inner driver and bump into friends and fellow riders for a
                                                thrilling experience. The soft-cushioned bumpers ensure a safe and
                                                entertaining collision, creating a symphony of laughter and excitement
                                                as cars spin, bump, and zoom in every direction</p>
                                            The Bumper Car Ride is perfect for families and friends looking to share
                                            some lighthearted, interactive fun. Whether you're a skilled dodger or a
                                            first-time bumper, this ride guarantees smiles, laughter, and a whole lot of
                                            memorable moments.
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/dryrides/bumpercar.mp4" type="video/mp4">
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
        <!-- themepark-section end -->
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