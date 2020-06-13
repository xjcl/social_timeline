
create database if not exists social;

USE social;

create table if not exists posts
(
    id int not null auto_increment,
    content varchar(140) not null,
    primary key(id)
);

insert ignore into posts
values (100, 'test post');

insert ignore into posts
values (200, 'testier <b>post</b>');




CREATE USER 'newuser'@'%' IDENTIFIED WITH mysql_native_password BY 'user_password';

GRANT ALL PRIVILEGES ON social.* TO 'newuser'@'%';

FLUSH PRIVILEGES;


