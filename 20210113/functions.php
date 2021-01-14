<?php
function compImage($index){
    
}

function reset(){
    if($_GET['case'] == "reset"){
        $_SESSION['grille'] = array(0,0,0,0,0,0,0,0,0);
        $_SESSION['tour'] = 1;
        $_SESSION['win'] = false;
    }
}

function checkLigne(){
    $joueur = $_SESSION['tour'];

    if(
        ($_SESSION['grille'][0] == $joueur && $_SESSION['grille'][1] == $joueur && $_SESSION['grille'][2] == $joueur) OR
        ($_SESSION['grille'][3] == $joueur && $_SESSION['grille'][4] == $joueur && $_SESSION['grille'][5] == $joueur) OR
        ($_SESSION['grille'][6] == $joueur && $_SESSION['grille'][7] == $joueur && $_SESSION['grille'][8] == $joueur)
    )
    {
        $_SESSION['win'] = true;
        $_SESSION['winner'] = $joueur;
    }

}

function checkColonne(){
    $joueur = $_SESSION['tour'];

    if(
        ($_SESSION['grille'][0] == $joueur && $_SESSION['grille'][3] == $joueur && $_SESSION['grille'][6] == $joueur) OR
        ($_SESSION['grille'][1] == $joueur && $_SESSION['grille'][4] == $joueur && $_SESSION['grille'][7] == $joueur) OR
        ($_SESSION['grille'][2] == $joueur && $_SESSION['grille'][5] == $joueur && $_SESSION['grille'][8] == $joueur)
    )
    {
        $_SESSION['win'] = true;
        $_SESSION['winner'] = $joueur;
    }
}

function checkDiagonale(){
    $joueur = $_SESSION['tour'];

    if(
        ($_SESSION['grille'][0] == $joueur && $_SESSION['grille'][4] == $joueur && $_SESSION['grille'][8] == $joueur) OR
        ($_SESSION['grille'][2] == $joueur && $_SESSION['grille'][4] == $joueur && $_SESSION['grille'][6] == $joueur)
    )
    {
        $_SESSION['win'] = true;
        $_SESSION['winner'] = $joueur;
    }
}
?>