図書管理ソフトウェア

このアプリケーションは、LEMP環境をdockerで構築し、Laravelで作成されています。
練習として作成しています。  
MacOSで開発、動作確認を行っており、Windowsでの検証をしておりませんので、
実行する際にはOSに注意してください。  

# インストール方法
1. Dockerをマシンにインストールします。
インストールファイル、インストール手順等は公式サイトを確認してください。  
https://www.docker.com/
2. Gitをインストールします。
インストールファイル、インストール手順等は公式サイトを確認してください。  
https://git-scm.com/
3. git hub

# 使い方
起動方法
```
docker-compose up -d
```
Dockerfileを修正した場合は先に以下のコマンドを実行
```
docker-compose build
```