<?php
//require('classDB.php');

class Image{
   private $image;
   private $productid;

   public function __construct($productid, $image){
      $this->productid = $productid;
      $this->image = $image;
   }

   public static function addImage($imgContent, $id){

      // Insert image content into database 
      $conn = DB::connect();
      $insert = $conn->query("INSERT INTO images (image, productid) VALUES ('$imgContent', '$id')"); 
      
      if($insert){ 
         echo "File uploaded successfully."; 
      } else { 
         echo "File upload failed, please try again."; 
      }  

   }
   public static function updateImage($image, $id){
      $conn = DB::connect();
      $update = $conn->query("UPDATE images SET image = '$image' WHERE productid = '$id'");
      if($update){
         echo "Image updated successfully."; 
      } else { 
         echo "Image updated failed, please try again."; 
      }    
   }
   public static function getOtherColorsForProduct($title){
      $conn = DB::connect();
   
      $sql = "SELECT i.productid, i.image
      FROM images i
      JOIN products p ON i.productid = p.productid
      WHERE p.title = ?";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param('s',$title);

      $stmt->execute();
      $result = $stmt->get_result();

      $images = array();

      if ($result->num_rows > 0) {
        
         while($row = $result->fetch_assoc()) {
            $images[] = new Image($row['productid'], $row['image']); 
         }
      }

      $stmt->close();
      $conn->close();
      return $images;
   
   }
   public function getImage(){
      return $this->image;
   }
   public function getProductid(){
      return $this->productid;
   }
}