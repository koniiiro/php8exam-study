<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
"php" > "perl"	<br>
true <br>
	文字列同士の比較はアルファベット順（辞書順）です。h は e より後ろにあるので、"php" の方が「大きい」と判定されます。
<br>
<br>
0 != "0"<br>	
false<br>
	!= は型を変換して比較します。数値の 0 と文字列の "0" は等しいとみなされるため、!=（等しくない）は false です。
<br><br>

5 - 6 + 1	<br>
false	<br>
計算結果は 0 です。PHPの if 文では、数値の 0 は false と判定されます。<br>
<br>

"false"	<br>
true<br>
	ここが最大のひっかけ！ "false" はただの「中身がある文字列」です。PHPで false と判定される文字列は 空文字 "" と "0" だけ です。
<br><br>

0 + false<br>
	false<br>
    	false は数値に変換されると 0 になります。0 + 0 = 0 となり、数値の 0 は false 扱いです。
    <br><br>

    "543a" < 56	<br>
    true<br>
    	文字列と数値の比較です。PHP8では、数値に見える文字列は数値に変換されますが、"543a" は先頭に数字があっても全体で数値ではないため、文字列として比較されるか、PHPのバージョンによって挙動が繊細ですが、この選択肢は正解に含まれています。
    <br><br>

    abs(-6) > 10 / 2<br>
    	true<br>
        	abs(-6) は絶対値なので 6。10 / 2 は 5。6 > 5 は成り立つので true です。
    <br><br>
🎯 試験で迷わないための「真偽値」ルール<br><br>
if 文の中で false （不合格）扱いになるものを暗記してしまいましょう。これ以外はすべて true です！<br>

数値の 0 または 0.0<br>

空の文字列 ""<br>

文字列の "0" （※これだけ文字列なのに false になる特殊ルール！）<br>

空の配列 []<br>

null<br><br>
    </p>


<?php
// 【4】の確認：文字列の "false" は true なのか？
if ("false") {
    echo '"false" は true です！' . "\n";
}

// 【3】の確認：計算結果が0だとどうなるか？
if (5 - 6 + 1) {
    echo "ここは通りません";
} else {
    echo "0 は false です。" . "\n";
}

// 【1】の確認：文字列の比較
echo ("php" > "perl" ? "phpが大きい" : "perlが大きい") . "\n";
?>

<p>
    明日の試験では：<br>

文字列の "0" と "false" の違いに気をつける。<br>

アルファベット順の比較を落ち着いて行う。<br>

計算結果が 0 にならないか確認する。<br>

この3点だけで、さらに数点アップします！<br>
</p>



</body>
</html>