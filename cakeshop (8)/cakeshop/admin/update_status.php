<?php

    $code=$_POST['status'];
    $conn2  = mysqli_connect('localhost','root','','cakes');

                    if(!$conn2){
                        echo "unable to connect to db";
                    }

                    $sql2 ="UPDATE tbltransacdetail a SET a.status='Confirmed' WHERE transac_code=$code;";
                    $sql="SELECT * FROM `tbltransacdetail` WHERE transac_code=$code;";

                    $res=mysqli_query($conn2,$sql);
                    $res2=mysqli_query($conn2,$sql2);

                    if($res){
                        echo "success";
                    }
                    if($res2){
                        echo "updation done";
                        header('location:admin_transac.php');
                    }
                    else{
                        echo "updation failed";
                    }


?>