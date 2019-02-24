Flattie
=======

[![][travis-badge]][travis-link]

[ちとくのホームページ](https://chitoku.jp/) で使用されていた WordPress テーマです。  
2019 年にコンテンツを含めて [chitoku-k/chitoku.jp][chitoku.jp] に移動しました。

## ビルド

このプロジェクトは Babel などを使用しているため動作の確認にはビルド作業が必要です。  
Node.js 上で以下の操作でビルドでき、その結果は `/dist` 以下に出力されます。

```sh
# 初回のみ
$ npm install

# 出力先の変更
$ export FLATTIE_PATH='/path/to/directory/'

# コンパイル
$ npm run build
```

## 環境変数（任意）

- `FLATTIE_PATH`: アセットの参照先（既定値: `/`）

## PHP 定数（任意)

- `FLATTIE_TEMPLATE_URL`: テンプレートの URL（例：`https://example.com/wp-content/themes/flattie`）
- `FLATTIE_UPLOADS_URL`: アップロードの URL（例：`https://example.com/wp-content/uploads`）
- `FLATTIE_INCLUDES_URL`: インクルードの URL（例：`https://example.com/wp-includes`）

[travis-link]:          https://travis-ci.org/chitoku-k/Flattie
[travis-badge]:         https://img.shields.io/travis/chitoku-k/Flattie.svg?style=flat-square
[chitoku.jp]:           https://github.com/chitoku-k/chitoku.jp
