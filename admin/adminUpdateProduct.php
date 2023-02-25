<?php
require('../classes/classDBClasses.php');
include('adminview/adminheader.php');

if(isset($_POST['id'])){
   include('adminview/adminviewUpdateProduct.php');
} else if (isset($_POST['updateid'])){
   include('adminview/adminviewUpdateConf.php');
   include('adminview/adminviewAllProducts.php');
} else {
   include('adminview/adminviewAllProducts.php');
}

$id = filter_input(INPUT_POST, 'updateid', FILTER_UNSAFE_RAW); 
$title = filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW); 
$categoryid = (int)filter_input(INPUT_POST, 'categoryid', FILTER_VALIDATE_INT); 
$colorid = (int)filter_input(INPUT_POST, 'colorid', FILTER_VALIDATE_INT); 
$price = (float)filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT); 
$description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW); 

if($id && $title && $categoryid && $colorid && $price && $description){
   $alteredproduct = new Product($id, $title, $categoryid, $colorid, $price, $description);
   Product::updateProduct($alteredproduct);
}

if(!empty($_FILES["image"]["name"])) { 
   // Get file info 
   $fileName = basename($_FILES["image"]["name"]); 
   $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    
   // Allow certain file formats 
   $allowTypes = array('jpg','png','jpeg','gif'); 
   if(in_array($fileType, $allowTypes)){ 
      $image = $_FILES['image']['tmp_name']; 
      $imgContent = addslashes(file_get_contents($image)); 
      Image::addImage($imgContent, $id);

   } else { 
      echo 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
   } 
} 
