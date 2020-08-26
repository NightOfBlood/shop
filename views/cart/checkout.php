<?php  include root . '/views/general/header.php';?>
<section>
    <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="fiatures_items">
                        <h2>Корзина</h2>         
                        <?php if($result):?>
                            <p>Заказ оформлен. С вами свяжутся</p>
                        <?php else:?>
                            <p>Выбрано товаров: <?php echo $totalCount;?>, на сумму:<?php echo $totalPrice;?>, Руб. </p>
                            <?php if(!$result): ?>
                                <div class="col-sm-4">
                                    <?php if(isset($errors) && is_array($errors)):?>
                                        <ul>
                                            <?php foreach($errors as $error):?>
                                                <li><?php echo $error;?></li>
                                            <?php endforeach;?>
                                        </ul>
                                    <?php endif;?>
                                    <p>Для оформления заказа заполните форму.</p>
                                    <div class="login-form">
                                        <form  method="POST">
                                            <p>Имя</p>
                                            <input type="text" name="userName" placeholder="" value="<?php echo $userName;?>">
                                            <p>Телефон</p> 
                                            <input type="text" name="userPhone" placeholder="" value="<?php echo $userPhone;?>">
                                            <p>Комментарий</p>
                                            <input type="text" name="userComment" placeholder="" value="<?php echo $userComment;?>">
                                            <input type="submit" value="Оформить" class="btn btn-default" name="submit">
                                        </form>
                                    </div>
                                </div>
                            <?php endif ;?>
                        <?php endif ;?>
                    </div>
                </div>
            </div>
    </div>
</section>
<?php  include root . '/views/general/footer.php';?>