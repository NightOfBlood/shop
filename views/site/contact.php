
<?php include root . '/views/general/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if($result):?>
                    <p>Письмо отправленно, ответим в течении суток.</p>
                <?php else:?>
                    <?php if(isset($errors) && is_array($errors)):?>
                        <ul>
                            <?php foreach($errors as $error):?>
                                <li><?php echo $error;?></li>

                            <?php endforeach;?>
                        </ul>
                    <?php endif;?>
                <div class="signup-form">
                    <h2 style="text-align:center">Обратная связь</h2>
                    <form action="#" method="POST">
                    <p> Здесь вы всегда можете задать любые интересующие вопросы. 
                    Для этого нужно заполнить форму обратной связи.</p>
                        <p>Ваша почта</p>
                        <input type="email" name="user-email" placeholder="Email">
                        <p>Сообщение</p>
                        <input type="text" name="user-text" placeholder="Сообщение">
                        <input type="submit" name="submit" class="btn btn-default" value="Отправить">
                    </form>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>

<?php include root . '/views/general/footer.php';?>     