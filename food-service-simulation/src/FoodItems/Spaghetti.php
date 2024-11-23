<?php

namespace FoodItems;

/**
 * スパゲッティの名称、説明、価格といった基本情報をカプセル化するクラス
 * （FoodItem::getCategory()）や定数クラス変数（FoodItem::CATEGORY）を通じて取得
 */
class Spaghetti extends FoodItem
{
  const CATEGORY = 'Spaghetti';

  public function __construct()
  {
    parent::__construct(
      'Spaghetti',
      'スパゲッティの説明',
      800
    );
  }

  public static function getCategory(): string
  {
    return self::CATEGORY;
  }
}
