Flattie
=======

[![][travis-badge]][travis-link]

[ちとくのホームページ](https://chitoku.jp/) で使用されている WordPress テーマです。

## ビルド

このプロジェクトは Babel などを使用しているため動作の確認にはビルド作業が必要です。  
Node.js 上で以下の操作でビルドでき、その結果は `/dist` 以下に出力されます。

### 環境変数（任意）

- アセットの参照先: `FLATTIE_PATH` （既定値: `/`）

## PHP 定数（任意)

- FLATTIE_TEMPLATE_URL
- FLATTIE_UPLOADS_URL
- FLATTIE_INCLUDES_URL

```sh
# 初回のみ
$ npm install

# 出力先の変更
$ export FLATTIE_PATH='/path/to/directory/'

# コンパイル
$ npm run build
```

[travis-link]:          https://travis-ci.org/chitoku-k/Flattie
[travis-badge]:         https://img.shields.io/travis/chitoku-k/Flattie.svg?style=flat-square
