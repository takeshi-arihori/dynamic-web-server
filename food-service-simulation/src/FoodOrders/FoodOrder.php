<?php

namespace FoodOrders;

use FoodItems\FoodItem;

class FoodOrder
{
  private array $items;
  private string $orderTime;

  public function __construct(array $items)
  {
    $this->items = $items;
    $this->orderTime = date("D M d, Y G:i");
  }

  public function getItems(): array
  {
    return $this->items;
  }

  public function getOrderTime(): string
  {
    return $this->orderTime;
  }
}
