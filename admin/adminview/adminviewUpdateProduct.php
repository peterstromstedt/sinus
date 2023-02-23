<?php
include('adminheader.php');
require('../../classes/classProducts.php');

$product = Product::getProduct($_POST['id']);

?>

<fieldset>
  <legend>Update Product</legend>
  <form action="../adminUpdateProduct.php" enctype="multipart/form-data" method="post">
  <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
    <label for="title">Product Name:</label>
    <input type="text" name="title" value="<?= $product->getTitle() ?>" required>

    <label for="category">Category:</label>
    <input type="text" name="category" value="<?= $product->getCategory() ?>" required>

    <label for="color">Color:</label>
    <input type="text" name="color" value="<?= $product->getColor() ?>" required>
    
    <label for="price">Price:</label>
    <input type="text" name="price" value="<?= $product->getPrice() ?>" required>

    <label for="description">Description:</label>
    <textarea rows="4" cols="50" name="description" required><?= $product->getDescription() ?></textarea>

    <label>Select Image File:</label>
    <input type="hidden" name="action" value="addimage">
    <input type="file" name="image">

    <button>Update</button>       
  </form>

</fieldset>