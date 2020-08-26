<?php  

    class DataBase{ 
       

        public static function connect(){
            $link=new PDO('mysql:dbname=shopitmagazine; host=localhost', 'root', '');
            $link->exec("set names utf8");
            return $link;
        }
/*
        public function get_all_products(){
            $productList=array();
            $result = $link->query("SELECT * FROM product");
            $i=0;
            while ($row = $result->fetch()){
                $productList[$i]['id'] = row['productId'];
                $productList[$i]['name'] = row['name'];
                $productList[$i]['description'] = row['description'];
                $productList[$i]['image'] = row['image'];
                $productList[$i]['count'] = row['count'];
                $productList[$i]['price'] = row['price'];
                $productList[$i]['category'] = row['category'];
                $i++;
            }
            return $productList;
        }*/
    }



?>