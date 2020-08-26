<?php  include root . '/views/general/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
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
            <div class="col-sm-9">
                 <h2>Товары</h2>  
                 <div>
                    <?php foreach ($categoryProducts as $product):?>
                    <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="product-info text-center">
                                        <a href="/product/<?php echo $product['id'];?>"><img src="<?php echo Product::getImage($product['id']);?>"/></a>
                                        <h2><?php echo $product['price'];?></h2>
                                        <p><a href="/product/<?php echo $product['id'];?>"><?php echo $product['name'];?></a></p>
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