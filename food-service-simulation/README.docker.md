## Docker 手順

- 開発環境

```
Web サーバ： Nginx 1.25.0
データベース： MySQL 8.0
言語： PHP 8.1
```

- [参考](https://qiita.com/shikuno_dev/items/f236c8280bb745dd6fb4)

## Docker 内で DB 操作

#### MySQL コンテナに入る

```bash
docker-compose exec mysql /bin/bash
```

#### MySQL にログイン

```
mysql -u root -p
```

#### phpMyAdmin にアクセス

```
http://localhost:8080
```

- サーバ: mysql
- ユーザ名: root
- パスワード: password（.env ファイルで設定したもの）
