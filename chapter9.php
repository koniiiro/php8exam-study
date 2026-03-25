<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 9 分岐構文</title>
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
            line-height: 1.9;
            white-space: pre;
            overflow-x: auto;
        }
        .choice-row { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #5a5a56; padding: 4px 0; }
        .choice-row.correct { color: #1a1a18; font-weight: 500; }
        .rule-row { display: flex; align-items: flex-start; gap: 8px; margin-bottom: .5rem; }
        .bullet { width: 6px; height: 6px; border-radius: 50%; background: #888780; flex-shrink: 0; margin-top: 6px; }
        a { color: #185FA5; font-size: 13px; display: block; margin-bottom: .3rem; }
        .tag-ans  { display: inline-block; background: #E6F1FB; color: #0C447C; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .tag-ok   { display: inline-block; background: #EAF3DE; color: #3B6D11; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .tag-ng   { display: inline-block; background: #FCEBEB; color: #A32D2D; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .tag-warn { display: inline-block; background: #FAEEDA; color: #633806; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .tag-blue { display: inline-block; background: #E6F1FB; color: #0C447C; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .grid2 { display: grid; grid-template-columns: 1fr 1fr; gap: .75rem; margin-top: .75rem; }
        .inner-card { background: #faf9f6; border: 0.5px solid #d3d1c7; border-radius: 8px; padding: .75rem; }
        /* トグル */
        .toggle-wrap { display: flex; align-items: center; gap: 10px; margin-bottom: .75rem; flex-wrap: wrap; }
        .ver-btn { font-size: 12px; font-weight: 500; padding: 4px 14px; border-radius: 6px; border: 0.5px solid #c8c6bc; background: transparent; color: #5a5a56; cursor: pointer; transition: all .15s; }
        .ver-btn.active { background: #E6F1FB; color: #185FA5; border-color: #378ADD; }
        .ver-panel { display: none; }
        .ver-panel.active { display: block; }
        /* ステッパー */
        .step-box { background: #faf9f6; border: 0.5px solid #d3d1c7; border-radius: 8px; padding: .6rem .9rem; margin-bottom: .5rem; transition: border .2s, background .2s; }
        .step-box.active  { border: 2px solid #378ADD; background: #E6F1FB; }
        .step-box.done-ok { border-color: #639922; background: #EAF3DE; }
        .step-box.done-ng { border-color: #E24B4A; background: #FCEBEB; }
        .step-num { display: inline-block; width: 20px; height: 20px; border-radius: 50%; background: #e4e3dc; font-size: 11px; font-weight: 500; color: #5a5a56; text-align: center; line-height: 20px; margin-right: 6px; }
        .step-box.active  .step-num { background: #fff; color: #185FA5; }
        .step-box.done-ok .step-num { background: #fff; color: #3B6D11; }
        .step-box.done-ng .step-num { background: #fff; color: #A32D2D; }
        .step-expr { font-family: monospace; font-size: 13px; font-weight: 500; color: #1a1a18; }
        .step-desc { font-size: 12px; color: #5a5a56; margin-top: .3rem; padding-left: 26px; line-height: 1.6; }
        .step-box.active  .step-desc { color: #0C447C; }
        .step-box.done-ok .step-desc { color: #3B6D11; }
        .step-box.done-ng .step-desc { color: #A32D2D; }
        .nav { display: flex; align-items: center; gap: 12px; margin-top: .75rem; }
        .nav button { font-size: 13px; padding: 6px 16px; border-radius: 8px; border: 0.5px solid #c8c6bc; background: transparent; color: #1a1a18; cursor: pointer; }
        .nav button:disabled { opacity: .35; cursor: default; }
        .nav button:not(:disabled):hover { background: #f0efe9; }
        .progress { font-size: 12px; color: #888780; margin-left: auto; }
        /* match比較 */
        .compare-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: .75rem; margin-top: .75rem; }
        .compare-card { background: #faf9f6; border: 0.5px solid #d3d1c7; border-radius: 8px; padding: .75rem; }
        .compare-card.best { border: 2px solid #378ADD; }
        .compare-label { font-size: 11px; font-weight: 500; margin-bottom: .4rem; padding: 2px 8px; border-radius: 4px; display: inline-block; }
        .compare-label.ok   { background: #EAF3DE; color: #3B6D11; }
        .compare-label.warn { background: #FAEEDA; color: #633806; }
        .compare-label.best-lbl { background: #E6F1FB; color: #0C447C; }
        /* ヨーダデモ */
        .yoda-wrap { background: #faf9f6; border: 0.5px solid #d3d1c7; border-radius: 8px; padding: .75rem; margin-top: .5rem; }
        .yoda-result { font-size: 14px; font-weight: 500; text-align: center; padding: .6rem; border-radius: 6px; margin-top: .5rem; transition: all .2s; }
        .yoda-result.bug     { background: #FCEBEB; color: #A32D2D; }
        .yoda-result.correct { background: #EAF3DE; color: #3B6D11; }
        /* match条件2の詳細説明 */
        .point-box { background: #faf9f6; border-left: 3px solid #378ADD; padding: .75rem 1rem; margin-top: .75rem; font-size: 13px; color: #5a5a56; line-height: 1.7; }
        .transform-box { background: #faf9f6; border: 0.5px solid #d3d1c7; border-radius: 8px; padding: .75rem; margin-top: .5rem; }
        .transform-row { display: flex; align-items: center; gap: 8px; font-family: monospace; font-size: 13px; margin-bottom: .4rem; flex-wrap: wrap; }
        .val-box { background: #e4e3dc; border-radius: 4px; padding: 2px 10px; font-size: 13px; font-family: monospace; }
        .val-box.result-true  { background: #EAF3DE; color: #3B6D11; }
        .val-box.result-false { background: #FCEBEB; color: #A32D2D; }
        .val-box.highlight    { background: #E6F1FB; color: #0C447C; }
        .step-circle { width: 26px; height: 26px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 500; flex-shrink: 0; margin-top: 2px; }
        .step-circle.blue  { background: #E6F1FB; color: #0C447C; border: 0.5px solid #378ADD; }
        .step-circle.red   { background: #FCEBEB; color: #A32D2D; border: 0.5px solid #E24B4A; }
        .step-row { display: flex; align-items: flex-start; gap: 10px; margin-bottom: .75rem; }
        .step-label { font-size: 12px; font-weight: 500; margin-bottom: .3rem; }
    </style>
</head>
<body>

<!-- 9-1 問題 -->
<div class="section">
    <div class="section-title">📌 Chapter 9-1 — if 命令</div>
    <div class="card">
        <div class="card-title">問題 (1) — PHPエラーになるコードはどれ？</div>
        <div style="margin-top:.5rem">
            <div class="choice-row"><span>1.</span><code>if ($age >= 20) { ... }</code><span style="margin-left:auto"><span class="tag-ok">正常</span></span></div>
            <div class="choice-row"><span>2.</span><code>if の入れ子（ネスト）</code><span style="margin-left:auto"><span class="tag-ok">正常</span></span></div>
            <div class="choice-row correct"><span>3.</span><code>else ($age >= 18) { ... }</code><span style="margin-left:auto"><span class="tag-ng">エラー ← 正解</span></span></div>
            <div class="choice-row"><span>4.</span><code>if ($age) { ... }</code><span style="margin-left:auto"><span class="tag-ok">正常</span></span></div>
        </div>
        <div class="card-body" style="margin-top:.75rem"><code>else</code> には条件式を書けない。条件を付けたい場合は <code>elseif</code> を使う。</div>
    </div>

    <div class="card">
        <div class="card-title">解説 — if / elseif / else の使い分け</div>
        <div class="grid2">
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem"><span class="tag-ng">NG</span> else に条件式はつけられない</div>
                <div class="code-block">if ($age >= 20) {
  echo '飲酒OK！';
} else ($age >= 18) { // エラー
  echo '成人！';
}</div>
            </div>
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem"><span class="tag-ok">OK</span> elseif を使う</div>
                <div class="code-block">if ($age >= 20) {
  echo '飲酒OK！';
} elseif ($age >= 18) {
  echo '飲酒できない成人！';
} else {
  echo '未成年！';
}</div>
            </div>
        </div>
        <div class="card-body" style="margin-top:.75rem"><code>if ($age)</code> は <code>if ($age == true)</code> と同等。0 以外はすべて true になる。</div>
    </div>
</div>

<!-- 現場の書き方 -->
<div class="section">
    <div class="section-title">✨ 現場での効果的な書き方</div>

    <!-- ネスト -->
    <div class="card">
        <div class="card-title">① ネストを減らす — ビフォー/アフターで比べよう</div>
        <div class="card-body" style="margin-bottom:.75rem">ネストが深いと「どの条件のとき何が実行されるか」が追いにくくなります。</div>
        <div class="toggle-wrap">
            <button class="ver-btn active" id="nest-before-btn" onclick="switchNest('before')">NG：深いネスト</button>
            <button class="ver-btn" id="nest-after-btn" onclick="switchNest('after')">OK：ネスト解消</button>
        </div>
        <div class="ver-panel active" id="nest-before">
            <div class="code-block">if ($productId == 'ABC') {
  if ($purchaseAmount >= 3000) {
    if ($isPremiumMember) {
      echo "特別割引が適用されます！";
    }
  }
} else {
  echo "通常料金です。";
}</div>
            <div class="card-body" style="margin-top:.5rem">3段のネストで、どの条件が何に対応するか追いにくい。<br>条件が増えるたびにさらに深くなっていく。</div>
        </div>
        <div class="ver-panel" id="nest-after">
            <div class="code-block">if ($productId == 'ABC'
  &amp;&amp; $purchaseAmount >= 3000
  &amp;&amp; $isPremiumMember) {
    echo "特別割引が適用されます！";
} else {
  echo "通常料金です。";
}</div>
            <div class="card-body" style="margin-top:.5rem">条件を <code>&amp;&amp;</code> でまとめてネストをフラットに。<br>処理の流れが一目でわかる。</div>
        </div>
    </div>

    <!-- アーリーリターン -->
    <div class="card">
        <div class="card-title">② アーリーリターン — NGとわかった時点でさっさと返す</div>
        <div class="card-body" style="margin-bottom:.75rem">関数の中で条件が失敗したらすぐ <code>return</code> することで、コードがスッキリします。</div>
        <div id="early-steps"></div>
        <div class="nav">
            <button id="early-prev" onclick="earlyMove(-1)" disabled>← 前へ</button>
            <button id="early-next" onclick="earlyMove(1)">次へ →</button>
            <span class="progress" id="early-progress">1 / 4</span>
        </div>
        <div class="grid2" style="margin-top:.75rem">
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem"><span class="tag-warn">冗長な書き方</span></div>
                <div class="code-block">function isValidItem($item) {
  $result = true;
  if ($item->width < 100) {
    $result = false;
  } elseif ($item->height < 100) {
    $result = false;
  } elseif ($item->depth < 100) {
    $result = false;
  }
  return $result;
  // 最後まで読まないとわからない
}</div>
            </div>
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem"><span class="tag-ok">アーリーリターン</span></div>
                <div class="code-block">function isValidItem($item) {
  if ($item->width < 100) {
    return false; // NG確定→即終了
  }
  if ($item->height < 100) {
    return false; // NG確定→即終了
  }
  if ($item->depth < 100) {
    return false; // NG確定→即終了
  }
  return true; // 全部OK
}</div>
            </div>
        </div>
    </div>

    <!-- ヨーダ記法 -->
    <div class="card">
        <div class="card-title">③ ヨーダ記法 — = と == の書き間違いを防ぐ</div>
        <div class="card-body" style="margin-bottom:.5rem">条件式で <code>=</code> と <code>==</code> を1文字書き間違えると、全く違う動作になります。</div>
        <div class="toggle-wrap">
            <button class="ver-btn active" id="yoda-btn1" onclick="switchYoda('bug')">書き間違い ($age = 20)</button>
            <button class="ver-btn" id="yoda-btn2" onclick="switchYoda('normal')">正常 ($age == 20)</button>
            <button class="ver-btn" id="yoda-btn3" onclick="switchYoda('yoda')">ヨーダ記法 (20 == $age)</button>
        </div>
        <div class="yoda-wrap">
            <div class="code-block" id="yoda-code"></div>
            <div class="yoda-result" id="yoda-result"></div>
            <div class="card-body" id="yoda-desc" style="margin-top:.5rem"></div>
        </div>
    </div>
</div>

<!-- 9-2 問題 -->
<div class="section">
    <div class="section-title">📌 Chapter 9-2 — match 式</div>
    <div class="card">
        <div class="card-title">問題 (1) &lt;PHP 8&gt; — 実行結果はどれ？</div>
        <div class="code-block">$number = 3;
$result = match ($number) {
  '3'          => 'ラッキーな1日になるでしょう',
  $number == 3 => '素敵な出会いがあるでしょう',
  1 + 2        => '実力を発揮できるでしょう',
  default      => '明日に期待しましょう'
};
echo $result;</div>
        <div style="margin-top:.75rem">
            <div class="choice-row">1. ラッキーな1日になるでしょう</div>
            <div class="choice-row correct">2. <span class="tag-ans">実力を発揮できるでしょう</span> ← 正解</div>
            <div class="choice-row">3. 明日に期待しましょう</div>
            <div class="choice-row">4. エラーが発生する</div>
        </div>
    </div>

    <!-- match ステッパー -->
    <div class="card">
        <div class="card-title">解説 — match は厳密な比較（===）で上から順に判定する</div>
        <div id="match-steps"></div>
        <div class="nav">
            <button id="match-prev" onclick="matchMove(-1)" disabled>← 前へ</button>
            <button id="match-next" onclick="matchMove(1)">次へ →</button>
            <span class="progress" id="match-progress">1 / 4</span>
        </div>
    </div>

    <!-- 条件2 詳細説明 -->
    <div class="card">
        <div class="card-title">🔍 なぜ「素敵な出会いがあるでしょう」が出力されないのか？</div>
        <div class="card-body" style="margin-bottom:.75rem">条件式に <code>$number == 3</code> と書いてあるのに、なぜ一致しないのか。3ステップで追ってみましょう。</div>

        <div class="step-row">
            <div class="step-circle blue">1</div>
            <div style="flex:1">
                <div class="step-label">まず「条件式」の部分が計算される</div>
                <div class="card-body">条件式は <code>$number == 3</code> です。<code>==</code> は緩やかな比較なので 3 == 3 → <span class="tag-ok">true</span> になります。</div>
                <div class="transform-box">
                    <div class="transform-row">
                        <span class="val-box">$number == 3</span>
                        <span style="color:#888780;font-size:16px">→</span>
                        <span class="val-box">3 == 3</span>
                        <span style="color:#888780;font-size:16px">→</span>
                        <span class="val-box result-true">true</span>
                    </div>
                    <div style="font-size:12px;color:#888780;margin-top:.3rem">条件式の計算結果は「true」という値になる</div>
                </div>
            </div>
        </div>

        <div class="step-row">
            <div class="step-circle blue">2</div>
            <div style="flex:1">
                <div class="step-label">次に match が「制約式 === 条件式の結果」を比較する</div>
                <div class="card-body">match は <strong>制約式（$number = 3）</strong> と <strong>条件式の計算結果（true）</strong> を <code>===</code> で比較します。</div>
                <div class="transform-box">
                    <div class="transform-row">
                        <span class="val-box highlight">$number（= 3）</span>
                        <span style="color:#888780">===</span>
                        <span class="val-box result-true">true</span>
                        <span style="color:#888780;font-size:16px">→</span>
                        <span class="val-box result-false">false !</span>
                    </div>
                    <div style="font-size:12px;color:#888780;margin-top:.3rem">整数の 3 と 論理値の true は型が違うので === では false になる</div>
                </div>
            </div>
        </div>

        <div class="step-row">
            <div class="step-circle red">3</div>
            <div style="flex:1">
                <div class="step-label">結果：条件2 は false → スキップされる</div>
                <div class="card-body"><code>3 === true</code> は false なので「素敵な出会いがあるでしょう」は返されず、次の条件3 へ進みます。</div>
            </div>
        </div>

        <div class="point-box">
            <strong>まとめ：</strong><br>
            <code>$number == 3</code> と書いても、match はその<strong>計算結果（= true）</strong>と制約式（= 3）を <code>===</code> で比較する。<br>
            <code>3 === true</code> は型が違う（int と bool）ので false になる。<br><br>
            <strong>正しい書き方：条件式には比較したい値をそのまま書く</strong><br>
            <code>$number == 3</code> ではなく <code>3</code> と書くのが match の正しい使い方。
        </div>

        <div class="card-body" style="margin-top:.75rem">== と === の型の違いも確認しましょう：</div>
        <div class="transform-box">
            <div class="transform-row" style="margin-bottom:.5rem">
                <span style="font-size:12px;color:#888780;width:110px;flex-shrink:0">緩やかな比較</span>
                <span class="val-box">3 == true</span>
                <span style="color:#888780;font-size:16px">→</span>
                <span class="val-box result-true">true</span>
                <span style="font-size:12px;color:#888780;margin-left:4px">（値だけ見ると同じ）</span>
            </div>
            <div class="transform-row">
                <span style="font-size:12px;color:#888780;width:110px;flex-shrink:0">厳密な比較</span>
                <span class="val-box">3 === true</span>
                <span style="color:#888780;font-size:16px">→</span>
                <span class="val-box result-false">false</span>
                <span style="font-size:12px;color:#888780;margin-left:4px">（型が int と bool で違う）</span>
            </div>
        </div>
    </div>

    <!-- defaultの説明 -->
    <div class="card">
        <div class="card-title">match の default について</div>
        <div style="margin-top:.3rem">
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">どの条件も当てはまらなかった場合に <code>default</code> が実行される</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>default</code> がなく条件も一致しないと <code>UnhandledMatchError</code> 例外が発生する</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">書く順番はどこでも良いが、通常は最後に書く</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>default</code> を2か所以上書くとエラーになる</div></div>
        </div>
    </div>
</div>

<!-- match vs switch vs if -->
<div class="section">
    <div class="section-title">⚡ match vs if vs switch — 3つを比較しよう</div>
    <div class="card">
        <div class="card-body" style="margin-bottom:.75rem">同じ処理を3つの書き方で比べると、<code>match</code> のシンプルさがよくわかります。</div>
        <div class="compare-grid">
            <div class="compare-card">
                <div class="compare-label warn">switch 文</div>
                <div class="card-body" style="font-size:12px;margin:.3rem 0">緩やかな比較（==）でバグが起きやすい</div>
                <div class="code-block" style="font-size:11px">switch ($userRole) {
  case 0:
    echo '管理者';
    break;
  case 1:
    echo '編集者';
    break;
  default:
    echo '不明';
}
// true を渡すと
// 「編集者」になるバグあり</div>
            </div>
            <div class="compare-card">
                <div class="compare-label warn">if / elseif 文</div>
                <div class="card-body" style="font-size:12px;margin:.3rem 0">厳密（===）だが冗長になりがち</div>
                <div class="code-block" style="font-size:11px">if ($userRole === 0) {
  echo '管理者';
} elseif ($userRole === 1) {
  echo '編集者';
} else {
  echo '不明';
}
// 正確だが行数が多い</div>
            </div>
            <div class="compare-card best">
                <div class="compare-label best-lbl">match 式（PHP 8〜）★</div>
                <div class="card-body" style="font-size:12px;margin:.3rem 0">厳密（===）かつシンプル。返り値もある</div>
                <div class="code-block" style="font-size:11px">echo match ($userRole) {
  0 => '管理者',
  1 => '編集者',
  default => '不明',
};
// シンプル＆安全！</div>
            </div>
        </div>
    </div>
</div>

<!-- マニュアル -->
<div class="section">
    <div class="section-title">📖 PHPマニュアル</div>
    <div class="card">
        <a href="https://www.php.net/manual/ja/control-structures.if.php">if — php.net</a>
        <a href="https://www.php.net/manual/ja/control-structures.else.php">else — php.net</a>
        <a href="https://www.php.net/manual/ja/control-structures.elseif.php">elseif / else if — php.net</a>
        <a href="https://www.php.net/manual/ja/control-structures.match.php">match — php.net</a>
        <a href="https://www.php.net/manual/ja/control-structures.switch.php">switch — php.net</a>
        <a href="https://www.php.net/manual/ja/language.types.boolean.php#language.types.boolean.casting">boolean への変換 — php.net</a>
    </div>
</div>

<script>
    /* ネストトグル */
    function switchNest(v) {
        document.getElementById('nest-before-btn').classList.toggle('active', v === 'before');
        document.getElementById('nest-after-btn').classList.toggle('active', v === 'after');
        document.getElementById('nest-before').classList.toggle('active', v === 'before');
        document.getElementById('nest-after').classList.toggle('active', v === 'after');
    }

    /* アーリーリターンステッパー */
    var earlyCur = 0;
    var earlySteps = [
        { expr: 'width チェック',  desc: '$item->width が 100 未満なら即 return false。幅がNGとわかった時点で終了。以降の処理は一切実行されない。', cls: 'done-ng' },
        { expr: 'height チェック', desc: 'width はOKだった場合のみここに来る。$item->height が 100 未満なら即 return false。', cls: 'done-ng' },
        { expr: 'depth チェック',  desc: 'width も height もOKだった場合のみここに来る。$item->depth が 100 未満なら即 return false。', cls: 'done-ng' },
        { expr: 'return true — 全部OK！', desc: '3つの条件をすべてクリアした場合だけここに到達する。return true でOKを返す。読む人にとって非常にわかりやすい。', cls: 'done-ok' }
    ];
    function renderEarly() {
        var c = document.getElementById('early-steps');
        c.innerHTML = earlySteps.map(function(s, i) {
            var cls = 'step-box ' + (i === earlyCur ? 'active' : i < earlyCur ? s.cls : '');
            return '<div class="' + cls + '">'
                + '<div style="display:flex;align-items:center">'
                + '<span class="step-num">' + (i + 1) + '</span>'
                + '<span class="step-expr">' + s.expr + '</span>'
                + '</div>'
                + (i <= earlyCur ? '<div class="step-desc">' + s.desc + '</div>' : '')
                + '</div>';
        }).join('');
        document.getElementById('early-progress').textContent = (earlyCur + 1) + ' / ' + earlySteps.length;
        document.getElementById('early-prev').disabled = earlyCur === 0;
        document.getElementById('early-next').disabled = earlyCur === earlySteps.length - 1;
    }
    function earlyMove(d) { earlyCur = Math.max(0, Math.min(earlySteps.length - 1, earlyCur + d)); renderEarly(); }
    renderEarly();

    /* ヨーダ記法デモ */
    var yodaData = {
        bug: {
            code: '$age = 18;\nif ($age = 20) {  // = が1つ → 代入！\n  echo \'飲酒OK！\';\n} else {\n  echo \'飲酒NG...\';\n}',
            result: '飲酒OK！', cls: 'bug',
            desc: 'if ($age = 20) は「$age に 20 を代入する」という意味。代入後の値 20 は true と等価なので、常に「飲酒OK！」になってしまうバグ。'
        },
        normal: {
            code: '$age = 18;\nif ($age == 20) {  // == が2つ → 比較\n  echo \'飲酒OK！\';\n} else {\n  echo \'飲酒NG...\';\n}',
            result: '飲酒NG...', cls: 'correct',
            desc: '$age == 20 は「$age が 20 と等しいか」を比較する。18 ≠ 20 なので false → 「飲酒NG...」が出力される。正しい動作。'
        },
        yoda: {
            code: '$age = 18;\nif (20 == $age) {  // 数値を左に → ヨーダ記法\n  echo \'飲酒OK！\';\n} else {\n  echo \'飲酒NG...\';\n}',
            result: '飲酒NG...', cls: 'correct',
            desc: '20 = $age のようにイコールが1つだと構文エラーになるため、書き間違いに気づける。ただし現代のエディタは警告を出してくれるため、賛否が分かれる書き方。'
        }
    };
    function switchYoda(k) {
        document.getElementById('yoda-btn1').classList.toggle('active', k === 'bug');
        document.getElementById('yoda-btn2').classList.toggle('active', k === 'normal');
        document.getElementById('yoda-btn3').classList.toggle('active', k === 'yoda');
        var d = yodaData[k];
        document.getElementById('yoda-code').textContent = d.code;
        document.getElementById('yoda-result').textContent = '出力: ' + d.result;
        document.getElementById('yoda-result').className = 'yoda-result ' + d.cls;
        document.getElementById('yoda-desc').textContent = d.desc;
    }
    switchYoda('bug');

    /* match ステッパー */
    var matchCur = 0;
    var matchSteps = [
        { expr: "条件1: 3 === '3'", desc: "数値の 3 と文字列の '3' を厳密比較（===）。型が違うので false。→ 「ラッキーな1日」にはならない。", cls: 'done-ng' },
        { expr: '条件2: 3 === ($number == 3)', desc: '$number == 3 は true（緩やかな比較）。つまり 3 === true を厳密比較。型が int と bool で違うので false。→ 「素敵な出会い」もない。詳しくは下の解説を参照。', cls: 'done-ng' },
        { expr: '条件3: 3 === (1 + 2)', desc: '1 + 2 = 3。3 === 3 を厳密比較。型も値も一致するので true！→ 「実力を発揮できるでしょう」が返る。', cls: 'done-ok' },
        { expr: 'default → スキップ', desc: '条件3 で true になったので、default は実行されない。match は最初に true になった条件で終了する。', cls: 'done-ng' }
    ];
    function renderMatch() {
        var c = document.getElementById('match-steps');
        c.innerHTML = matchSteps.map(function(s, i) {
            var cls = 'step-box ' + (i === matchCur ? 'active' : i < matchCur ? s.cls : '');
            return '<div class="' + cls + '">'
                + '<div style="display:flex;align-items:center">'
                + '<span class="step-num">' + (i + 1) + '</span>'
                + '<span class="step-expr">' + s.expr + '</span>'
                + '</div>'
                + (i <= matchCur ? '<div class="step-desc">' + s.desc + '</div>' : '')
                + '</div>';
        }).join('');
        document.getElementById('match-progress').textContent = (matchCur + 1) + ' / ' + matchSteps.length;
        document.getElementById('match-prev').disabled = matchCur === 0;
        document.getElementById('match-next').disabled = matchCur === matchSteps.length - 1;
    }
    function matchMove(d) { matchCur = Math.max(0, Math.min(matchSteps.length - 1, matchCur + d)); renderMatch(); }
    renderMatch();
</script>

</body>
</html>