## 開発環境・使用技術 
  
Mac OS Catalina 10.15.6  
Visual Studio Code （エディタ）  

jQuery 3.5.1 (ajax)
Vue.js 2.6.12 (axios, jQueryから移行作業中)
PHP 7.3.11  
Laravel 8.x.x  
MySQL  
Heroku  
Cloudinary（画像アップロード）  

  
## サービス概要  
  
<p>アプリ名: Langrow! （β edition)</p>
<p>外国語学習を促進するためのプラットフォームサービス。 </p>
  
<p>Diary: 学習中の外国語を使って日記を書くことができる。他のユーザーに公開したり非公開にしたりできる。</p> 
<p>Talk Channel:　zoomなどのオンライン会議システムを使った外国語学習会の参加者を募集できる。</p>
<p>Chat Room: 他のユーザーとのプライベートチャットができる。</p>
  
<p>現時点でレスポンシブ非対応なので、対応予定。</p>
  
## 実装した機能  
  
<p>Authによるユーザー認証（Laravel標準機能)</p>
<p>ゲストログイン機能</p>
<p>投稿機能(Diary, Talk)</p>
<p>ユーザーとのプライベートチャット機能</p>
<p>DBのデータをajaxでビューに反映させる処理(jQuery使用）</p>

## 未実装の部分
<ol>
    <li>バリデーション</li>
    <li>レスポンシブデザイン</li>
</ol>
  
## heroku URL  
https://langrow.herokuapp.com/
