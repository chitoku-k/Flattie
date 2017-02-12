Flattie
=======

[![][dependencies-badge]][dependencies-link]

[ちとくのホームページ](https://chitoku.jp/) で使用されている WordPress テーマです。

## ビルド

このプロジェクトは Babel などを使用しているため動作の確認にはビルド作業が必要です。  
Node.js 上で以下の操作でビルドでき、その結果は `/dist` 以下に出力されます。  
また出力先のディレクトリは、環境変数 `FLATTIE_DIST` で変更することができます。

```sh
# 初回のみ
$ npm install

# 出力先の変更
$ export FLATTIE_DIST='/path/to/directory'

# コンパイル
$ npm start
```

[dependencies-link]:    https://gemnasium.com/github.com/chitoku-k/Flattie
[dependencies-badge]:   https://img.shields.io/gemnasium/chitoku-k/Flattie.svg?style=flat-square
