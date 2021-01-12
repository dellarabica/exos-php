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
   echo "<p>Exercice 1</p><br/>";
   $l = 11; // nombre de lignes
   $c = 11; // nombre de colonnes
   
   $board = GenBoard($l,$c); //on génère le damier
   DisplayBoard($board); //on affiche le damier
    ?>
</body>
</html>