
drop table if exists meessage;
drop table if exists commentaire;
drop table if exists supProjet;
drop table if exists modulex;
drop table if exists categorie;  
drop table if exists icone;
drop table if exists affecter;
drop table if exists fichier;
drop table if exists importanceFichier;
drop table if exists soustache;
drop table if exists attribuerRoleProjet;
drop table if exists affectationTache;
drop table if exists membreProjet;
drop table if exists tache;
drop table if exists projet;
drop table if exists statut;
drop table if exists typetache;
drop table if exists droit;
drop table if exists rolle; -- le mot role est un mot reservé en sql
drop table if exists utilisateur;
drop table if exists secteurPro;

-- création de la table secteurPro

create table if not exists secteurPro (
    id_secteur    int PRIMARY KEY,
    lib_secteur   varchar(20) NOT NULL
)


-- création de la table utilisateur
create table if not exists utilisateur (
    id_user         int PRIMARY KEY,
    username        varchar(15) UNIQUE NOT NULL,
    nom_user        varchar(15) NOT NULL,
    prenom_user     varchar(15) NOT NULL,
    avatar_user     varchar(255),
    email_user      varchar(50) UNIQUE NOT NULL,
    pass_word       varchar(12) NOT NULL,
    date_creation   datetime DEFAULT CURRENT_TIMESTAMP,
    id_secteur      int,
    FOREIGN KEY (id_secteur) REFERENCES secteurPro(id_secteur) -- elle doit réferencer la clé primaire de la table secteurPro
)

-- ajout d'une contrainte de type check sur la longeur du mot de passe (entre 8 et 12 caractères)
alter table utilisateur 
add constraint checkPassWord check (length(pass_word) between 8 and 12);



-- création de la table droit
create table if not exists droit(
    id_droit         int PRIMARY KEY,
    lib_droit        varchar(15) NOT NULL
)


-- création de la table rolle
create table if not exists rolle(
    id_role         int PRIMARY KEY,
    lib_role        varchar(15) NOT NULL
)



CREATE TABLE Projet(
   id_projet INT AUTO_INCREMENT,
   duree_projet VARCHAR (50),
   date_debut_projet VARCHAR (50),
   desc_projet VARCHAR(50),
   lib_projet VARCHAR(50),
   id_user INT NOT NULL,
   PRIMARY KEY(id_projet)
);

CREATE TABLE Statut(
   id_statut INT,
   lib_statut VARCHAR(50),
   PRIMARY KEY(id_statut)
);
CREATE TABLE TypeTache(
   id_type INT,
   lib_type VARCHAR(50),
   PRIMARY KEY(id_type)
);

CREATE TABLE Tache(
   id_tache INT,
   lib_tache VARCHAR(50),
   date_debut_tache VARCHAR(50),
   date_fin_tache VARCHAR(50),
   desc_tache VARCHAR(50),
   id_statut INT NOT NULL,
   id_type INT NOT NULL,
   id_projet INT NOT NULL,
   PRIMARY KEY(id_tache),
   FOREIGN KEY(id_statut) REFERENCES Statut(id_statut),
   FOREIGN KEY(id_type) REFERENCES TypeTache(id_type),
   FOREIGN KEY(id_projet) REFERENCES Projet(id_projet)
);






CREATE TABLE SousTache(
   id_ss_tache INT,
   titre_ss_tache VARCHAR(50),
   statut_ss_tache VARCHAR(50),
   id_tache INT NOT NULL,
   PRIMARY KEY(id_ss_tache),
   FOREIGN KEY(id_tache) REFERENCES Tache(id_tache)
);

CREATE TABLE MembreProjet(
   id_user INT,
   id_projet INT,
   id_droit INT NOT NULL,
   PRIMARY KEY(id_user, id_projet),
   FOREIGN KEY(id_user) REFERENCES Utilisateur(id_user),
   FOREIGN KEY(id_projet) REFERENCES Projet(id_projet),
   FOREIGN KEY(id_droit) REFERENCES Droit(id_droit)
);

 

-- création de la table attribuerRoleProjet
-- la table attribuerRoleProjet est une table de jointure entre les tables membreProjet et rolle
-- elle permet d'attribuer un rôle à un membre d'un projet
create table if not exists attribuerRoleProjet(
    id_user      int,
    id_projet    int,
    id_role      int,
    PRIMARY KEY (id_user, id_projet, id_role), -- la primary key est composée de 3 colonnes
    FOREIGN KEY (id_user, id_projet) REFERENCES membreProjet(id_user, id_projet), -- elle doit réferencer la clé primaire de la table membreProjet
    FOREIGN KEY (id_role) REFERENCES rolle(id_role)
)






