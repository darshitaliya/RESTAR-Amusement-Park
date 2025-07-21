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


<!-- page wrapper -->
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
        $currentPage = 'attraction';
        include "header.php";
        ?>

        <!-- Page Title -->
        <section class="page-title">
            <div class="img-wrap parallax-demo-1">
                <div class="parallax-inner back-img" style="background-image: url(assets/images/gallery/zoo/bg-2.jpg);">
                </div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Attrection</li>
                    </ul>
                    <div class="title">
                        <h1>amezing part of restar</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- animals-section -->
        <section class="animals-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h2>amazing <br />theme park!!</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box p_relative d_block mb_60 centred">
                        <div class="tab-btns tab-buttons centred">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-1">
                                        <div class="icon-box"><img src="assets/images/icons/attrection/001-zoo.png"
                                                alt=""></div>
                                        <h5>zoo</h5>
                                    </div>
                                </div><br><br>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn active-btn" data-tab="#tab-2">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/attrection/002-underwater.png" alt=""></i>
                                        </div>
                                        <h5>aquarium</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-3">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/attrection/003-vr-glasses.png" alt=""></div>
                                        <h5>9D VR</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-4">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/attrection/004-haunted-house.png" alt=""></div>
                                        <h5>horror..</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-5">
                                        <div class="icon-box"><img src="assets/images/icons/attrection/006-tower.png"
                                                alt=""></div>
                                        <h5>Animal..</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-6">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/attrection/005-hunting-with-arm.png" alt="">
                                        </div>
                                        <h5>hunting</h5>
                                    </div>
                                </div><br><br>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-7">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/attrection/007-house-boat.png" alt=""></div>
                                        <h5>houseboat</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-8">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/attrection/008-capilano-suspension-bridge.png"
                                                alt=""></i></div>
                                        <h5>Bridge</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-9">
                                        <div class="icon-box"><img src="assets/images/icons/attrection/009-game.png"
                                                alt=""></div>
                                        <h5>Cargo Net</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-10">
                                        <div class="icon-box"><img src="assets/images/icons/attrection/010-forest.png"
                                                alt=""></div>
                                        <h5>Rain forest</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-11">
                                        <div class="icon-box"><img
                                                src="assets/images/icons/attrection/011-walking-man.png" alt=""></div>
                                        <h5>sloth walk</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-12">
                                        <div class="icon-box"><img src="assets/images/icons/attrection/012-games.png"
                                                alt=""></div>
                                        <h5>360 Cycle</h5>
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
                                            <h2>zoo</h2>
                                            <p>Prioritize the well-being of the animals. Ensure that their habitats
                                                mimic their natural environments as closely as possible.
                                                Implement appropriate feeding programs, veterinary care, and enrichment
                                                activities to keep the animals healthy and engaged.Use the zoo as an
                                                educational tool by providing information about the animals, their
                                                habitats, and conservation efforts.
                                                Consider interactive exhibits, guided tours, and educational programs to
                                                raise awareness about wildlife conservation.</p>
                                        </div>
                                        <div class="btn-box">
                                            <a href="zoo.php" class="theme-btn btn-one">click here!</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/zoo1.mp4" type="video/mp4">
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
                                            <h2>aquarium</h2>
                                            <p>Prioritize the well-being of marine species with appropriate tank
                                                conditions and care.
                                                Offer a variety of aquaticspecies, including fish, invertebrates, and
                                                possibly larger marine mammals depending on size and regulations.Provide
                                                educational information about marine life, ecosystems, and conservation
                                                efforts.
                                                Consider interactive displays, guided tours, and educational programs to
                                                engage visitors.</p>
                                        </div>
                                        <div class="btn-box">
                                            <a href="aquarium.php" class="theme-btn btn-one">click here!</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/aqe.mp4" type="video/mp4">
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
                                            <h2>9D VR</h2>
                                            <p>Plan an attraction that integrates 9D VR technology seamlessly into the
                                                amusement park.
                                                Consider designing a dedicated space with comfortable seating, safety
                                                measures, and sufficient room for movement.Curate a diverse range of
                                                virtual experiences, such as roller coaster rides, underwater
                                                adventures, space exploration, or thrilling fantasy scenarios.
                                                Ensure the content aligns with the amusement park's theme and target
                                                audience.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/vr.mp4" type="video/mp4">
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
                                            <h2>Horror House</h2>
                                            <p>Design the layout of the horror house to maximize suspense and surprise.
                                                Invest in realistic set construction, including detailed props, sound
                                                effects, and lighting to create a chilling atmosphere.Incorporate
                                                interactive elements to engage visitors, such as hidden doors, moving
                                                walls, and unexpected scares.
                                                Include actors in costume to interact with visitors and enhance the
                                                immersive experience.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/horrer1.mp4" type="video/mp4">
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
                                            <h2>Animal watch tower</h2>
                                            <p>Choose a strategic location within the park that provides clear views of
                                                animal habitats.
                                                Design the watch tower with platforms or windows, allowing visitors to
                                                have unobstructed views of the surrounding animal areas.Install
                                                informative signs with details about each animal species, including
                                                their habits, diets, and conservation status.
                                                Use visuals, diagrams, and interesting facts to engage visitors and
                                                enhance their understanding of wildlife</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/tower.mp4" type="video/mp4">
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
                                            <h2>Hunting house</h2>
                                            <p>Develop a variety of hunting scenarios and environments, ranging from
                                                forests and mountains to plains, providing a diverse gaming experience.
                                                Include a scoring system based on accuracy, speed, and precision to add
                                                a competitive element.Provide visitors with virtual hunting weapons,
                                                such as rifles or bows, equipped with motion-sensing technology for
                                                realistic interactions.
                                                Include feedback mechanisms to simulate the sensation of firing a
                                                weapon.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/ballon.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-7">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>Boat house</h2>
                                            <p>Offer a variety of boat types for visitors to choose from, such as
                                                paddleboats, rowboats, or electric boats.
                                                Ensure that the boats are safe, stable, and easy to use for visitors of
                                                all ages.Design scenic routes around the water feature that showcase the
                                                beauty of the park.
                                                Incorporate interesting landmarks, themed islands, or interactive
                                                elements along the routes to enhance the experience.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/boat.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-8">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>Burma Bridge</h2>
                                            <p>Construct a sturdy and safe bridge structure using high-quality materials
                                                that can withstand the weight and movements of visitors.
                                                Consider incorporating elements like suspension cables and wooden planks
                                                to create an authentic experience.Prioritize safety by implementing
                                                clear guidelines for usage and providing safety equipment such as
                                                harnesses and helmets.
                                                Conduct regular inspections and maintenance to ensure the bridge remains
                                                in optimal condition</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/bridge.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-9">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>Cargo Net</h2>
                                            <p>Construct the cargo net using high-quality and durable materials to
                                                ensure the safety of participants.
                                                Implement safety measures such as soft landing zones, safety harnesses,
                                                and clear guidelines for usage.Provide a variety of cargo nets with
                                                different challenge levels, catering to various age groups and skill
                                                levels.
                                                Incorporate additional challenges such as climbing walls, swinging
                                                elements, or suspended platforms to add diversity.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/net.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-10">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>Rain Forest</h2>
                                            <p>Incorporate a variety of tropical plants, trees, and foliage to create an
                                                authentic rainforest atmosphere.
                                                Introduce animatronic or live animals that are representative of
                                                rainforest ecosystems, such as exotic birds, butterflies, and
                                                reptiles.Create winding walking trails and paths that lead visitors
                                                through different sections of the Rain Forest.
                                                Include informational signs about various plant and animal species,
                                                fostering an educational experience.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/forest.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-11">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>Sloth Walk</h2>
                                            <p>Feature a variety of sloth species to provide visitors with the
                                                opportunity to observe different sizes, colors, and behaviors.
                                                Consider working with reputable wildlife conservation organizations for
                                                expert guidance on caring for sloths.Install informative signs about
                                                sloth behavior, habitat, diet, and conservation status.
                                                Educate visitors about the importance of preserving sloth habitats in
                                                the wild.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/walk.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-12">
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h2>360 Adventure Cycle</h2>
                                            <p>Design the Adventure Cycle with a central rotating axis that allows the
                                                entire bicycle to spin horizontally.
                                                Incorporate comfortable seating and safety features to ensure a secure
                                                experience for riders.Choose a scenic location within the park for the
                                                Adventure Cycle ride to provide riders with captivating views as they
                                                rotate.
                                                Consider incorporating the ride into a larger themed area for a more
                                                immersive experience.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/attrection/cycling.mp4" type="video/mp4">
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