<?php

$question = 'あああああ';
$id = '1';

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
include __DIR__ .'/../templete/question..tpl.php';