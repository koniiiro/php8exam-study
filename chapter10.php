<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Chapter 10 繰り返し構文 - 試験対策</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        h1 { color: #333; border-bottom: 2px solid #333; }
        h2 { color: #555; background: #f4f4f4; padding: 5px 10px; }
        pre { background: #272822; color: #f8f8f2; padding: 15px; border-radius: 5px; }
        .result { background: #e7f3ff; padding: 10px; border-left: 5px solid #2196F3; margin-bottom: 20px; }
        .point { background: #fff9db; padding: 15px; border: 1px solid #fcc419; border-radius: 5px; }
    </style>
</head>
<body>

    <h1>Chapter 10 繰り返し（ループ）構文</h1>

    <h2>1. while と do-while の決定的な違い</h2>
    <p>「最初に条件を見るか」「最後に条件を見るか」が分かれ目です。</p>
    <div class="result">
        <?php
        $i = 10;
        echo "<strong>do-whileの実行結果（条件が最初から false でも）:</strong><br>";
        do {
            echo "この数値は表示されます: " . $i; // 条件に関わらず1回目は実行
            $i--;
        } while ($i > 10); // ここで判定。10 > 10 は false なので終了
        ?>
    </div>

    <h2>2. foreach（配列の反復処理）</h2>
    <p><code>as $key => $val</code> の書き方は、連想配列やインデックスを意識する試験で必須です。</p>
    <div class="result">
        <?php
        $fruits = ['apple' => 'りんご', 'orange' => 'みかん', 'banana' => 'ばなな'];
        foreach ($fruits as $key => $val) {
            echo "キー(英語): {$key} / 値(日本語): {$val}<br>";
        }
        ?>
    </div>

    <h2>3. ループ内での条件分岐（試験頻出！）</h2>
    <p>「$i が 〇〇 のときだけ出力する」というパターンです。</p>
    <div class="result">
        <?php
        echo "1〜5の間で、2で割り切れる数（偶数）だけ出力:<br>";
        $i = 1;
        while ($i <= 5) {
            if ($i % 2 === 0) { // 2で割った余りが0か？
                echo $i . " "; 
            }
            $i++; // これを忘れると無限ループになるので注意！
        }
        ?>
    </div>

    <hr>
    <section class="point">
        <h2 style="color: #e67e22; margin-top: 0;">🎯 明日の試験のための最終チェック</h2>
        
        <div style="margin-bottom: 15px;">
            <strong>① 無限ループを回避する <code>set_time_limit()</code></strong>
            <p>PHPはデフォルトで「30秒」などの実行制限がありますが、<code>set_time_limit(0)</code> と書くと無制限になります。試験では「タイムアウトを設定できる関数はどれか？」という問われ方をすることがあります。</p>
        </div>

        <div style="margin-bottom: 15px;">
            <strong>② <code>do-while</code> は「後出しジャンケン」</strong>
            <p>どんなに条件が間違っていても、**最低1回は必ず実行される**のが <code>do-while</code> です。普通の <code>while</code> は、最初から条件が合わなければ1回も実行されません。</p>
        </div>

        <div style="margin-bottom: 15px;">
            <strong>③ <code>foreach</code> の <code>$key</code> と <code>$val</code></strong>
            <p><code>foreach ($arr as $k => $v)</code> の順番は絶対です。<code>as 値 => キー</code> と逆にしてひっかけてくる問題に注意しましょう。</p>
        </div>

        <div style="background-color: #fff; padding: 10px; border-left: 4px solid #fcc419;">
            <strong>✅ 最後に一言：</strong><br>
            ループ問題は、頭の中で <strong>「今の $i はいくつか？」「次の $i はいくつか？」</strong> と一歩ずつ追いかける（トレースする）のが正解への近道です。焦らずに！
        </div>
    </section>

</body>
</html>