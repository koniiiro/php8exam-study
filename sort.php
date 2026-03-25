<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
PHPのソート関数には、大きく分けて2つのグループがあります。 <br>

値を並び替えて、キーを振り直すグループ（例：sort）並び替えた後、添字が 0, 1, 2... と自動的にリセットされます。<br>
値を並び替えて、元のキーをそのまま残すグループ（例：asort）「a」は Associative（連想配列） の意味で、キーと値のペアを壊しません。<br>
<br>
2. ソート関数の比較表（これだけ覚えればOK！）試験会場のメモにサッと書けるように整理しました。<br>
関数名並び替えの対象キー（添字）の扱い覚え方sort()値（昇順）リセットされる基本のソート。数字も振り直す。<br>
asort()値（昇順）維持される<br>
Assoc(連想)を維持する。<br>
ksort()キー（昇順）維持されるKey(キー)でソートする。<br>
rsort()値（降順）リセットされる<br>
Reverse(逆順)のソート。<br>


    </p>
    <?php
$data = [
    'a' => 30,
    'b' => 10,
    'c' => 20
];

// 1. sort()：値で並び替えて、キーを 0, 1, 2 にしちゃう
$sort_data = $data;
sort($sort_data);
echo "--- sort()の結果 (キーが消える) ---\n";
foreach($sort_data as $k => $v) echo "$k : $v\n";

echo "\n";

// 2. asort()：値で並び替えるけど、元のキー 'b' などは残す
$asort_data = $data;
asort($asort_data);
echo "--- asort()の結果 (キーが残る) ---\n";
foreach($asort_data as $k => $v) echo "$k : $v\n";
?>

</body>
</html>