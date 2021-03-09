<?php

function checkBrackets($string, $bracket_map = false) {

    $bracket_map = $bracket_map ?: [ '[' => ']', '{' => '}', '(' => ')' ];
    $bracket_map_flipped = array_flip($bracket_map);
    $length = mb_strlen($string);
    $brackets_stack = [];
    for ($i = 0; $i < $length; $i++) {
        $current_char = $string[$i];
        if (isset($bracket_map[$current_char])) {
            $brackets_stack[] = $bracket_map[$current_char];
        } else if (isset($bracket_map_flipped[$current_char])) {
            $expected = array_pop($brackets_stack);
            if (($expected === NULL) || ($current_char != $expected)) {
                return false;
            }
        }
    }
    return empty($brackets_stack);

}


function showResult($parameter){
    if($parameter){
        echo 'true' . '<br>';
    }else{
        echo 'false' . '<br>';
    }
}

showResult(checkBrackets('[5 ( 4 -) 7 * ]'));
showResult(checkBrackets('( 5 * 3  ]6  )'));
showResult(checkBrackets('( 5 *(] )'));
showResult(checkBrackets('( 5 * 3 [ }]6  )'));


?>