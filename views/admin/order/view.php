<?php include root . '/views/general/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <h4 class="middleAdminZagolovok">Просмотр заказа <?php echo $order['id']; ?></h4>
            <div class="login-form">
                <form>
                    <label>Имя клиента</label>
                    <input type="text" value="<?php echo $order['userName'];?> ">
                    <label>Телефон клиента</label>
                    <input type="text" value="<?php echo $order['userPhone'];?> ">
                    <label>Комментарий клиента</label>
                    <input type="text" value="<?php echo $order['userComment'];?> ">
                    <label>Дата заказа</label>
                    <input type="text" value="<?php echo $order['date'];?> ">
                    <label>Статус заказа</label>
                    <input type="text" value="<?php echo $order['status'];?> ">
                </form>
            </div>
            <h5>Товары в заказе</h5>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Номер товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                <?php foreach($products as $product):?>
                    <tr>
                        <td><?php echo $product['id'];?></td>
                        <td><?php echo $product['name'];?></td>
                        <td><?php echo $product['price'];?></td>
                        <td><?php echo $productsQuantity[$product['id']];?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>

<?php include root . '/views/general/footer.php';?>