<?php

namespace Persons\Employees;

use Persons\Employee;
use FoodOrders\FoodOrder;

/**
 * ChefクラスはEmployeeクラスを拡張し、シェフの機能を提供します。
 * シェフはFoodOrderを受け取り、それに基づいて料理を準備します。
 */
class Chef extends Employee
{

  /**
   * コンストラクタはシェフの名前、年齢、住所、従業員ID、給与を設定します。
   *
   * @param string $name 名前
   * @param int $age 年齢
   * @param string $address 住所
   * @param int $employeeId 従業員ID
   * @param float $salary 給与
   */
  public function __construct(string $name, int $age, string $address, int $employeeId, float $salary)
  {
    parent::__construct($name, $age, $address, $employeeId, $salary);
  }

  /**
   * prepareFoodメソッドはFoodOrderを受け取り、その注文に基づいて料理を準備します。
   * 料理の準備状況を示す文字列を返します。
   *
   * @param FoodOrder $order 注文情報
   * @return string 料理の準備状況を示すメッセージ
   */
  public function prepareFood(FoodOrder $order): string
  {
    $preparationMessages = [];
    foreach ($order->getItems() as $item) {
      $preparationMessages[] = "The chef {$this->name} is cooking {$item->getName()}.";
    }
    // すべての料理の準備メッセージを結合して返す
    return implode("\n", $preparationMessages);
  }
}
