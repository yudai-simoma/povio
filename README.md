# アプリ名

POVIO

# 概要
誰でも自身のコンテンツを動画で投稿し、それを見たいユーザーはサブスクリプションとして閲覧することができるアプリケーションです。

SNSで自身のコンテンツを販売し収入を得たいが、専用のWebサイトを作成するには初期費用がかかるため諦めている人たちに対し、お金をもらい動画を見るサービスの基盤を提供するアプリです。

# アプリケーションの概要
実装した機能としては5点あります。

1. ユーザー管理機能
2. ルーム作成機能
3. ルーム編集機能
4. ルーム削除機能
5. 動画投稿機能
6. 動画編集機能
7. 動画削除機能

# URL


# テスト用アカウント
【ユーザーA】

Email:  aaa@111

Password:aaa111

【ユーザーB】

Email: bbb@222

Password: bbb222

# 利用方法
- WebブラウザGoogle Chromeの最新版を利用してアクセスしてください。

- 接続先およびログイン情報については、上記の通りです。

- 同時に複数の方がログインしている場合に、ログインできない可能性があります。

# 使用技術（開発環境）

## バックエンド

PHP, Laravel

---
## フロントエンド

HTML,CSS,Javascript

---
## データベース

MySQL,SquelPro

---
## インフラ

heroku

---
## Webサーバ（本番環境）

Apache

---
## アプリケーションサーバ（本番環境）



---
## ソース管理

GitHub,GitHubDesktop

---
## テスト



---
## エディタ

Visual Studio Code

# テーブル設計

## users テーブル

| Column             | Type   | Options     |
| ------------------ | ------ | ----------- |
| email              | string | null: false, unique: true |
| encrypted_password | string | null: false |
| nickname           | string | null: false |
| last_name          | string | null: false |
| first_name         | string | null: false |
| last_name_kana     | string | null: false |
| first_name_kana    | string | null: false |

### Association

- has_many :rooms
- has_many :videos
- has_many :purchasers
- has_many :comments

## rooms テーブル

| Column       | Type       | Options     |
| ------------ | ---------- | ----------- |
| name         | string     | null: false |
| price        | integer    | null: false |
| password     | string     | null: false |
| supplement   | string     | null: false |
| user         | references | null: false, foreign_key: true |

### Association

- belongs_to :user
- has_many :videos
- has_many :purchasers

## videos テーブル

| Column        | Type       | Options                        |
| ------------- | ---------- | ------------------------------ |
| video_content |            | null: false                    |
| title         | string     | null: false                    |
| description   | string     | null: false                    |
| room          | references | null: false, foreign_key: true |


### Association

- belongs_to :user
- belongs_to :room
- has_many :comments

## purchasers テーブル

| Column        | Type       | Options                        |
| ------------- | ---------- | ------------------------------ |
| user          | references | null: false, foreign_key: true |
| room          | references | null: false, foreign_key: true |

### Association

- belongs_to :user
- belongs_to :room

## comments テーブル

| Column  | Type       | Options                        |
| ------- | ---------- | ------------------------------ |
| text    | string     | null: false                    |
| user    | references | null: false, foreign_key: true |
| video   | references | null: false, foreign_key: true |

### Association

- belongs_to :user
- belongs_to :video
