<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */

function getArtists()
{
    return [
        ["id"=>"0","name" => "Kaleo", "kind" => "Blues Rock", "image"=>"kaleo.jpg", "description"=>"D’un côté, l’Islande et ses 300'000 habitants. De l’autre, les États-Unis, pays de la démesure. Et entre les deux, Kaleo. Ces quatre amis d’enfance, originaires des environs de Reykjavik, ont plié bagage pour s’installer au Texas. Entre rock, folk et blues, ils puisent dans l’atmosphère mystique des fjords et dans la chaleur moite des déserts. Leur album A/B révèle leur dualité: entre titres racés et ballades gracieuses, leur cœur balance. Mais il faudrait bien plus que deux faces à cet opus pour illustrer la virtuosité du groupe, qui jongle tant avec les riffs rocailleux ou les aurores boréales qu’avec la poussière d’Austin."],
        ["id"=>"1","name" => "Txarango", "kind" => "Latino", "image"=>"txarango.jpg", "description"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."],
        ["id"=>"2","name" => "Nekfeu", "kind" => "Rap", "image"=>"nekfeu.jpg", "description"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."]
    ];
}
function getArtistsByID($id){
    $artistes = getArtists();
    foreach ($artistes as $artiste){
        if($artiste['id']==$id){
            return $artiste;
        }
    }
}
?>