<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 4</title>
</head>
<body>
    <?php
    $file = "data.txt";
    if (isset($_POST["submit"])){
        $imie = htmlspecialchars($_POST["imie"]);
        $nazwisko = htmlspecialchars($_POST["nazwisko"]);
        $email = htmlspecialchars($_POST["email"]);
        $haslo = $_POST["haslo"];
        $repeat = false;
        $handle = fopen($file, "r") or die ("Nie moge otworzyc plik!");
        while (($data = fgetcsv($handle)) !== FALSE) {
            if ($data[2] == $email) {
                $repeat = true;
                break;
            }
        }
        fclose($handle);
        if (preg_match('/[A-Z]/', $haslo) && preg_match('/[0-9]/', $haslo) && preg_match('/[^A-Za-z0-9]/', $haslo) && strlen($haslo) >= 6 && $repeat == false){
            $text = $imie . "," . $nazwisko . "," . $email . "," . $haslo . "\n";

            if (file_put_contents($file, $text, FILE_APPEND | LOCK_EX)) {
                echo "Rejestracja zakończona sukcesem!";
            } else {
                echo "Błąd podczas zapisywania danych.";
            }
        } else {
            echo "Hasło musi zawierać co najmniej jedną wielką literę, cyfrę, znak specjalny i mieć co najmniej 6 znaków.";
        }
    }

    else if (isset($_GET["login"])){
        $login = trim($_GET["emaillogin"]);
        $password = trim($_GET["haslologin"]);

        if (!strlen($login) || !strlen($password)) {
            die('Napisz email i haslo');
        }

        $success = false;

        $handle = fopen($file, "r") or die ("Nie moge otworzyc plik!");
        while (($data = fgetcsv($handle)) !== FALSE) {
            if ($data[2] == $login && $data[3] == $password) {
                $success = true;
                break;
            }
        }
        fclose($handle);
        if ($success) echo "Zalogowales sie\n";
        else echo "Niepoprawny email lub haslo\n";
    }
    else if (isset($_GET["wylogowac"])){
        header("Location: zadanie4.php");
        echo "Wylogowales sie!";
        exit();
    }
    ?>

    <form method="post">
        <input type="text" placeholder="Imię" name="imie" required><br>
        <input type="text" placeholder="Nazwisko" name="nazwisko" required><br>
        <input type="email" placeholder="Email" name="email" required><br>
        <input type="password" placeholder="Hasło" name="haslo" required><br>
        <button type="submit" name="submit">Zarejestruj się</button>
    </form>

    <p>Logowanie się: </p>
    <form method="get">
        <input type="email" placeholder="Email" name="emaillogin" required><br>
        <input type="password" placeholder="Hasło" name="haslologin" required><br>
        <button type="submit" name="login">Zaloguj się</button>
        <a href="?wylogowac">Wyloguj się</a>
    </form>
</body>
</html>
