<?php
session_start();
include('view/header.php');


// unset($_SESSION);
// session_destroy();
if(array_key_exists($_SESSION["product"], $_SESSION["cart"])){
   $_SESSION["cart"][$_SESSION["product"]] += (int)$_POST['quantity'];
} else {
   if(isset($_SESSION["cart"])){
      $_SESSION["cart"] += array($_SESSION["product"] => (int)$_POST['quantity']);
   } else {
      $_SESSION["cart"] = array($_SESSION["product"] => (int)$_POST['quantity']);
   }
}





// echo '<pre>';
// var_dump($_SESSION["cart"]);
// echo '</pre>';
?>
<a href="Cart.php">Cart</a>
<a href="view/viewAllProducts.php">All products</a>