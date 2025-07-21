<?php
include "../include/connect.php";
session_start();

// Fetch room booking payment data based on the ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `cardticket` WHERE `cardid` = $id";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found with ID: $id";
        exit();
    }
}

// Handle form submission for updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['cardid'];
    $cardno = $_POST['cardno'];
    $cardname = $_POST['cardname'];
    $cardemail = $_POST['cardemail'];
    $cardmonth = $_POST['cardmonth'];
    $cardyear = $_POST['cardyear'];

    // Update room booking payment data
    $updateQuery = "UPDATE `cardticket` SET 
        `cardno` = '$cardno',
        `cardname` = '$cardname',
        `cardemail` = '$cardemail',
        `cardmonth` = '$cardmonth',
        `cardyear` = '$cardyear'
        WHERE `cardid` = $cardid";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: tbpayment.php"); // Redirect after successful update
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update Card Details</title>
  <script src="https://kit.fontawesome.com/206142e5bd.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="images/amusement-park.png" />
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
      label {
          display: block;
          margin-bottom: 10px;
          font-weight: bold;
      }
      input[type="text"],
      input[type="email"] {
          width: 100%;
          padding: 10px;
          margin-bottom: 20px;
          border-radius: 5px;
          border: 1px solid #ccc;
      }
      button {
          display: block;
          width: 100%;
          max-width: 200px;
          margin: 20px auto;
          padding: 10px;
          border-radius: 5px;
          border: none;
          background-color: #0056b3;
          color: #fff;
          font-size: 16px;
          cursor: pointer;
      }
      button:hover {
          background-color: #003f7f;
      }
  </style>
</head>
<body>
    <div class="container">
        <h1 class="display-4">Update Card Details</h1>
        <form method="post" action="cardupdaterp.php"> <!-- Ensure the action is pointing to this file -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['cardid']); ?>">
            
            <label>Card Number:</label>
            <input type="text" name="cardno" value="<?php echo htmlspecialchars($row['cardno']); ?>"><br>

            <label>Card Holder Name:</label>
            <input type="text" name="cardname" value="<?php echo htmlspecialchars($row['cardname']); ?>"><br>

            <label>Email:</label>
            <input type="email" name="cardemail" value="<?php echo htmlspecialchars($row['cardemail']); ?>"><br>

            <label>Expiry Month:</label>
            <input type="text" name="cardmonth" value="<?php echo htmlspecialchars($row['cardmonth']); ?>"><br>

            <label>Expiry Year:</label>
            <input type="text" name="cardyear" value="<?php echo htmlspecialchars($row['cardyear']); ?>"><br>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
