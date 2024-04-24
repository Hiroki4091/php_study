const choicesList = document.querySelectorAll('ol.choices li');

choicesList.forEach(li => li.addEventListener('click', checkClickedChoice));

// 正しい答え
const answers = {
    question1: 'A',
    question2: 'B',
    question3: 'C',
    question4: 'D',
};

function checkClickedChoice(event) {
    // クリックされた答えの要素(liタグ)
    const clickedAnwerElement = event.currentTarget;

    console.log(clickedAnwerElement.dataset.answer);

    // 選択した答え(A, B, C, D)
    const selectedChoice = clickedAnwerElement.dataset.answer;


    const questionId = 'question1';
    // 正しい答え(A, B, C, D)
    answer = answers[questionId];

    // メッセージを入れる変数を用意
    let message;

    // カラーコードを入れる変数を用意
    let answerColorCode;

    // 答えを判定
    if (selectedChoice == answer) {
        // 答えが正しかった
        message = '正解です！おめでとう';
        answerColorCode = '';
    } else {
        // 間違った答えだった時
        message = 'ざんねん！不正解です！'
        answerColorCode = 'red';
    }

    alert(message);

    // 間違った時だけ色が変わる
    document.querySelector('#answer').style.color = answerColorCode;

    // 答え全体を表示
    document.querySelector('#section-correct-answer').style.display = 'block';
}

