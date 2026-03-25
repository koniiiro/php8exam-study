<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PHP8初級試験 最終チェックシート</title>
    <style>
        body { font-family: "Helvetica Neue", Arial, sans-serif; line-height: 1.6; padding: 30px; background: #f0f2f5; color: #333; }
        .container { max-width: 900px; margin: auto; background: #fff; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        h1 { color: #fff; background: linear-gradient(135deg, #e74c3c, #c0392b); padding: 20px; text-align: center; border-radius: 10px; margin-top: 0; }
        h2 { border-left: 6px solid #e74c3c; padding-left: 15px; margin-top: 40px; color: #2c3e50; }
        .card { border: 1px solid #e0e0e0; padding: 20px; margin-bottom: 20px; border-radius: 8px; transition: 0.3s; }
        .card:hover { border-color: #e74c3c; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .check-item { font-weight: bold; color: #c0392b; }
        pre { background: #2d2d2d; color: #f8f8f2; padding: 15px; border-radius: 8px; font-size: 0.9em; }
        .danger { background: #fff5f5; border-left: 5px solid #ff4d4d; padding: 10px; margin: 10px 0; }
        .safe { background: #f6ffed; border-left: 5px solid #52c41a; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>

<div class="container">
    <h1>PHP8初級試験：最終決戦ブースト</h1>

    <h2>1. 演算子と制御構文の「落とし穴」</h2>
    <div class="card">
        <p><span class="check-item">● 論理演算子の優先順位：</span> <code>&&</code> は <code>and</code> より強く、<code>||</code> は <code>or</code> より強い！</p>
        <div class="danger">
            <code>$a = true and false;</code> → <code>$a</code> は <strong>true</strong> になります。<br>
            （<code>($a = true) and false</code> と解釈されるため）
        </div>
        <p><span class="check-item">● switch文の比較：</span> PHP8では厳密な比較（<code>===</code>相当）が行われるようになりました。</p>
    </div>

    <h2>2. スーパーグローバル変数の正体</h2>
    <div class="card">
        <p>これらはすべて <strong>「連想配列」</strong> です。大文字・アンダースコアを正確に！</p>
        <ul>
            <li><code>