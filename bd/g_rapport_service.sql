drop database if exists g_rapport_service;
create database if not exists g_rapport_service;
use g_rapport_service;

create table bapteme(
    id int(4) auto_increment primary key,
    date_bapteme date,
    assamble VARCHAR(50),
    lieu varchar(50)
);

create table pionier(
    id int(4)  auto_increment primary key,
    nom varchar(50),
    heureDmd int(4)
);

create table predication(
    id int(4) auto_increment primary key,
    annee_predication varchar(50),
    date_debut date,
    date_fin date
);


create table groupe(
    id int(4) auto_increment primary key,
    nom varchar(50),
    idProclamateur int(4)
);

create table proclamateur(
    id int(4) auto_increment primary key,
    nom varchar(50),
    postnom varchar(50),
    prenom varchar(50),
    civilite varchar(1),
    telephone varchar(10),
    email varchar(255 ),
    idBapteme int(4),
    idPionier int(4),
    idGroupe int(4)
);

create table precher(
    id int(4) auto_increment primary key,
    idProclamateur int(4),
    idPredication int(4),
    periodique int(4),
    video int(4),
    heure int(5),
    nouvel_visite int(4),
    etude_bublique int(4),
    mois varchar(10)
);

create table utilisateur(
    id int(4) auto_increment primary key,
    login varchar(50),
    email varchar(255),
    role varchar(50),
    etat varchar(1),
    pwd varchar(255)
);

alter table proclamateur add constraint foreign key(idBapteme) references bapteme(id);
alter table proclamateur add constraint foreign key(idPionier) references pionier(id);
alter table proclamateur add constraint foreign key(idGroupe) references groupe(id);
alter table groupe add constraint foreign key(idProclamateur) references proclamateur(id);
alter table precher add constraint foreign key(idProclamateur) references proclamateur(id);
alter table precher add constraint foreign key(idPredication) references predication(id);


insert into pionier(nom, heureDmd) values
    ("Permanent(e)",60),
    (" Special", 100);
    
insert into predication(annee_predication,date_debut, date_fin) values
    ("2019-2020", "2019-09-01", "2020-08-30");
    
insert into groupe(nom) values
    ("n°1"),
    ("n°2"),
    ("n°3"),
    ("n°4"),
    ("n°5"),
    ("n°6"),
    ("n°6"),
    ("n°7");

insert into bapteme(date_bapteme,assamble, lieu) VALUES
    ("2019-10-01","Assamble special","Goma");

