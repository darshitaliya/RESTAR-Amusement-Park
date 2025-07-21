
<?php


include "../include/connect.php";

session_start();

if (isset($_GET['guestId']) && isset($_GET['fname']) && isset($_GET['lname'])&& isset($_GET['gender']) && isset($_GET['phone'])&& isset($_GET['email'])&& isset($_GET['pass'])&& isset($_GET['confirmpss']) ) {
    $guestId = $_GET['guestId'];
    $fname = $_GET['fname'];
    $lname =$_GET['lname'];
    $gender=$_GET['gender'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
} else {
    header("location:index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
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
</head>
<style>
     body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 50px 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }
        th {
            width: 150px;
            background-color: #007bff;
            color: #fff;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
        }
        .btn {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 20px auto;
        }
</style>
<body>
        <div class="container">
        <h1 class="display-4">User Details</h1>
        <table class="table table-bordered">
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Guest ID</td>
                <td><?php echo $guestId; ?></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><?php echo $fname; ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php echo $lname; ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $gender; ?></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><?php echo $phone; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $email; ?></td>
            </tr>
        </table>
        <br>
        <a href="register.php" class="btn btn-primary">Back to Dashboard</a>
    </div>
    
</body>

</html>
