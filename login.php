<?php
include './include/connect.php';
session_start();

$error = ""; // Initialize error variable

if (isset($_POST['login'])) {
    $emailOrPhone = $_POST['emailOrPhone'];
    $pass = $_POST['pass'];

    // Check if the input is a valid email or phone number
    if (filter_var($emailOrPhone, FILTER_VALIDATE_EMAIL)) {
        $loginField = 'email';
    } elseif (preg_match('/^\d{10}$/', $emailOrPhone)) {
        $loginField = 'phone';
    } else {
        $error = "Invalid Email or Phone format!";
    }

    // Use prepared statements to prevent SQL injection
    if (empty($error)) {
        $select = "SELECT * FROM `register` WHERE $loginField = ? AND pass = ?";
        $stmt = $conn->prepare($select);
        $stmt->bind_param('ss', $emailOrPhone, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;

        if ($count > 0) {
            while ($row = $result->fetch_assoc()) {
                $email = $row['email'];
                $pass = $row['pass'];
            }

            $_SESSION['email'] = $email;
            $_SESSION['pass'] = $pass;

            header("location:index.php");
            exit(); // Ensure no further code is executed after redirection
        } else {
            $error = "Invalid Email or Password!";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/amusement-park.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

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
        .toggle-password-eye i {
            position: relative;
            left: 87%;
            bottom: 40px;
        }

        .toggle-password-email i {
            position: relative;
            left: 87%;
            bottom: 40px;
        }

        .cus-form .alert {
            padding: 8px 10px;
            margin-top: 1rem;
            color: red; /* Set text color for error messages */
        }
        .alert {
            font-size: 0.9em; /* Smaller font size */
            font-weight: bold; /* Bold text */
            color: red; /* Optional: Change text color to red for visibility */
            margin-top: 5px; /* Add some space above the error message */
}
        .input-field {
            margin-bottom: 30px; /* Adjust the value as needed */
        }
        .forgot-pass-link {
    margin-top: -20px; /* Adjust the value to move it up or down */
    display: inline-block; /* Ensure it takes up space properly */
}
input::placeholder {
    color: lightgray; /* Change to your desired color */
    opacity: 1; /* Ensures the color is applied consistently across browsers */
}
.cus-form .alert {
    padding: 8px 10px;
    margin-top: 1rem;
    font-size: small;
    font-weight: bold; /* Make error messages bold */
    color: #dc3545; /* Set error message color */
}

    </style>
</head>

<body>
    <div id="popup" class="popup">

        <div class="boxed_wrapper">

            <div class="popup-content">
                <div id="login-form" class="form-box login">
                    <div class="form-content">
                        <h2>LOGIN</h2>
                        <form method="POST" class="cus-form" onsubmit="return validateLogin();">
                            <div class="input-field">
                                <input type="text" name="emailOrPhone" id="emailOrPhone" placeholder="Email or Phone">
                                <label>Email or Phone</label>
                                <span class="toggle-password-email">
                                    <i class="fa fa-envelope"></i> <!-- Font Awesome envelope icon -->
                                </span>
                                <span id="emailOrPhoneError" class="alert"></span> <!-- Error message for email/phone -->
                            </div>
                            <div class="input-field">
                                <input type="password" name="pass" id="pass" placeholder="Password">
                                <span class="toggle-password-eye" onclick="togglePasswordVisibility('pass')">
                                    <i id="eyeIcon" class="fa fa-eye"></i> <!-- Font Awesome eye icon -->
                                </span>
                                <label>Password</label>
                                <span id="passwordError" class="alert"></span> <!-- Error message for password -->
                            </div>
                            <?php if ($error) { ?>
                                <div class="alert"><?php echo $error; ?></div>
                            <?php } ?>
                            <a href="forgot.php" class="forgot-pass-link">Forgot password?</a><br>
                            <button type="submit" class="btn-log" name="login">Log In</button>
                        </form>
                        <div class="bottom-link">
                            Don't have an account?
                            <a href="register.php" id="signup-link">Signup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    // Toggle password visibility
    function togglePasswordVisibility(passwordFieldId) {
        var passwordField = document.getElementById(passwordFieldId);
        passwordField.type = (passwordField.type === "password") ? "text" : "password";
    }

    // Validate login fields
    function validateLogin() {
        var emailOrPhone = document.getElementById("emailOrPhone").value.trim();
        var password = document.getElementById("pass").value.trim();
        var isValid = true;

        // Clear previous error messages
        document.getElementById("emailOrPhoneError").innerText = "";
        document.getElementById("passwordError").innerText = "";

        // Validate Email or Phone
        if (emailOrPhone === "") {
            document.getElementById("emailOrPhoneError").innerText = "Email or Phone is required.";
            isValid = false; // Mark as invalid
        }

        // Validate Password
        if (password === "") {
            document.getElementById("passwordError").innerText = "Password is required.";
            isValid = false; // Mark as invalid
        }

        return isValid; // Allow form submission if valid
    }

    // Add event listeners to clear error messages when input is entered
    document.getElementById("emailOrPhone").addEventListener('input', function() {
        var emailOrPhoneError = document.getElementById("emailOrPhoneError");
        if (this.value.trim() !== "") {
            emailOrPhoneError.innerText = ""; // Clear error if valid input
        }
    });

    document.getElementById("pass").addEventListener('input', function() {
        var passwordError = document.getElementById("passwordError");
        if (this.value.trim() !== "") {
            passwordError.innerText = ""; // Clear error if valid input
        }
    });
</script>
</body>

</html>
