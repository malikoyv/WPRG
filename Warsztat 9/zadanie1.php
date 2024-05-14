<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 1</title>
</head>
<body>
    <form method="get">
        <label for="input">Podaj datę urodzenia: </label>
        <input type="date" id="input" name="input" required>
        <button type="submit">Wykonaj</button>
    </form>

    <?php
        function dayOfWeek($date){
            $dayOfWeek = date('1', strtotime($date));
            echo "Dzien tygodnia: " . $dayOfWeek . "\n";
        }

        function years($date){
            $birthdate = new DateTime($date);
            $current = new DateTime();
            $years = $birthdate ->diff( $current) -> y;
            echo "Ukonczonych lat: " . $years . "\n";
        }

        function closestBirthday($date){
            $birthDate = new DateTime($date);
            $currentDate = new DateTime();
            $nextBirthday = new DateTime(date('Y-m-d', strtotime('+' . ($currentDate->diff($birthDate)->y + 1) . ' years', strtotime($date))));
            $daysUntilNextBirthday = $currentDate->diff($nextBirthday)->days;
            echo "Do najlblizszych urodzin $daysUntilNextBirthday dni \n";
        }
        if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["input"])){
            $input = $_GET["input"];
            dayOfWeek($input);
            years($input);
            closestBirthday($input);
        }
    ?>
</body>
</html>