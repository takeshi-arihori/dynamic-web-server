<?php

namespace FoodItems;

/**
 * ハワイアンピザの名称、説明、価格といった基本情報をカプセル化するクラス
 * （Pizza::getCategory()）や定数クラス変数（Pizza::CATEGORY）を通じて取得
 */
class HawaiianPizza extends FoodItem
{
  const CATEGORY = 'Pizza';

  public function __construct()
  {
    parent::__construct(
      'Hawaiian Pizza',
      'ハワイアンピザの説明',
      600
    );
  }

  public static function getCategory(): string
  {
    return self::CATEGORY;
  }
}
