<?php

include "../include/connect.php";
if (isset ($_POST['add_room'])) {
  $room_image = $_FILES['room_image']['name'];

  if (file_exists("./admin/images/gallery/" . $_FILES["room_image"]["name"])) {
    $store = $_FILES["room_image"]["name"];
    $_SESSION['status'] = "Image already exists: '$store'";
    header('Location:add_photo.php');
  } else {
    // Insert into the database
    $query = "INSERT INTO gallery(`image`) 
              VALUES('$room_image')";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
      move_uploaded_file($_FILES["room_image"]['tmp_name'], "./admin/images/gallery/" . $_FILES["room_image"]["name"]);
      $_SESSION['success'] = "Room added successfully.";
      header('Location: ./photo.php');
    } else {
      $_SESSION['success'] = "Room not added.";
      header('Location: ./photo.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Restar Admin</title>
  <script src="https://kit.fontawesome.com/206142e5bd.js" crossorigin="anonymous"></script>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/amusement-park.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet">
  <style>
    .div-add {
      background: #F5F7FF;
      padding: 18px 18px;
      width: 100%;
      -webkit-flex-grow: 1;
      flex-grow: 1;
    }
    .error{
      color: #DC3545;
      font-weight: bolder;
      font-family: Rubik,sans-serif;
      font-size: 15.2px;
    }
  </style>
</head>



<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <nav class="navbar col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo.png" class="mr-2" alt="logo"
            style="width: 100px; height:50px;" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/fair.png" alt="logo"
            style="width: 50px; height:50px;" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center btn1" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="fullscreen">
              <i class="fa-solid fa-expand"></i>
            </button>
          </li>
          <li class="nav-item dropdown">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face29.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="<?php echo isset ($_SESSION['email']) ? 'add.php' : 'login.php'; ?>">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="../admin/logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.php -->

      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="fa-solid fa-grip" style="font-size: 18px; margin: 5px;"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">
                <i class="fa-solid fa-table-columns" style="font-size: 18px; margin: 5px;"></i>
                <span class="menu-title">Registration Data</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="room_booking.php">
                <i class="fa fa-bed" style="font-size: 18px; margin: 5px;"></i>
                <span class="menu-title">Room Booking Data</span>
              </a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="daining_booking.php">
                  <i class="fas fa-utensils" style="font-size: 18px; margin: 5px;"></i>
                  <span class="menu-title">Daining Booking Data</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="offer_bookingdata.php">
                  <i class="fa-solid fa-percent" style="font-size: 18px; margin: 5px;"></i>
                  <span class="menu-title">Offer Booking Data</span>
                </a>
                </li>
            <li class="nav-item">
                        <a class="nav-link" href="add_room.php">
                            <i class="fa-regular fa-square-plus" style="font-size: 18px; margin: 5px;"></i>
                            <span class="menu-title">Added Room</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="photo.php">
                            <i class="fa-regular fa-square-plus" style="font-size: 18px; margin: 5px;"></i>
                            <span class="menu-title">Added Gallery</span>
                        </a>
                    </li>
                    <li class="nav-item">
              <a class="nav-link" href="event.php">
                <i class="fa-regular fa-square-plus" style="font-size: 18px; margin: 5px;"></i>
                <span class="menu-title">Added event</span>
              </a>

            </li>
            <li class="nav-item">
                        <a class="nav-link" href="add_offers.php">
                            <i class="fa-regular fa-square-plus" style="font-size: 18px; margin: 5px;"></i>
                            <span class="menu-title">Added Offers</span>
                        </a>
                    </li>
            <li class="nav-item">
              <a class="nav-link" href="event_booking.php">
                <i class="fa-solid fa-calendar-check" style="font-size: 18px; margin: 5px;"></i>
                <span class="menu-title">Event Booking</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ticket_booking.php">
                <i class="fa-solid fa-table-list" style="font-size: 18px; margin: 5px;"></i>
                <span class="menu-title">Ticket Booking Data</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact_us.php">
                <i class="fa-solid fa-address-book" style="font-size: 18px; margin: 5px;"></i>
                <span class="menu-title">Contact us Data</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="rbpayment.php">
                <i class="fa-regular fa-credit-card" style="font-size: 18px; margin: 5px;"></i>
                <span class="menu-title">Room Booking Payment</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tbpayment.php">
                <i class="fa-regular fa-credit-card" style="font-size: 18px; margin: 5px;"></i>
                <span class="menu-title">Ticket Booking Payment</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ebpayment.php">
                  <i class="fa-regular fa-credit-card" style="font-size: 18px; margin: 5px;"></i>
                  <span class="menu-title">Event Booking Payment</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="offerpay.php">
                  <i class="fa-regular fa-credit-card" style="font-size: 18px; margin: 5px;"></i>
                  <span class="menu-title">Offer Booking Payment</span>
                </a>
              </li>
            <li class="nav-item">
            <a class="nav-link" href="feedback.php">
              <i class="fa-solid fa-comments" style="font-size: 18px; margin: 5px;"></i>
              <span class="menu-title">Feedback</span>
            </a>
          </li>
          </ul>
          </nav>
        <div class="container div-add">
  <h2>Add Gallery</h2>
  <form method="post" name="room" onsubmit="return validtion()" action="" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="room_image">Gallery Image:</label>
          <input type="file" class="form-control-file" id="room_image" name="room_image">
          <span id="room1" class="error"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary" name="add_room">Add Image</button>
      </div>
    </div>
  </form>

  <!-- Display success or error messages -->
  <?php
  if (isset ($_SESSION['success']) && $_SESSION['success'] != '') {
    echo '<h2 class="bg-primary text-white"> ' . $_SESSION['success'] . ' </h2>';
    unset($_SESSION['success']);
  }

  if (isset ($_SESSION['status']) && $_SESSION['status'] != '') {
    echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
    unset($_SESSION['status']);
  }
  ?>
  </div>
  <script>
    

          document.addEventListener("DOMContentLoaded", function () {
            // Select the "ADD" button
            var addEventButton = document.getElementById('addEventButton');

            // Add click event listener to the "ADD" button
            addEventButton.addEventListener('click', function () {
              // When the button is clicked, show the modal popup
              $('#eventmodal').modal('show');
            });
          });
        </script>
        <!-- Add this code where you want to display the added event in a table -->
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="vendors/chart.js/Chart.min.js"></script>
        <script src="vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="js/dataTables.select.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/template.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="js/dashboard.js"></script>
        <script src="js/Chart.roundedBarCharts.js"></script>
        <!-- End custom js for this page-->
        </body>
        <script>
          function validtion() {
    let valid = true;

    // Clear previous error messages
    document.querySelectorAll('.error').forEach(function(span){
        span.innerHTML = '';
    });

    let room1 = document.forms["room"]["room_image"].value;

    if (room1 == "") {
        document.getElementById("room1").innerHTML = "Galary Image Is required";
        valid = false;
    }

    return valid; // Return the result of validation
}

// Automatically clear validation messages on user input
document.addEventListener("DOMContentLoaded", function () {
    let inputs = document.querySelectorAll("input, textarea");
    inputs.forEach(function(input) {
        input.addEventListener('input', function () {
            let errorSpan = this.nextElementSibling;
            if (errorSpan && errorSpan.classList.contains('error')) {
                errorSpan.innerHTML = '';
            }
        });
    });
});

</script>
</html>