/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2013/12/27 星期五 1:30:31                       */
/*==============================================================*/


drop table if exists album;

drop table if exists docs;

drop table if exists news;

drop table if exists photo;

drop table if exists question;

drop table if exists user;

/*==============================================================*/
/* Table: album                                                 */
/*==============================================================*/
create table album
(
   album_id             int not null auto_increment,
   user_id              int,
   title                varchar(100),
   primary key (album_id)
);

/*==============================================================*/
/* Table: docs                                                  */
/*==============================================================*/
create table docs
(
   docs_id              int not null auto_increment,
   title                varchar(200),
   keywords             varchar(200),
   author               varchar(200),
   file_path            varchar(200),
   primary key (docs_id)
);

/*==============================================================*/
/* Table: news                                                  */
/*==============================================================*/
create table news
(
   news_id              int not null auto_increment,
   user_id              int,
   title                varchar(200),
   content              longtext,
   create_time          timestamp default CURRENT_TIMESTAMP,
   primary key (news_id)
);

/*==============================================================*/
/* Table: photo                                                 */
/*==============================================================*/
create table photo
(
   photo_id             int not null auto_increment,
   album_id             int,
   image_path           varchar(200),
   title                varchar(200),
   content              longtext,
   primary key (photo_id)
);

/*==============================================================*/
/* Table: question                                              */
/*==============================================================*/
create table question
(
   question_id          int not null auto_increment,
   user_id              int,
   title                varchar(200),
   content              longtext,
   image_path           varchar(200),
   answer               longtext,
   create_time          timestamp default CURRENT_TIMESTAMP,
   primary key (question_id)
);

/*==============================================================*/
/* Table: user                                                  */
/*==============================================================*/
create table user
(
   user_id              int not null auto_increment,
   username             varchar(50),
   password             varchar(100),
   email                varchar(100),
   role                 int comment '0: admin
            1: user',
   create_time          timestamp default CURRENT_TIMESTAMP,
   primary key (user_id)
);

alter table album add constraint FK_Reference_1 foreign key (user_id)
      references user (user_id) on delete restrict on update restrict;

alter table news add constraint FK_Reference_2 foreign key (user_id)
      references user (user_id) on delete restrict on update restrict;

alter table photo add constraint FK_Reference_3 foreign key (album_id)
      references album (album_id) on delete restrict on update restrict;

alter table question add constraint FK_Reference_4 foreign key (user_id)
      references user (user_id) on delete restrict on update restrict;

