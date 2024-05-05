<?php

require __DIR__ . '/../lib/functions.php';

$id = escape($_GET['id'] ?? '');
$data = fetchById($id)[0];

// !$dataがtrueだったらここでphpのスクリプトが終了する
if (!$data) {
    // HTTPレスポンスのヘッダを404にする
    header('HTTP/1.1 404 Not Found');

    // レスポンスの種類を指定する
    header('Content-Type: text/html; charset=UTF-8');

    include __DIR__ .'/../templete/404.tpl.php';
    exit(0);
}

$formattedData = generateFormattedData($data);

$assignData = [
    'id' => $formattedData['id'],
    'question' => $formattedData['question'],
    'answers' => $formattedData['answers'],
];

// ファイルを読み込む
loadTemplate('question', $assignData);