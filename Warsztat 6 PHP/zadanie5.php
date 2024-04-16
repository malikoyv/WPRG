<!DOCTYPE html>
<html>
<body>

<?php

function check($phrase){
  $mark = array();
  $index = 0;
  for ($i = 0; $i < strlen($phrase); $i++){
    if ('A' <= $phrase[$i] && $phrase[$i] <= 'Z')
      $index = ord($phrase[$i]) - ord('A');     
    else if ('a' <= $phrase[$i] && $phrase[$i] <= 'z')
      $index = ord($phrase[$i]) - ord('a');
    else
      continue;
    $mark[$index] = true;
  }
  
  for ($i = 0; $i < 26; $i++){
  	if ($mark[$i] == null || $mark[$i] == false) return false;
  }
  return true;
}

$result = check("The quick brown fox jumps over the lazy dog");
if ($result == true) echo "true";
else echo "false";
?>

</body>
</html>
