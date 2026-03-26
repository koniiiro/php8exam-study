<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>関数のglobalとlocal</title>
</head>
<body>
    <p>
$val = 'a';<br>

$val = 'b';<br>

print ('【A】' . $val);<br>



function func($val = 'c') {<br>

  $val = 'd';<br>

  print ('【B】' . $val);<br>

  global $val;<br>

  print ('【C】' . $val);<br>

  $val = 'e';<br>

  print ('【D】' . $val);<br>

  $val = 'f';<br>

}



$val = 'g';<br>

func($val);<br>

print ('【E】' . $val);<br><br>

1. 実行の流れを追いかける<br>
① 関数の外での動き<br><br>

    </p>
<?php
    $val = 'a'; // グローバルな $val は 'a'
$val = 'b'; // 'b' に上書き
print ('【A】' . $val); // 結果：【A】b
?>

<p>② 関数の呼び出し</p>
<br>
<?php
$val = 'g'; // グローバルの $val が 'g' になる
func($val); // 引数として 'g' を渡して関数実行
?>

<p>
    ③ 関数 func の中での動き（ここが重要！）<br>
関数が始まった瞬間、関数の中だけの $val（ローカル変数）が作られます。<br>

【B】の部分：<br>
引数で受け取った 'g' が入っていますが、すぐに $val = 'd'; で上書きされます。<br>
→ 結果：【B】d<br>

【C】の部分（最大のポイント！）：
global $val; という命令が出ました。これは**「今後は関数の中の $val ではなく、外の世界（グローバル）の $val を使うぞ！」という宣言です。<br>
外の世界の $val は、さっき g にしましたね。<br>
→ 結果：【C】g**<br>

【D】の部分：
global 宣言中なので、$val = 'e'; とすると外の世界（グローバル）の値が 'e' に書き換わります。<br>
→ 結果：【D】e<br>
※その後の $val = 'f'; もグローバルを書き換えています（現在 'f'）。<br>
<br>
④ 関数が終わった後の動き<br>
</p>
<?php
print ('【E】' . $val);
?>

<p>
関数の中で global を使って外の世界を 'f' に書き換えたので、そのまま 'f' が表示されます。<br>
→ 結果：【E】f<br><br>

2. まとめ：実行結果<br>
【A】b 【B】d 【C】g 【D】e 【E】f<br>

3. 初学者が「すっと」理解するコツ<br>
この問題を解くときは、頭の中に2つの箱をイメージしてください。<br>

「外の箱（グローバル）」: ずっと存在している。<br>

「中（関数）の箱（ローカル）」: 関数が呼ばれた時だけ現れ、終わると消える。<br>

基本、関数の中では「中の箱」しか見えません。<br>

でも、global と言った瞬間だけ、中の箱を捨てて「外の箱」を直接いじり始めるのです。<br>

🎯 試験直前アドバイス<br>
もし試験で global が出てきたら、**「あ、ここから先は『外の世界』の話だな」**と切り替えてください。<br><br>


</p>

</body>
</html>