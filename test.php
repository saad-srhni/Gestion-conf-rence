<?php
 
$adresse = "https://www.google.com/";
$page = file_get_contents ($adresse);
 
preg_match_all ('#<div class="b0koTc"><span>class="b0koTc">Maroc</span></div>#', $page, $prix);
// On stocke dans le tableau $prix les éléments trouvés
 
//var_dump($prix); // Le var_dump() du tableau $prix nous montre que $prix[0] contient l'ensemble du morceau trouvé et que $prix[1] contient le contenu de la parenthèse capturante
 
//for($i = 0; $i < count($prix[1]); $i++) // On parcourt le tableau $prix[1]
{
    echo $prix[1][$i]; // On affiche le prix
}