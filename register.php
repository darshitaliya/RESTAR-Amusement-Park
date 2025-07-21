<?php
include "./include/connect.php";

$error = []; // Initialize an error array to store validation messages
$success = ''; // Initialize a success message variable

if (isset($_POST['add'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirmpss = $_POST['confirmpss'];

    // Check if the email or phone already exists in the database
    $checkEmailQuery = "SELECT * FROM `register` WHERE email = '$email'";
    $checkPhoneQuery = "SELECT * FROM `register` WHERE phone = '$phone'";

    $checkEmailResult = $conn->query($checkEmailQuery);
    $checkPhoneResult = $conn->query($checkPhoneQuery);

    if ($checkEmailResult->num_rows > 0 && $checkPhoneResult->num_rows > 0) {
        $error[] = "Both email and phone already exist!";
    } elseif ($checkEmailResult->num_rows > 0) {
        $error[] = "Email already exists!";
    } elseif ($checkPhoneResult->num_rows > 0) {
        $error[] = "Phone already exists!";
    } elseif ($pass != $confirmpss) {
        $error[] = "Passwords do not match!";
    } else {
        // Perform the registration since email and phone are unique
        $insert = "INSERT INTO `register`(`fname`,`lname`,`gender`,`phone`,`email`,`pass`) VALUES ('$fname','$lname','$gender','$phone','$email','$pass')";
        $result = $conn->query($insert);

        if ($result) {
            $success = "Registration successful! You can now login.";
            header("location:login.php");
            exit; // Make sure to stop further execution after redirection
        } else {
            $error[] = "Registration failed!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/amusement-park.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
        .clearfix .alert-danger {
            width: 100%;
        }

        .clearfix .alert {
            padding: 8px 10px;
        }

        .error {
            color: red;
            font-size: 0.9em;
        }

        .toggle-password {
            cursor: pointer;
            user-select: none;
        }

        .toggle-password:hover {
            text-decoration: underline;
        }

        .toggle-password-eye i {
            position: relative;
            left: 82%;
            bottom: 40px;
            cursor: pointer;
        }

        .toggle-password-eyepass i {
            position: relative;
            left: 92%;
            bottom: 40px;
            cursor: pointer;
        }

        @media (max-width: 468px) {
            .toggle-password-eye i {
                left: 89%;
            }

            .toggle-password-eyepass i {
                left: 89%;
            }

            .popup-content {
                max-height: 80vh;
                overflow-y: auto;
            }

            .form-box.signup {
                height: 100%;
            }

            .form-content {
                padding: 20px;
            }
        }
            .error {
            color: #dc3545;
            font-weight: bold; /* Make error messages bold */
            font-size: small;
    }
    input::placeholder {
    color: lightgray; /* Change to your desired color */
    opacity: 1; /* Ensures the color is applied consistently across browsers */
}

    </style>
</head>

<body>
    <div id="popup" class="popup">
        <div class="popup-content">
            <div id="signup-form" class="form-box signup">
                <div class="form-content">
                    <h2>REGISTRATION</h2>
                    <form method="POST" id="registrationForm" onsubmit="return validateForm()">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div class="input-field">
                                    <input type="text" class="form-control text-font" name="fname" id="fname" value="<?= isset($fname) ? $fname : ''; ?>" placeholder="FirstName">
                                    <label>First Name:</label>
                                    <span id="fnameError" class="error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div class="input-field">
                                    <input type="text" class="form-control text-font" name="lname" id="lname" value="<?= isset($lname) ? $lname : ''; ?>" placeholder="LastName">
                                    <label>Last Name:</label>
                                    <span id="lnameError" class="error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label for="gender">Choose Gender:</label><br>
                                <select id="genderDropdown" class="form-control text-font" name="gender">
                                    <option value="male" <?= isset($gender) && $gender == 'male' ? 'selected' : ''; ?>>Male</option>
                                    <option value="female" <?= isset($gender) && $gender == 'female' ? 'selected' : ''; ?>>Female</option>
                                    <option value="other" <?= isset($gender) && $gender == 'other' ? 'selected' : ''; ?>>Other</option>
                                </select>
                                <span id="genderError" class="error"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div class="input-field">
                                    <input type="text" class="form-control text-font" name="phone" id="phone" value="<?= isset($phone) ? $phone : ''; ?>" maxlength="10" placeholder="PhoneNo">
                                    <label>Phone:</label>
                                    <span id="phoneError" class="error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div class="input-field">
                                    <input type="text" class="form-control text-font" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" name="email" id="email" value="<?= isset($email) ? $email : ''; ?>" placeholder="Email">
                                    <label>Email:</label>
                                    <span id="emailError" class="error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div class="input-field">
                                    <input type="password" class="form-control text-font" name="pass" id="pass" placeholder="Password">
                                    <span class="toggle-password-eye" onclick="togglePasswordVisibility('pass')">
                                        <i id="eyeIcon" class="fa fa-eye"></i>
                                    </span>
                                    <label>Password:</label>
                                    <span id="passError" class="error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <div class="input-field">
                                    <input type="password" class="form-control text-font" name="confirmpss" id="confirm_pass" placeholder="Confirm Password">
                                    <span class="toggle-password-eyepass" onclick="togglePasswordVisibility('confirm_pass')">
                                        <i id="eyeIcon" class="fa fa-eye icon1"></i>
                                    </span>
                                    <label>Confirm Password:</label>
                                    <span id="confirmPassError" class="error"></span>
                                </div>
                            </div>
                            <?php if (!empty($error)) { ?>
                                <div class="alert alert-danger"><?php echo implode('<br>', $error); ?></div>
                            <?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn mr-0 text-center">
                                <button class="theme-btn btn-one" name="add" id="buy">Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <div class="bottom-link">
                        Already have an account?
                        <a href="login.php" id="login-link">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var valid = true;

            // Clear previous error messages
            document.getElementById('fnameError').textContent = '';
            document.getElementById('lnameError').textContent = '';
            document.getElementById('genderError').textContent = '';
            document.getElementById('phoneError').textContent = '';
            document.getElementById('emailError').textContent = '';
            document.getElementById('passError').textContent = '';
            document.getElementById('confirmPassError').textContent = '';

            // Get form values
            var fname = document.getElementById('fname').value;
            var lname = document.getElementById('lname').value;
            var gender = document.getElementById('genderDropdown').value;
            var phone = document.getElementById('phone').value;
            var email = document.getElementById('email').value;
            var pass = document.getElementById('pass').value;
            var confirmPass = document.getElementById('confirm_pass').value;

            // Validate first name
            if (fname.trim() === '') {
                document.getElementById('fnameError').textContent = 'First name is required';
                valid = false;
            }

            // Validate last name
            if (lname.trim() === '') {
                document.getElementById('lnameError').textContent = 'Last name is required';
                valid = false;
            }

            // Validate gender
            if (gender.trim() === '') {
                document.getElementById('genderError').textContent = 'Gender selection is required';
                valid = false;
            }

            // Validate phone (ensure it's a valid number format)
            var phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(phone)) {
                document.getElementById('phoneError').textContent = 'Phone number must be 10 digits';
                valid = false;
            }

            // Validate email
            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').textContent = 'Email is required';
                valid = false;
            }

            // Validate password
            if (pass.trim() === '') {
                document.getElementById('passError').textContent = 'Password is required';
                valid = false;
            }

            // Validate confirm password
            if (pass !== confirmPass) {
                document.getElementById('confirmPassError').textContent = 'Passwords do not match';
                valid = false;
            }

            return valid; // Return false if validation fails, else true
        }

        function clearError(fieldId) {
            document.getElementById(fieldId).textContent = '';
        }

        // Add event listeners to clear error messages on input
        document.getElementById('fname').addEventListener('input', function () {
            clearError('fnameError');
        });

        document.getElementById('lname').addEventListener('input', function () {
            clearError('lnameError');
        });

        document.getElementById('genderDropdown').addEventListener('change', function () {
            clearError('genderError');
        });

        document.getElementById('phone').addEventListener('input', function () {
            clearError('phoneError');
        });

        document.getElementById('email').addEventListener('input', function () {
            clearError('emailError');
        });

        document.getElementById('pass').addEventListener('input', function () {
            clearError('passError');
        });

        document.getElementById('confirm_pass').addEventListener('input', function () {
            clearError('confirmPassError');
        });

        function togglePasswordVisibility(passwordFieldId) {
            var passwordField = document.getElementById(passwordFieldId);
            passwordField.type = (passwordField.type === "password") ? "text" : "password";
        }
    </script>
</body>

</html>
