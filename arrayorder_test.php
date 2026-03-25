<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
1. 配列の状態を確認<br>
まず、配列 $num にデータがどう入っているかを整理します。コードの記述順に注目してください。<br>

$num[0] = 'zero';<br>

$num[1] = 'one';<br>

$num[3] = 'three'; （先に3番が作られる）<br>

$num[2] = 'two'; （後から2番が作られる）<br>

PHPの内部では、データは「入れた順番」を記憶していますが、**添字（0, 1, 2...）**はただのラベルとして機能します。<br>
<br>
2. 【loop_A】の動き（for文）<br>
for 文は、「添字の数字（0, 1, 2, 3）」を順番に指定して中身を取り出します。<br>

$i = 0 のとき：$num[0]（zero）を表示<br>

$i = 1 のとき：$num[1]（one）を表示<br>

$i = 2 のとき：$num[2]（two）を表示<br>

$i = 3 のとき：$num[3]（three）を表示<br>

そのため、結果は添字の数字順通り zero,one,two,three, になります。<br>
<br>
3. 【loop_B】の動き（foreach文）<br>
ここが最大のポイントです。<br>
foreach 文は、添字の数字に関わらず、**「配列に追加された順番」**で処理を行います。<br><br>

配列 $num にデータが追加された順番は以下の通りでした：<br>

キー 0<br>

キー 1<br>

キー 3<br>

キー 2<br><br>

foreach ($num as $i => $n) では、この「追加順」でキー（$i）を取り出すため、出力結果は 0,1,3,2, となります。<br><br>

    </p>
<?php
$num[0] = 'zero';
$num[1] = 'one';
$num[3] = 'three'; // 先に追加
$num[2] = 'two';   // 後から追加

echo "【loop_A】(添字 0→1→2→3 の順でアクセス)\n";
for ($i = 0; $i < count($num); $i++) {
    echo $num[$i] . ",";
}

echo "\n\n";

echo "【loop_B】(配列に追加された順でアクセス)\n";
foreach ($num as $i => $n) {
    echo $i . ","; // キー（添字）を表示
}
?>

<p>
    試験直前アドバイス<br>
for文は「指定した数字」の箱を開ける。<br>

foreach文は「箱が作られた順番」に中身を取り出す。<br>

もし試験で「わざと添字の順番をバラバラに代入しているコード」が出てきたら、foreach はそのバラバラな代入順を守るということを思い出してください！<br><br>
</p>
</body>
</html>