<?php include root . '/views/general/header.php';?>

<section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <?php if(isset($errors)&& is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li>
                                    <?php echo $error; ?>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    <?php endif; ?>
                    <div class="signup-form">
                        <h2 class="middleAdminZagolovok">Вход на сайт</h2>
                        <form action="#" method="POST">
                            <input type='email' placeholder='Емайл' name='email' value="<?php echo $email; ?>">
                            <input type='password' placeholder='Пароль' name='password' value="<?php echo $password; ?>">
                            <input type='submit' value='Вход' name='submit'>
                            <a href="/user/register/">Регистрация</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php include root . '/views/general/footer.php';?>