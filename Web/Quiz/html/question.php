<?php

require __DIR__ . '/../lib/functions.php';

$id = '3';
$data = fetchById($id)[0];

$question = nl2br($data[1]);

$answers = [
    'A' => $data[2],
    'B' => $data[3],
    'C' => $data[4],
    'D' => $data[5],
];

$correctAnswer = strtoupper($data[6]);
$correctAnswerValue = $answers[$correctAnswer];
$explanation = nl2br($data[7]);

// ファイルを読み込む
include __DIR__ .'/../templete/question.tpl.php';