<?php
require_once root.'/db.php';
class Product{
        public static function getProductsListByCategory($categoryId=false){
            $db = DataBase::connect();
            $products = array();
            $result = $db->query("SELECT * FROM product WHERE category = '$categoryId'");
            $i = 0;

            while ($row = $result->fetch()){
                $products[$i]['id']=$row['productId'];
                $products[$i]['name']=$row['name'];
                $products[$i]['description']=$row['description'];
                $products[$i]['image']=$row['image'];
                $products[$i]['count']=$row['count'];
                $products[$i]['price']=$row['price'];
                $i++;
            }
            return $products;
        }
        public static function getProductById($productId){
            $db = DataBase::connect();
            $products = array();
            $result = $db->query("SELECT * FROM product WHERE productId = '$productId'");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }

        public static function getProductsByIndex($productsIndex){
            $db = DataBase::connect();
            $products=array();
            $indexString = implode(',',$productsIndex);
            $sql ="SELECT * FROM product WHERE productId IN($indexString) ";
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $i=0;
            while($row=$result->fetch()){
                $products[$i]['id']=$row['productId'];
                $products[$i]['name']=$row['name'];
                $products[$i]['discription']=$row['discription'];
                $products[$i]['image']=$row['image'];
                $products[$i]['count']=$row['count'];
                $products[$i]['price']=$row['price'];
                $products[$i]['category']=$row['category'];
                $i++;
            }
           
            return $products;
        }

        public static function getProductList(){
            $db=DataBase::connect();
            $result=$db->query("SELECT * FROM product ORDER BY productId ASC");
            $productList=array();
            $i=0;
            while($row=$result->fetch()){
                $productList[$i]['id']=$row['productId'];
                $productList[$i]['name']=$row['name'];
                $productList[$i]['discription']=$row['discription'];
                $productList[$i]['image']=$row['image'];
                $productList[$i]['count']=$row['count'];
                $productList[$i]['price']=$row['price'];
                $productList[$i]['category']=$row['category'];
                $i++;
            }
            return $productList;
        }

        public static function createProduct($product){
            $db=DataBase::connect();
            $sql="INSERT INTO product(name, price, category, description) VALUES (:name, :price, :category, :description)";
            $result=$db->prepare($sql);
            $result->bindParam(':name', $product['name'], PDO::PARAM_STR);
            $result->bindParam(':price', $product['price'], PDO::PARAM_STR);
            $result->bindParam(':category', $product['category_id'], PDO::PARAM_INT);
            $result->bindParam(':description', $product['description'], PDO::PARAM_STR);
            
            if($result->execute()){
                return $db->lastInsertId();
            }
           

            return 0;
            //добавить в админку производителя, количество, бренд, статус заказа
        }

        public static function getImage($id){
            $noImage="no-image.jpg";
            $path='/upload/images/products/';
            $pathToImage=$path.$id.'.jpg';
            if(file_exists($_SERVER['DOCUMENT_ROOT'].$pathToImage))
                return $pathToImage;
            return $path.$noImage;
        }

        public static function deleteProductById($id){
            $db=DataBase::connect();
            $sql='DELETE FROM product WHERE productId = :id';
            $result=$db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();
        }

