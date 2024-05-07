<!DOCTYPE html>
<html lang="en">
<body>
<?php

    // $input = readline("Podaj ciag znakow: ");
    $input = "Hello world!";
    $counter = 0;
    $pattern = "/[aeiou]/i";
    for ($i = 0; $i < strlen($input); $i++){
        if (preg_match($pattern, $input[$i])) $counter++;
    }
    
    echo "Liczba wystapien: " . $counter . "</br>";

    // albo

    echo "Liczba wystapien ulatwiajac zycie: " . preg_match_all($pattern, $input);

?>
</body>
</html>