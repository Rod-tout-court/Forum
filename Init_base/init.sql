#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP DATABASE forum;
CREATE DATABASE IF NOT EXISTS forum;
USE forum;

#------------------------------------------------------------
# Table: salon
#------------------------------------------------------------

CREATE TABLE salon(
        salon_id    Int  Auto_increment  NOT NULL ,
        salon_title Varchar (50) NOT NULL ,
        room_theme  Text NOT NULL
	,CONSTRAINT salon_PK PRIMARY KEY (salon_id)
)ENGINE=InnoDB COMMENT "Salon thématique" ;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        user_id   Int  Auto_increment  NOT NULL ,
        hash_pass Varchar (60) NOT NULL COMMENT "Contient le hash du mot de passe"  ,
        email     Varchar (50) NOT NULL ,
        anon      Bool NOT NULL COMMENT "Si l'utilisateur est anonyme ou non. Si l'utilisateur est anonyme, on ne peut pas se connecter à ce compte"  ,
        pseudo    Varchar (50) NOT NULL
	,CONSTRAINT utilisateur_AK0 UNIQUE (pseudo)
	,CONSTRAINT utilisateur_PK PRIMARY KEY (user_id)
)ENGINE=InnoDB COMMENT "Table relatif aux utilisateurs" ;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE message(
        msg_id         Int  Auto_increment  NOT NULL ,
        publication    Date NOT NULL ,
        content        Text NOT NULL COMMENT "Contenu du message"  ,
        user_id        Int NOT NULL ,
        fil_id         Int NOT NULL ,
        msg_id_message Int
	,CONSTRAINT message_PK PRIMARY KEY (msg_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fil
#------------------------------------------------------------

CREATE TABLE fil(
        fil_id   Int  Auto_increment  NOT NULL ,
        title    Varchar (50) NOT NULL ,
        user_id  Int NOT NULL ,
        salon_id Int NOT NULL
	,CONSTRAINT fil_PK PRIMARY KEY (fil_id)
)ENGINE=InnoDB COMMENT "Un thread possède un titre ainsi qu'un message d'origine qui est le message avec le plus petit identifiant" ;

#------------------------------------------------------------
# Table: abonné
#------------------------------------------------------------

CREATE TABLE abonne(
        salon_id Int NOT NULL ,
        user_id  Int NOT NULL
	,CONSTRAINT abonne_PK PRIMARY KEY (salon_id,user_id)
)ENGINE=InnoDB COMMENT "Salon pour lequel l'utilisateur est abonné" ;




ALTER TABLE message
	ADD CONSTRAINT message_utilisateur0_FK
	FOREIGN KEY (user_id)
	REFERENCES utilisateur(user_id);

ALTER TABLE message
	ADD CONSTRAINT message_fil1_FK
	FOREIGN KEY (fil_id)
	REFERENCES fil(fil_id);

ALTER TABLE message
	ADD CONSTRAINT message_message2_FK
	FOREIGN KEY (msg_id_message)
	REFERENCES message(msg_id);

ALTER TABLE fil
	ADD CONSTRAINT fil_utilisateur0_FK
	FOREIGN KEY (user_id)
	REFERENCES utilisateur(user_id);

ALTER TABLE fil
	ADD CONSTRAINT fil_salon1_FK
	FOREIGN KEY (salon_id)
	REFERENCES salon(salon_id);

ALTER TABLE abonne
	ADD CONSTRAINT abonne_salon0_FK
	FOREIGN KEY (salon_id)
	REFERENCES salon(salon_id);

ALTER TABLE abonne
	ADD CONSTRAINT abonne_utilisateur1_FK
	FOREIGN KEY (user_id)
	REFERENCES utilisateur(user_id);
