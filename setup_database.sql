
create database if not exists social;

USE social;

-- https://stackoverflow.com/a/9533324/2111778
-- posts will have 560 = 4 * 140 bytes so up to 140 4-character emojis can be stored
create table if not exists posts
(
    id int not null auto_increment,
    content varchar(560) not null,
    primary key(id)
);

insert ignore into posts
values (100, 'test post');

insert ignore into posts
values (200, 'testier <b>post</b>');




CREATE USER 'newuser'@'%' IDENTIFIED WITH mysql_native_password BY 'user_password';

GRANT ALL PRIVILEGES ON social.* TO 'newuser'@'%';

FLUSH PRIVILEGES;


