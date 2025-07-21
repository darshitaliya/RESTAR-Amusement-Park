<?php

include "../include/connect.php";

if (isset($_POST['add_room'])) {
    // Retrieve form data
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $max_person = $_POST['max_person'];
    $size = $_POST['size'];
    $bed = $_POST['bed'];
    $description = $_POST['description'];
    $room_image = $_FILES['image']['name'];

    // Check if the image already exists
    if (file_exists("upload/" . $_FILES["image"]["name"])) {
        $_SESSION['status'] = "Image already exists: " . $_FILES["image"]["name"];
        header('Location: add_room.php');
        exit();  // Exit after header redirection
    } else {
        // Insert room details into database
        $query = "INSERT INTO rooms (room_type, price, max_person, size, bed, description, image)
                  VALUES ('$room_type', '$price', '$max_person', '$size', '$bed', '$description', '$room_image')";

        $query_run = mysqli_query($conn, $query);

        // Check if query was successful
        if ($query_run) {
            // Move the uploaded image to the destination folder
            move_uploaded_file($_FILES["image"]['tmp_name'], "./admin/assets/images/room/" . $_FILES["image"]["name"]);
            $_SESSION['success'] = "Room added successfully.";
            header('Location: add_room.php');
        } else {
            $_SESSION['status'] = "Failed to add room.";
            header('Location: add_room.php');
        }
        exit();  // Exit after header redirection
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
    <style>
        .div-add {
            background: #F5F7FF;
            padding: 18px 18px;
            width: 100%;
            -webkit-flex-grow: 1;
            flex-grow: 1;
        }

        .add1 {
            background-color: #4B49AC;
            position: fixed;
            height: auto;
            padding: 5px;
            font-size: 50px;
            color: #FFEEB8;
            width: 75px;
            text-align: center;
            border-radius: 10%;
            bottom: 10px;
            text-decoration: none;
            right: 10px;
            z-index: 1;
        }

        .add1:hover {
            color: #FFFFFF;
            text-decoration: none;
        }
    </style>
</head>



<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.php -->
        <nav class="navbar col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo.png" class="mr-2"
                        alt="logo" style="width: 100px; height:50px;" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/fair.png" alt="logo"
                        style="width: 50px; height:50px;" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center btn1" type="button"
                    data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                            data-toggle="fullscreen">
                            <i class="fa-solid fa-expand" style=""></i>
                        </button>
                    </li>
                    <li class="nav-item dropdown">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="images/faces/face29.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item"
                                href="<?php echo isset($_SESSION['email']) ? 'add.php' : 'login.php'; ?>">
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
                        <a class="nav-link" href="add_photo.php">
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

            <!-- Button trigger modal -->
            <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                echo '<h2 class="bg-primary text-white"> ' . $_SESSION['success'] . ' </h2>';
                unset($_SESSION['success']);
            }

            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                unset($_SESSION['status']);
            }
            ?>
            <a href="add_room.php" class="add1">
                +
            </a>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <?php
                                require ("../include/connect.php");
                                $query = "select * from rooms order by id desc";
                                $result = mysqli_query($conn, $query) or die("Query Failed!!!" . mysqli_error($conn));
                                if (mysqli_num_rows($result) > 0) {
                                    echo "<div class='col-lg-12 grid-margin stretch-card'>
          <div class='card'>
            <div class='card-body'>
              <h1 style='text-transform: uppercase; font-size: 35px;'>Added Rooms</h1>
              <div class='table-responsive pt-3'>
                <table class='table table-bordered'>
                  <thead>
                    <tr class='table-warning'>
                      <th>
                        ID
                      </th>
                      <th>
                        Room Type
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        Max_Person
                      </th>
                      <th>
                      Size
                      </th>
                      <th>
                        Bed
                      </th>
                      <th>
                        Image
                      </th>
                      <th>
                        EDIT
                      </th>
                      <th>
                        DELETE
                      </th>
                    </tr>

                        </thead>";
                                    while ($row = mysqli_fetch_array($result)) {
                                        $img = "images/room/$row[image]";
                                        echo "<tbody>
                          <tr>
                              <td>$row[id]</td>
                              <td>$row[room_type]</td>
                              <td>$row[price]</td>
                              <td 'style:text-wrap: wrap;'>$row[description]</td>
                              <td>$row[max_person]</td>
                              <td>$row[size]</td>
                              <td>$row[bed]</td>
                              <td><img src=$img style='width:250px !important;height: 160px !important;border-radius:0% !important' alt=$row[image]></td>
                              <td><a class='btn btn-inverse-success btn-sm' href='edit_room.php?id=$row[0]'><i class='mdi mdi-pencil-circle-outline mdi-24px'></i></td>
                              <td><a class='btn btn-inverse-danger btn-sm' href='delete_room.php?id=$row[0]'><i class='mdi mdi-delete-empty mdi-24px'></td>
                            </tr>
                          </tbody>";
                                    }
                                    echo "</table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>";
                                } else {
                                    echo "<div class='col-12 m-1 grid-margin'>
              <div class='card'>
                <div class='row'>
                  <div class='card-body'>
                    <h1 style='text-align:center; text-shadow:-2px 2px 4px black;'>No Events Are Available Now!!!</h1>
                  </div>
                </div>
              </div>
            </div>";    
                                }
                                ?>
                            </div>
                        </div>
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
                    <!-- Add this code where you want to display the   event in a table -->
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

</html>