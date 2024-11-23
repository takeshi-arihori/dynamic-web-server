<?php

interface Engine
{
    public function start(): string;
}

abstract class AbstractVehicle
{
    protected string $make;

    public function __construct(string $make)
    {
        $this->make = $make;
    }

    abstract public function drive(): string;
}

class Car extends AbstractVehicle implements Engine
{
    public function __construct(string $make)
    {
        parent::__construct($make);
    }

    public function drive(): string
    {
        return "Driving the car...";
    }

    public function start(): string
    {
        return "Starting the cars engine...";
    }
}

class Motorcycle extends AbstractVehicle implements Engine
{
    public function __construct(string $make)
    {
        parent::__construct($make);
    }

    public function drive(): string
    {
        return "Driving the motorcycle...";
    }

    public function start(): string
    {
        return "Starting the motorcycle's engine...";
    }
}


$car = new Car('Toyota');
$motorcycle = new Motorcycle('Harley');


echo $car->drive(); // Output: Driving the car...
echo '<br>';
echo $car->start(); // Output: Starting the car's engine...
echo '<br>';
echo '<br>';
echo $motorcycle->drive(); // Output: Driving the motorcycle...
echo '<br>';
echo $motorcycle->start(); // Output: Starting the motorcycle's engine...
echo '<br>';
