<?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            require("../include/connect.php");
            $q="delete from gallery where id='$id'";
            if(mysqli_query($conn,$q)){
                header("location:./photo.php");
            }
            else{
                die("Deletion Failed!!!!".mysqli_error($mysql));
            }
        }
        else{
    
        }
?>