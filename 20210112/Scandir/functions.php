<?php
function listIt($path) {
    $items = scandir($path);
    
    foreach($items as $item) {
        // on ignore les dossiers "." et ".."
        if($item != "." AND $item != "..") {
            if (is_file($path . $item)) {
                // L'élément scanné est un fichier -> on passe à la suite
                echo "<span class='file'>--".$item . "<br></span>";
            } else {
                // L'élément scanné est un dossier -> on fait un scan dans ce dossier
                echo "<span class='folder'>". $item."</span>";
                echo "<div class='subfolder'>";
                listIt($path . $item . "/");
                echo "</div>";
            }
        }
      }
    }

function saveIt($path){
    $myfile = fopen("folder.txt", "a+") or die("Unable to open file!");
    $filelist = scandir($path);
    foreach($filelist as $file) {
        // on ignore les dossiers "." et ".."
        if($file != "." AND $file != "..") {
            if (is_file($path . $file)) {
                // L'élément scanné est un fichier
                $str = "Fichier : ".$path.$file.PHP_EOL;
                fwrite($myfile, $str);
            } else {
                // L'élément scanné est un dossier -> on fait un scan dans ce dossier
                $str = "Dossier : ".$path.$file.PHP_EOL;
                fwrite($myfile, $str);
                saveIt($path . $file . "/");
            }
        }
      }
    fclose($myfile);
}
?>