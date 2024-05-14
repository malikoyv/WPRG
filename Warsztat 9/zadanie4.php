<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 4</title>
</head>
<body>

<h1>Zadanie 4</h1>

<ul>
    <?php
    $file = 'adresy.txt';

    if (file_exists($file)) {
        $handle = fopen($file, 'r');

        while (($line = fgets($handle)) !== false) {
            $parts = explode(';', $line);
            if (count($parts) !== 2) {
                continue;
            }

            $url = trim($parts[0]);
            $description = trim($parts[1]);

            echo "<li><a href=\"$url\">$description</a></li>";
        }

        fclose($handle);
    } else {
        echo "<p>Plik $file nie istnieje.</p>";
    }
    ?>
</ul>

</body>
</html>
