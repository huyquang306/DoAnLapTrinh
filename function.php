<?php
    //require My SQL connection
    require('Database/db-controller.php');

    //require Fetch Product Class
    require('Database/class.php');

    /*function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('$ %.2f',$sum);
        }
    }*/

    //DB connection object
    $db = new DBController();

    //Product Object
    $product = new Product($db);
    $product_shuffle = $product->getData();
    $user_shuffle = $product->getData('users');
    $cart_shuffle = $product->getData('cart');
    
    //Cart Object
    $cart = new Cart($db);

    