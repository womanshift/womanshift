Glamourous Party
====

- Glamourous＝魅力
- Party＝会

## 準備

`$ git clone git@github.com:womanshift/womanshift.git`

`$ cd womanshift/`

`$ cp mysqldump.sql ./initdb.d`

`$ docker-compose up -d`

http://localhost:8080/

## DBマイグレーション

`$ docker-compose run web /usr/bin/php7 oil refine migrate:current`
