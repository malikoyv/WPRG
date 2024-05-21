<html> 
    <head> 
        <title>Count Page Access</title> 
    </head> 
    <body> 
    <?php 
        if (isset($_POST['reset'])) {
            setcookie("count", "", time() - 3600);
            $cookie = 0;
        } else {
            if (!isset($_COOKIE['count'])) {
                echo "To pierwsza odwiedzina";
                $cookie = 1;
                setcookie("count", $cookie, time() + 3600);
            } else {
                $cookie = ++$_COOKIE['count'];
                setcookie("count", $cookie, time() + 3600);
            }
        }

        if ($cookie >= 10) {
            echo "Zwiedziłeś tę stronę za dużo razy - " . $cookie . ". Przestań! Wyjdź!!!";
        } else {
            echo "Odwiedzin tej strony: " . $cookie;
        }
        exit();
    ?>
    <form method="post">
        <button type="submit" name="reset" class="reset">Zresetuj liczbę odwiedzin</button>
    </form>
    </body> 
</html>
