# 環境構築サンプルアプリケーション

Laravel10が動くサンプルです。環境を立ち上げたあとトップページが表示されます

# 用途

環境構築方法についての実装例を確認するためのものです

- Laravel Sail
- 自作Docker環境

# 行ったこと

## Laravel Sailの設定

- Laravel Sail用の `docker-compose.yaml` をプロジェクト直下に作成しました。
- `.env.example` の設定を修正し、Laravel Sail用に調整しました。

## 自作Docker環境

- `.docker`ディレクトリにて自作のdocker環境の設定ファイルを格納しました。
- `compose.yaml` にて必要なコンテナ周りの設定を定義しました。
- プロジェクト直下に`makefile`を作成し、ラッパーコマンドを使うようにしました。

### PHP

`.docker/local/php`にて以下の対応を行いました。

- PHPのDockerfileを作成しました。
- `.env.app` というファイルを作り、Laravelの設定を集約しました。コンテナ内に環境変数として渡す用にしています
- その他 PHPの設定ファイルを格納もしています。

# 行っていないこと、想定していないこと

Laravelの環境構築のサンプルのため細かなチューニングや設定などはスコープ外としています。

- `.env.example`や`.env.app` の不要な項目削除
- configファイルの不要な項目削除
- 不要なライブラリ等の削除
- composer.jsonの設定最適化
- 静的解析ツールなどの導入

上記のような対応は行っていません。

# 起動方法

## Laravel Sailの場合

- `$ docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php82-composer:latest composer install`
- `$ cp .env.example .env`
- `$ ./vendor/bin/sail up`
- http://localhost/ へアクセス

## 自作Docker環境の場合

### 初回、もしくはすべてをやり直す場合

- `$ make init`
- http://localhost/ へアクセス

### 普段の対応

| コマンド                         | 用途         |
|:-----------------------------|:-----------|
| `make up`                    | コンテナを立ち上げる |
| `make down`                  | コンテナを落とす   |
| ` make exec-php-app-as-user` | PHPコンテナに入る |

その他コマンドは`Makefile`を確認してください

## 注意点

- Sailと自作Docker環境の併用は想定していません。どちらかを使うようにしてください
