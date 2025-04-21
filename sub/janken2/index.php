<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's janken!</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>じゃんけんしよう</h1>
        <p>画像をクリックして手を選んでね</p>
    </header>

    <main>
      <form action="output.php" method="post">
        <p>じゃんけんの手を選んでね:</p>
          <button type="submit" name="player_hand" value="gu">
              <img src="images/janken_gu.png" alt="グー">
          </button>
          <button type="submit" name="player_hand" value="choki">
              <img src="images/janken_choki.png" alt="チョキ">
          </button>
          <button type="submit" name="player_hand" value="pa">
              <img src="images/janken_pa.png" alt="パー">
          </button>
      </form>
    </main>

    <a href="../../products.php">制作物のページに戻る</a>


    <footer>
        <p>&copy; 2025 じゃんけん</p>
    </footer>
</body>

</html>
