<?php
include './include/connect.php';

if (isset($_POST['reset'])) {
    if (isset($_POST['email']) && isset($_POST['new_password']) && isset($_POST['retype_password'])) {
        $email = $_POST['email'];
        $newPassword = $_POST['new_password'];
        $retypePassword = $_POST['retype_password'];

        // Check if new password and retype password match
        if ($newPassword != $retypePassword) {
            $error = "Passwords do not match!";
        } else {
            // Check if the email exists in the database
            $sql = "SELECT * FROM register WHERE email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Email exists, update the password
                $updateSql = "UPDATE `register` SET `pass` = '$newPassword' , `confirmpss` = '$newPassword' WHERE email = '$email'";
                if ($conn->query($updateSql) === TRUE) {
                    $error = "Password updated successfully!";
                    header("Location: login.php"); // Redirect to login.php
                    exit();
                } else {
                    $error = "Error updating password:. $conn->error";
                }
            } else {
                $error = "Email not found!";
            }
        }
    } else {
        $error = "Invalid request!";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="icon" href="assets/images/amusement-park.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-form .alert {
            padding: 10px;

        }

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            left: 0%;
            z-index: 1;
            background: #FFFFFF;
            max-width: 350px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }

        .form button:hover,
        .form button:active,
        .form button:focus {
            background: #43A047;
        }

        .form .message {
            margin: 35px 0 0;
            color: #000000;
            font-size: 14px;
        }

        .form .message a {
            margin: 35px 0 0;
            color: #000fff;
            font-size: 14px;
            text-decoration: none;
        }

        .form .register-form {
            display: none;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }

        .container:before,
        .container:after {
            content: "";
            display: block;
            clear: both;
        }

        .container .info {
            margin: 50px auto;
            text-align: center;
        }

        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }

        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }

        .container .info span a {
            color: #000000;
            text-decoration: none;
        }

        .container .info span .fa {
            color: #EF3B3A;
        }

        body {
            background-image: url("./assets/images/background/parkimg.avif");
            background-size: 100%;
        }

        .toggle-password {
            position: relative;
            left: 41%;
            bottom: 50px;
            cursor: pointer;
        }

        .toggle-password-email {
            position: relative;
            left: 41%;
            bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="POST">
                <input type="text" placeholder="Email Id" name="email" required />
                <span class="toggle-password-email">
                    <i class="fa fa-envelope"></i> <!-- Font Awesome eye icon -->
                </span>
                <input type="password" placeholder="New Password" name="new_password" id="pass" required />
                <span class="toggle-password" onclick="togglePasswordVisibility('pass')">
                    <i id="eyeIcon" class="fa fa-eye"></i> <!-- Font Awesome eye icon -->
                </span>
                <input type="password" placeholder="Retype Password" name="retype_password" id="pass1" required />
                <span class="toggle-password" onclick="togglePasswordVisibility('pass1')">
                    <i id="eyeIcon" class="fa fa-eye"></i> <!-- Font Awesome eye icon -->
                </span>
                <?php if (isset($error)) { ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php } ?>
                <button name="reset">Reset Password</button>
                <!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
            </form>
        </div>
    </div>
    <script>
        function togglePasswordVisibility(passwordFieldId) {
            var passwordField = document.getElementById(passwordFieldId);
            passwordField.type = (passwordField.type === "password") ? "text" : "password";
        }

        $('.message a').click(function() {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });
    </script>
</body>

</html>