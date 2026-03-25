<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Chapter 11 ループの制御 - 試験対策</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        h1 { color: #333; border-bottom: 2px solid #333; }
        h2 { color: #555; background: #f4f4f4; padding: 5px 10px; }
        pre { background: #272822; color: #f8f8f2; padding: 15px; border-radius: 5px; }
        .result { background: #e7f3ff; padding: 10px; border-left: 5px solid #2196F3; margin-bottom: 20px; }
        .point { background: #fff9db; padding: 15px; border: 1px solid #fcc419; border-radius: 5px; }
        code { background: #eee; padding: 2px 5px; color: #d63384; }
    </style>
</head>
<body>

    <h1>Chapter 11 ループの制御（break / continue）</h1>

    <h2>1. break：ループを完全に抜ける</h2>
    <p><code>$i === 3</code> になった瞬間に、ループそのものを終了します。</p>
    <div class="result">
        実行結果：
        <?php
        for ($i = 0; $i < 5; $i++) {
            if ($i === 3) break;
            echo $i . " "; 
        }
        ?>
        <br>（3以降は処理されません）
    </div>

    <h2>2. continue：今回の処理をスキップして次へ</h2>
    <p><code>$i === 3</code> のときだけ <code>echo</code> を飛ばして、次の <code>$i = 4</code> に進みます。</p>
    <div class="result">
        実行結果：
        <?php
        for ($i = 0; $i < 5; $i++) {
            if ($i === 3) continue;
            echo $i . " "; 
        }
        ?>
        <br>（3だけが飛ばされています）
    </div>

    <h2>3. break 2 / continue 2（多重ループの制御）</h2>
    <p>試験で最も狙われるポイントです。数字は「何階層分のループを操作するか」を表します。</p>
    
    <h3>break 2 の例（外側のループまで終了）</h3>
    <div class="result">
        <?php
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($j === 1) break 2;
                echo "i:{$i}, j:{$j} / ";
            }
        }
        ?>
        <br>（jが1になった瞬間、全てのループが止まるため 0,0 しか出ません）
    </div>

    <h3>continue 2 の例（外側のループの次の回へ）</h3>
    <div class="result">
        <?php
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($j === 1) continue 2;
                echo "i:{$i}, j:{$j} / ";
            }
        }
        ?>
        <br>（jが1になると、内側のループを捨てて、次の <code>$i</code> の処理へ飛びます）
    </div>

    <hr>
    <section class="point">
        <h2 style="color: #e67e22; margin-top: 0;">💡 学習のポイント：試験直前チェック</h2>
        
        

        <div style="margin-bottom: 15px;">
            <strong style="font-size: 1.1em; color: #d9480f;">1. 「脱走」か「ジャンプ」か</strong>
            <ul style="margin-top: 5px;">
                <li><strong>break:</strong> そのループを**「完全に終了」**して外へ出ます。</li>
                <li><strong>continue:</strong> 残りの処理を無視して**「次の回」**へ進みます。</li>
            </ul>
        </div>

        <div style="margin-bottom: 15px;">
            <strong style="font-size: 1.1em; color: #d9480f;">2. 数字の意味（階層数）</strong>
            <p style="margin-top: 5px;">
                <code>break 1</code> は通常の <code>break</code> と同じです。試験に出る <code>break 2</code> は、**「今いるループとその親ループ、合わせて2つ分を抜ける」**という意味になります。
            </p>
        </div>

        <div style="background-color: #fff; padding: 10px; border-left: 4px solid #fcc419; font-size: 0.9em;">
            <strong>✅ 試験対策ワンポイント：</strong><br>
            試験問題で多重ループの中に <code>continue 2</code> が出てきたら、**「その瞬間に、内側のループの残りは実行されず、外側のループのカウンタ（$i など）が 1 増える」**とノートの端に書いて追いかけるのがコツです！
        </div>
    </section>

</body>
</html>