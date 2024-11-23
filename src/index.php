<?php

interface Engine
{
    public function start(): string;
}

class GasolineEngine implements Engine
{
    public function start(): string
    {
        return "Starting the gasoline engine...";
    }
}

class ElectricEngine implements Engine
{
    public function start(): string
    {
        return "Starting the electric engine...";
    }
}

// ポリモーフィズム
// 異なるクラスのオブジェクトを共通の基底クラスのオブジェクトとして扱うことができます。これにより、コードの柔軟性が確保され、メソッドのオーバーライドが可能になります。
function startEngine(Engine $engine): string
{
    return $engine->start();
}

$gasolineEngine = new GasolineEngine();
$electricEngine = new ElectricEngine();

echo '<br>';
echo startEngine($gasolineEngine); // Output: Starting the gasoline engine...
echo '<br>';
echo '<br>';
echo startEngine($electricEngine); // Output: Starting the electric engine...