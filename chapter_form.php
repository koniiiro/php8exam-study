<?php
// 【A】に相当する部分
$user_name = "小西";

// 【C】に「<<<_END_」を記述するのが正解（開始と終了を合わせる）
print <<<_END_
<form method="post" action="{$_SERVER['PHP_SELF']}">
    <p>現在のファイルパス（PHP_SELF）: {$_SERVER['PHP_SELF']}</p>
    Your Name: <input type="text" name="user" value="{$user_name}" />
    <br />
    <button type="submit">Say Hello</button>
</form>
_END_;

// 補足：ヒアドキュメント内では、{$変数名} と書くと変数の中身が表示されます。
?>