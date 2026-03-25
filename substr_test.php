<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>substr() の仕様</title>
</head>
<body>
    
<p>
PHPの文字列の一部を取り出す関数 substr() の仕様<br>
<br>

1. substr() 関数の正しいルール<br>
substr() は以下の引数を取ります。<br>
substr(対象の文字列, 開始位置, 取り出す長さ)<br><br>

今回のコード substr('abcde', 0, 3) を当てはめてみましょう。<br>

対象の文字列: 'abcde'<br>

開始位置: 0 （1文字目の 'a' からスタート）<br>

取り出す長さ: 3 （3文字分取り出す）<br>

これに従うと、結果は abc になります。<br>

なぜ「abcd」ではないのか？<br>
「abcd」だと4文字分取り出していることになります。引数の最後が 3 なので、3文字で止まらなければなりません。<br>

2. 試験で狙われる「文字数カウント」のコツ<br>
PHPの文字列操作では、数え方に2つのポイントがあります。<br>

開始位置は「0」から数える<br>

0 = 1文字目 ('a')<br>

1 = 2文字目 ('b')<br>

長さは「1」から数える<br>

3 = 3文字分<br>

</p>

<?php
$text = 'abcde';

// 問題のケース
echo "結果: " . substr($text, 0, 3); 
// 表示されるのは「abc」です

echo "\n";

// もし「abcd」と表示させたいなら
echo "4文字取り出す場合: " . substr($text, 0, 4); 


?>

<p>
試験対策アドバイス<br>
試験で substr が出たら、**「0から数え始めて、指定された個数分を指で数える」**のが一番確実です。<br>

0, 3 とあれば、「0番目(a)、1番目(b)、2番目(c)」の 3つ、とカウントしてください。<br>
</p>
</body>
</html>