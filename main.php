<?php
require_once("./Product.php");
require_once("./MarketStall.php");
require_once("./Cart.php");

$orange = new Product('orange', 35, true);
$potato = new Product('potato', 240, false);
$nuts = new Product('nuts', 850, true);
$kiwi = new Product('kiwi', 670, false);
$pepper = new Product('pepper', 330, true);
$raspberry = new Product('raspberry', 555, false);
$bananas = new Product('banana', 50, false);
$watermelon = new Product('watermelon', 150, true);
$avocado = new Product('avocado', 45, false);
$apple = new Product('apple', 25, true);


$stall1 = new MarketStall([$orange, $potato, $nuts]);
$stall2 = new MarketStall([$kiwi, $pepper, $raspberry]);
$stall3 = new MarketStall([$watermelon, $avocado, $apple]);
$stall2->addProductToMarket($bananas);


$cart = new Cart();
$cart->addToCart($stall1->getItem('orange', 3));
$cart->addToCart($stall1->getItem('potato', 5));
$cart->addToCart($stall1->getItem('nuts', 3));
$cart->addToCart($stall2->getItem('kiwi', 5));
$cart->addToCart($stall2->getItem('pepper', 3));
$cart->addToCart($stall1->getItem('nuts', 7));
$cart->addToCart($stall1->getItem('orange', 4));
$cart->addToCart($stall1->getItem('potato', 2));
$cart->addToCart($stall2->getItem('raspberry', 3));
$cart->addToCart($stall2->getItem('banana', 10));
$cart->addToCart($stall3->getItem('avocado', 3));
$cart->addToCart($stall3->getItem('watermelon', 11));
$cart->addToCart($stall3->getItem('apple', 8));

$cart->printReceipt();
