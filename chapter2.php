

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

<h1>Chapter 2 変数と定数</h1>

<p>変数の命名規則</p>

<h4>ルール</h4>
・$から始める<br>
・次に数字は使えない<br>
・文字、数字、_が使える<br>

<h4>OK / NG例 </h4>
OK:  $SKY , $_name , $item2 <br>
NG:  $3d ,  $-pi  , var 'x' <br>

<h4>命名規則</h4>
スネークケース <br>
キャメルケース <br>
パスカルケース <br>

<h2>Chapter 2-1 実行結果</h2>
<p>変数の命名規則の例と、読みやすい変数名の実行例です。</p>

<!-- Chapter 2-1 実行例 -->

<div style="background:#f6f8fa; padding:15px; border-radius:6px;">

<?php
$QaWsEdRfTg = true; 
$_____o_____ = 2; 
$いろはにほへと = ' pens.'; 

if ($QaWsEdRfTg) {
    echo 'I have ' . $_____o_____ . $いろはにほへと;
}
?>

<hr>

<?php
$DOECHO = true; 
$number_of_pens = 2; 
$ペンのテキスト = ' pens.';

if ($DOECHO) {
    echo 'I have ' . $number_of_pens . $ペンのテキスト;
}
?>

<hr>

<?php
$do_echo = true;
$number_of_pens = 2;
$text_for_pens = ' pens.';

if ($do_echo) {
    echo 'I have ' . $number_of_pens . $text_for_pens;
}
?>

</div>

</section>



</body>
</html>