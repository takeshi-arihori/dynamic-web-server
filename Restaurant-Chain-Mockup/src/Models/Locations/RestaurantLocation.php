<?php

namespace Models\Locations;

use Interfaces\FileConvertible;

class RestaurantLocation implements FileConvertible
{
  private string $name;
  private string $address;
  private string $city;
  private string $state;
  private string $zipCode;
  private array $employees; // array of Employee objects
  private bool $isOpen;
  private bool $hasDriveThru;

  public function __construct(
    string $name,
    string $address,
    string $city,
    string $state,
    string $zipCode,
    array $employees,
    bool $isOpen,
    bool $hasDriveThru
  ) {
    $this->name = $name;
    $this->address = $address;
    $this->city = $city;
    $this->state = $state;
    $this->zipCode = $zipCode;
    $this->employees = $employees;
    $this->isOpen = $isOpen;
    $this->hasDriveThru = $hasDriveThru;
  }

  public function addEmployee($employee)
  {
    $this->employees[] = $employee;
  }

  public function displayAllEmployees()
  {
    // Implement method to display all employees
  }

  public function toString(): string
  {
    return sprintf(
      "Name: %s\nAddress: %s\nCity: %s\nState: %s\nZip Code: %s\nIs Open: %s\nHas Drive Thru: %s\nEmployees: %s\n",
      $this->name,
      $this->address,
      $this->city,
      $this->state,
      $this->zipCode,
      $this->isOpen ? 'Yes' : 'No',
      $this->hasDriveThru ? 'Yes' : 'No',
      implode(", ", array_map(function ($employee) {
        return $employee->toString();
      }, $this->employees))
    );
  }

  public function toHTML(): string
  {
    return sprintf(
      "<ul>
            <li>Name: %s</li>
            <li>Address: %s</li>
            <li>City: %s</li>
            <li>State: %s</li>
            <li>Zip Code: %s</li>
            <li>Is Open: %s</li>
            <li>Has Drive Thru: %s</li>
            <li>Employees: %s</li>
            </ul>",
      $this->name,
      $this->address,
      $this->city,
      $this->state,
      $this->zipCode,
      $this->isOpen ? 'Yes' : 'No',
      $this->hasDriveThru ? 'Yes' : 'No',
      implode(", ", array_map(function ($employee) {
        return $employee->toHTML();
      }, $this->employees))
    );
  }

  public function toMarkdown(): string
  {
    return sprintf(
      "## Restaurant Location: %s
                 - Address: %s
                 - City: %s
                 - State: %s
                 - Zip Code: %s
                 - Is Open: %s
                 - Has Drive Thru: %s
                 - Employees: %s",
      $this->name,
      $this->address,
      $this->city,
      $this->state,
      $this->zipCode,
      $this->isOpen ? 'Yes' : 'No',
      $this->hasDriveThru ? 'Yes' : 'No',
      implode(", ", array_map(function ($employee) {
        return $employee->toMarkdown();
      }, $this->employees))
    );
  }

  public function toArray(): array
  {
    return [
      'name' => $this->name,
      'address' => $this->address,
      'city' => $this->city,
      'state' => $this->state,
      'zipCode' => $this->zipCode,
      'isOpen' => $this->isOpen,
      'hasDriveThru' => $this->hasDriveThru,
      'employees' => array_map(function ($employee) {
        return $employee->toArray();
      }, $this->employees)
    ];
  }
}