insert into proclamateur(nom, postnom,prenom,civilite,telephone,email,idPionier,idGroupe) values
    ("KEBA", "BELEBELE", "Rostand", "M","0973627372","kebarostand@gmail.com", null,1),
    ("KALOMBO", "MUTOKA MBALI", "JOSIA","M","099999999", "josias@gmail.com",1,2),
    ("MIRIDI", "DAVID", "DAVID","M","099999999", "david@gmail.com",null ,3),
    ("KAJE", "OMBENI", "NATHAN","M","099999999", "nathan@gmail.com",1 ,4),
    ("MUNIHIRE", "CELINE", "CELINE","F","099999999", "celine@gmail.com",2 ,5),
    ("MURHULA", "MUSHAGALUSA", "PAUL","M","099999999", "paul@gmail.com",1 ,2),
    
     ("KEBA", "BELEBELE", "Rostand", "M","0973627372","kebarostand@gmail.com",null ,1),
    ("KALOMBO", "MUTOKA MBALI", "JOSIA","M","099999999", "josias@gmail.com",1,2),
    ("MIRIDI", "DAVID", "DAVID","M","099999999", "david@gmail.com",null,3),
    ("KAJE", "OMBENI", "NATHAN","M","099999999", "nathan@gmail.com",1 ,4),
    ("MUNIHIRE", "CELINE", "CELINE","F","099999999", "celine@gmail.com",2 ,5),
    ("MURHULA", "MUSHAGALUSA", "PAUL","M","099999999", "paul@gmail.com",1 ,2),
    
     ("KEBA", "BELEBELE", "Rostand", "M","0973627372","kebarostand@gmail.com",null,1),
    ("KALOMBO", "MUTOKA MBALI", "JOSIA","M","099999999", "josias@gmail.com",1,2),
    ("MIRIDI", "DAVID", "DAVID","M","099999999", "david@gmail.com",null ,3),
    ("KAJE", "OMBENI", "NATHAN","M","099999999", "nathan@gmail.com",1 ,4),
    ("MUNIHIRE", "CELINE", "CELINE","F","099999999", "celine@gmail.com",2 ,5),
    ("MURHULA", "MUSHAGALUSA", "PAUL","M","099999999", "paul@gmail.com",1 ,2),
    
     ("KEBA", "BELEBELE", "Rostand", "M","0973627372","kebarostand@gmail.com",null ,1),
    ("KALOMBO", "MUTOKA MBALI", "JOSIA","M","099999999", "josias@gmail.com",1,2),
    ("MIRIDI", "DAVID", "DAVID","M","099999999", "david@gmail.com",null ,3),
    ("KAJE", "OMBENI", "NATHAN","M","099999999", "nathan@gmail.com",1 ,4),
    ("MUNIHIRE", "CELINE", "CELINE","F","099999999", "celine@gmail.com",2 ,5),
    ("MURHULA", "MUSHAGALUSA", "PAUL","M","099999999", "paul@gmail.com",1 ,2),
    
     ("KEBA", "BELEBELE", "Rostand", "M","0973627372","kebarostand@gmail.com", null,1),
    ("KALOMBO", "MUTOKA MBALI", "JOSIA","M","099999999", "josias@gmail.com",1,2),
    ("MIRIDI", "DAVID", "DAVID","M","099999999", "david@gmail.com",null,3),
    ("KAJE", "OMBENI", "NATHAN","M","099999999", "nathan@gmail.com",1 ,4),
    ("MUNIHIRE", "CELINE", "CELINE","F","099999999", "celine@gmail.com",2 ,5),
    ("MURHULA", "MUSHAGALUSA", "PAUL","M","099999999", "paul@gmail.com",1 ,2);
    
insert into utilisateur(login,email, role,etat, pwd) values
    ("admin","kebarostand@gmail.com","ADMIN",1,md5('123')),
    ("user1","user1@gmail.com","VISITEUR",0,md5('123')),
    ("user2","user2@gmail.com","VISITEUR",1,md5('123'));

SELECT * FROM proclamateur pr
RIGHT JOIN pionier pi ON pi.id=pr.idPionier
RIGHT JOIN groupe ON groupe.id=pr.idGroupe;

CREATE VIEW vProclamateur AS SELECT pr.id numero,pr.nom nom, postnom, prenom, civilite, 
    telephone, email, pionier.nom as pionnier,groupe.nom as groupe, idBapteme 
    FROM proclamateur pr RIGHT JOIN pionier ON pionier.id=pr.idPionier 
    RIGHT JOIN groupe ON groupe.id=pr.idGroupe;

SELECT * FROM precher
RIGHT JOIN proclamateur ON proclamateur.id=precher.idProclamateur
RIGHT JOIN predication ON predication.id=precher.idPredication;



SELECT precher.id id, proclamateur.postnom Nom, predication.annee_predication Annee,precher.periodique Periodique, 
precher.video Video, precher.heure Heure, precher.nouvel_visite NV, precher.etude_bublique EB, precher.mois Mois
FROM precher
RIGHT JOIN proclamateur ON proclamateur.id=precher.idProclamateur
RIGHT JOIN predication ON predication.id=precher.idPredication


CREATE VIEW vprecher AS SELECT precher.id id, proclamateur.postnom Nom, predication.annee_predication Annee,precher.periodique Periodique, 
precher.video Video, precher.heure Heure, precher.nouvel_visite NV, precher.etude_bublique EB, precher.mois Mois
FROM precher
RIGHT JOIN proclamateur ON proclamateur.id=precher.idProclamateur
RIGHT JOIN predication ON predication.id=precher.idPredication