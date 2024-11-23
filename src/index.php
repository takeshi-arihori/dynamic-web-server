<?php

function findValue(array $data, string $key): mixed
{
    // ?? 演算子は左のパラメータを返し、それがない場合はnullを返します
    return $data[$key] ?? null;
}

// 使用例:
$data = ['name' => 'John', 'age' => 30];
echo findValue($data, 'name'); // Output: John
echo findValue($data, 'occupation'); // Output: (何もなし、'occupation'というキーは存在しないため)

function calculateDiscount(?string $subscriptionLevel): int
{
    $discounts = [
        'silver' => 10,
        'gold' => 20,
        'platinum' => 30,
    ];

    // maybe {type}
    // $discounts配列内にサブスクリプションレベルが存在するか確認します
    if ($subscriptionLevel !== null && isset($discounts[$subscriptionLevel])) {
        return $discounts[$subscriptionLevel];
    } else {
        // サブスクリプションレベルが認識されない場合はデフォルトの割引値を返します
        return 5;
    }
}
