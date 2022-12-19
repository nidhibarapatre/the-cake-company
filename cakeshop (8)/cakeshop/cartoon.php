<?php include('includes/connection.php');?>  
<!--header area-->
<?php include 'includes/header.php'; ?>
<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/cake_style.php'; ?>

<div style="border: 4px solid black; width: 100%: padding: 1px;">
          <marquee behavior="alternate"­><h2 style="color: black; font-family: cursive; font-size: 40px;padding-top: 6px;padding-bottom: 0px;margin-bottom: 1px;">IIITDMJ Cake Company</h2></marquee>
</div><br>

<?php 
if (isset($_POST["add_to_cart"])) 
{
  $av = $_POST['av'];
$qq = $_POST["quant"];
  if ($av > $qq) {

  if (isset($_SESSION["cart"])) 
{
  $itemarrayid = array_column($_SESSION["cart"], "ids");
  if (!in_array($_GET["id"], $itemarrayid)) {
   
    $count=count($_SESSION["cart"]);
    $itemarray = array(
     'ids' => $_GET["id"],
     'name' => $_POST["hiddenname"],
     'price' => $_POST["hiddenprice"],
     'quantity' => $_POST["quant"]);
     $_SESSION["cart"][$count] = $itemarray;
    echo "<script>alert('Product is added to your cart!')</script>";
    echo "<script>window.location = 'index.php'</script>";
  }else{
    echo "<script>alert('Item Already Added')</script>";
    echo "<script>window.location = 'index.php'</script>";
  }
}
else
{
  $itemarray = array(
  'ids' => $_GET["id"], 
  'name' => $_POST["hiddenname"],
  'price' => $_POST["hiddenprice"],
  'quantity' => $_POST["quant"]);
  $_SESSION['cart'][0] = $itemarray;
  echo "<script>alert('Product is added to your cart!')</script>";
    echo "<script>window.location = 'index.php'</script>";
}
}else{
        echo '<script>alert("Invalid Quantity")</script>';
      echo '<script>window.location="index.php"</script>';
}
}


 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chocolate Cakes</title>




  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Acme&family=Dancing+Script:wght@600;700&family=Pacifico&family=Satisfy&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="Cake_Page.css">
</head>
<body>
 


<div class="h2">
        <h2>Cartoon Cakes</h2>
    </div> 
    <div class="main">
        <?php 
        $db = mysqli_connect('localhost','root','','cakes') or die('unable to connect to db');
        $query = "SELECT * FROM tblproducts WHERE status='available' AND category_id=5 ";
        $result = mysqli_query($db,$query);
            if (mysqli_num_rows($result)>0) 
            {
            while ($row=mysqli_fetch_array($result)) 
            {
                $_SESSION['zero'] = $row["available"];
                $_SESSION['one'] = $row["product_code"];
            if ($_SESSION['zero']==1) {
            $sqls = "UPDATE tblproducts SET status = 'Unavailable' WHERE product_code='".$_SESSION['one']."'";
                mysqli_query($db,$sqls)or die(mysqli_error($db));
            }
        ?>
        <div class="cake">
            
            <div class="cake_img">
                <img src="Images/<?php echo $row['product_id']?>.webp" style="width: 100%">              
            </div>
            <div class="description">
            <form method="post" action="index.php?action=add&id=<?php echo $row["product_code"]; ?>">
                    <center>
                    <strong><?php echo $row["product_name"]; ?></strong> <br>
                    <small>Available Qty:(<?php echo $row["available"]; ?>)</small><br>
                    <strong style="color:red">&#8377 <?php echo $row["selling_price"]; ?>.00</strong><br>
                    <input class="form-control" type="hidden" placeholder="Quantity" name="quant" value="1">
                    <input class="form-control" type="hidden" name="av" value="<?php echo $row["available"]; ?>">
                    <input class="form-control" type="hidden" name="hiddenname" value="<?php echo $row["product_name"]; ?>">
                    <input class="form-control" type="hidden" name="hiddenprice" value="<?php echo $row["selling_price"]; ?>">
                    <input class="btn btn-success add2cart" type="submit" name="add_to_cart" value="Add to Cart" style="margin-top: 10px">
                    </center>
                    <style>
                        .add2cart{
                            width:100%;
                        }
                    </style>
                </form>
            </div>
        </div>
        <?php
            }
            }
        ?>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
