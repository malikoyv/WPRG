<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 2</title>
</head>
<body>

<?php
if (isset($_COOKIE['voted'])) {
    echo "Dziękujemy za oddanie głosu! Wybrałeś: " . htmlspecialchars($_COOKIE['voted']) . ".";
} else {
    ?>

    <form method="get">
        <label>Ile nóg ma biedronka: </label><br>
        <input type="radio" name="answer" value="jedną" required>
        <label>jedną</label><br>
        <input type="radio" name="answer" value="dwie">
        <label>dwie</label><br>
        <input type="radio" name="answer" value="trzy">
        <label>trzy</label><br>
        <input type="radio" name="answer" value="sześć">
        <label>sześć</label><br>
        <button type="submit" name="submit" value="Wyslij">Wyslij</button>
    </form>

    <?php
    if (isset($_GET['submit']) && isset($_GET['answer'])) {
        $answer = $_GET['answer'];
        setcookie("voted", $answer, time() + 3600);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

</body>
</html>
