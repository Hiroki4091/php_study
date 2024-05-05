<?php

require __DIR__ . '/../lib/functions.php';

$id = '1';
$data = fetchById($id);

$question = 'あああああ';

$answers = [
    'A' => 'あああ',
    'B' => 'いいい',
    'C' => 'ううう',
    'D' => 'えええ',
];

$correctAnswer = 'A';
$correctAnswerValue = $answers[$correctAnswer];
$explanation = '解説解説';

// ファイルを読み込む
include __DIR__ .'/../templete/question.tpl.php';