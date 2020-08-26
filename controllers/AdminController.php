<?php
    class AdminController{
        public function actionIndex(){
            Admin::checkAdmin();
            require_once(root.'/views/admin/index.php');
            return true;
        }
        public function actionProduct(){
            Admin::checkAdmin();
            $productList=Product::getProductList();
            require_once(root.'/views/admin/product/index.php');
            return true;
        }
        public function actionCreateProduct(){
            Admin::checkAdmin();
            $categoriesList=Category::getCategoriesList();
            if(isset( $_POST['submit'])){
                $product['name']=$_POST['name'];
                $product['price']=$_POST['price'];
                $product['category_id']=$_POST['category_id'];
                $product['is_new']=$_POST['is_new'];
                $product['description']=$_POST['description'];
            
           

                $errors=false;
                if(!isset($product['name']) || empty($product['name'])){
                    $errors[]='Заполните поля';
                }
                //валидация множества полей(по необходимости)
                if($errors==false){
                    $id=Product::createProduct($product);
                    //var_dump($id);
                    if($id){
                       
                        if(is_uploaded_file($_FILES["image"]['tmp_name'])){
                            move_uploaded_file($_FILES["image"]['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");
                            
                        }
                    }
                    header("Location: /admin/product");
                }
            }  
            
            require_once(root.'/views/admin/product/create.php');
            return true;
        }
        public function actionDeleteProduct($id){
            Admin::checkAdmin();
            if(isset($_POST['submit'])){
                Product::deleteProductById($id);
                header("Location: /admin/product");
            }
            //сделать всплывающее окно
            require_once(root.'/views/admin/product/delete.php');
            return true;
        }

        public function actionUpdateProduct($id){
            Admin::checkAdmin();
            $product=Product::getProductById($id);
            if(isset($_POST['submit'])){
                $values['name']=$_POST['name'];
                $values['price']=$_POST['price'];
                $values['category']=$_POST['category'];
                $values['count']=$_POST['count'];
                $values['description']=$_POST['description'];
               if(Product::updateProduct($id,$values)){    
                    if(is_uploaded_file($_FILES["image"]['tmp_name'])){
                        move_uploaded_file($_FILES["image"]['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");       
                    }
               }
            
                header("Location: /admin/product");
            }
            require_once(root.'/views/admin/product/update.php');
            return true;
        }

        public function actionCategory(){
            Admin::checkAdmin();
            $categoriesList=Category::getCategoriesList();

            require_once(root.'/views/admin/category/index.php');
            return true;
        }

        public function actionCreateCategory(){
            Admin::checkAdmin();
            if(isset($_POST['submit'])){
                $name=$_POST['name'];
                $errors=false;
                if (!isset($name) || empty($name)){
                    $errors[]='Заполните поля';
                }
                if($errors==false){
                    Category::createCategory($name);
                    header("Location: /admin/category");
                }
            }
            require_once(root.'/views/admin/category/create.php');
            return true;
        }

        public function actionDeleteCategory($id){
            Admin::checkAdmin();
            if(isset($_POST['submit'])){
                Category::deleteCategoryById($id);
                header("Location: /admin/category");
            }                
            require_once(root.'/views/admin/category/delete.php');
            return true;
        }

        public function actionUpdateCategory($id){
            Admin::checkAdmin();
            $category=Category::getCategoryById($id);
            if(isset($_POST['name'])){
                $name=$_POST['name'];
                Category::updateCategory($id, $name);
                header("Location: /admin/category");
            }
            require_once(root.'/views/admin/category/update.php');
            return true;
            
        }

        public function actionOrder(){
            Admin::checkAdmin();
            $ordersList=Order::getOrdersList();
            require_once(root.'/views/admin/order/index.php');
            return true;
        }
        
        public function actionViewOrder($id){
            Admin::checkAdmin();
            $order=Order::getOrderById($id);
            $productsQuantity=json_decode($order['products'],true);
            $productsIndexes=array_keys(json_decode($order['products'],true));
            $products=Product::getProductsByIndex($productsIndexes);
            require_once(root.'/views/admin/order/view.php');
            return true;
        }

        public function actionUpdateOrder($id){
            Admin::checkAdmin();
            $order=Order::getOrderById($id);
            if(isset($_POST['submit'])){
                $name=$_POST['name'];
                $phone=$_POST['phone'];
                $comment=$_POST['comment'];
                $date=$_POST['date'];
                $status=$_POST['status'];
                //var_dump($_POST);
                Order::updateOrderById($id, $name, $phone, $comment, $date, $status);
                header("Location: /admin/order/");
            }
            require_once(root.'/views/admin/order/update.php');
            return true;
        }

        public function actionDeleteOrder($id){
            Admin::checkAdmin();
            if(isset($_POST['submit'])){
                Order::deleteOrderById($id);
                header("Location: /admin/order/");
            }  
            require_once(root.'/views/admin/order/delete.php');
            return true;
         }

    }

?>