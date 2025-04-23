<?php
require_once 'utility.php';

// セッションを開始
session_start();

// 設定
define('ADMIN_MAIL', 'maki080806@icloud.com'); 
// ★ メールアドレスに変更すればその宛先に届く

// エラーメッセージ格納用配列
$errors = [];
$confirm = false;
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 確認ボタンが押された場合
    if (isset($_POST['confirm'])) {
        // 入力値の取得とサニタイズ
        $name = filter_input(INPUT_POST, 'お名前', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'お問い合わせ内容', FILTER_SANITIZE_STRING);

        // バリデーション
        if (empty($name)) {
            $errors['name'] = 'お名前を入力してください。';
        }
        if (empty($email)) {
            $errors['email'] = 'メールアドレスを入力してください。';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'メールアドレスの形式が正しくありません。';
        }
        if (empty($message)) {
            $errors['message'] = 'お問い合わせ内容を入力してください。';
        }

        // エラーがなければ確認画面へ
        if (empty($errors)) {
            // 入力値をセッションに保存
            $_SESSION['input'] = [
                'お名前' => $name,
                'Email' => $email,
                'お問い合わせ内容' => $message,
            ];
            $confirm = true;
        } else {
            // エラーがあった場合は入力フォームに戻るため、セッションにエラーを保存
            $_SESSION['errors'] = $errors;
            header('Location: contact_form.html'); // フォームページに戻る
            exit();
        }
    }
    // 送信ボタンが押された場合
    elseif (isset($_POST['send'])) {
        // セッションから入力値を取得
        if (isset($_SESSION['input'])) {
            $name = $_SESSION['input']['お名前'];
            $email = $_SESSION['input']['Email'];
            $message = $_SESSION['input']['お問い合わせ内容'];

            $mailData = [
                'name' => $name,
                'email' => $email,
                'message' => $message,
            ];
            if (sendMailtoAdmin($mailData)) {
                $success = true;
                // 送信完了後、セッションをクリア
                unset($_SESSION['input']);
                unset($_SESSION['errors']);
            } else {
                $errors['send'] = 'メールの送信に失敗しました。';
                $confirm = true; // エラー発生時も確認画面を再表示
            }
        } else {
            // セッションに情報がない場合は不正な遷移
            $errors['invalid_access'] = '不正なアクセスです。';
        }
    }
}

// エラーがセッションに存在する場合はフォームに渡す
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']); // 一度表示したらクリア
}

?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>maki kuroda - portfolio / <?php echo ($confirm) ? 'お問い合わせ - 確認' : (($success) ? 'お問い合わせ - 完了' : 'お問い合わせ'); ?></title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/common.css">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <!-- google-font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/mail.css">
</head>
<body>
    <div class="layout">
        <div class="nav">
            <nav>
                <h1 class="name"><a href="index.php">maki<br>kuroda</a></h1>
                <div class="list">
                    <ul class="nav-links">
                        <li><a href="profile.php">profile</a></li>
                        <li><a href="skills.php">skills</a></li>
                        <li><a href="products.php">products</a></li>
                        <li><a href="contact.php">contact</a></li>
                    </ul>
                </div>
            </nav>
            <div class="copyright">
            <p><small>&copy; 2025.3 <br>Maki Kuroda</small></p>
            </div>
        </div>
        
        <div id="formWrap">
        <h3>お問い合わせ</h3>

        <?php if ($success): ?>
            <p>送信ありがとうございました。内容を確認後、ご連絡いたします。</p>
            <p><a href="../../index.html">トップページへ戻る</a></p>
        <?php elseif ($confirm): ?>
            <p>以下の内容でよろしければ「送信する」ボタンを押してください。</p>
            <form method="post" action="mail.php">
                <div class="form-item">
                    <label>お名前</label>
                    <p><?php echo htmlspecialchars($_SESSION['input']['お名前'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <input type="hidden" name="send" value="send"> </div>
                <div class="form-item">
                    <label>メールアドレス</label>
                    <p><?php echo htmlspecialchars($_SESSION['input']['Email'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="form-item">
                    <label>お問い合わせ内容</label>
                    <p><?php echo nl2br(htmlspecialchars($_SESSION['input']['お問い合わせ内容'], ENT_QUOTES, 'UTF-8')); ?></p>
                </div>
                <div class="button-area">
                    <button type="submit">送信する</button>
                    <button type="button" onclick="history.back()">修正する</button>
                </div>
            </form>
        <?php else: ?>
            <p>お気軽にお問い合わせください。</p>
            <?php if (!empty($errors)): ?>
                <ul class="error-list">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form method="post" action="mail.php">
                <div class="form-item">
                    <label for="name">お名前必須</label>
                    <input type="text" id="name" name="お名前" placeholder="例：山田太郎" required value="<?php echo isset($_SESSION['input']['お名前']) ? htmlspecialchars($_SESSION['input']['お名前'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                </div>
                <div class="form-item">
                    <label for="email">メールアドレス　必須</label>
                    <input type="email" id="email" name="Email" placeholder="例：taro@example.com" required value="<?php echo isset($_SESSION['input']['Email']) ? htmlspecialchars($_SESSION['input']['Email'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                </div>
                <div class="form-item">
                    <label for="message">お問い合わせ内容</label>
                    <textarea id="message" name="お問い合わせ内容" rows="5"><?php echo isset($_SESSION['input']['お問い合わせ内容']) ? htmlspecialchars($_SESSION['input']['お問い合わせ内容'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                </div>
                <div class="button-area">
                    <input type="submit" name="confirm" value="確認">
                    <input type="reset" value="リセット">
                </div>
                <p class="note">
                <a href="../../index.html">前のページへ戻る</a>
                </p>
            </form>
        <?php endif; ?>
    </div>
        
    </div>
    <footer>
        <div class="sitemap">
            <ul>
                <li><a href="../index.php">top</a></li>
                <li><a href="profile.php">profile</a></li>
                <li><a href="skills.php">skills</a></li>
                <li><a href="products.php">products</a></li>
                <li><a href="contact.php">contact</a></li>
            </ul>
        </div>
        <div class="copyright2">
            <p><small>&copy; 2025.3 Maki Kuroda</small></p>
        </div>
    </footer>
    <script src="assets/script.js"></script>
</body>
</html>