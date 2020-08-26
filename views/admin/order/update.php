<?php include root . '/views/general/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <h4 class="middleAdminZagolovok">Редактирование заказа №<?php echo $id ?></h4>
            <div class="middleAdminPanel">
                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post" enctype="multipart/form-data">
                        <label>Имя клиента</label>
                        <input type="text" value="<?php echo $order['userName'];?>" name="name">
                        <label> Телефон клиента</label>
                        <input type="text" value="<?php echo $order['userPhone'];?>" name="phone">
                        <label> Комментарий клиента</label>
                        <input type="text" value="<?php echo $order['userComment'];?>" name="comment">
                        <label> Дата оформления заказа</label>
                        <input type="text" value="<?php echo $order['date'];?>" name="date">
                        <label> Статус</label>
                        <select name="status">
                            <option value="1" <?php if($order['status']==1) echo 'selected';?>>Новый заказ</option>
                            <option value="2" <?php if($order['status']==2) echo 'selected';?>>Доставка заказа</option>
                            <option value="3" <?php if($order['status']==3) echo 'selected';?>>Обработка заказа</option>
                            <option value="4" <?php if($order['status']==4) echo 'selected';?>>Заказ отменен</option>
                        </select>
                        <input class="btn btn-default" type="submit" name="submit" value="Сохранить">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include root . '/views/general/footer.php';?>