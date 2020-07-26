drop database movella;
create database movella;
use movella;

##### TABLES

create table tbl_user (
  id int unsigned not null auto_increment primary key,
  address varchar(200),
  password char(40) not null,
  phone varchar(11),
  username varchar(20) not null
);

create table tbl_furniture (
  id int unsigned not null auto_increment primary key,
  user_id int unsigned not null, foreign key(user_id) references user(id),
  name varchar(40) not null,
  description text,
  img not null default 'furniture.png'
);