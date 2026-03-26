<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        [ 実行結果 ] <br>

16 is a multiple of 8, 13 is indivisible by 4<br><br>


[ コード ]<br>

function calc($a, $b) {<br>

  if ($a % $b !== 0){<br>

  【A】 new Exception($a . ' is indivisible by ' . $b);<br>

  }<br>

  return ($a . ' is a multiple of ' . $b);<br>

}<br>

try {<br>

  print calc(16, 8). ", ";<br>

  print calc(13, 4). ", ";<br>

  print calc(10, 2). ", ";<br>

} 【B】 (Exception $e) {<br>

  print $e->【C】;<br>

}<br>

この問題は、PHPの**「例外処理（エラーハンドリング）」**という仕組みを理解しているかを問う内容です。<br>
プログラムが予期せぬ事態に陥ったとき、どうやってそれを報告し、どうやって受け止めるかという一連の流れがテーマになっています。<br><br>

初学者の方でもイメージしやすいよう、**「ボールを投げる（エラーを出す）」と「キャッチする（エラーを処理する）」**という例えで説明しますね。<br>
<br>
1. 例外処理の「3点セット」を覚えよう！<br>
PHPの例外処理は、必ずこの3つのキーワードがセットになります。<br>

throw（投げる）: 「エラーが起きたぞ！」と、例外というボールを投げます。<br>

try（試す）: 「エラーが起きるかもしれない処理」をこのブロックの中で実行します。<br>

catch（捕まえる）: 投げられたボール（例外）を受け取って、その後の対策をします。<br><br>

2. 【A】【B】【C】に入る正解の理由<br>
【A】：throw<br>
関数 calc の中で、割り切れない場合に例外を発生させています。「例外を発生させる（ボールを投げる）」コマンドは throw です。
<br>
throw new Exception(...) という形で書くのが決まり文句です。<br><br>

【B】：catch<br>
try ブロックの中でエラーが起きたとき、それを受け止めるのは catch ブロックです。<br>

try { ... } catch (Exception $e) { ... } という構文になります。<br><br>

【C】：getMessage()<br>
catch した例外オブジェクト（$e）から、設定したメッセージを取り出すための専用の命令（メソッド）です。
<br>
PHPの Exception クラスには、メッセージを取得するための getMessage() という名前のメソッドが用意されています。
<br><br>
3. このプログラムの動きをシミュレーション<br>
calc(16, 8) を実行 → 16÷8は余り0なので、そのまま "16 is a multiple of 8" を返して表示。<br>

calc(13, 4) を実行 → 13÷4は余り1。if文が成立し、throw で例外を投げます。<br>

例外が投げられた瞬間、try ブロックの実行は中断されます（calc(10, 2) は実行されません）。<br>

投げられた例外を catch が捕まえ、$e->getMessage() でメッセージ "13 is indivisible by 4" を表示します。<br><br>

🎯 試験直前アドバイス<br>
キーワードの綴り: throw (最後はw)、catch (c-a-t-c-h)。<br>

メッセージ取得: getMessage()。これ以外の getMsg() や print() などは引っかけです！<br>

小西さん、例外処理は最初は難しく感じますが、**「throw（投げる）」「try（試す）」「catch（捕まえる）」**というリズムで覚えるとすっと頭に入ります。<br>
    </p>
</body>
</html>