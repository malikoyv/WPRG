<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 20px 0;
        }
        label, select {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h1>Operacje na stringach</h1>
    <form method="get">
        <label for="input">Podaj dowolny ciag liczb: </label>
        <input type="text" id="input" name="input" required>

        <label for="operation">Wybierz operację: </label>
        <select name="operation" id="operation">
            <option value="reverse">Odwrócenie ciągu znaków</option>
            <option value="upper">Zamiana wszystkich liter na wielkie</option>
            <option value="lower">Zamiana wszystkich liter na małe</option>
            <option value="count">Liczenie liczby znaków</option>
            <option value="trim">Usuwanie białych znaków z początku i końca ciągu</option>
        </select>

        <button type="wykonaj">Wykonaj</button>
    </form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "GET" && (isset($_GET["input"]) && isset($_GET["operation"]))){
        $input = $_GET["input"];
        $operation = $_GET["operation"];
        $result;

        switch($operation){
            case "reverse":
                $result = strrev($input);
                break;
            case "upper":
                $result = strtoupper($input);
                break;
            case "lower":
                $result = strtolower($input);
                break;
            case "count":
                $result = strlen($input);
                break;
            case "trim":
                $result = trim($input);
                break;
            default:
                $result = "Nieprawidlowa operacja";
                break;
        }

        echo "Wynik: " . $result;
    }
?>
</body>
</html>