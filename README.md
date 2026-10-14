# 1. 概要

このリポジトリは Laravel を使った従業員のパフォーマンスレビュー管理アプリです。

# 2. 環境構築

```sh
# 依存パッケージのインストール
composer install

# Docker コンテナの起動
docker compose up -d

# 初回のみ: マイグレーション実行
docker compose exec laravel.test php artisan migrate
```

アプリは http://localhost:8000 でアクセスできます。

# ライセンス
    
MIT License
