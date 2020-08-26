<?php include root . '/views/general/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <h4 class="middleAdminZagolovok">Редактировать товар</h4>
            <div class="middleAdminPanel">
            <?php if(isset($errors) && is_array($errors)):?>
                <ul>
                    <?php foreach($errors as $error):?>
                        <li><?php echo $error;?></li>

                    <?php endforeach;?>
                </ul>
            <?php endif;?>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <label>Название товара</label>
                        <input type="text" value="<?php echo $product['name'];?>" name="name">
                        <label>Стоимость</label>
                        <input type="text" value="<?php echo $product['price'];?>" name="price">
                        <label>Категория</label>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)):?>
                                <?php foreach($categoriesList as $category):?>
                                    <option value="<?php echo $category['id']; ?>"
                                        <?php if($product['category_id']==$category[$id]) echo 'selected';?>>
                                        <?php echo $category['name'];?>
                                    </option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                        <!-- <label> Производитель </label>-->
                        <label>Изображение товара</label>
                        <img src="<?php echo Product::getImage($product['id']); ?>" width="200"/>
                        <input type="file" value="<?php echo $product['image'];?>" name="image">
                        <label>Количество</label>
                        <input type="text" value="<?php echo $product['count'];?>" name="count">
                        <label>Описание товара</label>
                        <textarea name="description" value="<?php echo $product['description'];?>"></textarea>
                        <label> Новинка </label>
                        <select name="is_new">
                            <option value="1" <?php if($product['is_new']==1){ echo 'selected';} ;?> > Да </option>
                            <option value="0" <?php if($product['is_new']==0){ echo 'selected';} ;?> > Нет </option>
                        </select>
                        <!-- <label> Наличие на складе </label>-->
                        <input class="btn btn-default" type="submit" name="submit" value="Сохранить">
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<?php include root . '/views/general/footer.php';?>