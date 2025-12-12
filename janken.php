<?php
// PHPコードブロックの開始

// --- 定数の定義 ---
const HANDS = [
    0 => 'グー',
    1 => 'チョキ',
    2 => 'パー'
];

// --- 変数の初期化 ---
$result_message = ''; // 結果メッセージを格納する変数
$user_hand = null;    // ユーザーの手を格納する変数 (初期値: null)
$computer_hand = null; // コンピュータの手を格納する変数 (初期値: null)

// ユーザーの手がPOSTで送信された場合の処理
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_hand'])) {
    
    // ユーザーの手を取得し、数値型に変換
    $user_hand = (int)$_POST['user_hand'];
    
    // ユーザーの手が有効な範囲内か確認
    if (isset(HANDS[$user_hand])) {
        
        // --- 1. コンピュータの手をランダムに決定 ---
        // rand(0, 2) は 0, 1, 2 のいずれかをランダムに生成
        $computer_hand_key = rand(0, 2); 
        $computer_hand = $computer_hand_key;

        // --- 2. 勝敗判定ロジック ---
        // (ユーザーの手 - コンピュータの手 + 3) % 3 
        // 0: あいこ, 1: ユーザーの勝ち (e.g., グー(0) vs チョキ(1) -> (0 - 1 + 3) % 3 = 2 は間違い! ロジック修正)
        // 
        // 修正後のロジック:
        // 0: あいこ
        // 1: ユーザーの負け (例: ユーザー グー(0) vs コンピュータ パー(2) -> (0 - 2 + 3) % 3 = 1)
        // 2: ユーザーの勝ち (例: ユーザー グー(0) vs コンピュータ チョキ(1) -> (0 - 1 + 3) % 3 = 2)
        $diff = ($user_hand - $computer_hand_key + 3) % 3;

        switch ($diff) {
            case 0:
                $result_message = '引き分け（あいこ）です！';
                break;
            case 1:
                $result_message = 'あなたの負けです...';
                break;
            case 2:
                $result_message = '**あなたの勝ちです！おめでとうございます！**';
                break;
        }

        // 結果メッセージにユーザーとコンピュータの手を追加
        $result_message = "
            <p><strong>あなたの手:</strong> " . HANDS[$user_hand] . "</p>
            <p><strong>コンピュータの手:</strong> " . HANDS[$computer_hand_key] . "</p>
            <h3>{$result_message}</h3>
        ";

    } else {
        $result_message = '<p style="color: red;">無効な手が選択されました。</p>';
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PHPじゃんけんゲーム</title>
    <style>
        body { font-family: 'Arial', sans-serif; text-align: center; margin-top: 50px; }
        .container { width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        .janken-form button {
            padding: 15px 30px;
            margin: 10px;
            font-size: 18px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .janken-form button:nth-child(1) { background-color: #f44336; } /* グー */
        .janken-form button:nth-child(2) { background-color: #4CAF50; } /* チョキ */
        .janken-form button:nth-child(3) { background-color: #2196F3; } /* パー */
        .janken-form button:hover { opacity: 0.8; }
        .result { margin-top: 30px; padding: 15px; border: 2px solid #555; border-radius: 5px; background-color: #f9f9f9; }
        .result h3 { margin: 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>✊✌️✋ じゃんけんゲーム 🤖</h1>

        <?php if ($result_message): ?>
            <div class="result">
                <?= $result_message ?>
            </div>
            <hr>
        <?php endif; ?>

        <h2>あなたの手を選んでください</h2>

        <form method="POST" class="janken-form">
            <button type="submit" name="user_hand" value="0">グー (✊)</button>
            <button type="submit" name="user_hand" value="1">チョキ (✌️)</button>
            <button type="submit" name="user_hand" value="2">パー (✋)</button>
        </form>

        <hr>
        <p>※上記ボタンを押すと勝負が開始されます。</p>
    </div>
</body>
</html>
