<?php
include_once root . '/db.php';

class User{
    public static function register($name,$email,$password){
        $db=DataBase::connect();
        $sql='INSERT INTO user (name, email, password) VALUES (:name, :email, :password)';
        $result=$db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        return $result->execute();
    }


    public static function checkUserData($email,$password){
        $db=DataBase::connect();
        $sql='SELECT * FROM user WHERE email=:email'; 
        $result=$db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $user=$result->fetch();
        if (password_verify($password,$user['password'])){
            return $user['id']; 
        }
        return false;
    }

    public static function getUserById($id){
        $db=DataBase::connect();
        $sql='SELECT * FROM user WHERE id=:id';
        $result=$db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    
    public static function auth($userId){
        $_SESSION['user'] = $userId;
    }

    public static function isGuest(){
        if (isset($_SESSION['user']))
            return false;
        return true;
    }

    public static function checkName($name){
        if(strlen($name)>=2)
            return true;
        return false;
    }

    public static function checkPassword($password){
        if(strlen($password)>=6)
            return true;
        return false;
    }

    public static function checkEmail($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
            return true;
        return false;
    }

    public static function checkEmailExists($email){
        $db=DataBase::connect();
        $sql= 'SELECT COUNT(*)  FROM user WHERE email=:email';
        $result=$db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->execute();
        if($result->fetchColumn())
            return true;
        return false;
    }

    public static function checkLogged(){
        if(isset($_SESSION['user']))
            return $_SESSION['user'];
       // header("Location:/user/login");
       return NULL;
    }

    public static function getUserOrders($userId){
        $db=DataBase::connect();
        $sql='SELECT * FROM productorder WHERE userId=:id';
        $result=$db->prepare($sql);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);
        $result->execute();
        $orders = array();
        $i = 0;

        while ($row = $result->fetch()){
            $orders[$i]['id']=$row['id'];
            $orders[$i]['phone']=$row['userPhone'];
            $orders[$i]['comment']=$row['userComment'];
            $orders[$i]['products']=$row['products'];
            $orders[$i]['status']=$row['status'];
            $i++;
        }
        return $orders;
        
    }
    
    public static function checkPhone($phone){
        if(strlen($phone>10)){
            return true;
        }
        return false;
    }

    public static function getStatus($status){
        
        switch($status){
            case 1:
                return "Заказ обрабатывается";

            case 2:
                return "Заказ отправлен";

            case 3:
                return "Заказ подтвержден";
        }

        return $status;
    }

}
  
?>