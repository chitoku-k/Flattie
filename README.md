Flattie
=======

[ちとくのホームページ](https://chitoku.jp/) で使用されている WordPress テーマです。

## ビルド

このプロジェクトは TypeScript と SCSS を使用しているため動作の確認にはビルド作業が必要です。  
Node.js 上で `gulp` を実行することでビルドでき、その結果は `../httpdocs/www/wordpress/wp-content/themes/flattie/` 以下に出力されます。

```
$ npm install
$ npm install -g gulp bower
$ bower install
$ gulp
```
