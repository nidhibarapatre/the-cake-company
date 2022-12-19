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
  <link rel="stylesheet" href="ourstyle.css">
  <title>IIITDMJ CAKE COMPANY</title>




  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Dancing+Script:wght@600;700&family=Pacifico&family=Satisfy&display=swap" rel="stylesheet">
  
</head>
<body>
 
<div class="row">

      <?php 
        $query = "SELECT * FROM tblproducts WHERE status='available' GROUP BY product_code";
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
      <!-- <div class="col-lg-3">
        <div class="card mb-3">
          <div class="card-body">
            <form method="post" action="index.php?action=add&id=<?php echo $row["product_code"]; ?>">
              <center><img src="img/cakes.jpg" style="width: 100px">
              <h4 class="text-info"><?php echo $row["product_name"]; ?></h4>
              <h5 class="text-info">Available Qty:(<?php echo $row["available"]; ?>)</h5>
              <h4 class="text-danger">&#8369 <?php echo $row["selling_price"]; ?>.00</h4>
            <input class="form-control" type="hidden" placeholder="Quantity" name="quant" value="1">
            <input class="form-control" type="hidden" name="av" value="<?php echo $row["available"]; ?>">
            <input class="form-control" type="hidden" name="hiddenname" value="<?php echo $row["product_name"]; ?>">
            <input class="form-control" type="hidden" name="hiddenprice" value="<?php echo $row["selling_price"]; ?>">
            <input class="btn btn-success" type="submit" name="add_to_cart" value="Add to Cart" style="margin-top: 10px"></center>
          </form>
          </div>
        </div>
      </div> -->

      <?php
      }
      }
      ?>
</div>

<div class="container">

    <div class="div1">
      <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    </div>
    <!-- <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button> -->
    <div class="div2">

      <img class="mySlides" src="cake4.webp" width="100%">
      <img class="mySlides" src="s2.webp" widht="100%">
      <img class="mySlides" src="slid3.jpg">
      <img class="mySlides" src="slid4.jpg">
    </div>
    <div class="div3">
      <button class="w3-button w3-display-right" onclick="plusDivs(+1)">&#10095;</button>
    </div>
</div>
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) { slideIndex = 1 }
      if (n < 1) { slideIndex = x.length };
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex - 1].style.display = "block";
    }
</script>

  <p><strong>Experience Flavours</strong></p>
  <div class="fcontainer">
    <div class="zoom">
      <a href="chocolate.php">
        <img src="choco.jpg" width="250px" height="250px">
        <h3>Chocolate</h3>
      </a>
    </div>
    <div class="zoom">
      <a href="butterscotch.php">
        <img src="butterscotch.jpg" width="250px" height="250px">
        <h3>Butterscotch</h3>
      </a>
    </div>
    <div class="zoom">
      <a href="blackforest.php">
        <img src="blackforest.webp" width="250px" height="250px">
        <h3>Black Forest</h3>
      </a>
    </div>
    <div class="zoom">
     <a href="strawberry.php">
      <img src="mouth_watering.jfif" width="250px" height="250px">
      <h3>Strawberry</h3>
     </a>
    </div>
  </div>
  <p>Special Occasion Cakes</p>
  <div class="f2container">
    <div class="zoom">
      <a href="birthday.php">
        <img src="birthday.webp" width="250px" height="250px">
        <h3>Birthday Cakes</h3>
      </a>
    </div>
    <div class="zoom">
      <a href="cartoon.php">
        <img src="cartoon.jpg" width="250px" height="250px">
        <h3>Cartoon Cakes</h3>
      </a>
    </div>
    <div class="zoom">
      <a href="anniversary.php">
        <img src="anniversay.webp" width="250px" height="250px">
        <h3>Anniversary Cakes</h3>
      </a>
    </div>
    <div class="zoom">
      <a href="sibling.php">
        <img src="sibling.jpg" width="250px" height="250px">
        
        <h3>Sibling Cakes</h3>
      </a>
    </div>
  </div>

  <br><br>


  <style>
    .fcontainer a, .f2container a{
      color:black;
      
    }
    .fcontainer a:hover, .f2container a:hover{
      color:black;
      
    }

  </style>
</body>
</html>