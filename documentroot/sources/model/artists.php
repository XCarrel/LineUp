<?php

function getArtists()
{
    return [
        [
            "id" => 0,
            "name" => "Kaleo",
            "kind" => "Blues Rock",
            "country" => "Islande",
            "description" => "D’un côté, l’Islande et ses 300'000 habitants. De l’autre, les États-Unis, pays de la démesure. Et entre les deux, Kaleo. Ces quatre amis d’enfance, originaires des environs de Reykjavik, ont plié bagage pour s’installer au Texas. Entre rock, folk et blues, ils puisent dans l’atmosphère mystique des fjords et dans la chaleur moite des déserts. Leur album A/B révèle leur dualité: entre titres racés et ballades gracieuses, leur cœur balance. Mais il faudrait bien plus que deux faces à cet opus pour illustrer la virtuosité du groupe, qui jongle tant avec les riffs rocailleux ou les aurores boréales qu’avec la poussière d’Austin.",
            "imageurl" => "Kaleo.jpg"
        ],
        [
            "id" => 1,
            "name" => "Txarango",
            "kind" => "Latino",
            "country" => "Espagne",
            "description" => "Avec quatre continents et quelques vingt-trois pays explorés au compteur, les Catalans de Txarango sont devenus un Village du Monde à eux tous seuls. Leur musique - aux fortes références latino-américaines et festive en diable - pioche ses rythmes et mélodies dans le son de Barcelona, un genre musical héritier de la rumba cubaine, qu'ils fusionnent à volonté avec du reggae, du ska et du punk. Tout en faisant la part belle à la langue catalane, leurs chansons - profondément engagées - se fredonnent, se susurrent, se crient et se dansent à l'unisson, redonnant à la musique son pouvoir le plus magique: celui de changer le monde.",
            "imageurl" => "Txarango.jpg"
        ],
        [
            "id" => 2,
            "name" => "Nekfeu",
            "kind" => "Rap",
            "country" => "France",
            "description" => "Ce n'est pas parce qu'il fraie avec Catherine Deneuve que Nekfeu a abandonné son amour de la rime. On verra, Reuf, Egérie… Après avoir enchaîné les tubes, Le Fennek a vu son album Cyborg dépasser en à peine deux semaines les 100 000 exemplaires vendus. Un retour à un rap qui fleure bon les 90's et donne des coups de verbe saillants. Et une preuve réconfortante qu'il est encore possible, à notre époque, de produire un album de rap sans auto-tune. Un succès époustouflant pour ce rappeur technique et virtuose, aussi à l'initiative de l'incontournable label Seine Zoo. Allez Feu, allume la mèche.",
            "imageurl" => "Nekfeu.jpg"
        ],
        [
            "id" => 3,
            "name" => "Eddy de Pretto",
            "kind" => "Spleen urbain",
            "country" => "France",
            "description" => "Une vraie gueule ou un blondinet frêle, on ne sait toujours pas. Mais une certitude: Eddy de Pretto se fraie une belle place sur l’autel des grands artistes de demain. Assumant un rap qui flirte ouvertement avec la chanson française, son style hybride fait l’unanimité dans les deux camps. Tiraillé entre la lumière scintillante des boulevards parisiens et les paysages bétonnés de banlieue, l’artiste scande des textes sensibles, engagés et autobiographiques, dans lesquels il dénonce les injonctions à la virilité ou les abus d’une jeunesse à la dérive. Une prose ciselée qui l’érige indéniablement en poète populaire du 21e siècle.",
            "imageurl" => "Eddy_de_Pretto.jpg"
        ],
        [
            "id" => 4,
            "name" => "Danitsa",
            "kind" => "Hip-Hop libertaire",
            "country" => "Suisse / France",
            "description" => "Danitsa a le vent en poupe. Dotée d’un groove incisif, la plus en vogue des rappeuses romandes affiche avec son premier album Ego une volonté de s’ouvrir à des horizons larges. La reine de la nouvelle vague hip-hop helvétique rend honneur à ses origines jamaïcaines en assumant le choix d’un rap scandé dans la langue de Shakespeare, chargé de subtiles influences soul et reggae, auxquelles viennent se greffer des intonations ragga dancehall marquées. Une technicité vocale et une assurance qui permettent à Danitsa de s’affranchir des codes et de réduire en miettes le diktat des étiquettes musicales.",
            "imageurl" => "Danitsa.jpg"
        ]
    ];
}

function pathToImages(){
    return "../../assets/images/";
}

function pathToArtistsImages(){
    return pathToImages() . "artists/";
}
?>