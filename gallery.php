
<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// session_start(); // Start session

include "./include/connect.php";

// if (isset($_POST['add'])) {

//     $_SESSION['fname'] = $_POST['fname'];
//     $_SESSION['lname'] = $_POST['lname'];
//     $_SESSION['email'] = $_POST['email'];
//     $_SESSION['birthdate'] = $_POST['birthdate'];
//     $_SESSION['city'] = $_POST['city'];
//     $_SESSION['phone'] = $_POST['phone'];
//     $_SESSION['room'] = $_POST['room'];
//     $_SESSION['nroom'] = $_POST['nroom'];
//     $_SESSION['totalprice'] = $_POST['totalprice'];
//     $_SESSION['checkin'] = $_POST['checkin'];
//     $_SESSION['checkout'] = $_POST['checkout'];

//     $fname = $_POST['fname'];
//     $lname = $_POST['lname'];
//     $email = $_POST['email'];
//     $birthdate = $_POST['birthdate'];
//     $city = $_POST['city'];
//     $phone = $_POST['phone'];
//     $room = $_POST['room'];
//     $nroom = $_POST['nroom'];
//     $totalprice = $_POST['totalprice'];
//     $checkin = $_POST['checkin'];
//     $checkout = $_POST['checkout'];


//     $insert = "INSERT INTO `room`(`fname`,`lname`,`email`,`birthdate`,`city`,`phone`,`room`,`nroom`,`totalprice`,`checkin`,`checkout`) VALUES ('$fname','$lname','$email','$birthdate','$city','$phone','$room','$nroom','$totalprice','$checkin','$checkout')";

//     $result = $conn->query($insert);

//     if ($result) {
//         // Redirect to payment page
//         header("location: card.php");
//         exit(); // Make sure to exit after redirection
//     } else {
//         echo "<div class='alert alert-danger'>Error processing form submission.</div>";
//     }
// }
include 'include/connect.php';

// Fetch rooms from the database
$query = "SELECT * FROM gallery";
$result = mysqli_query($conn, $query);

// Check for any errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<?php
    $currentPage = 'gallery';
    include "header.php";
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
        $currentPage = 'gallery';
        include "header.php";
        ?>

        <!-- Page Title -->
        <section class="page-title">
            <div class="img-wrap parallax-demo-1">
                <div class="parallax-inner back-img" style="background-image: url(assets/images/background/page-title.jpg);"></div>
            </div>
            <div class="auto-container">
                <div class="content-box">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index-2.php">Home</a></li>
                        <li>Our Gallery</li>
                    </ul>
                    <div class="title">
                        <h1>Our Gallery</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- gallery-page-section -->
        <section class="gallery-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 gallery-block">
                    <div class="gallery-block-two">
                        <div class="inner-box">
                            <div class="card">
                                <img src="admin/images/gallery/<?php echo htmlspecialchars($row['image']); ?>" 
                                     class="card-img-top room-image" 
                                     alt="Image"
                                     style="width: 370px; height: 493.02px; object-fit: cover; border-radius: 5px;">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

        <!-- gallery-page-section end -->


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