<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register();

// Composerのオートローダーを読み込み
require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;
use Models\Companies\RestaurantChain;

// フォームデータの取得
$numEmployees = (int) $_POST['numEmployees'];
$salaryRange = explode('-', $_POST['salaryRange']);
$numLocations = (int) $_POST['numLocations'];
$zipRange = explode('-', $_POST['zipRange']);
$format = $_POST['fileType'];

// バリデーション
if (count($salaryRange) !== 2 || count($zipRange) !== 2) {
  die('Invalid salary range or zip range format.');
}

$salaryMin = (float) $salaryRange[0];
$salaryMax = (float) $salaryRange[1];
$zipMin = (int) $zipRange[0];
$zipMax = (int) $zipRange[1];

// ランダムなデータ生成
$restaurantChains = [];
for ($i = 0; $i < $numLocations; $i++) {
  $restaurantChain = RandomGenerator::restaurantChain();
  // カスタマイズされたデータを設定
  $restaurantChain->setEmployeeRange($numEmployees);
  $restaurantChain->setSalaryRange($salaryMin, $salaryMax);
  $restaurantChain->setZipRange($zipMin, $zipMax);
  $restaurantChains[] = $restaurantChain;
}

// ファイルの生成とダウンロード
if ($format === 'markdown') {
  header('Content-Type: text/markdown');
  header('Content-Disposition: attachment; filename="restaurant_chains.md"');
  foreach ($restaurantChains as $chain) {
    echo $chain->toMarkdown() . "\n\n";
  }
} elseif ($format === 'json') {
  header('Content-Type: application/json');
  header('Content-Disposition: attachment; filename="restaurant_chains.json"');
  $chainsArray = array_map(fn ($chain) => $chain->toArray(), $restaurantChains);
  echo json_encode($chainsArray);
} elseif ($format === 'txt') {
  header('Content-Type: text/plain');
  header('Content-Disposition: attachment; filename="restaurant_chains.txt"');
  foreach ($restaurantChains as $chain) {
    echo $chain->toString() . "\n\n";
  }
} else {
  // HTMLをデフォルトに
  header('Content-Type: text/html');
  header('Content-Disposition: attachment; filename="restaurant_chains.html"');
  foreach ($restaurantChains as $chain) {
    echo $chain->toHTML() . "<br><br>";
  }
}
