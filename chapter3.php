<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Chapter 3 データ型</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        h1 { color: #333; border-bottom: 2px solid #333; }
        h2 { color: #555; background: #f4f4f4; padding: 5px 10px; }
        pre { background: #272822; color: #f8f8f2; padding: 15px; border-radius: 5px; }
        .result { background: #e7f3ff; padding: 10px; border-left: 5px solid #2196F3; margin-bottom: 20px; }
        code { background: #eee; padding: 2px 5px; }
    </style>
</head>
<body>

    <h1>Chapter 3 データ型（整数リテラル）</h1>

    <h2>1. 10進数以外の書き方と実行結果</h2>
    <div class="result">
        <?php
        $decimal = 123;    // 10進数
        $octal   = 0123;   // 8進数（先頭に0）
        $binary  = 0b11;   // 2進数（先頭に0b）
        $hex     = 0x1A;   // 16進数（先頭に0x）

        echo "10進数の 123 は: " . $decimal . "<br>";
        echo "8進数の 0123 は: " . $octal . " （10進数に直すと83）<br>";
        echo "2進数の 0b11 は: " . $binary . " （10進数に直すと3）<br>";
        echo "16進数の 0x1A は: " . $hex . " （10進数に直すと26）";
        ?>
    </div>

    <h2>2. アンダースコア区切りの数値</h2>
    <p><code>1_234</code> と書いても、プログラム内部では <code>1234</code> として扱われます。</p>
    <div class="result">
        <?php
        $price = 1_234_567;
        echo "1_234_567 の表示結果: " . $price;
        ?>
    </div>

    <h2>3. 整数(int)か小数(float)かの判定</h2>
    <p><code>var_dump()</code> を使って、コンピュータが認識している「型」を確認します。</p>
    <div class="result">
        <pre><?php
            echo "123 の型: ";
            var_dump(123); 

            echo "\n123.0 の型: ";
            var_dump(123.0); 
        ?></pre>
        <p>※ 123.0 は値が整数と同じでも、<code>float</code>（浮動小数点数型）と判定されます。</p>
    </div>

<h2>PHP マニュアルへ </h2>
<p>今回の問題をより理解するために役立つPHP公式マニュアル</p>

<a href="https://www.php.net/manual/ja/language.types.integer.php">整数</a> <br>
<a href="https://www.php.net/manual/ja/language.types.integer.php#language.types.integer.overflow ">整数 > 整数のオーバーフロー</a> <br>
<a href="https://www.php.net/manual/ja/reserved.constants.php">定義済みの定数 > PHP_INT_MAX</a> <br>


<hr>
    <h1>Chapter 3-2 文字列リテラル</h1>

    <h2>問題 (1) の検証</h2>
    <p>次の出力を行うコードはどれか？<br>
    <code>太郎 さんへ</code><br>
    <code>Merry X'mas!</code></p>

    <div class="result">
        <?php
        $name = '太郎';

        echo "<h3>1. シングルクォートの場合</h3>";
        echo '<pre>';
        // シングルクォートは変数を展開せず、\nもそのまま表示される
        echo '$name さんへ \nMerry X\'mas!';
        echo '</pre>';

        echo "<h3>2. ダブルクォートの場合（正解）</h3>";
        echo '<pre>';
        // ダブルクォートは変数を展開し、\nで改行される
        echo "$name さんへ \nMerry X'mas!";
        echo '</pre>';
        ?>
    </div>

    <h2>解説：引用符の違いまとめ</h2>
    <table border="1" style="border-collapse: collapse; width: 100%; text-align: left;">
        <tr style="background: #eee;">
            <th>機能</th>
            <th>シングルクォート ( ' )</th>
            <th>ダブルクォート ( " )</th>
        </tr>
        <tr>
            <td>変数の展開 (例: $name)</td>
            <td>されない（文字として表示）</td>
            <td>される（中身が表示される）</td>
        </tr>
        <tr>
            <td>特殊文字 (例: \n)</td>
            <td>されない（文字として表示）</td>
            <td>される（改行などになる）</td>
        </tr>
        <tr>
            <td>エスケープが必要な文字</td>
            <td>\' と \\ </td>
            <td>\" と \\ と \$ </td>
        </tr>
    </table>

    <h2>変数の境界を明確にする書き方</h2>
    <div class="result">
        <?php
        $name = '太郎';
        
        echo "① スペースあり: $name さん<br>"; 
        // 変数の直後に文字が続く場合は {} で囲むのが安全
        echo "② 境界を明示: {$name}さん<br>"; 
        ?>
    </div>

    <h2>現場での使い分け（可読性の比較）</h2>
    <div class="result">
        <?php
        $year = 2026; $month = 3; $day = 16;
        
        echo "<strong>(1) 連結（.）を使った場合:</strong><br>";
        echo $year . '年' . $month . '月' . $day . '日<br><br>';

        echo "<strong>(2) ダブルクォート内で展開した場合:</strong><br>";
        echo "{$year}年{$month}月{$day}日";
        ?>
    </div>

    <p style="margin-top: 50px; font-size: 0.8em; color: #888;">
        ※ブラウザで「改行（\n）」を有効にするために、一部 <code>&lt;pre&gt;</code> タグを使用しています。
    </p>

    <h2>PHP マニュアルへ </h2>
<p>今回の問題をより理解するために役立つPHP公式マニュアル</p>

<a href="https://www.php.net/manual/ja/language.types.string.php#language.types.string.syntax.single">引用符</a> <br>
<a href="https://www.php.net/manual/ja/language.types.string.php#language.types.string.syntax.double">二重引用符</a> <br>

</p>

<hr>
    <section style="background-color: #fff9db; border: 2px solid #fcc419; padding: 20px; border-radius: 10px; margin-top: 30px;">
        <h2 style="color: #e67e22; margin-top: 0;">💡 学習のポイント</h2>
        
        <div style="margin-bottom: 15px;">
            <strong style="font-size: 1.1em; color: #d9480f;">1. 「そのまま」か「気を利かせる」か</strong>
            <ul style="margin-top: 5px;">
                <li><strong>シングルクォート（'）:</strong> 「書いたまま」を出す頑固者。<code>$name</code> も <code>\n</code> も文字として扱います。</li>
                <li><strong>ダブルクォート（"）:</strong> 変数の中身や改行を「解釈して」出すお調子者。</li>
            </ul>
        </div>

        <div＼ style="margin-bottom: 15px;">
            <strong style="font-size: 1.1em; color: #d9480f;">2. エスケープが必要な理由を理解する</strong>
            <p style="margin-top: 5px;">
                <code>'Merry X'mas!'</code> と書くと、<code>X</code> の直後の引用符で「文字列が終わった」とPHPが勘違いしてエラーになります。<br>
                <strong>「これは終わりの合図じゃないよ！」</strong>と伝えるために <code>＼'</code> とバックスラッシュを置くのがエスケープの本質です。
            </p>
        </div＼

        <div style="margin-bottom: 15px;">
            <strong style="font-size: 1.1em; color: #d9480f;">3. 変数の境界を明確にする <code>{ }</code></strong>
            <p style="margin-top: 5px;">
                特に日本語（全角文字）が続く場合、PHPはどこまでが変数名か分からず混乱することがあります。<br>
                実務や試験対策として、ダブルクォート内では <strong><code>"{$name}さん"</code></strong> のように波括弧で囲む癖をつけておくと安心です。
            </p>
        </div>

        <div style="background-color: #fff; padding: 10px; border-left: 4px solid #fcc419; font-size: 0.9em;">
            <strong>✅ 試験対策ワンポイント：</strong><br>
            問題文に <code>$name</code> や <code>＼n</code> が含まれていたら、まず <strong>「囲っているのは ' か " か」</strong> をチェックしましょう。それだけで選択肢を半分に絞れることが多いですよ！
        </div>
    </section>
</body>
</html>