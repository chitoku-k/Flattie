Flattie
=======

[ちとくのホームページ](https://chitoku.jp/) で使用されている WordPress テーマです。

## ビルド

このプロジェクトは CoffeeScript と SCSS を使用しているため動作の確認にはビルド作業が必要です。  
Node.js 上で `gulp` を実行することでビルドでき、その結果は `/dist` 以下に出力されます。  
また出力先のディレクトリは、環境変数 `FLATTIE_DIST` で変更することができます。

```
$ npm install
$ npm install -g gulp bower
$ bower install
$ gulp
```
