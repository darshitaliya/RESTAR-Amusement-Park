<?php

include "../include/connect.php";

$eid = $_GET['id'];

// Sanitize the input (you should use prepared statements for security)
$eid = mysqli_real_escape_string($conn, $eid);

// Construct the query
$q = "SELECT * FROM rooms WHERE id=$eid";

// Debug: Print out the query to verify its syntax
echo "Query: $q";

// Execute the query
$result = mysqli_query($conn, $q);

// Check if the query was successful
if (!$result) {
    // Query failed, handle the error
    die ("Error executing query: " . mysqli_error($conn));
}

// Fetch data
$r = mysqli_fetch_array($result);

if (isset ($_REQUEST['add_room'])) {
    require ("../include/connect.php");
    $enm = $_REQUEST['room_name'];
    $sdt = $_REQUEST['room_price'];
    $edt = $_REQUEST['description'];
    $info = $_REQUEST['max_person'];
    $prc = $_REQUEST['size'];
    $bed= $_REQUEST['bed'];
    $img_name = "";
    // $is_img_new = "no";
    if ($_FILES['img']['name']) {
        $img_name = $_FILES['img']['name'];
        echo "Hello";
    } else {
        $img_name = $r[7];
    }
    $tmp_loc = $_FILES['img']['tmp_name'];
    $q = "update rooms set room_type='$enm',price='$sdt',description='$edt',max_person='$info',size='$prc',bed='$bed',image='$img_name' where id=$eid";
    echo $q;
    if (mysqli_query($conn, $q)) {
        echo "<script type='text/javascript'>window.location.href='./rooms.php'</script>";
        // header("Location: ../Event.php",true);
        // echo "Updated Successfully!!";
        move_uploaded_file($tmp_loc, 'images/room/' . $img_name);

    } else {
        echo "<h1> Insertion Failed!!!</h1>";
    }
    header('location:./room.php');
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

    <link rel="icon" href="assets/images/amusement-park.png" type="image/x-icon">

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

        .hero {
            width: calc(100% - 20px);
            min-height: auto;
            background: linear-gradient(#e7baff, #c2b6d9);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            margin: 10px;
        }

        #drop-area {
            width: 500px;
            min-height: auto;
            padding: 30px;
            background: #fff;
            text-align: center;
            border-radius: 20px;
        }

        #img-view {
            width: 100%;
            height: 620px;
            border-radius: 20px;
            border: 2px dashed #bbb5ff;
            background: #f7f8ff;
            background-position: center;
            background-size: cover;
        }

        #img-view .img {
            width: 200px;
            height: 200px;
            margin-top: 10px;
        }

        #img-view img {
            width: 100%;
            height: 295px;
            border-radius: 20px;
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
                            <i class="fa-solid fa-expand"></i>
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
                                href="<?php echo isset ($_SESSION['email']) ? 'add.php' : 'login.php'; ?>">
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
                            <i class="fa-solid fa-table-cells-large" style="font-size: 18px; margin: 5px;"></i>
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
                        <a class="nav-link" href="rooms.php">
                            <i class="fa-regular fa-square-plus" style="font-size: 18px; margin: 5px;"></i>
                            <span class="menu-title">Added Rooms</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_photo.php">
                            <i class="fa-regular fa-square-plus" style="font-size: 18px; margin: 5px;"></i>
                            <span class="menu-title">Added Gallery</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_offers.php">
                            <i class="fa-regular fa-square-plus" style="font-size: 18px; margin: 5px;"></i>
                            <span class="menu-title">Added Offers</span>
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
              </li>  <li class="nav-item">
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
  <h2>Edit Room</h2>
  <form method="post" action="" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="room_name">Room Type:</label>
          <input type="text" class="form-control" id="room_name" name="room_name" required
          value="<?= $r[1]; ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
        <label for="room_price">Room Price:</label>
        <input type="text" class="form-control" id="room_price" name="room_price" required
        value="<?= $r[2]; ?>">
        </div>
      </div>
    </div>
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="des">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="5" required><?= $r[3]; ?></textarea>
                </div>
            </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="size">Max Person:</label>
          <input type="number" class="form-control" id="max_person" name="max_person" required
          value="<?= $r[4]; ?>">
        </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6">
        <div class="form-group">
        <label for="size">Room Size (sq ft):</label>
        <input type="text" class="form-control" id="size" name="size" required
        value="<?= $r[5]; ?>">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
        <label for="bed">Bed:</label>
          <input type="number" class="form-control" id="bed" name="bed" required
          value="<?= $r[6]; ?>">
        </div>
      </div>
      </div>
      <div class="row">
                        <div class="col-md-12">
                            <div class="hero">
                                <label for="input-file" id='drop-area'>
                                    <input type="file" accept="image/*" name="img" id="input-file" hidden>
                                    <div id="img-view" class=''
                                        style="background-image:url('<?php echo "images/room/$r[7]"; ?>')"></div>
                                </label>
                            </div>
                        </div>
                    </div>
    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary" name="add_room">Edit Room</button>
      </div>
    </div>
  </form>

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

</html>