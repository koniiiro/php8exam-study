<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 8 演算子の優先順位</title>
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
        .card-title { font-size: 13px; font-weight: 500; margin-bottom: .4rem; }
        .card-body  { font-size: 13px; color: #5a5a56; line-height: 1.7; }
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
            line-height: 1.8;
            white-space: pre;
            overflow-x: auto;
        }
        .choice-row { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #5a5a56; padding: 4px 0; }
        .choice-row.correct { color: #1a1a18; font-weight: 500; }
        .rule-row { display: flex; align-items: flex-start; gap: 8px; margin-bottom: .5rem; }
        .bullet { width: 6px; height: 6px; border-radius: 50%; background: #888780; flex-shrink: 0; margin-top: 6px; }
        a { color: #185FA5; font-size: 13px; display: block; margin-bottom: .3rem; }
        .tag-ans  { display: inline-block; background: #E6F1FB; color: #0C447C; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .tag-true { display: inline-block; background: #EAF3DE; color: #3B6D11; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .tag-false{ display: inline-block; background: #FCEBEB; color: #A32D2D; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .tag-warn { display: inline-block; background: #FAEEDA; color: #633806; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .tag-blue { display: inline-block; background: #E6F1FB; color: #0C447C; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .grid2 { display: grid; grid-template-columns: 1fr 1fr; gap: .75rem; margin-top: .75rem; }
        .inner-card { background: #faf9f6; border: 0.5px solid #d3d1c7; border-radius: 8px; padding: .75rem; }
        /* 優先順位テーブル */
        .prio-table { width: 100%; border-collapse: collapse; font-size: 12px; margin-top: .5rem; }
        .prio-table th { text-align: left; font-weight: 500; padding: 6px 10px; background: #e4e3dc; border-bottom: 1px solid #c8c6bc; }
        .prio-table td { padding: 6px 10px; border-bottom: 0.5px solid #d3d1c7; color: #5a5a56; }
        .prio-table tr:last-child td { border-bottom: none; }
        .prio-table tr.highlight td { background: #E6F1FB; color: #0C447C; }
        /* ステップ */
        .step-box { background: #faf9f6; border: 0.5px solid #d3d1c7; border-radius: 8px; padding: .6rem .9rem; margin-bottom: .5rem; transition: border-color .2s, background .2s; }
        .step-box.active { border: 2px solid #378ADD; background: #E6F1FB; }
        .step-num { display: inline-block; width: 20px; height: 20px; border-radius: 50%; background: #e4e3dc; font-size: 11px; font-weight: 500; color: #5a5a56; text-align: center; line-height: 20px; margin-right: 6px; }
        .step-box.active .step-num { background: #fff; color: #185FA5; }
        .step-expr { font-family: monospace; font-size: 13px; font-weight: 500; color: #1a1a18; }
        .step-desc { font-size: 12px; color: #5a5a56; margin-top: .3rem; padding-left: 26px; line-height: 1.6; }
        .step-box.active .step-desc { color: #0C447C; }
        .nav { display: flex; align-items: center; gap: 12px; margin-top: .75rem; }
        .nav button { font-size: 13px; padding: 6px 16px; border-radius: 8px; border: 0.5px solid #c8c6bc; background: transparent; color: #1a1a18; cursor: pointer; }
        .nav button:disabled { opacity: .35; cursor: default; }
        .nav button:not(:disabled):hover { background: #f0efe9; }
        .progress { font-size: 12px; color: #888780; margin-left: auto; }
        /* PHP7/8トグル */
        .toggle-wrap { display: flex; align-items: center; gap: 10px; margin-bottom: .75rem; }
        .ver-btn { font-size: 12px; font-weight: 500; padding: 4px 14px; border-radius: 6px; border: 0.5px solid #c8c6bc; background: transparent; color: #5a5a56; cursor: pointer; transition: all .15s; }
        .ver-btn.active { background: #E6F1FB; color: #185FA5; border-color: #378ADD; }
        .ver-panel { display: none; }
        .ver-panel.active { display: block; }
        /* トランプデモ */
        .intro-box { background: #f0efe9; border: 0.5px solid #d3d1c7; border-radius: 12px; padding: 1rem; margin-bottom: 1rem; }
        .intro-row { display: flex; align-items: flex-start; gap: 8px; margin-bottom: .4rem; font-size: 13px; color: #5a5a56; }
        .step-circle { width: 20px; height: 20px; border-radius: 50%; background: #e4e3dc; font-size: 11px; font-weight: 500; color: #5a5a56; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 1px; }
        .check-wrap { background: #f0efe9; border: 0.5px solid #d3d1c7; border-radius: 12px; padding: 1rem; margin-top: .75rem; }
        .suit-row { display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: .75rem; }
        .suit-btn { font-size: 13px; padding: 6px 14px; border-radius: 8px; border: 0.5px solid #c8c6bc; background: transparent; color: #5a5a56; cursor: pointer; transition: all .15s; }
        .suit-btn.active { background: #E6F1FB; color: #185FA5; border-color: #378ADD; }
        .num-disp { font-family: monospace; font-size: 28px; font-weight: 500; color: #1a1a18; margin: .3rem 0; }
        .proc-step { border: 0.5px solid #d3d1c7; border-radius: 8px; padding: .6rem .9rem; margin-bottom: .5rem; background: #faf9f6; transition: border-color .2s, background .2s; }
        .proc-step.pass { border-color: #639922; background: #EAF3DE; }
        .proc-step.fail { border-color: #E24B4A; background: #FCEBEB; }
        .proc-label { font-size: 11px; font-weight: 500; margin-bottom: .25rem; color: #888780; }
        .proc-step.pass .proc-label { color: #3B6D11; }
        .proc-step.fail .proc-label { color: #A32D2D; }
        .proc-expr { font-family: monospace; font-size: 12px; color: #1a1a18; white-space: pre; }
        .proc-result { font-size: 12px; margin-top: .25rem; color: #5a5a56; }
        .proc-step.pass .proc-result { color: #3B6D11; }
        .proc-step.fail .proc-result { color: #A32D2D; }
        .final-result { border-radius: 8px; padding: .75rem 1rem; margin-top: .75rem; font-size: 14px; font-weight: 500; text-align: center; transition: all .2s; }
        .final-result.ok { background: #EAF3DE; color: #3B6D11; border: 0.5px solid #639922; }
        .final-result.ng { background: #e4e3dc; color: #5a5a56; border: 0.5px solid #c8c6bc; }
    </style>
</head>
<body>

<!-- 問題 -->
<div class="section">
    <div class="section-title">📌 Chapter 8-1 — 演算子の優先順位</div>
    <div class="card">
        <div class="card-title">問題 (1) &lt;PHP 8&gt; — 実行結果はどれ？</div>
        <div class="code-block">$dogs = 14;
$cats = 9;
echo '合計: ' . $dogs + $cats;</div>
        <div style="margin-top:.75rem">
            <div class="choice-row">1. 合計: 149</div>
            <div class="choice-row">2. 9</div>
            <div class="choice-row">3. PHP Parse error: syntax error</div>
            <div class="choice-row correct">4. <span class="tag-ans">合計: 23</span> ← 正解（PHP 8）</div>
        </div>
    </div>
</div>

<!-- ステップ解説 -->
<div class="section">
    <div class="section-title">🔢 ステップで理解 — 処理の順番を追ってみよう</div>
    <div class="card">
        <div class="card-body" style="margin-bottom:.75rem">PHP 8 では <code>+</code>（算術演算子）が <code>.</code>（文字列結合）より先に計算されます。</div>
        <div id="steps-container"></div>
        <div class="nav">
            <button id="btn-prev" onclick="move(-1)" disabled>← 前へ</button>
            <button id="btn-next" onclick="move(1)">次へ →</button>
            <span class="progress" id="progress">1 / 3</span>
        </div>
    </div>
</div>

<!-- 優先順位表 -->
<div class="section">
    <div class="section-title">📊 演算子の優先順位（よく使うもの）</div>
    <div class="card">
        <div class="card-body" style="margin-bottom:.5rem">上にある演算子ほど先に計算されます。<code>.</code> と <code>+</code> の位置に注目！</div>
        <table class="prio-table">
            <tr><th>優先度</th><th>演算子</th><th>例</th></tr>
            <tr><td>高 1</td><td>型キャスト</td><td><code>(int)$value</code></td></tr>
            <tr><td>2</td><td>論理否定</td><td><code>!$value</code></td></tr>
            <tr><td>3</td><td><code>* / %</code> 乗除算</td><td><code>5 * 3</code></td></tr>
            <tr class="highlight"><td>4</td><td><code>+ -</code> 加減算 ★</td><td><code>14 + 9</code></td></tr>
            <tr class="highlight"><td>5</td><td><code>.</code> 文字列結合 ★</td><td><code>'合計: ' . $sum</code></td></tr>
            <tr><td>6</td><td><code>=== !== &lt; &gt;</code> 比較</td><td><code>$a === $b</code></td></tr>
            <tr><td>7</td><td><code>&amp;&amp;</code> 論理AND</td><td><code>$a &amp;&amp; $b</code></td></tr>
            <tr><td>低 8</td><td><code>||</code> 論理OR</td><td><code>$a || $b</code></td></tr>
        </table>
        <div class="card-body" style="margin-top:.6rem"><span class="tag-warn">★ ポイント</span> <code>+</code> は <code>.</code> より優先度が高い。これが今回の問題の核心。</div>
    </div>
</div>

<!-- PHP7/8トグル -->
<div class="section">
    <div class="section-title">🔄 PHP 7 vs PHP 8 — 挙動の変化</div>
    <div class="card">
        <div class="card-body" style="margin-bottom:.75rem">同じコードでもバージョンによって結果が変わります。</div>
        <div class="code-block">$dogs = 14;
$cats = 9;
echo '合計: ' . $dogs + $cats;</div>
        <div class="toggle-wrap" style="margin-top:.75rem">
            <button class="ver-btn active" id="btn7" onclick="switchVer('7')">PHP 7</button>
            <button class="ver-btn" id="btn8" onclick="switchVer('8')">PHP 8</button>
        </div>
        <div class="ver-panel active" id="panel7">
            <div class="card-body" style="margin-bottom:.4rem"><code>.</code> が先に処理され、その後 <code>+</code> が計算される</div>
            <div class="code-block">// PHP 7 の解釈
echo ('合計: ' . $dogs) + $cats;
//   ('合計: 14')       + 9
//   0                  + 9   ← 文字列を数値変換すると0
// = 9</div>
            <div style="margin-top:.5rem"><span class="tag-false">出力: 9</span> <span style="font-size:12px;color:#888780;margin-left:6px">意図しない結果！</span></div>
        </div>
        <div class="ver-panel" id="panel8">
            <div class="card-body" style="margin-bottom:.4rem"><code>+</code> が先に処理され、その後 <code>.</code> で結合される</div>
            <div class="code-block">// PHP 8 の解釈
echo '合計: ' . ($dogs + $cats);
//              (14    + 9   )
//              23
// = '合計: 23'</div>
            <div style="margin-top:.5rem"><span class="tag-true">出力: 合計: 23</span> <span style="font-size:12px;color:#888780;margin-left:6px">直感的な結果！</span></div>
        </div>
    </div>
</div>

<!-- トランプデモ -->
<div class="section">
    <div class="section-title">🃏 実例 — トランプカード判定で処理順を確認</div>

    <div class="intro-box">
        <div style="font-size:13px;font-weight:500;margin-bottom:.6rem">このデモで学ぶこと</div>
        <div class="intro-row"><div class="step-circle">1</div><div>コードで「条件」はどうやって書くか</div></div>
        <div class="intro-row"><div class="step-circle">2</div><div>複数の条件が重なるとき、どの順番で判定されるか</div></div>
        <div class="intro-row"><div class="step-circle">3</div><div>演算子の優先順位が実際の動作にどう影響するか</div></div>
    </div>

    <div class="inner-card" style="margin-bottom:.75rem">
        <div style="font-size:13px;font-weight:500;margin-bottom:.5rem">目標：「黒色の数札」を判定するコード</div>
        <div class="card-body" style="margin-bottom:.5rem">以下の<strong>2つの条件が両方 true</strong> のとき「黒色の数札」と判定します。</div>
        <div style="display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:.6rem">
            <span class="tag-blue">条件A：スペード または クラブ</span>
            <span class="tag-blue">条件B：数字が 10 以下（11〜13は絵札）</span>
        </div>
        <div class="code-block">$suit   = 'spade'; // スート（スペード）
$number = '11';    // 数字

// (int)$number で文字列→整数に変換してから比較
$picture = (int)$number <= 10; // false（11は絵札）

if (($suit === 'spade' || $suit === 'club') && !$picture) {
    echo '黒色の数札です！';
}</div>
        <div class="card-body" style="margin-top:.6rem"><span class="tag-warn">優先順位のポイント</span> <code>===</code> → <code>||</code> → <code>&amp;&amp;</code> の順に処理される。カッコ <code>()</code> で明示すると安全。</div>
    </div>

    <div style="font-size:13px;font-weight:500;margin-bottom:.5rem">スートと数字を選んで判定してみよう</div>
    <div class="check-wrap">
        <div style="font-size:12px;color:#888780;margin-bottom:.4rem">スートを選ぶ</div>
        <div class="suit-row">
            <button class="suit-btn active" onclick="setSuit('spade',this)">♠ スペード</button>
            <button class="suit-btn" onclick="setSuit('club',this)">♣ クラブ</button>
            <button class="suit-btn" onclick="setSuit('heart',this)">♥ ハート</button>
            <button class="suit-btn" onclick="setSuit('diamond',this)">♦ ダイヤ</button>
        </div>
        <div style="font-size:12px;color:#888780;margin-bottom:.3rem">数字を選ぶ（1〜13）</div>
        <input type="range" min="1" max="13" value="11" id="card-num" oninput="updateCard()" style="width:100%">
        <div class="num-disp" id="num-disp">11</div>

        <div style="font-size:12px;font-weight:500;color:#888780;margin-bottom:.4rem;margin-top:.5rem">処理の順番（コードが動く様子）</div>

        <div class="proc-step" id="proc1">
            <div class="proc-label">ステップ 1：型変換 (int)$number</div>
            <div class="proc-expr" id="proc1-expr"></div>
            <div class="proc-result" id="proc1-result"></div>
        </div>
        <div class="proc-step" id="proc2">
            <div class="proc-label">ステップ 2：条件A — スートが黒色か？（=== と || の判定）</div>
            <div class="proc-expr" id="proc2-expr"></div>
            <div class="proc-result" id="proc2-result"></div>
        </div>
        <div class="proc-step" id="proc3">
            <div class="proc-label">ステップ 3：条件B — 数字が10以下か？（!$picture）</div>
            <div class="proc-expr" id="proc3-expr"></div>
            <div class="proc-result" id="proc3-result"></div>
        </div>
        <div class="proc-step" id="proc4">
            <div class="proc-label">ステップ 4：両方の条件を &amp;&amp; で結合</div>
            <div class="proc-expr" id="proc4-expr"></div>
            <div class="proc-result" id="proc4-result"></div>
        </div>

        <div class="final-result ng" id="final-result">－</div>
    </div>
</div>

<!-- 現場Tips -->
<div class="section">
    <div class="section-title">💼 現場ならではの使い方</div>
    <div class="card">
        <div class="card-title">バグを防ぐ2つの方法</div>
        <div class="grid2">
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.4rem">方法1：カッコで明示する</div>
                <div class="card-body" style="margin-bottom:.4rem">誰が読んでも処理順が一目でわかる</div>
                <div class="code-block">echo '合計: '
  . ($dogs + $cats);</div>
            </div>
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.4rem">方法2：先に計算しておく</div>
                <div class="card-body" style="margin-bottom:.4rem">コードの意味が読み取りやすくなる</div>
                <div class="code-block">$sum = $dogs + $cats;
echo '合計: ' . $sum;</div>
            </div>
        </div>
    </div>
</div>

<!-- マニュアル -->
<div class="section">
    <div class="section-title">📖 PHPマニュアル</div>
    <div class="card">
        <a href="https://www.php.net/manual/ja/language.operators.precedence.php">演算子の優先順位 — php.net</a>
        <a href="https://www.php.net/manual/ja/migration80.incompatible.php">PHP 7.4.x から PHP 8.0.x への移行 — 下位互換性のない変更点</a>
    </div>
</div>

<script>
    var cur = 0;
    var steps = [
        {
            expr: '$dogs = 14, $cats = 9',
            desc: '変数に値を代入。dogs = 14、cats = 9 からスタート。'
        },
        {
            expr: '14 + 9 → 23',
            desc: 'PHP 8 では + が . より優先度が高いので、まず足し算が実行される。'
        },
        {
            expr: "'合計: ' . 23 → '合計: 23'",
            desc: "次に . で文字列を結合。'合計: ' と 23 がつながり '合計: 23' になる。"
        }
    ];

    function renderSteps() {
        var c = document.getElementById('steps-container');
        var html = '';
        for (var i = 0; i < steps.length; i++) {
            var s = steps[i];
            html += '<div class="step-box ' + (i === cur ? 'active' : '') + '">'
                + '<div style="display:flex;align-items:center">'
                + '<span class="step-num">' + (i + 1) + '</span>'
                + '<span class="step-expr">' + s.expr + '</span>'
                + '</div>'
                + (i <= cur ? '<div class="step-desc">' + s.desc + '</div>' : '')
                + '</div>';
        }
        c.innerHTML = html;
        document.getElementById('progress').textContent = (cur + 1) + ' / ' + steps.length;
        document.getElementById('btn-prev').disabled = cur === 0;
        document.getElementById('btn-next').disabled = cur === steps.length - 1;
    }

    function move(d) { cur = Math.max(0, Math.min(steps.length - 1, cur + d)); renderSteps(); }
    renderSteps();

    function switchVer(v) {
        document.getElementById('btn7').classList.toggle('active', v === '7');
        document.getElementById('btn8').classList.toggle('active', v === '8');
        document.getElementById('panel7').classList.toggle('active', v === '7');
        document.getElementById('panel8').classList.toggle('active', v === '8');
    }

    var suit = 'spade';
    var numNames = { 11: 'J（ジャック）', 12: 'Q（クイーン）', 13: 'K（キング）' };

    function setSuit(s, btn) {
        suit = s;
        document.querySelectorAll('.suit-btn').forEach(function(b) { b.classList.remove('active'); });
        btn.classList.add('active');
        updateCard();
    }

    function setStep(id, pass, expr, result) {
        var el = document.getElementById(id);
        el.className = 'proc-step ' + (pass ? 'pass' : 'fail');
        document.getElementById(id + '-expr').textContent = expr;
        document.getElementById(id + '-result').textContent = result;
    }

    function updateCard() {
        var num = parseInt(document.getElementById('card-num').value);
        var label = numNames[num] ? num + ' ' + numNames[num] : String(num);
        document.getElementById('num-disp').textContent = label;

        var isPicture  = num > 10;
        var isBlack    = (suit === 'spade' || suit === 'club');
        var notPicture = !isPicture;
        var match      = isBlack && notPicture;

        setStep('proc1', true,
            '(int)"' + num + '" → ' + num,
            '文字列の "' + num + '" を整数の ' + num + ' に変換しました'
        );

        var s1 = suit + ' === spade → ' + (suit === 'spade');
        var s2 = suit + ' === club  → ' + (suit === 'club');
        setStep('proc2', isBlack,
            s1 + '\n' + s2 + '\n→ ' + (suit === 'spade') + ' || ' + (suit === 'club') + ' = ' + isBlack,
            isBlack ? '条件A：黒色のスートです（true）' : '条件A：黒色ではありません（false）→ ここで終了'
        );

        setStep('proc3', notPicture,
            num + ' <= 10 → $picture = ' + !isPicture + '\n!$picture = ' + notPicture,
            notPicture ? '条件B：数札です（true）' : '条件B：絵札です（false）→ ここで終了'
        );

        setStep('proc4', match,
            '条件A(' + isBlack + ') && 条件B(' + notPicture + ') → ' + match,
            match ? '両方 true → if の中を実行します' : '片方以上が false → if の中をスキップします'
        );

        var fr = document.getElementById('final-result');
        if (match) {
            fr.className = 'final-result ok';
            fr.textContent = '黒色の数札です！';
        } else {
            fr.className = 'final-result ng';
            var reason = !isBlack ? '黒色のスートではないため' : '絵札（J/Q/K）のため';
            fr.textContent = '条件を満たしません（' + reason + '）';
        }
    }

    updateCard();
</script>

</body>
</html>