# Docker 環境での Nginx Reverse Proxy 設定：複数 PHP アプリケーションの構築方法

## はじめに

この記事では、Docker 環境で Nginx をリバースプロキシとして使用し、複数の PHP アプリケーションを異なるパスで提供する方法について説明します。

### 環境

- PHP 8.3
- Nginx 1.25
- Docker & Docker Compose

## 課題

複数の PHP アプリケーションを同じ Docker ホスト上で運用する際に、以下のような課題がありました：

- 各ディレクトリごとの PHP ファイルが正しく処理されない
- ルートディレクトリの`main.php`のみが動作する
- 異なるポートで各アプリケーションにアクセスする必要がある

## プロジェクト構造

```
├── compose.yml
├── docker
│   ├── mysql
│   │   └── my.cnf
│   ├── nginx
│   │   └── default.conf
│   └── php
│       ├── Dockerfile
│       └── php.ini
└── src
    ├── cars_product
    │   ├── Cars
    │   │   ├── Car.php
    │   │   ├── ElectricCar.php
    │   │   └── GasCar.php
    │   ├── Engines
    │   │   ├── ElectricEngine.php
    │   │   └── GasolineEngine.php
    │   ├── Interfaces
    │   │   └── Engine.php
    │   ├── index.php
    │   └── main.php
    ├── food_service_simulation
    │   └── main.php
    ├── lorel_ipsum
    │   └── main.php
    ├── main.php
    └── plant_uml_server
        └── main.php
```

## 解決方法

### 1. Docker Compose 設定

`compose.yaml`:

```yaml
services:
  cars-product:
    image: nginx:1.25.0
    ports:
      - 8821:80
    volumes:
      - ./src:/var/www/html/
      - ./docker/nginx:/etc/nginx/conf.d
    depends_on:
      - app
    networks:
      - dynamic-web-server

  food-service:
    image: nginx:1.25.0
    ports:
      - 8822:80
    volumes:
      - ./src:/var/www/html
      - ./docker/nginx:/etc/nginx/conf.d
    depends_on:
      - app
    networks:
      - dynamic-web-server

  lorel_ipsum:
    image: nginx:1.25.0
    ports:
      - 8823:80
    volumes:
      - ./src:/var/www/html
      - ./docker/nginx:/etc/nginx/conf.d
    depends_on:
      - app
    networks:
      - dynamic-web-server

  plant-uml:
    image: nginx:1.25.0
    ports:
      - 8824:80
    volumes:
      - ./src:/var/www/html
      - ./docker/nginx:/etc/nginx/conf.d
    depends_on:
      - app
    networks:
      - dynamic-web-server

  app:
    build:
      context: ./docker/php
      dockerfile: Dockerfile
    volumes:
      - ./src:/var/www/html
    env_file:
      - .env
    networks:
      - dynamic-web-server

  mysql:
    image: mysql:8.0
    environment:
      MYSQL_ROOT_PASSWORD: ${MYSQL_ROOT_PASSWORD}
      MYSQL_DATABASE: ${MYSQL_DATABASE}
      MYSQL_USER: ${MYSQL_USER}
      MYSQL_PASSWORD: ${MYSQL_PASSWORD}
    volumes:
      - dynamic-webserver-db:/var/lib/mysql
      - ./docker/mysql/my.cnf:/etc/mysql/conf.d/my.cnf
    ports:
      - 33061:3306
    networks:
      - dynamic-web-server

volumes:
  dynamic-webserver-db:

networks:
  dynamic-web-server:
    driver: bridge
```

### 2. Nginx の設定

`default.conf`:

```nginx
server {
    listen 80;
    root /var/www/html;
    index index.php main.php;

    # Enable PHP file handling
    location ~ \.php$ {
        fastcgi_pass app:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # cars_product
    location /cars_product {
        root /var/www/html;
        try_files $uri $uri/ /cars_product/main.php?$query_string;

        # PHP files in cars_product
        location ~ ^/cars_product/(.+\.php)$ {
            fastcgi_pass app:9000;
            fastcgi_index main.php;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
        }
    }

    # food_service_simulation
    location /food_service_simulation {
        root /var/www/html;
        try_files $uri $uri/ /food_service_simulation/main.php?$query_string;

        # PHP files in food_service_simulation
        location ~ ^/food_service_simulation/(.+\.php)$ {
            fastcgi_pass app:9000;
            fastcgi_index main.php;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
        }
    }

    # lorel_ipsum
    location /lorel_ipsum {
        root /var/www/html;
        try_files $uri $uri/ /lorel_ipsum/main.php?$query_string;

        # PHP files in lorel_ipsum
        location ~ ^/lorel_ipsum/(.+\.php)$ {
            fastcgi_pass app:9000;
            fastcgi_index main.php;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
        }
    }

    # plant_uml_server
    location /plant_uml_server {
        root /var/www/html;
        try_files $uri $uri/ /plant_uml_server/main.php?$query_string;

        # PHP files in plant_uml_server
        location ~ ^/plant_uml_server/(.+\.php)$ {
            fastcgi_pass app:9000;
            fastcgi_index main.php;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
        }
    }

    # Default location
    location / {
        try_files $uri $uri/ /main.php?$query_string;
    }
}
```

## 設定の解説

### Nginx の設定ポイント

1. **ベース設定**

   - `root`ディレクティブでドキュメントルートを設定
   - `index`ディレクティブで優先順位付きのインデックスファイルを指定

2. **PHP の処理**

   - FastCGI を使用して PHP ファイルを処理
   - `SCRIPT_FILENAME`パラメータで正確なファイルパスを指定

3. **ディレクトリ別の設定**
   - 各アプリケーションディレクトリに対して個別の location ブロックを設定
   - ネストされた location 設定で PHP ファイルの処理を制御
   - `try_files`ディレクティブで URL のフォールバック処理を実装

### アクセス URL

各アプリケーションは以下の URL でアクセス可能：

- Cars Product: `http://localhost:8821/cars_product/main.php`
- Food Service: `http://localhost:8822/food_service_simulation/main.php`
- Lorem Ipsum: `http://localhost:8823/lorel_ipsum/main.php`
- Plant UML: `http://localhost:8824/plant_uml_server/main.php`

## デプロイ方法

```bash
# コンテナを停止
docker-compose down

# キャッシュを使わずに再ビルド
docker-compose build --no-cache

# コンテナを起動
docker-compose up -d
```

## トラブルシューティング

問題が発生した場合は、以下のコマンドでログを確認できます：

```bash
# Nginxのログを確認
docker-compose logs -f cars-product
docker-compose logs -f food-service
docker-compose logs -f lorel_ipsum
docker-compose logs -f plant-uml

# PHPのログを確認
docker-compose logs -f app
```

## まとめ

この設定により、以下が実現できました：

1. 複数の PHP アプリケーションを同一の Docker ホスト上で実行
2. 各アプリケーションの独立した運用
3. 適切な URL ルーティングと PHP ファイルの処理
4. スケーラブルな構成の実現

## 参考

- [Nginx Documentation](http://nginx.org/en/docs/)
- [PHP-FPM Configuration](https://www.php.net/manual/en/install.fpm.configuration.php)
- [Docker Compose Documentation](https://docs.docker.com/compose/)

## ライセンス

この記事で使用されているコードは、MIT ライセンスの下で自由に使用できます。
