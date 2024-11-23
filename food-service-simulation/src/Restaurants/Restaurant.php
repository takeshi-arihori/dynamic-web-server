<?php

namespace Restaurants;

use FoodItems\FoodItem;
use Persons\Employee;
use Invoices\Invoice;
use FoodOrders\FoodOrder;
use Persons\Employees\Cashier;
use Persons\Employees\Chef;

class Restaurant
{
  private array $menu;
  private array $employees;

  public function __construct(array $menu, array $employees)
  {
    $this->menu = $menu;
    $this->employees = $employees;
  }

  public function getMenu(): array
  {
    return $this->menu;
  }

  public function getEmployees(): array
  {
    return $this->employees;
  }

  public function order(array $categories): Invoice
  {
    $cashier = $this->getCashier();
    if ($cashier) {
      $foodOrder = $cashier->generateOrder($categories, $this);
      $chef = $this->getChef();
      if ($chef) {
        $chef->prepareFood($foodOrder);
      }
      return $cashier->generateInvoice($foodOrder);
    }
    throw new \Exception("No cashier available.");
  }

  private function getCashier(): ?Cashier
  {
    foreach ($this->employees as $employee) {
      if ($employee instanceof Cashier) {
        return $employee;
      }
    }
    return null;
  }

  private function getChef(): ?Chef
  {
    foreach ($this->employees as $employee) {
      if ($employee instanceof Chef) {
        return $employee;
      }
    }
    return null;
  }
}
