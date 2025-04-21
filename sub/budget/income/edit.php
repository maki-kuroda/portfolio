<?php require '../header.php'; ?>

<header>
    <h1>編集ページ</h1>
</header>

<article>
    <h2 id="listitem">
        現在の項目
    </h2>
    <div id="select_li">
        <table border="1">
            <thead>
                <tr>
                    <th>項目</th>
                    <th>金額</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><?= '登録した項目名' ?></th>
                    <th>
                        <input type="number" name="amount<?= '項目名のID番号' ?>" value="<?= '項目名のID番号' ?>">
                    </th>
                </tr>
                <tr>
                    <th><?= '登録した項目名' ?></th>
                    <th>
                        <input type="number" name="amount<?= '項目名のID番号' ?>" value="<?= '項目名のID番号' ?>">
                    </th>
                </tr>
            </tbody>
        </table>
        <p>
            <input type="submit" name="addition_btn" value="追加">
            <input type="submit" name="delete_btn" value="削除">
        </p>
    </div>
    <div id="addition">
        <form action="#">
            <label>
                <p>追加したい項目を入力してください。</p>
                <input type="text" name="addition_item" value="">
            </label>
            <p><input type="submit" name="addition_btn2" value="OK"></p>
        </form>
    </div>
    <div id="delete">
        <form action="#">
            <label>
                <p>削除したい項目を選択してください。</p>
                <input type="radio" name="delete_item" value="">
            </label>
            <p><input type="submit" name="delete_btn2" value="OK"></p>
        </form>
    </div>
</article>

<?php require '../footer.php'; ?>