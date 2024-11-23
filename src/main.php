<?php

// require_once 'Interfaces/Engine.php';
// require_once 'Engines/GasolineEngine.php';
// require_once 'Engines/ElectricEngine.php';
// require_once 'Cars/Car.php';
// require_once 'Cars/GasCar.php';
// require_once 'Cars/ElectricCar.php';

spl_autoload_register(function ($name) {
    // __DIR__は、現在のファイルの絶対ディレクトリパスを取得します。
    $filepath = __DIR__ . "/" . str_replace('\\', '/', $name) . ".php";
    echo "\nRequiring...." . $name . " once ($filepath).\n" . '<br>';
    // バックスラッシュ(\)をフロントスラッシュ(/)に置き換えます。フロントスラッシュはLinuxのファイルパスで使用されます。
    require_once $filepath;
});


// spl_autoload_extensions(".php"); 
// spl_autoload_register();

$gasCar = new Cars\GasCar('Toyota');
$electricCar = new Cars\ElectricCar('Tesla');

echo $gasCar->drive(); // Output: Driving the gas car...
echo '<br>';
echo $gasCar->start(); // Output: Starting the gasoline engine...

echo '<br>';
echo '<br>';

echo $electricCar->drive(); // Output: Driving the electric car...
echo '<br>';
echo $electricCar->start(); // Output: Starting the electric engine...