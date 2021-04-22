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
- has_many :room_users
- has_many :videos
- has_many :purchasers
- has_many :comments

## rooms テーブル

| Column       | Type       | Options     |
| ------------ | ---------- | ----------- |
| name         | string     | null: false |
| price        | integer    | null: false |
| password     | string     | null: false |

### Association

- has_many :users
- has_many :room_users
- has_many :videos
- has_many :purchasers

## room_users テーブル

| Column        | Type       | Options                        |
| ------------- | ---------- | ------------------------------ |
| user          | references | null: false, foreign_key: true |
| room          | references | null: false, foreign_key: true |

### Association

- belongs_to :user
- belongs_to :room

## videos テーブル

| Column        | Type       | Options                        |
| ------------- | ---------- | ------------------------------ |
| content       |            | null: false                    |
| title         | string     | null: false                    |
| description   | text       | null: false                    |
| user          | references | null: false, foreign_key: true |
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
| text    | text       | null: false                    |
| user    | references | null: false, foreign_key: true |
| video   | references | null: false, foreign_key: true |

### Association

- belongs_to :user
- belongs_to :video
