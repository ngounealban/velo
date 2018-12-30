create table championat(
    id_championat integer primary key auto_increment,
    nom_championat varchar(255), 
    visibilite integer,/*1->visible 0->ivisible*/
    date_creation date,   
    date_dabut date,
    description text,
    date_fin date
);
/* le mot de passe de connexion sera stocke dans la premiere occurence championat*/
insert into championat (nom_championat) values ('fenapvelo2019');
create table course(
	id_course integer primary key auto_increment,
	id_championat integer references championat (id_championat),
	type_course int, /*0 -> pour course avec temps, 1 -> course sans temps*/
	nom_course varchar(255),
	trajet_course varchar(255),
	date_creation datetime,
	detail text,
	description_course varchar(255)
);

create table coureur(
	id_coureur integer primary key auto_increment,
	nom_coureur varchar(255),
	date_inscription date,
	id_equipe integer references equipe (id_equipe),
	prenom_coureur varchar(255)	
);

create table equipe (
	id_equipe integer primary key auto_increment,
	nom_equipe varchar(255)
);

 create table equipe_coureur(
	id_coureur integer references coureur (id_coureur),
	id_equipe integer references equipe (id_equipe),
	status_chef int default 0, /*0-> membre 1-> chef*/
	primary key(id_coureur,id_equipe)
);

create table info_course
(
	id_course integer references course (id_course),
	id_coureur integer references coureur(id_coureur),
	temps time,
	points integer,
	primary key(id_coureur,id_course)
);

create table coureur_championat
(
	id_championat integer references championat (id_championat),
	id_coureur integer references coureur(id_coureur),
	temps integer,
	points time,
	detail text,
	primary key(id_coureur,id_championat)
);