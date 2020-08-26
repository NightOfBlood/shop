<?php 
class CartController{
        public function actionIndex(){
            $productsInCart=false;
            $productsInCart=Cart::getProducts();
           
            if($productsInCart){
                $productsIndex=array_keys($productsInCart);
                $products=Product::getProductsByIndex($productsIndex);
                $totalPrice=Cart::getTotalPrice($products);
              
            }
            require_once(root . '/views/cart/index.php');
            return true; 
        }
        
        public function actionAdd($id){
 
            echo Cart::addProduct($id);
            
            return true;
        }

        public function actionDelete($id){
            Cart::deleteProduct($id);
            
            header("Location: /cart/"); 
            
        }
        
        public function actionCheckout(){
            $result=false;
            $productsInCart=Cart::getProducts();

            if($productsInCart==false){
               
                header("Location: /"); 
            }

            $productsIndex=array_keys($productsInCart);
            $products=Product::getProductsByIndex($productsIndex);
            $totalPrice=Cart::getTotalPrice($products);
            $totalCount=Cart::countItems();

            $userName=false;
            $userPhone =false;
            $userComment=false;

            if (!User::isGuest()){
                $userId=User::checkLogged();
                $user=User::getUserById($userId);
                $userName=$user['name'];
            }
            else
                $userId=NULL;

            if (isset($_POST['submit'])){
                $userName=$_POST['userName'];
                $userPhone=$_POST['userPhone'];
                $userComment=$_POST['userComment'];
                $errors=false;
                //var_dump($_POST);
                if(!User::checkName($userName))
                {
                    $errors[]='Неверное имя!';
                }
                if(!User::checkPhone($userPhone))
                {
                    $errors[]='Неверный телефон!';
                }
                if ($errors==false){
                    
                    $result=Order::Save($userName, $userPhone, $userComment, $userId, $productsInCart);
                    if($result){
                            $adminEmail='mimirondakota@gmail.com';
                            $message= $userEmail;
                            $subject='Обратная связь';
                            mail($adminEmail, $subject, $message);
                            Cart::clear();
                            //var_dump($productsInCart);
                    }
                }         
            }
           
            require_once(root . '/views/cart/checkout.php');
            return true;
        }
    }
?>
