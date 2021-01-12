<!DOCTYPE html>
<html>
    <head>
        <title>Exercices en PHP 12-01-2021</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/style.css">
    </head>
<body>
<?php
    require_once('functions.php');

   echo "<p>Exercice 1</p>";
   $l = 6; // nombre de lignes
   $c = 6; // nombre de colonnes
   $board = GenBoard($l,$c); //on génère le damier
   DisplayBoard($board); //on affiche le damier

   echo "<br/><p>Exercice 2</p>";
   $num = 6; //Nombre d'éléments dans notre array
   $random = RandArray($num); //On génére des nombres entiers positifs aléatoires
   DisplayArray($random); //On les affiche

   echo "<br/><p>Exercice 3</p>";
   $num_2 = 8; //Nombre d'items
   $sort = "ASC"; //Comment les nombres seront triés (ASC / DESC)
   $arrayS = SortArray($num_2, $sort); //On génère et on trie
   DisplayArray($arrayS); //On les affiche

  echo "<br/><p>Exercice 4</p>";
   $lin = 6;
   $col = 6;
   $sort = "ASC"; //Comment les nombres seront triés (ASC / DESC)
   $multi = GenMulti($lin, $col); //On génère un tableau multidimensionnel et on trie chaque ligne
   $multiS = SortMulti($multi, $sort);
  DisplayMultiArray($multiS);

?>
</body>
</html>