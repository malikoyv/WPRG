<!DOCTYPE html>
<html>
<body>

<?php
    // $input = readline("Podaj ciag znakow: ");
    $input = "12/34:?56-78+9";
    $new_value = preg_replace('/[\\\\\/:\*\?"<>\|+\-]/', "", $input);
    echo $new_value;
?>

</body>
</html>