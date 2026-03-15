
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>PHP の基本構文</title>

<style>
body{
    font-family: Arial, sans-serif;
    line-height: 1.7;
    margin: 40px;
}

h1{
    border-bottom: 2px solid #ddd;
    padding-bottom: 5px;
}

.code-box{
    background:#f6f8fa;
    padding:15px;
    border-radius:6px;
    overflow:auto;
    margin:20px 0;
    font-family: monospace;
}

.note{
    background:#fff8e1;
    padding:10px;
    border-left:4px solid #f0ad4e;
    margin:20px 0;
}
</style>

</head>

<body>

<h1>Chapter 1 PHPタグの書き方</h1>

<p>PHPではHTMLの中にコードを書くことができます。主に次の3つの記法があります。</p>

<h2>3つの記法（どれも同じ結果）</h2>

<div class="code-box">
<pre>
&lt;?php echo '&lt;h1&gt;ようこそ、' . $name . ' さん&lt;/h1&gt;'; ?&gt;

&lt;h1&gt;ようこそ、&lt;?php echo $name ?&gt;さん&lt;/h1&gt;

&lt;h1&gt;ようこそ、&lt;?= $name ?&gt;さん&lt;/h1&gt;
</pre>
</div>

<div class="note">
<strong>ポイント</strong><br>
&lt;?= ... ?&gt; は &lt;?php echo ... ?&gt; の短縮形です。
HTMLに変数を埋め込むときによく使われます。
</div>

<p>
実務では <strong>&lt;?= $name ?&gt;</strong> のような短縮形が
最もよく使われます。
</p>


<!-- Chapter 1-1 実行例 -->
<section style="margin-top:40px; padding:20px; border-top:2px solid #ddd;">

<h2>Chapter 1-1 実行結果</h2>
<p>以下はPHPタグの3つの書き方の実行例です。</p>

<div style="background:#f6f8fa; padding:15px; border-radius:6px;">

<?php
$name='ぞうぞう';
echo '<h1>ようこそ、'.$name.' さん</h1>';
?>

<?php $name='ぞうぞう'; ?>
<h1>ようこそ、<?php echo $name ?>さん</h1>

<?php $name='ぞうぞう'; ?>
<h1>ようこそ、<?= $name ?>さん</h1>

</div>

</section>

</body>
</html>