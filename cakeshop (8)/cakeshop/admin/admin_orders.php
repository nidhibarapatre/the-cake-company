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


                    $conn2  = mysqli_connect('localhost','root','','cakes');

                    if(!$conn){
                        echo "unable to connect to db";
                    }

                    echo " <center><h3>Cake Orders</h3></center>";
                    $sql="SELECT * FROM tbltransac a,tbltransacdetail b WHERE a.transac_code = b.transac_code AND b.status='Pending';";

                    $res=mysqli_query($conn2,$sql);

                    echo '<center><table border=2 cellspacing=0>
                    <tr><th>Order No.</th><th>Product Code</th><th>Quantity</th><th>Details</th></tr>';



                    while($result=mysqli_fetch_assoc($res))
                    {
                        echo "<style>
                            .rightframe a{
                                color:blue;
                            }
                        </style>";
                        echo '<tr>
                        <td>'.$result['transac_id'].'</td>
                        
                        <td>'.$result['product_code'].'</td>
                        <td>'.$result['qty'].'</td>
                        <td><a href="view_order.php?uid='.$result['transac_code'].'&id='.$result['transac_id'].'">View Details</td>
                        
                        </tr>';
                    }

                    echo '</table></center><br><br> ';


                    // $sql="SELECT * FROM `tbltransacdetail`;";

                    // $result=mysqli_query($conn, $sql);

                    // while($row=mysqli_fetch_assoc($result)){
                    //     echo ".$row['detail_id']." ".$row['transac_code']." ".$row['date'].";
                    // }

                ?>
            </div>
        </div>
    </body>
    </html>