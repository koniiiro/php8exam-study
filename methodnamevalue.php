<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p> 
コードAによりWeb上で表示されるフォームにおいて、テキストボックスに「30」を入力し、メニューで「Yellow Banana」を選択してサブミットした場合、2つの値（「30」「Yellow Banana」）を表示させるコードBの【A】【B】に入る正しい組み合わせはどれか。<br>



[ コードA ]<br>

＜form method="POST" action="fruits.php"＞<br>

  ＜input type="text" name="fruits_id"＞<br>

  ＜select name="category"＞<br><br>

      ＜option value="red"＞Red Apple＜/option＞<br>

      ＜option value="yellow"＞Yellow Banana＜/option＞<br>

      ＜option value="orange"＞Orange Mango＜/option＞<br>

  ＜/select＞<br>

  ＜input type="submit" name="submit"＞<br>

＜/form＞<br>


[コードB]<br>

Here are the submitted values:＜br /＞<br>

value1: ＜? php print 【A】 ?? '' ?＞<br>

＜br /＞<br>

value2: ＜? php print 【B】 ?? '' ?＞<br><br>

1. 【A】と【B】に入る正解の導き方<br>
手順①：送り方（method）を確認する<br>
コードAの1行目を見ると <form method="POST" ...> とあります。<br>
PHPでこれを受け取るには、スーパーグローバル変数 $_POST を使います。<br><br>

手順②：名前（name）を確認する<br>
テキストボックスの name は fruits_id です。<br><br>

セレクトメニューの name は category です。<br>
この name の値が、$_POST という配列の「キー（添字）」になります。<br><br>

手順③：送られる値（value）を確認する<br>
テキストボックスには「30」と入力したので、そのまま 30 が送られます。<br>

セレクトメニューで「Yellow Banana」を選択した場合、画面に表示されている文字ではなく、その option タグの value="yellow" の値が送られます。<br><br>

2. 正解の組み合わせ<br>
【A】: $_POST['fruits_id']<br>

【B】: $_POST['category']<br><br>

実行結果として value1: 30, value2: yellow と表示されることになります（※選択肢によっては value2 が yellow になる点に注意してください）。<br><br>

🎯 試験直前の最終チェックポイント<br>
POSTかGETか:<br>

<form method="POST"> なら $_POST。<br>

<form method="GET"> なら $_GET。<br>

もし method が書かれていなければ、デフォルトの GET になります。<br><br>

セレクトボックスの罠:<br>

ユーザーが見ている文字（Yellow Banana）ではなく、value 属性に書かれた値がPHPに届きます。<br>

綴りに注意:
<br>
すべて大文字で $_POST です。<br>

</p>  


</body>
</html>