<!DOCTYPE html>
<html>
<body>

<?php
// ciag arytmetyczny
  $n = 10;
  $a_n = 20;
  $a_1 = 5;
  $suma = (($a_1 + $a_n) / 2)*$n;
  echo "Suma ciagu arytmetycznego: " . $suma . "\n";
  
// ciag geometryczny
	function sumGeometricSequence($a_1, $r, $n) {
    	if ($r == 1) {
        return $a_1 * $n;
      } else {
          return $a_1 * (1 - pow($r, $n)) / (1 - $r);
      }
    }

    $a_1_geo = 2;
    $r = 3;
    $n_geo = 4;
    $suma_geometrycznego = sumGeometricSequence($a_1_geo, $r, $n_geo);
    echo "Suma ciągu geometrycznego: " . $suma_geometrycznego . "\n";
?>


</body>
</html>