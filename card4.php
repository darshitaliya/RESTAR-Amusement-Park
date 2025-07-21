<?php

session_start(); // Start session

include "./include/connect.php";
require './PHP MAILER/Exception.php';
require './PHP MAILER/PHPMailer.php';
require './PHP MAILER/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['pay'])) {
    // Retrieve payment information
    $cardno = $_POST['cardnumber'];
    $cardname = $_POST['cardname'];
    $email = $_POST['email'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $cvv = $_POST['cvv'];

    // Insert payment details into the database using prepared statements
    $stmt = $conn->prepare("INSERT INTO `cardoffer`(`cardno`, `cardname`, `cardemail`, `cardmonth`, `cardyear`, `cvv`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $cardno, $cardname, $email, $month, $year, $cvv);
    $result = $stmt->execute();
    $stmt->close();

    if ($result) {
        // Store payment information in session variables
        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];
        $email = $_SESSION['email'];
        $phone = $_SESSION['phone'];
        $offer = $_SESSION['toffer'];
        $person = $_SESSION['person'];
        $totalprice = $_SESSION['totalprice'];
        $amount = $_SESSION['amount'];

        try {
            // Initialize PHPMailer
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'restarpark@gmail.com';
            $mail->Password = 'zfjdzqjndpyhiygw';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('restarpark@gmail.com', 'RESTAR AMUSEMENT PARK');
            $mail->addAddress($email);

            // Retrieve user information from the session
            $fname = $_SESSION['fname'];
            $lname = $_SESSION['lname'];
            $email = $_SESSION['email'];
            $phone = $_SESSION['phone'];
            $offer = $_SESSION['toffer'];
            $person = $_SESSION['person'];
            $totalprice = $_SESSION['totalprice'];
            $amount = $_SESSION['amount'];

            // Email content with booking details
            $mail->isHTML(true);
            $mail->Subject = "Congrats $fname Your Offer is Booked Successfully";
            $mail->Body = '<div style="background-color: #FFEA92; padding: 20px; font-family: Trebuchet MS, Lucida Sans Unicode, Lucida Grande, Lucida Sans, Arial, sans-serif;">
            <div
                style="max-width: 600px; margin: 0 auto; background-color: #FFFFFF; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <h1
                    style="color: #0029ff; text-align: center; font-size: 18px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px;">
                    Congratulations!</h1>
                    <h1 style="color: #fc5900;text-align: center; font-size: 20px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px;">
                        ' . $fname . '<br>' . $lname . '</h1>
        
                <p style="color: #6E6D6C; line-height: 1.8; ">Thank you for booking tickets to Our Park! Your booking details
                </p>
        
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <tr style="background-color: #F0F8FF; color: #3EBDFF; font-weight: bold;">
                        <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Title</th>
                        <th style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Description</th>
                    </tr>
                    <tr>
                        <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Offer</td>
                        <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">' . $offer . '</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">Number of Events</td>
                        <td style="padding: 10px; text-align: left; border-bottom: 1px solid #ccc;">' . $person . '</td>
                    </tr>
                </table>
        
                <p style="color: #696969; line-height: 1.8; margin-top: 20px;">Your total amount is <strong
                        style="color: #107b54;">' . $totalprice . '&#8377;</strong>.</p>

                        <div style="text-align: center; margin-top: 30px;"><p>Your welcome on</p>
    
                <h2 style="color: white; line-height: 1.8; margin-top: 20px; text-align: center; background: #f2645a;">RESTAR</h2>
            </div>
        </div>';


            // Send the email
            $mail->send();

            // Redirect after successful payment and email sending
            header("Location: index.php");
            exit();
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Error sending email: {$mail->ErrorInfo}</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error processing payment.</div>";
    }

    // Display pop-up and handle redirection in JavaScript
    if (isset($_REQUEST['done'])) {
        echo "<style>
        .pop{
            display: none !important;
        }
        .card-input{
            pointer-events: all;
        }
        </style>";
        header("location:index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="icon" href="./assets/images/amusement-park.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/vue-the-mask@0.11.1/dist/vue-the-mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Source+Code+Pro:400,500,600,700|Source+Sans+Pro:400,600,700&display=swap");

        body {
            background: #ddeefc;
            font-family: "Source Sans Pro", sans-serif;
            font-size: 16px;
        }

        * {
            box-sizing: border-box;
        }

        :focus {
            outline: none;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            padding: 50px 15px;
        }

        @media screen and (max-width: 700px),
        (max-height: 500px) {
            .wrapper {
                flex-wrap: wrap;
                flex-direction: column;
            }
        }

        .card-form {
            max-width: 570px;
            margin: auto;
            width: 100%;
        }

        @media screen and (max-width: 576px) {
            .card-form {
                margin: 0 auto;
            }
        }

        .card-form__inner {
            background: #fff;
            box-shadow: 0 30px 60px 0 rgba(90, 116, 148, 0.4);
            border-radius: 10px;
            padding: 35px;
            padding-top: 180px;
        }

        @media screen and (max-width: 480px) {
            .card-form__inner {
                padding: 25px;
                padding-top: 165px;
            }
        }

        @media screen and (max-width: 360px) {
            .card-form__inner {
                padding: 15px;
                padding-top: 165px;
            }
        }

        .card-form__row {
            display: flex;
            align-items: flex-start;
        }

        @media screen and (max-width: 480px) {
            .card-form__row {
                flex-wrap: wrap;
            }
        }

        .card-form__col {
            flex: auto;
            margin-right: 35px;
        }

        @media screen and (max-width: 480px) {
            .card-form__col {
                margin-right: 0;
                flex: unset;
                width: 100%;
                margin-bottom: 20px;
            }
        }

        @media screen and (max-width: 480px) {
            .card-form__col:last-child {
                margin-bottom: 0;
            }
        }

        .card-form__col.-cvv {
            max-width: 150px;
        }

        @media screen and (max-width: 480px) {
            .card-form__col.-cvv {
                max-width: initial;
            }
        }

        .card-form__group {
            display: flex;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .card-form__group .card-input__input {
            flex: 1;
            margin-right: 15px;
        }

        .card-form__group .card-input__input:last-child {
            margin-right: 0;
        }

        .card-form__button {
            width: 100%;
            height: 55px;
            background: #2364d2;
            border: none;
            border-radius: 5px;
            font-size: 22px;
            font-weight: 500;
            font-family: "Source Sans Pro", sans-serif;
            box-shadow: 3px 10px 20px 0px rgba(35, 100, 210, 0.3);
            color: #fff;
            margin-top: 20px;
            cursor: pointer;
        }

        .card-item {
            max-width: 430px;
            height: 270px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 2;
            width: 100%;
        }

        @media screen and (max-width: 480px) {
            .card-item {
                max-width: 310px;
                height: 220px;
                width: 90%;
            }
        }

        @media screen and (max-width: 360px) {
            .card-item {
                height: 180px;
            }
        }

        .card-item.-active .card-item__side.-front {
            transform: perspective(1000px) rotateY(180deg) rotateX(0deg) rotateZ(0deg);
        }

        .card-item.-active .card-item__side.-back {
            transform: perspective(1000px) rotateY(0) rotateX(0deg) rotateZ(0deg);
        }

        .card-item__focus {
            position: absolute;
            z-index: 3;
            border-radius: 5px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            transition: all 0.35s cubic-bezier(0.71, 0.03, 0.56, 0.85);
            opacity: 0;
            pointer-events: none;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.65);
        }

        .card-item__focus:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background: rgb(8, 20, 47);
            height: 100%;
            border-radius: 5px;
            filter: blur(25px);
            opacity: 0.5;
        }

        .card-item__focus.-active {
            opacity: 1;
        }

        .card-item__side {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 60px 0 rgba(14, 42, 90, 0.55);
            transform: perspective(2000px) rotateY(0deg) rotateX(0deg) rotate(0deg);
            transform-style: preserve-3d;
            transition: all 0.8s cubic-bezier(0.71, 0.03, 0.56, 0.85);
            backface-visibility: hidden;
            height: 100%;
        }

        .card-item__side.-back {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            transform: perspective(2000px) rotateY(-180deg) rotateX(0deg) rotate(0deg);
            z-index: 2;
            padding: 0;
            height: 100%;
        }

        .card-item__side.-back .card-item__cover {
            transform: rotateY(-180deg);
        }

        .card-item__bg {
            max-width: 100%;
            display: block;
            max-height: 100%;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .card-item__cover {
            height: 100%;
            background-color: #1c1d27;
            position: absolute;
            height: 100%;
            background-color: #1c1d27;
            left: 0;
            top: 0;
            width: 100%;
            border-radius: 15px;
            overflow: hidden;
        }

        .card-item__cover:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(6, 2, 29, 0.45);
        }

        .card-item__top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 40px;
            padding: 0 10px;
        }

        @media screen and (max-width: 480px) {
            .card-item__top {
                margin-bottom: 25px;
            }
        }

        @media screen and (max-width: 360px) {
            .card-item__top {
                margin-bottom: 15px;
            }
        }

        .card-item__chip {
            width: 60px;
        }

        @media screen and (max-width: 480px) {
            .card-item__chip {
                width: 50px;
            }
        }

        @media screen and (max-width: 360px) {
            .card-item__chip {
                width: 40px;
            }
        }

        .card-item__type {
            height: 45px;
            position: relative;
            display: flex;
            justify-content: flex-end;
            max-width: 100px;
            margin-left: auto;
            width: 100%;
        }

        @media screen and (max-width: 480px) {
            .card-item__type {
                height: 40px;
                max-width: 90px;
            }
        }

        @media screen and (max-width: 360px) {
            .card-item__type {
                height: 30px;
            }
        }

        .card-item__typeImg {
            max-width: 100%;
            object-fit: contain;
            max-height: 100%;
            object-position: top right;
        }

        .card-item__info {
            color: #fff;
            width: 100%;
            max-width: calc(100% - 85px);
            padding: 10px 15px;
            font-weight: 500;
            display: block;
            cursor: pointer;
        }

        .card-item__holder {
            opacity: 0.7;
            font-size: 13px;
            margin-bottom: 6px;
        }

        @media screen and (max-width: 480px) {
            .card-item__holder {
                font-size: 12px;
                margin-bottom: 5px;
            }
        }

        .card-item__wrapper {
            font-family: "Source Code Pro", monospace;
            padding: 25px 15px;
            position: relative;
            z-index: 4;
            height: 100%;
            text-shadow: 7px 6px 10px rgba(14, 42, 90, 0.8);
            user-select: none;
        }

        .card-item__name {
            font-size: 18px;
            line-height: 1;
            white-space: nowrap;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            text-transform: uppercase;
        }

        @media screen and (max-width: 480px) {
            .card-item__name {
                font-size: 16px;
            }
        }

        .card-item__nameItem {
            display: inline-block;
            min-width: 8px;
            position: relative;
        }

        .card-item__number {
            font-weight: 500;
            line-height: 1;
            color: #fff;
            font-size: 27px;
            margin-bottom: 35px;
            display: inline-block;
            padding: 10px 15px;
            cursor: pointer;
        }

        @media screen and (max-width: 480px) {
            .card-item__number {
                font-size: 21px;
                margin-bottom: 15px;
                padding: 10px 10px;
            }
        }

        @media screen and (max-width: 360px) {
            .card-item__number {
                font-size: 19px;
                margin-bottom: 10px;
                padding: 10px 10px;
            }
        }

        .card-item__numberItem {
            width: 16px;
            display: inline-block;
        }

        .card-item__numberItem.-active {
            width: 30px;
        }

        @media screen and (max-width: 480px) {
            .card-item__numberItem {
                width: 13px;
            }

            .card-item__numberItem.-active {
                width: 16px;
            }
        }

        @media screen and (max-width: 360px) {
            .card-item__numberItem {
                width: 12px;
            }

            .card-item__numberItem.-active {
                width: 8px;
            }
        }

        .card-item__content {
            color: #fff;
            display: flex;
            align-items: flex-start;
        }

        .card-item__date {
            flex-wrap: wrap;
            font-size: 18px;
            margin-left: auto;
            padding: 10px;
            display: inline-flex;
            width: 80px;
            white-space: nowrap;
            flex-shrink: 0;
            cursor: pointer;
        }

        @media screen and (max-width: 480px) {
            .card-item__date {
                font-size: 16px;
            }
        }

        .card-item__dateItem {
            position: relative;
        }

        .card-item__dateItem span {
            width: 22px;
            display: inline-block;
        }

        .card-item__dateTitle {
            opacity: 0.7;
            font-size: 13px;
            padding-bottom: 6px;
            width: 100%;
        }

        @media screen and (max-width: 480px) {
            .card-item__dateTitle {
                font-size: 12px;
                padding-bottom: 5px;
            }
        }

        .card-item__band {
            background: rgba(0, 0, 19, 0.8);
            width: 100%;
            height: 50px;
            margin-top: 30px;
            position: relative;
            z-index: 2;
        }

        @media screen and (max-width: 480px) {
            .card-item__band {
                margin-top: 20px;
            }
        }

        @media screen and (max-width: 360px) {
            .card-item__band {
                height: 40px;
                margin-top: 10px;
            }
        }

        .card-item__cvv {
            text-align: right;
            position: relative;
            z-index: 2;
            padding: 15px;
        }

        @media screen and (max-width: 360px) {
            .card-item__cvv {
                padding: 10px 15px;
            }
        }

        .card-item__cvvTitle {
            padding-right: 10px;
            font-size: 15px;
            font-weight: 500;
            color: #fff;
            margin-bottom: 5px;
        }

        .card-item__cvvBand {
            height: 45px;
            background: #fff;
            margin-bottom: 30px;
            text-align: right;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 10px;
            color: #1a3b5d;
            font-size: 18px;
            border-radius: 4px;
            box-shadow: 0px 10px 20px -7px rgba(32, 56, 117, 0.35);
        }

        @media screen and (max-width: 480px) {
            .card-item__cvvBand {
                height: 40px;
                margin-bottom: 20px;
            }
        }

        @media screen and (max-width: 360px) {
            .card-item__cvvBand {
                margin-bottom: 15px;
            }
        }

        .card-list {
            margin-bottom: -130px;
        }

        @media screen and (max-width: 480px) {
            .card-list {
                margin-bottom: -120px;
            }
        }

        .card-input {
            margin-bottom: 20px;
        }

        .card-input__label {
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: 500;
            color: #1a3b5d;
            width: 100%;
            display: block;
            user-select: none;
        }

        .card-input__input {
            width: 100%;
            height: 50px;
            border-radius: 5px;
            box-shadow: none;
            border: 1px solid #ced6e0;
            transition: all 0.3s ease-in-out;
            font-size: 18px;
            padding: 5px 15px;
            background: none;
            color: #1a3b5d;
            font-family: "Source Sans Pro", sans-serif;
        }

        .card-input__input:hover,
        .card-input__input:focus {
            border-color: #3d9cff;
        }

        .card-input__input:focus {
            box-shadow: 0px 10px 20px -13px rgba(32, 56, 117, 0.35);
        }

        .card-input__input.-select {
            -webkit-appearance: none;
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAeCAYAAABuUU38AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAUxJREFUeNrM1sEJwkAQBdCsngXPHsQO9O5FS7AAMVYgdqAd2IGCDWgFnryLFQiCZ8EGnJUNimiyM/tnk4HNEHMsDvt+JNSZc7oPFGRJwldFmZrX1gM/AKi2gmrCGRi5gUAsF2zKGCPYlID/ABRs2FDgBMGbAAwAvG2wXgJxNjJpLgCJUViywFGEFswLCjgBKOASJWwAYzQW7gyyGW6hUAE7BkMQ2gBZyX1OfAizj2kQpEIO0gCwoxhBntSc4EiNJE3lBxcHMI6m6Uq3E7nZCZbGyyMEAgxlEA/gT7Bl5eZINhIiZBri3cRgImnDkGk8KWywAAwA7GbFbVtEreQAAAABJRU5ErkJggg==');
            background-repeat: no-repeat;
            background-position: right 15px center;
            font-size: 18px;
            padding-right: 30px;
        }

        .card-alert {
            color: #e74c3c;
            font-size: 15px;
            margin-top: 5px;
        }

        .card-alert__icon {
            display: inline-block;
            margin-right: 5px;
        }

        .card-form__button {
            transition: background 0.3s ease-in-out;
        }

        .card-form__button:hover {
            background: #1556b7;
        }

        .pop {
            display: none;
        }

        .pop-content {
            width: 30%;
            margin: auto;
            background: #fff;
            border: 1px solid;
            padding: 2%;
        }

        .done {
            position: relative;
            display: inline-block;
            font-size: 12px;
            line-height: 30px;
            font-weight: 700;
            font-family: 'Rubik', sans-serif;
            color: #fff;
            padding: 16.5px 54px;
            text-align: center;
            text-transform: uppercase;
            z-index: 1;
            letter-spacing: 2px;
            transition: all 500ms ease;
            border-radius: 10px;
            background-color: #f7bf39;
        }
    </style>
</head>

<body>
    <div class="wrapper" id="app">
        <div class="card-form">
            <div class="card-list">
                <div class="card-item" v-bind:class="{ '-active' : isCardFlipped }">
                    <div class="card-item__side -front">
                        <div class="card-item__focus" v-bind:class="{'-active' : focusElementStyle }"
                            v-bind:style="focusElementStyle" ref="focusElement"></div>
                        <div class="card-item__cover">
                            <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + currentCardBackground + '.jpeg'"
                                class="card-item__bg">
                        </div>

                        <div class="card-item__wrapper">
                            <div class="card-item__top">
                                <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png"
                                    class="card-item__chip">
                                <div class="card-item__type">
                                    <transition name="slide-fade-up">
                                        <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + getCardType + '.png'"
                                            v-if="getCardType" v-bind:key="getCardType" alt=""
                                            class="card-item__typeImg">
                                    </transition>
                                </div>
                            </div>
                            <label for="cardNumber" class="card-item__number" ref="cardNumber">
                                <template v-if="getCardType === 'amex'">
                                    <span v-for="(n, $index) in amexCardMask" :key="$index">
                                        <transition name="slide-fade-up">
                                            <div class="card-item__numberItem"
                                                v-if="$index > 4 && $index < 14 && cardNumber.length > $index && n.trim() !== ''">
                                                *</div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                :key="$index" v-else-if="cardNumber.length > $index">
                                                {{cardNumber[$index]}}
                                            </div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                v-else :key="$index + 1">{{n}}</div>
                                        </transition>
                                    </span>
                                </template>

                                <template v-else>
                                    <span v-for="(n, $index) in otherCardMask" :key="$index">
                                        <transition name="slide-fade-up">
                                            <div class="card-item__numberItem"
                                                v-if="$index > 4 && $index < 15 && cardNumber.length > $index && n.trim() !== ''">
                                                *</div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                :key="$index" v-else-if="cardNumber.length > $index">
                                                {{cardNumber[$index]}}
                                            </div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                v-else :key="$index + 1">{{n}}</div>
                                        </transition>
                                    </span>
                                </template>
                            </label>
                            <div class="card-item__content">
                                <label for="cardName" class="card-item__info" ref="cardName">
                                    <div class="card-item__holder">Card Holder</div>
                                    <transition name="slide-fade-up">
                                        <div class="card-item__name" v-if="cardName.length" key="1">
                                            <transition-group name="slide-fade-right">
                                                <span class="card-item__nameItem"
                                                    v-for="(n, $index) in cardName.replace(/\s\s+/g, ' ')"
                                                    v-if="$index === $index" v-bind:key="$index + 1">{{n}}</span>
                                            </transition-group>
                                        </div>
                                        <div class="card-item__name" v-else key="2">Full Name</div>
                                    </transition>
                                </label>
                                <div class="card-item__date" ref="cardDate">
                                    <label for="cardMonth" class="card-item__dateTitle">Expires</label>
                                    <label for="cardMonth" class="card-item__dateItem">
                                        <transition name="slide-fade-up">
                                            <span v-if="cardMonth" v-bind:key="cardMonth">{{cardMonth}}</span>
                                            <span v-else key="2">MM</span>
                                        </transition>
                                    </label>
                                    /
                                    <label for="cardYear" class="card-item__dateItem">
                                        <transition name="slide-fade-up">
                                            <span v-if="cardYear"
                                                v-bind:key="cardYear">{{String(cardYear).slice(2,4)}}</span>
                                            <span v-else key="2">YY</span>
                                        </transition>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-item__side -back">
                        <div class="card-item__cover">
                            <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + currentCardBackground + '.jpeg'"
                                class="card-item__bg">
                        </div>
                        <div class="card-item__band"></div>
                        <div class="card-item__cvv">
                            <div class="card-item__cvvTitle">CVV</div>
                            <div class="card-item__cvvBand">
                                <span v-for="(n, $index) in cardCvv" :key="$index">
                                    *
                                </span>

                            </div>
                            <div class="card-item__type">
                                <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + getCardType + '.png'"
                                    v-if="getCardType" class="card-item__typeImg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="" method="POST" onsubmit="return validateForm()">
                <div class="card-form__inner" id="cardFormApp">
                    <div class="card-input">
                        <label for="cardNumber" class="card-input__label">Card Number</label>
                        <input type="number" id="cardNumber" class="card-input__input" v-mask="generateCardNumberMask"
                            v-model="cardNumber" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardNumber"
                            autocomplete="off" name="cardnumber" oninput="limitCardNumberLength(this)">
                    </div>
                    <div class="card-input">
                        <label for="cardName" class="card-input__label">Card Holders</label>
                        <input type="text" id="cardName" class="card-input__input" v-model="cardName"
                            v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardName" autocomplete="off"
                            name="cardname">
                    </div>
                    <div class="card-input">
                        <label for="email" class="card-input__label">Email</label>
                        <input type="email" id="email" class="card-input__input" autocomplete="off" name="email">
                    </div>
                    <div class="card-form__row">
                        <div class="card-form__col">
                            <div class="card-form__group">
                                <label for="cardMonth" class="card-input__label">Expiration Date</label>
                                <select class="card-input__input -select" id="cardMonth" v-model="cardMonth"
                                    v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardDate" name="month">
                                    <option value="" disabled selected>Month</option>
                                    <option v-bind:value="n < 10 ? '0' + n : n" v-for="n in 12"
                                        v-bind:disabled="n < minCardMonth" v-bind:key="n">
                                        {{n < 10 ? '0' + n : n}} </option>
                                </select>
                                <select class="card-input__input -select" id="cardYear" v-model="cardYear"
                                    v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardDate" name="year">
                                    <option value="" disabled selected>Year</option>
                                    <option v-bind:value="$index + minCardYear" v-for="(n, $index) in 12"
                                        v-bind:key="n">
                                        {{$index + minCardYear}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="card-form__col -cvv">
                            <div class="card-input">
                                <label for="cardCvv" class="card-input__label">CVV</label>
                                <input type="number" class="card-input__input" id="cardCvv" v-mask="'####'"
                                    maxlength="4" v-model="cardCvv" v-on:focus="flipCard(true)"
                                    v-on:blur="flipCard(false)" autocomplete="off" name="cvv"
                                    oninput="limitCardcvvLength(this)">
                            </div>
                        </div>
                    </div>
                    

                    <button class="card-form__button" name="pay">
                        Pay Now
                    </button>
                </div>
            </form>
        </div>
    </div>
    <audio id="sound1" src="gpay.mp3" preload="auto"></audio>
    <script>
        //number validation
        function limitCardNumberLength(input) {
            // Get the current value of the input
            let cardNumber = input.value;

            // Limit the input to a maximum of 16 digits
            if (cardNumber.length > 16) {
                input.value = cardNumber.slice(0, 16);
            }
        }

        function limitCardcvvLength(input) {
            // Get the current value of the input
            let cardNumber = input.value;

            // Limit the input to a maximum of 16 digits
            if (cardNumber.length > 4) {
                input.value = cardNumber.slice(0, 4);
            }
        }
        // validation
        function validateForm() {
            var cardNumber = document.getElementById('cardNumber').value.trim();
            var cardName = document.getElementById('cardName').value.trim();
            var email = document.getElementById('email').value.trim();
            var cardMonth = document.getElementById('cardMonth').value.trim();
            var cardYear = document.getElementById('cardYear').value.trim();
            var cardCvv = document.getElementById('cardCvv').value.trim();

            // Check each field individually
            if (cardNumber === '' || cardName === '' || email === '' || cardMonth === '' || cardYear === '' || cardCvv === '') {
                alert('Please fill in all the fields before submitting.');
                return false;
            } else {
                // Play audio
                var audio = document.getElementById('sound1');
                audio.play();

                Swal.fire({
                    title: "Your Payment Is success!!",
                    text: "Your ticket is sent to your mail",
                    icon: "success",
                    showConfirmButton: false
                });
            }

            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            // Perform additional validation checks if needed

            // If all validations pass, the form will be submitted
            return true;
        }

        // function validateAndSubmit() {
        //     var cardNumber = document.getElementById('cardNumber').value;
        //     var cardName = document.getElementById('cardName').value;
        //     var cardMonth = document.getElementById('cardMonth').value;
        //     var cardYear = document.getElementById('cardYear').value;
        //     var cardCvv = document.getElementById('cardCvv').value;

        //     if (!cardNumber || !cardName || !cardMonth || !cardYear || !cardCvv) {
        //         alert('Please fill in all fields.');
        //         return;
        //     }

        //     // Add additional validation logic as needed, e.g., for cardNumber format, expiration date, etc.

        //     // If all fields are valid, proceed with form submission logic
        //     alert('Form submitted successfully!');
        // }
        /*
See on github: https://github.com/muhammederdem/credit-card-form
*/

        new Vue({
            el: "#app",
            data() {
                return {
                    currentCardBackground: Math.floor(Math.random() * 25 + 1), // just for fun :D
                    cardName: "",
                    cardNumber: "",
                    cardMonth: "",
                    cardYear: "",
                    cardCvv: "",
                    minCardYear: new Date().getFullYear(),
                    amexCardMask: "#### ###### #####",
                    otherCardMask: "### #### ### ###",
                    cardNumberTemp: "",
                    isCardFlipped: false,
                    focusElementStyle: null,
                    isInputFocused: false
                };
            },
            mounted() {
                this.cardNumberTemp = this.otherCardMask;
                document.getElementById("cardNumber").focus();
            },
            computed: {
                getCardType() {
                    let number = this.cardNumber;
                    let re = new RegExp("^4");
                    if (number.match(re) != null) return "visa";

                    re = new RegExp("^(34|37)");
                    if (number.match(re) != null) return "amex";

                    re = new RegExp("^5[1-5]");
                    if (number.match(re) != null) return "mastercard";

                    re = new RegExp("^6011");
                    if (number.match(re) != null) return "discover";

                    re = new RegExp('^9792')
                    if (number.match(re) != null) return 'troy'

                    return "visa"; // default type
                },
                generateCardNumberMask() {
                    return this.getCardType === "amex" ? this.amexCardMask : this.otherCardMask;
                },
                minCardMonth() {
                    if (this.cardYear === this.minCardYear) return new Date().getMonth() + 1;
                    return 1;
                }
            },
            watch: {
                cardYear() {
                    if (this.cardMonth < this.minCardMonth) {
                        this.cardMonth = "";
                    }
                }
            },
            methods: {
                flipCard(status) {
                    this.isCardFlipped = status;
                },
                focusInput(e) {
                    this.isInputFocused = true;
                    let targetRef = e.target.dataset.ref;
                    let target = this.$refs[targetRef];
                    this.focusElementStyle = {
                        width: `${target.offsetWidth}px`,
                        height: `${target.offsetHeight}px`,
                        transform: `translateX(${target.offsetLeft}px) translateY(${target.offsetTop}px)`
                    }
                },
                blurInput() {
                    let vm = this;
                    setTimeout(() => {
                        if (!vm.isInputFocused) {
                            vm.focusElementStyle = null;
                        }
                    }, 300);
                    vm.isInputFocused = false;
                }
            }
        });
    </script>
</body>

</html>