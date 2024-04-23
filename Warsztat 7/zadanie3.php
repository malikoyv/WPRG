<?php
    function func($a, $b, $c, $d){
        $array = array();
        for ($i = $a; $i <= $b; $i++){
            for ($j = $c; $j <= $d; $j++) $array[$i][] = $j;
        }
        print_r($array);
    }
    func(1, 6, 1, 6)
?>