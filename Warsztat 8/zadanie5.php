<!DOCTYPE html>
<html lang="en">
<body>
    <?php
        // $input = readline("Podaj liczbe zmiennoprzecinkowa: ");
        $input2 = 1.3243224564324;
        $result = substr($input2, strpos($input2, '.') + 1);
        echo "Wynik: " . strlen($result);
    ?>
</body>
</html>