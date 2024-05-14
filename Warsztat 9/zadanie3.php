<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 3</title>
</head>
<body>
    <h1>Liczba odwiedzin tej strony: <?php echo getVisitors()?></h1>

<?php
    function getVisitors(){
        $file = 'counter.txt';
        $readfile = 0;
        if (file_exists($file)){
            $readhandle = fopen('counter.txt', 'r');
            $readfile = fread($readhandle, filesize('counter.txt'));
            fclose($readhandle);
        } else {
            file_put_contents($file, '1');
        }

        $writehandle = fopen('counter.txt', 'w');
        fwrite($writehandle, $readfile + 1);
        fclose($writehandle);

        return intval($readfile);
}
?>
</body>
</html>