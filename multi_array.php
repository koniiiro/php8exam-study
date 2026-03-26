<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
$numbers = array(array('1', '2', '3'), array('4', '5', '6'), array('7', '8', '9'));



function judge($arg) {

  $arg = $arg ** 2;

  if ($arg < 20){

      return array($arg, "low");

  } elseif ($arg < 45) {

      return array($arg, "middle");

  } else {

      return array($arg, "high");

  }

}

$result = judge($numbers[1][2]);

print($result[0]." => ". $result[1]);
?>

    <p>
**「多次元配列の構造」と「関数の戻り値（配列）」**の2点を正確に読み解けるか<br>

落ち着いて、データの流れを追いかけていきましょう。<br>

1. 多次元配列から値を取り出す<br>
まず、$numbers[1][2] がどの数字を指しているかを特定します。
PHPの配列は 0番目 から数えるのが鉄則です。<br>

$numbers[1]（外側の配列の2番目）<br>
→ array('4', '5', '6') を指します。<br>

$numbers[1][2]（その中の3番目）<br>
→ '6' を指します。<br><br>

2. 関数 judge の中身を計算する<br>
取り出した '6' を引数として関数に渡します。<br><br>

計算: $arg = 6 ** 2; （6の2乗）<br>
→ $arg は 36 になります。<br>

条件分岐:<br>

if (36 < 20) → 不成立<br>

elseif (36 < 45) → 成立！<br>

戻り値: return array(36, "middle"); が実行されます。<br><br>

3. 結果の表示<br>
変数 $result には、関数から返された配列 array(36, "middle") が入っています。<br>

$result[0] は 36<br>

$result[1] は "middle"<br>

最後に print でこれらを結合します：<br>
36 . " => " . "middle"<br>

実行結果は、 36 => middle となります。<br><br>

試験直前アドバイス：多次元配列の数え方<br>
もし試験中に混乱したら、指で 「ゼロ、イチ、ニ…」 と数えるのが一番確実です。<br>

[1] を見た時：「1番目」ではなく「2つ目のグループ」<br>

[2] を見た時：「2番目」ではなく「その中の3つ目」<br>

この「0から数える」感覚さえズレなければ、多次元配列の問題は得点源になります！<br>

    </p>
</body>
</html>