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
        include "header.php";
        ?>


        <!-- Page Title -->
        <section class="page-title">
            <div class="img-wrap parallax-demo-1">
                <div class="parallax-inner back-img"
                    style="background-image: url(assets/images/gallery/aquarium/fish-swimming-in-aquarium-e1628654735615.jpg);">
                </div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index-2.php">Home</a></li>
                        <li>Attrection</li>
                    </ul>
                    <div class="title">
                        <h1>Aquarium</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- animals-section -->
        <section class="animals-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h2>amazing Fish's <br />in our Restar aquarium</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box p_relative d_block mb_60 centred">
                        <div class="tab-btns tab-buttons centred">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-1">
                                        <div class="icon-box"><img src="assets/images/icons/aqu/001-pike.png" alt="">
                                        </div>
                                        <h5>Pike fish</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn active-btn" data-tab="#tab-2">
                                        <div class="icon-box"><img src="assets/images/icons/aqu/002-marlin.png"
                                                alt=""></i></div>
                                        <h5>Marlin fish</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-3">
                                        <div class="icon-box"><img src="assets/images/icons/aqu/003-seahorse.png"
                                                alt=""></div>
                                        <h5>Sea horse</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-4">
                                        <div class="icon-box"><img src="assets/images/icons/aqu/004-sea.png" alt="">
                                        </div>
                                        <h5>Threadfin</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-5">
                                        <div class="icon-box"><img src="assets/images/icons/aqu/005-clown-fish.png"
                                                alt=""></div>
                                        <h5>Clown Fish</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-6">
                                        <div class="icon-box"><img src="assets/images/icons/aqu/006-sea-1.png" alt="">
                                        </div>
                                        <h5>Angler Fish</h5>
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
                                            <h2>Pike fish</h2>
                                            <p>This is one of the most common pike species kept in aquariums. It has a
                                                distinctive elongated body, sharp teeth, and a voracious appetite.
                                                Pikes can grow quite large, so you'll need a spacious aquarium. A tank
                                                size of at least 75 to 100 gallons is recommended for a single adult
                                                pike. Larger tanks are preferable if you plan to keep more than one.
                                                Water Parameters: Pikes prefer cool water temperatures between 60-70°F
                                                (15-21°C). Maintain a pH level between 6.0 and 7.5.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/fish/pikefish.mp4" type="video/mp4">
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
                                            <h2>Marlin fish</h2>
                                            <p>There are several species of marlins, including the Atlantic blue marlin
                                                (Makaira nigricans), Pacific blue marlin (Makaira mazara), black marlin
                                                (Istiompax indica), and striped marlin (Kajikia audax).
                                                Marlins are known for their sleek, streamlined bodies, sharp bills
                                                (rostrums), and prominent dorsal fins.
                                                The bills of marlins are used for slashing at schools of fish, stunning
                                                prey, and for defense.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/fish/marlinfish.mp4" type="video/mp4">
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
                                            <h2>sea horse</h2>
                                            <p>
                                                Seahorses are found in shallow tropical and temperate waters worldwide,
                                                often among seagrasses, coral reefs, or mangroves.
                                                They are known for their ability to grasp onto objects with their tails,
                                                providing stability in turbulent waters.
                                                Seahorses are one of the few species in which the male carries and gives
                                                birth to the offspring.
                                                During courtship, pairs engage in intricate dances and may change color
                                                to communicate with each other.
                                                The female deposits her eggs into a specialized pouch on the male's
                                                abdomen, where they are fertilized and gestate until birth.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/fish/seahorse.mp4" type="video/mp4">
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
                                            <h2>Threadfin</h2>
                                            <p>In freshwater, threadfin refers to species like the African threadfin
                                                (Polydactylus quadrifilis), an important food fish in parts of Africa.
                                                In saltwater, the term is often associated with threadfin breams (family
                                                Nemipteridae) and threadfin jack (species like Polydactylus virginicus).
                                                Threadfins are characterized by their long, filamentous rays on the
                                                dorsal fin, which gives them their name.
                                                They often have a streamlined body and may exhibit various colors and
                                                patterns.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/fish/threadfinfish.mp4" type="video/mp4">
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
                                            <h2>CLOWN FISH</h2>
                                            <p>The most famous species of clownfish is the Orange Clownfish (Amphiprion
                                                percula) and the Ocellaris Clownfish (Amphiprion ocellaris). They are
                                                often collectively referred to as "Nemo" fish, due to the character in
                                                the animated movie "Finding Nemo."
                                                Clownfish are small, with a distinctive color pattern featuring bright
                                                orange, black, and white stripes. The coloration can vary slightly
                                                between species.They have a mucus layer on their skin that protects them
                                                from the stinging cells of sea anemones, which they often inhabit.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/fish/clownfish.mp4" type="video/mp4">
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
                                            <h2>ANGLER FISH</h2>
                                            <p>The most distinctive feature of anglerfish is the bioluminescent lure
                                                that hangs in front of their mouths. This lure is a modified dorsal fin
                                                spine and is used to attract prey in the dark depths of the ocean.
                                                Anglerfish are typically found in the deep-sea, often at depths ranging
                                                from 200 to 2,000 meters or more.
                                                They inhabit the abyssal and bathypelagic zones of the ocean, where
                                                little to no sunlight penetrates.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/fish/angler.mp4" type="video/mp4">
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
        <!-- animals-section end -->
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