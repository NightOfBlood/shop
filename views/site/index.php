
<?php include root . '/views/general/header.php';?>

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
        
     
        <div class="col-sm-9 padding-right">
            <div class="features_items">
                <h2 class="title text-center">Новинки</h2>
                <?php foreach($lastItems as $item):?>
                
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                
                            <a href="/product/<?php echo $item['id'];?>"><img style="width:270px; height:250px"
                             src="<?php echo Product::getImage($item['id']);?>"/>
                                <h2><?php echo $item['price'];?> Руб. </h2>
                                <a href="/product/<?php echo $item['id'];?>">
                                    <?php echo $item['name'];?>
                                </a>
                                <br>
                                <a href="#" class="btn btn-default add-to-cart cart" data-id="<?php echo $item["id"];?>">
                                    <i class="fa fa-shopping-cart"></i>В корзину
                                </a>
                            </div>
                        </div>   
                    </div>
                </div>
            
        <?php endforeach;?>
            </div>


            <div class="recommended_items ">
                <h2 class="title text-center">Рекомендуемые товары</h2>
                <?php foreach($sliderProducts as $sliderItem):?>
                    
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                         <a href="/product/<?php echo $sliderItem['id'];?>"><img style="width:270px; height:250px"
                                          src="<?php echo Product::getImage($sliderItem['id']);?>"/>
                                        <h2><?php echo $sliderItem['price'];?> Руб. </h2>
                                        <a href="/product/<?php echo $sliderItem['id'];?>">
                                            <?php echo $sliderItem['name'];?>
                                        </a>
                                        <br>
                                        <a href="#" class="btn btn-default add-to-cart cart" data-id="<?php echo $sliderItem["id"];?>">
                                            <i class="fa fa-shopping-cart"></i>В корзину
                                        </a>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    
                <?php endforeach;?>
        </div>
        </div>
        </div>
    </div>
</section>

<?php include root . '/views/general/footer.php';?>