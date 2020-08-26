<?php 
 class AccountController{
     public function actionIndex(){
         $userId=User::checkLogged();
         $user=User::getUserById($userId);
         
         if($user['role']=='admin'){
            header("Location: /admin");
         }
        else {
            $orders=User::getUserOrders($userId);
        }
         require_once(root.'/views/account/index.php');
         return true;
     }

 }

?>