<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 6 比較演算子と論理演算子</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 1.5rem;
            font-family: sans-serif;
            background: #f5f5f0;
            color: #1a1a18;
        }
        .section { margin-bottom: 1.5rem; }
        .section-title {
            font-size: 15px;
            font-weight: 500;
            margin-bottom: .6rem;
            padding-bottom: .4rem;
            border-bottom: 1.5px solid #c8c6bc;
        }
        .card {
            background: #f0efe9;
            border: 0.5px solid #d3d1c7;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: .75rem;
        }
        .card-title {
            font-size: 13px;
            font-weight: 500;
            margin-bottom: .4rem;
        }
        .card-body {
            font-size: 13px;
            color: #5a5a56;
            line-height: 1.7;
        }
        code {
            font-family: monospace;
            font-size: 12px;
            background: #e4e3dc;
            padding: 1px 5px;
            border-radius: 4px;
        }
        .code-block {
            font-family: monospace;
            font-size: 12px;
            background: #e4e3dc;
            border-radius: 8px;
            padding: .75rem;
            margin-top: .5rem;
            line-height: 1.7;
            white-space: pre;
            overflow-x: auto;
        }
        .rule-row {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-bottom: .5rem;
        }
        .bullet {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #888780;
            flex-shrink: 0;
            margin-top: 6px;
        }
        .choice-row {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #5a5a56;
            padding: 4px 0;
        }
        .choice-row.correct {
            color: #1a1a18;
            font-weight: 500;
        }
        .grid2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .75rem;
            margin-top: .75rem;
        }
        .inner-card {
            background: #faf9f6;
            border: 0.5px solid #d3d1c7;
            border-radius: 8px;
            padding: .75rem;
        }
        .inner-card-title {
            font-size: 12px;
            font-weight: 500;
            margin-bottom: .4rem;
        }
        .inner-card-body {
            font-size: 12px;
            color: #5a5a56;
            line-height: 1.7;
        }
        a {
            color: #185FA5;
            font-size: 13px;
            display: block;
            margin-bottom: .3rem;
        }
        .tag-strict {
            display: inline-block;
            background: #E6F1FB;
            color: #0C447C;
            font-size: 11px;
            font-weight: 500;
            border-radius: 4px;
            padding: 1px 7px;
            font-family: monospace;
        }
        .tag-loose {
            display: inline-block;
            background: #FAEEDA;
            color: #633806;
            font-size: 11px;
            font-weight: 500;
            border-radius: 4px;
            padding: 1px 7px;
            font-family: monospace;
        }
        .tag-true {
            display: inline-block;
            background: #EAF3DE;
            color: #3B6D11;
            font-size: 11px;
            font-weight: 500;
            border-radius: 4px;
            padding: 2px 8px;
        }
        .tag-false {
            display: inline-block;
            background: #FCEBEB;
            color: #A32D2D;
            font-size: 11px;
            font-weight: 500;
            border-radius: 4px;
            padding: 2px 8px;
        }
        .tag-warn {
            display: inline-block;
            background: #FAEEDA;
            color: #633806;
            font-size: 11px;
            font-weight: 500;
            border-radius: 4px;
            padding: 2px 8px;
        }
        /* PHP7/8トグル */
        .toggle-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: .75rem;
        }
        .ver-btn {
            font-size: 12px;
            font-weight: 500;
            padding: 4px 14px;
            border-radius: 6px;
            border: 0.5px solid #c8c6bc;
            background: transparent;
            color: #5a5a56;
            cursor: pointer;
            transition: all .15s;
        }
        .ver-btn.active {
            background: #E6F1FB;
            color: #185FA5;
            border-color: #378ADD;
        }
        .ver-panel { display: none; }
        .ver-panel.active { display: block; }
        .diff-row {
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: monospace;
            font-size: 12px;
            padding: 5px 0;
            border-bottom: 0.5px solid #d3d1c7;
            color: #5a5a56;
        }
        .diff-row:last-child { border-bottom: none; }
        .diff-expr { flex: 1; }
        .diff-note {
            font-size: 11px;
            color: #888780;
            margin-left: 8px;
        }
    </style>
</head>
<body>

