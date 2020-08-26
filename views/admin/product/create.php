<?php include root . '/views/general/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <h4 class="middleAdminZagolovok">Добавить новый товар</h4>
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
                        <input type="text" name="name">
                        <label>Стоимость</label>
                        <input type="text" name="price">
                        <label>Категория</label>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)):?>
                                <?php foreach($categoriesList as $category):?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name'];?>
                                    </option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                        <!-- <label> Производитель </label>-->
                        <label>Изображение товара</label>
                        <input type="file" name="image">
                        <label>Количество</label>
                        <input type="text" name="count">
                        <label>Описание товара</label>
                        <textarea name="description"></textarea>
                        <label> Новинка </label>
                        <select name="is_new">
                            <option value="1" selected> Да </option>
                            <option value="0" selected> Нет </option>
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