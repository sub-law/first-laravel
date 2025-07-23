# first-laravel
# Laravel教材：ルート設定とビュー表示の学習

## 概要
Laravelを使った教材開発のステップ記録。  
このステップでは、`Route → Controller → View → Browser` までの画面表示の基本を学習した。

## 使用技術
- Laravel 10.x
- Docker / Docker Compose
- VS Code / WSL2
- Git / GitHub

## 学習ステップ
### STEP 01：/test ルートからビュー表示まで
- `/` にGETルートを定義
- `TestController` を artisanコマンドで生成
- `index()` メソッドを作成し `view('index')` を返却
- ビュー `index.blade.php` を作成して表示確認
- Gitに学習履歴を記録し、Pull Requestとして整理

## コマンド記録
```bash
docker-compose exec php bash
php artisan make:controller TestController
mv resources/views/index.php resources/views/index.blade.php
git add .
git commit -m "ルート設定とビュー表示の学習"
git push

##ブラウザに画面表示をしよう:route編
2025/07/21
## STEP03: ルーティングによる画面表示とパラメータ受け取り（Laravel）

### 🎯 学習目的
Laravelのルーティング機能を使って、画面表示の処理を理解し、URLパラメータの受け渡しや任意化による柔軟な表示制御を体験する。

### 🛠 実装内容
- コントローラ `TestController` にて `index($text = "デフォルト")` を定義
  - パラメータがあればその値を、なければ `"デフォルト"` を表示
- `$item` 配列に `content` と `param` を格納し、`view('index', $item)` に渡す
- Viewファイル `index.blade.php` にて `$content`, `$param` を表示

### 🔗 ルーティング設定（`routes/web.php`）
```php
use App\Http\Controllers\TestController;

Route::get('/test/{test?}', [TestController::class, 'index']);
## STEP04: Requestオブジェクトによるクエリパラメータ受け取り

### 🧠 ポイント
- `Request` クラスを使用して、URLのクエリ文字列（`?text=〇〇`）から値を取得
- パスパラメータ（`/test/〇〇`）と違い、URL構造はシンプルで任意パラメータ向き
- `$request->text` により、Viewに動的データを渡して表示制御が可能

### 🔗 ルーティング設定
```php
Route::get('/test', [TestController::class, 'index']);
## STEP06: 複数のパスパラメータをルートで受け取る

### 🎯 学習目的
Laravelのルーティングにおいて、URLパスに含まれる複数の動的パラメータを取得し、処理する方法を習得する。

### 🔗 ルート定義（`routes/web.php`）
```php
Route::get('/test/{room}/{id}', function ($room, $id) {
    return 'roomが' . $room . 'でidは' . $id . 'です';
});
## STEP07: 任意パラメータとデフォルト値の利用

### 🔗 ルート定義
```php
Route::get('/test2/{greeting?}', function ($greeting = 'Goodmorning') {
    return $greeting . '=おはようございます';
});

✅ 学習内容: 1-9 ブラウザに画面表示をしよう（View編）
この章では、Laravelのビュー機能を活用し、ブラウザ上にHTMLを表示する基本的な手順を学びました。

📄 コントローラーの作成とビューの表示
TestController.php に index メソッドを定義し、ビューに配列データ $item を渡す。

index.blade.php ビューで、Blade構文 {{$content}} を使ってデータを表示。

📁 ビューのファイル配置
ビューは resources/views/index.blade.php に配置。

BladeテンプレートはHTMLの中にPHP変数を埋め込むことで表示内容を動的に構築できる。

🌐 ルーティングの設定
routes/web.php にて Route::get('/', [TestController::class, 'index']); と記述することで、トップページ表示とコントローラーを紐づけ。

パラメータ付きルートの例として /test1/{room}/{id} や /test2/{greeting?} を学習。