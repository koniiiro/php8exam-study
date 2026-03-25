<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP8試験対策 Chapter 10-24</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 1rem; font-family: sans-serif; background: #f5f5f0; color: #1a1a18; }
        h1 { font-size: 16px; font-weight: 500; margin-bottom: 1rem; padding-bottom: .5rem; border-bottom: 2px solid #c8c6bc; }
        /* 目次 */
        .toc { background: #f0efe9; border: 0.5px solid #d3d1c7; border-radius: 12px; padding: 1rem; margin-bottom: 1.5rem; }
        .toc-title { font-size: 13px; font-weight: 500; margin-bottom: .5rem; }
        .toc-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 4px 12px; }
        .toc-link { font-size: 12px; color: #185FA5; text-decoration: none; display: block; padding: 2px 0; }
        .toc-link:hover { text-decoration: underline; }
        /* セクション */
        .section { margin-bottom: 1.5rem; scroll-margin-top: 1rem; }
        .section-title { font-size: 15px; font-weight: 500; margin-bottom: .6rem; padding-bottom: .4rem; border-bottom: 1.5px solid #c8c6bc; }
        .card { background: #f0efe9; border: 0.5px solid #d3d1c7; border-radius: 12px; padding: 1rem; margin-bottom: .75rem; }
        .card-title { font-size: 13px; font-weight: 500; margin-bottom: .4rem; }
        .card-body { font-size: 13px; color: #5a5a56; line-height: 1.7; }
        code { font-family: monospace; font-size: 12px; background: #e4e3dc; padding: 1px 5px; border-radius: 4px; }
        .code-block { font-family: monospace; font-size: 12px; background: #e4e3dc; border-radius: 8px; padding: .75rem; margin-top: .5rem; line-height: 1.8; white-space: pre; overflow-x: auto; }
        .choice-row { display: flex; align-items: flex-start; gap: 8px; font-size: 13px; color: #5a5a56; padding: 3px 0; }
        .choice-row.correct { color: #1a1a18; font-weight: 500; }
        .rule-row { display: flex; align-items: flex-start; gap: 8px; margin-bottom: .4rem; }
        .bullet { width: 6px; height: 6px; border-radius: 50%; background: #888780; flex-shrink: 0; margin-top: 6px; }
        .tag-ok   { display: inline-block; background: #EAF3DE; color: #3B6D11; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .tag-ng   { display: inline-block; background: #FCEBEB; color: #A32D2D; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .tag-ans  { display: inline-block; background: #E6F1FB; color: #0C447C; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .tag-warn { display: inline-block; background: #FAEEDA; color: #633806; font-size: 11px; font-weight: 500; border-radius: 4px; padding: 2px 8px; }
        .grid2 { display: grid; grid-template-columns: 1fr 1fr; gap: .75rem; margin-top: .75rem; }
        .inner-card { background: #faf9f6; border: 0.5px solid #d3d1c7; border-radius: 8px; padding: .75rem; }
        .point-box { background: #faf9f6; border-left: 3px solid #378ADD; padding: .75rem 1rem; margin-top: .75rem; font-size: 13px; color: #5a5a56; line-height: 1.7; }
        a.manual { color: #185FA5; font-size: 13px; display: block; margin-bottom: .3rem; }
        /* トグル */
        .toggle-wrap { display: flex; gap: 8px; margin-bottom: .75rem; flex-wrap: wrap; }
        .ver-btn { font-size: 12px; font-weight: 500; padding: 4px 12px; border-radius: 6px; border: 0.5px solid #c8c6bc; background: transparent; color: #5a5a56; cursor: pointer; }
        .ver-btn.active { background: #E6F1FB; color: #185FA5; border-color: #378ADD; }
        .ver-panel { display: none; }
        .ver-panel.active { display: block; }
        /* 戻るボタン */
        .back-top { display: inline-block; font-size: 12px; color: #185FA5; cursor: pointer; margin-bottom: 1rem; text-decoration: none; }
    </style>
</head>
<body>

<h1>PHP8技術者認定初級試験対策 — Chapter 10〜24 要点まとめ</h1>

<!-- 目次 -->
<div class="toc">
    <div class="toc-title">目次（クリックで移動）</div>
    <div class="toc-grid">
        <a class="toc-link" href="#ch10">Ch10 繰り返し構文</a>
        <a class="toc-link" href="#ch11">Ch11 ループの制御</a>
        <a class="toc-link" href="#ch12">Ch12 ユーザ定義関数</a>
        <a class="toc-link" href="#ch13">Ch13 変数のスコープ</a>
        <a class="toc-link" href="#ch14">Ch14 クラスとオブジェクト</a>
        <a class="toc-link" href="#ch15">Ch15 名前空間・オートローダ</a>
        <a class="toc-link" href="#ch16">Ch16 例外処理</a>
        <a class="toc-link" href="#ch17">Ch17 リクエスト情報</a>
        <a class="toc-link" href="#ch18">Ch18 データベース連携</a>
        <a class="toc-link" href="#ch19">Ch19 ビルトイン関数</a>
        <a class="toc-link" href="#ch20">Ch20 ビルトインクラス・予約語</a>
        <a class="toc-link" href="#ch21">Ch21 ファイルの操作</a>
        <a class="toc-link" href="#ch22">Ch22 日付と時刻</a>
        <a class="toc-link" href="#ch23">Ch23 クッキーとセッション</a>
        <a class="toc-link" href="#ch24">Ch24 セキュリティ</a>
    </div>
</div>

<!-- Ch10 -->
<div class="section" id="ch10">
    <div class="section-title">📌 Chapter 10 — 繰り返し（ループ）構文</div>

    <div class="card">
        <div class="card-title">Ch10-1 while / Ch10-2 無限ループ — 要点</div>
        <div class="grid2">
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem">while / do-while の違い</div>
                <div class="code-block">// while：条件が先
$i = 0;
while ($i < 3) {
    echo $i; // 0,1,2
    $i++;
}

// do-while：必ず1回は実行
$i = 10;
do {
    echo $i; // 10（1回だけ）
} while ($i < 3);</div>
            </div>
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem">for ループ</div>
                <div class="code-block">// for (初期化; 条件; 更新)
for ($i = 0; $i < 3; $i++) {
    echo $i; // 0,1,2
}

// foreach（配列に便利）
$arr = ['a','b','c'];
foreach ($arr as $key => $val) {
    echo $key . ':' . $val;
}</div>
            </div>
        </div>
        <div class="card-body" style="margin-top:.75rem"><span class="tag-warn">無限ループ注意</span> <code>while(true)</code> は <code>break</code> を忘れると止まらない。<code>set_time_limit()</code> でタイムアウトを設定できる。</div>
    </div>

    <div class="card">
        <div class="card-title">試験ポイント — 出力結果を追う</div>
        <div class="code-block">// 問：出力は？
$i = 1;
while ($i <= 5) {
    if ($i % 2 === 0) echo $i;
    $i++;
}
// 答：24（2と4）

// 問：do-whileの出力は？
$i = 5;
do {
    echo $i;
    $i--;
} while ($i > 5);
// 答：5（条件falseでも1回は実行）</div>
    </div>
</div>

<!-- Ch11 -->
<div class="section" id="ch11">
    <div class="section-title">📌 Chapter 11 — ループの制御</div>

    <div class="card">
        <div class="card-title">Ch11-1 break / continue — 要点</div>
        <div class="grid2">
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem">break：ループを抜ける</div>
                <div class="code-block">for ($i = 0; $i < 5; $i++) {
    if ($i === 3) break;
    echo $i; // 012
}

// break 2：2重ループを抜ける
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        if ($j === 1) break 2;
        echo $i.','.$j; // 0,0
    }
}</div>
            </div>
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem">continue：次の繰り返しへ</div>
                <div class="code-block">for ($i = 0; $i < 5; $i++) {
    if ($i === 3) continue;
    echo $i; // 0124（3をスキップ）
}

// continue 2：外側ループの次へ
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        if ($j === 1) continue 2;
        echo $i.','.$j;
        // 0,0  1,0  2,0
    }
}</div>
            </div>
        </div>
        <div class="point-box"><strong>試験頻出：</strong> <code>break 2</code> と <code>continue 2</code> の数字は「何重のループを対象にするか」。<code>break</code> は完全脱出、<code>continue</code> は次のイテレーションへスキップ。</div>
    </div>
</div>

<!-- Ch12 -->
<div class="section" id="ch12">
    <div class="section-title">📌 Chapter 12 — ユーザ定義関数</div>

    <div class="card">
        <div class="card-title">Ch12-1 ユーザ定義関数 — 要点</div>
        <div class="code-block">// 基本
function greet(string $name): string {
    return 'こんにちは、' . $name;
}

// デフォルト引数
function greet2(string $name = '名無し'): string {
    return 'こんにちは、' . $name;
}
echo greet2(); // こんにちは、名無し

// 可変長引数（スプレッド演算子）
function sum(int ...$nums): int {
    return array_sum($nums);
}
echo sum(1, 2, 3); // 6

// 参照渡し（&）
function addOne(int &$n): void {
    $n++;
}
$x = 5;
addOne($x);
echo $x; // 6（元の変数が変わる）</div>

        <div class="card-body" style="margin-top:.75rem"><span class="tag-warn">PHP 8 の型宣言</span> 引数と戻り値に型を指定できる。<code>?string</code> は nullable（nullも許容）。<code>void</code> は返り値なし。</div>
    </div>

    <div class="card">
        <div class="card-title">名前付き引数（PHP 8〜）</div>
        <div class="code-block">function makeTag(string $tag, string $content, bool $bold = false): string {
    $inner = $bold ? "&lt;b&gt;{$content}&lt;/b&gt;" : $content;
    return "&lt;{$tag}&gt;{$inner}&lt;/{$tag}&gt;";
}

// 名前付き引数：順番不問、省略可能
echo makeTag(content: 'Hello', tag: 'p');
// &lt;p&gt;Hello&lt;/p&gt;

echo makeTag(tag: 'p', content: 'Hello', bold: true);
// &lt;p&gt;&lt;b&gt;Hello&lt;/b&gt;&lt;/p&gt;</div>
        <div class="point-box"><strong>試験頻出：</strong> 参照渡し（<code>&amp;</code>）は元の変数を変更する。値渡しは元の変数を変更しない。</div>
    </div>
</div>

<!-- Ch13 -->
<div class="section" id="ch13">
    <div class="section-title">📌 Chapter 13 — 変数のスコープ</div>

    <div class="card">
        <div class="card-title">Ch13-1 変数のスコープ — 要点</div>
        <div class="grid2">
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem"><span class="tag-ng">NG</span> 関数内から外の変数は見えない</div>
                <div class="code-block">$name = '太郎';

function greet() {
    echo $name; // 未定義エラー！
    // 関数内から外の$nameは見えない
}
greet();</div>
            </div>
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem"><span class="tag-ok">OK</span> global / static</div>
                <div class="code-block">$name = '太郎';

function greet() {
    global $name; // グローバル変数を使う
    echo $name; // 太郎
}

function counter() {
    static $count = 0; // 呼び出し間で値を保持
    $count++;
    echo $count;
}
counter(); // 1
counter(); // 2
counter(); // 3</div>
            </div>
        </div>
        <div class="point-box"><strong>試験頻出：</strong> <code>static</code> 変数は関数を何度呼び出しても値がリセットされない。<code>global</code> はなるべく使わない（バグの原因になる）。</div>
    </div>
</div>

<!-- Ch14 -->
<div class="section" id="ch14">
    <div class="section-title">📌 Chapter 14 — クラスとオブジェクト</div>

    <div class="card">
        <div class="card-title">Ch14-1 コンストラクタ（PHP 8）</div>
        <div class="grid2">
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem">従来の書き方</div>
                <div class="code-block">class User {
    public string $name;
    public int $age;

    public function __construct(
        string $name,
        int $age
    ) {
        $this->name = $name;
        $this->age  = $age;
    }
}</div>
            </div>
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem">PHP 8 コンストラクタプロモーション</div>
                <div class="code-block">class User {
    // 引数にアクセス修飾子をつけるだけ
    public function __construct(
        public string $name,
        public int $age
    ) {}
}
$u = new User('太郎', 20);
echo $u->name; // 太郎</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-title">Ch14-2 静的メソッド / Ch14-3 アクセス修飾子</div>
        <div class="code-block">class MyClass {
    public    string $pub  = '誰でもアクセス可';
    protected string $pro  = '自身と継承クラスのみ';
    private   string $pri  = '自身のみ';

    // static：インスタンス不要で呼べる
    public static function hello(): string {
        return 'Hello!';
    }
}

echo MyClass::hello(); // Hello!（:: で呼ぶ）

$obj = new MyClass();
echo $obj->pub; // OK
// echo $obj->pri; // エラー！</div>
        <div class="point-box"><strong>アクセス修飾子の覚え方：</strong> public（全員OK）→ protected（家族OK）→ private（自分だけ）</div>
    </div>

    <div class="card">
        <div class="card-title">Ch14-4 継承</div>
        <div class="code-block">class Animal {
    public function speak(): string {
        return '...';
    }
}

class Dog extends Animal {
    // オーバーライド（上書き）
    public function speak(): string {
        return 'ワン！';
    }
}

class Cat extends Animal {
    public function speak(): string {
        return 'ニャン！';
    }
    public function parentSpeak(): string {
        return parent::speak(); // 親のメソッドを呼ぶ
    }
}

$dog = new Dog();
echo $dog->speak(); // ワン！</div>
        <div class="card-body" style="margin-top:.5rem"><span class="tag-warn">重要</span> PHPは単一継承のみ（extends は1つだけ）。複数の機能を持たせたい場合は <code>interface</code> や <code>trait</code> を使う。</div>
    </div>
</div>

<!-- Ch15 -->
<div class="section" id="ch15">
    <div class="section-title">📌 Chapter 15 — 名前空間・オートローダ</div>

    <div class="card">
        <div class="card-title">Ch15-1 名前空間（namespace）— 要点</div>
        <div class="code-block">// ファイル先頭に宣言
namespace App\Models;

class User {
    public string $name = '太郎';
}

// 別ファイルから使う
use App\Models\User;
$u = new User();

// エイリアス
use App\Models\User as AppUser;
$u = new AppUser();</div>
        <div class="card-body" style="margin-top:.5rem">名前空間は「クラス名の衝突を防ぐ」仕組み。フォルダ構造のようにクラスを整理できる。</div>
        <div class="point-box"><strong>オートローダ：</strong> <code>spl_autoload_register()</code> でクラスを自動読み込みできる。Composerの <code>autoload</code> 設定が実務では一般的。</div>
    </div>
</div>

<!-- Ch16 -->
<div class="section" id="ch16">
    <div class="section-title">📌 Chapter 16 — 例外処理</div>

    <div class="card">
        <div class="card-title">Ch16-1 例外処理 / Ch16-2 catch の順序 — 要点</div>
        <div class="code-block">// 基本構造
try {
    // 例外が起きうる処理
    throw new InvalidArgumentException('不正な引数');
} catch (InvalidArgumentException $e) {
    echo '引数エラー: ' . $e->getMessage();
} catch (Exception $e) {
    // 上のcatchで捕まえられなかった場合
    echo '汎用エラー: ' . $e->getMessage();
} finally {
    // 例外の有無に関わらず必ず実行
    echo '後処理完了';
}</div>
        <div class="point-box">
            <strong>catchの順序は重要！</strong><br>
            子クラスの例外を先に書く。<code>Exception</code>（親）を先に書くと、子クラスの例外もそこで捕まえられてしまう。<br><br>
            <strong>PHP 8 のunion catch：</strong><br>
            <code>catch (TypeError | ValueError $e)</code> のように複数の例外を1つのcatchで捕まえられる。
        </div>
    </div>

    <div class="card">
        <div class="card-title">例外クラスの継承ツリー（試験頻出）</div>
        <div class="code-block">Throwable（インターフェース）
├── Error（PHPエンジンレベルのエラー）
│   ├── TypeError
│   ├── ValueError
│   └── UnhandledMatchError（PHP 8）
└── Exception（アプリケーションレベル）
    ├── InvalidArgumentException
    ├── RuntimeException
    └── LogicException</div>
        <div class="card-body" style="margin-top:.5rem"><span class="tag-warn">注意</span> <code>Error</code> と <code>Exception</code> は別系統。両方捕まえたい場合は <code>Throwable</code> を catch する。</div>
    </div>
</div>

<!-- Ch17 -->
<div class="section" id="ch17">
    <div class="section-title">📌 Chapter 17 — リクエスト情報</div>

    <div class="card">
        <div class="card-title">Ch17-1 スーパーグローバル変数 / Ch17-2 配列を扱う — 要点</div>
        <div class="code-block">// 主なスーパーグローバル変数
$_GET['key']     // URLのクエリパラメータ
$_POST['key']    // POSTデータ
$_REQUEST['key'] // GET+POST+COOKIEをまとめたもの
$_SERVER['key']  // サーバー情報
$_FILES['key']   // アップロードされたファイル
$_COOKIE['key']  // クッキー
$_SESSION['key'] // セッション
$_ENV['key']     // 環境変数
$GLOBALS['key']  // グローバル変数すべて</div>

        <div class="code-block" style="margin-top:.75rem">// フォームから配列を受け取る
// HTML: &lt;input name="colors[]" value="red"&gt;
//       &lt;input name="colors[]" value="blue"&gt;

$colors = $_POST['colors']; // ['red', 'blue']

// チェックボックスなど複数選択も同様
// セキュリティ：必ず値の検証をすること</div>
        <div class="point-box"><strong>試験頻出：</strong> <code>$_SERVER['REQUEST_METHOD']</code> でGET/POSTを判定。<code>$_SERVER['PHP_SELF']</code> で現在のファイルパスを取得。</div>
    </div>
</div>

<!-- Ch18 -->
<div class="section" id="ch18">
    <div class="section-title">📌 Chapter 18 — データベース連携</div>

    <div class="card">
        <div class="card-title">Ch18-1 パラメータ / Ch18-2 結果セットの取得 — 要点</div>
        <div class="code-block">// PDO接続
$pdo = new PDO(
    'mysql:host=localhost;dbname=mydb;charset=utf8',
    'username',
    'password'
);

// プリペアドステートメント（SQLインジェクション対策）
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

// 結果の取得
$row  = $stmt->fetch(PDO::FETCH_ASSOC);    // 1行
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // 全行

// ? プレースホルダ
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$id]);</div>
        <div class="point-box">
            <strong>試験頻出：</strong><br>
            <code>PDO::FETCH_ASSOC</code>：カラム名をキーとした連想配列<br>
            <code>PDO::FETCH_NUM</code>：数値インデックスの配列<br>
            <code>PDO::FETCH_OBJ</code>：オブジェクトとして取得<br>
            プリペアドステートメントは必須。直接文字列結合はSQLインジェクションの原因。
        </div>
    </div>
</div>

<!-- Ch19 -->
<div class="section" id="ch19">
    <div class="section-title">📌 Chapter 19 — ビルトイン関数</div>

    <div class="card">
        <div class="card-title">Ch19-1 文字列操作 — 頻出関数</div>
        <div class="code-block">strlen('hello')          // 5（文字数）
mb_strlen('あいう')     // 3（マルチバイト対応）
strpos('hello', 'l')    // 2（最初の位置）
str_replace('l','r','hello') // 'herro'
substr('hello', 1, 3)   // 'ell'（位置1から3文字）
strtolower('HELLO')     // 'hello'
strtoupper('hello')     // 'HELLO'
trim('  hello  ')       // 'hello'（前後の空白除去）
explode(',', 'a,b,c')   // ['a','b','c']
implode(',', ['a','b'])  // 'a,b'
sprintf('%05d', 42)     // '00042'
htmlspecialchars($str)  // XSS対策（&lt; → &amp;lt; など）</div>
    </div>

    <div class="card">
        <div class="card-title">Ch19-2 配列操作 — 頻出関数</div>
        <div class="code-block">count([1,2,3])           // 3
array_push($arr, 4)     // 末尾に追加
array_pop($arr)         // 末尾から取り出し
array_shift($arr)       // 先頭から取り出し
array_unshift($arr, 0)  // 先頭に追加
array_merge($a, $b)     // 配列を結合
array_slice($arr, 1, 2) // 位置1から2個
array_search(3, $arr)   // 値3のキーを返す
in_array(3, $arr)       // 3が含まれるか true/false
array_keys($arr)        // キーの配列
array_values($arr)      // 値の配列
sort($arr)              // 昇順ソート（キーは振り直し）
asort($arr)             // 値で昇順ソート（キー保持）
ksort($arr)             // キーで昇順ソート
array_map(fn($v)=>$v*2, $arr) // 各要素を変換
array_filter($arr, fn($v)=>$v>2) // 条件でフィルタ</div>
    </div>
</div>

<!-- Ch20 -->
<div class="section" id="ch20">
    <div class="section-title">📌 Chapter 20 — ビルトインクラス・予約語</div>

    <div class="card">
        <div class="card-title">Ch20-1 ビルトインクラス — 頻出</div>
        <div class="code-block">// DateTime
$dt = new DateTime('2024-01-01');
echo $dt->format('Y/m/d'); // 2024/01/01
$dt->modify('+1 month');
echo $dt->format('Y/m/d'); // 2024/02/01

// DateTimeImmutable（変更不可・推奨）
$dt = new DateTimeImmutable('2024-01-01');
$dt2 = $dt->modify('+1 day'); // 新しいオブジェクトを返す

// ArrayObject
$ao = new ArrayObject(['a'=>1, 'b'=>2]);
$ao->append('c');
echo $ao->count(); // 3

// SplStack / SplQueue（データ構造）
$stack = new SplStack();
$stack->push('first');
$stack->push('second');
echo $stack->pop(); // 'second'（LIFO）</div>
    </div>

    <div class="card">
        <div class="card-title">Ch20-2 予約語 — 試験頻出キーワード</div>
        <div class="code-block">// 型宣言
int, float, string, bool, array, object, null, void, never

// PHP 8 の Union Types
function test(int|string $val): int|false { ... }

// nullable
function test(?string $val): ?string { ... }

// readonly（PHP 8.1）
class User {
    public readonly string $name; // 一度だけ代入可
}

// abstract / interface / trait
abstract class Base { abstract public function run(): void; }
interface Runnable { public function run(): void; }
trait Loggable { public function log(): void { echo 'log'; } }

// final：継承・オーバーライド禁止
final class Singleton { ... }
class Parent2 {
    final public function cannotOverride(): void { ... }
}</div>
    </div>
</div>

<!-- Ch21 -->
<div class="section" id="ch21">
    <div class="section-title">📌 Chapter 21 — ファイルの操作</div>

    <div class="card">
        <div class="card-title">Ch21-1 オープンモード — 要点</div>
        <div class="code-block">// fopen のモード
'r'  // 読み込み（ファイルが存在しないとエラー）
'w'  // 書き込み（既存内容を消去、なければ作成）
'a'  // 追記（末尾に追加、なければ作成）
'x'  // 書き込み（存在するとエラー）
'r+' // 読み書き（ファイルが存在しないとエラー）

// 基本的なファイル操作
$handle = fopen('file.txt', 'r');
$line = fgets($handle);   // 1行読み込み
$all  = fread($handle, filesize('file.txt')); // 全読み込み
fclose($handle);

// 簡単な方法
$content = file_get_contents('file.txt');     // 全内容を文字列で
file_put_contents('file.txt', 'Hello');       // 上書き
file_put_contents('file.txt', 'Hi', FILE_APPEND); // 追記
$lines = file('file.txt'); // 行ごとの配列</div>
        <div class="point-box"><strong>試験頻出：</strong> <code>'w'</code> は既存ファイルを消去、<code>'a'</code> は追記、<code>'r'</code> は読み込みのみ。<code>file_get_contents</code> と <code>file_put_contents</code> が最もよく使われる。</div>
    </div>
</div>

<!-- Ch22 -->
<div class="section" id="ch22">
    <div class="section-title">📌 Chapter 22 — 日付と時刻</div>

    <div class="card">
        <div class="card-title">Ch22-1 日付の操作 — 要点</div>
        <div class="code-block">// 現在時刻
echo date('Y-m-d H:i:s');   // 2024-01-15 12:30:00
echo time();                  // Unixタイムスタンプ（秒）

// よく使うフォーマット文字
// Y：4桁年  m：月  d：日
// H：時（24h）  i：分  s：秒
// D：曜日（短縮）  N：曜日（1=月〜7=日）

// タイムスタンプ → 日付
echo date('Y/m/d', mktime(0,0,0,3,15,2024)); // 2024/03/15

// strtotime：文字列 → タイムスタンプ
echo date('Y-m-d', strtotime('+1 week'));
echo date('Y-m-d', strtotime('next Monday'));

// DateTime クラス（推奨）
$now = new DateTimeImmutable();
$next = $now->modify('+3 days');
echo $next->format('Y-m-d');</div>
        <div class="point-box"><strong>タイムゾーン注意：</strong> <code>date_default_timezone_set('Asia/Tokyo')</code> で日本時間に設定。php.ini の <code>date.timezone</code> でも設定可能。</div>
    </div>
</div>

<!-- Ch23 -->
<div class="section" id="ch23">
    <div class="section-title">📌 Chapter 23 — クッキーとセッション</div>

    <div class="card">
        <div class="card-title">Ch23-1 クッキー / Ch23-2 有効期限 — 要点</div>
        <div class="grid2">
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem">クッキー（Cookie）</div>
                <div class="code-block">// セット（ヘッダー送信前に呼ぶ）
setcookie(
    'username',         // 名前
    '太郎',             // 値
    time() + 3600,      // 有効期限（1時間後）
    '/',                // パス
    '',                 // ドメイン
    true,               // HTTPS only
    true                // HTTPOnly（JSからアクセス不可）
);

// 読み取り
echo $_COOKIE['username'];

// 削除（過去の時刻を指定）
setcookie('username', '', time() - 1);</div>
            </div>
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem">セッション（Session）</div>
                <div class="code-block">// 開始（必ずページ先頭で）
session_start();

// 値の保存
$_SESSION['user_id'] = 123;
$_SESSION['name'] = '太郎';

// 読み取り
echo $_SESSION['name'];

// 一部削除
unset($_SESSION['name']);

// セッション全体を破棄
session_destroy();</div>
            </div>
        </div>
        <div class="point-box">
            <strong>クッキー vs セッションの違い：</strong><br>
            クッキー：ブラウザに保存。有効期限を指定可能。ユーザーが改ざん可能。<br>
            セッション：サーバーに保存。ブラウザを閉じると消える（デフォルト）。セキュアだが、サーバー負荷がある。
        </div>
    </div>
</div>

<!-- Ch24 -->
<div class="section" id="ch24">
    <div class="section-title">📌 Chapter 24 — セキュリティ</div>

    <div class="card">
        <div class="card-title">Ch24-1 エラーのレポート — 要点</div>
        <div class="code-block">// エラーレポートレベル
error_reporting(E_ALL);           // 全エラー表示
error_reporting(E_ALL & ~E_NOTICE); // NOTICE以外

// 表示設定
ini_set('display_errors', '1');   // 開発時：表示する
ini_set('display_errors', '0');   // 本番時：表示しない
ini_set('log_errors', '1');       // ログには記録する

// エラーレベルの種類
// E_ERROR   ：致命的エラー（スクリプト停止）
// E_WARNING ：警告（処理は続行）
// E_NOTICE  ：注意（処理は続行）
// E_STRICT  ：コーディング標準の警告

// カスタムエラーハンドラ
set_error_handler(function($errno, $errstr) {
    error_log("Error[$errno]: $errstr");
});</div>
    </div>

    <div class="card">
        <div class="card-title">Ch24-2 SQLインジェクション — 要点</div>
        <div class="grid2">
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem"><span class="tag-ng">危険：直接埋め込み</span></div>
                <div class="code-block">$id = $_GET['id'];
// 例：id=1 OR 1=1 を渡されると全件取得される
$sql = "SELECT * FROM users
        WHERE id = $id";
$pdo->query($sql); // 危険！</div>
            </div>
            <div class="inner-card">
                <div style="font-size:12px;font-weight:500;margin-bottom:.3rem"><span class="tag-ok">安全：プリペアドステートメント</span></div>
                <div class="code-block">$id = $_GET['id'];
$stmt = $pdo->prepare(
    'SELECT * FROM users WHERE id = ?'
);
$stmt->execute([$id]); // 安全！
$row = $stmt->fetch();</div>
            </div>
        </div>
        <div class="card-body" style="margin-top:.75rem">その他の主要なセキュリティ対策：</div>
        <div class="code-block">// XSS対策（出力時にエスケープ）
echo htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

// CSRF対策（トークン）
$_SESSION['token'] = bin2hex(random_bytes(32));
// フォームに hidden で埋め込み、受信時に検証

// パスワードのハッシュ化
$hash = password_hash($password, PASSWORD_BCRYPT);
$ok   = password_verify($input, $hash); // 検証

// ファイルアップロード検証
$allowed = ['image/jpeg', 'image/png'];
if (!in_array($_FILES['file']['type'], $allowed)) {
    // エラー処理
}</div>
        <div class="point-box">
            <strong>試験頻出セキュリティ用語：</strong><br>
            <strong>SQLインジェクション</strong>：プリペアドステートメントで対策<br>
            <strong>XSS（クロスサイトスクリプティング）</strong>：htmlspecialchars() で対策<br>
            <strong>CSRF（クロスサイトリクエストフォージェリ）</strong>：トークン検証で対策<br>
            <strong>ディレクトリトラバーサル</strong>：basename() でパスをサニタイズ
        </div>
    </div>
</div>

<!-- 試験直前チェック -->
<div class="section">
    <div class="section-title">🎯 試験直前チェックリスト</div>
    <div class="card">
        <div class="toggle-wrap">
            <button class="ver-btn active" id="check-btn1" onclick="switchCheck('basic')">基本構文</button>
            <button class="ver-btn" id="check-btn2" onclick="switchCheck('oop')">OOP</button>
            <button class="ver-btn" id="check-btn3" onclick="switchCheck('security')">セキュリティ</button>
            <button class="ver-btn" id="check-btn4" onclick="switchCheck('php8')">PHP 8 新機能</button>
        </div>

        <div class="ver-panel active" id="check-basic">
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>==</code> は緩やかな比較、<code>===</code> は厳密な比較（型も比較）</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>else</code> に条件式はつけられない → <code>elseif</code> を使う</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>break 2</code> は2重ループを抜ける、<code>continue 2</code> は外側ループの次のイテレーションへ</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>$a++</code>（後置）は値を返してからインクリメント、<code>++$a</code>（前置）は先にインクリメントして値を返す</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">関数内からグローバル変数を使うには <code>global</code> キーワードが必要</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>static</code> 変数は関数を何度呼んでも値がリセットされない</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">左シフト <code>&lt;&lt; n</code> は × 2ⁿ、右シフト <code>&gt;&gt; n</code> は ÷ 2ⁿ</div></div>
        </div>

        <div class="ver-panel" id="check-oop">
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>public</code>（誰でも）→ <code>protected</code>（自身と子クラス）→ <code>private</code>（自身のみ）</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">静的メソッド・プロパティは <code>クラス名::</code> でアクセス（インスタンス不要）</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">PHPは単一継承のみ。<code>interface</code> は複数実装可能</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>parent::</code> で親クラスのメソッドを呼ぶ</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>abstract</code> クラスはインスタンス化できない</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>final</code> クラスは継承不可、<code>final</code> メソッドはオーバーライド不可</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">catchの順序は子クラス→親クラスの順（Exceptionを最後に）</div></div>
        </div>

        <div class="ver-panel" id="check-security">
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">SQLインジェクション → プリペアドステートメント（<code>prepare</code> + <code>execute</code>）</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">XSS → <code>htmlspecialchars($str, ENT_QUOTES, 'UTF-8')</code></div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">パスワード → <code>password_hash()</code> と <code>password_verify()</code></div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">セッション開始は <code>session_start()</code>（ページ先頭、出力前）</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">本番環境では <code>display_errors = 0</code>、<code>log_errors = 1</code></div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">クッキーには <code>HttpOnly</code>・<code>Secure</code> フラグを設定する</div></div>
        </div>

        <div class="ver-panel" id="check-php8">
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>match</code> 式：厳密比較（===）、返り値あり、switch の代替</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">コンストラクタプロモーション：引数にアクセス修飾子をつけるだけでプロパティ定義</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">名前付き引数：<code>func(name: '太郎', age: 20)</code> 順番不問</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">Union Types：<code>int|string</code> のように複数の型を指定</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0">Nullsafe演算子：<code>$user?->getAddress()?->city</code></div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>0 == ''</code> は PHP 8 で false（PHP 7 では true）</div></div>
            <div class="rule-row"><div class="bullet"></div><div class="card-body" style="margin:0"><code>+</code> は <code>.</code>（文字列結合）より優先度が高い（PHP 8から変更）</div></div>
        </div>
    </div>
</div>

<script>
    function switchCheck(k) {
        ['basic','oop','security','php8'].forEach(function(v) {
            document.getElementById('check-' + v).classList.toggle('active', v === k);
        });
        document.getElementById('check-btn1').classList.toggle('active', k === 'basic');
        document.getElementById('check-btn2').classList.toggle('active', k === 'oop');
        document.getElementById('check-btn3').classList.toggle('active', k === 'security');
        document.getElementById('check-btn4').classList.toggle('active', k === 'php8');
    }
</script>

</body>
</html>