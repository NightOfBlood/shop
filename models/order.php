<?php

    class Order{
        public static function Save($userName, $userPhone, $userComment, $userId, $products){
            $db=DataBase::connect();
            $sql='INSERT INTO productorder (userName, userPhone, userComment, userId, products)'
            .' VALUES (:userName, :userPhone, :userComment, :userId, :products)';
            $products=json_encode($products);
            $result=$db->prepare($sql);
            $result->bindParam(':userName', $userName, PDO::PARAM_STR);
            $result->bindParam(':userPhone', $userPhone, PDO::PARAM_STR);
            $result->bindParam(':userComment', $userComment, PDO::PARAM_STR);
            $result->bindParam(':userId', $userId, PDO::PARAM_INT);
            $result->bindParam(':products', $products, PDO::PARAM_STR);
           
            return $result->execute();
        }
        public static function getOrdersList(){
            $db=DataBase::connect();
            $sql='SELECT * FROM productorder';
            $orderList=array();
            $result=$db->query($sql);
            $i=0;
            while($row=$result->fetch()){
                $ordersList[$i]['id']=$row['id'];
                $ordersList[$i]['userName']=$row['userName'];
                $ordersList[$i]['userPhone']=$row['userPhone'];
                $ordersList[$i]['userComment']=$row['userComment'];
                $ordersList[$i]['date']=$row['date'];
                $ordersList[$i]['status']=$row['status'];
                $i++;
            }
        
            return $ordersList;
        }
        public static function getStatusText($status){
            switch($status){
                //придумать статусы
            }
        }
        public static function getOrderById($id){
            $db=DataBase::connect();
            $sql='SELECT * FROM productorder WHERE id=:id';
            $result=$db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
        }
        public static function deleteOrderById($id){
            $db=DataBase::connect();
            $sql='DELETE FROM productorder WHERE id=:id';
            $result=$db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();
        }
        //updateOrderById();
        public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status){
            $db=DataBase::connect();
            $sql='UPDATE productorder SET userName=:userName, userPhone=:userPhone, userComment=:userComment, 
            date=:date, status=:status WHERE id=:id';
            $result=$db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':userName', $userName, PDO::PARAM_STR);
            $result->bindParam(':userPhone', $userPhone, PDO::PARAM_STR);
            $result->bindParam(':userComment', $userComment, PDO::PARAM_STR);
            $result->bindParam(':date', $date, PDO::PARAM_STR);
            $result->bindParam(':status', $status, PDO::PARAM_INT);
            //var_dump($userName);
            try{
               return $result->execute();
            }
           catch(PDOException $e){
               print_r($e->getMessage());
           }
            //var_dump($result->errorInfo());
            //return $result->execute();
        }
    }

?>