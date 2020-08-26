<?php  include root . '/views/general/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php 
                            foreach ($categories as $item):
                        ?>
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                            <a href="/category/<?php 
                                echo $item['id'];
                            ?>">
                                <?php 
                                    echo $item['name'];
                                ?>
                            </a>
                            </div>
                        </div>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">

                    <div class="features_items">
                        <h2 class="title text-center">Товары</h2>  
                        <?php foreach ($categoryProducts as $product):?>
                        <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                           
                                                <a href="/product/<?php echo $product['id'];?>"><img  style="width:250px; height:250px" src="<?php echo Product::getImage($product['id']);?>"/></a> 
                                                <h2><?php echo $product['price'];?> Руб.</h2>
                                                <p><a href="/product/<?php echo $product['id'];?>">
                                                <?php echo $product['name'];?> </a></p>
                                               
                                                <a href="#" data-id="<?php echo $product['id']; ?>" 
                                                class="btn btn-default cart"><i class="fa fa-shopping-cart"></i> В корзину </a>
                                           
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php endforeach; ?>
                    </div>         
            </div>
        </div>
    </div>
</section>
<?php include root . '/views/general/footer.php';?>
