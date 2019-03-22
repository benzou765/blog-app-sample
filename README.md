# laravel5.8でブログを作成した例

このアプリケーションは、LEMP環境をDockerで構築し、Laravelで作成されています。  
MacOSで開発、動作確認を行っており、Windowsでの検証をしておりませんので、
実行する際にはOSに注意してください。  
また、ブラウザはChromeで動作検証を行っています。Chrome以外は正しく表示されない可能性があります。

## インストール方法
1. Dockerをマシンにインストールします。
インストールファイル、インストール手順等は公式サイトを確認してください。  
https://www.docker.com/
2. Gitをインストールします。
インストールファイル、インストール手順等は公式サイトを確認してください。  
https://git-scm.com/
3. アプリをローカル環境へダウンロードします。作業スペースとなるディレクトリに移動した後、下記コマンドを実行します。
```
$ cd /path/to
$ git clone https://github.com/benzou765/blog-app-sample.git
```
4. Dockerイメージを起動します。下記コマンドを実行します。
```
$ cd blog-app-sample/
$ ./bin/build.sh
(データをダウンロードするため、時間がかかります)
$ ./bin/up.sh
(データをダウンロードするため、時間がかかります)
```
5. phpで使用しているライブラリのインストールします。
下記のようにDockerイメージにアクセスして、必要なデータを取得します。
```
$ ./bin/exec.sh
アクセスするDockerマシンを選択してください
1) blog-app-sample_web_1      3) blog-app-sample_mailhog_1
2) blog-app-sample_app_1      4) blog-app-sample_db_1
#? 2
# composer install
(データをダウンロードするため、時間がかかります)
# exit
```
6. つづいて、DBの初期化を行います。
既に、blog-app-sample_app_1 にログインしているものとします。下記コマンドを実行して、DBを作成します。  
（もし、ログインしていない場合は5.で示した bin/exec.sh を実行してログインしてください）
```
# php artisan migrate
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table
Migrating: 2019_03_17_074457_create_articles_table
Migrated:  2019_03_17_074457_create_articles_table
Migrating: 2019_03_22_011148_add_column_articles_table
Migrated:  2019_03_22_011148_add_column_articles_table
# exit
```
## 使い方
ブラウザを起動して、localhost:8080 にアクセスします。  
ブログの閲覧、ブログ作成用アカウントの登録、ブログの作成等が行えます。  
なお、アカウントのパスワードを忘れた場合、メールアドレスにてパスワードリセットを行えますが、
検証用メールサーバに送信しているため、メールは localhost:8025 へアクセスして確認してください。

## アンインストール方法
1. 作業スペースとなるディレクトリに移動し、Dockerマシンを終了します。
```
$ cd /path/to
$ cd blog-app-sample/
$ ./bin/down.sh
```
2. blog-app-sampleをディレクトリごと削除します。
```
$ cd ..
$ rm -rf blog-app-sample
```
3. （オプション）Dockerイメージを削除します。  
**下記、コマンドを実行するとすべてのDockerイメージが消えます。**
```
$ docker rmi `docker images -q`
```

## 便利コマンド
アプリケーション作成時のメモです。
* 全コンテナ一括削除
```
$ docker rm -f `docker ps -a -q`
```
* 未使用イメージ
```
$ docker rmi `docker images -q`
```

## 参考サイト
* dockerのイメージ作りで参考にしたサイト  
https://qiita.com/bzy/items/f251d47cba836a3a92df  
* laravelのブログ作成で参考にしたサイト  
https://qiita.com/yumgoo17/items/e40e02b3fc3275bd7f23  
* mysqlの設定で参考にしたサイト  
https://qiita.com/deco/items/bfa125ae45c16811536a  
* メールサーバ構築で参考にしたサイト  
https://qiita.com/kobatei/items/1b8b0ca5e8737235dccd
その他、各種ツールの公式サイト  
