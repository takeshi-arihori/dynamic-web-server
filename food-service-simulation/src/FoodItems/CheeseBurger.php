<?php

namespace FoodItems;

/**
 * チーズバーガーの名称、説明、価格といった基本情報をカプセル化するクラス
 * （FoodItem::getCategory()）や定数クラス変数（FoodItem::CATEGORY）を通じて取得
 */
class CheeseBurger extends FoodItem
{
  const CATEGORY = 'Burger';

  public function __construct()
  {
    parent::__construct(
      'Cheese Burger',
      'チーズバーガーの説明',
      300
    );
  }

  public static function getCategory(): string
  {
    return self::CATEGORY;
  }
}
