<?php

require __DIR__ . '/../lib/functions.php';

$id = $_POST['id'] ?? '';
$selectedChoice = $_POST['selectedChoice'] ?? '';

$data = fetchById($id)[0];

// !$dataがtrueだったらここでphpのスクリプトが終了する
if (!$data) {
    // HTTPレスポンスのヘッダを404にする
    header('HTTP/1.1 404 Not Found');

    // レスポンスの種類を指定する(jsonで返す)
    header('Content-Type: application/json; charset=UTF-8');

    
    $response = [
        'message' => '指定したidは見つからなかった',
    ];

echo json_encode($response);
    exit(0);
}

$formattedData = generateFormattedData($data);

$correctAnswer = $formattedData['correctAnswer'];
$correctAnswerValue = $formattedData['answers'][$correctAnswer];
$explanation = $formattedData['explanation'];

$result = $selectedChoice === $correctAnswer;

$response = [
    'result' => $result,
    'correctAnswer' => $correctAnswer,
    'correctAnswerValue' => $correctAnswerValue,
    'explanation' => $explanation,
];

// レスポンスの種類を指定する
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response);