<?php
function GenGrid(){
    $l = 3;
    $c = 3;
    $ce = 1; // 1->9
    $index = 0; // 0->8

    echo '<table class="tg">';
    for($i = 0; $i < $l; $i++){

        echo '<tr>';

        for($j = 0; $j < $c; $j++){

            echo '<td><a href="?case='.$ce.'#">';

            if($_SESSION['grille'][$index] == 1){
                echo '<img src="img/cross.png" alt="Croix">';
            }
            elseif($_SESSION['grille'][$index] == 2){
                echo '<img src="img/circle.png" alt="Circle">'; 
            }  
            else {
                echo " ";
            }
            echo '</a></td>';
            $ce++;
            $index++;
        }
        echo '</tr>';
    }
    echo '</table>';
}

function CheckEmpty(){

    if(empty($_SESSION['count'])){
        $_SESSION['count']  = 0;
    }

    if(empty($_SESSION['grille'])){
        $_SESSION['grille'] = array(0,0,0,0,0,0,0,0,0);
    }

    if(!empty($_SESSION['tour'])){
        ChangePlayer();
    }

    if(!empty($_GET['case'])){
        // On récupère la case jouée et on la décrémente pour que cela corresponde avec notre tableau (array). Il ne faut pas oublier que les array commencent leur valeur à 0.
        $caseJouee = $_GET['case'] - 1;
            
        // On test si la case est égale à 0
        if($_SESSION['grille'][$caseJouee] == 0){
            // Si c'est libre, on place le pion
            $_SESSION['grille'][$caseJouee] = $_SESSION['tour'];
        }     
    }     
}

function ChangePlayer(){
    if($_SESSION['tour'] == 1){
        $_SESSION['tour'] = 2;
     }
     elseif ($_SESSION['tour'] == 2)
     {
        $_SESSION['tour'] = 1;
     }
     else{
        $_SESSION['tour'] = rand(1,2);
     }
}

function Count(){
    if($_GET['case'] != 0){
        $_SESSION['count']++;
    }
}

function CheckWin(){
   
    $joueur = $_SESSION['tour'];

    if(
        ($_SESSION['grille'][0] == $joueur && $_SESSION['grille'][1] == $joueur && $_SESSION['grille'][2] == $joueur) OR
        ($_SESSION['grille'][3] == $joueur && $_SESSION['grille'][4] == $joueur && $_SESSION['grille'][5] == $joueur) OR
        ($_SESSION['grille'][6] == $joueur && $_SESSION['grille'][7] == $joueur && $_SESSION['grille'][8] == $joueur) OR //lignes
        ($_SESSION['grille'][0] == $joueur && $_SESSION['grille'][3] == $joueur && $_SESSION['grille'][6] == $joueur) OR
        ($_SESSION['grille'][1] == $joueur && $_SESSION['grille'][4] == $joueur && $_SESSION['grille'][7] == $joueur) OR
        ($_SESSION['grille'][2] == $joueur && $_SESSION['grille'][5] == $joueur && $_SESSION['grille'][8] == $joueur) OR //colonnes
        ($_SESSION['grille'][0] == $joueur && $_SESSION['grille'][4] == $joueur && $_SESSION['grille'][8] == $joueur) OR
        ($_SESSION['grille'][2] == $joueur && $_SESSION['grille'][4] == $joueur && $_SESSION['grille'][6] == $joueur)  //diagonales
    )
    {
        $_SESSION['win'] = true;
        $_SESSION['winner'] = $joueur;
    }
    else{
        $_SESSION['win'] = false;
    }

    if($_SESSION['count'] == 9 AND $_SESSION['win'] = false){
        $_SESSION['draw'] = true;
    }
}

function ShowDialog(){
    if($_SESSION['win'] == false){
        echo '<p id="player">Au tour du joueur '.$_SESSION['tour'].'</p>';       
    }
    elseif($_SESSION['draw'] == true){
        echo '<p id="player">Match nul !</p>';
    }
    elseif($_SESSION['win'] == true)
    {
        echo '<p id="player">Le joueur '.$_SESSION['winner'].' a gagné !</p>';
    }
}

function CheckReset(){
    if($_GET['reset'] == "true"){
        session_destroy();
    }
}

function ShowArray(){
    echo var_dump($_SESSION['grille']);
}
?>