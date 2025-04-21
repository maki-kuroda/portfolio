<?php

global $player_hand;

// POSTデータが送信されているかチェック
if (!isset($_POST['player_hand']) || empty($_POST['player_hand'])) {
        die("エラー: じゃんけんの手が選択されていません。");
    }

// 送信された手を取得
$player_hand = $_POST['player_hand'];

// 手の名称
$hands = ['gu', 'choki', 'pa'];

// コンピュータの手をランダムに選択
   $computer_hand = $hands[array_rand($hands)];


// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     if (isset($_GET["player_hand"]) && !empty($_GET["player_hand"])) {
//         $player_hand = $_GET["player_hand"];
//         // player_handの値を処理するコード
//         echo "player_hand: " . $player_hand;
//     } else {
//         echo "不正な値が送信されました。";
//         echo var_dump($_GET);
//     }
// } else {
//     echo "フォームから送信してください。";
// }

// 勝敗判定
if ($player_hand === $computer_hand) {
        $result = "引き分け！";
    } elseif (
        ($player_hand === 'gu' && $computer_hand === 'choki') ||
        ($player_hand === 'choki' && $computer_hand === 'pa') ||
        ($player_hand === 'pa' && $computer_hand === 'gu')
    ) {
        $result = "あなたの勝ち！";
    } else {
        $result = "あなたの負け...";
    }
    ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>じゃんけん結果</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>じゃんけん結果</h1>
    </header>

    <main>
        <p>
          あなたの手: <img src="images/janken_<?php echo $player_hand; ?>.png" alt="<?php echo $player_hand; ?>">
        </p>
        <p>
          コンピュータの手: <img src="images/janken_<?php echo $computer_hand; ?>.png" alt="<?php echo $computer_hand; ?>">
        </p>
        <p>結果:
            <?php echo $result; ?>
        </p>
        <a href="index.php">もう一度遊ぶ</a>
    </main>

    <a href="../../products.php">制作物のページに戻る</a>


    <footer>
        <p>&copy; 2024 じゃんけんゲーム</p>
    </footer>
</body>

</html>
