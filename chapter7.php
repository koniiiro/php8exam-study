<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 7 ビットシフト演算子</title>
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
        a {
            color: #185FA5;
            font-size: 13px;
            display: block;
            margin-bottom: .3rem;
        }
        .tag-ans {
            display: inline-block;
            background: #E6F1FB;
            color: #0C447C;
            font-size: 11px;
            font-weight: 500;
            border-radius: 4px;
            padding: 2px 8px;
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
            text-align: center;
        }
        /* ビットボックス */
        .bit-row {
            display: flex;
            gap: 4px;
            align-items: flex-end;
            margin: 8px 0;
            flex-wrap: wrap;
        }
        .bit-cell {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }
        .bit-label {
            font-size: 10px;
            color: #888780;
            font-family: monospace;
        }
        .bit-box {
            width: 36px;
            height: 36px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: monospace;
            font-size: 16px;
            font-weight: 500;
            border: 0.5px solid #d3d1c7;
            transition: all .35s;
            background: #faf9f6;
            color: #1a1a18;
        }
        .bit-box.on  { background: #E6F1FB; color: #0C447C; border-color: #378ADD; }
        .bit-box.new { background: #EAF3DE; color: #3B6D11; border-color: #639922; }
        .bit-weight  { font-size: 10px; color: #888780; font-family: monospace; margin-top: 1px; }
        /* デモ */
        .demo-wrap {
            padding: 1rem;
            background: #faf9f6;
            border: 0.5px solid #d3d1c7;
            border-radius: 8px;
            margin-top: .5rem;
        }
        .demo-controls {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        .demo-controls label { font-size: 13px; color: #5a5a56; }
        .demo-controls input[type=number] {
            width: 60px;
            font-size: 13px;
            padding: 4px 8px;
            border: 0.5px solid #c8c6bc;
            border-radius: 6px;
            background: #f0efe9;
            color: #1a1a18;
            font-family: monospace;
        }
        .shift-btn {
            font-size: 12px;
            font-weight: 500;
            padding: 5px 14px;
            border-radius: 6px;
            border: 0.5px solid #c8c6bc;
            background: transparent;
            color: #1a1a18;
            cursor: pointer;
        }
        .shift-btn.active {
            background: #E6F1FB;
            color: #185FA5;
            border-color: #378ADD;
        }
        .result-line {
            font-size: 13px;
            color: #5a5a56;
            margin-top: .75rem;
            line-height: 1.9;
        }
        .result-num {
            font-size: 22px;
            font-weight: 500;
            color: #1a1a18;
            margin: 0 4px;
        }
        .step-explain {
            font-size: 12px;
            color: #5a5a56;
            background: #e4e3dc;
            border-radius: 6px;
            padding: .5rem .75rem;
            margin-top: .5rem;
            line-height: 1.7;
        }
        /* 使用場面 */
        .use-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .75rem;
            margin-top: .5rem;
        }
        .use-card {
            background: #faf9f6;
            border: 0.5px solid #d3d1c7;
            border-radius: 8px;
            padding: .75rem;
        }
        .use-title { font-size: 12px; font-weight: 500; margin-bottom: .25rem; }
        .use-body  { font-size: 12px; color: #5a5a56; line-height: 1.6; }
        /* 権限フラグ */
        .flag-row {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: .5rem;
            flex-wrap: wrap;
        }
        .flag-bit {
            width: 40px;
            height: 40px;
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: monospace;
            font-size: 15px;
            font-weight: 500;
            border: 0.5px solid #c8c6bc;
            background: #faf9f6;
            color: #5a5a56;
            cursor: pointer;
            transition: all .2s;
            user-select: none;
        }
        .flag-bit.on { background: #E6F1FB; color: #0C447C; border-color: #378ADD; }
        .flag-bit-label { font-size: 9px; color: #888780; margin-top: 1px; }
        .perm-label {
            font-size: 11px;
            padding: 2px 7px;
            border-radius: 4px;
            border: 0.5px solid #d3d1c7;
            color: #5a5a56;
            background: #f0efe9;
        }
        .perm-label.on { background: #EAF3DE; color: #3B6D11; border-color: #639922; }
    </style>
</head>
<body>

<!-- 問題 -->
<div class="section">
    <div class="section-title">📌 Chapter 7-1 — ビットシフト演算子</div>
    <div class="card">
        <div class="card-title">問題 (1) — 実行結果はどれ？</div>
        <div class="code-block">10 << 1</div>
        <div style="margin-top:.75rem">
            <div class="choice-row correct">1. <span class="tag-ans">20</span> ← 正解</div>
            <div class="choice-row">2. 10</div>
            <div class="choice-row">3. 5</div>
            <div class="choice-row">4. 1</div>
        </div>
    </div>
</div>

<!-- 2進数の説明 -->
<div class="section">
    <div class="section-title">📖 まず「2進数」を理解しよう</div>
    <div class="card">
        <div class="card-title">10進数 vs 2進数 — 桁の意味が違うだけ</div>
        <div class="card-body">私たちが普段使う10進数は「10になったら桁が上がる」。2進数は「2になったら桁が上がる」だけの違いです。</div>
        <div class="grid2">
            <div class="inner-card" style="text-align:left">
                <div style="font-size:12px;font-weight:500;margin-bottom:.5rem">10進数（普段使う数）</div>
                <div style="font-size:12px;color:#5a5a56;line-height:1.9">
                    千の位 × 1000<br>
                    百の位 × 100<br>
                    十の位 × 10<br>
                    一の位 × 1
                </div>
            </div>
            <div class="inner-card" style="text-align:left">
                <div style="font-size:12px;font-weight:500;margin-bottom:.5rem">2進数（コンピューターの数）</div>
                <div style="font-size:12px;color:#5a5a56;line-height:1.9">
                    4桁目 × 8<br>
                    3桁目 × 4<br>
                    2桁目 × 2<br>
                    1桁目 × 1
                </div>
            </div>
        </div>
        <div class="card-body" style="margin-top:.75rem">例：2進数の <code>1010</code> → <code>1×8 + 0×4 + 1×2 + 0×1 = 10</code>（10進数の10と同じ）</div>
    </div>
</div>

<!-- インタラクティブデモ -->
<div class="section">
    <div class="section-title">🔢 シフトを動かして理解しよう</div>
    <div class="card">
        <div class="card-body" style="margin-bottom:.75rem">数値を入れて左右にシフトすると、ビットが動く様子が見えます。</div>
        <div class="demo-wrap">
            <div class="demo-controls">
                <label>数値</label>
                <input type="number" id="input-val" value="10" min="1" max="127" oninput="updateDemo()">
                <button class="shift-btn active" id="btn-left" onclick="setDir('left')">左シフト &lt;&lt;</button>
                <button class="shift-btn" id="btn-right" onclick="setDir('right')">&gt;&gt; 右シフト</button>
                <label>ビット数</label>
                <input type="number" id="input-shift" value="1" min="1" max="4" oninput="updateDemo()">
            </div>
            <div style="font-size:12px;color:#888780;margin-bottom:.3rem">シフト前</div>
            <div class="bit-row" id="bits-before"></div>
            <div style="font-size:12px;color:#888780;margin:.6rem 0 .3rem">シフト後</div>
            <div class="bit-row" id="bits-after"></div>
            <div class="result-line" id="result-line"></div>
            <div class="step-explain" id="step-explain"></div>
        </div>
    </div>
</div>

<!-- 覚え方 -->
<div class="section">
    <div class="section-title">🔑 覚え方のコツ</div>
    <div class="card">
        <div class="card-body">10進数で考えると直感的にわかります：</div>
        <div class="grid2">
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.4rem">左シフト <code>&lt;&lt;</code></div>
                <div style="font-size:22px;font-weight:500;color:#0C447C;margin:.3rem 0">× 2<sup style="font-size:14px">n</sup></div>
                <div style="font-size:12px;color:#5a5a56"><code>10 &lt;&lt; 1</code> = 10 × 2 = <strong>20</strong><br><code>10 &lt;&lt; 2</code> = 10 × 4 = <strong>40</strong></div>
            </div>
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.4rem">右シフト <code>&gt;&gt;</code></div>
                <div style="font-size:22px;font-weight:500;color:#633806;margin:.3rem 0">÷ 2<sup style="font-size:14px">n</sup></div>
                <div style="font-size:12px;color:#5a5a56"><code>100 &gt;&gt; 1</code> = 100 ÷ 2 = <strong>50</strong><br><code>100 &gt;&gt; 2</code> = 100 ÷ 4 = <strong>25</strong></div>
            </div>
        </div>
    </div>
</div>

<!-- 権限フラグデモ -->
<div class="section">
    <div class="section-title">🚩 現場での使い方 — 権限フラグのデモ</div>
    <div class="card">
        <div class="card-title">ビットマスクで複数の権限を1つの数値で管理する</div>
        <div class="card-body" style="margin-bottom:.75rem">各ビット（桁）が1つの権限を表します。クリックして権限を切り替えてみましょう。</div>
        <div class="flag-row">
            <div class="flag-bit" id="fb3" onclick="toggleFlag(3)"><span>0</span><span class="flag-bit-label">追加</span></div>
            <div class="flag-bit" id="fb2" onclick="toggleFlag(2)"><span>0</span><span class="flag-bit-label">編集</span></div>
            <div class="flag-bit" id="fb1" onclick="toggleFlag(1)"><span>0</span><span class="flag-bit-label">削除</span></div>
            <div class="flag-bit" id="fb0" onclick="toggleFlag(0)"><span>0</span><span class="flag-bit-label">閲覧</span></div>
            <div style="font-size:13px;color:#888780;margin:0 4px">=</div>
            <div style="font-family:monospace;font-size:18px;font-weight:500;color:#1a1a18" id="flag-val">0</div>
            <div style="font-size:12px;color:#888780;margin-left:4px">(10進数)</div>
        </div>
        <div style="display:flex;gap:6px;flex-wrap:wrap;margin-top:.5rem" id="perm-badges">
            <span class="perm-label">権限なし</span>
        </div>
        <div class="code-block" style="margin-top:.75rem" id="flag-code">$flag = 0;</div>
    </div>
</div>

<!-- 使用場面 -->
<div class="section">
    <div class="section-title">💼 ビットシフトが使われる場面</div>
    <div class="card">
        <div class="use-grid">
            <div class="use-card">
                <div class="use-title">⚡ パフォーマンス向上</div>
                <div class="use-body"><code>$v * 2</code> より <code>$v &lt;&lt; 1</code> の方が高速。処理の多いアプリで有効。</div>
            </div>
            <div class="use-card">
                <div class="use-title">🎨 画像処理</div>
                <div class="use-body">RGB値の操作や色の成分変更にビットシフトが使われる。</div>
            </div>
            <div class="use-card">
                <div class="use-title">🔒 暗号アルゴリズム</div>
                <div class="use-body">データをビットレベルで変換し、セキュリティ向上に役立てる。</div>
            </div>
            <div class="use-card">
                <div class="use-title">🔧 低レベルプログラミング</div>
                <div class="use-body">組み込みシステムやデバイスドライバーでハードウェアのビットを直接操作する。</div>
            </div>
        </div>
    </div>
</div>

<!-- マニュアル -->
<div class="section">
    <div class="section-title">📖 PHPマニュアル</div>
    <div class="card">
        <a href="https://www.php.net/manual/ja/language.operators.bitwise.php">ビット演算子 — php.net</a>
    </div>
</div>

<script>
    var shiftDir = 'left';
    var flagState = [0, 0, 0, 0];

    function toBits(n, len) {
        var b = [];
        for (var i = len - 1; i >= 0; i--) b.push((n >> i) & 1);
        return b;
    }

    function renderBits(containerId, bits, highlight, weights) {
        var el = document.getElementById(containerId);
        var html = '';
        for (var i = 0; i < bits.length; i++) {
            var b = bits[i];
            var w = weights ? weights[i] : null;
            var cls = 'bit-box';
            if (b === 1) cls += highlight === 'new' ? ' new' : ' on';
            html += '<div class="bit-cell">'
                + '<div class="bit-label">' + (w !== null ? w : '') + '</div>'
                + '<div class="' + cls + '">' + b + '</div>'
                + '<div class="bit-weight">' + (w !== null ? '×' + w : '') + '</div>'
                + '</div>';
        }
        el.innerHTML = html;
    }

    function updateDemo() {
        var val = parseInt(document.getElementById('input-val').value) || 0;
        var sh  = parseInt(document.getElementById('input-shift').value) || 1;
        var len = 8;
        var result = shiftDir === 'left' ? (val << sh) : (val >> sh);
        var weights = [128, 64, 32, 16, 8, 4, 2, 1];

        renderBits('bits-before', toBits(val, len), 'on', weights);
        renderBits('bits-after',  toBits(result, len), 'new', weights);

        var op     = shiftDir === 'left' ? '<<' : '>>';
        var factor = Math.pow(2, sh);
        var mathOp = shiftDir === 'left' ? '× ' + factor : '÷ ' + factor;

        document.getElementById('result-line').innerHTML =
            '<code>' + val + ' ' + op + ' ' + sh + '</code> = <span class="result-num">' + result + '</span>';
        document.getElementById('step-explain').innerHTML =
            '計算の考え方：<strong>' + val + ' ' + mathOp + ' = ' + result + '</strong><br>'
            + '2進数で見ると <code>' + val.toString(2).padStart(len, '0') + '</code> が '
            + '<code>' + result.toString(2).padStart(len, '0') + '</code> に変わりました。';
    }

    function setDir(d) {
        shiftDir = d;
        document.getElementById('btn-left').classList.toggle('active', d === 'left');
        document.getElementById('btn-right').classList.toggle('active', d === 'right');
        updateDemo();
    }

    function toggleFlag(bit) {
        flagState[bit] = flagState[bit] ? 0 : 1;
        renderFlags();
    }

    function renderFlags() {
        var names    = ['追加', '編集', '削除', '閲覧'];
        var bitNames = ['閲覧', '削除', '編集', '追加'];
        var val = 0;
        for (var i = 0; i < 4; i++) if (flagState[i]) val |= (1 << i);

        for (var i = 0; i < 4; i++) {
            var el = document.getElementById('fb' + i);
            el.querySelector('span').textContent = flagState[i];
            el.classList.toggle('on', !!flagState[i]);
        }
        document.getElementById('flag-val').textContent = val;

        var badges = '';
        for (var i = 3; i >= 0; i--) {
            if (flagState[i]) badges += '<span class="perm-label on">' + names[3 - i] + '権限あり</span> ';
        }
        document.getElementById('perm-badges').innerHTML = badges || '<span class="perm-label">権限なし</span>';

        var code = '$flag = 0;';
        for (var i = 0; i < 4; i++) {
            if (flagState[i]) code += '\n$flag |= 1 << ' + i + '; // ' + bitNames[i] + '権限を追加';
        }
        if (val > 0) code += '\n// $flag の値 = ' + val;
        document.getElementById('flag-code').textContent = code;
    }

    updateDemo();
    renderFlags();
</script>

</body>
</html>