-- -- si je supprimer un projet, toutes les taches associées à ce projet doivent être supprimées
-- alter table tache
-- add constraint fk_projet_tache
-- foreign key (idProjet) references projet(idProjet)
-- on delete cascade;





-- création de la table affectationTache
-- la table affectationTache est une table de jointure
-- entre les tables membreProjet, tache, rolle et droit
create table if not exists affectationTache(
    id_user      int,
    id_projet    int,
    id_tache     int,
    id_role      int,
    id_droit     int,
    PRIMARY KEY (id_user, id_projet, id_tache, id_role, id_droit), -- la primary key est composée de 5 colonnes
    FOREIGN KEY (id_user, id_projet) REFERENCES membreProjet(id_user, id_projet),
    FOREIGN KEY (id_tache) REFERENCES tache(id_tache),
    FOREIGN KEY (id_role) REFERENCES rolle(id_role),
    FOREIGN KEY (id_droit) REFERENCES droit(id_droit)
)

-- ==============================antony=======================



CREATE TABLE Commentaire(
   id_com INT,
   text_com VARCHAR(50),
   date_envoi_com DATETIME,

   id_user INT NOT NULL,
   id_projet INT NOT NULL,

   id_projet_com INT, -- id_projet_1 = id_mem_projet
   id_tache INT,

   PRIMARY KEY(id_com),
   FOREIGN KEY(id_user, id_projet) REFERENCES MembreProjet(id_user, id_projet),
   FOREIGN KEY(id_projet) REFERENCES Projet(id_projet),
   FOREIGN KEY(id_projet_com) REFERENCES Projet(id_projet),
   FOREIGN KEY(id_tache) REFERENCES Tache(id_tache)
);

CREATE TABLE Meessage(
   id_mess INT,
   titre_mess VARCHAR(50),
   text_mess VARCHAR(50),
   date_envoi_mess DATETIME,

   id_emet INT NOT NULL,
   id_projet_1 INT NOT NULL,

   id_mess_initial INT NOT NULL, -- id_projet_1 = id_mem_projet
   
   id_recept INT NOT NULL,  -- id_user_1 = id_mem_projet
   id_projet_2 INT NOT NULL,

   PRIMARY KEY(id_mess),
   FOREIGN KEY(id_emet, id_projet_1) REFERENCES MembreProjet(id_user, id_projet),
   FOREIGN KEY(id_mess_initial) REFERENCES Meessage(id_mess),
   FOREIGN KEY(id_recept, id_projet_2) REFERENCES MembreProjet(id_user, id_projet)
);



CREATE TABLE ImportanceFichier(
   id_importance INT,
   lib_importance VARCHAR(50),
   coul_importance VARCHAR(50),
   PRIMARY KEY(id_importance)
);

CREATE TABLE Fichier(
   id_fichier INT,
   date_depot DATETIME,
   titre_fichier VARCHAR(50),
   desc_fichier VARCHAR(250),
   taille_fichier INT(50),
   url_fichier VARCHAR(50),
   id_user INT NOT NULL,
   id_projet INT NOT NULL,
   id_importance INT NOT NULL,
   PRIMARY KEY(id_fichier),
   FOREIGN KEY(id_user, id_projet) REFERENCES MembreProjet(id_user, id_projet),
   FOREIGN KEY(id_importance) REFERENCES ImportanceFichier(id_importance)
);

CREATE TABLE affecter(
   id_tache INT,
   id_fichier INT,
   PRIMARY KEY(id_tache, id_fichier),
   FOREIGN KEY(id_tache) REFERENCES Tache(id_tache),
   FOREIGN KEY(id_fichier) REFERENCES Fichier(id_fichier)
);


-- =================================

CREATE TABLE Icone(
   id_icone INT,
   url_icone VARCHAR(50),
   PRIMARY KEY(id_icone)
);

CREATE TABLE Categorie(
   id_cat INT,
   lib_cat VARCHAR(50),
   PRIMARY KEY(id_cat)
);

CREATE TABLE Modulex(
   id_modulex INT,
   nom_modulex VARCHAR(50),
   id_cat INT NOT NULL,
   PRIMARY KEY(id_modulex),
   FOREIGN KEY(id_cat) REFERENCES Categorie(id_cat)
);



CREATE TABLE SupProjet(
   id_modulex INT,
   id_projet INT,
   id_supprojet VARCHAR(50),
   date_creation_supprojet DATE,
   coul_supprojet VARCHAR(50),
   nom_module_projet VARCHAR(50),
   id_icone INT,
   PRIMARY KEY(id_modulex, id_projet, id_supprojet),
   FOREIGN KEY(id_modulex) REFERENCES Modulex(id_modulex),
   FOREIGN KEY(id_projet) REFERENCES Projet(id_projet),
   FOREIGN KEY(id_icone) REFERENCES Icone(id_icone)
);
