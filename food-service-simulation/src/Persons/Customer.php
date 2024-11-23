<?php

namespace Persons;

use Restaurants\Restaurant;
use Invoices\Invoice;

class Customer extends Person
{
  private array $interestedTastesMap;

  public function __construct(string $name, int $age, string $address, array $interestedTastesMap)
  {
    parent::__construct($name, $age, $address);
    $this->interestedTastesMap = $interestedTastesMap;
  }

  public function interestedCategories(Restaurant $restaurant): array
  {
    $menu = $restaurant->getMenu();
    $categories = [];

    foreach ($menu as $item) {
      if (array_key_exists($item::getCategory(), $this->interestedTastesMap)) {
        $categories[] = $item::getCategory();
      }
    }

    return array_unique($categories);
  }

  public function order(Restaurant $restaurant): Invoice
  {
    $categories = $this->interestedCategories($restaurant);
    return $restaurant->order($categories);
  }
}
