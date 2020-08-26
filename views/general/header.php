<?php include_once root . '/models/user.php'; ?>

  <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Главная</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
       <!-- <link href="/template/css/font-awesome.min.css" rel="stylesheet">-->
        <link href="/template/css/prettyPhoto.css" rel="stylesheet">
        <link href="/template/css/price-range.css" rel="stylesheet">
        <link href="/template/css/animate.css" rel="stylesheet">
        <link href="/template/css/main.css" rel="stylesheet">
        <link href="/template/css/responsive.css" rel="stylesheet"> 
        <link rel="shortcut icon" href="/template/images/ico/favicon.ico">
        <link rel="shortcut icon" href="/image/imagesite.png" type="image/png">
        <script src="/template/js/script.js" defer></script>
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            

            <div class="header-middle"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="logo pull-left">
                                <a href="/"> <img src="/image/logo.png" width="240px" height="100px"></a>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="mainmenu justify-content-center ">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item"><a href="/">Главная</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/category/">Товары</a></li>                                 
                                    <li class="nav-item"><a class="nav-link" href="/about/">О магазине</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/contacts/">Контакты</a></li>                                                      
                                    <li class="nav-item">
                                    <a class="nav-link" href="/cart"><i class="fa fa-shopping-cart"></i> Корзина 
                                    (<span id="cart-count"><?php echo Cart::countItems();?></span>)</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="/account/" ><i class="fa fa-user"></i> Аккаунт</a></li>
                                    <li class="nav-link"><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!--
            <div class="header-button">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="navbar header pull-right">
                                <form >
                                    <div class="form-row"> 
                                        <div class="col-md-10">
                                            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
                                        </div>

                                        <div class="col-md-2">
                                            <button class="btn btn-success" type="submit">Search</button>
                                        </div>  
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
-->
        </header>


        