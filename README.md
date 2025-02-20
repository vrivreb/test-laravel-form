## 問い合わせWEBアプリ説明書

インストール条件
- PHP 8.X
- Composer 2.X
- SQLite3

### プロジェクトを起動方法:

プロジェクトの依存関係パッケージをインストールします
```
composer install --no-dev --optimize-autoloader
```

（任意）DBのサンプルデータをマイグレートします
```
php artisan migrate --seed
```

ローカル環境でプロジェクトを起動します
```
php artisan serve --host=0.0.0.0 --port=8000
```