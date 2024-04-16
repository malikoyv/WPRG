<!DOCTYPE html>
<html>
<body>

<?php
$num = 18;

while ($num >= 10){
	$stri = (string)$num;
    $sum = 0;
	for($i=0; $i < strlen($stri); $i++) { 
    	$sum += $stri[$i];
 	}
    $num = $sum;
}
echo "Wynik: " . $num;
?>

</body>
</html>
