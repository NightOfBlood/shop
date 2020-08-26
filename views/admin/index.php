<?php include root . '/views/general/header.php';?>
<head><h2 class="zagolovok">Административная панель</h2></head>
<section>
        <div class="container">
                <div class="row ">
                    <div class="container text-center">   
                        <ul class="nav navbar-nav collapse navbar-collapse ">
                            <li>
                                <a class="apanel" href="/admin/product">
                                    <div>
                                        <img src="image/goods.png" width="200px" height="200px"></div>Управление товарами 
                                </a>
                            </li>
                            <li>
                                <a href="/admin/category">
                                    <div>
                                        <img src="image/category.png" width="200px" height="200px"></div>Управление категориями
                                </a>
                            </li>
                            <li>
                                <a href="/admin/order">
                                    <div>
                                        <img src="image/orders.png" width="200px" height="200px"></div>Управление заказами
                                </a>
                            </li>
                        </ul> 
                    </div>
                </div>
        </div>
</section>

<?php include root . '/views/general/footer.php';?>