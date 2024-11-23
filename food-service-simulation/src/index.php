<?php

// オートローダーの設定
spl_autoload_extensions(".php");
spl_autoload_register(function ($class) {
  $base_dir = __DIR__ . '/';
  $file = $base_dir . str_replace('\\', '/', $class) . '.php';
  if (file_exists($file)) {
    require $file;
  }
});

use Persons\Employees\Chef;
use Persons\Employees\Cashier;
use Restaurants\Restaurant;
use Persons\Customer;
use FoodItems\CheeseBurger;
use FoodItems\Fettuccine;
use FoodItems\HawaiianPizza;
use FoodItems\Spaghetti;

// クラスのインスタンス化
$cheeseBurger = new CheeseBurger();
$fettuccine = new Fettuccine();
$hawaiianPizza = new HawaiianPizza();
$spaghetti = new Spaghetti();

$invah = new Chef("Invah Lozano", 40, "Osaka", 1, 30);
$nadia = new Cashier("Nadia Valentine", 21, "Tokyo", 1, 20);

$saizeriya = new Restaurant(
  [
    $cheeseBurger,
    $fettuccine,
    $hawaiianPizza,
    $spaghetti
  ],
  [
    $invah,
    $nadia
  ]
);

$interestedTastesMap = [
  "Margherita" => 1,
  "CheeseBurger" => 2,
  "Spaghetti" => 1
];

$tom = new Customer("Tom", 20, "Saitama", $interestedTastesMap);
$invoice = $tom->order($saizeriya);
$invoice->printInvoice();
