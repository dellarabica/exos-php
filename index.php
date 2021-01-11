<!DOCTYPE html>
<html>
    <head>
        <title>Exercices en PHP</title>
        <meta charset="utf-8">
    </head>
<body>
    <?php
    require_once('functions.php');
    $str = "Lorem ipsum";
    echo "La chaîne originale est ".$str;
    echo "<br/>La chaîne inversée est ";
    Reverse($str);
    Palindrome($str, strrev($str));
    ?>
</body>
</html>
