<?php
function Reverse($str){
    //echo strrev($str);   Natif (si on veut être des feignasses)
    $reverse = "";
    $lg = strlen($str);
    for ($i=(strlen($str)-1) ; $i >= 0 ; $i--)   
    {  
        $reverse .= $str[$i];  
    }  
    return $reverse;
}

function Palindrome($str, $strrev){
    $str1 = strtolower($str);
    $str2 = strtolower($strrev);
    echo ($str1 == $str2) ? "<br/>La chaîne est donc un palindrome" : "<br/>La chaîne n'est donc pas un palindrome";
}

function GenBoard($l,$c){
    //true = noir - false = blanc
    $case = true;

    $damier = [];
    for ($i=0;$i<$l; $i++){

        for ($j=0;$j<$c; $j++){

            switch($case){

                case true:
                    $damier[$i][$j] = 1;
                    $case = false;
                    break;

                case false:
                    $damier[$i][$j] = 0;
                    $case = true;
                    break;

                default:
                    break;

            }
            if($l%2 == 0 && $c%2 == 0){
                if($i%2 != 0)
                {
                    $damier[$i][$j] = !$damier[$i][$j];
                }           
            }

        }

    }
    return $damier;
}

function DisplayBoard($board){
echo "<div class='board'>";
for ($i=0;$i<count($board); $i++){
    echo "<div class='line'>";
    foreach($board[$i] as $k => $v ){
        if($v == 0){
            echo "<div class='white'></div>";
        }
        else
        {
            echo "<div class='black'></div>";
        }
    }
    echo "</div>";
}
echo "</div>";
}
?>