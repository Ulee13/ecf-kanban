/* On vide les Tables */
DELETE FROM SupProjet;
DELETE FROM Modulex;
DELETE FROM Categorie;
DELETE FROM Icone;
DELETE FROM Projet;
DELETE FROM utilisateur;

/* jeu d'essai pour simuler le fonctionnement de l'application */
-- 1. insérer des catéories
INSERT INTO Categorie (id_cat, lib_cat) VALUES
(1, 'Manage'),
(2, 'Users'),
(3, 'Events'),
(4, 'Com'),
(5, 'Files');

-- 2. insérer des icônes
INSERT INTO Icone (id_icone, url_icone) VALUES
(1, 'url_icone1.png'),
(2, 'url_icone2.png'),
(3, 'url_icone3.png');

-- 3. insérer des modulex
INSERT INTO Modulex (id_modulex, nom_modulex, id_cat) VALUES
(1, 'GestProjet', 1),
(2, 'GestUser', 2),
(3, 'GestPlan', 3),
(4, 'GestMess', 4),
(5, 'GestDoc', 5),
(6, 'GestCal', 3);

-- 4. insérer des users
INSERT INTO utilisateur (id_user, username, nom_user, prenom_user, avatar_user, email_user, pass_word, date_creation) VALUES
(1, 'Totodu13', 'Dalton', 'Joe', 'avat_cagoule.jpg', 'dalton.joe@gmail.com', 'password', '2025-04-17'),
(2, 'Titidu14', 'Bateman', 'Patrick', 'avat_jump.jpg', 'bateman.patrick@gmail.com', 'password', '2025-04-17');


-- 5. insérer des projets
INSERT INTO Projet (id_projet, duree_projet, date_debut_projet, desc_projet, lib_projet, id_user) VALUES
(1, 30, '2023-01-01', 'Description du projet 1', 'Projet 1', 1),
(2, 60, '2023-02-01', 'Description du projet 2', 'Projet 2', 2),
(3, 45, '2023-03-01', 'Description du projet 3', 'Projet 3', 1);

-- 6. insérer des SupProjets
INSERT INTO SupProjet (id_modulex, id_projet, id_supprojet, date_creation_supprojet, coul_supprojet, nom_module_projet, id_icone) VALUES
(1, 1, 'Supprojet 1.1', '2023-01-01', 'Rouge', 'nomModuleProj', 1),
(1, 1, 'Supprojet 1.2', '2023-01-02', 'Bleu', 'nomModuleProj', 2),
(2, 2, 'Supprojet 2.1', '2023-02-01', 'Vert', 'nomModuleProj', 3),
(2, 2, 'Supprojet 2.2', '2023-02-02', 'Jaune', 'nomModuleProj', 1),
(3, 3, 'Supprojet 3.1', '2023-03-01', 'Orange', 'nomModuleProj', 2);



SELECT * FROM utilisateur;
SELECT id_user, username, nom_user, prenom_user, avatar_user, email_user, pass_word, date_creation FROM utilisateur;
SELECT * FROM SupProjet;