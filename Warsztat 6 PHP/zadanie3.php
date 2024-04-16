<!DOCTYPE html>
<html>
<body>

<?php
function mnozenie($m1, $m2) {
  if (!sprawdz($m1) or !sprawdz($m2)) return false;
  if (count($m1[0]) <> count($m2)) return false;
  // mnożenie
  for($x=0; $x < count($m1); $x++) {
    for($y=0; $y < count($m2[0]); $y++) {
      for($z=0; $z < count($m1[0]); $z++)
        $m3[$x][$y] += $m1[$x][$z] * $m2[$z][$y];
    }
  }
  return $m3;
}

function sprawdz($m) {
  if (count($m) < 1) return false;
  // sprawdzam czy tablica ma tyle samo kolumn w kazdym rzedzie
  foreach($m as $rzad) {
    $ile = count($rzad);
    if (!isset($pop)) $pop=$ile;
    if ($pop <> $ile) return false;
    $pop = $ile;
  }
  return true;
}

$m1 = array(
  array(1, -1, 3),
  array(4, 4, 2)
);
$m2 = array(
  array(2, -1),
  array(3,  2),
  array(6,  7)
);

$wynik = mnozenie($m1, $m2);

echo "<pre>";
print_r($wynik);
echo "</pre>";
?>

</body>
</html>
