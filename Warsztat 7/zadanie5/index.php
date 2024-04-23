<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <style>
        body {
            background-color: black;
            color: white;
        }
        div > button {
            margin-left: 10%;
            margin-top: 3%;
            font-size: large;
        }
    </style>
</head>
<body>
<h1>Kalkulator</h1>
<h2>Prosty</h2>

<?php include 'kalkulator_prosty.php'; ?>

<form action="kalkulator_prosty.php" method="get">
    <div class="prosty">
        <input class="first1" type="number" name="first1" required>
        <select id="operations1" name="operations1">
            <option value="add" selected>Dodawanie</option>
            <option value="substract">Odejmowanie</option>
            <option value="multiply">Mnożenie</option>
            <option value="divide">Dzielenie</option>
        </select>
        <input class="second" name="second" type="number" required> <br>
        <button type="submit" class="calculate">Oblicz</button>
    </div>
</form>

<?php include 'kalkulator_zlozony.php'; ?>

<h2>Zaawansowany</h2>
<form action="kalkulator_zlozony.php" method="get">
    <div class="zlozony">
        <input class="first2" name="first2" type="number" required>
        <select id="operations2" name="operations2">
            <option value="cos">Cosinus</option>
            <option value="sin" selected>Sinus</option>
            <option value="tg">Tangens</option>
            <option value="2do10">Binarne na dziesiętne</option>
            <option value="10do2">Dziesiętne na binarne</option>
            <option value="hex">Szesnastkowe na dziesiętne</option>
        </select> <br>
        <button type="submit" class="calculate2">Oblicz</button>
    </div>
</form>
</body>
</html>