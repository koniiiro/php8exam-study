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

</body>
</html>