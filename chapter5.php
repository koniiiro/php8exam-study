<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 5 代数演算子</title>
    <style>
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
            margin-bottom: 0.6rem;
            padding-bottom: 0.4rem;
            border-bottom: 1.5px solid #c8c6bc;
        }
        .card {
            background: #ebebе5;
            border: 0.5px solid #d3d1c7;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            background: #f0efe9;
        }
        .card-title {
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 0.4rem;
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
            padding: 0.75rem;
            margin-top: 0.5rem;
            line-height: 1.7;
            white-space: pre;
            overflow-x: auto;
        }
        .grid2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            margin-top: 0.75rem;
        }
        .inner-card {
            background: #faf9f6;
            border: 0.5px solid #d3d1c7;
            border-radius: 8px;
            padding: 0.75rem;
        }
        .inner-card-title {
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 0.4rem;
        }
        .inner-card-body {
            font-size: 12px;
            color: #5a5a56;
            line-height: 1.7;
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
        .rule-row {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-bottom: 0.5rem;
        }
        .bullet {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #888780;
            flex-shrink: 0;
            margin-top: 6px;
        }
        a {
            color: #185FA5;
            font-size: 13px;
        }

        /* インタラクティブ解説 */
        .step-card {
            background: #f0efe9;
            border: 0.5px solid #d3d1c7;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            margin-bottom: 0.75rem;
            transition: border-color 0.2s, background 0.2s;
        }
        .step-card.active {
            border: 2px solid #378ADD;
            background: #E6F1FB;
        }
        .step-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 0.5rem;
        }
        .step-num {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #e4e3dc;
            border: 0.5px solid #c8c6bc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 500;
            color: #5a5a56;
            flex-shrink: 0;
        }
        .step-card.active .step-num {
            background: #fff;
            color: #185FA5;
            border-color: #378ADD;
        }
        .step-code {
            font-family: monospace;
            font-size: 13px;
            font-weight: 500;
            color: #1a1a18;
        }
        .step-body {
            font-size: 13px;
            color: #5a5a56;
            line-height: 1.7;
            margin-top: 0.4rem;
            padding-left: 36px;
        }
        .step-card.active .step-body { color: #0C447C; }
        .counter-box {
            display: inline-flex;
            align-items: center;
            background: #fff;
            border: 0.5px solid #c8c6bc;
            border-radius: 6px;
            padding: 1px 10px;
            font-family: monospace;
            font-size: 13px;
            font-weight: 500;
            color: #1a1a18;
            margin: 0 2px;
        }
        .output-badge {
            display: inline-flex;
            align-items: center;
            background: #EAF3DE;
            border-radius: 4px;
            padding: 1px 8px;
            font-size: 12px;
            font-weight: 500;
            color: #3B6D11;
            margin: 0 2px;
        }
        .nav {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
        .nav button {
            font-size: 13px;
            padding: 6px 16px;
            border-radius: 8px;
            border: 0.5px solid #c8c6bc;
            background: transparent;
            color: #1a1a18;
            cursor: pointer;
        }
        .nav button:disabled { opacity: 0.35; cursor: default; }
        .nav button:not(:disabled):hover { background: #f0efe9; }
        .progress {
            font-size: 12px;
            color: #888780;
            margin-left: auto;
        }
        .summary-box {
            background: #f0efe9;
            border: 0.5px solid #d3d1c7;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            margin-top: 0.5rem;
        }
        .key-rule {
            background: #e4e3dc;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-top: 0.75rem;
            font-size: 13px;
            color: #5a5a56;
            line-height: 1.9;
        }
        .tag-pre {
            display: inline-block;
            background: #E6F1FB;
            color: #0C447C;
            font-size: 11px;
            font-weight: 500;
            border-radius: 4px;
            padding: 1px 7px;
            font-family: monospace;
        }
        .tag-post {
            display: inline-block;
            background: #FAEEDA;
            color: #633806;
            font-size: 11px;
            font-weight: 500;
            border-radius: 4px;
            padding: 1px 7px;
            font-family: monospace;
        }
        .answer-block {
            font-family: monospace;
            font-size: 13px;
            background: #e4e3dc;
            border-radius: 8px;
            padding: 0.6rem 0.9rem;
            margin-top: 0.5rem;
            line-height: 1.9;
        }
    </style>
</head>
<body>

<div class="section">
    <div class="section-title">📌 Chapter 5-1 — 加算子と減算子</div>

    <div class="card">
        <div class="card-title">問題 (1)　— 出力結果の組み合わせ</div>
        <div class="code-block">$counter = 0;
$counter++;
echo $counter;   // (1)
echo $counter++; // (2)
echo $counter;   // (3)
echo ++$counter; // (4)</div>
        <div style="margin-top:0.75rem">
            <div class="choice-row">　(1) 1　(2) 1　(3) 2　(4) 3</div>
            <div class="choice-row">　(1) 1　(2) 2　(3) 2　(4) 2</div>
            <div class="choice-row correct">✓ (1) 1　(2) 1　(3) 2　(4) 3　← 正解</div>
            <div class="choice-row">　(1) 1　(2) 2　(3) 3　(4) 4</div>
        </div>
    </div>

    <div class="card">
        <div class="card-title">解説 — 前置 vs 後置の違い</div>
        <div class="card-body">鍵は <code>++$a</code>（前置）と <code>$a++</code>（後置）の返り値の違いです。</div>
        <div class="grid2">
            <div class="inner-card">
                <div class="inner-card-title">前置加算子 <code>++$a</code></div>
                <div class="inner-card-body">インクリメントしてから値を返す</div>
                <div class="code-block">$a = 0;
echo ++$a; // 1
echo $a;   // 1</div>
            </div>
            <div class="inner-card">
                <div class="inner-card-title">後置加算子 <code>$a++</code></div>
                <div class="inner-card-body">値を返してからインクリメント</div>
                <div class="code-block">$b = 0;
echo $b++; // 0
echo $b;   // 1</div>
            </div>
        </div>
        <div class="card-body" style="margin-top:0.75rem">while ループでの違いに注意：</div>
        <div class="code-block">$i = 0;
while($i++ &lt; 10) { echo $i; }  // 出力: 12345678910

$i = 0;
while(++$i &lt; 10) { echo $i; }  // 出力: 123456789</div>
    </div>

    <div class="card">
        <div class="card-title">現場ならではの使い方</div>
        <div class="card-body" style="margin-bottom:0.5rem">インクリメントはよく使う機能の1つ。プログラマー同士のジョークにもなるほど定番です。</div>
        <div class="code-block">$my_age++;</div>
        <div style="margin-top:0.75rem">
            <div style="font-size:12px; font-weight:500; margin-bottom:0.4rem">よく使う場面</div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">for / while ループのステップを1つずつ進める</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">配列のインデックスを1ずつ増やして要素を処理する</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">イベントの発生回数を数えるカウンター</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">連番IDの最大値を1つ増やして新しいIDを作る</div></div>
        </div>
        <div style="margin-top:0.75rem">
            <div style="font-size:12px; font-weight:500; margin-bottom:0.4rem">注意点</div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">前置と後置の返り値の違いを意識する</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">文字列にも使えるが意図しない結果になる可能性がある</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">複雑な式の中に混ぜるとバグになりやすい</div></div>
        </div>
    </div>

    <div class="card">
        <div class="card-title">PHPマニュアル</div>
        <div class="card-body">より深く理解するための公式ドキュメントです。</div>
        <div style="margin-top:0.5rem">
            <a href="https://www.php.net/manual/ja/language.operators.increment.php">加算子 / 減算子 — php.net</a>
        </div>
    </div>

</div>

<!-- インタラクティブ解説 -->
<div class="section">
    <div class="section-title">🔍 ステップで理解する — 前置・後置インクリメント</div>

    <div id="steps-container"></div>

    <div class="nav">
        <button id="btn-prev" onclick="move(-1)" disabled>← 前へ</button>
        <button id="btn-next" onclick="move(1)">次へ →</button>
        <span class="progress" id="progress">1 / 6</span>
    </div>

    <div class="summary-box">
        <div class="card-title">まとめ — 前置 vs 後置の違い</div>
        <div class="key-rule">
            <span class="tag-pre">++$a</span> 前置：<strong>先にインクリメント</strong>してから値を返す<br>
            <span class="tag-post">$a++</span> 後置：<strong>先に値を返してから</strong>インクリメントする
        </div>
        <div style="margin-top:0.75rem; font-size:13px; color:#5a5a56">今回の問題の答え：</div>
        <div class="answer-block">
            (1) echo $counter;   → <span style="color:#3B6D11; font-weight:500">1</span><br>
            (2) echo $counter++; → <span style="color:#3B6D11; font-weight:500">1</span>（返してからインクリメント）<br>
            (3) echo $counter;   → <span style="color:#3B6D11; font-weight:500">2</span><br>
            (4) echo ++$counter; → <span style="color:#3B6D11; font-weight:500">3</span>（インクリメントしてから返す）
        </div>
    </div>
</div>

<script>
const steps = [
    {
        num: 1,
        code: "$counter = 0;",
        html: '<span class="counter-box">$counter = 0</span> に設定します。まずここからスタートです。'
    },
    {
        num: 2,
        code: "$counter++;",
        html: '後置加算子 <span class="tag-post">$counter++</span> で $counter を 1 増やします。<br>ここでは echo していないので画面には何も出ません。<br>→ <span class="counter-box">$counter = 1</span>'
    },
    {
        num: 3,
        code: "echo $counter; // (1)",
        html: '$counter の値をそのまま表示します。値は <span class="counter-box">1</span> なので<br>→ 出力: <span class="output-badge">1</span>　$counter はまだ <span class="counter-box">1</span>'
    },
    {
        num: 4,
        code: "echo $counter++; // (2) ← ここが重要！",
        html: '後置 <span class="tag-post">$counter++</span> は「先に値を返してからインクリメント」します。<br>1. まず現在の値 <span class="counter-box">1</span> を表示 → 出力: <span class="output-badge">1</span><br>2. その後で $counter を 1 増やす → <span class="counter-box">$counter = 2</span>'
    },
    {
        num: 5,
        code: "echo $counter; // (3)",
        html: '前のステップでインクリメントされたので、$counter は <span class="counter-box">2</span> になっています。<br>→ 出力: <span class="output-badge">2</span>　$counter はまだ <span class="counter-box">2</span>'
    },
    {
        num: 6,
        code: "echo ++$counter; // (4) ← ここも重要！",
        html: '前置 <span class="tag-pre">++$counter</span> は「先にインクリメントしてから値を返す」します。<br>1. まず $counter を 1 増やす → <span class="counter-box">$counter = 3</span><br>2. その値 <span class="counter-box">3</span> を表示 → 出力: <span class="output-badge">3</span>'
    }
];

let current = 0;

function render() {
    const container = document.getElementById('steps-container');
    container.innerHTML = steps.map(function(s, i) {
        return '<div class="step-card ' + (i === current ? 'active' : '') + '">'
            + '<div class="step-header">'
            + '<div class="step-num">' + s.num + '</div>'
            + '<div class="step-code">' + s.code + '</div>'
            + '</div>'
            + '<div class="step-body">' + (i <= current ? s.html : '？') + '</div>'
            + '</div>';
    }).join('');
    document.getElementById('progress').textContent = (current + 1) + ' / ' + steps.length;
    document.getElementById('btn-prev').disabled = current === 0;
    document.getElementById('btn-next').disabled = current === steps.length - 1;
}

function move(dir) {
    current = Math.max(0, Math.min(steps.length - 1, current + dir));
    render();
}

render();
</script>

</body>
</html>