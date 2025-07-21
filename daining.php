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
            $currentPage = 'dining';
            include "header.php";
        ?>


        <!-- Page Title -->
        <section class="page-title">
            <div class="img-wrap parallax-demo-1">
                <div class="parallax-inner back-img" style="background-image: url(assets/images/gallery/daining/long.jpg);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Dining</li>
                    </ul>
                    <div class="title">
                        <h1>Best place to eat</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- daining-section -->
        <section class="animals-section sec-pad">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h2>dining <br />in our Restar Amusement park</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box p_relative d_block mb_60 centred">
                        <div class="tab-btns tab-buttons centred">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-1">
                                        <div class="icon-box"><img src="assets\images\icons\daining\001-cafe.png" alt=""></div>
                                        <h5>Restar CAFE</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn active-btn" data-tab="#tab-2">
                                        <div class="icon-box"><img src="assets\images\icons\daining\002-bar-counter.png" alt=""></i></div>
                                        <h5>tusker bar</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-3">
                                        <div class="icon-box"><img src="assets\images\icons\daining\003-beach-hut.png" alt=""></div>
                                        <h5>Bamboo Huts</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-4">
                                        <div class="icon-box"><img src="assets\images\icons\daining\004-grill.png" alt=""></div>
                                        <h5>BBQ</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-5">
                                        <div class="icon-box"><img src="assets\images\icons\daining\005-bonfire.png" alt=""></div>
                                        <h5>bonfire</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 single-column">
                                    <div class="single-item tab-btn" data-tab="#tab-6">
                                        <div class="icon-box"><img src="assets\images\icons\daining\006-picnic-basket.png" alt=""></div>
                                        <h5>Picnic</h5>
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
                                            <h2>Restar Cafe</h2>
                                            <p>Our elegant multi-cuisine restaurant is the perfect setting for family celebrations, reunions, work functions, corporate meetings and more. 
                                               The elaborate menu and utilities of Restar Cafe make it one of the best restaurants in Mettupalayam. A wall of floor-to-ceiling windows allows natural sunlight to reach every table. 
                                               For those who wish to feel more outdoors, we do offer seating in our Bamboo Garden section at our Mettupalayam restaurant. You will find crowd favourites from South Indian and Chettinad cuisines on our extensive menu. </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 video-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/daining/cafee.mp4" type="video/mp4">
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
                                            <h2>Tusker Bar</h2>
                                            <p>The rustic aesthetic of Tusker Bar has been inspired by traditional English clubs which had once existed in tea plantations. 
                                               It's a great dive bar in Mettupalayam, and great dive bars always have something epic about them, some surprising something that makes you shake your head as you drink your drink. Our menu comprises crowd-pleasers like fish fingers, kebabs and Chinese entrees. 
                                               With a wide array of wines by the glass or bottle, an elegant cocktail list, Mocktails and beers, Tusker Bar is one of the best restaurants.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 video-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/daining/barr.mp4" type="video/mp4">
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
                                            <h2>Bamboo Huts</h2>
                                            <p>This hut-themed restaurant in Mettupalayam will give you the entire desi feel. 
                                               Are you, like us, always on the hunt for a new restaurant, a new hangout spot? Well, then you’re gonna love the hut-themed Bamboo garden huts in our resort. This restaurant is actually a hut made with bamboos, and as the name suggests, is full-on desi with a traditional touch! Guests are provided with outside seating arrangements. The restaurant serves a variety of multi-cuisine dishes that go well with the ambience of this place. Modest on the onset, Bamboo Huts is one of the finest restaurants. 
                                               The decor and interiors of this place give out a comfy, chilled vibe that makes you enjoy the food all the more! </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 video-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/daining/bambo.mp4" type="video/mp4">
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
                                            <h2>BBQ</h2>
                                            <p>Create a diverse and appealing BBQ menu that includes a variety of meats, seafood, vegetables, and marinades.
                                               Consider offering customizable options, allowing customers to choose their preferred meats and sauces.Employ skilled chefs or grill masters who are knowledgeable about different BBQ techniques and can provide a delightful culinary experience.
                                               Provide training on food safety and proper grilling techniques.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 video-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/daining/bbqq.mp4" type="video/mp4">
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
                                            <h2>Bonfire</h2>
                                            <p>A day at the restar Resort won’t be complete without a Bonfire! Head down to the Central lawn where you can team up with your family and friends for some hip hop Music and dance around the Bonfire. 
                                               It conducts complimentary evening activities for room guests. This is a unique experience seldom offered at even the best restaurants. Imagine watching hot and delicious kebabs being seared to perfection on a grill right in front of you, as a fire roars and crackles nearby. 
                                               Savour these tantalizing kebabs as you swap stories under the night sky with the cool breeze of the hills giving you company. The restaurant also hosts private events. Dining in doesn't get any better than this!</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 video-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/daining/fire.mp4" type="video/mp4">
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
                                            <h2>Picnic By The Fountain</h2>
                                            <p>From freshly made scotch eggs to fragrant salads and seasonal strawberries, nothing quite beats a picnic in the great outdoors on a balmy summer’s day. Choose from our three picnic <br>
                                               • The Simple Garden Picnic<br>
                                               • A Traditional Orchard Picnic<br>
                                               • The Most Decadent Sparkling Riverside Picnic<br>
                                               All of our picnics are served in a hamper complete with a blanket, disposable plates and cutlery and glasses for your celebration. The staff members from our restaurants will arrange these hampers for you. Simply pre-order, collect your basket, blanket and bubbles then find a sunny riverside picnic spot for a treat.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 video-column">
                                        <figure class="video-box">
                                            <div class="video-container">
                                                <video muted autoplay loop>
                                                    <source src="assets/video/daining/basket.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn mr-0 text-center">
                    <a href="bookdaining.php" class="theme-btn btn-one">Book Dining</a>
</div>

            </div>
        </section>
        <!-- danining-section end -->
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