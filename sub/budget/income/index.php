<?php

require '../header.php';

?>

<header>
<h1>2025年 2月</h1>
</header>

<div class="grid-container">
    <article class="grid-item" id="income">
        <h2>収入</h2>
        <form id="incomeForm">
            <div class="grid-table">
                <a href="edit.php" onclick="window.open('edit.php','subwin','width=300,height=300');return false;">編集</a>  

                <label>
                    <div class="grid-header">
                        <?= $income ?>
                    </div>
                    <div class="grid-cell">
                        <input type="number" name="income1" id="income1" required> 円
                    </div>
                </label>

                <label>
                    <div class="grid-header">
                        <?= $income2 ?>
                    </div>
                    <div class="grid-cell">
                        <input type="number" name="income2" id="income2" required> 円
                    </div>
                </label>

                <label>
                    
                    <div class="grid-header grid-total">
                        計
                    </div>
                    <div class="grid-cell grid-total" id="incomeTotal">
                        <?= $total ?> 円
                    </div>
                </label>

            </div>
            <p><button type="button" onclick="calculateIncome()">計算</button></p>
        </form>
    </article>
</div>

<a href="../../products.php">制作物のページに戻る</a>

<?php

require '../footer.php';

?>