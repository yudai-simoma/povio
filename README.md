-------------------------------------------------------------

「TECH CAMP」時のオリジナルアプリ

-------------------------------------------------------------

# 📹 アプリ名
### POVIO
誰でも自身のコンテンツを動画で投稿し、それを見たいユーザーは料金を支払う事で閲覧することができるアプリケーションです。<br>
[![Image from Gyazo](https://i.gyazo.com/d9aa91fac06174b52b8464576c58cb13.jpg)](https://gyazo.com/d9aa91fac06174b52b8464576c58cb13)

# 💭 概要
### 個人が持っている情報はビジネスに変えることができます。
### 動画を投稿し収入を得る事を目的としたSNSです。
動画を投稿する人はルームを作成しそのルームの中に動画を投稿していきます。<br>
動画を視聴する人はルームに入室し、投稿されている動画を視聴する事が出来ます。

# 🌐  App URL
### 今後デプロイ予定です

# 💻  利用方法
#### `1 トップページから新規登録・ログイン`
#### `2 トップページに作成されているルームが表示`
#### `3 ルーム作成はルーム一覧の右側にある「ルーム作成」ボタンを選択`
#### `4 ルーム作成後はトップページへ戻る`<br>
[![Image from Gyazo](https://i.gyazo.com/be5390ba767ed87b23be0c6ae2d72589.gif)](https://gyazo.com/be5390ba767ed87b23be0c6ae2d72589)
[![Image from Gyazo](https://i.gyazo.com/4936c6cf1c25acdb1fb83fd0b4651f9c.gif)](https://gyazo.com/4936c6cf1c25acdb1fb83fd0b4651f9c)
  <br>

#### `5 トップページから１つのルームのパスワードを入力し、「入室」ボタンを選択 → ルーム詳細画面へ遷移する`
[![Image from Gyazo](https://i.gyazo.com/316988d76d8de6f579b1ab5649bf063b.gif)](https://gyazo.com/316988d76d8de6f579b1ab5649bf063b)
<br>
#### `6 ルーム作成者本人であればルームの編集・削除がトップページ画面から可能になりルーム詳細画面へ遷移する場合はパスワード不要で遷移する事が出来る`<br>

[![Image from Gyazo](https://i.gyazo.com/b5da02ebe101a6a8a04669e36b792522.gif)](https://gyazo.com/b5da02ebe101a6a8a04669e36b792522)
<br>


#### `7 動画投稿はルーム詳細ページの「動画投稿」ボタンを選択`
#### `8 動画投稿後は入室していたルームの詳細ページへ戻る`<br>
  [![Image from Gyazo](https://i.gyazo.com/443124147a6fa205c18803d8dd43e1e9.gif)](https://gyazo.com/443124147a6fa205c18803d8dd43e1e9)
  [![Image from Gyazo](https://i.gyazo.com/7b5d1322b447e36dd5ac96135737e129.gif)](https://gyazo.com/7b5d1322b447e36dd5ac96135737e129)
 <br>

 #### `9 ルーム詳細画面から投稿された動画を視聴できる`<br>
  [![Image from Gyazo](https://i.gyazo.com/025560339550cdaeb56ffe688b7cf578.gif)](https://gyazo.com/025560339550cdaeb56ffe688b7cf578)
<br>

# ✅ 課題解決
| ユーザーストーリーから考える課題                                                          | 課題解決                                         |
| ------------------------------------------------------------------------------------ | ------------------------------------------------- |
| SNSで自身のコンテンツを販売し収入を得たいが、専用のWebサイトを作成するには初期費用がかかるという課題 | 課金制の動画投稿系サービスとする事で1から専用サイトを作成せずに自身のコンテンツをビジネス化する事が出来るようになる |
| 動画編集技術はあるが動画編集の案件が取れないという課題                                        | 動画投稿系サービスが増える事で動画編集の需要が高まるため、案件を獲得しやすくする事が出来るようになる |

# 📦  機能一覧
| 機能           | 概要             |
| -------------- | -----------------|
| ユーザー管理機能  | 新規登録・ログイン・ログアウトが可能  |
| ルーム作成機能 | パスワード付きでルーム作成が可能 |
| ルーム詳細表示機能 | 各ルーム詳細ページで投稿されている動画が閲覧可能 |
| ルーム編集・削除機能 | 作成者本人のみルーム編集・削除が可能 |
| 動画投稿機能 | 動画付きで動画投稿が可能 |
| 動画編集・削除機能 | 投稿者本人のみ動画編集・削除が可能 |

## 📝 工夫したポイント
| 工夫した点                  | 概要             |
| ------------------------- | -----------------|
| ルーム詳細ページへ遷移する実装 | ルーム作成者はパスワード無しでルーム詳細ページへ遷移でき、作成者以外はパスワードが一致していないとルーム詳細ページに遷移する事ができない実装をする時の条件式に使用するID取得を工夫した |

# 🔨 追加予定機能
1. EC2へのデプロイ
2. ルームの購入機能
3. 投稿された動画のコメント機能

# 🚜 開発環境
- MAMP
- PHP 7.3.24
- Laravel 8.37.0
- HTML
- CSS
- Bootstrap
- JavaScript
- Apache
- mysql,SquelPro
- Visual Studio Code
- GitHub,GitHubDesktop

# テーブル設計

## users テーブル

| Column   | Type   | Options                   |
| -------- | ------ | ------------------------- |
| name     | string | null: false               |
| email    | string | null: false, unique: true |
| password | string | null: false               |

### Association

- has_many :rooms
- has_many :purchasers
- has_many :comments

## rooms テーブル

| Column       | Type       | Options                        |
| ------------ | ---------- | ------------------------------ |
| name         | string     | null: false                    |
| supplement   | string     | null: false                    |
| price        | integer    | null: false                    |
| number       | integer    | null: false                    |
| password     | string     | null: false                    |
| user         | references | null: false, foreign_key: true |

### Association

- belongs_to :user
- has_many :videos
- has_many :purchasers

## videos テーブル

| Column        | Type       | Options                        |
| ------------- | ---------- | ------------------------------ |
| video_content | string     | null: false                    |
| title         | string     | null: false                    |
| description   | string     | null: false                    |
| room          | references | null: false, foreign_key: true |


### Association

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
