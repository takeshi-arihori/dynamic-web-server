<?php
$planet = isset($_GET['planet']) ? $_GET['planet'] : 'Earth';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hello, World!</title>
</head>

<body>
    <h1>Hello, <?php echo htmlspecialchars($planet, ENT_QUOTES, 'UTF-8'); ?></h1>
    <p>This is a simple "Hello, <?php echo htmlspecialchars($planet, ENT_QUOTES, 'UTF-8'); ?>!" HTML page.</p>
    <?php
    // リクエストヘッダーを取得
    $headers = getallheaders();

    echo json_encode($headers);

    // // JSON形式で出力
    // header('Content-Type: application/json');
    // $filename = 'request_headers.json';
    // header(sprintf('Content-Disposition: attachment; filename="%s"', $filename));
    // echo json_encode($headers, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    // exit; // ここで終了してHTMLのフッターを出力しない
    ?>

    <footer>
        <p><?php echo sprintf("%s Rocks© Website %s. All rights reserved.", htmlspecialchars($planet, ENT_QUOTES, 'UTF-8'), date("Y")); ?></p>
    </footer>
</body>

</html>