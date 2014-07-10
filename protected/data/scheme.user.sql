/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     27/06/2014 02:45:58 p.m.                     */
/*==============================================================*/

/*==============================================================*/
/* Table: bitacora                                              */
/*==============================================================*/
create table bitacora
(
   id_bitacora          int not null auto_increment,
   username_bitacora    varchar(80) not null,
   action               varchar(80) not null,
   table_name                varchar(80) not null,
   data_new             varchar(255) not null,
   data_old             varchar(255) not null,
   date_bitacora        timestamp not null,
   sesion_bitacora      numeric(8,0) not null,
   primary key (id_bitacora)
);

/*==============================================================*/
/* Table: category                                              */
/*==============================================================*/
create table category
(
   id_category          int not null auto_increment,
   cat_id_category      int,
   name_category        varchar(80) not null,
   primary key (id_category)
);

/*==============================================================*/
/* Table: comment                                               */
/*==============================================================*/
create table comment
(
   id_comment           int not null auto_increment,
   com_id_comment       int,
   id_content           int not null,
   id_user              int not null,
   body                 text not null,
   date_comment         timestamp not null,
   primary key (id_comment)
);

/*==============================================================*/
/* Table: content                                               */
/*==============================================================*/
create table content
(
   id_content           int not null auto_increment,
   id_user              int not null,
   id_category          int not null,
   title                varchar(80) not null,
   date_content         date not null,
   summary              text not null,
   play_content         varchar(80) not null,
   picture              varchar(80) not null,
   translate            varchar(80) not null,
   answer               varchar(80) not null,
   glosary              varchar(80) not null,
   dictionary           varchar(80) not null,
   credit               varchar(80) not null,
   primary key (id_content)
);

/*==============================================================*/
/* Table: form                                                  */
/*==============================================================*/
create table form
(
   id_form              int not null auto_increment,
   id_type_form         int not null,
   name_form            varchar(80) not null,
   url_form             varchar(255) not null,
   primary key (id_form)
);

/*==============================================================*/
/* Table: ocupation                                             */
/*==============================================================*/
create table ocupation
(
   id_ocupation         int not null auto_increment,
   ocu_id_ocupation     int,
   name_ocupation       varchar(80) not null,
   primary key (id_ocupation)
);

/*==============================================================*/
/* Table: reply                                                 */
/*==============================================================*/
create table reply
(
   id_reply             int not null auto_increment,
   id_user              int not null,
   id_comment           int not null,
   body_reply           text not null,
   date_reply           timestamp not null,
   primary key (id_reply)
);

/*==============================================================*/
/* Table: rol                                                   */
/*==============================================================*/
create table rol
(
   id_rol               int not null auto_increment,
   name_rol             varchar(80) not null,
   primary key (id_rol)
);

/*==============================================================*/
/* Table: rol_form                                              */
/*==============================================================*/
create table rol_form
(
   id_rol_form          int not null auto_increment,
   id_rol               int not null,
   id_form              int not null,
   primary key (id_rol_form)
);

/*==============================================================*/
/* Table: sesion                                                */
/*==============================================================*/
create table sesion
(
   id_sesion            int not null auto_increment,
   id_user              int not null,
   pid                  numeric(8,0) not null,
   start_sesion         timestamp not null,
   end_sesion           timestamp not null,
   primary key (id_sesion)
);

/*==============================================================*/
/* Table: type_form                                             */
/*==============================================================*/
create table type_form
(
   id_type_form         int not null auto_increment,
   name_type_form       varchar(80) not null,
   primary key (id_type_form)
);

/*==============================================================*/
/* Table: user                                                  */
/*==============================================================*/
create table user
(
   id_user              int not null auto_increment,
   id_ocupation         int not null,
   email                varchar(80) not null,
   username             varchar(80),
   password             varchar(80),
   first_name           varchar(80),
   last_name            varchar(80),
   date_birth           date,
   sex                  numeric(8,0),
   facebook_id          numeric(8,0),
   plus_id              numeric(8,0),
   twitter_id           numeric(8,0),
   activationKey        varchar(80),
   state_user           numeric(1,0),
   primary key (id_user)
);

/*==============================================================*/
/* Table: user_rol                                              */
/*==============================================================*/
create table user_rol
(
   id_user_rol          int not null auto_increment,
   id_rol               int not null,
   id_user              int not null,
   primary key (id_user_rol)
);

alter table category add constraint fk_reflexive2 foreign key (cat_id_category)
      references category (id_category) on delete restrict on update restrict;

alter table comment add constraint fk_composition5 foreign key (id_user)
      references user (id_user) on delete restrict on update restrict;

alter table comment add constraint fk_composition6 foreign key (id_content)
      references content (id_content) on delete restrict on update restrict;

alter table comment add constraint fk_reflexive4 foreign key (com_id_comment)
      references comment (id_comment) on delete restrict on update restrict;

alter table content add constraint fk_catalog3 foreign key (id_category)
      references category (id_category) on delete restrict on update restrict;

alter table content add constraint fk_detail3 foreign key (id_user)
      references user (id_user) on delete restrict on update restrict;

alter table form add constraint fk_catalog1 foreign key (id_type_form)
      references type_form (id_type_form) on delete restrict on update restrict;

alter table ocupation add constraint fk_reflexive1 foreign key (ocu_id_ocupation)
      references ocupation (id_ocupation) on delete restrict on update restrict;

alter table reply add constraint fk_composition7 foreign key (id_user)
      references user (id_user) on delete restrict on update restrict;

alter table reply add constraint fk_composition8 foreign key (id_comment)
      references comment (id_comment) on delete restrict on update restrict;

alter table rol_form add constraint fk_composition1 foreign key (id_form)
      references form (id_form) on delete restrict on update restrict;

alter table rol_form add constraint fk_composition2 foreign key (id_rol)
      references rol (id_rol) on delete restrict on update restrict;

alter table sesion add constraint fk_detail1 foreign key (id_user)
      references user (id_user) on delete restrict on update restrict;

alter table user add constraint fk_catalog2 foreign key (id_ocupation)
      references ocupation (id_ocupation) on delete restrict on update restrict;

alter table user_rol add constraint fk_composition3 foreign key (id_user)
      references user (id_user) on delete restrict on update restrict;

alter table user_rol add constraint fk_composition4 foreign key (id_rol)
      references rol (id_rol) on delete restrict on update restrict;

