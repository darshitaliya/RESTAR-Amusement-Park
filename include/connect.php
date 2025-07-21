<?php

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="restar_db";

    $conn= new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die('Connecation Faild!'.$conn->connect_error);
    }
?>