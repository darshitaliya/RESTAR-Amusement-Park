<?php

include '../include/connect.php';

if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    $insert = "INSERT INTO `adminlogin`(`id`, `name`, `admin_email`, `pass`) VALUES ('$id','$name','$email','$pass')";

    $result = $conn->query($insert);

    if ($result) {
        echo "<script>alert('Add Successfully!');</script>";
        header("location:index.php");
    } else {
        $error = "Admin Not Add!";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $update = "UPDATE `adminlogin` SET `id`='$id',`name`='$name',`admin_email`='$email',`pass`='$pass' WHERE id=$_GET[edit]";
    $result = $conn->query($update);

     if ($result) {
        echo "<script>alert('Update Successfully!');</script>";
        header("location:index.php");
    } else {
        $error = "Data Not Update!";
    }
}


if (isset($_GET['edit'])) {

    $select = "SELECT * FROM `adminlogin` WHERE id=$_GET[edit]";
    $result = $conn->query($select);
    $row = mysqli_fetch_array($result);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Restar Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/amusement-park.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="images/logo.png" alt="logo">
                            </div>
                            <h4>Welcome To Restar Admin Panel</h4>
                                    <?PHP
                                    if (isset($_GET['edit'])) {
                                    ?>
                                        <h5 class="font-weight-light">Update Admin Data.</h5>
                                    <?PHP
                                    } else {
                                    ?>
                                        <h5 class="font-weight-light">Add Admin Data.</h5>
                                    <?PHP
                                    }
                                    ?>
                            <form class="pt-3" method="POST">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-lg" id="exampleInputid" name="id" placeholder="Admin Id" value="<?PHP if(isset($_GET['edit'])) echo $row['id'];  ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputname" name="name" placeholder="Admin Name" value="<?PHP if(isset($_GET['edit'])) echo $row['name'];  ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Admin Email" value="<?PHP if(isset($_GET['edit'])) echo $row['admin_email'];  ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="pass" placeholder="Password" value="<?PHP if(isset($_GET['edit'])) echo $row['pass'];  ?>" required>
                                    <?php if (isset($error)) { ?>
                                        <div class="alert alert-danger"><?php echo $error; ?></div>
                                    <?php } ?>
                                </div>
                                <div class="mt-3">
                                    <?PHP
                                    if (isset($_GET['edit'])) {
                                    ?>
                                        <button type="submit" name="update" class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn">Update</button>
                                    <?PHP
                                    } else {
                                    ?>
                                        <button type="submit" name="add" class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn">LOG IN</button>
                                    <?PHP
                                    }
                                    ?>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>