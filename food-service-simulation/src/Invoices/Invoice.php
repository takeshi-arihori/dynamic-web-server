<?php

namespace Invoices;

use FoodOrders\FoodOrder;

class Invoice
{
  private float $finalPrice;
  private string $orderTime;
  private int $estimatedTimeInMinutes;

  public function __construct(float $finalPrice, string $orderTime, int $estimatedTimeInMinutes)
  {
    $this->finalPrice = $finalPrice;
    $this->orderTime = $orderTime;
    $this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
  }

  public function getFinalPrice(): float
  {
    return $this->finalPrice;
  }

  public function getOrderTime(): string
  {
    return $this->orderTime;
  }

  public function getEstimatedTimeInMinutes(): int
  {
    return $this->estimatedTimeInMinutes;
  }

  public function printInvoice(): void
  {
    echo "-----------------------------------\n";
    echo "Date: " . $this->getOrderTime() . "\n";
    echo "Final Price: $" . $this->getFinalPrice() . "\n";
    echo "Estimated Time: " . $this->getEstimatedTimeInMinutes() . " minutes\n";
    echo "-----------------------------------\n";
  }
}
