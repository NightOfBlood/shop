<?php include root . '/views/general/header.php';?>

<section>
        <div class="container">
            <div class="row">
                <h4>Список товаров</h4>
                <a href="/admin/product/create"><i class="fa fa-plus"></i>Добавить товар</a>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>Id Товара</th>
                        <th>Название товара</th>
                        <th>Цена</th>
                        <th colspan="2">Действия</th>
                        <?php foreach($productList as $product): ?>
                            <tr>
                                <td><?php echo $product['id'];?></td>
                                <td><?php echo $product['name'];?></td>
                                <td><?php echo $product['price'];?></td>
                                <td><a href="/admin/product/update/<?php echo $product['id'];?>"><i class="fa fa-pencil-square-o"></i></a></td>
                                <td><a href="/admin/product/delete/<?php echo $product['id'];?>"><i class="fa fa-times"></i></a></td>
                            </tr> 
                        <?php endforeach;?> 
                    </tr>
                </table>
            </div>
        </div>
</section>

<?php include root . '/views/general/footer.php';?>