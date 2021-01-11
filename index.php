<!DOCTYPE html>
<html>
    <head>
        <title>Exercice 1 : Inverser un string</title>
        <meta charset="utf-8">
    </head>
<body>
    <?php
    require_once('functions.php');
    $str = "Lorem ipsum";
    echo "La chaîne originale est ".$str;
    echo "<br/>La chaîne inversée est ";
    Reverse($str);
    ?>
</body>
</html>
