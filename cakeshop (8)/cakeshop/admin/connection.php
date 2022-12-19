<?php
    $conn  = mysqli_connect('localhost','root','','cakes');

    if(!$conn){
        echo "unable to connect to db";
    }
?>