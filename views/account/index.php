<?php include root . '/views/general/header.php';?>
    
<section>
        <div class="container">
            <div class="row">
                <h1 class="zagolovok">Личный кабинет</h1>
                <h3 class="zagolovok"><?php echo $user['name'] ?></h3>

                    <table class="table-bordered table-striped table">
                            <tr>
                                <th>Код заказа</th>
                                <th>Название товара</th>
                                <th>Телефон </th>
                                <th>Комментарий</th>
                                <th>Статус</th>
                            </tr>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $order['id']; ?></td>
                                <td><?php echo Product::getNameProduct($result['name']); ?></td>
                                <td><?php echo $order['phone']; ?></td>
                                <td><?php echo $order['comment']; ?></td>
                                <td><?php echo User::getStatus($order['status']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

            </div>
        </div>
</section>
<?php include root . '/views/general/footer.php';?>