<!DOCTYPE html>
<html>
    <head>
        <title>test scandir</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
<body>
<?php
    require_once('functions.php');
    $dir = "./";
    listIt($dir);
    saveIt($dir);
    ?>
</body>
</html>