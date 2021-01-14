<?php
    session_start();
    $_SESSION['grille'];
    $_SESSION['tour'];
    $_SESSION['winner'];
    $_SESSION['win'] = false; // si la partie est gagnante ou non
?>

<!DOCTYPE html>
<html lang="fr">
    <head>	
        <link rel="stylesheet" type="text/css" href="style.css"> 
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Morpion</title>
    </head>
    <body>
        <header>
            <h1>Morpion</h1>
        </header>

        <?php     
            // Il ne faut pas oublier de faire le test pour la grille
            if(empty($_SESSION['grille']))
                    $_SESSION['grille'] = array(0,0,0,0,0,0,0,0,0);

            if(empty($_SESSION['tour']))
                    $_SESSION['tour'] = 1;

            if(!empty($_GET['case'])){
                // On récupère la case jouée et on la décrémente pour que cela corresponde avec notre tableau (array). Il ne faut pas oublier que les array commencent leur valeur à 0.
                $caseJouee = $_GET['case'] - 1;
                    
                // On test si la case est égale à 0
                if($_SESSION['grille'][$caseJouee] == 0){
                    // Si c'est libre, on place le pion
                    $_SESSION['grille'][$caseJouee] = $_SESSION['tour'];
                    }     
                }                    

             if($_SESSION['tour'] == 1){
                $_SESSION['tour'] = 2;
             }
             elseif ($_SESSION['tour'] == 2)
             {
                $_SESSION['tour'] = 1;
             }
        ?>
             <?php
             include('functions.php');
                checkLigne();
                checkColonne();
                checkDiagonale();
                if($_SESSION['win'] == true){
                    echo '<p id="player">Le joueur '.$_SESSION['winner'].' a gagné !</p>';
                }
                else
                {
                    echo '<p id="player">Au tour du joueur '.$_SESSION['tour'].'</p>';
                }
            ?>
        <section class="container">

        <div class="tg-wrap">
	    <table class="tg">
                <tr>
                    <td><a href="?case=1#"><?php if($_SESSION['grille'][0] == 1) echo '<img src="img/cross.png" alt="Croix">'; elseif($_SESSION['grille'][0] == 2) echo '<img src="img/circle.png" alt="Circle">'; else echo " "; ?></a></th>
                    <td><a href="?case=2#"><?php if($_SESSION['grille'][1] == 1) echo '<img src="img/cross.png" alt="Croix">'; elseif($_SESSION['grille'][1] == 2) echo '<img src="img/circle.png" alt="Circle">'; else echo " "; ?></a></th>
                    <td><a href="?case=3#"><?php if($_SESSION['grille'][2] == 1) echo '<img src="img/cross.png" alt="Croix">'; elseif($_SESSION['grille'][2] == 2) echo '<img src="img/circle.png" alt="Circle">'; else echo " "; ?></a></th>
                </tr>
                <tr>
                    <td><a href="?case=4#"><?php if($_SESSION['grille'][3] == 1) echo '<img src="img/cross.png" alt="Croix">'; elseif($_SESSION['grille'][3] == 2) echo '<img src="img/circle.png" alt="Circle">'; else echo " "; ?></a></td>
                    <td><a href="?case=5#"><?php if($_SESSION['grille'][4] == 1) echo '<img src="img/cross.png" alt="Croix">'; elseif($_SESSION['grille'][4] == 2) echo '<img src="img/circle.png" alt="Circle">'; else echo " "; ?></a></td>
                    <td><a href="?case=6#"><?php if($_SESSION['grille'][5] == 1) echo '<img src="img/cross.png" alt="Croix">'; elseif($_SESSION['grille'][5] == 2) echo '<img src="img/circle.png" alt="Circle">'; else echo " "; ?></a></td>
                </tr>
                <tr>
                    <td><a href="?case=7#"><?php if($_SESSION['grille'][6] == 1) echo '<img src="img/cross.png" alt="Croix">'; elseif($_SESSION['grille'][6] == 2) echo '<img src="img/circle.png" alt="Circle">'; else echo " "; ?></a></td>
                    <td><a href="?case=8#"><?php if($_SESSION['grille'][7] == 1) echo '<img src="img/cross.png" alt="Croix">'; elseif($_SESSION['grille'][7] == 2) echo '<img src="img/circle.png" alt="Circle">'; else echo " "; ?></a></td>
                    <td><a href="?case=9#"><?php if($_SESSION['grille'][8] == 1) echo '<img src="img/cross.png" alt="Croix">'; elseif($_SESSION['grille'][8] == 2) echo '<img src="img/circle.png" alt="Circle">'; else echo " "; ?></a></td>
                </tr>
            </table>
        </div>


            <div class="reset"><a href="?case=reset">Réinitialiser la partie</a></div>
            <?php
                if($_GET['case'] == "reset"){
                    session_destroy();
                }
            ?>
        </section> 
    </body> 
</html>