<!-- 問題・解説 -->
<div class="section">
    <div class="section-title">📌 Chapter 6-1 — == による緩やかな比較</div>

    <div class="card">
        <div class="card-title">問題 (1) &lt;PHP 8&gt; — false になるものはどれ？</div>
        <div class="code-block">1. 0 == '0'
2. 0 == ''
3. 1 == true
4. 1 == 1.0</div>
        <div style="margin-top:.75rem">
            <div class="choice-row"><span>1.</span><code>0 == '0'</code><span style="margin-left:auto"><span class="tag-true">true</span></span></div>
            <div class="choice-row correct"><span>2.</span><code>0 == ''</code><span style="margin-left:auto"><span class="tag-false">false</span> ← 正解</span></div>
            <div class="choice-row"><span>3.</span><code>1 == true</code><span style="margin-left:auto"><span class="tag-true">true</span></span></div>
            <div class="choice-row"><span>4.</span><code>1 == 1.0</code><span style="margin-left:auto"><span class="tag-true">true</span></span></div>
        </div>
    </div>

    <div class="card">
        <div class="card-title">解説 — == と === の違い</div>
        <div class="grid2">
            <div class="inner-card">
                <div class="inner-card-title"><span class="tag-strict">===</span> 厳密な比較</div>
                <div class="inner-card-body">型と値の<strong>両方</strong>が一致しないと true にならない</div>
                <div class="code-block">1 === 1    // true
1 === '1'  // false（型が違う）
1 === 1.0  // false（型が違う）</div>
            </div>
            <div class="inner-card">
                <div class="inner-card-title"><span class="tag-loose">==</span> 緩やかな比較</div>
                <div class="inner-card-body">型を変換してから値を比較する。パターンが多く複雑</div>
                <div class="code-block">1 == '1'   // true（型変換）
1 == true  // true（型変換）
1 == 1.0   // true（値が同じ）</div>
            </div>
        </div>
        <div class="card-body" style="margin-top:.75rem">現場では <span class="tag-strict">===</span> を使うことを推奨。<code>==</code> はバグの原因になりやすい。</div>
    </div>

    <div class="card">
        <div class="card-title">各選択肢の解説</div>
        <div style="margin-bottom:.75rem">
            <div class="card-body" style="margin-bottom:.3rem"><code>0 == '0'</code> — <span class="tag-true">true</span></div>
            <div class="card-body">'0' は数値文字列なので int の 0 と同等とみなされる。数値同士の比較となり true。</div>
        </div>
        <div style="margin-bottom:.75rem;padding-top:.75rem;border-top:0.5px solid #d3d1c7">
            <div class="card-body" style="margin-bottom:.3rem"><code>0 == ''</code> — <span class="tag-false">false</span>（PHP 8）</div>
            <div class="card-body">PHP 8 から挙動が変わった。数値を文字列にキャストしてから比較するため <code>'0' === ''</code> となり false。</div>
        </div>
        <div style="margin-bottom:.75rem;padding-top:.75rem;border-top:0.5px solid #d3d1c7">
            <div class="card-body" style="margin-bottom:.3rem"><code>1 == true</code> — <span class="tag-true">true</span></div>
            <div class="card-body">int で 0 は false、それ以外はすべて true。よって 1 == true は true。</div>
        </div>
        <div style="padding-top:.75rem;border-top:0.5px solid #d3d1c7">
            <div class="card-body" style="margin-bottom:.3rem"><code>1 == 1.0</code> — <span class="tag-true">true</span> <span class="tag-warn">⚠ 誤判定に注意</span></div>
            <div class="card-body">値が同じなので true。ただし浮動小数点数の比較は誤判定が起きることがある：</div>
            <div class="code-block">1 == 0.999999999999999999999 // true（誤判定！）
0.1 + 0.2 == 0.3            // false（誤判定！）</div>
        </div>
    </div>
</div>

