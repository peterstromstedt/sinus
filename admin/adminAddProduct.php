<?php
include('adminSecurity.php');
require('../classes/classDBClasses.php');
include('adminview/adminheader.php');
include('adminview/adminviewAddNewProduct.php');

$color = DataWash::testInput(filter_input(INPUT_POST, 'color', FILTER_UNSAFE_RAW)); 
$category = DataWash::testInput(filter_input(INPUT_POST, 'category', FILTER_UNSAFE_RAW)); 
if($color){
   $success = Color::InsertNewColor($color);
}
if($category){
   $success = Category::InsertNewCategory($category);
}

$title = DataWash::testInput(filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW)); 
$categoryid = (int)DataWash::testInput(filter_input(INPUT_POST, 'categoryid', FILTER_VALIDATE_INT)); 
$colorid = (int)DataWash::testInput(filter_input(INPUT_POST, 'colorid', FILTER_VALIDATE_INT)); 
$price = (float)DataWash::testInput(filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT)); 
$description = DataWash::testInput(filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW)); 

if($title && $categoryid && $colorid && $price && $description){
   $produkt = new Product(0, $title, $categoryid, $colorid, $price, $description);
   $id = Product::addProduct($produkt);
}

// Check image and insert image and productid to imagetable.
if(!empty($_FILES["image"]["name"])) { 
   // Get file info 
   $fileName = basename($_FILES["image"]["name"]); 
   $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    
   // Allow certain file formats 
   $allowTypes = array('jpg','png','jpeg','gif'); 
   if(in_array($fileType, $allowTypes)){ 
      $image = $_FILES['image']['tmp_name']; 
      $imgContent = addslashes(file_get_contents($image)); 
      //$id = $_POST['id'];
      Image::addImage($imgContent, $id);

   } else { 
      echo 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
   } 
} 
