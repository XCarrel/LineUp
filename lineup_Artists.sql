CREATE TABLE lineup.Artists
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Name varchar(200) NOT NULL,
    Description varchar(5000) NOT NULL,
    Gender_id int(11) NOT NULL,
    Country_id int(11) NOT NULL,
    Contract_id int(11),
    Mainpicture varchar(100),
    CONSTRAINT fk_Artist_Gender FOREIGN KEY (Gender_id) REFERENCES lineup.Genders (id),
    CONSTRAINT fk_Artist_Country1 FOREIGN KEY (Country_id) REFERENCES lineup.Countries (id),
    CONSTRAINT fk_contract FOREIGN KEY (Contract_id) REFERENCES lineup.Contracts (id) ON DELETE CASCADE
);
CREATE INDEX fk_Artist_Gender_idx ON lineup.Artists (Gender_id);
CREATE INDEX fk_Artist_Country1_idx ON lineup.Artists (Country_id);
CREATE INDEX fk_contract_idx ON lineup.Artists (Contract_id);
INSERT INTO lineup.Artists (id, Name, Description, Gender_id, Country_id, Contract_id, Mainpicture) VALUES (1, 'Kaleo', 'D''un côté, l''Islande et ses 300''000 habitants. De l''autre, les États-Unis, pays de la démesure. Et entre les deux, Kaleo. Ces quatre amis d''enfance, originaires des environs de Reykjavik, ont plié bagage pour s''installer au Texas. Entre rock, folk et blues, ils puisent dans l''atmosphère mystique des fjords et dans la chaleur moite des déserts. Leur album A/B révèle leur dualité: entre titres racés et ballades gracieuses, leur cœur balance. Mais il faudrait bien plus que deux faces à cet opus pour illustrer la virtuosité du groupe, qui jongle tant avec les riffs rocailleux ou les aurores boréales qu''avec la poussière d''Austin.', 1, 4, 1, 'artists-main-kaleo.jpg');
INSERT INTO lineup.Artists (id, Name, Description, Gender_id, Country_id, Contract_id, Mainpicture) VALUES (2, 'Txarango', 'Avec quatre continents et quelques vingt-trois pays explorés au compteur, les Catalans de Txarango sont devenus un Village du Monde à eux tous seuls. Leur musique - aux fortes références latino-américaines et festive en diable - pioche ses rythmes et mélodies dans le son de Barcelona, un genre musical héritier de la rumba cubaine, qu''ils fusionnent à volonté avec du reggae, du ska et du punk. Tout en faisant la part belle à la langue catalane, leurs chansons - profondément engagées - se fredonnent, se susurrent, se crient et se dansent à l''unisson, redonnant à la musique son pouvoir le plus magique: celui de changer le monde.
', 2, 2, 2, 'artists-main-txarango.jpg');
INSERT INTO lineup.Artists (id, Name, Description, Gender_id, Country_id, Contract_id, Mainpicture) VALUES (3, 'Nekfeu', 'Ce n''est pas parce qu''il fraie avec Catherine Deneuve que Nekfeu a abandonné son amour de la rime. On verra, Reuf, Egérie… Après avoir enchaîné les tubes, Le Fennek a vu son album Cyborg dépasser en à peine deux semaines les 100 000 exemplaires vendus. Un retour à un rap qui fleure bon les 90''s et donne des coups de verbe saillants. Et une preuve réconfortante qu''il est encore possible, à notre époque, de produire un album de rap sans auto-tune. Un succès époustouflant pour ce rappeur technique et virtuose, aussi à l''initiative de l''incontournable label Seine Zoo. Allez Feu, allume la mèche.', 3, 1, null, 'artists-main-nekfeu.png');
CREATE TABLE lineup.ContractTypes
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(45) NOT NULL
);
INSERT INTO lineup.ContractTypes (id, name) VALUES (1, 'Contrat VIP');
INSERT INTO lineup.ContractTypes (id, name) VALUES (2, 'Contat standard');
CREATE TABLE lineup.Contracts
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    signedOn datetime,
    description varchar(1000) NOT NULL,
    fee int(11) NOT NULL,
    restaurant varchar(45),
    car varchar(45),
    nbMeals int(11),
    contract_type int(11)
);
INSERT INTO lineup.Contracts (id, signedOn, description, fee, restaurant, car, nbMeals, contract_type) VALUES (1, '2018-10-08 19:26:39', 'Contrat conséquent', 25000, 'Brasserie la Véranda', 'Audi', null, 1);
INSERT INTO lineup.Contracts (id, signedOn, description, fee, restaurant, car, nbMeals, contract_type) VALUES (2, '2018-10-08 21:15:48', 'Contrat en carton', 500, null, null, 25, 2);
CREATE TABLE lineup.Countries
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Name varchar(45) NOT NULL
);
INSERT INTO lineup.Countries (id, Name) VALUES (1, 'France');
INSERT INTO lineup.Countries (id, Name) VALUES (2, 'Espagne');
INSERT INTO lineup.Countries (id, Name) VALUES (3, 'Suisse');
INSERT INTO lineup.Countries (id, Name) VALUES (4, 'Islande');
CREATE TABLE lineup.Genders
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Name varchar(45) NOT NULL
);
INSERT INTO lineup.Genders (id, Name) VALUES (1, 'Blues-Rock');
INSERT INTO lineup.Genders (id, Name) VALUES (2, 'Latino');
INSERT INTO lineup.Genders (id, Name) VALUES (3, 'Rap');
INSERT INTO lineup.Genders (id, Name) VALUES (4, 'Hip-Hop');
CREATE TABLE lineup.PerformanceDates
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Date_time datetime NOT NULL,
    Duration int(11) COMMENT 'Number of minutes',
    Scene_id int(11) NOT NULL,
    Artist_id int(11) NOT NULL,
    CONSTRAINT fk_PerformanceDate_Scene1 FOREIGN KEY (Scene_id) REFERENCES lineup.Scenes (id),
    CONSTRAINT fk_PerformanceDate_Artist1 FOREIGN KEY (Artist_id) REFERENCES lineup.Artists (id)
);
CREATE INDEX fk_PerformanceDate_Scene1_idx ON lineup.PerformanceDates (Scene_id);
CREATE INDEX fk_PerformanceDate_Artist1_idx ON lineup.PerformanceDates (Artist_id);
INSERT INTO lineup.PerformanceDates (id, Date_time, Duration, Scene_id, Artist_id) VALUES (1, '2018-07-17 20:00:00', 90, 1, 1);
INSERT INTO lineup.PerformanceDates (id, Date_time, Duration, Scene_id, Artist_id) VALUES (2, '2018-07-18 23:30:00', 90, 5, 2);
INSERT INTO lineup.PerformanceDates (id, Date_time, Duration, Scene_id, Artist_id) VALUES (3, '2018-07-18 22:00:00', 90, 1, 3);
INSERT INTO lineup.PerformanceDates (id, Date_time, Duration, Scene_id, Artist_id) VALUES (4, '2018-10-08 21:31:19', 90, 5, 1);
CREATE TABLE lineup.Scenes
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Name varchar(45) NOT NULL,
    Localisation varchar(45)
);
INSERT INTO lineup.Scenes (id, Name, Localisation) VALUES (1, 'Grande scène', null);
INSERT INTO lineup.Scenes (id, Name, Localisation) VALUES (2, 'Club Tent', null);
INSERT INTO lineup.Scenes (id, Name, Localisation) VALUES (3, 'Les Arches', null);
INSERT INTO lineup.Scenes (id, Name, Localisation) VALUES (4, 'Le Détour', null);
INSERT INTO lineup.Scenes (id, Name, Localisation) VALUES (5, 'Le Dome', null);