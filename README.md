# Recursionバックエンドプロジェクト Dynamic Web Servers

このコースでは、動的コンテンツを生成し提供するウェブサーバの概念と技術を学びます

- **PHP を使用した動的ウェブサーバの構築**  
  リアルタイムでカスタマイズされたコンテンツを生成し、ウェブブラウザに提供する方法を理解します。

- **オブジェクト指向プログラミング (OOP) の活用**  
  OOP の知識をフル活用して、より効率的で再利用可能なコードを実装します。

## 作成するプロジェクト

1. **ランダムユーザー生成の模倣アプリ**  
   ランダムなユーザー情報を生成し、アプリケーション上で動的に管理するシステムを構築します。

2. **Markdown から HTML への変換アプリ**  
   Markdown テキストを HTML に変換し、ウェブ上でレンダリングする仕組みを構築します。

3. **テキストから UML 画像を生成するアプリ**  
   テキストベースの仕様を UML 図として可視化し、アプリケーションの構造を理解しやすくします。

## 対象者

このコースは以下のスキルを持つ方に最適です：

- **Linux ベースのマシンを使いこなせる方**  
  Linux 環境でのファイル操作やサーバ設定に慣れていることが求められます。

- **本番環境のウェブサーバをセットアップできる方**  
  Nginx や Apache を用いたサーバ構築、Docker を使用した環境設定などの経験が必要です。

- **プログラミングと OOP の経験が豊富な方**  
  PHP だけでなく、他のプログラミング言語や OOP の基本概念を理解していることが前提となります。



## Git ブランチ戦略

### GitLab Flow
- main ブランチ
  - 常にリリースできる状態を保つ
  - このブランチへの直pushはNG
- 各環境 ブランチ
  - staging, production など各環境に対応したブランチを作成する
  - マージ後はブランチを削除しない
- feature ブランチ
  - 新しい機能や特定の作業を進めるために使用するブランチ
  - main ブランチから分岐する
  - main ブランチへPull Requestを作成してマージする
  - マージ後はブランチを削除する

### Git コミットルール

- feat: 新しい機能
- fix: バグの修正
- docs: ドキュメントのみの変更
- style: 空白、フォーマット、セミコロン追加など
- refactor: 仕様に影響がないコード改善(リファクタ)
- perf: パフォーマンス向上関連
- test: テスト関連
- chore: ビルド、補助ツール、ライブラリ関連


## 参考
- [結局 Git のブランチ戦略ってどうすればいいの？](https://qiita.com/ucan-lab/items/371cdbaa2490817a6e2a)
- [僕が考える最強のコミットメッセージの書き方](https://qiita.com/konatsu_p/items/dfe199ebe3a7d2010b3e)  

## Directory
```zsh
.
├── README.docker.md
├── README.md
├── compose.yml
├── devlog
├── docker
│   ├── mysql
│   │   └── my.cnf
│   ├── nginx
│   │   └── default.conf
│   └── php
│       ├── Dockerfile
│       └── php.ini
└── src
    └── index.php
```