<!-- PHP7/8トグル -->
<div class="section">
    <div class="section-title">🔄 PHP 7 vs PHP 8 — 挙動の変化</div>
    <div class="card">
        <div class="card-body" style="margin-bottom:.75rem">PHP 8 から「数値文字列でない文字列と数値の比較」の挙動が変わりました。切り替えて確認してみましょう。</div>
        <div class="toggle-wrap">
            <button class="ver-btn active" id="btn7" onclick="switchVer('7')">PHP 7</button>
            <button class="ver-btn" id="btn8" onclick="switchVer('8')">PHP 8</button>
        </div>

        <div class="ver-panel active" id="panel7">
            <div class="card-body" style="margin-bottom:.5rem">文字列を無理やり数値にキャストしてから比較 → 意外な結果が多い</div>
            <div class="diff-row">
                <span class="diff-expr"><code>0 == ''</code></span>
                <span class="tag-true">true</span>
                <span class="diff-note">'' → 0 にキャスト</span>
            </div>
            <div class="diff-row">
                <span class="diff-expr"><code>0 == 'hello'</code></span>
                <span class="tag-true">true</span>
                <span class="diff-note">'hello' → 0 にキャスト</span>
            </div>
            <div class="diff-row">
                <span class="diff-expr"><code>5 == '5px'</code></span>
                <span class="tag-true">true</span>
                <span class="diff-note">'5px' → 5 にキャスト</span>
            </div>
            <div class="diff-row">
                <span class="diff-expr"><code>0 == '0'</code></span>
                <span class="tag-true">true</span>
                <span class="diff-note">'0' は数値文字列</span>
            </div>
        </div>

        <div class="ver-panel" id="panel8">
            <div class="card-body" style="margin-bottom:.5rem">数値を文字列にキャストしてから比較 → より直感的な結果になった</div>
            <div class="diff-row">
                <span class="diff-expr"><code>0 == ''</code></span>
                <span class="tag-false">false</span>
                <span class="diff-note">'0' === '' → false</span>
            </div>
            <div class="diff-row">
                <span class="diff-expr"><code>0 == 'hello'</code></span>
                <span class="tag-false">false</span>
                <span class="diff-note">'0' === 'hello' → false</span>
            </div>
            <div class="diff-row">
                <span class="diff-expr"><code>5 == '5px'</code></span>
                <span class="tag-false">false</span>
                <span class="diff-note">'5' === '5px' → false</span>
            </div>
            <div class="diff-row">
                <span class="diff-expr"><code>0 == '0'</code></span>
                <span class="tag-true">true</span>
                <span class="diff-note">'0' は数値文字列のまま</span>
            </div>
        </div>
    </div>
</div>

<!-- 現場Tips -->
<div class="section">
    <div class="section-title">💼 現場ならではの使い方</div>
    <div class="card">
        <div class="card-title">実例：フォーム入力「0」で起きるバグ</div>
        <div class="card-body" style="margin-bottom:.5rem">ユーザーが好きなゲームに「0」と入力したのに、エラーになってしまう：</div>
        <div class="code-block">// バグあり：'0' == false になってしまう
if (!$favorite_game) {
    show_error('好きなゲームを入力してください。');
}

// 修正後：文字数で判定する
if (strlen($favorite_game) === 0) {
    show_error('好きなゲームを入力してください。');
}</div>
        <div class="card-body" style="margin-top:.75rem"><code>!$favorite_game</code> は <code>$favorite_game == false</code> と同じ意味。<br>
        '0' は数値文字列なので false と等価になってしまいバグになる。<code>strlen() === 0</code> で厳密に判定するのが正解。</div>
    </div>
</div>

<!-- マニュアル -->
<div class="section">
    <div class="section-title">📖 PHPマニュアル</div>
    <div class="card">
        <a href="https://www.php.net/manual/ja/types.comparisons.php">PHP 型の比較表 — == による緩やかな比較</a>
        <a href="https://www.php.net/manual/ja/language.operators.comparison.php">比較演算子</a>
        <a href="https://www.php.net/manual/ja/migration80.incompatible.php">下位互換性のない変更点 — 文字列と数値の比較</a>
        <a href="https://www.php.net/manual/ja/language.types.numeric-strings.php">数値形式の文字列</a>
        <a href="https://www.php.net/manual/ja/language.types.php">型</a>
        <a href="https://www.php.net/manual/ja/language.types.float.php">浮動小数点数</a>
    </div>
</div>

<script>
function switchVer(v) {
    document.getElementById('btn7').classList.toggle('active', v === '7');
    document.getElementById('btn8').classList.toggle('active', v === '8');
    document.getElementById('panel7').classList.toggle('active', v === '7');
    document.getElementById('panel8').classList.toggle('active', v === '8');
}
</script>

</body>
</html>