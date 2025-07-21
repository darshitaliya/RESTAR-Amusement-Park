<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:login.php");
    exit();
}

include "./include/connect.php";

// Fetch room types and prices
$query = "SELECT id, toffer, Price FROM offer";
$result = $conn->query($query);

$rooms = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }
} else {
    echo "No offer found.";
}

// Handle form submission
if (isset($_POST['add'])) {
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['toffer'] = $_POST['toffer'];
    $_SESSION['person'] = $_POST['person'];
    $_SESSION['totalprice'] = $_POST['totalprice'];
    $_SESSION['amount'] = $_POST['amount'];




    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $offer = $_POST['toffer'];
    $person = $_POST['person'];
    $totalprice = $_POST['totalprice'];
    $amount = $_POST['amount'];


    $insert = "INSERT INTO `offerbook`(`fname`, `lname`, `email`, `phone`, `toffer`, `person`, `totalprice`, `amount`) VALUES ('$fname', '$lname', '$email', '$phone', '$offer', '$person', '$totalprice', '$amount')";

    $result = $conn->query($insert);

    if ($result) {
        header("location: card4.php");
        exit();
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
    </style>
</head>
<script>
        function validateForm() {
            let isValid = true;
            const inputs = document.querySelectorAll('#myForm input[required]');

            inputs.forEach(function (input) {
                // Check if the input is empty or contains only spaces
                if (input.value.trim() === '') {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                alert('Please fill out all required fields without spaces only.');
            }

            return isValid; // Prevent form submission if not valid
        }
    </script>

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
                            <h2>BOOK YOUR OFFER</h2>
                        </div>
                        <div class="form-inner text-left">
                            <form method="post" action="" id="booking-form" class="default-form" novalidate="novalidate" onsubmit="return validateForm()">
                                <!-- Your form fields go here -->
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">First Name:</label>
                                        <input type="text" class="form-control text-font" name="fname" id="fname" placeholder="First Name" required>

                                        <div class="invalid-feedback">Please enter your first name.</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Last Name:</label>
                                        <input type="text" class="form-control text-font" name="lname" id="lname" placeholder="Last Name" required>

                                        <div class="invalid-feedback">Please enter last your name.</div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Email:</label>
                                        <input type="text" class="form-control text-font" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" placeholder="Email" required>
                                        <div class="invalid-feedback invalid-feedback-email">Please enter a valid email
                                            address.</div>
                                    </div>
                                    <div class="col-lg-6  col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Phone:</label>
                                        <input type="text" class="form-control text-font" name="phone" id="phone" maxlength="10" placeholder="Enter your phone number" pattern="\d{10}" title="Please enter a valid 10-digit phone number" required>
                                        <div class="invalid-feedback invalid-feedback-text">Please enter your phone
                                            number.</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="room" class="h6">Choose Your Offers:</label><br>
                                        <select id="roomDropdown" class="form-control text-font" name="toffer" required onchange="updateRoomPrice()">
                                            <!-- Default option that acts as a placeholder -->
                                            <option value="" disabled selected>Select Offers</option>
                                            <?php foreach ($rooms as $room): ?>
                                                <option value="<?php echo htmlspecialchars($room['id']); ?>" data-price="<?php echo htmlspecialchars($room['Price']); ?>">
                                                    <?php echo htmlspecialchars($room['toffer']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="room" class="h6">Offer Price:</label>
                                        <p id="roomPrice">₹ 00000</p>
                                    </div>

                                    <!-- Modify the PHP code to calculate the total price -->
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Number of Offer:</label>
                                        <div class="input-group">
                                            <button type="button" class="btn btn-warning d-flex align-items-center text-font" onclick="decrementRooms()">-</button>
                                            <input type="text" class="form-control text-font" required="" name="person" id="number-of-rooms" placeholder="Enter number of rooms" onchange="updateTotalPrice()" value="1">
                                            <button type="button" class="btn btn-warning d-flex align-items-center text-font" onclick="incrementRooms()">+</button>
                                        </div>
                                        <div class="invalid-feedback">Please enter the number of rooms.</div>
                                    </div>

                                    <!-- Add this to display the total price -->
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="room" class="h6">Total Price:</label>
                                        <input type="text" class="form-control text-font" name="totalprice" id="totalPrice" value="0" readonly>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label for="amount" class="h6">Amount:</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="0" id="amount" name="amount" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn mr-0 text-center">
                                        <button class="theme-btn btn-one" name="add" id="add" onclick="updateTotalPrice();">Book your Offer</button>
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
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today = yyyy + '-' + mm + '-' + dd;

        // Set the minimum date for the check-in input to today
        document.getElementById("checkin").setAttribute("min", today);
        document.getElementById("checkout").setAttribute("min", today);
        document.getElementById("birthdate").setAttribute("max", today);

        // birth
        // var today = new Date();
        // var minDate = new Date(today.getFullYear() - 100, today.getMonth(), today.getDate());

        // // Format the date as YYYY-MM-DD
        // var yyyy = minDate.getFullYear();
        // var mm = minDate.getMonth() + 1;
        // var dd = minDate.getDate();
        // if (mm < 10) {
        //     mm = '0' + mm;
        // }
        // if (dd < 10) {
        //     dd = '0' + dd;
        // }
        // var formattedMinDate = yyyy + '-' + mm + '-' + dd;

        // // Set the minimum date for the birthdate input to 100 years ago
        // document.getElementById("birthdate").setAttribute("max", formattedMinDate);

        // date rev validation
        // $(function(updatedate) {
        //     var dtToday = new Date();

        //     var month = dtToday.getMonth() + 1;
        //     var day = dtToday.getDate();
        //     var year = dtToday.getFullYear();
        //     if (month < 10)
        //         month = '0' + month.toString();
        //     if (day < 10)
        //         day = '0' + day.toString();

        //     var maxDate = year + '-' + month + '-' + day;

        //     $('#birthdate').attr('max', maxDate);
        // });

        // Function to update the room price based on the selected room
// Function to update the room price based on the selected room
function updateRoomPrice() {
    var roomDropdown = document.getElementById('roomDropdown');
    var priceDisplay = document.getElementById('roomPrice');
    var selectedRoomPrice = roomDropdown.options[roomDropdown.selectedIndex].getAttribute('data-price');
    
    // Display selected room price
    priceDisplay.innerHTML = '₹' + selectedRoomPrice + '';
    
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

// Increment rooms count
function incrementRooms() {
    var numberOfRooms = document.getElementById('number-of-rooms');
    numberOfRooms.value = parseInt(numberOfRooms.value, 10) + 1;
    updateTotalPrice(); // Recalculate price
}

// Decrement rooms count
function decrementRooms() {
    var numberOfRooms = document.getElementById('number-of-rooms');
    if (parseInt(numberOfRooms.value, 10) > 1) {
        numberOfRooms.value = parseInt(numberOfRooms.value, 10) - 1;
        updateTotalPrice(); // Recalculate price
    }
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
            // Custom validation for date of birth
            var birthdate = document.getElementById('birthdate').value;
            var birthdateInput = new Date(birthdate);
            var today = new Date();
            if (birthdateInput >= today) {
                document.getElementById('birthdate').classList.add('is-invalid');
                document.querySelector('.invalid-feedback-date-birthdate').style.display = 'block';
                return false;
            }

            // Custom validation for check-in and check-out dates
            var checkin = document.getElementById('checkin').value;
            var checkout = document.getElementById('checkout').value;
            if (new Date(checkout) <= new Date(checkin)) {
                document.getElementById('checkout').classList.add('is-invalid');
                document.getElementById('checkin').classList.add('is-invalid');
                document.querySelector('.invalid-feedback-date-checkout').style.display = 'block';
                document.querySelector('.invalid-feedback-date-checkin').style.display = 'block';
                return false;
            }
            return true;
        }

        document.getElementById('number-of-rooms').addEventListener('change', updateTotalPrice);
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