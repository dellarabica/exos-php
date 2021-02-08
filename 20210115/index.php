<?php
    session_start();
    $_SESSION['count']; // nombre de tours
    $_SESSION['grille'];
    $_SESSION['tour']; //joueur
    $_SESSION['winner']; // qui gagne
    $_SESSION['win']; // si la partie est gagnante ou non
    $_SESSION['draw']; // si match nul
    require('functions.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>	
        <meta charset="UTF-8">
        <title>Morpion</title>
        <link rel="stylesheet" type="text/css" href="style.css"> 
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>Morpion</h1>
        </header>
            <div class="tg-wrap">
            <?php
                CheckWin();
                ShowDialog();
                CheckEmpty();
                GenGrid();
                ShowArray();
                Count();
            ?>
            </div>
            <div class="reset">
                <a href="?reset=true">Réinitialiser la partie</a>
                <?php
                    CheckReset();
                ?>
            </div>
    </body>
</html>