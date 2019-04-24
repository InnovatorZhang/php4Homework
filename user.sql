--存储用户的表
CREATE TABLE user(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
username VARCHAR(16) UNIQUE NOT NULL,
password VARCHAR(16) NOT NULL,
gender INT NOT NULL DEFAULT 1,
punchsign INT NOT NULL DEFAULT 0,
nickname VARCHAR(10) DEFAULT NULL,
phonenumber VARCHAR(13) NOT NULL DEFAULT "10010",
avatar VARCHAR(100) DEFAULT "http://127.0.0.1/php4Homework/avatar/default.png",
token VARCHAR(64) DEFAULT NULL,
birthday VARCHAR(20) DEFAULT NULL,
school VARCHAR(20) DEFAULT NULL,
PRIMARY KEY(id)
)DEFAULT CHARSET = utf8mb4;


--存放所有学校信息的表
create table information(
id int unsigned primary key auto_increment,
schoolname varchar(32) not null,
link text
)default charset=utf8;

--存放34所自划线高校的表
create table 34college(
id int unsigned primary key auto_increment,
schoolname varchar(32) not null,
link text
)default charset=utf8;

--存放所有高校报录比信息的表
create table baolubi(
id int unsigned primary key auto_increment,
schoolname varchar(32) not null,
title varchar(128) not null,
link text
)default charset=utf8;

--存放知乎搜索界面关于考研信息的表
create table searchanswer(
id int unsigned primary key auto_increment,
title text not null,
author text,
avatar text,
article mediumtext
)default charset=utf8mb4;

--存放知乎考研专题下所有精选回答的表
create table essenceanswer(
id int unsigned primary key auto_increment,
title text not null,
author text,
avatar text,
article mediumtext
 )default charset=utf8mb4;
