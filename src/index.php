<?php

class Car
{
    private string $make;
    private string $model;
    private int $year;

    public function __construct(string $make, string $model, int $year)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    public function getMake(): string
    {
        return $this->make;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function calculateAge(): int
    {
        $currentYear = date('Y');
        return $this->getAge($currentYear);
    }

    public function getAge(int $currentYear): int
    {
        return $currentYear - $this->year;
    }
}


$car = new Car('Toyota', 'Camry', 2022);
echo "Car Details: " . $car->getMake() . " " . $car->getModel() . " (" . $car->getYear() . ")\n";
echo "Car Age: " . $car->calculateAge() . " years"; // Output: Car Age: 1 years
