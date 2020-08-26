<?php
 function getRoutes(){
     return array(
         'products' => 'product/list', 
         'product/([0-9]+)' => 'product/view/$1',
         'about' => 'about/index',
         '' => 'site/index',
         'category/([0-9]+)' => 'catalog/category/$1',
         'user/login'=>'user/login',
         'user/register'=>'user/register',
         'user/logout'=>'user/logout',
         'account'=>'account/index',
         'cart'=>'cart/index',
         'cart/add/([0-9]+)'=>'cart/add/$1',
         'contacts'=>'site/contact',
         'cart/delete/([0-9]+)'=>'cart/delete/$1',
         'cart/checkout'=>'cart/checkout',
         'admin'=>'admin/index',
         'admin/product'=>'admin/product',
         'admin/product/create'=>'admin/createProduct',
         'admin/product/delete/([0-9]+)'=>'admin/deleteProduct/$1',
         'admin/product/update/([0-9]+)'=>'admin/updateProduct/$1',
         'admin/category'=>'admin/category',
         'admin/category/create'=>'admin/createCategory',
         'admin/category/delete/([0-9]+)'=>'admin/deleteCategory/$1',
         'admin/category/update/([0-9]+)'=>'admin/updateCategory/$1',
         'admin/order/create'=>'admin/createOrder',
         'admin/order/delete/([0-9]+)'=>'admin/deleteOrder/$1',
         'admin/order/update/([0-9]+)'=>'admin/updateOrder/$1',
         'admin/order'=>'admin/order',
         'admin/order/views/([0-9]+)'=>'admin/viewOrder/$1',
         'category'=>'catalog/category/1'
     );
 }
?>