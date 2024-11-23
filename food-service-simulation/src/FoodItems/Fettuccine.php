<?php

namespace FoodItems;

/**
 * フェットチーネの名称、説明、価格といった基本情報をカプセル化するクラス
 * （FoodItem::getCategory()）や定数クラス変数（FoodItem::CATEGORY）を通じて取得
 */
class Fettuccine extends FoodItem
{
  const CATEGORY = 'Fettuccine';

  public function __construct()
  {
    parent::__construct(
      'Fettuccine',
      'フェットチーネの説明',
      900
    );
  }

  public static function getCategory(): string
  {
    return self::CATEGORY;
  }
}
