<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
1. コードA（while）の構造を分解する<br>
while 文は、ループに必要な要素が「バラバラ」に配置されています。<br>

初期化: $i = 1; （ループの前に書く）<br>

条件式: $i <= 20 （while のカッコ内に書く）<br>

更新式: $i += 2; （ループ処理の最後に書く）<br><br>

2. コードB（for）への書き換えルール<br>
for 文は、これら3つの要素をセミコロン (;) で区切って1行にまとめます。<br>

for (初期化; 条件式; 更新式)<br>

初期化：$i = 1<br>

条件式：$i <= 20<br>

更新式：$i += 2<br>

これをつなげると、正解の for ($i = 1; $i <= 20; $i += 2) になります。<br>
<br>
3. 試験で狙われる「ひっかけ」ポイント<br>
セミコロンとカンマの混同:<br>

for ($i=1, $i<=20, $i+=2) は × です。必ずセミコロン ; を使います。<br>

更新式のタイミング:<br>

while では処理の「後」に加算されますが、for も「1回処理が終わるごとに更新式を実行する」という仕組みなので、実行結果は全く同じになります。<br>

比較演算子:<br>

<= 20 なのか < 20 なのか。今回の場合はどちらも最後の数字が 19 になるため（次は21で条件外）、結果は同じですが、境界値には常に注意しましょう。
<br>

<?php
echo "コードA (while): ";
$i = 1;
while ($i <= 20) {
    print ($i . ',');
    $i += 2;
}

echo "\n";

echo "コードB (for):   ";
// 【A】に入る部分
for ($i = 1; $i <= 20; $i += 2) {
    print ($i . ',');
}
?>
    </p>
</body>
</html>