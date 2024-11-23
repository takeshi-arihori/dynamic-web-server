<?php

namespace FoodItems;

/**
 * 各食品アイテムの名称、説明、価格といった基本情報をカプセル化する抽象クラス
 */
abstract class FoodItem
{
  protected string $name;
  protected string $description;
  protected float $price;

  public function __construct(string $name, string $description, float $price)
  {
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function getPrice(): float
  {
    return $this->price;
  }

  abstract public static function getCategory(): string;
}
