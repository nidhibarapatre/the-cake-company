 <?php 

session_start();
unset($_SESSION['userid']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['position']);
unset($_SESSION['cart']);
header("Location: ../index.php");
?>