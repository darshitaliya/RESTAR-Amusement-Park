<?php

include "../include/connect.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}


if (isset ($_POST['logout'])) {
  session_unset();
  session_destroy();
  header("location:login.php");
}

if (isset ($_POST['delete'])) {
  $guestIdToDelete = $_POST['delete'];
  $deleteQuery = "DELETE FROM `register` WHERE `guestId` = $guestIdToDelete";

  if ($conn->query($deleteQuery) === TRUE) {
    // Deletion successful, you can redirect or perform other actions if needed
  } else {
    echo "Error: " . $conn->error;
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
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->

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
                  <i class="fa-solid fa-expand" style=""></i>
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
            <a class="nav-link" href="feedback.php">
              <i class="fa-solid fa-comments" style="font-size: 18px; margin: 5px;"></i>
              <span class="menu-title">Feedback</span>
            </a>
          </li>
            </ul>
          </nav>
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="row">
                <div class="col-md-12 grid-margin">
                  <div class="row">
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h1 style="text-transform: uppercase; font-size: 35px;">Registration Data</h1>
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="table-danger">
                            <th>
                              GuestID
                            </th>
                            <th>
                              First name
                            </th>
                            <th>
                              Last name
                            </th>
                            <th>
                              Gender
                            </th>
                            <th>
                              Phone
                            </th>
                            <th>
                              Email
                            </th>
                            <th>
                              Action
                            </th>
                          </tr>
                          <?php
                          $select = "SELECT `guestId`, `fname`, `lname`, `gender`,`phone`,`email`,`pass`,`confirmpss` FROM register order by guestId desc";
                          $result = $conn->query($select);

                          if ($result === false) {
                            echo "Error: ";
                          } else {
                            while ($row = mysqli_fetch_array($result)) {
                              ?>
                              <tr>
                                <td>
                                  <?php echo $row['guestId']; ?>
                                </td>
                                <td>
                                  <?php echo $row['fname']; ?>
                                </td>
                                <td>
                                  <?php echo $row['lname']; ?>
                                </td>
                                <td>
                                  <?php echo $row['gender']; ?>
                                </td>
                                <td>
                                  <?php echo implode(' ', array_map(function ($char, $register) {
                                    return $register == 1 || ($register >= 1 && $register <= 7) ? '*' : $char;
                                  }, str_split($row['phone']), array_keys(str_split($row['phone'])))); ?>
                                </td>
                                <td>
                                  <?php
                                  $emailParts = explode('@', $row['email']);
                                  $firstChar = substr($emailParts[0], 0, 1);
                                  $maskedEmail = $firstChar . str_repeat('*', strlen($emailParts[0]) - 1) . '@' . $emailParts[1];
                                  echo $maskedEmail;
                                  ?>
                                </td>
                                
                                <td>
                                  <a href="view.php?guestId=<?php echo $row['guestId']; ?>&fname=<?php echo $row['fname']; ?>&lname=<?php echo $row['lname']; ?>&gender=<?php echo $row['gender']; ?>&phone=<?php echo $row['phone']; ?>&email=<?php echo $row['email']; ?>&pass=<?php echo $row['pass']; ?>&confirmpss=<?php echo $row['confirmpss']; ?>"
                                    class="btn btn-primary"><i class="mdi mdi-eye mdi-20px" style="color: white;"></i>
                                    View</a>

                                  <form method="post" style="display: inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this member?');">
                                    <input type="hidden" name="delete" value="<?php echo $row['guestId']; ?>">
                                    <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete mdi-20px"
                                        style="color: white;"></i> Delete</button>
                                  </form>
                                </td>
                              </tr>
                              <?php
                            }
                          }
                          ?>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.php -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script>
    $(document).ready(function () {
      $("#myTable").dataTable();
    });
  </script>
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