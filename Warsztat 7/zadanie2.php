<?php
    function changeNumber($array, $n){
        $array[$n] = "$";
        $warunek = $n < (count($array) - 1) && $n > 0;
        if (!$warunek) echo "N is incorrect, type new one"; 
        else foreach ($array as $a) echo "{$a} ";
    }
    
    changeNumber(array(1, 2, 3, 4, 5), 1);
?>