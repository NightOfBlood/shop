
<?php  include root . '/views/general/header.php';?>
<section>
    <div class="container">
        <div class="product-details">
            <div class="row">
                <div class="col-sm-5">
                    <div class="view-product">
                    <img  src="<?php echo Product::getImage($product['productId']);?>"/>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="product-information">
                        <h2>Название товара: <?php echo $product['name'];?></h2>
                        <h2>Страна производитель: <?php echo $product['country'];?></h2>
                        <h2>Компания производитель: <?php echo $product['brand'];?></h2>
                        <span>
                            <span><?php echo $product['price'];?> Руб.</span>
                            <label>Количество:</label>
                            <input type="text">
                            <a href="#" data-id="<?php echo $product['productId']; ?>" 
                                class="btn btn-default cart"><i class="fa fa-shopping-cart"></i> В корзину </a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10">
                    <h5>Описание товара:</h5>
                    <?php echo $product['description'];?>
                </div>
            </div>

        </div>
    </div>
</section>
<?php  include root . '/views/general/footer.php';?>