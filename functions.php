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
    $str1 = strtoupper($str);
    $str2 = strtoupper($strrev);
    echo ($str1 == $str2) ? "<br/>La chaîne est donc un palindrome" : "<br/>La chaîne n'est donc pas un palindrome";
}
?>