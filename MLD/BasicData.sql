use lineup;

insert into Genders(Name) VALUES ('Blues-Rock'),('Latino'),('Rap'),('Hip-Hop');
insert into Countries(Name) VALUES ('France'),('Espagne'),('Suisse'),('Islande');
insert into Scenes(Name) VALUES ('Grande scène'),('Club Tent'),('Les Arches'),('Le Détour'),('Le Dome');
insert into Artists(Name, Description, Gender_id, Country_id, Mainpicture) VALUES
	('Kaleo',
	 'D\'un côté, l\'Islande et ses 300\'000 habitants. De l\'autre, les États-Unis, pays de la démesure. Et entre les deux, Kaleo. Ces quatre amis d\'enfance, originaires des environs de Reykjavik, ont plié bagage pour s\'installer au Texas. Entre rock, folk et blues, ils puisent dans l\'atmosphère mystique des fjords et dans la chaleur moite des déserts. Leur album A/B révèle leur dualité: entre titres racés et ballades gracieuses, leur cœur balance. Mais il faudrait bien plus que deux faces à cet opus pour illustrer la virtuosité du groupe, qui jongle tant avec les riffs rocailleux ou les aurores boréales qu\'avec la poussière d\'Austin.',
	 1,
	 4,
	 'artists-main-kaleo.jpg'),
	('Txarango',
	 'Avec quatre continents et quelques vingt-trois pays explorés au compteur, les Catalans de Txarango sont devenus un Village du Monde à eux tous seuls. Leur musique - aux fortes références latino-américaines et festive en diable - pioche ses rythmes et mélodies dans le son de Barcelona, un genre musical héritier de la rumba cubaine, qu\'ils fusionnent à volonté avec du reggae, du ska et du punk. Tout en faisant la part belle à la langue catalane, leurs chansons - profondément engagées - se fredonnent, se susurrent, se crient et se dansent à l\'unisson, redonnant à la musique son pouvoir le plus magique: celui de changer le monde.',
	 2,
	 2,
	 'artists-main-txarango.jpg'),
	('Nekfeu',
	 'Ce n\'est pas parce qu\'il fraie avec Catherine Deneuve que Nekfeu a abandonné son amour de la rime. On verra, Reuf, Egérie… Après avoir enchaîné les tubes, Le Fennek a vu son album Cyborg dépasser en à peine deux semaines les 100 000 exemplaires vendus. Un retour à un rap qui fleure bon les 90\'s et donne des coups de verbe saillants. Et une preuve réconfortante qu\'il est encore possible, à notre époque, de produire un album de rap sans auto-tune. Un succès époustouflant pour ce rappeur technique et virtuose, aussi à l\'initiative de l\'incontournable label Seine Zoo. Allez Feu, allume la mèche.',
	 3,
	 1,
	 'artists-main-nekfeu.png');
insert into PerformanceDates (Date_time, Duration, Scene_id, Artist_id) VALUES
	('2018-07-17 20:00:00', 90, 1, 1),
    ('2018-07-18 23:30:00', 90, 5, 2),
    ('2018-07-18 22:00:00', 90, 1, 3);