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
        include "header.php";
        ?>


        <!-- Page Title -->
        <section class="page-title">
            <div class="img-wrap parallax-demo-1">
                <div class="parallax-inner back-img"
                    style="background-image: url(assets/images/gallery/zoo/gallery-26.jpg);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index-2.php">Home</a></li>
                        <li>Attrection</li>
                    </ul>
                    <div class="title">
                        <h1>Zoo</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- animals-section -->
        <section class="animals-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h2>amazing animal's <br />in our Restar Zoo</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box p_relative d_block mb_60 centred">
                        <div class="tab-btns tab-buttons centred">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-1">
                                        <div class="icon-box"><img src="assets/images/icons/zoo/004-tiger.png" alt="">
                                        </div>
                                        <h5>tiger</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn active-btn" data-tab="#tab-2">
                                        <div class="icon-box"><img src="assets/images/icons/zoo/003-elephant.png"
                                                alt=""></i></div>
                                        <h5>Elephant</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-3">
                                        <div class="icon-box"><img src="assets/images/icons/zoo/005-teddy-bear.png"
                                                alt=""></div>
                                        <h5>bear</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-4">
                                        <div class="icon-box"><img src="assets/images/icons/zoo/002-penguin.png" alt="">
                                        </div>
                                        <h5>penguin</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-5">
                                        <div class="icon-box"><img src="assets/images/icons/zoo/006-koala.png" alt="">
                                        </div>
                                        <h5>koala</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-6">
                                        <div class="icon-box"><img src="assets/images/icons/zoo/001-monkey.png" alt="">
                                        </div>
                                        <h5>Monkey</h5>
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
                                            <h2>tiger</h2>
                                            <p>
                                                Featuring majestic tigers in our zoo can be a powerful draw for
                                                visitors. Design an expansive and naturalistic enclosure that mirrors
                                                the tiger's native habitat,
                                                complete with rocks, trees, and water features. Implement educational
                                                signage near the exhibit to enlighten visitors about the species,
                                                emphasizing conservation efforts and the importance of protecting these
                                                magnificent animals. Introduce interactive experiences,
                                                such as scheduled feeding times or keeper talks, to engage visitors and
                                                deepen their understanding of tigers.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/animal/tiger.mp4" type="video/mp4">
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
                                            <h2>Elephant</h2>
                                            <p>
                                                Featuring elephants in our zoo can be a captivating attraction for
                                                visitors.
                                                Design a spacious and enriching enclosure that provides ample room for
                                                these intelligent and social animals to roam,
                                                including features like mud pits and water elements for their enjoyment.
                                                Implement educational displays near the exhibit to inform visitors about
                                                elephants'
                                                behaviors, social structures, and the conservation challenges they face
                                                in the wild.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/animal/elephent.mp4" type="video/mp4">
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
                                            <h2>bear</h2>
                                            <p>
                                                Introducing bears to your zoo can be an exciting and popular attraction.
                                                Design a spacious and naturalistic enclosure that reflects the bears'
                                                native habitat,
                                                incorporating features like rocks, trees, and water elements to enhance
                                                their environment.
                                                Implement educational displays near the exhibit to provide information
                                                about the bear species, their behavior,
                                                and the conservation challenges they may face. Consider incorporating
                                                interactive elements, such as scheduled feeding times or talks by
                                                knowledgeable zookeepers,
                                                to engage visitors and offer insights into the bears' lives.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/animal/bear.mp4" type="video/mp4">
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
                                            <h2>Penguin</h2>
                                            <p>
                                                Featuring penguins in your zoo can be a delightful and engaging
                                                attraction for visitors of all ages.
                                                Design a dynamic exhibit with a chilled environment, complete with
                                                underwater viewing areas to showcase the penguins'
                                                agile swimming skills. Incorporate rocks, ice structures, and realistic
                                                lighting to simulate their natural habitat.
                                                Educational displays near the exhibit can provide information about the
                                                different penguin species, their behaviors,
                                                and the challenges they face in the wild.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/animal/penguin.mp4" type="video/mp4">
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
                                            <h2>KOala</h2>
                                            <p>
                                                Design a habitat that mimics the eucalyptus-rich environment of their
                                                native Australia,
                                                incorporating trees for climbing and sleeping. Educational displays near
                                                the exhibit can inform visitors about koala behaviors,
                                                diet (primarily eucalyptus leaves), and the importance of conservation
                                                efforts to protect their habitats.
                                                Koalas are known for their sedentary nature, so providing comfortable
                                                perches and observing platforms for visitors can enhance the viewing
                                                experience.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/animal/koala.mp4" type="video/mp4">
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
                                            <h2>monkey</h2>
                                            <p>
                                                Design a dynamic and stimulating enclosure with climbing structures,
                                                ropes,
                                                and platforms to allow the monkeys to exhibit their natural behaviors.
                                                Provide plenty of vegetation to mimic their forested habitats, creating
                                                an immersive environment.
                                                Educational displays near the exhibit can inform visitors about the
                                                diverse species of monkeys, their social structures,
                                                and the conservation issues they face in the wild. Consider implementing
                                                feeding times or interactive sessions with zookeepers to engage visitors
                                                and offer insights into the intelligence and adaptability of monkeys.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/animal/monkey.mp4" type="video/mp4">
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