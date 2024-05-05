<?php

function fetchById($id) {
    // ファイルを開く
    $handler = fopen(__DIR__.'/data.csv', 'r');

    // データを取得
    $question = [];
    while ($row = fgetcsv($handler)) {
        if (isDataRow($row)) {
            if ($row[0] === $id) {
                $question = $row;
                break;
            }
        }
    }
    
    // ファイルを閉じる
    fclose($handler);

    // データを返す
    return [$question];
}

/**
 * クイズの問題データの行か判定
 *
 * @param array $row csvファイルの1行分のデータ
 *
 * @return bool クイズのデータの場合はtrue/クイズのデータでなければfalse
 */
function isDataRow(array $row)
{
    // データの項目数が足りているか判定
    if (count($row) !== 8) {
        return false;
    }

    // データの項目の中身がすべて埋まっているか確認する
    foreach($row as $value) {
        // 項目の値が空か判定
        if (empty($value)) {
            return false;
        }
    }

    // idの項目が数字ではない場合は無視する
    if (!is_numeric($row[0])) {
        return false;
    }

    // 正しい答えはa,b,c,dのどれか
    $correctAnser = strtoupper($row[6]);
    $availableAnswers = ['A', 'B', 'C', 'D'];
    if (!in_array($correctAnser, $availableAnswers)) {
        return false;
    }

    // すべてチェックが問題なければtrue
    return true;

}