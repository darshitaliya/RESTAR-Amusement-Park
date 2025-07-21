<?php
        if(isset($_GET['id'])){
            $eid=$_GET['id'];
            require("../include/connect.php");
            $q="delete from events where id='$eid'";
            if(mysqli_query($conn,$q)){
                header("location:./event.php");
            }
            else{
                die("Deletion Failed!!!!".mysqli_error($mysql));
            }
        }
        else{
    
        }
?>