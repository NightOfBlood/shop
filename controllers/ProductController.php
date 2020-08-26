<?php 
//include_once root."/models/category.php";
//include_once root."/models/product.php";

  class ProductController{
      public function actionView($id){
        $product=Product::getProductById($id);
        $uuid_user="1";
        Product::addMark($uuid_user,$id);
        
        require_once(root.'/views/product/view.php');
        return true;
      }
      
  }

?>