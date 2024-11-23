<?php
// interface Engine
// {
//     public function start(): string;
// }

// class GasolineEngine implements Engine
// {
//     public function start(): string
//     {
//         return "Starting the gasoline engine...";
//     }
// }

// class ElectricEngine implements Engine
// {
//     public function start(): string
//     {
//         return "Starting the electric engine...";
//     }
// }

// abstract class Car
// {
//     protected string $make;
//     protected Engine $engine;

//     public function __construct(string $make, Engine $engine)
//     {
//         $this->make = $make;
//         $this->engine = $engine;
//     }

//     abstract public function drive(): string;

//     public function start(): string
//     {
//         return $this->engine->start();
//     }
// }

// class GasCar extends Car
// {
//     public function __construct(string $make)
//     {
//         parent::__construct($make, new GasolineEngine());
//     }

//     public function drive(): string
//     {
//         return "Driving the gas car...";
//     }
// }

// class ElectricCar extends Car
// {
//     public function __construct(string $make)
//     {
//         parent::__construct($make, new ElectricEngine());
//     }

//     public function drive(): string
//     {
//         return "Driving the electric car...";
//     }
// }

// $gasCar = new GasCar('Toyota');
// $electricCar = new ElectricCar('Tesla');

// echo $gasCar->drive(); // Output: Driving the gas car...
// echo $gasCar->start(); // Output: Starting the gasoline engine...

// echo $electricCar->drive(); // Output: Driving the electric car...
// echo $electricCar->start(); // Output: Starting the electric engine...