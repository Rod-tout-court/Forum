#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: membre
#------------------------------------------------------------

CREATE TABLE membre(
        id     Int  Auto_increment  NOT NULL ,
        pseudo Varchar (50) NOT NULL
	,CONSTRAINT membre_AK UNIQUE (pseudo)
	,CONSTRAINT membre_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fil
#------------------------------------------------------------

CREATE TABLE fil(
        id    Int  Auto_increment  NOT NULL ,
        titre Varchar (50) NOT NULL
	,CONSTRAINT fil_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE message(
        id         Int  Auto_increment  NOT NULL ,
        date       Date NOT NULL ,
        contenue   Varchar (50) NOT NULL ,
        id_membre  Int NOT NULL ,
        id_fil     Int NOT NULL ,
        id_message Int
	,CONSTRAINT message_PK PRIMARY KEY (id)
)ENGINE=InnoDB;




ALTER TABLE message
	ADD CONSTRAINT message_membre0_FK
	FOREIGN KEY (id_membre)
	REFERENCES membre(id);

ALTER TABLE message
	ADD CONSTRAINT message_fil1_FK
	FOREIGN KEY (id_fil)
	REFERENCES fil(id);

ALTER TABLE message
	ADD CONSTRAINT message_message2_FK
	FOREIGN KEY (id_message)
	REFERENCES message(id);
