<?php

namespace Persons\Employees;

use Persons\Employee;
use Restaurants\Restaurant;
use FoodOrders\FoodOrder;
use Invoices\Invoice;

class Cashier extends Employee
{
  public function generateOrder(array $categories, Restaurant $restaurant): FoodOrder
  {
    $items = [];
    foreach ($categories as $category) {
      foreach ($restaurant->getMenu() as $item) {
        if ($item::getCategory() === $category) {
          $items[] = $item;
        }
      }
    }
    return new FoodOrder($items);
  }

  public function generateInvoice(FoodOrder $order): Invoice
  {
    $finalPrice = 0;
    foreach ($order->getItems() as $item) {
      $finalPrice += $item->getPrice();
    }
    return new Invoice($finalPrice, $order->getOrderTime(), rand(10, 30));
  }
}
