<?php include root . '/views/general/header.php';?>

<section>
        <div class="container">
            <div class="row">
                <h4>Список категорий</h4>
                <a href="/admin/category/create"><i class="fa fa-plus"></i>Добавить категорию</a>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>Id категории</th>
                        <th>Название категории</th>
                        <th colspan="2">Действия</th>
                        <?php foreach($categoriesList as $category): ?>
                            <tr>
                                <td><?php echo $category['id'];?></td>
                                <td><?php echo $category['name'];?></td>
                                
                                <td><a href="/admin/category/update/<?php echo $category['id'];?>"><i class="fa fa-pencil-square-o"></i></a></td>
                                <td><a href="/admin/category/delete/<?php echo $category['id'];?>"><i class="fa fa-times"></i></a></td>
                            </tr> 
                        <?php endforeach;?> 
                    </tr>
                </table>
            </div>
        </div>
</section>

<?php include root . '/views/general/footer.php';?>