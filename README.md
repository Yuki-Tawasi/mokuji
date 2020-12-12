# JIN+RTOCのセットでサイドバーの目次を追従するカスタマイズ

ワードプレステーマJINと同じくJIN作成者のプラグインRTOCを利用した場合に、サイドバーの目次が記事を追従（ハイライト）するカスタマイズです。

参考元 <https://www.cg-method.com/side-job/wordpress-swell-customize/#index_id9>

* サイドバーの目次がスクロールするタイプを考慮
* hタグが非表示の場合を考慮


1. サイドバーに目次を表示する
2. function.phpの内容をサブテーマのfunction.phpに追記
3. style.cssの内容をカスタマイズ用cssに追記
4. javascript.jsの内容をカスタマイズ用jsに追記

## サイドバーに目次を表示する

```
<div class="widget rtoc_mokuji_widget">[rtoc_mokuji title="" title_display="" heading="h4" list_h2_type="" list_h3_type="" display="" frame_design="" animation=""]</div>
```

サイドバー追尾【PC】にウィジェットをカスタムHTMLで上記を追加します。
ショートコード部分は、任意で変更してください。

RTOCって自動でサイドバーにでないですよね。

## function.phpの内容を子テーマのfunction.phpに追記

テストした環境が１ケースのみなので、9行目、24行目が人によって変更する必要があると思います。
うまく行かない場合、 <https://tawasimusi.com/sodanshiyo/> まで問い合わせください。
あなたのサイトを確認して変更内容をお伝えします。

```
const hashes = document.querySelectorAll('.widget.rtoc_mokuji_widget a');
```

```
el && el.closest('.rtoc-mokuji > li').classList.add('mkj-marker');
```

JINの子テーマはこちらから→ <https://jin-theme.com/update/#rtoc-14>

## style.cssの内容をカスタマイズ用cssに追記

追加cssに追記してもいいし、プラグイン「Simple Custom CSS and JS」を使うと少し便利にカスタマイズcssを管理できます。

`#D7D7D7`部分は好きな色に変更してください。

## javascript.jsの内容をカスタマイズ用jsに追記

hタグが非表示の場合を考慮しています。
そのためにちょっと複雑なjsのfunctionを使ってます。

プラグイン「Simple Custom CSS and JS」を使って便利にカスタマイズjsを管理してください。

## おまけ

サイトバーの目次が長い場合スクロールするようにするスタイル。

style.css内にあります。

`max-height: 800px;`部分は好きな高さに変更してください。

`background-color: rgba(180, 180, 180, .5);`部分は好きな色に変更してください。

