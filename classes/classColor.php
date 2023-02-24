<?php


class Color{
   private  $colorid;
   private  $colorname;

   public function __construct($colorid, $colorname){
      $this->colorid = $colorid;
      $this->colorname = $colorname;
   }

   public static function getAllColors(){
      $conn = DB::connect();

      $result = $conn->query("SELECT * FROM colors");

      if($result->num_rows > 0){
         while($row = $result->fetch_assoc()){
            $color = new Color($row['colorid'],$row['colorname']);
            $colors[] = $color;
         }
      } else {
         echo 'No colors in database';
      }
      $conn->close();
      return $colors;
   }
   public static function InsertNewColor($color){
      $conn = DB::connect();

      $stmt = $conn->prepare("INSERT INTO colors (colorname) VALUES (?)");
      $stmt->bind_param("s", $color);
      try{
         $stmt->execute();
      } catch (Exception $e){
         echo $e->getMessage();
      }
      
      $stmt->close(); 
      $conn->close();
   }

   public function getColorname(){
     return $this->colorname;
   }
   public function getColorid(){
      return $this->colorid;
   }
}