<?php 
//include_once root . '/models/user.php';
class UserController{
        public function actionRegister(){
            $result=false;
            if (isset($_POST['submit']))
            {
                $name=$_POST['name'];
                $password=$_POST['password'];
                $email=$_POST['email'];
                $errors=false;
                if(!User::checkName($name))
                    $errors[]='Имя не должно быть короче 2-х символов!';

                if(!User::checkEmail($email))
                    $errors[]='Неверный Email!';
                
                if(!User::checkPassword($password))
                    $errors[]='Пароль не должен быть короче 6 символов!';
            
                if(User::checkEmailExists($email))
                    $errors[]='Такой Email уже зарегестрирован!';

                if ($errors == false)
                    $result = User::register($name, $email, $password);
            }
            require_once(root.'/views/user/register.php');
            return true;
        }

        public function actionLogin(){
            $email='';
            $password='';
            if (isset($_POST['submit']))
            {
                $password=$_POST['password'];
                $email=$_POST['email'];
                $errors=false;

                if(!User::checkEmail($email))
                    $errors[]='Неверный Email!';
                
                if(!User::checkPassword($password))
                    $errors[]='Пароль не должен быть короче 6 символов!';
            
                $userId=User::checkUserData($email, $password);

                if($userId== false)
                    $errors[]='Данные для входа на сайт неверны!';
                else
                {
                    User::auth($userId);
                    header("Location: /account/");
                }

            }
            require_once(root.'/views/user/login.php');
            return true;
        }

        public function actionLogout(){
            session_start();
            unset($_SESSION['user']);
            header("Location: /");
        }
          
}
    
    
?>