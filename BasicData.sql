use lineup;

delete from PerformanceDates;
delete from Artists;
delete from Contracts;
delete from ContractTypes;
delete from Scenes;
delete from Countries;
delete from Genders;

insert into Genders VALUES (1,'Blues-Rock'),(2,'Latino'),(3, 'Rap'),(4, 'Hip-Hop');
insert into Countries VALUES (1,'France'),(2,'Espagne'),(3,'Suisse'),(4,'Islande');
insert into Scenes VALUES (1,'Grande scène',null),(2,'Club Tent',null),(3,'Les Arches',null),(4,'Le Détour',null),(5,'Le Dome',null);
INSERT INTO ContractTypes VALUES (1,'Standard'),(2,'VIP');
INSERT INTO Contracts VALUES (1,'2018-07-01 00:00:00','Un concert',10000,'Le Central','Limo',NULL,2),(2,'2018-01-01 00:00:00','Un min-concert',10000,NULL,NULL,7,1);
insert into Artists VALUES
	(1,
     'Kaleo',
	 'D\'un côté, l\'Islande et ses 300\'000 habitants. De l\'autre, les États-Unis, pays de la démesure. Et entre les deux, Kaleo. Ces quatre amis d\'enfance, originaires des environs de Reykjavik, ont plié bagage pour s\'installer au Texas. Entre rock, folk et blues, ils puisent dans l\'atmosphère mystique des fjords et dans la chaleur moite des déserts. Leur album A/B révèle leur dualité: entre titres racés et ballades gracieuses, leur cœur balance. Mais il faudrait bien plus que deux faces à cet opus pour illustrer la virtuosité du groupe, qui jongle tant avec les riffs rocailleux ou les aurores boréales qu\'avec la poussière d\'Austin.',
	 1,
	 4,
     1,
	 'artists-main-kaleo.jpg'),
	(2,
     'Txarango',
	 'Avec quatre continents et quelques vingt-trois pays explorés au compteur, les Catalans de Txarango sont devenus un Village du Monde à eux tous seuls. Leur musique - aux fortes références latino-américaines et festive en diable - pioche ses rythmes et mélodies dans le son de Barcelona, un genre musical héritier de la rumba cubaine, qu\'ils fusionnent à volonté avec du reggae, du ska et du punk. Tout en faisant la part belle à la langue catalane, leurs chansons - profondément engagées - se fredonnent, se susurrent, se crient et se dansent à l\'unisson, redonnant à la musique son pouvoir le plus magique: celui de changer le monde.',
	 2,
	 2,
     null,
	 'artists-main-txarango.jpg'),
	(3,
     'Nekfeu',
	 'Ce n\'est pas parce qu\'il fraie avec Catherine Deneuve que Nekfeu a abandonné son amour de la rime. On verra, Reuf, Egérie… Après avoir enchaîné les tubes, Le Fennek a vu son album Cyborg dépasser en à peine deux semaines les 100 000 exemplaires vendus. Un retour à un rap qui fleure bon les 90\'s et donne des coups de verbe saillants. Et une preuve réconfortante qu\'il est encore possible, à notre époque, de produire un album de rap sans auto-tune. Un succès époustouflant pour ce rappeur technique et virtuose, aussi à l\'initiative de l\'incontournable label Seine Zoo. Allez Feu, allume la mèche.',
	 3,
	 1,
     2,
	 'artists-main-nekfeu.png');
insert into PerformanceDates (Date_time, Duration, Scene_id, Artist_id) VALUES
	('2018-07-17 20:00:00', 90, 1, 1),
    ('2018-07-18 23:30:00', 90, 5, 1),
    ('2018-07-18 22:00:00', 90, 1, 3);