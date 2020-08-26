<?php include root . '/views/general/header.php';?>
<section>
    <div class="container">
        <div class="row">
            <h4 class="middleAdminZagolovok">Добавить новую категорию</h4>
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
                        <form action="#" method="POST">
                            <label>Название категории</label>
                            <input type="text" name="name">
                        
                            <input class="btn btn-default" type="submit" name="submit" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</section>
<?php include root . '/views/general/footer.php';?>