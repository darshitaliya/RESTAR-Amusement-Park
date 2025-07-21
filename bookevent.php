<?php


session_start();
if (!isset($_SESSION['email'])) {
    header("Location:login.php");
    exit();
}
include "./include/connect.php";

$query = "SELECT id, event_name, event_price FROM events";
$result = $conn->query($query);

$events = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
} else {
    echo "No Event found.";
}

// Check if the form has been submitted
if (isset($_POST['add'])) {
    // Retrieve form data

    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['event'] = $_POST['event'];
    $_SESSION['npass'] = $_POST['npass'];
    $_SESSION['totalprice'] = $_POST['totalprice'];


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $event = $_POST['event'];
    $npass = $_POST['npass'];
    $totalprice = $_POST['totalprice'];

    // Prepare and execute SQL query to insert data into database table
    $insert = "INSERT INTO `event_data` (`fname`, `lname`, `email`, `phone`, `event`, `npass`, `totalprice`) 
               VALUES ('$fname', '$lname', '$email', '$phone', '$event', '$npass', '$totalprice')";
    $result = $conn->query($insert);

    // Check if the query was successful
    if ($result) {
        // Redirect to payment page
        header("location: card3.php");
        exit(); // Make sure to exit after redirection
    } else {
        echo "<div class='alert alert-danger'>Error processing form submission.</div>";
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

    <style>
       .was-validated #roomDropdown:valid {
            background-position: right calc(0.375em + 1.1875rem) center;
        }

        .error-container {
            color: red;
            margin-bottom: 10px;
        }

        .error-block {
            background-color: #ffeeee;
            padding: 10px;
            border: 1px solid #ff0000;
            margin-bottom: 10px;
        }

        .error-message {
            margin: 5px 0;
        }
        .invalid-feedback{
            font-weight:bolder;
            display: none;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 95%;
            color: #dc3545;
        }

        .lin {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .box1 {
            height: 565px;
            width: 250px;
            margin: 35px;
            text-align: center;
            color: black;
            background-color: white;
            font-family: "Quicksand", sans-serif;
            align-items: center;


        }

        @media (max-width: 767px) {
            .box1 {
                width: 60%;
                /* Set width to full on small devices */
            }
        }

        .rim {

            text-align: center;
            text-decoration: none;
            font-weight: 400;
            padding-top: 10px;
            color: #3D3D3D;
            box-shadow: 0 3px 5px rgba(1, 0, 0, 0.4);
        }

        h4.card-title1 {
            margin-bottom: 20px;
            padding: 15px;
            text-align: center;
            font-size: 15px;
            text-transform: uppercase;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            border-radius: 20%;
            border: solid black 2px;
        }

        h3.card-title2 {
            margin: 10px;
            text-align: center;
            font-size: 13px;
            text-transform: uppercase;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        p.card-title2 {
            margin: 10px 0px;
            text-align: center;
            font-size: 12px;
            line-height: 20px;
            text-transform: uppercase;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }


        img.image-shadow {
            box-shadow: 0 3px 5px rgba(1, 0, 0, 0.4);
        }

        .boxed_wrapper {
            overflow-x: unset !important;
        }
        
    </style>
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



        <!-- Page Title -->


        <!--daining end-->
        <!--Ticket booking start-->
        <section class="contact-section centred" id="pricing-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-8 col-lg-12 offset-xl-2 big-column">
                        <div class="sec-title centred">
                            <h2>BOOK YOUR Event</h2>
                        </div>
                        <div class="form-inner text-left">
                            <form method="post" action="" id="booking-form" class="default-form" novalidate="novalidate"
                                onsubmit="return validateForm()">
                                <!-- Your form fields go here -->
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">First Name:</label>
                                        <input type="text" class="form-control text-font" name="fname" id="fname"
                                            placeholder="First Name"    >

                                        <div class="invalid-feedback">Please enter your name.</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Last Name:</label>
                                        <input type="text" class="form-control text-font" name="lname" id="lname"
                                            placeholder="Last Name" required>

                                        <div class="invalid-feedback">Please enter your name.</div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Email:</label>
                                        <input type="text" class="form-control text-font" id="email" name="email"
                                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}"
                                            placeholder="Email" required>
                                        <div class="invalid-feedback invalid-feedback-email">Please enter a valid
                                            email
                                            address.</div>
                                    </div>


                                    <div class="col-lg-6  col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Phone:</label>
                                        <input type="text" class="form-control text-font" required="" name="phone"
                                            placeholder="Enter your phone number" id="phone">
                                        <div class="invalid-feedback invalid-feedback-text">Please enter your phone
                                            number.</div>
                                    </div>
                                    <div class="col-lg-6  col-md-6 col-sm-12 form-group">
                                        <label for="room" class="h6">Choose Your event</label><br>
                                        <select id="roomDropdown" class="form-control text-font" name="event" required="" onchange="updateRoomPrice()">
                                    <option value="" disabled selected>Select Event</option>
                                    <?php foreach ($events as $event): ?>
                                        <option value="<?php echo htmlspecialchars($event['id']); ?>" data-price="<?php echo htmlspecialchars($event['event_price']); ?>">
                                            <?php echo htmlspecialchars($event['event_name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="room" class="h6">Event Price:</label>
                                        <p id="roomPrice">per pass(One Pass Only 4 People)</p>
                                    </div>

                                    <!-- Modify the PHP code to calculate the total price -->
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Number of pass:</label>
                                        <div class="input-group">
                                            <button type="button"
                                                class="btn btn-warning d-flex align-items-center text-font"
                                                onclick="decrementPasses()">-</button>
                                            <input type="text" class="form-control text-font" required="" name="npass"
                                                id="number-of-passes" placeholder="Enter number of passes"
                                                onchange="updateTotalPrice()" value="0">
                                            <button type="button"
                                                class="btn btn-warning d-flex align-items-center text-font"
                                                onclick="incrementPasses()">+</button>
                                        </div>
                                        <div class="invalid-feedback">Please enter the number of rooms.</div>
                                    </div>

                                    <!-- Add this to display the total price -->
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="room" class="h6">Total Price:</label>
                                        <input type="text" class="form-control text-font" name="totalprice"
                                            id="totalPrice" value="" readonly>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn mr-0 text-center">
                                        <button class="theme-btn btn-one" name="add" id="add"
                                            onclick="updateTotalPrice();">Book your event</button>
                                    </div>

                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!--Ticket booking end-->

    <script>
        // date valiation
        $(function (updatedate) {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var minDate = year + '-' + month + '-' + day;

            $('#checkin').attr('min', minDate);
            $('#checkout').attr('min', minDate);
        });

        // date rev validation
        $(function (updatedate) {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('#birthdate').attr('max', maxDate);
        });

        function updateRoomPrice() {
    var roomDropdown = document.getElementById('roomDropdown');
    var priceDisplay = document.getElementById('roomPrice');
    var selectedRoomPrice = roomDropdown.options[roomDropdown.selectedIndex].getAttribute('data-price');
    
    // Display selected room price
    priceDisplay.innerHTML = '' + selectedRoomPrice + ' per night';
    
    // Call updateTotalPrice to calculate the total based on this price and current number of rooms
    updateTotalPrice();
}

// Function to update the total price based on the selected room price and number of rooms
function updateTotalPrice() {
    var roomDropdown = document.getElementById('roomDropdown');
    var selectedRoomPrice = parseFloat(roomDropdown.options[roomDropdown.selectedIndex].getAttribute('data-price'));
    var numberOfRooms = parseInt(document.getElementById('number-of-rooms').value, 10);
    var totalPrice = selectedRoomPrice * numberOfRooms;
    
    // Update the form field
    document.getElementById('totalPrice').value = totalPrice.toFixed(2);
    document.getElementById('amount').value = totalPrice.toFixed(2);

}

        // Function to increment the number of rooms
        function decrementPasses() {
            var numberOfPasses = document.getElementById('number-of-passes');
            var currentValue = parseInt(numberOfPasses.value, 10);
            if (currentValue > 1) {
                numberOfPasses.value = currentValue - 1;
                updateTotalPrice();
            }
        }

        // Function to decrement the number of rooms (minimum value is 1)
        function incrementPasses() {
            var numberOfPasses = document.getElementById('number-of-passes');
            numberOfPasses.value = parseInt(numberOfPasses.value, 10) + 1;
            updateTotalPrice();
        }


        // Function to update the total price based on the number of rooms
        function updateTotalPrice() {
            var roomPrice = document.getElementById('roomPrice').innerText;
            var numberOfPasses = document.getElementById('number-of-passes').value;

            // Extract the numerical value from the room price
            var roomPriceValue = parseInt(roomPrice.replace(/[^\d]/g, ''), 10);

            // Calculate the total price
            var totalPrice = roomPriceValue * parseInt(numberOfPasses, 10);

            // Display the total price
            document.getElementById('totalPrice').value = '₹' + totalPrice;
        }
    </script>
    <script>
        function validateForm() {
            var form = document.getElementById('booking-form');
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
                return false;
            }
            return true;
        }

        // Event listener to update total price when the number of passes changes
        document.getElementById('number-of-passes').addEventListener('change', updateTotalPrice);
    </script>


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
        function scrollToSection() {
            var pricingSection = document.getElementById('pricing-section');

            if (pricingSection) {
                pricingSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>

</body><!-- End of .page_wrapper -->


</html>