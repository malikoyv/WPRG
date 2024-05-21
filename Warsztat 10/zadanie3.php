<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 3</title>
</head>
<body>
<?php
    $example_login = "user";
    $example_password = "pass";

    if (isset($_GET["submit"])) {
        $login = $_GET["login"];
        $password = $_GET["password"];
        if ($example_login == $login && $example_password == $password) {
            $_SESSION["auth"] = true;
            $_SESSION["login"] = $login;
            echo "Zalogowales sie!";
        } else {
            echo "Niepoprawny login albo haslo";
        }
    }

    if (isset($_GET["wylogowac"])){
        session_unset();
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if (isset($_SESSION["auth"]) && $_SESSION["auth"] == true){
        echo "Zalogowales sie!";
        echo '<a href="?wylogowac=true">Wyloguj</a>';
    } else {
?>
    <form method="get">
        <label>Login: </label>
        <input type="text" name="login"><br>
        <label>Password: </label>
        <input type="password" name="password"><br>
        <button type="submit" name="submit">Zalogować się</button>
        <button type="reset" name="wylogowac">Wylogowac sie</button>
    </form>
    <?php
    } ?>
</body>
</html>