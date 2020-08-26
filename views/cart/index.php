<?php  include root . '/views/general/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
        </div>
        <div class="col-sm-12">
            <div class="features_items">
                <h2 class="title text-center">Корзина</h2>
                <?php if($productsInCart): ?>
                    <p>Ваши товары:</p>
                    <table class="table-bordered table-striped table">
                        <tr>
                            <th>Код товара</th>
                            <th>Название </th>
                            <th>Категория</th>
                            <th>Стоимость, руб </th>
                            <th>Количество, шт </th>
                            <th>Удалить</th>
                        </tr>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['category']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $productsInCart[$product['id']]; ?></td>
                            <td><a class="btn btn-default checkout" href="/cart/delete/<?php echo $product['id']; ?>"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                        <tr>
                            <td colspan='3'>Общая стоимость:</td>
                            <td><?php echo $totalPrice; ?></td>
                        </tr>
                    </table>
                    <a class="btn btn-default checkout " href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
                <?php else: ?>
                    <p>Корзина пуста</p>
                    <a class="btn btn-default checkout " href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>

<?php  include root . '/views/general/footer.php';?>