        public static function updateProduct($id, $product){
            $db=DataBase::connect();  
            $sql="UPDATE product SET name=:name, price=:price, category=:category, count=:count, description:=description WHERE productId = :id";
            $result=$db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':name', $product['name'], PDO::PARAM_STR);
            $result->bindParam(':price',$product['price'], PDO::PARAM_INT);
            $result->bindParam(':category', $product['category'], PDO::PARAM_INT);
            $result->bindParam(':count', $product['count'], PDO::PARAM_INT);
            $result->bindParam(':description', $product['description'], PDO::PARAM_STR);
            return $result->execute();
        }
        //возвращает продукты (продукт лист)

        public static function getRecommendedProducts($idUser){
            $db=DataBase::connect();
            $sql='SELECT mark, id_product FROM mark WHERE uuid_user=:uuid ORDER BY mark DESC LIMIT 2';
            $resultSQL=$db->prepare($sql);
            $resultSQL->bindParam(':uuid', $idUser, PDO::PARAM_STR);
            $resultSQL->execute();
            $productList=$resultSQL->fetchAll(PDO::FETCH_KEY_PAIR);
            $result=array();
            $categoriesList=array();
            $i=0;
            foreach($productList as $key=> $value) {
                $product=self::getProductById($value);
                $result[$i]['id']=$product['productId'];
                $result[$i]['name']=$product['name'];
                $result[$i]['discription']=$product['discription'];
                $result[$i]['image']=$product['image'];
                $result[$i]['count']=$product['count'];
                $result[$i]['price']=$product['price'];
                $result[$i]['category']=$product['category'];
                array_push($categoriesList, $product['category']);
                $i++;
            }
           
            //var_dump($db->errorInfo());
            $list=array_unique($categoriesList);
            $list=implode(',', $categoriesList);
           
            $sql="SELECT * FROM product WHERE category IN ($list)";
            $resultSQL=$db->prepare($sql);
            $resultSQL->execute();
            $productList=$resultSQL->fetchAll();
            for($j=0;$j<7 && $j<count($productList);$j++){
                $result[$i]['id']=$productList[$j]['productId'];
                $result[$i]['name']=$productList[$j]['name'];
                $result[$i]['discription']=$productList[$j]['discription'];
                $result[$i]['image']=$productList[$j]['image'];
                $result[$i]['count']=$productList[$j]['count'];
                $result[$i]['price']=$productList[$j]['price'];
                $result[$i]['category']=$productList[$j]['category'];
                $i++;
            }
           // var_dump($result);
            return $result;
        }

        //
        public static function addMark($idUser, $idProduct){
            $db=DataBase::connect();
            $sql='SELECT id_product, mark FROM mark WHERE uuid_user=:uuid';
            $result=$db->prepare($sql);
            $result->bindParam(':uuid', $idUser, PDO::PARAM_INT);
            $result->execute();
            $productList=$result->fetchAll(PDO::FETCH_KEY_PAIR);
      
            $exists=array_key_exists($idProduct, $productList);
            if(count($productList)>=10){
                $db=DataBase::connect();
                $sql='DELETE FROM mark WHERE uuid_user=:uuid_user AND id_product=:id_product';
                $result=$db->prepare($sql);
               // var_dump(key($productList));
                $result->bindParam(':id_product',  key($productList), PDO::PARAM_STR);
                $result->bindParam(':uuid_user',  $idUser, PDO::PARAM_STR);
                $result->execute();
            }
            if((count($productList)==0) || (!$exists)){
                $sql='INSERT INTO mark (uuid_user, id_product, mark) VALUES (:uuid_user, :id_product, 1)';
                $result=$db->prepare($sql);
                $result->bindParam(':uuid_user', $idUser, PDO::PARAM_STR);
                $result->bindParam(':id_product', $idProduct, PDO::PARAM_STR);
                $result->execute();
            }
            else {
                if($exists){
                    $sql="UPDATE mark SET mark=:m WHERE uuid_user=:uuid_user AND id_product=:id_product";
                    $mark=((int)$productList[$idProduct])+1;
                    $result=$db->prepare($sql);
                    $result->bindParam(':uuid_user', $idUser, PDO::PARAM_STR);
                    $result->bindParam(':id_product', $idProduct, PDO::PARAM_STR);
                    $result->bindParam(':m', $mark, PDO::PARAM_INT);
                    $result->execute();
                }
               
            }
        }

        public static function getLastProducts(){
            $db=DataBase::connect();
            $result=$db->query("SELECT * FROM product ORDER BY productId DESC LIMIT 3 ");
            $productList=array();
            $i=0;
            while($row=$result->fetch()){
                $productList[$i]['id']=$row['productId'];
                $productList[$i]['name']=$row['name'];
                $productList[$i]['discription']=$row['discription'];
                $productList[$i]['image']=$row['image'];
                $productList[$i]['count']=$row['count'];
                $productList[$i]['price']=$row['price'];
                $productList[$i]['category']=$row['category'];
                $i++;
            }
            return $productList;
        
        }
    }
?>