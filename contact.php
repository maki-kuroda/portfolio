<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maki Kuroda | Portfolio</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/common.css">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <!-- google-font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- form setting -->
    <meta name="format-detection" content="telephone=no">
    <title>お問い合わせ</title>
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
            <p>お気軽にお問い合わせください。</p>
            <form method="post" action="mail.php">
                <div class="form-item">
                    <label for="name">お名前</label>
                    <input type="text" id="name" name="お名前" placeholder="例：山田太郎"
                    required value="<?php echo isset($_SESSION['input']['お名前']) ? htmlspecialchars($_SESSION['input']['お名前'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                </div>
                <div class="form-item">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="Email" placeholder="例：taro@example.com" required
                    value="<?php echo isset($_SESSION['input']['Email']) ? htmlspecialchars($_SESSION['input']['Email'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                </div>
                <div class="form-item">
                    <label for="message">お問い合わせ内容</label>
                    <textarea id="message" name="お問い合わせ内容" rows="5">
                    <?php echo isset($_SESSION['input']['お問い合わせ内容']) ? htmlspecialchars($_SESSION['input']['お問い合わせ内容'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                </div>

                <div class="pp">
                    <label>プライバシーポリシー</label>
                    <textarea>
　私、黒田真紀はお客様が安心してこのウェブサイトをご利用頂けるよう、個人情報保護に取り組んでいます。

1.個人情報の収集と利用
　私が収集するお客様の個人情報は、収集目的を明確にした上で、目的の範囲内に限ります。また、個人情報の利用は、その収集目的から逸脱しない範囲とします。

2.個人情報の管理
　個人情報の管理は、お客様にご承諾頂いた場合を除き第三者に対しデータを開示・提供することはしません。

3.準拠法等
　私が保有する個人情報に関して適用される法令、規範を遵守します。

4.個人情報保護管理体制および仕組みの継続的な改善
　私は、個人情報保護に関する管理の体制と仕組みについて継続的改善を実施します。

2025年04月　黒田真紀
                    </textarea>
                </div>
                <p class="notes">※面接の機会を頂き、ポートフォリオをご覧いただいている採用ご担当者様に関しては、この問い合わせフォームが正常に機能しているかの確認の為、テストとして送信していただいても構いません。<br>また、テスト送信の場合、こちらからの返信は致しませんのでご了承ください。</p>
                <div class="button-area">
                    <input type="submit" name="confirm" value="確認">
                    <input type="reset" value="リセット">
                </div>
            </form>
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

