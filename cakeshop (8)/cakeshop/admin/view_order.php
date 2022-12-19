<?php 
   include('connection.php');
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Cake Company | Admin | Orders</title>
    </head>
    <body>
        <div class="body">
            <div class="sidemenu">
                
                <div class="admin_profile">
                  
                    <img src="b1.jpg" alt="">
                    <h5>Admin User</h5>
                  
                </div>
                <nav class="nav">
                    <a href="admin.php"><li class="li"><span><i class="fa fa-th-large"></i> </span>Dashboard</li></a>
                    <a href="admin_regUser.php"><li class="li"><span><i class="fa fa-users"></i> </span>Registered Usesr</li></a>
                    <a href="admin_cakeMenu.php"><li class="li"><span><i class="fa fa-list"></i> </span>Cake Menu</li></a>
                    <a href="admin_orders.php"><li class="li"><span><i class="fa fa-birthday-cake"></i> </span>Cake Orders</li></a>
                    <a href="admin_transac.php"><li class="li"><span><i class="fa-solid fa-list-alt"></i></span> Transaction</li></a>
                    <!-- <li class="li"><span><i class="fa fa-book"></i> </span>Pages
                        <ul class="showli">
                            <a href="admind_aboutus.html"><li><span><i class="fa-solid fa-address-card"></i></span> About Us</li></a>
                            <a href="admin_contactus.html"><li><span><i class="fa fa-phone"></i> </span>Contact Us</li></a>
                        </ul>
                    </li>
                    <a href="admin_enquiry.html"><li class="li"><span><i class="fa fa-users"></i> </span>Subscriber</li></a>
                    <a href="admin_search.html"><li class="li"><span><i class="fa fa-search"></i> </span>Search</li></a>
             -->
                </nav>
    
    
            </div>
            <div class="rightframe">
                <?php

                    // $tid=$_GET['uid'];
                    $id=$_GET['id'];
                    // echo $tid.'<br>';
                    
                    $conn2  = mysqli_connect('localhost','root','','cakes');

                    if(!$conn){
                        echo "unable to connect to db";
                    }

                    echo " <center><h3>Order Details</h3></center>";
                    $sql="SELECT * FROM `tbltransac` WHERE transac_id=$id;";

                    $res=mysqli_query($conn2,$sql);

                    while($result=mysqli_fetch_assoc($res))
                    {
                        ?>
                            <center>
                            <div class="view_order">
                                <div class="row">
                                   
                                        <div class="tr">
                                            <div class="td bold">
                                                Transaction Id
                                            </div>
                                            <div class="td">
                                                <?php echo $result['transac_id'] ;?>
                                            </div>
                                        </div>
                                        <div class="tr">
                                            <div class="td bold">
                                                Transaction Code
                                            </div>
                                            <div class="td">
                                                <?php echo $result['transac_code'] ;?>
                                            </div>
                                        </div>
                                        <div class="tr">
                                            <div class="td bold">
                                                User Id
                                            </div>
                                            <div class="td">
                                                <?php echo $result['user_id'] ;?>
                                            </div>
                                        </div>
                                        <div class="tr">
                                            <div class="td bold">
                                                Date
                                            </div>
                                            <div class="td">
                                                <?php echo $result['date'] ;?>
                                            </div>
                                        </div>
                                        <div class="tr">
                                            <div class="td bold">
                                                Product Code
                                            </div>
                                            <div class="td">
                                                <?php echo $result['product_code'] ;?>
                                            </div>
                                        </div>
                                        <div class="tr">
                                            <div class="td bold">
                                                Qwantity
                                            </div>
                                            <div class="td">
                                                <?php echo $result['qty'] ;?>
                                            </div>
                                        </div>
                                        <div class="tr">
                                            <div class="td bold">
                                                Cake Price
                                            </div>
                                            <div class="td">
                                                <?php echo $result['price'] ;?>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            </center>
                        <?php
                    }

                    echo '</center><br><br> ';




                    // $sql="SELECT * FROM `tbltransacdetail`;";

                    // $result=mysqli_query($conn, $sql);

                    // while($row=mysqli_fetch_assoc($result)){
                    //     echo ".$row['detail_id']." ".$row['transac_code']." ".$row['date'].";
                    // }

                ?>
            </div>
        </div>
    </body>
    <style>
        .td{
            border-bottom:1px dotted;
            padding:5px;
            width:fit-content;
        }
        .bold{
            border:none;
            font-weight:700;
        }
        .row{
            
            padding:20px;
            margin-top:50px;
        }
        .tr{
            
            padding:10px;
            display: flex;
            width:fit-content;
        }
    </style>
    </html>