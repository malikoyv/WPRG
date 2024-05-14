<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 2</title>
</head>
<body>
    <form method="get">
        <label for="path">Napisz sciezke: </label>
        <input type="text" name="path" id="path" required>
        <label for="path">Napisz nazwe katalogu: </label>
        <input type="text" name="name" id="name" required>
        <label for="operation">Podaj operacje: </label>
        <select name="operation">
            <option value="read">read</option>
            <option value="delete">delete</option>
            <option value="create">create</option>
        </select>
        <button type="submit">Wykonaj</button>
    </form>

    <?php
        function handleOperation($path, $name, $operation) {
            $path = rtrim($path, '/') . '/'; // Ensure path ends with a slash
            
            if ($operation === 'read') {
                if (is_dir($path . $name)) {
                    $files = scandir($path . $name);
                    echo "<p>Zawartość katalogu $name:</p>";
                    echo "<ul>";
                    foreach ($files as $file) {
                        if ($file !== '.' && $file !== '..') {
                            echo "<li>$file</li>";
                        }
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Katalog $name nie istnieje.</p>";
                }
            } elseif ($operation === 'delete') {
                if (is_dir($path . $name)) {
                    if (count(scandir($path . $name)) === 2) {
                        // Directory is empty, safe to delete
                        if (rmdir($path . $name)) {
                            echo "<p>Katalog $name został usunięty.</p>";
                        } else {
                            echo "<p>Nie udało się usunąć katalogu $name.</p>";
                        }
                    } else {
                        echo "<p>Katalog $name nie jest pusty.</p>";
                    }
                } else {
                    echo "<p>Katalog $name nie istnieje.</p>";
                }
            } elseif ($operation === 'create') {
                if (!is_dir($path . $name)) {
                    if (mkdir($path . $name)) {
                        echo "<p>Katalog $name został utworzony.</p>";
                    } else {
                        echo "<p>Nie udało się utworzyć katalogu $name.</p>";
                    }
                } else {
                    echo "<p>Katalog $name już istnieje.</p>";
                }
            } else {
                echo "<p>Nieprawidłowa operacja.</p>";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['path']) && isset($_GET['name']) && isset($_GET['operation'])) {
                $path = $_GET['path'];
                $name = $_GET['name'];
                $operation = $_GET['operation'];
                handleOperation($path, $name, $operation);
            }
        }
    ?>
</body>
</html>