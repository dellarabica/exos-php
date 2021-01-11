<?php
function Reverse($str){
    echo strrev($str);
}

function Palindrome($str, $strrev){
    echo ($str == $strrev) ? "<br/>La chaîne est donc un palindrome" : "<br/>La chaîne n'est donc pas un palindrome";
}
?>