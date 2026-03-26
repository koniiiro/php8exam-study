<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    1. なぜ「引数のデフォルト値に変数はダメ」なのか？ <br>
ここが最大のポイントです。<br>
PHPのルールでは、関数の引数にデフォルト値を設定する場合、「定数」や「リテラル（直接書いた数値や文字列）」しか使えません。「変数」を指定することはできないのです。
<br>
× 誤り（できない）: function hello($name = $my_name) { ... }<br>

○ 正しい（できる）: function hello($name = "小西") { ... }<br>

試験で「デフォルト値に変数を使える」という記述が出てきたら、即座に「×」と判断してOKです！<br>
<br>
2. 「関数の定義順」のルール<br>
小西さんが選んだ「PHPエンジンは……すべての関数定義を処理する」という記述は、実は「正しい（合っている）」記述です。<br>

PHPの動き: ファイルを実行する前に、まず「どんな関数があるかな？」と全体をスキャンして登録します。<br>

結果: だから、関数を呼び出すコードが、関数を定義しているコードより「上」にあってもエラーになりません。<br>


<?php
// 1. 呼び出しが先でもOK！
sayHello(); 

// 2. 定義が後でもOK！
function sayHello() {
    echo "こんにちは！";
}
?>

<?php
$default_name = "Guest";

// 【間違いの例】これを実行しようとするとエラーになります
// function greet($name = $default_name) { // 変数はデフォルト値にできない！
//     echo "Hello, $name";
// }

// 【正しい例】
function greet($name = "Guest") { // 文字列（リテラル）ならOK
    echo "Hello, $name";
}

greet(); // "Hello, Guest" と表示される
?>

試験直前アドバイス<br>
デフォルト値のルール: 「固定の値（100, "abc", true）」や「定数」はOK。変数はNG。<br>

定義の場所: 関数はどこに書いてあっても呼び出せる（※ただし、if文の中で定義されている場合などは例外ですが、初級試験では「どこでもOK」と覚えて大丈夫です）。<br>


<p>


</p>
</body>
</html>