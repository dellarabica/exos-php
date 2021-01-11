<!DOCTYPE html>
<html>
    <head>
        <title>Exercices en PHP</title>
        <meta charset="utf-8">
    </head>
<body>
    <?php
    require_once('functions.php');
    $str = "Kayak";
    $strrev = Reverse($str);
    echo "La chaîne originale est ".$str;
    echo "<br/>La chaîne inversée est ".$strrev;
    Palindrome($str, $strrev);
    ?>
</body>
</html>
