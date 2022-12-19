<?php 
   include('connection.php');
   $sql1="SELECT * FROM `tbltransacdetail`;";
   $sql2="SELECT * FROM tbltransacdetail a WHERE a.status='Pending' ;";
   $sql3="SELECT * FROM tbltransacdetail a WHERE a.status='Confirmed' ;";
   $sql4="SELECT * FROM tblusers a WHERE a.position='Customer';";
   $result1=mysqli_query($conn,$sql1);
   $result2=mysqli_query($conn,$sql2);
   $result3=mysqli_query($conn,$sql3);
   $result4=mysqli_query($conn,$sql4);

    $row1=mysqli_num_rows($result1);
    $row2=mysqli_num_rows($result2);
    $row3=mysqli_num_rows($result3);
    $row4=mysqli_num_rows($result4);
   
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
        <title>Cake Company | Admin | Dashboard</title>
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
                <div class="dashboard">
                    <div class="dashboard_child">
                        <h3>TOATL ORDER</h3>
                        <span>
                            <?php echo $row1;?>
                        </span>
                          
                        <p>
                            TOATL ORDER
                        </p>
                    </div>
                    <div class="dashboard_child">
                        <h3>NEW ORDER</h3>
                        <span>
                            <?php echo $row2;?>
                        </span>
                          
                        <p>
                            NEW ORDER
                        </p>
                    </div>
                    <div class="dashboard_child">
                        <h3>CONFIRMED ORDER</h3>
                        <span>
                        <?php echo $row3;?>
                        </span>
                          
                        <p>
                           CONFIRMED ORDER
                        </p>
                    </div>
                    <!-- <div class="dashboard_child">
                        <h3>TOTAL CAKE DELIVER</h3>
                        <span>
                            5
                        </span>
                          
                        <p>
                            TOTAL CAKE DELIVER
                        </p>
                    </div> -->
                    <!-- <div class="dashboard_child">
                        <h3>CANCELLED ORDER</h3>
                        <span>
                            5
                        </span>
                          
                        <p>
                            CANCELLED ORDER
                        </p>
                    </div> -->
                    <div class="dashboard_child">
                        <h3>TOTAL REGISTERED USER</h3>
                        <span>
                        <?php echo $row4;?>
                        </span>
                        <p>
                            TOTAL REGISTERED USER
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>