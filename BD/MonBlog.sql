/* Script SQL de création des tables de la base de données */

drop table if exists T_COMMENTAIRE;
drop table if exists T_BILLET;

create table T_BILLET (
  BIL_ID integer primary key auto_increment,
  BIL_DATE datetime not null,
  BIL_TITRE varchar(100) not null,
  BIL_CONTENU varchar(400) not null
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table T_COMMENTAIRE (
  COM_ID integer primary key auto_increment,
  COM_DATE datetime not null,
  COM_AUTEUR varchar(100) not null,
  COM_CONTENU varchar(200) not null,
  BIL_ID integer not null,
  constraint fk_com_bil foreign key(BIL_ID) references T_BILLET(BIL_ID)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE T_MEMBRE (
  id               int(10) unsigned NOT NULL AUTO_INCREMENT,
  pseudo           varchar(32)  NOT NULL,
  pass             char(40)     NOT NULL,
  mail             varchar(128) NOT NULL,
  date_creation    datetime NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY pseudo (pseudo),
  UNIQUE KEY mail (mail),
  KEY pass (pass)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


