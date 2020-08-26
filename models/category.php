<?php
include_once root. '/db.php';
    class Category{
        public static function getCategoriesList(){
            $db = DataBase::connect();
            $categories = array();
            $result = $db->query('SELECT * FROM category');
            $i = 0;
            while ($row = $result->fetch()){
                $categories[$i]['id']=$row['categoryId'];
                $categories[$i]['name']=$row['name'];
                $i++;
                
            }
            return $categories;
        }

        public static function createCategory($name){
            $db = DataBase::connect();
            $sql="INSERT INTO category(name) VALUES (:name)";
            $result=$db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);

            return $result->execute();
        }

        public static function updateCategory($id, $name){
            $db=DataBase::connect();  
            $sql="UPDATE category SET name=:name WHERE categoryId = :id";
            $result=$db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            return $result->execute();
        }

        public static function deleteCategoryById($id){
            $db=DataBase::connect();
            $sql='DELETE FROM category WHERE categoryId = :id';
            $result=$db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();
        }

        public static function getCategoryById($id){
            $db= DataBase::connect();
            $sql='SELECT * FROM category WHERE categoryId = :id';
            $result=$db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
        }
    }
?>