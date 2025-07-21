<?php
include "./include/connect.php";

session_start();
if (!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

if (isset($_POST['add'])) {

    $username = $_POST['username'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO feedback1 (username, rating, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $username, $rating, $feedback);    

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/owl.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <style>
        .star-rating .bi-star {
    font-size: 2rem; /* Increase the size of stars */
    color: #ddd;     /* Default star color */
    cursor: pointer; /* Pointer cursor for interaction */
}

.star-rating .bi-star.selected {
    color: #ffca28;  /* Gold color for selected stars */
}
.error{
    color: #DC3545;
    font-weight: bolder;
}
</style>
</head>


<style>
    .map-container {
    position: relative;
    width: 100%;
    padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
}

.map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.star-rating .bi-star, .star-rating .bi-star-fill {
    font-size: 2rem; /* Consistent star size */
    color: #ddd;     /* Default color for unselected stars */
    cursor: pointer; /* Pointer cursor for interaction */
}

.star-rating .bi-star.selected, .star-rating .bi-star-fill.selected {
    color: #ffca28;  /* Yellow color for selected stars */
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
        $currentPage = 'feedback';
        include "header.php";
        ?>


        <!-- Page Title -->
        <section class="page-title">
            <div class="img-wrap parallax-demo-1">
                <div class="parallax-inner back-img"
                    style="background-image: url(assets/images/gallery/ride/amusement-park-at-the-center-of-amsterdam-at-night-GWHYXYV.jpg);">
                </div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Feedback</li>
                    </ul>
                    <div class="title">
                        <h1>FEEDBACK</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


      



        <!-- contact-section -->
        <section class="contact-section centred">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-8 col-lg-12 offset-xl-2 big-column">
                        <div class="sec-title centred">
                            <h2>give your <br />Feedback</h2>
                        </div>
                        <div class="form-inner">
                            <form method="post" id="contact-form" class="default-form" novalidate="novalidate">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Full name" required=""
                                            aria-required="true">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="feedback" required="" placeholder="Write Your Feedback"
                                            aria-required="true">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label for="rating">Enter Rating:</label>
                                        <div class="star-rating" id="star-rating">
                                        <i class="bi bi-star" data-rating="1"></i>
                                        <i class="bi bi-star" data-rating="2"></i>
                                        <i class="bi bi-star" data-rating="3"></i>
                                        <i class="bi bi-star" data-rating="4"></i>
                                        <i class="bi bi-star" data-rating="5"></i>
                                            </div>
                                            <!-- Hidden input to store the rating value -->
                                            <input type="hidden" id="rating" name="rating" value="0">
                                        </div>

                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn mr-0">
                                        <button class="theme-btn btn-one" type="submit" name="add"><span>Submit
                                                Feedback</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->


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
    <script>
    const stars = document.querySelectorAll('.star-rating .bi-star');
const ratingInput = document.getElementById('rating');

stars.forEach((star, idx) => {
    star.addEventListener('click', () => {
        const rating = idx + 1; // Get the star rating (1-5)
        ratingInput.value = rating; // Set the hidden input value

        // Reset all stars to outlined (unselected)
        stars.forEach(s => {
            s.classList.remove('selected', 'bi-star-fill');
            s.classList.add('bi-star');
        });

        // Fill the selected stars
        for (let i = 0; i <= idx; i++) {
            stars[i].classList.add('selected', 'bi-star-fill');
            stars[i].classList.remove('bi-star');
        }
    });
});

</script>


</body><!-- End of .page_wrapper -->


</html>