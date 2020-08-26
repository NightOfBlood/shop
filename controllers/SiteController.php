<?php
class SiteController{
    public function actionIndex(){
        $categories = array();
        $categories = Category::getCategoriesList();
        $sliderProducts = Product::getRecommendedProducts('1');
        $lastItems = Product::getLastProducts();
        //var_dump(password_hash('user000',PASSWORD_DEFAULT));
        require_once(root .'/views/site/index.php');
        return true;
    }
    public function actionContact(){
        $userEmail='';
        $userText='';
        $result=false;
        if(isset($_POST['submit'])){
            $userEmail=$_POST['user-email'];
            $userText=$_POST['user-text'];
            $errors=false;
            if(!User::checkEmail($userEmail)){
                $errors[]='Неправильный Email!';
            }
            if($errors==false){
                $adminEmail='mimirondakota@gmail.com';
                $message="Текст: {$userText}. от {$userEmail}";
                $subject='Обратная связь';
                $result=mail($adminEmail, $subject, $message);
                $result=true;
            }
        }
        require_once(root . '/views/site/contact.php');
        return true;
    }
        
}
?>

