<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Chapter 4 配列</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        h1 { color: #333; border-bottom: 2px solid #333; }
        h2 { color: #555; background: #f4f4f4; padding: 5px 10px; }
        pre { background: #272822; color: #f8f8f2; padding: 15px; border-radius: 5px; overflow-x: auto; }
        .result { background: #e7f3ff; padding: 10px; border-left: 5px solid #2196F3; margin-bottom: 20px; }
        code { background: #eee; padding: 2px 5px; }
        .correct { color: #d9480f; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Chapter 4-1 配列（宣言と自動採番）</h1>

    <h2>問題 (1) 配列の宣言方法</h2>
    <p>配列の書き方として間違っているものはどれか？</p>
    <div class="result">
        <?php
        // 1. 従来の書き方
        $val1 = array(); 
        // 2. 短縮構文（現在の主流）
        $val2 = [0]; 
        // 3. 最後にカンマがあってもOK（編集に便利）
        $val3 = [1, 2, 3,]; 

        echo "1〜3はすべて正しいPHPの構文です。<br>";
        echo "4. <code>{ 'blue', 'green' }</code> はエラーになります（PHPでは中括弧は配列宣言に使えません）。";
        ?>
    </div>

    <h2>問題 (2) キーと値の自動設定（自動採番）</h2>
    <p>以下のコードを実行した際、配列の中身はどうなるか？</p>
    <pre>
$colors = [];
$colors[1] = 'blue';
$colors[] = 'green';</pre>

    <div class="result">
        <strong>実行結果：</strong>
        <pre><?php
            $colors = [];
            $colors[1] = 'blue';
            $colors[] = 'green'; // 自動で「最大値 + 1」が割り振られる
            print_r($colors);
        ?></pre>
        <p>正解：<span class="correct">2. [1] => blue, [2] => green</span></p>
    </div>

    <h2>解説：自動採番のルール</h2>
    <p>キーを省略したとき、PHPは以下のルールで番号を決めます。</p>
    <div class="result">
        <?php
        $sample = [];
        $sample[] = 'A';    // 最初に省略すると [0]
        $sample[10] = 'B';  // 指定すると [10]
        $sample[] = 'C';    // 次に省略すると [11] (最大値10 + 1)
        ?>
        <pre><?php print_r($sample); ?></pre>
    </div>

    <h2>現場での活用例：特定の意味を持つインデックス</h2>
    <p>学生番号のように、順序以外の意味を持たせる場合：</p>
    <div class="result">
        <?php
        $students = [];
        $students[102] = '山田 太郎';
        $students[105] = '川村 花子';

        echo "学生番号102番は: " . $students[102];
        ?>
        <pre><?php print_r($students); ?></pre>
    </div>

        <h2>PHP マニュアルへ </h2>
<p>今回の問題をより理解するために役立つPHP公式マニュアル</p>

<a href="https://www.php.net/manual/ja/language.types.array.php">配列</a> <br><br>

</p>


    <hr>
    <section style="background-color: #fff9db; border: 2px solid #fcc419; padding: 20px; border-radius: 10px; margin-top: 30px;">
        <h2 style="color: #e67e22; margin-top: 0;">💡 学習のポイント</h2>
        
        <div style="margin-bottom: 15px;">
            <strong style="font-size: 1.1em; color: #d9480f;">1. 配列は <code>[]</code> で書くのがモダン</strong>
            <p style="margin-top: 5px;">
                古いコードでは <code>array()</code> も見かけますが、最近の現場ではタイピングが楽で読みやすい <code>[]</code> が主流です。どちらが出ても「同じもの」だと判別できるようにしましょう。
            </p>
        </div>

        <div style="margin-bottom: 15px;">
            <strong style="font-size: 1.1em; color: #d9480f;">2. 「最大値 + 1」の法則</strong>
            <p style="margin-top: 5px;">
                PHPの配列は「空いている番号を詰める」のではなく、**「今ある一番大きい数字の次」**を使います。試験で「次は、何番になる？」と聞かれたら、今ある最大のキーを探しましょう。
            </p>
        </div>

        <div style="margin-bottom: 15px;">
            <strong style="font-size: 1.1em; color: #d9480f;">3. 最後のカンマ（Trailing Comma）</strong>
            <p style="margin-top: 5px;">
                <code>[1, 2, 3, ]</code> のように最後にカンマがあってもPHPは怒りません。これは、後から要素を追加したり、行を入れ替えたりするときに「カンマの消し忘れ・付け忘れ」によるエラーを防ぐための、エンジニアに優しい仕様です。
            </p>
        </div>

        <div style="background-color: #fff; padding: 10px; border-left: 4px solid #fcc419; font-size: 0.9em;">
            <strong>✅ 試験対策ワンポイント：</strong><br>
            配列のキーに <code>{}</code> を使うのは、JavaScriptなど他の言語と混同させようとする定番のひっかけ問題です。「PHPの配列は <code>[]</code> ！」と強く覚えておきましょう。
        </div>
    </section>

</body>
</html>