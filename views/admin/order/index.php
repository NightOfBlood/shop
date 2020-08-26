<?php include root . '/views/general/header.php';?>


<section>
    <div class="container">
        <div class="row">
            <h4>Список заказов</h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Номер заказа</th>
                    <th>Имя покупателя</th>
                    <th>Телефон покупателя</th>
                    <th>Дата оформления</th>
                    <th colspan="3">Действия</th>
                </tr>
                <?php foreach($ordersList as $order):?>
                    <tr>
                        <td><a href="/admin/order/views/<?php echo $order['id'];?>"><?php echo $order['id'];?></a></td>
                        <td><?php echo $order['userName'];?></td>
                        <td><?php echo $order['userPhone'];?></td>
                        <td><?php echo $order['date'];?></td>
                        <!-- Статус заказа-->
                        <td><a href="/admin/order/views/<?php echo $order['id'];?>"><i class="fa fa-eye"></i></a></td>
                        <td><a href="/admin/order/update/<?php echo $order['id'];?>"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/order/delete/<?php echo $order['id'];?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>

<?php include root . '/views/general/footer.php';?>