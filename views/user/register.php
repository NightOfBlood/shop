<?php include root . '/views/general/header.php';?>
<html>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <?php if($result):?>
                        <p>Вы зарегистрированы!</p>
                    <?php else: ?>
                        <?php if(isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li>
                                        <?php echo $error; ?>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif; ?>
                        <div class="signup-form">   
                            <h2 style="text-align:center" >Регистрация</h2>  
                            <form  action="#" method="POST">
                                <input class="btn btn-default" type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>">
                                <input class="btn btn-default" type="email" name="email" placeholder="Емайл" value="<?php echo $email; ?>">
                                <input class="btn btn-default" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>">
                                <input class="btn btn-default" type="submit" name="submit"  value="Регистрация">
                            </form>  
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</html>
<?php include root . '/views/general/footer.php';?>



