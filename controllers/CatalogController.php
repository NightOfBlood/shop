<?php
//include_once root."/models/category.php";
//include_once root."/models/product.php";
class CatalogController{
    public function actionCategory($categoryId){
        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId);
        $categories = array();
        $categories = Category::getCategoriesList();
        require_once(root.'/views/catalog/category.php');
        
        return true;
    }
}
?>