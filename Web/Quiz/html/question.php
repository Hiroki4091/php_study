<?php

require __DIR__ . '/../lib/functions.php';

$id = '3';
$data = fetchById($id)[0];

$formattedData = generateFormattedData($data);

$question = $formattedData['question'];

$answers = $formattedData['answers'];

$correctAnswer = $formattedData['correctAnswer'];
$correctAnswerValue = $answers[$correctAnswer];
$explanation = $formattedData['explanation'];
// ファイルを読み込む
include __DIR__ .'/../templete/question.tpl.php';