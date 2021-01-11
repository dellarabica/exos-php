<!DOCTYPE html>
<html>
    <head>
        <title>Exercices en PHP</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/style.css">
    </head>
<body>
    <?php
    require_once('functions.php');
    $str = "Kayak";
    $strrev = Reverse($str);
    echo "La chaîne originale est ".$str;
    echo "<br/>La chaîne inversée est ".$strrev;
    Palindrome($str, $strrev);
    echo "<br/>"; //Séparation inutile

    $l = 11;
    $c = 11;
    
    $board = GenBoard($l,$c);
    //var_dump($board);
    DisplayBoard($board);
    ?>
</body>
</html>
