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
