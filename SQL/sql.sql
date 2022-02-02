create database if not exists imc character set utf8 collate utf8_unicode_ci;
use imc;


drop table if exists personne;


CREATE TABLE personne(
	Matricule char(4) NOT NULL default '',
	NomPers varchar(25) NOT NULL default '',
	PrenomPers varchar(20) NOT NULL default '',
	imc double NOT NULL default 0,
	PRIMARY KEY(Matricule)
	)ENGINE=InnoDB CHARACTER SET utf8 collate utf8_unicode_ci;
	
	INSERT INTO personne VALUES ('E001','DUBOIS','Roland',25.4);
	INSERT INTO personne VALUES ('E002','GERNAU','Patricia',35);
	INSERT INTO personne VALUES ('E003','LOUVEL','Marc',42.2);
	INSERT INTO personne VALUES ('E004','MAUREL','Jeanne',30);
	INSERT INTO personne VALUES ('E005','DUBOSC','Alain',18);
	INSERT INTO personne VALUES ('E006','PARENT','Justine',20);
	INSERT INTO personne VALUES ('E007','POTIER','Jean',22);
	INSERT INTO personne VALUES ('E008','FAUVEL','Anne',31);	
	INSERT INTO personne VALUES ('E009','NOUVION','Patrick',45);
	INSERT INTO personne VALUES ('E010','ARSANE','Marie',20);
	INSERT INTO personne VALUES ('E011','DURAND','Sylvie',50.3);	
	INSERT INTO personne VALUES ('M20','LENOIR','Carinne',22.4);